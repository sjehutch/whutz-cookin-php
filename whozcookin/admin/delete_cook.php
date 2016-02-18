<?php 
session_start();	
include("connect.php");
		$id=$_GET['id'];
		
		mysql_query("DELETE FROM `c_cook_sign_up` where `id` = '$id'");
		header('location:cooks.php?status=cookdeleted');
?>
