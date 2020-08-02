<?php
if (!isset($_GET['deposit_id'])) {
    header("Location: ../withdrawals.php?error=dep_del_no_id");
    exit();
}

require __DIR__ . "/../../includes/db_connect.php";

$deposit_id = $_GET['deposit_id'];

$sql = "DELETE FROM `deposits` WHERE `deposit_id`=$deposit_id";

if (!mysqli_query($conn, $sql)) {
    header("Location: ../deposits.php?error=dep_del_failed");
    exit();
} else {
    // TODO: Send mail to client
    header("Location: ../deposits.php?success=dep_del_success");
    exit();
}
