<?php
require "../auth/check_auth.php";
include_once "includes/db_comms.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fidelity Limited</title>

    <?php
    include "styles.php";
    ?>

</head>

<body data-spy="scroll" data-offset="80">

    <?php
    include "navbar.php";
    ?>

    <section class="accountsection">

        <div class="container">
            <div class="row">
                <?php
                include "sidebar.php";
                ?>

                <div class="col-md-8">
                    <div class="row">
                        <div class="det-box animate" data-anim-type="fadeInUp" data-anim-delay="100" id="signupBox">
                            <div class="upline">
                                <i class="pe-7s-upload"></i>
                                <h4 style="margin-bottom:3px;">Fund <span class="blu">Account</span></h4>
                            </div>
                            <form id="withdrawal_form" method="post" name="withdrawal_form" action="includes/withdrawal.inc.php">
                                <!-- Form message alerts -->
                                <div class="col-md-12 text-center">
                                    <div id="form_message"></div>
                                </div>

                                <div class="col-md-12">
                                    <div class="inp-group">
                                        <i class="pe-7s-cash"></i>
                                        <label for="amount">Amount</label>
                                        <input required id="amount" type="number" name='amount' value='' placeholder="Enter amount to deposit">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <button id="form_submit" name="form_submit" type="submit" class="btn btn-primary btn-lg" style="width:200px;">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>


    <?php
    include "footer.php";
    include "scripts.php";
    ?>

    !-- Form validation -->
    <script>
        $(document).ready(function() {
            $("#withdrawal_form").submit(function(event) {
                event.preventDefault();
                let amount = $("#amount").val();
                let form_submit = $("#form_submit").val();

                $.ajax({
                    url: "includes/deposit.inc.php",
                    type: "POST",
                    data: {
                        amount: amount,
                        form_submit: form_submit
                    }
                }).done(function(result) {
                    if (result !== "success") {
                        $("#form_message").html(result);
                    } else {
                        window.location.href = "deposit_instructions.php?amount=" + amount;
                    }
                });
            });
        })
    </script>

</body>

</html>