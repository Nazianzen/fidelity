<?php
if (!isset($_GET['withdrawal_id'])) {
    header("Location: ../withdrawals.php?error=with_no_id");
    exit();
}

require __DIR__ . "/../../includes/db_connect.php";

$withdrawal_id = $_GET['withdrawal_id'];

$sql = "UPDATE `withdrawals` SET `is_pending`=0, `approval_date`=NOW() WHERE `withdrawal_id`=$withdrawal_id";

if (!mysqli_query($conn, $sql)) {
    header("Location: ../withdrawals.php?error=with_failed");
    exit();
} else {
    // TODO: Send mail to client
    header("Location: ../withdrawals.php?success=with_success");
    exit();
}
