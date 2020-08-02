<?php
require __DIR__ . "/../../includes/db_connect.php";

// ===================== ACCOUNTS ===============================
$all_users_sql = "SELECT * FROM `users` NATURAL JOIN `accounts`;";
$all_users_result = mysqli_query($conn, $all_users_sql);

if (!$all_users_result || mysqli_num_rows($all_users_result) < 1) {
    $users_data = "no_data";
} else {
    $users_data = $all_users_result;
}
// ================================================================


// ====================== WITHDRAWALS ==============================
$pending_withdrawals_sql = "SELECT * FROM `users` NATURAL JOIN `withdrawals` WHERE `is_pending`=1 ORDER BY `request_date` DESC;";
$pending_withdrawal_result = mysqli_query($conn, $pending_withdrawals_sql);

if (!$pending_withdrawal_result || mysqli_num_rows($pending_withdrawal_result) < 1) {
    $pending_withdrawals_data = "no_data";
} else {
    $pending_withdrawals_data = $pending_withdrawal_result;
}
// ====================================================================

// ====================== DEPOSITS ==============================
$pending_deposits_sql = "SELECT * FROM `users` NATURAL JOIN `deposits` WHERE `is_approved`=0 ORDER BY `deposit_date` DESC;";
$pending_deposits_results = mysqli_query($conn, $pending_deposits_sql);

if (!$pending_deposits_results || mysqli_num_rows($pending_deposits_results) < 1) {
    $pending_deposits_data = "no_data";
} else {
    $pending_deposits_data = $pending_deposits_results;
}
// ====================================================================
