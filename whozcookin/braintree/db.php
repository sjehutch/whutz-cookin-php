<?php
function getDB() {
$dbhost="Localhost";
$dbuser="whozcookin_user";
$dbpass="qwerty@33";
$dbname="whozcookin";
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


return $dbConnection;
}
$conn = mysql_connect('Localhost','whozcookin_user','qwerty@33');
mysql_select_db('whozcookin',$conn);
/* User Sessions */
session_start();
//$session_user_id=$_SESSION['user_id']; 
$session_user_id="1";
?>