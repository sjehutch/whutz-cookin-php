<?php 
include('header.php');
?>
        <!-- The first section user sees. Make sure it looks tasty -->
        <div class="section owl-section">
            <div class="owl-carousel">

                <!-- Background slides -->
				<div class="owl-cover" style="background-image:url(images/slider/tomato.jpg)"></div>
                <div class="owl-cover" style="background-image:url(images/slider/veggies.jpg)"></div>
                
            </div>
            <div class="container-wrapper valign-wrapper">

                <div class="container zip-search">
                    <h1>Fine Dining At Your Front Door</h1>
					
					<script>
function validateForm() {
    var x = document.forms["my"]["searchfor"].value;
    if (x == null || x == "") {
        alert("You must Select a Search type");
        return false;
    }
}
</script>

<?php if($u_type=='Cook' || $u_type=='User' ){ ?>
					
					<form action="all-dishes.php" name="my" onsubmit="return validateForm()" method="POST">
                    <div class="input-field col s12 m6">
                    <input id="contact-first-name" name="search_dish" type="text" class="required" style="font-weight: bold; text-align: center; font-size: 26px; ">
					            <select id="reserve-time" name="searchfor" class="required">
                                    <option value="" disabled selected>Search For</option>
                                    <option value="cook">Cook</option>
                                     <option value="dish">Dish</option>
                                </select>
					
					
					
                    <label for="contact-first-name">Search For Dish/Cook</label>
                    </div>
					
				
                    <button type="submit" name="submit_search" class="btn-large btn-bordered waves-effect waves-light transparent disabled"  >
                            Search Now !
                        </button>
						</form>
						
						
				<?php } ?>		
						
						
						
						
						
						
                </div>

                <a class="btn-floating btn-large waves-effect waves-dark" id="explore">
                    <i class="mdi-navigation-arrow-forward"></i>
                </a>
            </div>
        </div>

        <!-- Intro section -->
        <div class="section colorful-background white-text center" id="intro">
            <div class="container">
                <div class="row">
                    <div class="col s12 m10 offset-m1 l8 offset-l2 wow fadeIn">
                        <h2>Welcome</h2>
                        <p class="flow-text">
                           
                           Search for Cooks to be your private chef in your home or find Dishes being prepared in your area and have them delivered. We bring fine dining to your front door!
                        </p>
                    </div>
                </div>
            </div>
        </div>

	
	
 <!-- cook section -->
        <div class="section owl-section" id="cook">
            <div class="owl-carousel">

                <!-- Background slides -->
                <div style="background-image:url(images/chef/chef-1.jpg)"></div>
                <div style="background-image:url(images/chef/chef-2.jpg)"></div>
            </div>

            <!-- Vertically aligned container -->
            <div class="container-wrapper valign-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m10 offset-m1">
                            <div class="white-transparent black-text spacious top">
                                <h2 class="dark-wave">
                                    <img src="images/tasty-icons/0601-chef-hat_128.png" alt="Tasty icon" class="tasty-icon wow zoomIn">
                                    Book a Cook
                                </h2>
                            </div>

                            <!-- Transparent wave -->
                            <div class="transparent-divider"></div>
                            <div class="white-transparent black-text spacious bottom">
                                <p class="flow-text">
                                    Chefs can upload dishes that they create for sale or they can become a traveling chef by creating a menu and showing their availability in our book a cook section!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- plate section -->
        <div class="section owl-section" id="plate">
            <div class="owl-carousel">

                <!-- Background slides -->
                <div style="background-image:url(images/interior/interior-1.jpg)"></div>
                <div style="background-image:url(images/interior/interior-2.jpg)"></div>
            </div>

            <!-- Vertically aligned container -->
            <div class="container-wrapper valign-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m10 offset-m1">
                            <div class="white-transparent black-text spacious top">
                                <h2 class="dark-wave">
                                    <img src="images/tasty-icons/0203-coffee-love_128.png" alt="Tasty icon" class="tasty-icon wow zoomIn">
                                    Order a Plate
                                </h2>
                            </div>

                            <!-- Transparent wave -->
                            <div class="transparent-divider"></div>
                            <div class="white-transparent black-text spacious bottom">
                                <p class="flow-text">
                                    Using the site is easy simply search by entering your address or zip code and find food being prepared in your area. Our delivery drivers will bring you the fine dining experience faster than pizza delivery!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		

<?php if(isset($_SESSION['user_id'])){ ?>


<?php } else { ?>


	        <!-- register section -->
        <div class="section colorful-background white-text center" id="signup">
            <div class="container">
                <div class="row">
                    <div class="col s12 m10 offset-m1 l8 offset-l2 wow fadeIn">
                        <h2>Signup</h2>
                       <p class="flow-text">
                           
                          Register Your Self
                        </p>
					   <div class="row">

                    <!-- Contact form -->
<form class="col s12" id="rgForm" method="POST" 
 action="phpcode1.php"  novalidate>

                        <!-- The following div and its child prevent spam attacks -->
                        <div class="cant-touch-this">
                            <input type="text" name="hammertime" tabindex="-1" value="">
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="contact-first-name" name="name" type="text" placeholder="Enter Your Name" required>
                               
                            </div>
                           <div class="input-field col s12 m6">
                                <input id="contact-email" name="email" placeholder="Enter Your Email" type="email" required>
                                
                            </div>
                        </div>
						
						
						<div class="row">
                            <div class="input-field col s12 m6">
                                <input id="contact-first-name" name="password" placeholder="Password" type="password" required>
                              
                            </div>
                           <div class="input-field col s12 m6">
                                <input id="contact-email" type="number" name="zip" type="text" placeholder="Zip Code / location" required>
                                
                            </div>
                        </div>					
 <div class="row">
   <div class="input-field col s12">

                                <!-- Time select -->
                                <select id="reserve-time" name="type" required>
                                    <option value="" disabled selected>Select Account</option>
                                    <option value="Cook">Cook</option>
                                    <option value="User">User</option>
                                </select>
    </div>
</div>
				<button class="btn-large btn-bordered waves-effect waves-light transparent disabled" type="submit" name="register"> Create an account
                        </button>
                    </form>
				
					<a href="javascript:show_menu();"><button class="btn-large btn-bordered waves-effect waves-light transparent disabled" style="margin-top: 13px;"  name="register" > Register For Delivery
                    </button></a>
                </div> 
                    </div>
                </div>
            </div>
        </div>	
			
		
		
		
		
		        <!-- login section -->
        <div class="section colorful-background white-text center" id="login">
            <div class="container">
                <div class="row">
                    <div class="col s12 m10 offset-m1 l8 offset-l2 wow fadeIn">
                        <h2>Login</h2>
                       
					   <div class="row">

                    <!-- Contact form -->
<form class="col s12" id="loForm" method="POST" 
 action="phpcode1.php" novalidate>

                        <!-- The following div and its child prevent spam attacks -->
                        <div class="cant-touch-this">
                            <input type="text" name="hammertime" tabindex="-1" value="">
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="contact-first-name" name="email" placeholder="Enter Email Id" type="email" required>
                                
                            </div>
                           <div class="input-field col s12 m6">
                                <input id="contact-email" name="password" placeholder="Password" type="password" required>
                               
                            </div>
                        </div>
										
 <div class="row">
   <div class="input-field col s12">

                                <!-- Time select -->
                                <select id="reserve-time" name="type" required>
                                    <option value="" disabled selected>Select Account</option>
                                    <option value="Cook">Cook</option>
                                    <option value="User">User</option>
                                    <option value="del">Delivery</option>
                                </select>
                            </div>
     </div>
	
	 <button class="btn-large btn-bordered waves-effect waves-light transparent disabled" type="submit" name="login"> Sign in</button>
                    </form><br>
	 <h4 id="show">Forgot your password ?</h4>
<form class="col s12" id="pwdForm" method="POST" 
 action="phpcode1.php" novalidate>	 
	 
	 <div id="forget" style="display:none;">
<center><input name="email" placeholder="Enter Your Email" type="email"  required>
</center>
<br>
<button class="btn-large btn-bordered waves-effect waves-light transparent disabled" type="submit" name="forget"> Submit</button>
</div>
</form>
                </div> 
			      
                    </div>
                </div>
            </div>
        </div>		
		
		
		
		<?php } ?>
		
		
		
		
		
 <!-- Menu section -->
        <div class="section" id="menu">
            <div class="container">
                <div class="row">
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

                    <!-- First tab contents -->
                    <div id="entree" class="col s12">
                        <ul class="food-menu">
                            <li>
                                <h4>Grandma’s Brandy Pâté <small>with</small> Homemade Brioche <small>and</small> Chutney</h4>
                                Butter, Onions, Chicken Livers, Bacon Rashers, Mushrooms, Brandy, Salt and Pepper and Brioche Rolls &mdash; 15
                            </li>
                            <li>
                                <h4>Prawns, Avocado <small>and</small> Pink Grapefruit</h4>
                                Green Prawns, Pink Grapefruit, Lebanese Cucumber, Avocados, Lemon Juice and Micro Herbs &mdash; 13
                            </li>
                            <li>
                                <h4>Steamed Mussels <small>with</small> Lemongrass, Ginger <small>and</small> Chilli</h4>
                                Lemongrass Stick, Red Chilli, Piece Ginger, Coconut Milk, Fish Sauce and Mussels &mdash; 10
                            </li>
                            <li>
                                <h4>Beef Carpaccio <small>with</small> Truffle Mayonnaise</h4>
                                Beef Fillet, Rosemary Leaves, Garlic, Fresh Horseradish, Parmesan and Lemon &mdash; 9
                            </li>
                            <li>
                                <h4>Scallop Mousse <small>with</small> Lobster Sauce</h4>
                                Lobsters, Fennel Seeds, Eschallots, Carrot, Tomato Paste, White Wine, Egg Yolks and Cream &mdash; 11
                            </li>
                            <li>
                                <h4>Prawn <small>and</small> Leek Tart <small>with</small> Basil Pesto</h4>
                                Green Prawns, Basil Leaves, Parmesan, Pine Nuts, Garlic, Brown Onion, Cream and Feta &mdash; 12
                            </li>
                        </ul>
                    </div>

                    <!-- Second tab contents -->
                    <div id="main-course" class="col s12">
                        <ul class="food-menu">
                            <li>
                                <h4>Confit Duck Leg <small>with</small> honeyed Beetroot <small>and</small> Compressed Watermelon</h4>
                                Duck Marylands, Rosemary, Beetroot, Sherry Vinegar, Butter, Honey, Lemon Juice, Watermelon and
                                White Wine Vinegar &mdash; 18
                            </li>
                            <li>
                                <h4>Beef Cheeks <small>with</small> Port <small>and</small> Celeriac Purée</h4>
                                Beef Cheeks, Plain Flour, Brown Onion, Garlic, Port, Red Wine, Caster Sugar, Celeriac Cream,
                                Baby Carrot and Baby Turnip &mdash; 20
                            </li>
                            <li>
                                <h4>Rib-Eye <small>with</small> Root Vegetable Galette <small>and</small> Port Jus</h4>
                                Rib-Eye Steaks on the Bone, Olive Oil, Horseradish, Creme Fraiche, Lemon Juice, Potato, Turnip,
                                Beetroot, Carrot, Mushrooms and Eschallots &mdash; 24
                            </li>
                            <li>
                                <h4>Steamed Barramundi <small>with</small> Chilli, Spring Onion <small>and</small> Ginger</h4>
                                Barramundi Fillet, Ginger, Dry Sherry, Chinese Cabbage Leaves, Soy Sauce, White Sugar,
                                Rice and Red Chilli &mdash; 19
                            </li>
                            <li>
                                <h4>Singapore Chilli Crab</h4>
                                Blue Swimmer Crab, Brown Onion, Red Chilli, Tomato Puree, Soy Sauce and White Vinegar &mdash; 21
                            </li>
                            <li>
                                <h4>Pappardelle Pasta <small>with</small> Chorizo, Tomato <small>and</small> Fresh Herbs</h4>
                                Flour, Eggs, Vine Cherry Tomatoes, Parmesan, Chorizo Sausages, Pancetta, Garlic, Red Chilli,
                                Parsley and Rosemarin &mdash; 24
                            </li>
                        </ul>
                    </div>

                    <!-- Third tab contents -->
                    <div id="dessert" class="col s12">
                        <ul class="food-menu">
                            <li>
                                <h4>Red Velvet <small>with</small> Chocolate <small>and</small> Raspberries</h4>
                                Cream, Raspberries, Raspberry Juice, Egg, Dark Chocolate, Sugar, Butter, Vanilla
                                and Apple Cider Vinegar &mdash; 9
                            </li>
                            <li>
                                <h4>Lime <small>and</small> Coconut Sorbet <small>with</small> Pineapple <small>and</small> Meringue</h4>
                                Cream, Egg, Sugar, Lemon Juice, Butter, Plain Flour, Caster Sugar, Almond Meal, Pineapple
                                and Orange Liqueur &mdash; 11
                            </li>
                            <li>
                                <h4>Mango Pudding <small>with</small> Coconut Sago</h4>
                                Mango Puree, Caster Sugar, Gelatine, Milk, Sago, Coconut Milk, Wholemeal Flour, Plain Flour and
                                Almond &mdash; 7
                            </li>
                            <li>
                                <h4>Blackberry, Lime <small>and</small> Elderflower Tart</h4>
                                Blackberries, Pastry, Plain Flour, Mint, Egg, Butter, Caster Sugar, Lemon Juice and
                                Elderflower Liqueur &mdash; 9
                            </li>
                            <li>
                                <h4>Mille-Feuille</h4>
                                Plain Flour, Egg, Butter, Milk, Vanilla Extract, Raspberries and Caster Sugar &mdash; 8
                            </li>
                            <li>
                                <h4>White Chocolate Crème Brûlée <small>with</small> Baked Figs</h4>
                                Figs, Cream, White Chocolate, Vanilla Bean, Egg, Caster Sugar, Ginger and  Cinnamon &mdash; 9
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reservations section -->
        <div class="section colorful-background white-text center" id="reservations">
            <div class="container">
                <div class="row">
                    <div class="col s12 m10 offset-m1 l8 offset-l2 wow fadeIn">
                        <h2>Reservations</h2>
                        <p class="flow-text">
                            Reserve a spot for our thanksgiving menu selection!
                        </p>
                    </div>
                </div>
                <div class="row">

                    <!-- Reservations form -->
                    <form class="col s12" id="reserve-form" action="reservation_code.php" method="POST" novalidate>

                        <!-- The following div and its child prevent spam attacks -->
                        <div class="cant-touch-this">
                            <input type="text" name="hammertime" tabindex="-1" value="">
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="reserve-first-name" name="reserve-first-name" type="text" class="required">
                                <label for="reserve-first-name">First Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="reserve-last-name" name="reserve-last-name" type="text" class="">
                                <label for="reserve-last-name">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="reserve-email" name="reserve-email" type="email" class="validate required">
                                <label for="reserve-email">Email</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="reserve-telephone" name="reserve-telephone" type="tel" class="validate required">
                                <label for="reserve-telephone">Telephone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">

                                <!-- Datepicker -->
                                <input id="reserve-date" name="reserve-date" type="date" class="datepicker required">
                                <label for="reserve-date">Pick a Date</label>
                            </div>
                            <div class="input-field col s12 m6">

                                <!-- Time select -->
                                <select id="reserve-time" name="reserve-time" class="required">
                                    <option value="" disabled selected>Choose Your Time</option>
                                    <option value="9AM">9AM</option>
                                    <option value="10AM">10AM</option>
                                    <option value="11AM">11AM</option>
                                    <option value="12PM">12PM</option>
                                    <option value="1PM">1PM</option>
                                    <option value="2PM">2PM</option>
                                    <option value="3PM">3PM</option>
                                    <option value="4PM">4PM</option>
                                    <option value="5PM">5PM</option>
                                    <option value="6PM">6PM</option>
                                    <option value="7PM">7PM</option>
                                    <option value="8PM">8PM</option>
                                    <option value="9PM">9PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">

                                <!-- Party size select -->
                                <select id="reserve-party-size" name="reserve-party-size" class="required">
                                    <option value="" disabled selected>Party Size</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10+">10+</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn-large btn-bordered waves-effect waves-light transparent disabled" type="submit" name="action">
                            Get More Info
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact section -->
        <div class="section colorful-background white-text center" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col s12 m8 offset-m2 wow fadeIn">
                        <h2>Contact</h2>
                        <p class="flow-text">
                            We welcome your feedback contact us &mdash; <a href="mailto:restaurant@sauce.com">info@whutzcookin.com</a>
                            or use the form below.
                        </p>
                    </div>
                </div>
                <div class="row">

                    <!-- Contact form -->
                    <form class="col s12" id="contact-form" action="contact_mail.php" method="POST" novalidate>

                        <!-- The following div and its child prevent spam attacks -->
                        <div class="cant-touch-this">
                            <input type="text" name="hammertime" tabindex="-1" value="">
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="contact-first-name" name="contact-first-name" type="text" class="required">
                                <label for="contact-first-name">First Name</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="contact-last-name" name="contact-last-name" type="text" class="required">
                                <label for="contact-last-name">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="contact-email" name="contact-email" type="email" class="validate required">
                                <label for="contact-email">Email</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="contact-telephone" name="contact-telephone" type="tel" class="">
                                <label for="contact-telephone">Telephone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="contact-message" name="contact-message" class="materialize-textarea required"></textarea>
                                <label for="contact-message">Message</label>
                            </div>
                        </div>
                        <button class="btn-large btn-bordered waves-effect waves-light transparent disabled" type="submit" name="action">
                            Send
                        </button>
                    </form>
                </div>
            </div>

            <!-- Google map container -->
            <div id="map"></div>
        </div>

        <!-- Reach us section -->
        <div class="section" id="reach-us">
            <div class="container">
                <div class="row">
                    <h2 class="dark-wave">Reach us</h2>
                    <div class="col s12 m6 l3">
                        <h5>Address</h5>
                        <div class="divider"></div>
                        <address>
                            <br>
                            Dallas TX<br>
                            USA
                        </address>
                    </div>
                   
                    <div class="col s12 m6 l3">
                        <h5>Phone &amp; email</h5>
                        <div class="divider"></div>
                        <p>
                            1800WECOOK5<br>
                            <a href="mailto:info@whutzcookin.com">info@whutzcookin.com</a>
                        </p>
                    </div>
                    <div class="col s12 m6 l3 modern-connect">
                        <h5>IM</h5>
                        <div class="divider"></div>
                        <p>
                            <!-- Add your Skype link here -->
                            <a href="skype:skypeid?chat"><i class="fa fa-skype"></i> whutzcookin.skype</a><br>
                            <a href="https://twitter.com/"><i class="fa fa-twitter"></i> @whutzcookin</a><br>
                            <i class="fa fa-whatsapp"></i> whutzcookin.whatsapp<br>
                            <i class="fa fa-wechat"></i> whutzcookin.wechat
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <!-- Footer -->
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col s12 l6">
                        <h5>Instagram Feed</h5>

                        <!-- INSTANSIVE WIDGET -->
                        <script src="../instansive.com/widget/js/instansive.js"></script>
                        <iframe
                                src="http://instansive.com/widgets/ce8bf5f8fb71c3632a013164c08e1cb246626f42.html"
                                id="instansive_ce8bf5f8fb"
                                name="instansive_ce8bf5f8fb"
                                scrolling="no"
                                allowtransparency="true"
                                class="instansive-widget"
                                style="width: 100%; border: 0; overflow: hidden;">
                        </iframe>
                        Use #Whutzcookin to see your photos here!
                    </div>
                    <div class="col s12 l4 offset-l2 subscribe">
                        <h5>Subscribe</h5>
                        <p>
                            Receive our news, events pre-sale information and more. No spam, unsubscribe anytime you want.
                        </p>

                        <!-- Begin MailChimp Signup Form -->
                        <div id="mc_embed_signup">
                            <form action="http://pimmey.us11.list-manage.com/subscribe/post?u=4131d254e34d85ebd3ba25ad3&amp;id=61196261e7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_4131d254e34d85ebd3ba25ad3_61196261e7" tabindex="-1" value=""></div>
                                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                </div>
                            </form>
                        </div>
                        <!--End mc_embed_signup-->
                    </div>
                </div>
            </div>

            <!-- Footer copyright and social icons -->
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col s12 m6">
                            © 2015 <span class="bukhari-span">WHUTZ COOKIN</span>
                        </div>
                        <div class="col s12 m6">
                           <span class="social right">
                                <a href="#!"><i class="fa fa-facebook"></i></a>
                                <a href="#!"><i class="fa fa-vk"></i></a>
                                <a href="#!"><i class="fa fa-google-plus"></i></a>
                                <a href="#!"><i class="fa fa-twitter"></i></a>
                                <a href="#!"><i class="fa fa-pinterest"></i></a>
                                <a href="#!"><i class="fa fa-instagram"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
 <?php include('footer.php'); ?>