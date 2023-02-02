<?php
    // server & dB credentials
    $servername = "localhost";
    $dbusername = "grp20223";
    $dbpassword = "26GXroYQ]9buy$%E";
    $dbname = "tapp-data";

    // estabish connection
    $connection = new mysqli( $servername, $dbusername, $dbpassword, $dbname );

if ( $connection->connect_error ) {
  echo $connection->connect_error;
}
?>