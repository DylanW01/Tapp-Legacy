<?php
//load data from mysql database
include "db.php";
//Load coordinate data
$sql = "SELECT * FROM Bowsers";
$html = $html.'var tabledata = "';
$res = mysqli_query( $connection, $sql );
while ( $row = mysqli_fetch_assoc( $res ) ) {
	
	// Add map pins
	$html = $html .'<tr><td>Bowser '.$row['BowserNumber'].'</td><td>'.$row['BowserSize'].'</td><td>'.$row['BowserCreation'].'<td>'.$row['BowserLastTopUp'].'</td</tr>';
}
$html = $html.'";';

// Adds locations to the map
echo $html;
?>