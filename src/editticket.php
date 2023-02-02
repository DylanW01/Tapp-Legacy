<?php
// ensure user arrives on page legally
if (isset($_POST['editTicket'])) {
    require "db.php";

    // init vars
    $ticketID = $_POST['ticketID'];
    $assignee = $_POST['Assignee'];
    $status = $_POST['Status'];
	$priority = $_POST['Priority'];

    $sql = "UPDATE `Requests` SET `Status` = '$status', `Assignee` = '$assignee', `Priority` = '$priority' WHERE `Requests`.`RequestID` = $ticketID";
    if ($connection->query($sql) === TRUE) {
        header("Location: ../tickets.php?editsuccess");
        exit();
    } else {
        header("Location: ../tickets.php?error=edit");
        exit();
    }
    $connection->close();
} else {
    header("Location: ../tickets.php?illegalnavigation");
    exit();
}
?>