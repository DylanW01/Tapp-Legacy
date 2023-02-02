<?php
// ensure user arrives on page legally
if (isset($_POST['signup'])) {
    require "db.php";

    // init vars
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $emailVerify = $_POST['emailVerify'];
    $password = $_POST['password'];
    $passwordVerify = $_POST['passwordVerify'];
    $DOB = $_POST['DOB'];
	$type = $_POST['RoleButton'];

    // validation & error handling
    if ($email !== $emailVerify){   // checks for 2 identical emails
        header("Location: ../staff.php?error=emailverify");
        exit();
    }
    else {
        // prepared statements to tackle XSS
        $sql = "SELECT email FROM UserAccounts WHERE email=?";
        $sqlstmt = mysqli_stmt_init($connection); // prepared stmt
        if (!mysqli_stmt_prepare($sqlstmt, $sql)) {
            header("Location: ../staff.php?error=sqlerrorA");
            exit();
        }
        else {
            mysqli_stmt_bind_param($sqlstmt, "s", $email);  // bind prepared stmt
            mysqli_stmt_execute($sqlstmt);  // execute stmt
            mysqli_stmt_store_result($sqlstmt); // stores result of sql query to var
            
            $rowCount = mysqli_stmt_num_rows($sqlstmt); // sets var equal to no. of rows matched
            if ($rowCount > 0) {
                header("Location: ../staff.php?error=emailused");
                exit();
            }

            // inserting db
            else {
                $sql = "INSERT INTO UserAccounts (email, forename, surname, password, type) VALUES (?, ?, ?, ?, ?)";
                $sqlstmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($sqlstmt, $sql)) {
                    header("Location: ../staff.php?error=sqlerrorB");
                    exit();
                }
                else {
					$hashPass = password_hash($passwordVerify, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($sqlstmt, "sssss", $email, $forename, $surname, $hashPass, $type); // bind prepared stmt
                    mysqli_stmt_execute($sqlstmt); // execute stmt
					mysqli_query($connection,$sql);
                    header("Location: ../staff.php?success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($sqlstmt);    // close stmt
    mysqli_close($connection);  // close db connection
}
else {
    header("Location: ../staff.php?illegalnavigation");
    exit();
}
?>