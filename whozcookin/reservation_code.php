<?php
include_once'connect.php';
$date = date('Y-m-d');
$f_name = $_POST['reserve-first-name'];
$l_name = $_POST['reserve-last-name'];
$email = $_POST['reserve-email'];
$phone = $_POST['reserve-telephone'];
$book_date = $_POST['reserve-date'];
$book_time = $_POST['reserve-time'];
$party_size = $_POST['reserve-party-size'];

mysql_query("INSERT INTO `reservation` (`date`,`f_name`,`l_name`,`email`,`phone`,`book_date`,`book_time`,`party_size`) VALUES('$date','$f_name','$l_name','$email','$phone','$book_date','$book_time','$party_size')");

header('location:index.php?status=reservationmade');
?>