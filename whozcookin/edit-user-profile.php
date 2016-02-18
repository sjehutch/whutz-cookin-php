<?php
session_start(); 
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include('header.php');


if($u_type == 'User')
{
$myprofile = mysql_fetch_array(mysql_query("select * from `c_user_sign_up`  WHERE `user_id`='$user_id'"));
}
else{
$myprofile = mysql_fetch_array(mysql_query("select * from `c_cook_sign_up` WHERE `id`='$user_id'"));
}
?>
 <style>

.btn-update {
  width: auto;
  background:rgb(150,201,92);
  color:#fff;
}
.btn-update:hover{
	  width: auto;
  background:rgb(150,201,92);
  color:#fff;
	
}
.btn-update:focus{
	  width: auto;
  background:rgb(150,201,92);
	color:#fff;
}
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
@media(max-width:360px){
	.btn-update {
  background: rgb(150, 201, 92) none repeat scroll 0 0;
  width: auto;
}
	.btn-update:hover {
  background: rgb(150, 201, 92) none repeat scroll 0 0;
  width: auto;
}	
	.btn-update:focus{
  background: rgb(150, 201, 92) none repeat scroll 0 0;
  width: auto;
}
}
p {
  float: left;
  padding: 14px 0;
	text-align:center !important;
 width: 100%;
}

 </style>
   <div class="section white-text center" id="intro">
        <div class="row">
			<div class="col s12 m3  5 wow fadeIn">						
				<?php include('sidebar.php'); ?>
			</div> 
           <div class="col s12 m9 wow fadeIn  content-box" style="color:#000;">
				<div class="col m3">
					
					<div class="profile card"><a href=""><img src="pro_pic/<?php echo $myprofile['pro_pic']; ?>" style="max-height: 130px; max-width: 130px;"></a><br>
					<?php echo $myprofile['email'];?>
					</div>
					
					 				</div>
				
				<div class="col m7 offset-m1">
					<h4 class="text-left">Edit Profile</h3>
					<hr/>
					<div class="row">
		<form action="phpcode1.php" method="POST"  enctype="multipart/form-data" >
					<div class="file-field input-field">
					  <div class="btn btn-update">
						<span>upload profile Photo</span>
						<input type="file" name="userfile1">
						<input type="hidden" name="old_photo1" value="<?php echo $myprofile['pro_pic']; ?>">
					  </div>
					  <div class="file-path-wrapper">
						<input type="text"  class="file-path validate">
					  </div>
					</div>
						<div class="input-field col s6">
							<input placeholder="Your Name" name="name" value="<?php echo $myprofile['full_name']; ?>" id="first_name" type="text" >
							
						</div>
						<div class="input-field col s6">
							<input placeholder="Password" name="password" value="<?php echo $myprofile['password']; ?>" type="password" >
							
						</div>
						<div class="input-field col s6">
							<input placeholder="Phone" name="phone" value="<?php echo $myprofile['phone']; ?>" id="phone" type="text" >
							
						</div>
						
						
						<div class="input-field col s6">
							<input type="date" class="datepicker" name="dob" value="<?php echo $myprofile['dob']; ?>" id="d-o-b" placeholder="Date Of Birth">
							
						</div>
						
						<div class="input-field col s12">
							<textarea id="textarea1" class="materialize-textarea" name="address" placeholder="Address">
							 <?php echo $myprofile['address']; ?></textarea>
						</div>
						<div class="input-field col s6">
							<input placeholder="City" id="city" name="city" value="<?php echo $myprofile['city']; ?>" type="text" >	
						</div>
						<div class="input-field col s6">
							<input placeholder="State" name="state" id="state" value="<?php echo $myprofile['state']; ?>" type="text" >
							
						</div>
						<div class="input-field col s12">
							<input placeholder="Zip-Code" name="zip" value="<?php echo $myprofile['zip']; ?>" id="zip-code" type="text" >
							
						</div>
						
						<input type="hidden" value="<?php echo $user_id; ?>" name="id">
						
						<div class="input-field col s3">
					<button class="btn btn-fav" type="submit" name="Updateuser">
                            Update
                        </button>
					</div>
					
					
						
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
<script>
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
        
</script>
 <?php include('footer.php'); ?>