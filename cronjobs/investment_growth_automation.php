<?php

require __DIR__ . "/../includes/db_connect.php";

$all_investments_sql = "SELECT * FROM `investments` NATURAL JOIN `users`";

$all_investments_result = mysqli_query($conn, $all_investments_sql);

if ($all_investments_result && mysqli_num_rows($all_investments_result) > 0) {
    while ($investment = mysqli_fetch_assoc($all_investments_result)) {
        $current_datetime =  date_create(date('Y-m-d h:i:s', time()));
        $investment_datetime = date_create($investment['investment_date']);
        $date_diff = date_diff($investment_datetime, $current_datetime)->format("%a");
        if ($investment['is_active'] == true && $date_diff >= 1) {
            $earning = 0;
            $user_id = $investment['user_id'];
            $user_email = $investment['email'];
            $investment_id = $investment['investment_id'];
            $investment_plan = $investment['plan'];
            $investment_amount = $investment['amount'];

            switch ($investment_plan) {
                case "expert":
                    $expert_rate = 0.05;
                    $earning = $investment_amount * $expert_rate;
                    break;

                case "proficient":
                    $proficient_rate = 0.025;
                    $earning = $investment_amount * $proficient_rate;
                    break;
            }

            $create_earning_sql = "INSERT INTO `earnings` (`user_id`, `plan`, `invested_amount`, `earned_amount`) VALUES ($user_id, '$investment_plan', $investment_amount, $earning);";
            mysqli_query($conn, $create_earning_sql);
            $update_account_earnings_sql = "UPDATE `accounts` SET `earnings`=`earnings`+$earning WHERE `user_id`=$user_id;";
            mysqli_query($conn, $update_account_earnings_sql);
            $update_investment_status_sql = "UPDATE `investments` SET `is_active`=0 WHERE `investment_id`=$investment_id;";
            mysqli_query($conn, $update_investment_status_sql);

            // TODO: Send mail
            exit();
        }
    }
}
exit();
