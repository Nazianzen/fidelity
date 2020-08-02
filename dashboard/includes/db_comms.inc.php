<?php

require __DIR__ . "/../../includes/db_connect.php";

$user_id = $_SESSION['user_id'];

//=============== User details===============================
$all_users_sql = "SELECT * FROM `users` WHERE `user_id`='$user_id'";
$all_users_result = mysqli_query($conn, $all_users_sql);

if (!$all_users_result || mysqli_num_rows($all_users_result) < 1) {
    exit();
}
$user = mysqli_fetch_assoc($all_users_result);
// ===========================================================

// ============== Account details ============================
$all_accounts_sql = "SELECT * FROM `accounts` WHERE `user_id`='$user_id'";
$all_accounts_result = mysqli_query($conn, $all_accounts_sql);

if (!$all_accounts_result || mysqli_num_rows($all_accounts_result) < 1) {
    exit();
}
$account = mysqli_fetch_assoc($all_accounts_result);
// =============================================================

// ================== Deposits details =========================
$all_deposits_sql = "SELECT * FROM `deposits` WHERE `user_id`='$user_id'";
$all_deposits_result = mysqli_query($conn, $all_deposits_sql);

$total_deposit = 0;
$last_deposit_amount = "n/a";
$all_deposits = [];

// Total deposits
if ($all_deposits_result && $deposit_num_rows = mysqli_num_rows($all_deposits_result) > 0) {
    $deposit_counter = 0;
    while ($deposit = mysqli_fetch_assoc($all_deposits_result)) {
        $total_deposit += $deposit['amount'];
        array_push($all_deposits, $deposit);
        // Last deposit
        if ($deposit_counter == $deposit_num_rows) $last_deposit = $deposit;
        $deposit_counter++;
    }
    if(isset($last_deposit)){
        $last_deposit_amount = $last_deposit['amount'];
    }
}
// =============================================================

// ================== Withdrawals details ======================
$all_withdrawal_sql = "SELECT * FROM `withdrawals` WHERE `user_id`='$user_id'";
$all_withdrawal_result = mysqli_query($conn, $all_withdrawal_sql);

$total_withdrawal = 0;
$last_withdrawal_amount = "n/a";
$last_withdrawal_date = "n/a";
$pending_withdrawal_amount = 0;
$all_withdrawals = [];

// Total withdrawals
if ($all_withdrawal_result && $withdrawal_num_rows = mysqli_num_rows($all_withdrawal_result) > 0) {
    $withdrawal_counter = 0;
    while ($withdrawal = mysqli_fetch_assoc($all_withdrawal_result)) {
        $total_withdrawal += $withdrawal['amount'];
        array_push($all_withdrawals, $withdrawal);

        // Total pending withdrawals amount
        if ($withdrawal['is_pending'] == true) {
            $pending_withdrawal_amount += $withdrawal['amount'];
        }

        // Last withdrawal
        if ($withdrawal_counter == $withdrawal_num_rows) $last_withdrawal = $withdrawal;
        $withdrawal_counter++;
    }
    if (isset($last_withdrawal)){
        $last_withdrawal_amount = $last_withdrawal['amount'];
        $last_withdrawal_date = $last_withdrawal['request_date'];
    }
}
// =============================================================

// ================== Investments details =========================
$all_investments_sql = "SELECT * FROM `investments` WHERE `user_id`='$user_id'";
$all_investments_result = mysqli_query($conn, $all_investments_sql);

$active_investment_count = 0;
$total_investment = 0;
$active_investment_plan = "n/a";
$active_investment_amount = "n/a";
$active_investment_date = "n/a";

// Total investments
if ($all_investments_result && $investment_num_rows = mysqli_num_rows($all_investments_result) > 0) {
    $investment_counter = 0;
    $all_investments = [];
    $active_investment = [];
    while ($investment = mysqli_fetch_assoc($all_investments_result)) {
        $total_investment += $investment['amount'];
        array_push($all_investments, $investment);

        // Active investments count
        if ($investment['is_active'] == true) {
            $active_investment_count += 1;
            $active_investment = $investment;
        }

        // Last investment
        if ($investment_counter == $investment_num_rows) $last_investment = $investment;
        $investment_counter++;
    }
    if (sizeof($active_investment) < 1){
        $active_investment_plan = "n/a";
        $active_investment_amount = "n/a";
        $active_investment_date = "n/a";
    } else {
        $active_investment_plan = $active_investment['plan'];
        $active_investment_amount = $active_investment['amount'];
        $active_investment_date = $active_investment['investment_date'];
    }
}
// ================================================================

//=============== Referral details===============================
$all_referrals_sql = "SELECT * FROM `users` NATURAL JOIN `accounts` WHERE `referrer_id`='$user_id'";
$all_referrals_result = mysqli_query($conn, $all_referrals_sql);

$all_referrals = [];
$active_referrals = [];

if (!$all_referrals_result || $referral_count = mysqli_num_rows($all_referrals_result) < 1) {
} else {
    while($referral = mysqli_fetch_assoc($all_referrals_result)){
        array_push($all_referrals, $referral);
        if ($referral['balance'] > 0){
            array_push($active_referrals, $referral);
        }
    }
}
// ===========================================================
