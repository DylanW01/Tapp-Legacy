<?php
// ensure user arrives on page legally
if ( isset( $_POST[ 'Size' ] ) ) {
    require "db.php";

    // init vars
    $lat = $_POST[ 'MapLatitude' ];
    $lng = $_POST[ 'MapLongitude' ];
    $size = $_POST[ 'Size' ];
    $status = 'Inactive';
	$colour = 'danger';

    // inserting into db
    $sql = "INSERT INTO Bowsers (BowserLatitude, BowserLongitude, BowserSize, BowserStatus, BowserColour) VALUES (?, ?, ?, ?, ?)";
    $sqlstmt = mysqli_stmt_init( $connection );
    if ( !mysqli_stmt_prepare( $sqlstmt, $sql ) ) {
        header( "Location: ../bowsers.php?error=sqlerror" );
        exit();
    } else {
        mysqli_stmt_bind_param( $sqlstmt, "sssss", $lat, $lng, $size, $status, $colour ); // bind params
        mysqli_stmt_execute( $sqlstmt ); // execute stmt
        mysqli_query( $connection, $sql );
		
		// create install ticket
		$sql = "INSERT INTO Requests (Description, Latitude, Longitude, Status, Type, Priority) VALUES (?, ?, ?, ?, ?, ?)";
		$sqlstmt = mysqli_stmt_init( $connection );
		if (!mysqli_stmt_prepare( $sqlstmt, $sql ) ) {
			header("Location: ../bowsers.php?error=sqlerrorTicket");
			exit();
		} else {
			// init vars
			$tDesc = "Install Bowser";
			$tStatus = "Open";
			$tType = "Installation";
			$tPriority = "Medium";
			
			mysqli_stmt_bind_param($sqlstmt, "ssssss", $tDesc, $lat, $lng, $tStatus, $tType, $tPriority); // bind params
			mysqli_stmt_execute( $sqlstmt ); // execute stmt
			mysqli_query( $connection, $sql );
			header( "Location: ../bowsers.php?success" );
			exit();
		}
		
        //header( "Location: ../bowsers.php?success" );
        //exit();
    }
    mysqli_stmt_close( $sqlstmt ); // close stmt
    mysqli_close( $connection ); // close db connection
} else {
    header( "Location: ../index.php?illegalnavigation" );
    exit();
}
?>