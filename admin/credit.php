<?php
require "includes/check_auth.php";

if (!isset($_GET['user_id'])) {
  header("Location: accounts.php?error=credit_no_user");
  exit();
}
$user_id = $_GET['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?php include "styles.php"; ?>

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
          <h1 class="h3 mb-4 text-gray-800">Credit User</h1>

          <!-- Outer Row -->
          <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login"></div>
                    <div class="col-lg-6">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Credit User</h1>
                        </div>
                        <form id="credit_form" action="includes/credit.inc.php" method="POST" class="user">
                          <!-- Form message alerts -->
                          <div class="form-group text-center">
                            <div id="form_message"></div>
                          </div>
                          <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="amount" name="amount" placeholder="Enter amount">
                          </div>
                          <button type="submit" id="form_submit" name="form_submit" class="btn btn-primary btn-user btn-block">Credit</button>
                        </form>
                      </div>
                    </div>
                  </div>
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
    ?>

    <!-- Form validation -->
    <script>
      $(document).ready(function() {
        $("#credit_form").submit(function(event) {
          event.preventDefault();
          let amount = $("#amount").val();
          let form_submit = $("#form_submit").val();

          $.ajax({
            url: "includes/credit.inc.php",
            type: "POST",
            data: {
              user_id: <?php echo $user_id; ?>,
              amount: amount,
              form_submit: form_submit
            }
          }).done(function(result) {
            if (result !== "success") {
              $("#form_message").html(result);
            } else {
              window.location.href = "accounts.php?success=credit_success";
            }
          });
        });
      })
    </script>

</body>

</html>