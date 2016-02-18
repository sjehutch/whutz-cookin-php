<?php 
session_start();
//if(!isset($_SESSION['name']))
//{
//header('location:index.php?status=login_now');
//}
include('header.php');

$myprofile = mysql_fetch_array(mysql_query("select * from `c_cook_sign_up` WHERE `id`='$user_id'"));
?>
 <style>
 #dvPreview img
{
    filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
    
    max-width: 161px !important;
    
	
}
 .btn-fav {

  background:rgb(150,201,92);
  width: auto;
}
 .btn-fav:hover{

  background:rgb(150,201,92);
  width: auto;
}
 .btn-fav:focus{

  background:rgb(150,201,92);
  width: auto;
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
.uploadButton {
  background: url("img/photo.jpg") no-repeat scroll center center;
  cursor: pointer;
  display: block;
  height: 100px;
  width: 100px;
}
.uploadButton > input {
  visibility: collapse;
}
.uploadButton1 {
  background: url("img/video.jpg") no-repeat scroll center center;
  cursor: pointer;
  display: block;
  height: 100px;
  width: 100px !important;
}
.uploadButton1 > input {
  visibility: collapse;
}
.content-box label {
  font-size: 13px;
}
*::-moz-placeholder {
  color: rgb(146, 167, 134);
}
@media(max-width:360px){
	.btn-add {
  background: rgb(150, 201, 92) none repeat scroll 0 0;
  width: 50%;
}
	.btn-add:hover {
  background: rgb(150, 201, 92) none repeat scroll 0 0;
  width: 50%;
}	
	.btn-add:focus{
  background: rgb(150, 201, 92) none repeat scroll 0 0;
  width: 50%;
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
           <div class="col s12 m9  wow fadeIn content-box" style="color:#000;">
				<div >
					<h4 class="text-left">Add New Dish</h3>
					<hr/>
					<div class="row">
					<form action="axn_add_dish.php" method="POST" enctype="multipart/form-data">
						<div class="input-field col s6">
							<input placeholder="Dish Name"  name="dish_name" type="text" required>
							
						</div>
						<div class="input-field col s6">
							<select name="day_night" required>
								<option value="" disabled selected>Food For</option>
								 <option value="BREAKFAST">BREAKFAST</option>
  <option value="LUNCH">LUNCH</option>
  <option value="DINNER">DINNER</option>
  
							</select>
						</div>
					
						<div class="input-field col s6">
							<select name="dishtype"  required>
								<option value="" disabled selected>Choose A Dish</option>
								 <option value="Main Dish">MAIN DISH</option>
  <option value="Salad">SALAD</option>
  <option value="Dessert">DESSERT</option>
  <option value="Beverage">BEVERAGE</option>
							</select>
						</div>
						
							<div class="input-field col s6">
							<select name="temp_dish"  required>
								<option value="" disabled selected>Select Temprature of Dish</option>
									<option value="HOT">HOT</option>
									<option value="COLD">COLD</option>
									<option value="SPICY">SPICY</option>
							</select>
						</div>
						<div class="col s6" style="margin-bottom: 7px !important; margin-top: -7px !important; margin-left: -95px;">
							<p>
							<input type="checkbox" class="filled-in" id="filled-in-box7" name="delivery[]" value="delivery only" />
							<label for="filled-in-box7"> DELIVERY ONLY </label> 
							<input type="checkbox" class="filled-in" id="filled-in-box8"  name="delivery[]" value="pick up only" />
							<label for="filled-in-box8"> PICK UP ONLY</label>
							</p>
						</div>
						<p>
						<input type="checkbox" class="filled-in" id="filled-in-box1" name="contain[]" value="CONTAINS MILK, EGGS" /><label for="filled-in-box1">Contains Milk, Eggs </label> 
						<input type="checkbox" class="filled-in" id="filled-in-box2" name="contain[]" value="CONTAINS NUTS"  /><label for="filled-in-box2">Contains Nuts </label>
						<input type="checkbox" class="filled-in" id="filled-in-box3" name="contain[]" value="VEGETARIAN"   /><label for="filled-in-box3">Vegeterian </label>
						<input type="checkbox" class="filled-in" id="filled-in-box4" name="contain[]" value="CONTAINS SHELLFISH"  /><label for="filled-in-box4">Contains Shellfish </label>
						<input type="checkbox" class="filled-in" id="filled-in-box5" name="contain[]" value="GLUTEN FREE"  /><label for="filled-in-box5">Gluten Free </label>
						<input type="checkbox" class="filled-in" id="filled-in-box6" name="contain[]" value="NON VEGETARIAN"  /><label for="filled-in-box6">Non Vegeterian </label>
						</p>
						<div class="row">
						<div class="col s3">
						<label class="uploadButton" for="image">
						<input type="file" required="" class="fileupload" id="image" name="userfile_img"></label>


						</div>
						
						<div class="col s3">
						<div id="dvPreview">
</div>
						</div>
						
						<div class="col s6">
						
						</div>
						
						</div>
						
						<br>
						 <div class="col s12">
		
						<label class="uploadButton1 col s2" for="video">
						 <input type="file" ="" id="video" name="userfile_video"></label>
						 </div>
					    <div class="input-field col s12">
							<input placeholder="Other" id="other" name="other" type="text" >
							
						</div>
						<div class="input-field col s12">
							<textarea id="textarea1" class="materialize-textarea" name="description" placeholder="Description About Dish" required></textarea>
						</div>
						<div class="input-field col s12">
							<textarea id="textarea1" class="materialize-textarea" name="address" placeholder="Address For Dish" required><?php echo $myprofile['address']; ?></textarea>
						</div>
						<div class="input-field col s6">
							<input placeholder="Area Zip Code For Dish" value="<?php echo $myprofile['location']; ?>" id="Zip-code" name="zip" type="text" >
						</div>
						<div class="input-field col s6">
							<input placeholder="Number Of Plates" id="no-of-plates" name="plates_left" type="text" >
						</div>
						<div class="input-field col s6">
							<input placeholder="Unfulfilled" id="unfulfilled" name="Unfulfilled" type="text" >
						</div>
						<div class="input-field col s6">
							<input placeholder="Price" id="price" name="price" type="text" />
						</div>
					<input type="hidden" name="ckkid" value="<?php echo $user_id; ?>" />
					<div class="input-field col s6">
					<button class="btn btn-fav" type="submit" name="adddishweb">
                            Add Dish
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
                            <li class="tab col s4 wow slideInLeft"><a class="active" href="#entree">Entrée</a></li>
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