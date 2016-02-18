<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include('header.php');
include('mapsettings.php');
?>
 <style>
 
 .btn-fav {
 
  background:rgb(150,201,92);
  width:auto;
}
 .btn-fav:hover{
 
  background:rgb(150,201,92);
  width: auto;
}
 .btn-fav:focus{
 
  background:rgb(150,201,92);
  width: auto;
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
 </style>

		

		
<?php 
$tp = $_POST['searchfor'];			
if($tp=='cook'){

?>	
	 <div class="section white-text center" id="intro">
           
                <div class="row">
<div class="col s12 m3  5 wow fadeIn">
					
<?php include('sidebar.php'); ?>
</div> 
                    <div class="col s12 m9 wow fadeIn" style="color:#000;">
						
					<form class="col s12" action="all-dishes.php" name="my" onsubmit="return validateForm()" method="POST">
						
								<div class="row">
									<div class="input-field col s12 m6">
								<input placeholder="Find item" id="search_dish" type="text" class="validate">
									</div>
									<div class="input-field col s6 m3">
										<select id="reserve-time" name="searchfor" class="required">
                                    <option value="" disabled selected>Search For</option>
                                    <option value="cook">Cook</option>
                                     <option value="dish">Dish</option>
                                </select>
										
									</div>
									<div class="input-field col s6 m3">
										<button class="btn btn-fav" type="submit" name="submit_search">Go</button>
									</div>
								</div>
							</form>
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d429047.72839961847!2d-97.17440436334346!3d32.846962640792015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1450690374929" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                   
                       
                    </div>
                </div>
            
			
			<?php 
            $nn = $_POST['search_dish'];
			$search="`full_name` LIKE '%".$nn."%' OR `location` LIKE '%".$nn."%' OR `zip` LIKE '%".$nn."%'";
			$qq=mysql_query("select * FROM `c_cook_sign_up` WHERE ". $search ." ");
			$skk = mysql_num_rows($qq);
			if ($skk < 1){
			?>
			<img src="images/noresult.png">
			<?php 
			} else{
			while($row=mysql_fetch_assoc($qq)){
			?>	
				
			<div class="row">
				<div style="border-bottom: 1px solid rgb(150, 201, 92);"  class="col s12 m9 offset-m3">
					<div class="col s12 m2 wow fadeIn">
						<img style="width: 100px; height: 100px; margin-top: 5px;" src="pro_pic/<?php echo $row['pro_pic']; ?>">
						<h6 style="color:#000;"><b></b></h6>
					</div>
					<div class="col s12 m6 wow fadeIn">
						<h5 style="color: rgb(0, 0, 0); text-align:left;"><?php echo $row['full_name']; ?></h5>
						<p style="color: rgb(0, 0, 0); text-align:left;">BIO OF COOK ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. 
Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. 
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, 
nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.</p>
					</div>
											<?php
if($u_type == 'User')
{ ?>
					<div class="col s12 m4 wow fadeIn">
					<a href="book-a-chef.php?id=<?php echo $row['id']; ?>">
						<button class="btn btn-cart">Book Cook <i class="fa fa-shopping-cart"></i></button></a><br><br>
						<button class="btn btn-cart" style="margin-bottom:20px;">FAVORITE <i class="fa fa-heart"></i></button>
						<br>
						<a href="send-message.php?id=<?php echo base64_encode($row['id']) ?>">
						<button class="btn btn-cart" style="margin-bottom:20px;">SEND MESSAGE <i class="fa fa-envelope"></i></button>
					</div>
					<?php } ?>
				</div>
			</div>

			 <?php } }?>
			
		</div>		
		
 <!-- Intro section -->
        
	<?php } else { ?>
		  <!-- Intro section -->
       
		
		
		<div class="section white-text center" id="intro">
           
                <div class="row">
					<div class="col s12 m3  5 wow fadeIn">
<?php include('sidebar.php'); ?>

</div> 
                    <div class="col s12 m9 wow fadeIn" style="color:#000;">
						<form class="col s12" action="all-dishes.php" name="my" onsubmit="return validateForm()" method="POST">
						
								<div class="row">
									<div class="input-field col s12 m6">
								<input placeholder="Find item" id="search_dish" type="text" class="validate">
									</div>
									<div class="input-field col s6 m3">
										<select id="reserve-time" name="searchfor" class="required">
                                    <option value="" disabled selected>Search For</option>
                                    <option value="cook">Cook</option>
                                     <option value="dish">Dish</option>
                                </select>
										
									</div>
									<div class="input-field col s6 m3">
										<button class="btn btn-fav" type="submit" name="submit_search">Go</button>
									</div>
								</div>
							</form>
							
				    <div id="map" style="width: 100%; height: 300px;"></div>			
					<!--
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.86626889417!2d-74.2581879779189!3d40.70531105474913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1450266275820" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
-->  
                    </div>
                </div>
			 <?php 
            $nn = $_POST['search_dish'];
			$search="`dish_name` LIKE '%".$nn."%' OR `zip` LIKE '%".$nn."%'";
			$qq=mysql_query("select * FROM `c_add_dish` WHERE ". $search ." ");
			$skk = mysql_num_rows($qq);
			if ($skk < 1){
			?>
			<img src="images/noresult.png">
			<?php 
			} else {
			
			while($row=mysql_fetch_assoc($qq)){
			$ccid = $row['cook_id'];
			
			
			$data1 = mysql_fetch_array(mysql_query("SELECT * FROM  `c_cook_sign_up` where id = '$ccid'"));
				?>	
			
			
			<div class="row">
				<div style="border-bottom: 1px solid rgb(150, 201, 92);"  class="col s12 m9 offset-m3">
					<div class="col s12 m2 wow fadeIn">
						<a href="dish-detail.php?id=<?php echo $row['id']; ?>">
						<img style="width: 100px; height: 100px; margin-top: 5px;" src="img/<?php echo $row['userfile_img']; ?>"></a>
						<?php 
						$data = mysql_query("SELECT * FROM  `user_online` where session= '$ccid' and type = 'cook'");
							$online1 = mysql_num_rows($data);
							if($online1 > 0 )
							{?>
						
						
						
						<h6 style="color:#000;"><b><i class="fa fa-circle" style ="color:#96C95C !important;font-weight:small;"></i>  <?php echo $data1['full_name']; ?></b></h6>
					
						
				
								<?php
							}
						
							else
							{
								?>
								<h6 style="color:#000;"><b> <?php echo $data1['full_name']; ?></b> ( Offline )</h6>
							<?php
							}
							?>

					
						</b></h6>
					</div>
					<div class="col s12 m6 wow fadeIn">
						<a href="dish-detail.php?id=<?php echo $row['id']; ?>">
						<h5 style="color: rgb(0, 0, 0); text-align:left;"><?php echo $row['dish_name']; ?></h5>
						</a>
						
				
						<p style="color: rgb(0, 0, 0); text-align:left;"><?php echo $row['description']; ?></p>
					</div>
					<div class="col s12 m4 wow fadeIn">
						<h5 style="color: rgb(0, 0, 0); text-align:center;"><?php echo $row['price']; ?>$</h5>
						<?php
						if($u_type == 'User')
						{ ?>	
					
					
					<br>	<br>
					<?php
					$coook = $row['cook_id'];
					$chk = mysql_query("SELECT * FROM `user_online` WHERE type = 'cook' and session='$coook'");
					$chk_online = mysql_num_rows($chk);
					if($chk_online > 0)
					{
					?>
					<a href="dish-detail.php?id=<?php echo $row['id']; ?>">
						<button class="btn btn-cart" style="margin-top: -40px;">View Details <i class="fa fa-shopping-cart"></i></button>
					</a>
					<br>
					
					
					
					<?php
					}
					else
					{
					$dish1 = $row['id'];
					
					$follow = mysql_query("SELECT * FROM `c_follow_dish` WHERE user_id = '$user_id' and dish_id = '$dish1'");
					$checkk = mysql_num_rows($follow);
					echo $checkk;
					if($checkk > 0)
					{
							?>	<a href="unfollow_dish.php?id=<?php echo $row['id']; ?>" class="btn btn-cart"> Unfollow <?php echo $dishh; ?><i class="fa fa-thumbs-o-down"></i></a>
					<?php
					}
					else
					{
					?>	<a href="follow_dish.php?id=<?php echo $row['id']; ?>" class="btn btn-cart">Follow Dish <?php echo $dishh; ?><i class="fa fa-thumbs-o-up"></i></a>
					<?php
					}
					?>
					<br>	<br>


					<?php
					}
					
					?>




					
						<form action="phpcode1.php" method="POST">
						
						<?php
						 $dish_is = $row['id']; 
							$fff = mysql_query("SELECT * FROM `favorite_dishes` WHERE user_id = '$user_id' and dish_id = '$dish_is'");
							$raww = mysql_num_rows($fff);
							
							if($raww > 0)
							{
						?>
						
						<input type="hidden" name="dish_id" value="<?php echo $row['id']; ?>">	
						<button class="btn btn-cart" name="remove_fav" style="margin-bottom:20px;">REMOVE FROM FAVORITES</button>
						<?php
							}
							else
							{
								?>
						
							<input type="hidden" name="dish_id" value="<?php echo $row['id']; ?>">	
						<button class="btn btn-cart" name="addto_favorites" style="margin-bottom:20px;">FAVORITE<i class="fa fa-heart"></i></button>
						
							<?php	
							}
							}
							?>
						</form>
					</div>
					
				</div>
			</div>
			
			 <?php } }?>
			
		</div>	

	<?php } ?>	
		
		
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