<?php 
include_once("connect.php");
$uemail = $_GET['email'];
$utype = $_GET['u_type'];

if($utype == 'cook')
{
	$data = mysql_query("SELECT * FROM `c_cook_sign_up` where email='$uemail'");
	$check1 = mysql_num_rows($data);
	if($check1 > 0)
		{
			mysql_query("UPDATE `c_cook_sign_up` SET `verification`='YES' where email='$uemail'");
			header('location:http://www.whutzcookin.com/index.php?status=verified');
		}
		else
		{
			header('location:http://www.whutzcookin.com/index.php?status=incorrect');
		}
}

else
{
	$data = mysql_query("SELECT * FROM `c_user_sign_up` where email='$uemail'");
	$check2 = mysql_num_rows($data);
	if($check2 > 0)
		{
			mysql_query("UPDATE `c_user_sign_up` SET `verification`='YES' where email='$uemail'");
			header('location:http://www.whutzcookin.com/index.php?status=verified');
		}
	else
		{
			header('location:http://www.whutzcookin.com/index.php?status=incorrect');
		}
}
?>