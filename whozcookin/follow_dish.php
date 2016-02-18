<?php
include_once 'connect.php';
session_start();
$s_name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$u_type = $_SESSION['type'];
$dish_id = $_GET['id'];
$cook_id = mysql_fetch_array(mysql_query("SELECT * FROM `c_add_dish` WHERE id = '$dish_id'"));  
$date1 = date("Y-m-d");
$cc = $cook_id['cook_id'];

mysql_query("INSERT INTO `c_follow_dish` (`date`, `dish_id`, `cook_id`, `user_id`) VALUES ('$date1', '$dish_id','$cc','$user_id')");

header('location:all-dishes.php?follwed');

?>