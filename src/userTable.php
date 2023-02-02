<?php
//load data from mysql database
include "db.php";
//Load coordinate data
$sql = "SELECT * FROM UserAccounts";
$html = $html.'var tabledata = "';
$res = mysqli_query( $connection, $sql );
while ( $row = mysqli_fetch_assoc( $res ) ) {
	
	// Add map pins
	$html = $html .'<tr><td>'.$row['forename'].'</td><td>'.$row[ 'surname'].'</td><td>'.$row['email'].'</td><td>'.$row['type'].'</td><td>'.$row['creation'].'</td></tr>';
}
$html = $html.'";';

// Adds locations to the map
echo $html;
?>