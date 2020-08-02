<?php

if (!isset($_POST['form_submit'])) {
    // Return to page
    header("Location: ../password_reset.php");
    exit();
} else {
    include_once "../../includes/db_connect.php";

    // Get and escape user inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (empty($email)) {
        echo "<div class='alert alert-warning' role='alert'>Email cannot be empty.</div>";
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<div class='alert alert-warning' role='alert'>Invalid email.</div>";
        exit();
    }

    // Create a template
    $sql = "SELECT * FROM `users` WHERE `email`=?";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);

    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Check your input.</div>";
        exit();
    } else {
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, 's', $email);
        // Run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>";
            exit();
        } else {
            if (mysqli_num_rows($result) < 1) {
                echo "<div class='alert alert-warning' role='alert'>Email is not in our records. Please sign-up.</div>";
                exit();
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    // TODO: Send reset password email to client

                    // echo "success";
                    exit();
                }
            }
        }
    }
}
