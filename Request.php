<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>Report Fault - Tapp</title>
<link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets\images\logo\favicon_io/apple-touch-icon%20(2).png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo/favicon_io/favicon-16x16%20(2).png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/favicon_io/favicon-32x32%20(2).png">
<link rel="icon" type="image/png" sizes="180x180" href="assets/images/logo/favicon_io/apple-touch-icon%20(2).png">
<link rel="icon" type="image/png" sizes="192x192" href="assets/images/logo/favicon_io/android-chrome-192x192%20(2).png">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
<link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
<link rel="stylesheet" href="assets/css/Bootstrap-4---Payment-Form.css">
<link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
<link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
<style>
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
.custom-map-control-button:hover {
    background: #ebebeb;
}
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
    padding: 50px 0;
    background-color: #fff;
    color: #4b4c4d;
    position: absolute;
    width: 100%;
}
.footer-clean h3 {
    margin-top: 0;
    margin-bottom: 12px;
    font-weight: bold;
    font-size: 16px;
}
.footer-clean ul {
    padding: 0;
    list-style: none;
    line-height: 1.6;
    font-size: 14px;
    margin-bottom: 0;
}
.footer-clean ul a {
    color: inherit;
    text-decoration: none;
    opacity: 0.8;
}
.footer-clean ul a:hover {
    opacity: 1;
}
.footer-clean .item.social {
    text-align: right;
}
.footer-clean .item.social > a {
    font-size: 24px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    border: 1px solid #ccc;
    margin-left: 10px;
    margin-top: 22px;
    color: inherit;
    opacity: 0.75;
}
.footer-clean .item.social > a:hover {
    opacity: 0.9;
}

@media (max-width:991px) {
.footer-clean .item.social > a {
    margin-top: 40px;
}
}

@media (max-width:767px) {
.footer-clean .item.social > a {
    margin-top: 10px;
}
}
.footer-clean .copyright {
    margin-top: 14px;
    margin-bottom: 0;
    font-size: 13px;
    opacity: 0.6;
}
</style>
<script>
function initialize() {

            // Creating map object
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 13,
                center: new google.maps.LatLng(51.89927747025536, -2.078082449431474),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
				streetViewControl: false,
            });
            // creates a draggable marker to the given coords
            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(51.89927747025536, -2.078082449431474),
                draggable: true,
            });
            // adds a listener to the marker
            // gets the coords when drag event ends
            // then updates the input with the new coords
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#formLat").val(evt.latLng.lat().toFixed(6));
                $("#formLon").val(evt.latLng.lng().toFixed(6));
                map.panTo(evt.latLng);
            });
            // centers the map on markers coords
            map.setCenter(vMarker.position);
            // adds the marker on the map
            vMarker.setMap(map);
			
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
	</script>
</head>

<body class="bg-gradient-primary" style="background: url(&quot;assets/images/dam-g9df675b48_1920.jpg&quot;) center / cover;">
<div class="container">
  <div class="card shadow-lg o-hidden border-0 my-5">
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-5 d-none d-lg-flex">
          <div class="flex-grow-1 bg-register-image" style="background: url(&quot;assets/images/Bowser.png&quot;) center / cover;"></div>
        </div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h4 class="text-dark mb-4">Report an issue with a Bowser</h4>
              <?php
              if ( isset( $_GET[ 'noCap' ] ) ) {
                  echo '<p>Please complete the Captcha to continue.</p>';
              }
              ?>
            </div>
            <form action="src/addrequest.php" method="post">
              <div class="mb-3">
                <select name="Type" class=form-select required>
                  <option value="" selected disabled>Issue Type</option>
                  <option value="Refill">Refill</option>
                  <option value="Damage">Damage</option>
                  <option value="Vandalism">Vandalism</option>
                  <option value="Other">Other</option>
                </select>
                <br>
                <textarea class="form-control form-control-user" placeholder="Description" name="description" required="" rows = "5"></textarea>
              </div>
              <div id="map_canvas" style="width: 100%; height: 350px; margin-bottom: 10px;"></div>
              <div class="row mb-3">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input class="form-control form-control-user" type="text" id="formLat" placeholder="Latitude" name="latitude" value=<?php echo '"'.$_GET['lat'].'"'?> required="">
                </div>
                <div class="col-sm-6">
                  <input class="form-control form-control-user" type="text" id="formLon" placeholder="Longitude" name="longitude" value=<?php echo '"'.$_GET['lng'].'"'?> required="">
                </div>
              </div>
              <div style="margin-bottom: 10px;" class="g-recaptcha brochure_form_captcha" data-sitekey="6LeyT0UfAAAAAJpCNcAvEJmxWKw3UmPx-Tv1nq_R"></div>
              <button class="btn btn-primary d-block btn-user w-100" type="submit" name = "UserTicketSubmit" >Submit Maintenance Request</button>
              <hr>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
            <li><a href="bowser-map.php">Find A Bowser</a></li>
            <li><a href="Request.php">Report An Issue</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-md-3 item">
          <h3>System Management</h3>
          <ul>
            <li><a href="https://uogs.co.uk:8443/login_up.php">Server Login</a></li>
            <li><a href="https://uogs.co.uk:8443/smb/database/list">Database Management</a></li>
          </ul>
        </div>
        <div class="col-lg-3 item social"> <img src="/assets/images/logo/tapp-logos_black_icon.png" width="15%">
          <p class="copyright">Tapp © 2022</p>
        </div>
      </div>
    </div>
  </footer>
</div>
<script src="assets/js/jquery.min.js"></script> 
<script src="https://www.google.com/recaptcha/api.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="assets/js/bs-init.js"></script> 
<script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script> 
<script src="assets/js/theme.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASHU1WvCipdeZGJoIeI-TQkLKoPur3PDE&callback=initialize&libraries=&v=weekly" async></script>
</body>
</html>