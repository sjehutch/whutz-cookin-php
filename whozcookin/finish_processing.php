<?php include 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];
    $now_date = date("Y/m/d H:i:s");
    $id = $_GET['id'];
	mysql_query("UPDATE `c_checkout` SET `running_status`='Order Delivered',`delivered`='1',`del_time`='$now_date' where id_use = '$id'");
	
	mysql_query("UPDATE `c_delivery` SET `current_avail`='0' where id = '$user_id'");
	header('location:completed-orders.php?status=Order_delivered');
	exit();
	
?>