<?php
session_start();
include("connect.php");
//print_r($_SESSION['location']);
$lotlng = $_SESSION['location']['lat'].', '.$_SESSION['location']['lng'];
//$lat = $_SESSION['location']['lat'];
//$long = $_SESSION['location']['lng'];
//$user_ip = getenv('REMOTE_ADDR');
//$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
//print_r($geo);
//$long = $geo["geoplugin_longitude"];
//$lat = $geo["geoplugin_latitude"];
?>
<script src="http://maps.google.com/maps/api/js?sensor=false"
      type="text/javascript"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	  <input id="transfer" value="" type="hidden" />
<script>


window.onload = function() {
  getLocation();
};
function getLocation() {
    if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition);
		alert(neww);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
$("#current_loc").val(position.coords.latitude + 
    ', ' + position.coords.longitude);
}
</script>
<script>
	$(function(){
		//alert('<?php //echo $_SESSION[location]; ?>');
	});
</script>
 <script type="text/javascript">
function initialize() {

var locations = 
[
['My Current Location',<?php echo $lotlng; ?>,0,'http://betaonetesting.com/cookin/red-dot.png'],

<?php
$date = date("Y-m-d");
$qq=mysql_query("SELECT * FROM `c_add_dish` ORDER BY `id` DESC ");
while($row=mysql_fetch_assoc($qq)){
?>

['<?php echo $row['dish_name']; ?>',<?php echo $row['lat']?>,<?php echo $row['long']?>,0,'http://www.whutzcookin.com/img/small/<?php echo $row['userfile_img']; ?>','web_cookin/dish-detail.php?id=<?php echo $row[id]; ?>'],
<?php } ?>
];



var map = new google.maps.Map(document.getElementById('map'), {
panControl: false,
zoomControl: true,
zoomControlOptions: {
    style: google.maps.ZoomControlStyle.LARGE,
    position: google.maps.ControlPosition.LEFT_CENTER
},
scaleControl: true,
scaleControlOptions: {
    position: google.maps.ControlPosition.BOTTOM_LEFT
},
streetViewControl: false,


  zoom: 14,
  center: new google.maps.LatLng(30.3387689, 76.38549328),
  mapTypeId: google.maps.MapTypeId.ROADMAP
});




var infowindow = new google.maps.InfoWindow();


var marker, i;


for (i = 0; i < locations.length; i++) {  
    scaledSize: new google.maps.Size(50, 50), // scaled size
    marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
	
	
	
	
	
    map: map,
	icon: locations[i][4],
	zIndex:locations[i][3],
    url:locations[i][5],
    animation: google.maps.Animation.DROP

  });
  
google.maps.event.addListener(marker, 'click', function() {
    window.location.href = this.url;
});
  
  
var infowindow = new google.maps.InfoWindow();
infowindow.setContent(locations[i][0]);
infowindow.open(map, marker);
}



}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
	<?php
function calcDistance($lat1,$Lang1, $lat2, $Lang2)
{
    //RAD
    $b1 = ($lat1/180)*M_PI;
    $b2 = ($lat2/180)*M_PI;
    $l1 = ($Lang1/180)*M_PI;
    $l2 = ($Lang2/180)*M_PI;
    //equatorial radius
    $r = 6378.137;
    // Formel
    $e = acos( sin($b1)*sin($b2) + cos($b1)*cos($b2)*cos($l2-$l1) );
    return round($r*$e, 4);
} ?>