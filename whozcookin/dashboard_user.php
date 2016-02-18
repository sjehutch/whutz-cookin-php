<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include_once 'header.php';

 ?>

 <style>
  .caption{
 display:none !important;
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
tr:nth-child(n+2) {
  color: grey;
}
.btn-edit {
  background: rgb(150,201,92) !important;
  color: #fff;
  }
.btn-edit:hover {
  background: rgb(150,201,92) !important;
  color: #fff;

}
.btn-edit:focus {
  background: rgb(150,201,92) !important;
  color: #fff;

}

 </style>
 
 
 
   <div class="section white-text center" id="intro">
        <div class="row">
			<div class="col s12 m3  5 wow fadeIn">						
				<?php include('sidebar.php'); ?>
			</div> 
			
           <div class="col s12 m9 wow fadeIn content-box" style="color:#000;">
		 	
				<div class="col m3">
					<?php $myprofile = mysql_fetch_array(mysql_query("select * from `c_user_sign_up` WHERE `user_id`='$user_id'"));
					?>
					<div class="profile card">
					<a href=""><img src="http://www.whutzcookin.com/cookin/pro_pic/<?php echo $myprofile['pro_pic']; ?>" style="max-height: 130px; max-width: 130px;"></a>
					
				
				</div>
				
				</div>
				<div class="col m5" style="margin-top: 25px !important;">
				<h5>
				Welcome <?php echo $myprofile['full_name']; ?>
				 <?php 
				$myprofile1 = mysql_query("select * from `user_online` WHERE `session`='$user_id' and type='user'");	
			
				if($myprofile1 > 0)
				{?>
					

			 <b style="font-size: 1rem;line-height: 110%;color:#000;"> <i class="fa fa-circle" style="color:#96C95C !important;font-weight:small;"></i> Active</b>
					<?php
				}
			
				else{?>
					
				<?php }
				?>
				</h5>
				
				
				<br/>
				<a href="edit-user-profile.php" class="btn btn-edit pull-right" style="margin-right: 185px !important; margin-bottom: 20px;">Edit Profile</a>
				
				
				
				
			
				
				</div>
				
			</div>
			  <div class="col s12 m9 wow fadeIn content-box" style="color:#000;">
				<h4 class="text-left">MY FAVORITE DISHES</h4>
					<hr/>
				<div class="row">
					
						<table class="bordered">
							<tbody>
							<tr>
       <td style="width: 13%;"><b>Dish Name</b></td>
        <td><b>Date</b></td> 
		<td><b>Cook</b></td>
		 <td><b>Price</b></td>
		
		</tr>
							
			<?php	
			$qq=mysql_query("SELECT * FROM `favorite_dishes` WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 5");
			while($row=mysql_fetch_assoc($qq))
			{	
				?>		
	
         <tr>
	    <td>
		<?php
		$dish_idd = $row['dish_id'];
	
		$dissh = mysql_fetch_array(mysql_query("SELECT * FROM `c_add_dish` where id = '$dish_idd'"));
		echo $dissh['dish_name'];
		?>
		
		</td>
        <td> <?php echo $row['date']; ?> </td>
        <td>
		<?php
		$cook_idd = $dissh['cook_id'];
		$coook = mysql_fetch_array(mysql_query("SELECT * FROM `c_cook_sign_up` where id = '$cook_idd'"));
		 echo $coook['full_name']; ?>
		</td>
		<td>
		$ <?php echo $dissh['price']; ?>
     </td>
	 <td>
	 <form action="phpcode1.php" method="post">
	 <input type="hidden" name="dish_id" value="<?php echo $row['dish_id']; ?>">
	 <button class="btn btn-cart" name="remove_fav" style="margin-bottom:20px;">REMOVE</button>
	 </form>
	 </td>
 </tr>
<?php }?>		
     

    </tbody>
						</table>
						
				</div>
			
		<br/>
<br/>		
			

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
                            <li class="tab col s4 wow slideInLeft"><a class="active" href="#entree">Entree</a></li>
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