<?php
if (!isset($_GET['deposit_id']) || !isset($_GET['user_id']) || !isset($_GET['amount'])) {
    header("Location: ../withdrawals.php?error=dep_no_id");
    exit();
}

require __DIR__ . "/../../includes/db_connect.php";

$deposit_id = $_GET['deposit_id'];
$user_id = $_GET['user_id'];
$amount = $_GET['amount'];

$sql = "UPDATE `deposits` SET `is_approved`=1 WHERE `deposit_id`=$deposit_id";
$top_balance_sql = "UPDATE `accounts` SET `balance`=`balance`+$amount WHERE `user_id`=$user_id";

if (!mysqli_query($conn, $sql) || !mysqli_query($conn, $top_balance_sql)) {
    header("Location: ../deposits.php?error=dep_failed");
    exit();
} else {
    $check_deposits_sql = "SELECT * FROM `deposits` WHERE `user_id`=$user_id";
    $check_deposits_result = mysqli_query($conn, $check_deposits_sql);

    echo mysqli_num_rows($check_deposits_result);
    print_r($check_deposits_result);

    if ($check_deposits_result && mysqli_num_rows($check_deposits_result) == 1) {
        $sql = "SELECT * FROM `users` WHERE `user_id`=$user_id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $referrer = mysqli_fetch_assoc($result);
            $referral_bonus = 0.1 * floatval($amount);
            $referrer_id = $referrer['referrer_id'];
            $add_referral_bonus_sql = "UPDATE `accounts` SET `referral_bonus`=`referral_bonus`+$referral_bonus WHERE `user_id`=$referrer_id";
            mysqli_query($conn, $add_referral_bonus_sql);
        }
    }

    // TODO: Send mail to client
    header("Location: ../deposits.php?success=dep_success");
    exit();
}
