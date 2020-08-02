<?php
if (!isset($_POST['form_submit'])) {
    header("Location: ../invest.php");
    exit();
}

session_start();
require __DIR__ . "/../../includes/db_connect.php";
include_once "db_comms.inc.php";

$user_id = $_SESSION['user_id'];

$plan = mysqli_escape_string($conn, $_POST['plan']);
$amount = mysqli_escape_string($conn, $_POST['amount']);
$balance = mysqli_escape_string($conn, $_POST['balance']);

if (empty($plan) || empty($amount)) {
    echo "<div class='alert alert-warning'>Fields cannot be empty.</div>";
    exit();
}

if ($plan != "expert" && $plan != "proficient") {
    echo "<div class='alert alert-warning' role='alert'>Invalid input.</div>";
    exit();
}

if (!filter_var($amount, FILTER_SANITIZE_NUMBER_FLOAT)) {
    echo "<div class='alert alert-warning' role='alert'>Invalid input.</div>";
    exit();
}

if ($plan == "proficient") {
    $min_amount = 100;
    if ($amount < $min_amount) {
        echo "<div class='alert alert-warning' role='alert'>Amount entered is below minimum spend amount for plan selected.</div>";
        exit();
    }
}

if ($plan == "expert") {
    $min_amount = 500;
    if ($amount < $min_amount) {
        echo "<div class='alert alert-warning' role='alert'>Amount entered is below minimum spend amount for plan selected.</div>";
        exit();
    }
}

if (empty($balance)) {
    echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>";
    exit();
} elseif ($balance < $amount) {
    echo "<div class='alert alert-warning' role='alert'>Insufficient balance. Please make deposit.</div>";
    exit();
}

if ($active_investment_count > 0){
    echo "<div class='alert alert-warning' role='alert'>You're have an active investment already.</div>";
    exit();
}

// Create a template
$create_investment_sql = "INSERT INTO `investments` (`user_id`, `amount`, `plan`) VALUES (?, ?, ?)";
$deduct_balance_sql = "UPDATE `accounts` SET `balance`=`balance`-? WHERE `user_id`=?";

// Create a prepared statement
$create_investment_stmt = mysqli_stmt_init($conn);
$deduct_balance_stmt = mysqli_stmt_init($conn);

// Prepare the prepared statement
if (!mysqli_stmt_prepare($create_investment_stmt, $create_investment_sql) || !mysqli_stmt_prepare($deduct_balance_stmt, $deduct_balance_sql)) {
    echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Check your input.</div>";
    exit();
} else {
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($create_investment_stmt, 'sss', $user_id, $amount, $plan);
    mysqli_stmt_bind_param($deduct_balance_stmt, 'ds', floatval($amount), $user_id);

    // Run parameters inside database
    if (!mysqli_stmt_execute($create_investment_stmt) || !mysqli_stmt_execute($deduct_balance_stmt)) {
        echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>";
        exit();
    } else {
        // TODO: Send mail to admin
        echo "success";
        exit();
    }
}
