<?php 
session_start();	
include("connect.php");
		$id=$_GET['id'];
		//echo "DELETE FROM `c_user_sign_up` where `user_id` = '$id'";
		mysql_query("DELETE FROM `c_user_sign_up` where `user_id` = '$id'");
		header('location:users.php?status=userdeleted');
?>
