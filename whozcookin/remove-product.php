<?php include 'connect.php';
session_start();
    $id = $_GET['id'];
	$row=mysql_query("DELETE FROM `c_checkout` WHERE `id`='$id'");
	header('location:my-order-list.php?status=dish-removed');
	exit();
	
?>