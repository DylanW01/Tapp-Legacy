<?php
	session_start();
	if (isset($_SESSION['userID'])) {
		header("Location: staff-dashboard.php");
		exit();
	}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">

<!--====== Title ======-->
<title>tapp - Welcome</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--====== Favicon Icon ======-->
<link rel="shortcut icon" href="assets/images/logo/favicon_io/favicon (2).ico" type="image/png">

<!--====== Animate CSS ======-->
<link rel="stylesheet" href="assets/landing-page/css/animate.css">

<!--====== Magnific Popup CSS ======-->
<link rel="stylesheet" href="assets/landing-page/css/magnific-popup.css">

<!--====== Slick CSS ======-->
<link rel="stylesheet" href="assets/landing-page/css/slick.css">

<!--====== Line Icons CSS ======-->
<link rel="stylesheet" href="assets/landing-page/css/LineIcons.css">

<!--====== Font Awesome CSS ======-->
<link rel="stylesheet" href="assets/landing-page/css/font-awesome.min.css">

<!--====== Bootstrap CSS ======-->
<link rel="stylesheet" href="assets/landing-page/css/bootstrap.min.css">

<!--====== Default CSS ======-->
<link rel="stylesheet" href="assets/landing-page/css/default.css">

<!--====== Style CSS ======-->
<link rel="stylesheet" href="assets/landing-page/css/style.css">
<!--====== Style for footer ======--> 
<style>
.content {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

.footer {
	padding: 2%;
}

.footer-clean {
  padding:50px 0;
  background-color:#fff;
  color:#4b4c4d;
}

.footer-clean h3 {
  margin-top:0;
  margin-bottom:12px;
  font-weight:bold;
  font-size:16px;
}

.footer-clean ul {
  padding:0;
  list-style:none;
  line-height:1.6;
  font-size:14px;
  margin-bottom:0;
}

.footer-clean ul a {
  color:inherit;
  text-decoration:none;
  opacity:0.8;
}

.footer-clean ul a:hover {
  opacity:1;
}

.map-container-9,
.map-container-10,
.map-container-11 {
  overflow:hidden;
  padding-bottom:56.25%;
  position:relative;
  height:0;
}

#map{
  left:0;
  top:0;
  height:100%;
  width:100%;
  position:absolute;
}
.custom-map-control-button:hover {
    background: #ebebeb;
}

.custom-map-control-button {
    background-color: #fff;
    border: 0;
    border-radius: 2px;
    box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
    margin: 10px;
    padding: 0 0.5em;
    font: 400 18px Roboto, Arial, sans-serif;
    overflow: hidden;
    height: 40px;
    cursor: pointer;
}

.footer-clean .item.social {
  text-align:right;
}

.footer-clean .item.social > a {
  font-size:24px;
  width:40px;
  height:40px;
  line-height:40px;
  display:inline-block;
  text-align:center;
  border-radius:50%;
  border:1px solid #ccc;
  margin-left:10px;
  margin-top:22px;
  color:inherit;
  opacity:0.75;
}

.footer-clean .item.social > a:hover {
  opacity:0.9;
}

@media (max-width:991px) {
  .footer-clean .item.social > a {
    margin-top:40px;
  }
}

@media (max-width:767px) {
  .footer-clean .item.social > a {
    margin-top:10px;
  }
}

.footer-clean .copyright {
  margin-top:14px;
  margin-bottom:0;
  font-size:13px;
  opacity:0.6;
}	
</style>

<script>	
	let map, infoWindow;
	function initMap() {

		// The map, centered at town center
		const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 13,
			center: { lat: 51.89965110958934, lng: -2.078196764987693 },
			streetViewControl: false,
			draggable: true,

		});

		// Sets markers and infowindow
		const officemarker = { url: "https://maps.google.com/mapfiles/kml/shapes/homegardenbusiness.png",
							  scaledSize: new google.maps.Size(30, 30)};
		const bowsermarker = { url: "https://maps.google.com/mapfiles/kml/shapes/water.png",
							  scaledSize: new google.maps.Size(30, 30)};
		const bowsermarkerHelp = { url: "https://maps.google.com/mapfiles/kml/shapes/mechanic.png",
								  scaledSize: new google.maps.Size(30, 30)};
		const bowsermarkerOffline = {url: "https://maps.google.com/mapfiles/kml/shapes/caution.png",
								  scaledSize: new google.maps.Size(30, 30)};
		const infoWindow = new google.maps.InfoWindow();

		// Links PHP file to import & display bowser markers
		<?php
			include "src/map.php";
		?>

	const office = new google.maps.Marker({
	      position: { lat: 51.888334, lng: -2.088221  },
	      map,
	      icon: officemarker,
	      title: "Head Office",
	    });

		const locationButton = document.createElement("button");

		locationButton.textContent = "Find my location";
		locationButton.classList.add("custom-map-control-button");
		map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
		locationButton.addEventListener("click", () => {
			// Try HTML5 geolocation.
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(
					(position) => {
						const pos = {
							lat: position.coords.latitude,
							lng: position.coords.longitude,
						};

						infoWindow.setPosition(pos);
						infoWindow.setContent("Location found.");
						infoWindow.open(map);
						map.setCenter(pos);
					},
					() => {
						handleLocationError(true, infoWindow, map.getCenter());
					}
				);
			} else {
				// Browser doesn't support Geolocation
				handleLocationError(false, infoWindow, map.getCenter());
			}
		});
	}

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(
				browserHasGeolocation
				? "Error: The Geolocation service failed."
				: "Error: Your browser doesn't support geolocation."
			);
			infoWindow.open(map);
		}

</script>
</head>

<body>
<!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]--> 

<!--====== PRELOADER PART START ======-->
<div class="preloader">
  <div class="loader">
    <div class="ytp-spinner">
      <div class="ytp-spinner-container">
        <div class="ytp-spinner-rotator">
          <div class="ytp-spinner-left">
            <div class="ytp-spinner-circle"></div>
          </div>
          <div class="ytp-spinner-right">
            <div class="ytp-spinner-circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--====== PRELOADER PART ENDS ======--> 

<!--====== HEADER PART START ======-->
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-f420b4b3-82bf-4819-8422-6028ab1ee447"></div>
<header class="header-area">
  <div class="navbar-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg"> <a class="navbar-brand" href="index.php"> <img src="assets/images/logo.svg" alt="Logo" style="height: 40px;"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="toggler-icon"></span> <span class="toggler-icon"></span> <span class="toggler-icon"></span> </button>
            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
              <ul id="nav" class="navbar-nav ml-auto">
                <div class="navbar-btn"> <a class="main-btn" data-scroll-nav="0" href="login.html">Staff log-in</a> </div>
              </ul>
            </div>
            <!-- navbar collapse --> 
            
          </nav>
          <!-- navbar --> 
        </div>
      </div>
      <!-- row --> 
    </div>
    <!-- container --> 
  </div>
  <!-- navbar area -->

  
  <div id="home" class="header-hero bg_cover" style="background-image: url(assets/landing-page/images/banner-bg.svg)">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="header-hero-content text-center">
            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Tapp - Water bowser management</h3>
            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">&nbsp; Supplying Water to Cheltenham&nbsp;</h2>
            <p class="text wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.8s">We operate over 50 bowsers in Cheltenham &amp; the surrounding area</p>
            <button type="button" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s" data-toggle="modal" data-target="#mapModal">View Bowser Map</button>
			<a href="Request.php"><button type="button" class="main-btn wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="1.1s" data->Send a maintenance ticket/Request a bowser</button></a></div></div>
			
          <!-- header hero content --> 
        </div>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s"> <img src="assets/landing-page/images/header-hero.png" alt="hero"> </div>
          <!-- header hero image --> 
        </div>
      </div>
      <!-- row --> 
    </div>
    <!-- container -->
    <div id="particles-1" class="particles"></div>
  </div>
  <!-- header hero --> 
</header>

<!--====== HEADER PART ENDS ======--> 

<!--====== SERVICES PART START ======-->

<section id="features" class="services-area pt-120">
  <div class="container">
    <div class="row justify-content-center" style="margin-bottom: 100px;">
      <div class="col-lg-4 col-md-7 col-sm-8">
        <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="services-icon"> <img class="shape" src="assets/landing-page/images/services-shape.svg" alt="shape"> <img class="shape-1" src="assets/landing-page/images/services-shape-1.svg" alt="shape"> <i class="lni lni-map"></i> </div>
          <div class="services-content mt-30">
            <h4 class="services-title"><a href="index.php#mapModal">View bowser locations</a></h4>
            <p class="text">All of our water bowsers can be viewed on a map so you can easily find one close to you.</p>
          </div>
        </div>
        <!-- single services --> 
      </div>
      <div class="col-lg-4 col-md-7 col-sm-8">
        <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="services-icon"> <img class="shape" src="assets/landing-page/images/services-shape.svg" alt="shape"> <img class="shape-1" src="assets/landing-page/images/services-shape-2.svg" alt="shape"> <i class="lni-cog"></i> </div>
          <div class="services-content mt-30">
            <h4 class="services-title"><a href="Request.php">Report maintenance issues</a></h4>
            <p class="text">Have a problem with our service? Send us a support ticket from your account and we'll look into it immediately.&nbsp; &nbsp; &nbsp;&nbsp;</p>
          </div>
        </div>
        <!-- single services --> 
      </div>
      <div class="col-lg-4 col-md-7 col-sm-8">
        <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
          <div class="services-icon"> <img class="shape" src="assets/landing-page/images/services-shape.svg" alt="shape"> <img class="shape-1" src="assets/landing-page/images/services-shape-3.svg" alt="shape"> <i class="lni lni-question-circle"></i> </div>
          <div class="services-content mt-30">
            <h4 class="services-title"><a href="Request.php">Request a bowser near you&nbsp;</a></h4>
            <p class="text">No bowsers available near you? Fill in a form to request a bowser near you.</p>
          </div>
        </div>
        <!-- single services --> 
      </div>
    </div>
    <!-- row --> 
  </div>
  <!-- container --> 
</section>

<!--====== SERVICES PART ENDS ======--> 

<!--====== BACK TOP TOP PART START ======--> 

<a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a> 

<!--====== BACK TOP TOP PART ENDS ======-->
<div class="footer-clean">
  <footer>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4 col-md-3 item">
          <h3>Tapp Staff</h3>
          <ul>
            <li><a href="login.html">Login To Staff Account</a></li>
            <li><a href="staff-dashboard.php">Staff Dashboard</a></li>
            <li><a href="staff.php">Manage Users</a></li>
            <li><a href="tickets.php">Maintenance Tickets</a></li>
            <li><a href="bowsers.php">Bowser Database</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-md-3 item">
          <h3>About</h3>
          <ul>
            <li><a href="index.php#mapModal">Find A Bowser</a></li>
            <li><a href="Request.php">Report An Issue</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-md-3 item">
          <h3>System Management</h3>
          <ul>
            <li><a href="https://hpanel.hostinger.com/hosting/dylanwarrell.com/advanced/git">Server Login</a></li>
            <li><a href="https://hpanel.hostinger.com/hosting/dylanwarrell.com/redirect?l=phpMyAdmin&db_name=u539298194_Tapp">Database Management</a></li>
          </ul>
        </div>
        <div class="col-lg-3 item social"> <img src="/assets/images/logo/tapp-logos_black_icon.png" width="15%">
          <p class="copyright">Tapp © 2022</p>
        </div>
      </div>
    </div>
  </footer>
</div>

<!--====== Jquery js ======--> 
<script src="assets/landing-page/js/vendor/jquery-1.12.4.min.js"></script> 
<script src="assets/landing-page/js/vendor/modernizr-3.7.1.min.js"></script> 

<!--====== Bootstrap js ======--> 
<script src="assets/landing-page/js/popper.min.js"></script> 
<script src="assets/landing-page/js/bootstrap.min.js"></script> 

<!--====== Plugins js ======--> 
<script src="assets/landing-page/js/plugins.js"></script> 

<!--====== Slick js ======--> 
<script src="assets/landing-page/js/slick.min.js"></script> 

<!--====== Ajax Contact js ======--> 
<script src="assets/landing-page/js/ajax-contact.js"></script> 

<!--====== Counter Up js ======--> 
<script src="assets/landing-page/js/waypoints.min.js"></script> 
<script src="assets/landing-page/js/jquery.counterup.min.js"></script> 

<!--====== Magnific Popup js ======--> 
<script src="assets/landing-page/js/jquery.magnific-popup.min.js"></script> 

<!--====== Scrolling Nav js ======--> 
<script src="assets/landing-page/js/jquery.easing.min.js"></script> 
<script src="assets/landing-page/js/scrolling-nav.js"></script> 

<!--====== wow js ======--> 
<script src="assets/landing-page/js/wow.min.js"></script> 

<!--====== Particles js ======--> 
<script src="assets/landing-page/js/particles.min.js"></script> 

<!--====== Main js ======--> 
<script src="assets/landing-page/js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASHU1WvCipdeZGJoIeI-TQkLKoPur3PDE&callback=initMap&libraries=&v=weekly" async></script>

</body>
	<!--Modal: Name-->
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <!--Content-->
    <div class="modal-content">

      <!--Body-->
      <div class="modal-body mb-0 p-0">
		  <h3 class="text-dark mb-0" style="margin-left: 15px; margin-top: 10px">Bowser Map</h3>
		  <div id="MapKey" style="margin-left: 15px; margin-top: 10px">
			<img width="30px" id="bowserMarker" src="https://maps.google.com/mapfiles/kml/shapes/water.png">
			<label for=bowserMarker"">Water Bowsers</label>
			<img width="30px%" id="IssueMarker" src="https://maps.google.com/mapfiles/kml/shapes/mechanic.png">
			<label for=IssueMarker"">Under Maintenance</label>
			<img width="30px" id="OfflineMarker" src="https://maps.google.com/mapfiles/kml/shapes/caution.png">
			<label for=OfflineMarker"">Bowser Unavailable</label>
			<img width="30px" id="OfficeMarker" src="https://maps.google.com/mapfiles/kml/shapes/homegardenbusiness.png">
			<label for=OfficeMarker"">Head Office</label>
			<br>Click a location to view more info
		  </div>
        <!--Google map-->
		  <div id="map-container-google-16" class="z-depth-1-half map-container-9" style="height: 500px">
          <div id="map"></div>
		  </div>

      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">

        <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">Close</button>

      </div>

    </div>
    <!--/.Content-->

  </div>
</div>
<script>
$(document).ready(function() {
			if(window.location.href.indexOf('#mapModal') != -1) {
			$('#mapModal').modal('show');
		}
	});</script>
<!--Modal: Name-->
</html>
