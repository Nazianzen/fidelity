<?php

if (!isset($_POST['form_submit'])) {
    // Return to page
    header("Location: ../credit.php");
    exit();
} else {
    include_once __DIR__ . "/../../includes/db_connect.php";

    // Get and escape user inputs
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $deposit_status = 1;

    if (empty($user_id) || empty($amount)) {
        echo "<div class='alert alert-warning' role='alert'>Fields cannot be empty.</div>";
        exit();
    }
    if (!filter_var($amount, FILTER_SANITIZE_NUMBER_INT)) {
        echo "<div class='alert alert-warning' role='alert'>Invalid input.</div>";
        exit();
    }

    // Create a template
    $create_deposit_sql = "INSERT INTO `deposits` (`user_id`, `amount`, `is_approved`) VALUES (?, ?, ?)";
    $top_balance_sql = "UPDATE `accounts` SET `balance`=`balance`+? WHERE `user_id`=?";

    // Create a prepared statement
    $create_deposit_stmt = mysqli_stmt_init($conn);
    $top_balance_stmt = mysqli_stmt_init($conn);

    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($create_deposit_stmt, $create_deposit_sql) || !mysqli_stmt_prepare($top_balance_stmt, $top_balance_sql)) {
        echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Check your input.</div>";
        exit();
    } else {
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($create_deposit_stmt, 'ssi', $user_id, $amount, $deposit_status);
        mysqli_stmt_bind_param($top_balance_stmt, 'ds', floatval($amount), $user_id);

        // Run parameters inside database
        if (!mysqli_stmt_execute($create_deposit_stmt) || !mysqli_stmt_execute($top_balance_stmt)) {
            echo "<div class='alert alert-danger' role='alert'>Sorry, something went wrong. Try later.</div>";
            exit();
        } else {
            
            $check_deposits_sql = "SELECT * FROM `deposits` WHERE `user_id`=$user_id";
            $check_deposits_result = mysqli_query($conn, $check_deposits_sql);
            
            if($check_deposits_result && mysqli_num_rows($result) == 1){
                $sql = "SELECT * FROM `users` WHERE `user_id`=$user_id";
                $result = mysqli_query($conn, $sql);
                
                if($result && mysqli_num_rows($result) > 0){
                    $referrer = mysqli_fetch_assoc($result);
                    $referral_bonus = 0.1 * floatval($amount);
                    $referrer_id = $referrer['referrer_id'];
                    $add_referral_bonus_sql = "UPDATE `accounts` SET `referral_bonus`=`referral_bonus`+$referral_bonus WHERE `user_id`=$referrer_id";
                    mysqli_query($conn, $add_referral_bonus_sql);
                }
            }
            
            // TODO: Send mail to client
            echo "success";
            exit();
        }
    }
}
