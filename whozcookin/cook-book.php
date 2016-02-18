<?php 
session_start();
if(!isset($_SESSION['name']))
{
header('location:index.php?status=login_now');
}
include('header.php');
?>
 <style>
 
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
.btn-cart {
  width: auto;
  background:rgb(150,201,92);
}
.btn-cart:hover{
	  width: auto;
  background:rgb(150,201,92);
	
}
.btn-cart:focus{
	  width: auto;
  background:rgb(150,201,92);
	
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

		

		
  <!-- Intro section -->
        <div class="section white-text center" id="intro">
           
                <div class="row">
					<div class="col s12 m3  5 wow fadeIn">
						<ul class="collection with-header">
							<li class="collection-header"><h5>MENU</h5></li>
							<li class="collection-item"><a href="">item 1</a><i class="fa fa-caret-right"></i></li>
							<li class="collection-item"><a href="">item 2</a><i class="fa fa-caret-right"></i></li>
							<li class="collection-item"><a href="">item 3</a><i class="fa fa-caret-right"></i></li>
							<li class="collection-item"><a href="">item 4</a><i class="fa fa-caret-right"></i></li>
						</ul>
					</div>
				
                <div class="col s12 m9 wow fadeIn" style="color:#000;">
					<form class="col s12">
								<div class="row">
									<div class="input-field col s12 m6">
										<input placeholder="Find item" id="first_name" type="text" class="validate">
									</div>
									<div class="input-field col s6 m3">
										<select>
										<option value="" disabled selected>Search for</option>
										<option value="1">Option 1</option>
										<option value="2">Option 2</option>
										<option value="3">Option 3</option>
										</select>
										
									</div>
									<div class="input-field col s6 m3">
										<button class="btn btn-fav" type="submit" name="action">Go</button>
									</div>
								</div>
							</form>
                     <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:515px;width:100%;'><div id='gmap_canvas' style='height:515px;width:1000px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://www.add-map.net/'>adding a google map to your website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=4e1886cb2db998f97049989ded725d506c5e951b'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(30.737741271567685,76.78010454550781),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(30.737741271567685,76.78010454550781)});infowindow = new google.maps.InfoWindow({content:'<strong></strong><br><br> chandigarh<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                       
                    </div>
                </div>
            
			<div class="row">
				<div style="border-bottom: 1px solid rgb(150, 201, 92);"  class="col s12 m9 offset-m3">
					<div class="col s12 m2 wow fadeIn">
						<img style="width: 100px; height: 100px; margin-top: 5px;" src="http://newyork.seriouseats.com/images/2014/04/20100720xian-lamb.jpg">
					</div>
					<div class="col s12 m6 wow fadeIn">
						<h5 style="color: rgb(0, 0, 0); text-align:left;">COOK NAME</h5>
						<p style="color: rgb(0, 0, 0); text-align:left;">Chinese chef and restaurateur Andrew Wong has a new cookbook out, named for his renowned London eatery, A. Wong.</p>
					</div>
					<div class="col s12 m4 wow fadeIn">
						<button class="btn btn-cart">Book <i class="fa fa-bolt"></i></button>
						<button class="btn btn-fav">FAVORITE <i class="fa fa-heart"></i></button>
					</div>
				</div>
			</div>
			<div class="row">
				<div style="border-bottom: 1px solid rgb(150, 201, 92);" class="col s12 m9 offset-m3">
					<div class="col s12 m2 wow fadeIn">
						<img style="width: 100px; height: 100px; margin-top: 5px;" src="http://newyork.seriouseats.com/images/2014/04/20100720xian-lamb.jpg">
					</div>
					<div class="col s12 m6 wow fadeIn">
						<h5 style="color: rgb(0, 0, 0); text-align:left;">COOK NAME</h5>
						<p style="color: rgb(0, 0, 0); text-align:left;">Chinese chef and restaurateur Andrew Wong has a new cookbook out, named for his renowned London eatery, A. Wong.</p>
					</div>
					<div class="col s12 m4 wow fadeIn">
						<button class="btn btn-cart">Book <i class="fa fa-bolt"></i></button>
						<button class="btn btn-fav">FAVORITE <i class="fa fa-heart"></i></button>
					</div>
				</div>
			</div>
			<div class="row">
				<div style="border-bottom: 1px solid rgb(150, 201, 92);" class="col s12 m9 offset-m3">
					<div class="col s12 m2 wow fadeIn">
						<img style="width: 100px; height: 100px; margin-top: 5px;" src="http://newyork.seriouseats.com/images/2014/04/20100720xian-lamb.jpg">
					</div>
					<div class="col s12 m6 wow fadeIn">
						<h5 style="color: rgb(0, 0, 0); text-align:left;">COOK NAME</h5>
						<p style="color: rgb(0, 0, 0); text-align:left;">Chinese chef and restaurateur Andrew Wong has a new cookbook out, named for his renowned London eatery, A. Wong.</p>
					</div>
					<div class="col s12 m4 wow fadeIn">
						<button class="btn btn-cart">Book <i class="fa fa-bolt"></i></button>
						<button class="btn btn-fav">FAVORITE <i class="fa fa-heart"></i></button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m9 offset-m3">
					<p class="footer-loader">Load More <i class="fa fa-spinner"></i></p>
				</div>
			</div>
		</div>		
		
		
		
		
		
		
		
		
 <!-- Menu section -->
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