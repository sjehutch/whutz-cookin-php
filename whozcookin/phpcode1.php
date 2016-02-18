<?php 
include 'connect.php';
session_start();
$s_name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$u_type = $_SESSION['type'];

if(isset($_POST['addto_favorites']))
{
	$dish_id = $_POST['dish_id'];
	$now_date = date("d-m-Y");

mysql_query("INSERT INTO `favorite_dishes` (`date`,`dish_id`,`user_id`,`fav`) VALUES ('$now_date','$dish_id','$user_id','1')");

header('location:all-dishes.php?status=added-to-favorites');
	
}
if(isset($_POST['remove_fav']))
{
	$dish_id = $_POST['dish_id'];
	$now_date = date("d-m-Y");

mysql_query("DELETE FROM `favorite_dishes` where user_id = '$user_id' and dish_id = '$dish_id'");

header('location:all-dishes.php?status=removed-from-favorites');
	
}


if(isset($_POST['survey']))
{
    $del = $_POST['del'];
	$dishes = $_POST['dishes'];
	$zip_code = $_POST['code'];
	$comment = $_POST['comments'];
	$now_date = date("Y-m-d");
	
	
    mysql_query("INSERT INTO `survey` (`del`,`dishes`,`code`,`comment`, `date`) VALUES ('$del','$dishes','$zip_code','$comment','$now_date')");
	
	    $rty = 'survey@whutzcookin.com';
	    $to = $rty;
        $from ='From: <noreply@whutzcookin.com>';
        $subject ='Survey Details WHUTZCOOKIN ';
        $message = '<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head><body>
        <p>
        <center>
        <img src="http://www.whutzcookin.com/images/logo2.png" style="width:200px">
        </center>
        </p><br>
        <center>
		<b>Preferred Delivery Option is:</b> '.$del.'<br/><br/>
		<b>Preferred Kind of Dishes is:</b> '.$dishes.'<br/><br/>
		<b>Zip Code:</b> '.$zip_code.'<br/><br/>
		<b>Comments:</b> '.$comment.'<br/><br/>
		</center>
        </body>
        </html>';
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= 'From: <noreply@whutzcookin.com>' . "\r\n";
        mail($to,$subject,$message,$headers);

	header('location:index.php?status=survey_form_filled');
}



if (isset($_POST["adddishweb"]))
{
    $now_date = date("Y-m-d");
	$qnt = $_POST["qnt"];
	$cid = $_POST["cookid"];
	$product_id = $_POST["product_id"];
	$rate = $_POST["rate"];
    $total = $rate*$qnt;
	mysql_query("INSERT INTO `c_checkout` (`qnt`, `product_id`, `total`, `date`, `orderby`, `cook_id`) VALUES ('$qnt','$product_id','$total','$now_date','$user_id','$cid')");
	
	mysql_query("update c_add_dish set plates_left=plates_left-$qnt where id='$product_id'");
	
	header('location:my-order-list.php?status=productadded');
}


if(isset($_POST['cook_pwd']))
{
    $password = $_POST['password'];
	$email = $_POST['email'];
    mysql_query("UPDATE `c_cook_sign_up` SET `password`='$password' WHERE email = '$email'");
	header('location:http://www.whutzcookin.com/index.php?status=password_change'); 
}

if(isset($_POST['user_pwd']))
{
    $password = $_POST['password'];
	$email = $_POST['email'];
    mysql_query("UPDATE `c_user_sign_up` SET `password`='$password' WHERE email = '$email'");
	header('location:http://www.whutzcookin.com/index.php?status=password_change'); 
}

if(isset($_POST['del_pwd']))
{
    $password = $_POST['password'];
	$email = $_POST['email'];
    mysql_query("UPDATE `c_delivery` SET `password`='$password' WHERE email = '$email'");
	header('location:http://www.whutzcookin.com/index.php?status=password_change'); 
}




if(isset($_POST['forget']))
{
	
    $email = $_POST['email'];
	$qry_slct = "select `email`,`u_type` from `c_cook_sign_up` WHERE `email`='$email' UNION select `email`,`u_type` from `c_user_sign_up` WHERE `email`='$email' UNION select `email`,`u_type` from `c_delivery` WHERE `email`='$email'";

	$fire_slct = mysql_query($qry_slct) or die(mysql_error());
	$rows = mysql_num_rows($fire_slct);
	$sss = mysql_fetch_assoc($fire_slct);
	$tiku = $sss['password'];
	$utype = $sss['u_type'];
	
	if($rows > 0){	
	    $to=$email;
        $from='From: <noreply@whutzcookin.com>';
        $subject='Forgot Password For WHUTZCOOKIN Account';
        $message= '<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head><body>
        <p>
        <center>
        <img src="http://www.whutzcookin.com/images/logo2.png" style="width:200px">
        </center>
        </p><br>
      <center><h3>Reset your password <a href="http://www.whutzcookin.com/index.php?status=passwdchange&u_type='.$utype.'&email='.$email.'">click here.</h3></center>
        </body>
        </html>';
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= 'From: <noreply@whutzcookin.com>' . "\r\n";
        mail($to,$subject,$message,$headers);
        header("location:http://www.whutzcookin.com/index.php?status=email_sent_for_password");
	}
	else
	{
	header("location:http://www.whutzcookin.com/index.php?status=wrong_forget_email");
	}
	}
	


if(isset($_POST['updatedel']))
{
$now_date = date("Y-m-d");
$del_id = $_POST['del-id'];
$now_datee = date("Y/m/d H:i:s");
$add = $_POST['address'];
$unq = uniqid();
$qq=mysql_query("SELECT * FROM `c_checkout`  where orderby = '$user_id' and date = '$now_date' and status='0' ORDER BY `id` DESC");

while($row=mysql_fetch_assoc($qq)){
$checkoutid = $row['id'];

mysql_query("UPDATE `c_checkout` SET `delivery_user`='$del_id',`id_use`='$unq',`address`='$add',`time_ago`='$now_datee' WHERE id='$checkoutid'");

}
header('location:http://www.whutzcookin.com/braintree/index.php?id='.$user_id);
}


if(isset($_POST['delivery']))
{
    $name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$license = $_POST['license'];
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$type = $_POST['car_type'];
	$zip_code = $_POST['zip_code'];
	$make = $_POST['car_make'];
	$travel = $_POST['travel'];
	
	$zip_rr = mysql_query("select * from `zip_codes` WHERE `code`='$zip_code'");
	$rr2 = mysql_num_rows($zip_rr);

	if ($rr2 > 0)
	{
	
		mysql_query("INSERT INTO `c_delivery`(`u_type`,`name`, `email`, `license`, `mobile`, `dob`, `car_type`, `zip_code`, `travel`, `password`) VALUES ('delivery','$name','$email','$license','$mobile','$dob','$type','$zip_code','$travel','$password')");
	
	
	
		$rrr = 'delivery@whutzcookin.com';
	    $to = $rrr;
        $from ='From: <noreply@whutzcookin.com>';
        $subject ='Delivery Driver Details ';
        $message = '<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head><body>
        <p>
        <center>
        <img src="http://www.whutzcookin.com/images/logo2.png" style="width:200px">
        </center>
        </p><br>
        <center>
		<b>Name:</b> '.$name.'<br/><br/>
		<b>Email:</b> '.$email.'<br/><br/>
		<b>Zip Code:</b> '.$zip_code.'<br/><br/>
		<b>License State:</b> '.$license.'<br/><br/>
		<b>Mobile No:</b> '.$mobile.'<br/><br/>
		<b>Date of Birth:</b> '.$dob.'<br/><br/>
		<b>Car Type:</b> '.$type.'<br/><br/>
		<b>Willing to Travel:</b> '.$travel.'<br/><br/>
		</center>
        </body>
        </html>';
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= 'From: <noreply@whutzcookin.com>' . "\r\n";
        mail($to,$subject,$message,$headers);

	
	header('location:index.php?status=delivery_account_created');
	}
	else
	{		
		header("location:http://www.whutzcookin.com/index.php?status=service_not_available");
	}
}


if(isset($_POST['login_dev']))
{
$email = $_POST['email'];
$password = $_POST['password'];

	
$qry1 = "select * from `c_delivery` WHERE `email`='$email' AND `password`='$password' ";
	$fire1 = mysql_query($qry1) or die(mysql_error());
	$rows1 = mysql_num_rows($fire1);
	if($rows1 > 0){
		$row = mysql_fetch_array($fire1);
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['type'] = 'Delivery';
			header("location:http://www.whutzcookin.com/index.php?status=logged_delivery");
		
	}
	
	else{
		header("location:http://www.whutzcookin.com/index.php?status=incorrect");
	}

}












if(isset($_POST['bookrate']))
{
    $id = $_POST['id'];
	$rate = $_POST['rate'];
    mysql_query("UPDATE `c_booking` SET `rate`='$rate',`status`='Booked' WHERE id = '$id'");
	header('location:booking.php?status=Booking_details_shared'); 
}



if(isset($_POST['Update'])){	
	$adminemail = $_POST['adminlnk'];
	$name = $_POST['name'];
	$old_photo = $_POST['old_photo'];
    $password = $_POST['password'];
	$phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
    $city = $_POST['city'];
	$state = $_POST['state'];
    $website = htmlentities(mysql_real_escape_string($_POST['website']));
	$zip = $_POST['zip'];
    $specialty = $_POST['specialty'];
	$address = htmlentities(mysql_real_escape_string($_POST['address']));
    $work = htmlentities(mysql_real_escape_string($_POST['work']));
	
	$temp_file_extn = strtolower(end(explode('.',$_FILES["userfile"]["name"])));
	$filename = mt_rand(0,9999).'userfile'.time().'.'.$temp_file_extn;
	move_uploaded_file($_FILES["userfile"]["tmp_name"],'pro_pic/'.$filename);
	
	if($_FILES["userfile"] ["name"] == "")
	{
		
	mysql_query("UPDATE `c_cook_sign_up` SET `pro_pic`='$old_photo',`full_name`='$name',`phone`='$phone',`mobile`='$mobile',`work`='$work',`password`='$password',`dob`='$dob',`address`='$address',`city`='$city',`state`='$state',`zip`='$zip',`website`='$website',`specialty`='$specialty',`address`='$address' WHERE id = '$user_id'");
	
	header('location:profile.php?status=updated');
	}
	else
	{	
	mysql_query("UPDATE `c_cook_sign_up` SET 
	`pro_pic`='$filename',`full_name`='$name',`phone`='$phone',`mobile`='$mobile',`work`='$work',`password`='$password',`dob`='$dob',`address`='$address',`city`='$city',`state`='$state',`zip`='$zip',`website`='$website',`specialty`='$specialty',`address`='$address' WHERE id = '$user_id'");
	
	header('location:profile.php?status=updated');
	}

	exit();
}

if(isset($_POST['sms']))

{
    $to_id = $_POST['to'];
	$message = htmlentities(mysql_real_escape_string($_POST['message']));
    $now_date = date("Y/m/d H:i:s");
	mysql_query("INSERT INTO `c_sms`(`to_id`, `user_id`, `date`, `message`, `type`) VALUES ('$to_id','$user_id','$now_date','$message','$u_type')");

    header('location:send-message.php?id='.$to_id);
	}




if(isset($_POST['sms_cook']))

{
    $to_id = $_POST['to'];
	$message = htmlentities(mysql_real_escape_string($_POST['message']));
    $now_date = date("Y/m/d H:i:s");
	mysql_query("INSERT INTO `c_sms`(`to_id`, `user_id`, `date`, `message`, `type`) VALUES ('$to_id','$user_id','$now_date','$message','$u_type')");
    
   header('location:http://www.whutzcookin.com/sms.php?id='.$to_id);
	}




if(isset($_POST['book']))

{
    $cook_id = $_POST['cook_id'];
	$plates = $_POST['plates'];
    $purpose = $_POST['day_night'];
	$oDate = strtotime($_POST['date']);
    $date = date("Y-m-d",$oDate);
    
	$duration = $_POST['duration'];
	$desc = htmlentities(mysql_real_escape_string($_POST['desc']));

	mysql_query("INSERT INTO `c_booking`(`cook_id`,`plates`, `user_id`, `date`, `booking_for`, `duration`, `comment`) VALUES ('$cook_id','$plates','$user_id','$date','$purpose','$duration','$desc')");
	


    header('location:view-booking.php?status=booked');
	
	}

if(isset($_POST['register']))

{

    $email = $_POST['email'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$type = $_POST['type'];
	$location = $_POST['zip'];
	$now_date = date("Y/m/d H:i:s");
    $dp = "user.png";
	
$zip = mysql_query("select * from `zip_codes` WHERE `code`='$location'");
$ro = mysql_num_rows($zip);

if ($ro > 0)
{
	
	if($type == 'User')
{	

	$qry_slct = "select `email` from `c_cook_sign_up` WHERE `email`='$email' UNION select `email` from `c_user_sign_up` WHERE `email`='$email'";

	$fire_slct = mysql_query($qry_slct) or die(mysql_error());
	$rows = mysql_num_rows($fire_slct);
	if($rows > 0){
		header("location:index.php?status=duplicate");
	}else{
	
	mysql_query("INSERT INTO `c_user_sign_up`(`u_type`,`now_date`, `pro_pic`, `full_name`, `email`, `password`,`location`) VALUES ('user','$now_date','$dp','$name','$email','$password','$location')");
	
		$to=$email; 
		$from='From: <noreply@whutzcookin.com>';
		$subject='Email Verification For WHUTZCOOKIN User';
		$message= '<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head><body>
		<p>
		<center>
		<img src="http://www.whutzcookin.com/images/logo2.png" style="width:200px">
		</center>
		</p><br>
		<p>Dear '.$full_name.'<br />
			</p>
			<p>Thank you for registering at The Whutz Cookin</p>			
			<p>This email is to verify that you are indeed a human! If you are, simply follow the link below which will complete the registration process.</p>
			<a href="http://www.whutzcookin.com/verify.php?email='.$email.'&u_type=User">Click on the link to activate your account.</a>
			<p>Best wishes <br/>
			The Whutz Cookin Registry Team.
			</p>
		</body>
		</html>';
		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$headers .= 'From: <noreply@whutzcookin.com>' . "\r\n";
		mail($to,$subject,$message,$headers);
		header("location:http://www.whutzcookin.com/index.php#login?status=register_user");
	}
}
else{

$qry_slct = "select `email` from `c_cook_sign_up` WHERE `email`='$email' UNION select `email` from `c_user_sign_up` WHERE `email`='$email'";

	$fire_slct = mysql_query($qry_slct) or die(mysql_error());
	$rows = mysql_num_rows($fire_slct);
	if($rows > 0){
		header("location:http://www.whutzcookin.com/index.php?status=duplicate");
	}else{
	
	mysql_query("INSERT INTO `c_cook_sign_up`( `u_type`,`now_date`,`pro_pic`, `full_name`, `email`, `password`,`location`) VALUES ('cook','$now_date','$dp','$name','$email','$password','$location')");
	
		$to=$email; 
		$from='From: <noreply@whutzcookin.com>';
		$subject='Email Verification For WHUTZCOOKIN User';
		$message= '<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head><body>
		<p>
		<center>
		<img src="http://www.whutzcookin.com/images/logo2.png" style="width:200px">
		</center>
		</p><br>
		<p>Dear '.$full_name.'<br />
			</p>
			<p>Thank you for registering at The Whutz Cookin</p>			
			<p>This email is to verify that you are indeed a human! If you are, simply follow the link below which will complete the registration process.</p>
			<a href="http://www.whutzcookin.com/verify.php?email='.$email.'&u_type=cook">Click on the link to activate your account.</a>
			<p>Best wishes <br/>
			The Whutz Cookin Registry Team.
			</p>
		</body>
		</html>';
		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$headers .= 'From: <noreply@whutzcookin.com>' . "\r\n";
		mail($to,$subject,$message,$headers);
		header("location:http://www.whutzcookin.com/index.php#login?status=register_cook");
	}


}

} 
else
{
header("location:http://www.whutzcookin.com/index.php?status=service_not_available");
}

}

if(isset($_POST['login']))
{
$email = $_POST['email'];
$type = $_POST['type'];
$password = $_POST['password'];
$type = $_POST['type'];
	
if($type == 'User')
{	

$qry1 = "select * from `c_user_sign_up` WHERE `email`='$email' AND `password`='$password' ";
	$fire1 = mysql_query($qry1) or die(mysql_error());
	$rows1 = mysql_num_rows($fire1);
	if($rows1 > 0){
		$row = mysql_fetch_array($fire1);
		if($row[verification]=="YES"){
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['name'] = $row['full_name'];
			$_SESSION['type'] = 'User';
			
			header("location:all-dishes.php?status=logged_user");
		}else{
			header("location:index.php?status=verification_pending");
		}
	}
	
	else{
		header("location:index.php?status=incorrect");
	}
}
else if($type == 'del')
{
  $qry1 = "select * from `c_delivery` WHERE `email`='$email' AND `password`='$password' ";
	$fire1 = mysql_query($qry1) or die(mysql_error());
	$rows1 = mysql_num_rows($fire1);
	if($rows1 > 0){
		$row = mysql_fetch_array($fire1);
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['type'] = 'Delivery';
			header("location:http://www.whutzcookin.com/index.php?status=logged_delivery");	
	}
	else{
		header("location:index.php?status=incorrect");
	}
}
else
{
    $qry1 = "select * from `c_cook_sign_up` WHERE `email`='$email' AND `password`='$password' ";
	$fire1 = mysql_query($qry1) or die(mysql_error());
	$rows1 = mysql_num_rows($fire1);
	if($rows1 > 0){
		$row = mysql_fetch_array($fire1);
		if($row[verification]=="YES"){
			$_SESSION['name'] = $row['full_name'];
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['type'] = 'Cook';
		$nn = date('Y-m-d H:i:s');
		$dt = date("Y-m-d");
			
		mysql_query("UPDATE `c_cook_sign_up` SET `last_login`= '$nn', `date_login`= '$dt' where email='$email'");
			
			header("location:index.php?status=logged_cook");
		}else{
			header("location:index.php?status=verification_pending");
		}
	}
	else{
		header("location:index.php?status=incorrect");
	}

}	
	
}

if(isset($_POST['Updateuser']))
{
	
	$user_id = $_POST['id'];
	$name = $_POST['name'];
	$old_photo1 = $_POST['old_photo1'];
    $password = $_POST['password'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
    $city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$address = htmlentities(mysql_real_escape_string($_POST['address']));
 
	
	$temp_file_extn = strtolower(end(explode('.',$_FILES["userfile1"]["name"])));
	$filename1 = mt_rand(0,9999).'userfile1'.time().'.'.$temp_file_extn;
	move_uploaded_file($_FILES["userfile1"]["tmp_name"],'pro_pic/'.$filename1);
	
	if($_FILES["userfile1"] ["name"] == "")
	{
	
	mysql_query("UPDATE `c_user_sign_up` SET `pro_pic`='$old_photo1',`full_name`='$name',`phone`='$phone',`password`='$password',`dob`='$dob',`city`='$city',`state`='$state',`zip`='$zip',`address`='$address' WHERE user_id = '$user_id'");
	
	header('location:profile_user.php?status=updated');
	}
	else
	{	
	
	mysql_query("UPDATE `c_user_sign_up` SET 
	`pro_pic`='$filename1',`full_name`='$name',`phone`='$phone',`mobile`='$mobile',`password`='$password',`dob`='$dob',`city`='$city',`state`='$state',`zip`='$zip',`address`='$address' WHERE user_id = '$user_id'");
	
	header('location:profile_user.php?status=updated');
	}

	exit();

	
}

?>