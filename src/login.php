<?php
// ensure user arrives on page legally
if (isset($_POST['login'])) {
    require "../../../../SecretStuff/db.php";

    // init vars
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validation & error handling
    if (empty($email) || empty($password)) {
        header("Location: ../index.html?error=emptyfields");
        exit();
    }
	
    else {
        // select data from the user table if there's a matching umail
        $sql = "SELECT * FROM UserAccounts WHERE email=?";
        $sqlstmt = mysqli_stmt_init($connection);   // init stmt
        if (!mysqli_stmt_prepare($sqlstmt, $sql)) {
            header("Location: ../login.php?error=sqlerrorA");
            exit();
        }
        else {
            mysqli_stmt_bind_param($sqlstmt, "s", $email);  // bind sql and var
            mysqli_stmt_execute($sqlstmt);  // execute stmt
            $emailCheck = mysqli_stmt_get_result($sqlstmt); // store result
            // if a row exists in assoc array of table results.....
            if ($row = mysqli_fetch_assoc($emailCheck)) {
                $passwordCheck = password_verify($password, $row['password']); // stores boolean result of if match 
                if ($passwordCheck == false) {
                    header("Location: ../login.html?error=invalidcredentials");
                    exit();
                }
                else if ($passwordCheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['UserID'];
                    $_SESSION['userForename'] = $row['forename'];
                    $_SESSION['userSurname'] = $row['surname'];
                    $_SESSION['userEmail'] = $row['email'];
                    $_SESSION['userType'] = $row['type'];
                    $_SESSION['userCreation'] = $row['creation'];
                    $_SESSION['userBanned'] = $row['banned'];

                    header("Location: ../staff-dashboard.php?success");
                    exit();
                }
                else {
                    header("Location: ../login.html?error=invaliduser");
                    exit();
                }
            }
			else {
				header("Location: ../login.html?error=invalidcredentials");
			}
        }
    }
}
else {
    header("Location: ../login.html?illegalnavigation");
    exit();
}
?>