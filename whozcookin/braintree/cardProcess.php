<?php
include 'db.php';
include 'functions.php';
//$price=$_SESSION['session_price'];
//$price='1000';
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['card_number']) && !empty($_POST['card_name']) && !empty($_POST['expiry_month']) && !empty($_POST['expiry_year']) && !empty($_POST['cvv']) && !empty($_POST['price']) && !empty($_POST['sid']) && !empty($_POST['bookidd']) && !empty($_POST['cook']))
{
$card_number=str_replace("+","",$_POST['card_number']);  
$card_name=$_POST['card_name'];
$expiry_month=$_POST['expiry_month'];
$expiry_year=$_POST['expiry_year'];
$cvv=$_POST['cvv'];
$price=$_POST['price'];
$bookidd=$_POST['bookidd'];
$sid=$_POST['sid'];
$type=$_POST['cook'];
$expirationDate=$expiry_month.'/'.$expiry_year;

require_once 'braintree/Braintree.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('6xmdgpjb6xyn95my');
Braintree_Configuration::publicKey('w3rsgsfm6nxyrt8d');
Braintree_Configuration::privateKey('2a7fb07cb33197dc69eb7b8c65765b5b');

$result = Braintree_Transaction::sale(array(
'amount' => $price,
'creditCard' => array(
'number' => $card_number,
'cardholderName' => $card_name,
'expirationDate' => $expirationDate,
'cvv' => $cvv
)
));

if ($result->success) 
{
//print_r("success!: " . $result->transaction->id);
if($result->transaction->id)
{
$braintreeCode=$result->transaction->id;

if($type == 'cookbook'){
updatecookbooking($braintreeCode,$sid,$bookidd);
}else{
updateUserOrder($braintreeCode,$sid);
}

}
} 
else if ($result->transaction) 
{
echo '{"OrderStatus": [{"status":"2"}]}';
} 
else 
{
echo '{"OrderStatus": [{"status":"0"}]}';
}

}
?>