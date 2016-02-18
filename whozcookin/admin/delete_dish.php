<?php 
session_start();	
include("connect.php");
		$id=$_GET['id'];
		
		mysql_query("DELETE FROM `c_add_dish` where `id` = '$id'");
		header('location:dishes.php?status=dishdeleted');
?>
