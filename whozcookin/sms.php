<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include('header.php');

$c_id = $_GET['id'];

$myprofile = mysql_fetch_array(mysql_query("select * from `c_user_sign_up` WHERE `user_id`='$c_id'"));

if($u_type == 'User')
{
$userif = mysql_fetch_array(mysql_query("select * from `c_user_sign_up`  WHERE `user_id`='$user_id'"));
}
else{
$userif = mysql_fetch_array(mysql_query("select * from `c_cook_sign_up` WHERE `id`='$user_id'"));
}
?>
 <style>
 
 
.footer-loader {
  background: rgb(150, 201, 92) none repeat scroll 0 0;
  border: 2px solid lightgreen;
  color: #000;
  font-weight: 300;
  margin: 45px auto 0;
  padding: 5px;
  width: 48%;
}
.select-wrapper input.select-dropdown {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: transparent;
  border-color: -moz-use-text-color -moz-use-text-color #9e9e9e;
  border-image: none;
  border-style: none none solid;
  border-width: medium medium 1px;
  color: rgb(147,180,134) !important;
  cursor: pointer;
  display: block;
  font-size: 1rem;
  font-weight: 400;
  height: 3rem;
  line-height: 3rem;
  margin: 0 0 15px;
  outline: medium none;
  padding: 0;
  position: relative;
  width: 100%;
}
h5 {
  color: rgb(150, 201, 92);
  font-weight: bold;
  text-align: left;
}
.collection-item {
  text-align: left;
}
h4 {
  font-size: large;
  text-align: left;
}	
.content-box {
  border: 1px solid lightgrey;
  padding: 4px 21px;
}
.input-field > input, textarea {
  background: none !important;
}
[type="checkbox"]:checked + label::before {
  border-color: transparent #26a69a #26a69a transparent;
  border-style: solid;
  border-width: 2px;
  height: 13px;
  left: -3px;
  top: -4px;
  transform: rotate(40deg);
  transform-origin: 100% 100% 0;
  width: 9px;
}
[type="checkbox"] + label::before {
  border: 2px solid #5a5a5a;
  border-radius: 1px;
  content: "";
  height: 13px;
  left: 0;
  margin-top: 2px;
  position: absolute;
  top: 0;
  transition: all 0.2s ease 0s;
  width: 13px;
  z-index: 0;
}
.filled-in[type="checkbox"]:checked + label::after {
  background-color: rgb(150, 201, 92);
  border: medium none rgb(150, 201, 92);
  height: 20px;
  top: 0;
  width: 20px;
  z-index: 0;
}

.content-box label {
  font-size: 13px;
}
*::-moz-placeholder {
  color: rgb(146, 167, 134);
}

td:last-child{
	color:grey;
}
.btn-send	{
  background: rgb(150,201,92) !important;
  margin-bottom: 9px;
}
.btn-send:hover {
  background: rgb(150,201,92) !important;
  color: #fff;
  margin-bottom: 9px;
}
.btn-send:focus {
  background: rgb(150,201,92) !important;
   margin-bottom: 9px;
  }
.message-box {
  background: rgba(197, 197, 197, 0.3) none repeat scroll 0 0;
  float: left;
  margin-top:8px;
  padding: 27px 19px;
  width: 100%;
}
input:focus{
	
border-bottom: 1px solid rgb(150,201,92) !important;
    box-shadow: 0 1px 0 0 rgb(150,201,92) !important;
}
h3 {
  color: rgb(150, 201, 92);
  font-size: 16px;
}
.user{
	width:50px;
	height:50px;
}
.msg, .time{
	
	padding:0;
	margin:0;
}
.sender {
  border-bottom: 1px solid lightgrey;
  float: left;
  margin-top: 16px;
  width: 100%;
}
 </style>
   <div class="section white-text center" id="intro">
        <div class="row">
			<div class="col s12 m3  5 wow fadeIn">						
				<?php include('sidebar.php'); ?>
			</div> 
           <div class="col s12 m9 wow fadeIn content-box" style="color:#000;">
						
				<div class="col m3">
					<!--div class="social-icons">
						<a href=""><img src="images/fb.png"/></a>
						<a href=""><img src="images/google+.png"/></a>
						<a href=""><img src="images/twitter.png"/></a>
					</div-->
					<div class="profile card"><a href=""><img src="http://www.whutzcookin.com/cookin/pro_pic/<?php echo $myprofile['pro_pic']; ?>" style="max-width: 180px; max-height: 180px; min-height: 160px; min-width: 160px;"></a></div>
					<b style="text-transform: uppercase; font-size: 18px; color: rgb(112, 171, 37);"><?php echo $myprofile['full_name']; ?></b>
				</div>
				<div class="col  m9 s12">
					<h4 class="left-align">Send Message <?php echo $u_type; ?></h3>
					<hr/>	
					<form action="phpcode1.php" method="POST"  enctype="multipart/form-data">
						<div class="message-box">
						<?php  
$qq=mysql_query("SELECT * FROM `c_sms` where (user_id = '$c_id' and to_id = '$user_id') OR (user_id = '$user_id' and to_id = '$c_id') ORDER BY `id` ASC LIMIT 10");

while($row=mysql_fetch_assoc($qq)){ 

$chk =  $row['type']; 
if($chk == 'User'){
?> 					
						
							<div class="sender pull-left">
									<div class="col m2"><img src="http://www.whutzcookin.com/cookin/pro_pic/<?php echo $myprofile['pro_pic']; ?>" class="user" style="max-width: 56px; max-height: 56px; min-height: 56px; min-width: 56px;"></div>
									<div class="col m10">
										<h3 class="left-align msg"><b><?php echo $row['message']; ?></b></h3>
										<p class="left-align time"><?php echo time_ago($row['date']); ?></p>				
									</div>
							</div>
					<?php } else{ ?>	
							<div class="sender pull-left">
									<div class="col m2"><img src="http://www.whutzcookin.com/cookin/pro_pic/<?php echo $userif['pro_pic']; ?>" class="user" style="max-width: 56px; max-height: 56px; min-height: 56px; min-width: 56px;"></div>
									<div class="col m10">
										<h3 class="left-align msg"><b><?php echo $row['message']; ?></b></h3>
										<p class="left-align time"><?php echo time_ago($row['date']); ?></p>				
									</div>
							</div>
						<?php } } ?>
							
						</div>
						    <input type="hidden" value="<?php echo $c_id; ?>" name="to">
							<div class="input-field col s12">
							
							<input placeholder="Your Message" name="message" id="message" type="text" class="validate"></div>
							
						
						<button type="submit" name="sms_cook" class="btn-large btn-bordered waves-effect waves-light transparent disabled"  >
                            Send
                        </button>
						
					
					</form>
				</div>
			</div>
        </div>

	</div>	
	
		
        <div class="section" id="menu">
            <div class="container">
                <div class="row" style="display: none ! important;">
                    <div class="col s12">
                        <h2 class="dark-wave">Menu</h2>
                        <p>HAPPY THANKSGIVING! THIS YEAR WE WILL HAVE A SPECIAL THANKSGIVING MENU AND DINNER SELECTION HOSTED BY CHEF TONEY IN DALLAS TEXAS CHECK OUT THE MENU BELOW</p>

                        <!-- Tabs -->
                        <ul class="tabs" id="menu-tabs">
                            <li class="tab col s4 wow slideInLeft"><a class="active" href="#entree">Entr?e</a></li>
                            <li class="tab col s4 wow fadeIn"><a href="#main-course">Main <span class="hide-on-small-and-down">course</span></a></li>
                            <li class="tab col s4 wow slideInRight"><a href="#dessert">Dessert</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- Contact section -->
        <div class="section colorful-background white-text center" id="contact" style="display: none ! important;">
           

            <!-- Google map container -->
            <div id="map"></div>
        </div>

 <?php include('footer.php'); ?>