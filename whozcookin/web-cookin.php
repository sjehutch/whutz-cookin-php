<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include('header.php');
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
.btn-detail {
  background: rgb(150,201,92) !important;
  color: #fff !important;
}
.btn-detail:hover {
  background: rgb(150,201,92) !important;
  color: #fff !important;
}
.btn-detail:focus {
  background: rgb(150,201,92) !important;
  color: #fff !important;
}
.card-content > h3 {
  font-size: 19px;
  margin-top: 0;
   margin-bottom: 6px;
}
.cost{
  color: red;
}
.dish-img {
  min-height: 156px !important;
}
h4 {
  font-size: large;
  text-align: left;
}
 </style>
   <div class="section white-text center" id="intro">
        <div class="row">
			<div class="col s12 m3  5 wow fadeIn">						
				<?php include('sidebar.php'); ?>
			</div> 
           <div class="col s12 m9 wow fadeIn content-box" style="color:#000;">
				<h4 class="left-align">Recently Added Dishes</h3>
					<hr/>
			
 <?php 
			$qq=mysql_query("SELECT * FROM `c_add_dish` WHERE cook_id = '$user_id' ORDER BY id DESC ");
			while($row=mysql_fetch_assoc($qq)){
		
            $hh = $row['cook_id']; 			
		    $qry = mysql_fetch_array(mysql_query("SELECT * FROM `c_cook_sign_up` WHERE id = '$hh'"));	
				?>		



			
          <div class="col s12 m4">
            <div class="card">
			<div class="card-image">
              <img src="img/<?php echo $row['userfile_img']; ?>" class="dish-img responsive-img" style="max-width: 216px; max-height: 190px !important; min-height: 190px !important; min-width: 215px;">
             
            </div>
            <div class="card-content">
			<ul class="left-align">
				<li><strong><?php echo $row['dish_name']; ?></strong></li>
				<li>DISH BY: <?php echo $qry['full_name'];?></li>
				<li><?php echo $row['plates_left']; ?> plates left | 2 Miles Away</li>
				<li>
				
				<?php 
				$rawww = $row['id'];
				$ccc = $row['cook_id'];
				$qqn = mysql_query("SELECT * FROM `c_follow_dish`  where cook_id = '$ccc' and dish_id = '$rawww' ORDER BY `id` DESC");
				$bb = mysql_num_rows($qqn);
				?>
		
				 <b style="color:green;"><strong>Followed By:</strong> <?php echo $bb; ?></b>
				
				</li>
			</ul>
				<h4><strong class="cost">$ <?php echo $row['price']; ?></strong></h4>
			</div>
			 <div class="card-action">
             <a class="btn btn-detail" href="dish-detail.php?id=<?php echo $row['id']; ?>"><i class="fa fa-plus"></i> View Details</a>
            </div>
            </div>
            
          </div>
		  
		  
		    <?php } ?>
		 
		
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