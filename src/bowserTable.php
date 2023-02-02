<?php
//load data from mysql database
include "db.php";
//Load coordinate data
$sql = "SELECT * FROM Bowsers";
$html = $html.'var tabledata = "';
$res = mysqli_query( $connection, $sql );
while ( $row = mysqli_fetch_assoc( $res ) ) {
	
	// Add map pins
	$html = $html .'<tr><td>Bowser '.$row['BowserNumber'].'</td><td>'.$row[ 'BowserLatitude'].'</td><td>'.$row['BowserLongitude'].'</td><td>'.$row['BowserSize'].'</td><td>'.$row['BowserCreation'].'<td>'.$row['BowserLastTopUp'].'</td><td>'.$row['BowserStatus'].'</td><td><a href=\"?id=3#modalEditBowser\" role=\"button\" data-bs-toggle=\"modal\"><img src=\"../assets/images/edit.png\" width=\"20\" height=\"20\"></a>    <a href=\"../src/deletebowser.php?id='.$row['BowserNumber'].'\"><img src=\"../assets/images/del.jpg\" width=\"20\" height=\"20\"></a></td></tr>';
}
$html = $html.'";';

// Adds locations to the map
echo $html;
?>