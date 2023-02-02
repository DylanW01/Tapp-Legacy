<?php
//load data from mysql database
include "db.php";
//Load coordinate data
$sql = "SELECT * FROM Requests";
$html = $html.'var tabledata = "';
$res = mysqli_query( $connection, $sql );
while ( $row = mysqli_fetch_assoc( $res ) ) {
	
	// Add map pins
	$html = $html .'<tr><td>'.$row['RequestID'].'</td><td>'.$row['Type'].'</td><td>'.$row['Priority'].'</td><td>'.$row[ 'Description'].'</td><td>'.$row['Latitude'].'</td><td>'.$row['Longitude'].'</td><td>'.$row['Status'].'</td><td>'.$row['Assignee'].'</td></tr>';
}
$html = $html.'";';

// Adds locations to the map
echo $html;
?>