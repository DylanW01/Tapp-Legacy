<?php
// ensure user arrives on page legally
if ( isset( $_POST[ 'UserTicketSubmit' ] ) ) {
    require "db.php";

    // init vars
    $form_description = $_POST[ 'description' ];
    $form_Latitude = $_POST[ 'latitude' ];
    $form_Longitude = $_POST[ 'longitude' ];
    $Status = 'Pending';
	$Type = $_POST['Type'];
	$Priority = "";
	//captcha
	$responsekey = $_POST['g-recaptcha-response'];
	$secretkey = "6LeyT0UfAAAAAP-S-qtnM1rAXwkFGYxjV58d0JN7";
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey";




    // inserting db
    $sql = "INSERT INTO Requests (Description, Latitude, Longitude, Status, Type, Priority) VALUES (?, ?, ?, ?, ?, ?)";
    $sqlstmt = mysqli_stmt_init( $connection );
//	$caperror = "Please complete the Captcha to continue.";
	
  $response = file_get_contents( $url );
  $response = json_decode( $response );

  /* If the user passes the capcha, continue with the creation of the account else stop and display a message to user */
  if ( $response->success ) {

  } else {
	  header( "Location: ../Request.php?noCap" );
	  echo '<script>alert("$caperror");</script>';

    return;
  }
    if ( !mysqli_stmt_prepare( $sqlstmt, $sql ) ) {
        header( "Location: ../tickets.php?error=sqlerrorB" );
        exit();
    } else {
        mysqli_stmt_bind_param( $sqlstmt, "ssssss", $form_description, $form_Latitude, $form_Longitude, $Status, $Type, $Priority); // bind prepared stmt
        mysqli_stmt_execute( $sqlstmt ); // execute stmt
        mysqli_query( $connection, $sql );
        header( "Location: ../index.php" );
        exit();
    }
    mysqli_stmt_close( $sqlstmt ); // close stmt
    mysqli_close( $connection ); // close db connection
} else {
    header( "Location: ../staff.php?illegalnavigation" );
    exit();
}
?>