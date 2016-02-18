<?php include 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];
    $id = $_GET['id'];
	mysql_query("UPDATE `c_checkout` SET `running_status`='Under Processing' where id_use = '$id'");
	
	mysql_query("UPDATE `c_delivery` SET `current_avail`='1' where id = '$user_id'");
	
	header('location:delivery-orders.php?status=Order_on_the_way');
	exit();
	
?>