<?php
// ensure user arrives on page legally
if ( isset( $_POST[ 'newAdminTicket' ] ) ) {
    require "db.php";

    // init vars
    $form_description = $_POST[ 'form_description' ];
    $form_Latitude = $_POST[ 'form_Latitude' ];
    $form_Longitude = $_POST[ 'form_Longitude' ];
    $Status = 'Open';
	$Type = $_POST['Type'];
	$Priority = $_POST['Priority'];
	$Assignee = $_POST['Assignee'];
	$string1 = strval($form_Latitude);
	$string2 = strval($form_Longitude);


    // inserting db
    $sql = "INSERT INTO Requests (Description, Latitude, Longitude, Status, Type, Priority, Assignee) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $sqlstmt = mysqli_stmt_init( $connection );
    if ( !mysqli_stmt_prepare( $sqlstmt, $sql ) ) {
        header( "Location: ../tickets.php?error=sqlerrorB" );
        exit();
    } else {
        mysqli_stmt_bind_param( $sqlstmt, "sssssss", $form_description, $form_Latitude, $form_Longitude, $Status, $Type, $Priority, $Assignee); // bind prepared stmt
        mysqli_stmt_execute( $sqlstmt ); // execute stmt
        mysqli_query( $connection, $sql );
        header( "Location: ../tickets.php?success" );
        exit();
    }
    mysqli_stmt_close( $sqlstmt ); // close stmt
    mysqli_close( $connection ); // close db connection
} else {
    header( "Location: ../staff.php?illegalnavigation" );
    exit();
}
?>