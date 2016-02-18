<?php
if($u_type == 'User')
{ ?>					
								
<ul class="collection with-header" style="text-align: left;">
<li class="collection-header"><h5 style="color: #000;">USER MENU</h5></li>
<li class="collection-item"><a href="dashboard_user.php">DASHBOARD  </a><i class="fa fa-caret-right"></i></li>
<li class="collection-item"><a href="index.php">FOOD FEED</a><i class="fa fa-caret-right"></i></li>
<li class="collection-item">
<?php 
$qqn = mysql_query("SELECT DISTINCT user_id FROM `c_sms`  where to_id = '$user_id' ORDER BY `id` DESC");
$bb = mysql_num_rows($qqn);
 ?>
<a href="#" id="flip">
MESSAGES 
<div class="pull-right" style="background-color: rgb(213, 17, 17); width: 30px; height: 30px; text-align: center; line-height: 27px; border-radius: 50%; margin: -5px; color: aliceblue;">
<?php echo $bb; ?>
</div>
</a>
</li>	
<?php while($row=mysql_fetch_assoc($qqn)){ 
$hh = $row['user_id'];
?>
<li class="collection-item">

<a href="send-message.php?id=<?php echo $hh; ?>" id="panel">
<i class="fa fa-envelope-o"></i>
<?php 
$chkk = mysql_fetch_array(mysql_query("select * from `c_cook_sign_up`  WHERE `id`='$hh'"));
echo $chkk['full_name'];
?>
</a>
</li>
<?php } ?>
		
        <li class="collection-item"><a href="profile_user.php">MY PROFILE</a><i class="fa fa-caret-right"></i></li>
		
        <li class="collection-item"><a href="recent-added-dishes.php">RECENTLY ADDED DISHES</a><i class="fa fa-caret-right"></i></li>
        <li class="collection-item"><a href="my-past-ordered.php">MY ORDERS</a><i class="fa fa-caret-right"></i></li>
		<li class="collection-item"><a href="view-booking.php">BOOKING WITH COOK</a><i class="fa fa-caret-right"></i></li>
      
      </ul>  
 <?php }
else if($u_type == 'Cook')
{ ?>           

<ul class="collection with-header" style="text-align: left;">
        <li class="collection-header"><h5 style="color: #000;">COOK MENU</h5></li>
		<li class="collection-item"><a href="dashboard.php">DASHBAORD</a></li>
		<li class="collection-item">

<?php 
$qqn = mysql_query("SELECT DISTINCT user_id FROM `c_sms`  where to_id = '$user_id' ORDER BY `id` DESC");
$bb = mysql_num_rows($qqn);
 ?>

<a href="#" >
MESSAGES 
<div class="pull-right" style="background-color: rgb(213, 17, 17); width: 30px; height: 30px; text-align: center; line-height: 27px; border-radius: 50%; margin: -5px; color: aliceblue;">
<?php echo $bb; ?>
</div>
</a>
</li>

<?php while($row=mysql_fetch_assoc($qqn)){ 
 $hh = $row['user_id'];
 ?>
<li class="collection-item">
<a href="sms.php?id=<?php echo $hh; ?>" id="panel">
<i class="fa fa-envelope-o"></i>
<?php 
$chkk = mysql_fetch_array(mysql_query("select * from `c_user_sign_up`  WHERE `user_id`='$hh'"));
echo $chkk['full_name'];
?>
</a>
<?php } ?>
</li>
<li class="collection-item"><a href="profile.php">MY PROFILE</a><i class="fa fa-caret-right"></i></li>
<li class="collection-item"><a href="add-new-dish.php">ADD DISH</a><i class="fa fa-caret-right"></i></li>
<li class="collection-item"><a href="web-cookin.php">MY DISHES</a><i class="fa fa-caret-right"></i></li>


<li class="collection-item">
<?php 
$aaj = date('Y-m-d');
$qqr = mysql_query("SELECT * FROM `c_checkout`  where cook_id = '$user_id' and status = '1' and date = '$aaj' ORDER BY `id` DESC");
$skkr = mysql_num_rows($qqr);
 ?>
<a href="my-orders.php">
MY ORDERS
<div class="pull-right" style="background-color: rgb(213, 17, 17); width: 30px; height: 30px; text-align: center; line-height: 27px; border-radius: 50%; margin: -5px; color: aliceblue;">
<?php echo $skkr; ?>
</div>
</a>
</li>

<li class="collection-item">
<?php 
$aaj = date('Y-m-d');
$qq = mysql_query("SELECT * FROM `c_booking`  where cook_id = '$user_id' and status = '' and date >= '$aaj' ORDER BY `id` DESC");
$skk = mysql_num_rows($qq);
 ?>
<a href="booking.php">PENDING BOOKING
<div class="pull-right" style="background-color: rgb(213, 17, 17); width: 30px; height: 30px; text-align: center; line-height: 27px; border-radius: 50%; margin: -5px; color: aliceblue;">
<?php echo $skk; ?>
</div>

</a>
<i class="fa fa-caret-right"></i></li>

<li class="collection-item"><a href="my-calendar.php">MY CALENDAR</a><i class="fa fa-caret-right"></i></li>
<li class="collection-item"><a href="my_account.php">MY ACCOUNT</a><i class="fa fa-caret-right"></i></li>

</ul>
<?php } else {?>
<ul class="collection with-header" style="text-align: left;">
<li class="collection-header"><h5 style="color: #000;">DELIVERY MENU</h5></li>
<li class="collection-item"><a href="index.php">HOME</a><i class="fa fa-caret-right"></i></li>
<li class="collection-item"><a href="delivery-orders.php">NEW ORDERS</a><i class="fa fa-caret-right"></i></li>
<li class="collection-item"><a href="completed-orders.php">ORDER COMPLETED</a><i class="fa fa-caret-right"></i></li>
<li class="collection-item"><a href="#">MY PROFILE</a><i class="fa fa-caret-right"></i></li>
</ul>
<?php } ?>