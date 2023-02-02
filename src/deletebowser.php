<?php
// ensure user arrives on page legally
if (isset($_GET['id'])) {
    require "db.php";
	
	// alert func
	function alert($msg) {
    	echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    // init vars
    $bowserID = $_GET['id'];

    $sql = "DELETE FROM Bowsers WHERE BowserNumber=$bowserID";
    
    if ($connection->query($sql) === TRUE) {
		alert("Successfully deleted Bowser $bowserID");
        header("Location: ../bowsers.php?deleted");
        exit();
    } else {
        header("Location: ../bowsers.php?error=delete");
        exit();
    }

    $connection->close();
} else {
    header("Location: ../bowsers.php?illegalnavigation");
    exit();
}
?>