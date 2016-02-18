<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$s_name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$u_type = $_SESSION['type'];  
include_once("connect.php");
include_once("time-ago-function.php");

$session=session_id();
$time=time();
$time_check=$time-600; //SET TIME 10 Minute

$tbl_name="user_online"; // Table name

// Connect to server and select databse

$sql="SELECT * FROM $tbl_name WHERE session='$user_id' and type = '$u_type'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count=="0"){

$sql1="INSERT INTO $tbl_name(session, time, type)VALUES('$user_id', '$time', '$u_type')";
$result1=mysql_query($sql1);

if($u_type=='Cook'){

$qq=mysql_query("select * FROM `c_follow_dish` WHERE cook_id = '$user_id' ");
while($row=mysql_fetch_assoc($qq)){
$ddid = $row['dish_id'];
$uuid = $row['user_id'];	
$data1 = mysql_fetch_array(mysql_query("SELECT * FROM  `c_cook_sign_up` where id = '$user_id'"));
$cnam = $data1['full_name'];
$data2 = mysql_fetch_array(mysql_query("SELECT * FROM  `c_add_dish`  where id = '$ddid'"));
$dnam = $data2['dish_name'];
$data3 = mysql_fetch_array(mysql_query("SELECT * FROM  `c_user_sign_up`  where user_id = '$uuid'"));
$demail= $data3['email'];


        //$rty = 'ashish.netinnovatus@gmail.com';
	    $to = $demail;
        $from ='From: <noreply@whutzcookin.com>';
        $subject ='Dish Followed';
        $message = '<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head><body>
        <p>
         <center>
        <img src="http://betaonetesting.com/cookin/images/logo2.png" style="width:200px">
        </center>
        </p><br>
        <center><h3>
		Cook <b style="color:green;">'.$cnam.' </b>for dish <b style="color:green;">'.$dnam.'</b> has come online now, you can place your order now.<br/><br/></h3>
		</center>
        </body>
        </html>';
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= 'From: <noreply@whutzcookin.com>' . "\r\n";
        mail($to,$subject,$message,$headers);
		
}

}

}

else {
"$sql2=UPDATE $tbl_name SET time='$time' WHERE session = '$user_id' and type = '$u_type'";
$result2=mysql_query($sql2);
}

$sql3="SELECT * FROM $tbl_name";
$result3=mysql_query($sql3);

$count_user_online=mysql_num_rows($result3);

//echo "User online : $count_user_online ";

// if over 10 minute, delete session
$sql4="DELETE FROM $tbl_name WHERE time<$time_check";
$result4=mysql_query($sql4);

?>


<?php
$uemail = $_GET['email'];
$utype = $_GET['u_type'];

if($utype == 'cook'){
$data = mysql_fetch_array(mysql_query("SELECT * FROM `c_cook_sign_up` where email='$uemail'"));

}
else if($utype == 'user')
{
$data = mysql_fetch_array(mysql_query("SELECT * FROM `c_user_sign_up` where email='$uemail'"));
}
else{
$data = mysql_fetch_array(mysql_query("SELECT * FROM `c_delivery` where email='$uemail'"));
}

?>
<head>
<style>
#email-error{
	font-size:18px !important;
	color:#fff !important;
}
#contact-email-error{
	font-size:18px !important;
	color:#fff !important;
}
#contact-first-name-error{
	font-size:18px !important;
	color:#fff !important;
}
</style>

        <!-- Character set configuration -->
        <meta charset="UTF-8">

        <!-- Viewport configuration, scaling options -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Trying to make IE do its best -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Author and description -->
        <meta name="author" content="whutz cookin">
        <meta name="description" content="Whutz Cookin, Home Cooked Meals Delivered, Fine Dining at your Front Door.">

        <!-- Open graph elements | http://ogp.me/ -->
        <meta property="og:title" content="whutz cookin">
        <meta property="og:image" content="images/slider/veggies.jpg">
        <meta property="og:description" content="Whutz Cookin, Home Cooked Meals Delivered, Fine Dining at your Front Door.">

        <!-- Hide the browser UI -->
        <meta name="apple-mobile-web-app-capable" content="yes">

        <!-- MS tile icons -->
        <meta name="msapplication-TileColor" content="#e13e3e">
        <meta name="msapplication-TileImage" content="mstile-144x144.html">

        <!-- Android toolbar color -->
        <meta name="theme-color" content="#ffffff">

        <!-- Apple touch icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png">

        <!-- Android touch icons -->
        <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">

        <!-- Web app manifest file | Make sure you edit the app name in it on 2nd line -->
        <link rel="manifest" href="favicons/manifest.json">
<link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Stylesheets -->
     <link rel="stylesheet" href="libs/materialize-src/css/materialize.css">
        
        <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="libs/owl-carousel/assets/owl.carousel.css">
        <link rel="stylesheet" href="libs/animate.css/animate.min.css">
        <link rel="stylesheet" href="styles/css/schemes/cookin.css">
		 <link rel="stylesheet" href="admin/css/charisma-app.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="star/star-rating.css" media="all" rel="stylesheet" type="text/css"/>


    <style>

    input::-webkit-input-placeholder {
color: #37751F !important;
}
 
input:-moz-placeholder { /* Firefox 18- */
color: #37751F !important;  
}
 
input::-moz-placeholder {  /* Firefox 19+ */
color: #37751F !important;  
}
 
input:-ms-input-placeholder {  
color: #37751F !important;  
}

.input-field label {
    color: #000 important;
}
.btn:hover {
  background-color: #ddd;
  -webkit-transition: background-color 1s ease;
  -moz-transition: background-color 1s ease;
  transition: background-color 1s ease;
}

.btn-small {
  padding: .75em 1em;
  font-size: 0.8em;
}

.modal-box {
  display: none;
  position: absolute;
  z-index: 1000;
  width: 98%;
  background: white;
  border-bottom: 1px solid #aaa;
  border-radius: 4px;
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  border: 1px solid rgba(0, 0, 0, 0.1);
  background-clip: padding-box;
}
@media (min-width: 32em) {

.modal-box { width: 70%; 
position:fixed;
}
}

.modal-box header,
.modal-box .modal-header {
  padding: 1.25em 1.5em;
  border-bottom: 1px solid #ddd;
}

.modal-box header h3,
.modal-box header h4,
.modal-box .modal-header h3,
.modal-box .modal-header h4 { margin: 0; }

.modal-box .modal-body { padding: 2em 1.5em; }

.modal-box footer,
.modal-box .modal-footer {
  padding: 1em;
  border-top: 1px solid #ddd;
  background: rgba(0, 0, 0, 0.02);
  text-align: right;
}

.modal-overlay {
  opacity: 0;
  filter: alpha(opacity=0);
  position: absolute;
  top: 0;
  left: 0;
  z-index: 900;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3) !important;
}

a.close {
  line-height: 1;
  font-size: 1.5em;
  position: absolute;
  top: 5%;
  right: 2%;
  text-decoration: none;
  color: #bbb;
}
a.close:hover {
  color: #222;
  -webkit-transition: color 1s ease;
  -moz-transition: color 1s ease;
  transition: color 1s ease;
}


.input-field.col.s4 > label {
  color: #93b486;
  font-size: 15px !important;
}
.input-field.col.s6 > label{
  color: #93b486;
  font-size: 15px !important;
}
.input-field.col.s12 > label{
  color: #93b486;
  font-size: 15px !important;
}





    </style>
        <!-- Site title -->
        <title>WHUTZ COOKIN</title>
    </head>
	<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


  $free = curPageURL();

?>


    <body class="locked nav-fixed">

        <!-- The initial spinner container -->
        <div id="spinner-overlay"></div>

        <!-- Progress indicator when an email is being sent -->
        <div class="progress" id="status">
            <div class="indeterminate"></div>
        </div>

        <!-- Fixed navigation bar -->
        <div class="navbar-fixed">
            <nav class="active">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo center">
                        <img src="images/whutzcookin.png" alt="Whutz Cookin">
                    </a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
			<li>		
					</li>
					
          <?php
if($u_type == 'User')
{ ?>  
                        <li><a href="dashboard_user.php" class="waves-effect waves-dark">Dashboard</a></li>
                        <li><a href="index.php#contact" class="waves-effect waves-dark">contact us</a></li>
<?php } ?>
            <?php
if($u_type == 'Cook')
{ ?>  
                        <li><a href="dashboard.php" class="waves-effect waves-dark">Dashboard</a></li>
                        <li><a href="index.php#contact" class="waves-effect waves-dark">contact us</a></li>
<?php } ?>      


<?php
if($u_type == 'Delivery')
{ ?>  
                        <li><a href="delivery-orders.php" class="waves-effect waves-dark">New Orders</a></li>
                        <li><a href="completed-orders.php" class="waves-effect waves-dark">Order Completed</a></li>
<?php } ?>          
            
                    </ul>
          

<?php if(isset($_SESSION['user_id'])){ ?>



 <ul class="right hide-on-med-and-down">
<li><a href="#" class="waves-effect waves-dark">Welcome <?php echo $s_name; ?></a>

</li>
<li><a href="logout.php" class="waves-effect waves-dark">Logout </a></li>
</ul>

<?php } else{ ?>
 <ul class="right hide-on-med-and-down">
<li><a href="#signup" class="waves-effect waves-dark">Sign Up</a></li>
<li><a href="#login" class="waves-effect waves-dark">Login</a></li>
</ul>
<?php } ?>
      

                   
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a><br>
        
                </div>
            </nav>
      
      
      
        </div>

        <!-- Mobile menu.
             You can slide it out with your finger, too :-) -->
       
       
       

        <ul id="slide-out" class="side-nav">
            <li><a href="#cook">Book a Cook</a></li>
            <li><a  href="#plate">Chef</a></li>
      
        </ul>

        <!-- Overlay navigation icon -->
        <div class="nav-icon-container">
            <div class="nav-icon"></div>
        </div>

        <!-- Overlay navigation -->
        <div class="nav-overlay-wrapper">
            <div class="nav container">
                <div class="row">
                    <div class="col s12 m10 offset-m2">
                        <ul id="nav-items">
                            <li><a href="#intro" class="waves-effect waves-light">Intro</a></li>
                            <li><a href="#atmosphere" class="waves-effect waves-light">Atmosphere</a></li>
                            <li><a href="#menu" class="waves-effect waves-light">Menu</a></li>
                            <li><a href="#reservations" class="waves-effect waves-light">Reservations</a></li>
                            <li><a href="#chef" class="waves-effect waves-light">Chef</a></li>
                            <li><a href="#events" class="waves-effect waves-light">Events</a></li>
                            <li><a href="#contact" class="waves-effect waves-light">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    
    
<div id="popup1" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Service in your area is not available.<br> Your account has been registered. You will get new updates soon.</h5></center>
  </div>
  <footer> <a href="#" class="btn js-modal-close">Close</a> </footer>
</div>


<div id="popup2" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Welcome Cook to Whutz Cookin<br><br>You are logged in as Cook , You can add new dish for sale.</h5><br>
	<a href="dashboard.php">
            <button class="btn btn-cart">Visit Dashboard</button></a>
  
	<a href="add-new-dish.php">
            <button class="btn btn-cart">Add New Dish <i class="fa fa-plus"></i></button></a>
  

  </center>
  </div>
  
</div>


<div id="popup3" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Your dish has been added for sale.<br><br>You can see all your added dishes.</h5><br>
  <a href="web-cookin.php">
<button class="btn btn-cart">See All Dishes <i class="fa fa-search"></i></button></a>
  

  </center>
  </div>
  
</div>
 

<div id="updated" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center>
  <p style="font-size: 28px;"> Your Profile Info. Has Been Updated ! </p>
  </center>
  </div>
  
</div>
	


	

	  
<div id="verify" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center>
  <h5> Your Account Has Been Verified !<br> You can login now. </h5>
  </center>
  </div>
  
</div>	  
	  


<div id="popup5" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>You must logged in<br><br>To use the services of website</h5><br>
  

  </center>
  </div>
  
</div>

<div id="del" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Your Account Registered For Delivery </h5><br>
  

  </center>
  </div>
  
</div>
		  
<div id="wrong_forget_email" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5> Please Check Your Email Id, Email Id Not Registered</h5><br>
  

  </center>
  </div>
  
</div>
		  


		  

<div id="password_change" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5> Your Account Password Has Been Changed !</h5><br>
  

  </center>
  </div>
  
</div>


<div id="email_sent_for_password" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Password Reset Email Sent To Your Email Id </h5><br>
	</center>
  </div>
  
</div>




<div id="sur" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Thanks for being a part of our survey.</br> You will get service soon.<br></h5><br>
  

  </center>
  </div>
  
</div>


<div id="inc" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Incorrect  Login  Details! Try Again</h5><br>
  </center>
  </div>
  
</div>

<div id="register_cook" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>You are now registered as a cook! </h5><br>
  </center>
  </div>
  
</div>

<div id="dup" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Email id already registered , Please use another email id.</h5><br>
  </center>
  </div>
  
</div>

<div id="register_user" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>You are now registered as a user! </h5><br>
  </center>
  </div>
  
</div>

<div id="reset" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><img src="images/logo2.png" style="width:200px;"></center>
  </header>
  <div class="modal-body">
    <center><h5>Your account is not verified.</h5><br>
  </center>
  </div>
  
</div>

<div id="popup66" class="modal-box" style="width: 50% !important; margin-left: 10% !important;">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><h4>Reset Your Password</h4></center>
  </header>
  <div class="modal-body">
<center>
  <form action="phpcode1.php" method="POST" id="create-account_form" class="box">

<div class="alert alert-danger" id="create_account_error" style="display:none"></div>

<div class="form-group">
<label for="email_create">Old Password</label>
<input type="password" class=""  id="email_create"  value="<?php echo $data['password']; ?>" disabled>
</div>
<input type="hidden" value="<?php echo $uemail; ?>" name="email">
<div class="form-group">
<label for="passwd">Enter New Password</label>
<input  type="password" data-validate="isPasswd" id="passwd" name="password" value="" required />
</div>


<?php
if($utype == 'cook')
{ ?>

<div class="submit">
<button class="btn btn-default btn-md" type="submit" id="SubmitCreate" name="cook_pwd">
<span>
<i class="fa fa-user left"></i>
Change Password cook
</span>
</button>
</div>  
   
   
<?php
}
else if($utype == 'user')
{
?>

<div class="submit">
<button class="btn btn-default btn-md" type="submit" id="SubmitCreate" name="user_pwd">
<span>
<i class="fa fa-user left"></i>
Change Password user
</span>
</button>
</div>

<?php
}
else{
?>
<div class="submit">
<button class="btn btn-default btn-md" type="submit" id="SubmitCreate" name="del_pwd">
<span>
<i class="fa fa-user left"></i>
Change Password cook
</span>
</button>
</div>
<?php
}
?>



</form></center>
  </div>
  
</div>


<div id="delivery" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><h5>Delivery Registration<br></h5></center>
  </header>
  <div class="modal-body">
    <center>
      <div class="row">
        <form class="col s12" action="phpcode1.php" method="POST" id="create-account_form">
          <div class="row">
            <div class="input-field col s4">
              <input id="last_name" type="text" name="name" class="validate">
              <label for="last_name">Your Name</label>
            </div>  
            <div class="input-field col s4">
              <input id="email" type="email" name="email" class="validate">
              <label for="email">Email</label>
            </div>
            <div class="input-field col s4">
              <input id="password" type="password" name="password" class="validate">
              <label for="password">Password</label>
            </div>
            <div class="input-field col s4">
              <input type="date" class="datepicker" name="dob" placeholder="Birth date">
            </div>
            <div class="input-field col s4">
              <input id="license" name="license" type="text" class="validate">
              <label for="ssn">License State</label>
            </div>
			<div class="input-field col s4">
              <input id="zip_code" name="zip_code" type="text" class="validate">
              <label for="zip">Zip Code</label>
            </div>
            <div class="input-field col s4">
              <input id="mobile" type="text" name="mobile" class="validate">
              <label for="mobile">Mobile</label>
            </div> 
            <div class="input-field col s4">
              <input id="car-type" type="text" name="car_type" class="validate">
              <label for="ca-type">Car Type</label>
            </div> 
            
            <div class="input-field col s4">
              <select name="travel">
                <option value="" disabled selected>Choose your option</option>
                <option value="0-5 miles">0-5 Miles</option>
                <option value="5-10 miles">5-10 Miles</option>
				<option value="10-15 miles">10-15 Miles</option>
                <option value="15-20 miles">15-20 Miles</option>
              </select>
              <label>Willing to Travel</label>
          </div>
        </div>
        
        <button name="delivery" type="submit" class="btn-large btn-bordered waves-effect waves-light transparent disabled"> Create an account
                        </button>
						</form>
      </div>


  </center>
  </div>

</div>

<!--survey form-->


<div id="survey" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <center><h5>Online Survey <br></h5></center>
  </header>
  <div class="modal-body">
    <center>
      <div class="row">
        <form class="col s12" action="phpcode1.php" method="POST" id="create-account_form">
          <div class="row">
		      
             <div class="input-field col s6">
	
              <select name="del">
                <option value="" disabled selected>Delivery Option</option>
                <option value="Cook">By Cook</option>
                <option value="Delivery Person">By Delivery Company</option>
              </select>
              <label>Your Prefer Delivery Option</label>
          </div>
		   <div class="input-field col s6">
              <input id="area_code" type="text" name="code" class="validate">
              <label for="area_code">Your Area Code</label>
            </div>
		  
            <div class="input-field col s6">
              <input id="last_name" type="text" name="dishes" class="validate">
              <label for="last_name">What kind of dishes do you prefer?</label>
            </div>  
       
         
        
        <div class="input-field col s6">
         <input id="last_name" type="text" name="comments" class="validate">
          <label for="text">Any Comments</label>
        </div>
        
        <button name="survey" type="submit" class="btn-large btn-bordered waves-effect waves-light transparent disabled"> Submit</button>
            </form>
      </div>


  </center>
  </div>

</div>
</div>
<script>
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });


    
      
</script>