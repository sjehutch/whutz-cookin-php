<?php 
include 'db.php';
include 'functions.php';
$uuid = $_GET['id'];
$bookid = $_GET['bookid'];
?>
<!DOCTYPE html>
<html>
<head>
<title>WHUTZ</title>
<link href="style.css" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.creditCardValidator.js"></script>
<script type="text/javascript" src="js/card.js"></script>
</head>
<body>
<div id="container">
<div id="paymentGrid">
<div style="margin-top:20px">

<?php 
$cartData=getUserCartDetails($session_user_id);

foreach ($cartData as $data) {
    //echo $data->product_name;
    # code...
}
 ?>
 <center><img src="http://betaonetesting.com/cookin/images/logo2.png" style="width: 200px;"></center><br>
<table class="items">
                    <thead>
					
		<tr>
	    <th>Booking Id</th>
        <th>Cook Name</th>
        <th>Booking Date</th>
		<th>Plates</th>
		<th>Cook Booking Charges</th>
        </tr>			
					
                    </thead>
                    <tbody>
                    
<?php
    $total = 0;
	$aaj = date('Y-m-d');
	$qq = mysql_query("SELECT * FROM `c_booking`  where user_id = '$uuid' and date >= '$aaj' 
	and id='$bookid' ORDER BY `date` ASC");
	while($row=mysql_fetch_assoc($qq)){
	$price = $row['rate'];
	$total += $price; 
	
	
	?>

       <tr>
       <td><?php 
		echo $row['id'];
		?></td>
      <td>
		<?php 
		$gg = $row['cook_id'];
		$hh = mysql_fetch_array(mysql_query("SELECT * FROM `c_cook_sign_up`   where id = '$gg' "));
		
		echo $hh['full_name']; ?> </td>
         <td>
		<?php 
                        $oDate = strtotime($row['date']);
                        $sDate = date("M d, Y",$oDate);
                        echo $sDate; ?>
     </td>
<td><?php echo $row['plates']; ?></td>
	
	<td><?php echo  $row['rate']; ?></td>
                            </tr>
                        <?php } ?>
			<tr>
						
						<td></td>
						<td></td>
						<td></td>
						<td><b>Sub Total</b></td>
						<td><b><?php echo $total; ?></b></td>
						</tr>			
                    </tbody>
                </table>
</div>
<div style="float:left;widht:450px">
<form method="post"  id="paymentForm">
 <h4>Payment details</h4>
                    <ul>
                        <li>
                            <label for="card_number">Card Number </label>
                            <input type="text" name="card_number" id="card_number"  maxlength="20" placeholder="1234 5678 9012 3456">

                            
                        </li>

                         <li>
                            <label for="card_name">Name on Card</label>
                            <input type="text" name="card_name" id="card_name" placeholder="Srinivas Tamada">
                        </li>

                        <li class="vertical">
                            <ul>
                                <li>
                                    <label for="expiry_date">Expires</label>
                                    <input type="text" name="expiry_month" id="expiry_month" maxlength="2" placeholder="MM" class="inputLeft marginRight">
                                    <input type="text" name="expiry_year" id="expiry_year" maxlength="2" placeholder="YY" class="inputLeft "><br/>
                                    <span >Month</span> <span style="margin-left:35px">Year</span>
                                </li>

                                <li style="text-align:right">
                                    <label for="cvv">CVV</label>
                                    <input type="text" name="cvv" id="cvv" maxlength="3" placeholder="123" class="inputRight">
                                </li>
                            </ul>
                        </li>
						<input type="hidden" name="price" value="<?php echo $total; ?>">
						<input type="hidden" name="sid" value="<?php echo $uuid; ?>">
						
						<input type="hidden" name="bookidd" value="<?php echo $bookid; ?>">
						
						<input type="hidden" name="cook" value="cookbook">
                       <li style="clear:both;">
                        <input type="submit" id="paymentButton" value="Proceed" disabled="disabled" class="disable">
                        </li>
                    </ul>
                </form>
                </div>
                <div style="float:right;width:340px;margin-top:40px">


                <div style="margin-bottom:20px">Try these demo numbers</div>
                <ul id="cards">
                <li>5105105105105100</li>
                <li>
                4111 1111 1111 1210</li>
                <li>
              4111 1111 1113 1010
                </li>
                <li>
                4000 0000 0000 0002
                </li>
                <li>
                4026 0000 0000 0002
                </li>
                <li>
                5018 0000 0009
                </li>
                <li>
                5100 0000 0000 0008
                </li>
                 <li>
               6011 0000 0000 0004
                </li>
                </ul>




                </div>
                  </div>
                <div id="orderInfo">
                   

                </div>
                </div>
              
</body>
</html>


