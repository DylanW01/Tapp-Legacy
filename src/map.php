<?php
//load data from mysql database
include "db.php";
//Load coordinate data
$sql = "SELECT * FROM Bowsers";
$res = mysqli_query( $connection, $sql );

while ( $row = mysqli_fetch_assoc( $res ) ) {
	
	if ($row['BowserStatus'] == "Inactive"){
		$html = $html .
		'var marker = new google.maps.Marker({
		position: { lat: '.$row['BowserLatitude']. ', lng: '.$row['BowserLongitude'].'},
		map: map,
		icon: bowsermarkerOffline,
		title: "Bowser '.$row['BowserNumber'].'",
	});';
}
	elseif ($row['BowserStatus'] == "Problematic"){
		$html = $html .
		'var marker = new google.maps.Marker({
		position: { lat: '.$row['BowserLatitude']. ', lng: '.$row['BowserLongitude'].'},
		map: map,
		icon: bowsermarkerHelp,
		title: "Bowser '.$row['BowserNumber'].'",
	});';
	}else{
	// Add map pins
    	$html = $html .
    	'var marker = new google.maps.Marker({
		position: { lat: '.$row['BowserLatitude']. ', lng: '.$row['BowserLongitude'].'},
		map: map,
		icon: bowsermarker,
		title: "Bowser '.$row['BowserNumber'].'",
		});';}

	$html = $html. 'google.maps.event.addListener(marker, \'click\', function(){
		infoWindow.close();
		infoWindow.setContent("<h3>Bowser '.$row['BowserNumber'].'</h3><div><p><b>Status:</b> <span class=\"text-'.$row['BowserColour'].'\">'.$row['BowserStatus'].'</span><br><b>Bowser Size:</b> '.$row['BowserSize'].'<br><b>Last top-up (YYYY-MM-DD):</b> '.$row['BowserLastTopUp'].'<br><a href=\'https://www.google.com/maps/search/?api=1&query='.$row['BowserLatitude'].','.$row['BowserLongitude'].'\' target=\'_blank\'>Get Directions</a></p>");
		anchor: marker;
		infoWindow.open(map, this);
		});';}

// Adds locations to the map
echo $html;
?>