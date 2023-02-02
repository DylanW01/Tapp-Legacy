<?php
// ensure user arrives on page legally
if ( isset( $_POST[ 'bowserID' ] ) ) {
    require "db.php";

    // init vars
    $bowserID = $_POST[ 'bowserID' ];
    $status = $_POST[ 'Status' ];
    $topup = $_POST[ 'topup' ];


    if ( $status == "Active" ) {
        $colour = 'success';
    } elseif ( $status == "Inactive" ) {
        $colour = 'danger';
    } else {
        $colour = 'warning';
    }

    $sql = "UPDATE Bowsers SET BowserLastTopUp='$topup', BowserStatus='$status', BowserColour='$colour' WHERE BowserNumber=$bowserID";
    if ( $connection->query( $sql ) === TRUE ) {
        header( "Location: ../bowsers.php?editsuccess" );
        exit();
    } else {
        header( "Location: ../bowsers.php?error=edit" );
        exit();
    }
    $connection->close();
} else {
    header( "Location: ../bowsers.php?illegalnavigation" );
    exit();
}
?>