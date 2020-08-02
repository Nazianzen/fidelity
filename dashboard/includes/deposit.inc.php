<?php
if (!isset($_POST['form_submit'])) {
    header("Location: ../invest.php");
    exit();
}

session_start();
require __DIR__ . "/../../includes/db_connect.php";

$user_id = $_SESSION['user_id'];

$amount = mysqli_escape_string($conn, $_POST['amount']);

if (empty($amount)) {
    echo "<div class='alert alert-warning'>Fields cannot be empty.</div>";
    exit();
}

if (!filter_var($amount, FILTER_SANITIZE_NUMBER_FLOAT)) {
    echo "<div class='alert alert-warning' role='alert'>Invalid input.</div>";
    exit();
}

// Create a template
$create_deposit_sql = "INSERT INTO `deposits` (`user_id`, `amount`) VALUES (?, ?)";

// Create a prepared statement
$create_deposit_stmt = mysqli_stmt_init($conn);
$deduct_earnings_stmt = mysqli_stmt_init($conn);

// Prepare the prepared statement
if (!mysqli_stmt_prepare($create_deposit_stmt, $create_deposit_sql)) {
    echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Check your input.</div>";
    exit();
} else {
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($create_deposit_stmt, 'ss', $user_id, $amount);

    // Run parameters inside database
    if (!mysqli_stmt_execute($create_deposit_stmt)) {
        echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>";
        exit();
    } else {
        // TODO: Send mail to admin
        echo "success";
        exit();
    }
}
