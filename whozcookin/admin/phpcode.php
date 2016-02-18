<?php

include_once 'connect.php';
if(isset($_POST['login']))
{
$email = $_POST['email'];
$password = $_POST['password'];
 //echo "SELECT * FROM `admin` where email='$email' and password='$password'";
 
	$query = mysql_query("SELECT * FROM `admin` where email='$email' and password='$password'");
	$check = mysql_num_rows($query);
	//echo $check;
	if($check > 0){
	
				$row = mysql_fetch_array($query);
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				
				
				
			header('location:index.php?login');
			}
	else{
		header('location:login.php?msg=doesnotexist');
	}
		exit();

}

if(isset($_POST['pay_now']))
{
	extract($_POST);
	$now = date("d-m-Y");
	mysql_query("INSERT INTO `c_cook_payments` (`date`,`cook_id`,`paid_amount`,`payment_mode`,`remarks`) VALUES ('$now','$cook_id','$paid_amount','$payment_mode','$remarks')");
	
	mysql_query("UPDATE `c_cook_sign_up` set balance=balance-$paid_amount where id='$cook_id'");
	
	header('location:payments_done.php?status=paid');
	exit();
	
}

?>