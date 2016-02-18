<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include('header.php');
$id = $_GET['id'];
$dish = mysql_fetch_array(mysql_query("select * from `c_add_dish` WHERE `id`='$id'"));
$hh = $dish['cook_id']; 			
$qry = mysql_fetch_array(mysql_query("SELECT * FROM `c_cook_sign_up` WHERE id = '$hh'"));
?>
 <style>

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
h2 {
  font-size: 15px;
  margin-top: 40px !important;
  text-align: left;
}
p {
  float: left;
  text-align: left;
  width: 100%;
  margin:0px;
}
td:last-child{
	color:grey;
}

.dish-detail li {
  margin: 5px 0;
  text-align: left;
}
.social > li {
  float: left;
  width: 33%;
}
.social > li > p{
	text-align:center;
}
.desc > strong {
  float: left;
  text-align: left !important;
  width: 100%;
}
 </style>
   <div class="section white-text center" id="intro">
        <div class="row">
			<div class="col s12 m3  5 wow fadeIn">						
				<?php include_once('sidebar.php'); ?>
			</div> 
           <div class="col s12 m9 wow fadeIn content-box" style="color:#000;">
				
				<h4 class="text-left" style="text-transform: uppercase; font-size: 28px; color:#000;"><?php 
				$dshname = $dish['dish_name'];
				echo $dish['dish_name']; ?>
				</h4>
						
				
				
				
				
					<hr/>
				<div class="col m5">
				<?php $image = $dish['userfile_img']; ?>
					<div class="profile card"><a href=""><img src="img/<?php echo $image; ?>" style="max-height:240px;"></a></div>
					<?php
						$dishh = $dish['id'];
						$qqn = mysql_query("SELECT * FROM `c_follow_dish`  where cook_id = '$user_id' and dish_id = '$dishh' ORDER BY `id` DESC");
						$bb = mysql_num_rows($qqn);
						?>
								
						<h4 style="color:green;">
						<center>
						FOLLOWED BY:
						<b>
						<?php echo $bb; ?>
						</b>
						</center>
						</h4>
				</div>
				<div class="col m6 offset-m1">
					
					
					<div class="row">
						<ul class="dish-detail" style="font-size: 22px;">
							<li><strong style="color:red;"><?php echo $dish['price']; ?> $</strong> <?php echo $dish['delivery']; ?></li>
							<li><b style="color:green;"><?php echo $dish['plates_left']; ?></b> Plates Left | <b style="color:green;"><?php echo $dish['Unfulfilled']; ?></b> Unfulfilled</li>
							<li><?php echo time_ago($dish['now_date']); ?></li>
							<li><b style="color:green; text-transform: uppercase; "><b style="color:black;">IT CONTAINS: </b> <?php echo $dish['contains']; ?></b></li>
							<li><b style="color:green; text-transform: uppercase; "><b style="color:black;">DISH BY:</b> <?php echo $qry['full_name']; ?></b></li>
										
							
						</ul>
						<br>
	<?php
if($u_type == 'User')
{ ?>			
<form method="POST" action="phpcode1.php" data-ajax="false" enctype="multipart/form-data">				
	<div class="row">	
<div class="col-md-6">	
<div style="">
<input type="number" value="1" name="qnt" min="1" max="<?php echo $dish['plates_left']; ?>">
				</div>
	</div>	
<input type="hidden" name="product_id" value="<?php echo $id; ?>">
<input type="hidden" name="rate" value="<?php echo $dish['price']; ?>">
<input type="hidden" name="cookid" value="<?php echo $qry['id']; ?>">

<div class="col-md-6 pull-left" >	
<div class="submit" style="margin-top: -11px;">
<button class="btn btn-default btn-md" type="submit" id="SubmitCreate" name="adddishweb">
<span>
<i class="fa fa-plus"></i>
ADD TO CART
</span>
</button>
</div>
	</div>	
	
	</div>
</form>	
<?php } else{ ?>	<?php } ?>
<br>
						
						
						<ul class="social">
							<li><p>Share</p><a href="#" onclick="postToFeed()" ><img src="img/facebook-share.png"></a></li>
							<li><p>Share</p><a 
							href="http://www.twitter.com/share?url=http://www.whutzcookin.com/dish-detail.php?id=<?php echo $id;?>" target="_blank"><img src="img/twitter-share.png"></a></li>
							<li><p>Share</p><a href="https://www.linkedin.com/shareArticle?mini=true&url=http://www.whutzcookin.com/dish-detail.php?id=<?php echo $id;?>&title=<?php echo $dshname;?>&summary=<?php echo $dish['description']; ?>" target="_blank" ><img src="img/linkdin-share.png"></a></li>
						</ul>
						
					</div>
			</div>
			<div class="desc">
				<strong>Description</strong>
				<hr/>
				<p><?php 
				$descr = $dish['description'];
				echo $dish['description']; ?></p>
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
        </div><!--
<script>
 $('.datepicker').pickadate({
    selectMonths: true, 
    selectYears: 15 
  });
        
</script>-->
 <script src="http://connect.facebook.net/en_US/all.js"></script>
<script> FB.init({appId: "1484351695206404", status: true, cookie: true});

function postToFeed() {
var obj = {
method: "feed",
redirect_uri: "http://www.whutzcookin.com/dish-detail.php",
link: "http://www.whutzcookin.com/dish-detail.php?id=<?php echo $id; ?>",
picture: "http://www.whutzcookin.com/img/<?php echo $image; ?>",
name: "Dish Name : <?php echo $dshname; ?>",
caption: "http://www.whutzcookin.com/",
description: "<?php echo $descr; ?>"
};

function callback(response) {
document.getElementById("msg").innerHTML = "Post ID: " + response["post_id"];
}

FB.ui(obj, callback);
}

</script>
 <?php include('footer.php'); ?>