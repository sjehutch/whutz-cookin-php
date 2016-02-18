<?php
session_start();

	$cook_id = $_SESSION['id'];
include 'connect.php';

//If no errors registred, print the success message

 if(isset($_POST['Submit']) && !$errors) 
 {
   // mysql_query("update SQL statement ");
  echo "Image Uploaded Successfully!";

 }

function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 if(isset($_POST['adddishweb'])){
$image =$_FILES["userfile_img"]["name"];
$uploadedfile = $_FILES['userfile_img']['tmp_name'];
 
  if ($image) 
  {
  //$filename = stripslashes($_FILES['file']['name']);
  $temp_file_extn_img = strtolower(end(explode('.',$_FILES["userfile_img"]["name"])));
        $extension = $temp_file_extn_img; 
 if (($extension != "jpg") && ($extension != "jpeg") 
&& ($extension != "png") && ($extension != "gif")) 
  {
echo ' Unknown Image extension ';
$errors=1;
  }
 else
{
   $size=filesize($_FILES['userfile_img']['tmp_name']);
 

if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['userfile_img']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);
}
else if($extension=="png")
{
$uploadedfile = $_FILES['userfile_img']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);
}
else 
{
$src = imagecreatefromgif($uploadedfile);
}
 
list($width,$height)=getimagesize($uploadedfile);

$newwidth=128;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

$newwidth1=60;
$newheight1=($height/$width)*$newwidth1;
$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
 $width,$height);

imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
$width,$height);

$filename_img = rand(1000,99999).'auserfile_img'.time().'.'.$temp_file_extn_img;
$filename = "img/small/". $filename_img;
//$filename1 = "img/small/". $filename_img;

imagejpeg($tmp,$filename,100);
//imagejpeg($tmp1,$filename1,100);

imagedestroy($src);
imagedestroy($tmp);
imagedestroy($tmp1);
}
}
 
 


@move_uploaded_file($_FILES["userfile_img"]["tmp_name"],"img/".$filename_img);

$temp_file_extn_vid = strtolower(end(explode('.',$_FILES["userfile_vid"]["name"])));
if($temp_file_extn_vid != ""){
	$filename_vid = mt_rand(1111,9999).'userfile_vid'.time().'.'.$temp_file_extn_vid;
	@move_uploaded_file($_FILES["userfile_vid"]["tmp_name"],"vid/".$filename_vid);
}	

$address = urlencode($_POST['address']);
$homepage = file_get_contents('http://www.gsnportal.com/testmap.php?address='.$address);
$homepage_array = explode(',',$homepage) ;


$cid = $_POST['ckkid'];
$now_date = date('Y-m-d H:i:s');
$today = date('Y-m-d');

$getescape = array_map('mysql_real_escape_string', $_POST);
$escape = array_map('trim',$getescape);
extract($escape);



for($j = 0; $j < count($_POST['delivery']); $j++){
$job .= htmlentities(mysql_real_escape_string($_POST['delivery'][$j])).'|';
}
$prod = trim($job,'|');


for($k = 0; $k < count($_POST['contain']); $k++){
$company .= htmlentities(mysql_real_escape_string($_POST['contain'][$k])).',';
}
$qnt = trim($company,',');




$qry1 = "INSERT INTO `c_add_dish`(`address`,`lat`,`long`,`cook_id`,`now_date`,`today`, `day_night`,`delivery`, `dish_name`, `radio1`,`dish`,`dish_temp`, `description`, `plates_left`,`Unfulfilled`,`userfile_img`, `userfile_vid`, `price`, `contains`, `other`, `zip`)

 VALUES ('$address','$homepage_array[0]','$homepage_array[1]','$cid','$now_date','$today','$day_night','$prod','$dish_name','$radio1','$dishtype','$temp_dish','$description','$plates_left','$Unfulfilled','$filename_img','$filename_vid','$price','$qnt','$other','$zip')";
 

mysql_query($qry1) or die(mysql_error());
header("location:http://www.whutzcookin.com/?status=dishadded");
}
 
 
 
 


?>