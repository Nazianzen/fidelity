<?php require "includes/check_auth.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php
  include "styles.php";
  include "table_styles.php";
  ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "sidebar.php"; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "topbar.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Withdrawals</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pending Withdrawals</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Amount ($)</th>
                      <th>Payment Method</th>
                      <th>Wallet Address</th>
                      <th>Request Date</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Amount ($)</th>
                      <th>Payment Method</th>
                      <th>Wallet Address</th>
                      <th>Request Date</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    include_once "includes/db_comms.inc.php";

                    if ($pending_withdrawals_data != "no_data") {
                      while ($row = mysqli_fetch_assoc($pending_withdrawals_data)) {
                        echo "<tr>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['amount'] . "</td>
                                <td>" . $row['payment_method'] . "</td>
                                <td>" . $row['wallet_address'] . "</td>
                                <td>" . $row['request_date'] . "</td>
                                <td><a class='btn btn-success' href='includes/confirm_withdrawal.inc.php?withdrawal_id=" . $row['withdrawal_id'] . "'>Confirm</a></td>
                              </tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include "footer.php"; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <?php
  include "logout_modal.php";
  include "scripts.php";
  include "table_scripts.php";
  ?>

</body>

</html>