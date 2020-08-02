<?php

if (!isset($_POST['form_submit'])) {
    // Return to page
    header("Location: ../login.php");
    exit();
} else {
    include_once "../../includes/db_connect.php";

    // Get and escape user inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username) || empty($password)){
        echo "<div class='alert alert-warning' role='alert'>Fields cannot be empty.</div>";
        exit();
    }

    // Create a template
    $sql = "SELECT * FROM `admin` WHERE `username`=?";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);

    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Check your input.</div>";
        exit();
    } else {
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, 's', $username);
        // Run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>";
            exit();
        } else {
            if (mysqli_num_rows($result) != 1) {
                echo "<div class='alert alert-warning' role='alert'>Invalid username.</div>";
                exit();
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    // $password_check = password_verify($password, $row['password']);
                    if ($password !== $row['password']) {
                        echo "<div class='alert alert-warning' role='alert'>Invalid password.</div>";
                        exit();
                    } else {
                        session_start();
                        $_SESSION['admin_id'] = $row['id'];
                        echo "success";
                        exit();
                    }
                }
            }
        }
    }
}
