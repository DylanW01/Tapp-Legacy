<?php
//load data from mysql database
include "db.php";

$sql = "SELECT * FROM Bowsers WHERE BowserStatus='Active';";
if ($result = mysqli_query($connection, $sql)) {
	$Activerowcount = mysqli_num_rows( $result );}

$sql = "SELECT * FROM Bowsers;";
if ($result = mysqli_query($connection, $sql)) {
	$rowcount = mysqli_num_rows( $result );}

$html = $html.'var activeBowserCardData = "';
$html = $html .''.$Activerowcount.' of '.$rowcount.'";';



$sql = "SELECT * FROM Requests WHERE Status='Open';";
if ($result = mysqli_query($connection, $sql)) {
	$activeTicketRowCount = mysqli_num_rows( $result );}

$html = $html.'var openTicketValue = "';
$html = $html .$activeTicketRowCount.'";';


$sql = "SELECT * FROM Requests WHERE Status='Pending';";
if ($result = mysqli_query($connection, $sql)) {
	$pendingTicketRowCount = mysqli_num_rows( $result );}

$html = $html.'var pendingTicketValue = "';
$html = $html .$pendingTicketRowCount.'";';


$sql = "SELECT * FROM UserAccounts;";
if ($result = mysqli_query($connection, $sql)) {
	$accountRowCount = mysqli_num_rows( $result );}

$html = $html.'var staffAccountValue = "';
$html = $html .$accountRowCount.'";';

$sql = "SELECT * FROM Bowsers WHERE BowserStatus='Inactive';";
if ($result = mysqli_query($connection, $sql)) {
	$Inactiverowcount = mysqli_num_rows( $result );}

$sql = "SELECT * FROM Bowsers WHERE BowserStatus='Problematic';";
if ($result = mysqli_query($connection, $sql)) {
	$Issuerowcount = mysqli_num_rows( $result );}

echo $html;
?>