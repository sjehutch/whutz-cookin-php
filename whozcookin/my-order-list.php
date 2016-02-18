<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include_once("header.php");

	
$adn = mysql_fetch_array(mysql_query("SELECT * FROM  `c_user_sign_up`  WHERE user_id = '$user_id'"));
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
			 <div class="col s12 m9 wow fadeIn " style="color:#000;">				
        
				<div class="row content-box">
				<h4 class="text-left"> MY CART </h4>
					<hr/>
				
					<form action="#">
						<table class="bordered">
							<tbody>
							<tr>
								<td>Photo</td>
								<td>Dish</td>
								<td>Plates</td>
								<td>Added on</td>
								<td>Delivery Address</td>
								<td>Total</td>
								<td>Action</td>
							</tr>
							<?php
	$now_date = date("Y-m-d");
	$qq=mysql_query("SELECT * FROM `c_checkout`  where orderby = '$user_id' and date = '$now_date' and status='0' ORDER BY `id` DESC");
	
    $total = 0;
	
	while($row=mysql_fetch_assoc($qq)){
	$price = $row['total'];
	$total += $price; 
	
	?>
							
      <tr>
	    <td><?php 
		$gg = $row['product_id'];
		$hh = mysql_fetch_array(mysql_query("SELECT * FROM `c_add_dish`  where id = '$gg'"));
		?>
		<input type="hidden" value="<?php echo $row['id'] ?>" name='checkout_id' />
		<img src="<?php echo "img/".$hh['userfile_img']; ?>" class="thumbnail" class="dish-detail-img" style="width:100px;">
		
		</td>
        <td>
		<?php 
		echo $hh['dish_name'];
		 ?>
		</td>
        <td><?php echo $row['qnt']; ?> </td>
        <td>
		
		<?php 
        $oDate = strtotime($row['date']);
        $sDate = date("M d, Y",$oDate);
        echo $sDate;
		?>
		</td>
		<td><?php echo $adn['address']; ?></td>
		<td><?php echo $row['total']; ?></td>
		<td>	
	<a href="remove-product.php?id=<?php echo $row['id'];  ?>">	

<span>
<i class="fa fa-times"></i>
REMOVE DISH
</span>

</a>
		</td>
      </tr>
	   <?php } ?>
	   <tr>
	    <td>
		</td>
        <td>
		</td>
        <td></td>
        <td><b>SUB TOTAL</b></td>
		<td><b><?php echo $total; ?></b></td>
		
		<td>
		</td>
      </tr>
						</tbody>
						</table>
						
					
				</form>
				</div>
				<div class="row content-box">
				<h4 class="text-left">Delivery Method</h3>
					<hr/>
				
				
				
<form action="phpcode1.php"  method="POST">

<table class="bordered">
    <thead>
      <tr>
        <th>Select Type</th>
        <th>Select Guy</th>
        <th>Delivery Charges</th>
      </tr>
    </thead>
    <tbody>
      <tr>
<td> 
<select class="form-group col m4"  id="select_type" name="select1">
<option value="">SELECT</option>
<div id="delivery">
<option value="guy">DELIVERY GUY</option>
</div>
<div id="bycook">
<option value="cook">BY COOK</option>
</div>
</select> 
</td>
<td><!--style="display:none!important;"-->
<div id="guy">
<select class="form-group col m4" name="select2">
<?php
$ddd = mysql_query("SELECT * FROM `c_delivery`");
while($rrr=mysql_fetch_assoc($ddd)){
?>
<option value="<?php echo $rrr['id']; ?>"><?php echo $rrr['name']; ?></option>

<?php } ?>
</select>
</div>
<div id="cook">
<select class="form-group col m4" name="select3">

<option value="cook">Cook</option>

</select>
</div>
</td>
        <td>15$</td>
      </tr>
    </tbody>
</table>

<?php 
$myprofile = mysql_fetch_array(mysql_query("select * from `c_user_sign_up`  WHERE `user_id`='$user_id'"));
?>
<div class="form-group">
<label for="email_create">Address For Delivery</label>
 <textarea rows="4" cols="50" name="address" class="materialize-textarea">
 <?php echo $myprofile['address']; ?>
</textarea> 
</div>

<div style="float: right;">
<button class="btn btn-default btn-md" type="submit"  name="updatedel">
<span>
<i class="fa fa-credit-card"></i>
CHECKOUT
</span>
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

 <script>

$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

  $(document).ready(function(){
	  $("#cook").hide();
$("#delivery").click(function(){
	alert("hii");
   
});

$("#bycook").on("click",function(){
	$("#cook").show();
	$("#guy").hide();
});
  });
</script>