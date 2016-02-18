<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include_once("header.php");

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
				<h4 class="text-left">My Orders</h3>
					<hr/>
				<div class="row">
					<form action="#">
						<table class="bordered">
							<tbody>
							<tr>
       <td style="width: 13%;"><b>Photo</b></td>
        <td><b>Dish</b></td>
		<td><b>Plates</b></td>
        <td><b>Placed On</b></td>
        <td><b>Total</b></td>
        <td><b>Status of Order</b></td>
		<td><b>Rating To Delivery</b></td>
							</tr>
							
<?php
	//$now_date = date("Y-m-d");
	$qq=mysql_query("SELECT * FROM `c_checkout`  where orderby = '$user_id' and status='1' ORDER BY `id` DESC");
	while($row=mysql_fetch_assoc($qq)){
	?>
	<form action="place_order.php" data-ajax="false" method="post">
      <tr>
        <td><?php 
		$gg = $row['product_id'];
		$hh = mysql_fetch_array(mysql_query("SELECT * FROM `c_add_dish`  where id = '$gg'"));
		?>
		<input type="hidden" value="<?php echo $row['id'] ?>" name='checkout_id' />
		<img src="<?php echo "img/".$hh['userfile_img']; ?>" class="thumbnail" class="dish-detail-img" style="width:100px;">
		</td>
		<td><?php echo $hh['dish_name'];?></td>
		<td><?php echo $row['qnt']; ?></td>
        <td><?php echo $row['date']; ?></td>
		<td><?php echo $row['total']; ?></td>
		<td><?php echo $row['running_status']; ?><br>
		<?php echo $row['del_time']; ?></td>
		<td>
		
		<?php 
	$rating = $row['rating'];	
		if($rating=='0') {?>

<select id="foo">
   <option value="" disabled selected>Give Rating</option>
   <option value="rating.php?rating=1&id=<?php echo $row['id']; ?>">1 Star</option>
   <option value="rating.php?rating=2&id=<?php echo $row['id']; ?>">2 Star</option>
   <option value="rating.php?rating=3&id=<?php echo $row['id']; ?>">3 Star</option>
   <option value="rating.php?rating=4&id=<?php echo $row['id']; ?>">4 Star</option> 
   <option value="rating.php?rating=5&id=<?php echo $row['id']; ?>">5 Star</option> 
</select>

<script>
    document.getElementById("foo").onchange = function() {
        if (this.selectedIndex!==0) {
            window.location.href = this.value;
        }        
    };
</script>
	<?php } else { ?>	

		<input id="input-2c" class="rating" min="0" max="5" step="1" data-size="sm"
           data-symbol="&#xf005;" value="<?php echo $row['rating']; ?>" data-glyphicon="false" data-rating-class="rating-fa" disabled>
<?php } ?>
		</td>
      </tr>
	 </form> 
<?php } ?>
	

    </tbody>
						</table>
					
						
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
    
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg',
              showClear: false
           });
           
        $('#btn-rating-input').on('click', function() {
            $('#rating-input').rating('refresh', {
                showClear:true, 
                disabled:true
            });
        });
        
        
        $('.btn-danger').on('click', function() {
            $("#kartik").rating('destroy');
        });
        
        $('.btn-success').on('click', function() {
            $("#kartik").rating('create');
        });
        
        $('#rating-input').on('rating.change', function() {
            alert($('#rating-input').val());
        });
        
        
        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
   
</script>		
		
<script>
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
        
</script>
 <?php include('footer.php'); ?>