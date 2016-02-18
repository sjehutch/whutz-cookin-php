<?php include 'connect.php';
session_start();

    $id = $_GET['id'];
	$rating = $_GET['rating'];
	mysql_query("UPDATE `c_checkout` SET `rating`='$rating' where id = '$id'");

	header('location:my-past-ordered.php?status=rating_given');
	exit();
	
?>