<?php
if (!isset($_POST['form_submit'])) {
    header("Location: ../invest.php");
    exit();
}

session_start();
require __DIR__ . "/../../includes/db_connect.php";

$user_id = $_SESSION['user_id'];

$amount = mysqli_escape_string($conn, $_POST['amount']);
$earnings = mysqli_escape_string($conn, $_POST['earnings']);
$wallet_address = mysqli_escape_string($conn, $_POST['wallet_address']);
$payment_method = mysqli_escape_string($conn, $_POST['payment_method']);

if (empty($amount) || empty($wallet_address) || empty($payment_method)) {
    echo "<div class='alert alert-warning'>Fields cannot be empty.</div>";
    exit();
}

if (!filter_var($amount, FILTER_SANITIZE_NUMBER_FLOAT)) {
    echo "<div class='alert alert-warning' role='alert'>Invalid input.</div>";
    exit();
}

if ($payment_method != "bitcoin" && $payment_method != "perfect money"){
    echo "<div class='alert alert-warning' role='alert'>Invalid input.</div>";
    exit();
}

if (empty($earnings)) {
    echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>";
    exit();
} elseif ($earnings < $amount) {
    echo "<div class='alert alert-warning' role='alert'>Insufficient available balance. You have not earned enough.</div>";
    exit();
}

// Create a template
$create_withdrawal_sql = "INSERT INTO `withdrawals` (`user_id`, `amount`, `payment_method`, `wallet_address`) VALUES (?, ?, ?, ?)";
$deduct_earnings_sql = "UPDATE `accounts` SET `earnings`=`earnings`-? WHERE `user_id`=?";

// Create a prepared statement
$create_withdrawal_stmt = mysqli_stmt_init($conn);
$deduct_earnings_stmt = mysqli_stmt_init($conn);

// Prepare the prepared statement
if (!mysqli_stmt_prepare($create_withdrawal_stmt, $create_withdrawal_sql) || !mysqli_stmt_prepare($deduct_earnings_stmt, $deduct_earnings_sql)) {
    echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Check your input.</div>";
    exit();
} else {
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($create_withdrawal_stmt, 'ssss', $user_id, $amount, $payment_method, $wallet_address);
    mysqli_stmt_bind_param($deduct_earnings_stmt, 'ds', floatval($amount), $user_id);

    // Run parameters inside database
    if (!mysqli_stmt_execute($create_withdrawal_stmt) || !mysqli_stmt_execute($deduct_earnings_stmt)) {
        echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>";
        exit();
    } else {
        // TODO: Send mail to client and admin
        echo "success";
        exit();
    }
}
