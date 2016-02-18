<?php 
$conn = mysql_connect('Localhost','whozcookin_user','qwerty@33');
mysql_select_db('whozcookin',$conn);
session_start();
$s_name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$u_type = $_SESSION['type'];

$dish_id = $_GET['id'];
$now_date = date("d-m-Y");

mysql_query("INSERT INTO `favorite_dishes` (`date`,`dish_id`,`user_id`,`fav`) VALUES ('$now_date','$dish_id','$user_id','1')");

header('all-dishes.php?status=added-to-favorites');

?>