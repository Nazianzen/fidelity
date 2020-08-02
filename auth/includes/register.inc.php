<?php

// Check if button was clicked
if (!isset($_POST['form_submit'])) {
    // Return to page
    header("Location: ../register.php");
    exit();
} else {
    // Import database connection
    include_once '../../includes/db_connect.php';

    // Get and escape user inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $confirm_email = mysqli_real_escape_string($conn, $_POST['confirm_email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    $error_empty = false;
    $error_email = false;
    $error_database = false;
    $error_username_taken = false;
    $error_email_mismatch = false;
    $error_password_mismatch = false;

    // Check if inputs are empty
    if (empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($confirm_email) || empty($password) || empty($confirm_password)) {
        // If empty, return with error header 'empty'
        echo "<div class='alert alert-warning' role='alert'>Fields cannot be empty.</div>";
        $error_empty = true;
        exit();
    }
    // Check if email is invalid
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If not valid
        echo "<div class='alert alert-warning' role='alert'>Enter valid email.</div>";
        $error_email = true;
        exit();
    }
    // Check if email and confirm_email are not equal
    elseif ($email != $confirm_email) {
        // If not equal
        echo "<div class='alert alert-warning' role='alert'>Emails do not match.</div>";
        $error_email_mismatch = true;
        exit();
    }
    // Check if password and confirm_password are not equal
    elseif ($password != $confirm_password) {
        // If not equal
        echo "<div class='alert alert-warning' role='alert'>Passwords do not match.</div>";
        $error_password_mismatch = true;
        exit();
    } else {
        // Create an SQL template for checking users
        $sql = "SELECT * FROM users WHERE username=?";

        // Create a prepared statement
        $stmt = mysqli_stmt_init($conn);

        // Prepare the prepared statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // If prepared statement fails
            echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Please check your inputs.</div>";
            $error_database = true;
            exit();
        } else {
            // Bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, 's', $username);
            // Run parameters inside database
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $result_check = mysqli_num_rows($result);

            // Check if username is taken
            if ($result_check > 0) {
                // If taken,
                echo "<div class='alert alert-info' role='alert'>Username is already taken. Choose another.</div>";
                $error_username_taken = true;
                exit();
                // Create user.
            } else {
                session_start();
                if(isset($_SESSION['referrer'])){
                    $referrer_username = $_SESSION['referrer'];
                }

                $referrer_sql = "SELECT * FROM `users` WHERE `username`='$referrer_username'";
                $referrer_result = mysqli_query($conn, $referrer_sql);

                if(!$referrer_result || mysqli_num_rows($referrer_result) < 1){
                    $referrer_id = null;
                } else {
                    $referrer = mysqli_fetch_assoc($referrer_result);
                    $referrer_id = $referrer['user_id'];
                }

                $sql = "INSERT INTO users (`username`, `email`, `password`, `firstname`, `lastname`, `referrer_id`) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>"; //.print_r(mysqli_error_list($conn));
                    $error_database = true;
                } else {
                    // Hash the password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $hashed_password, $firstname, $lastname, $referrer_id);
                    mysqli_stmt_execute($stmt);

                    $sql = "SELECT `user_id` FROM users WHERE `username`='".$username ."'";
                    $result = mysqli_query($conn, $sql);
                    $result_check = mysqli_num_rows($result);

                    if (!$result || $result_check != 1) {
                        echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong while creating account. Try later.</div>";
                        exit();
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $user_id = $row['user_id'];
                            $sql = "INSERT INTO `accounts` (`user_id`) VALUES ('$user_id')";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong while creating account. Try later.</div>";
                                exit();
                            }
                            echo "success";
                            exit();
                        }
                    }
                }
            }
        }
    }
}
