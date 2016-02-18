<?php
function getUserCartDetails($session_user_id) 
{
$db = getDB();
$sql = "SELECT P.product_name,P.price FROM Users U, Cart C, Products P WHERE U.user_id=C.user_id_fk AND P.product_id = C.product_id_fk AND C.user_id_fk=:user_id AND C.cart_status='0'";
$stmt = $db->prepare($sql);
$stmt->bindParam("user_id", $session_user_id);
$stmt->execute();  
$getUserCartDetails = $stmt->fetchAll(PDO::FETCH_OBJ);
$db = null;
//echo '{"getUserCartDetails": ' . json_encode($getUserCartDetails) . '}';
return $getUserCartDetails;
}

function updateUserOrder($braintreeCode,$sid) 
{

$db = getDB();
$now_date = date("Y-m-d");
$qq=mysql_query("SELECT * FROM `c_checkout`  where orderby = '$sid' and date = '$now_date' and status='0' ORDER BY `id` DESC");
while($row=mysql_fetch_assoc($qq)){
$checkoutid = $row['id'];
$co_id = $row['cook_id'];
$totl = $row['total'];
mysql_query("UPDATE `c_cook_sign_up` set balance=balance+$totl where id='$co_id'");
mysql_query("UPDATE `c_checkout` SET `status`='1' WHERE id='$checkoutid'");


}
echo '{"OrderStatus": [{"status":"1", "orderID":"'.$order_id.'"}]}';

}


function updatecookbooking($braintreeCode,$sid,$bookidd) 
{
$db = getDB();
$aaj = date('Y-m-d');
$qq = mysql_query("SELECT * FROM `c_booking`  where user_id = '$sid' and date >= '$aaj' and id='$bookidd' ORDER BY `date` ASC");
while($row=mysql_fetch_assoc($qq)){
$checkoutid = $row['id'];
$co_id = $row['cook_id'];
$totl = $row['rate'];
mysql_query("UPDATE `c_cook_sign_up` set balance=balance+$totl where id='$co_id'");
mysql_query("UPDATE `c_booking` SET `payement`='1' WHERE id='$checkoutid'");
}
echo '{"OrderStatus": [{"status":"1", "orderID":"'.$order_id.'"}]}';
}

?>