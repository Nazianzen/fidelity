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
                        <div class="signup-box animate" data-anim-type="fadeInUp" data-anim-delay="100" id="signupBox">
                            <table cellspacing=0 cellpadding=2 border=0 class="tab">
                                <thead>
                                    <th>Account Information
                                    <th>
                                </thead>
                                <tr>
                                    <td>Account Balance:</td>
                                    <td><b>$<?php echo $account['balance']; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Available Balance:</td>
                                    <td><b>$<?php echo $account['earnings']; ?></b></td>
                                </tr>
                                <tr>
                                    <td>Pending Withdrawals: </td>
                                    <td><b>$<?php echo $pending_withdrawal_amount; ?></b></td>
                                </tr>
                            </table>
                            <br>
                            <form id="withdrawal_form" method="post" name="withdrawal_form" action="includes/withdrawal.inc.php">
                                <!-- Form message alerts -->
                                <div class="col-md-12 text-center">
                                    <div id="form_message"></div>
                                </div>

                                <div class="col-md-12">
                                    <div class="inp-group">
                                        <i class="pe-7s-cash"></i>
                                        <label for="amount">Amount</label>
                                        <input required id="amount" type="number" name='amount' value='' placeholder="Enter amount to withdraw">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <label for="">Payment Method</label>
                                    <br>
                                    <input required id="bitcoin" type="radio" name='payment_method' value='bitcoin' checked>
                                    <label for="bitcoin" style="margin-right: 10px;">Bitcoin</label>

                                    <input required id="perfect_money" type="radio" name='payment_method' value='perfect money'>
                                    <label for="perfect_money">Perfect Money</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="inp-group">
                                        <i class="pe-7s-wallet"></i>
                                        <label for="wallet_address">Wallet Address</label>
                                        <input required id="wallet_address" type="text" name='wallet_address' value='' placeholder="Enter wallet address">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <button id="form_submit" name="form_submit" type="submit" class="btn btn-primary btn-lg" style="width:200px;">Withdraw</button>
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
                let wallet_address = $("#wallet_address").val();
                let payment_method = $("input[name=payment_method]:checked").val();
                let form_submit = $("#form_submit").val();

                $.ajax({
                    url: "includes/withdrawal.inc.php",
                    type: "POST",
                    data: {
                        amount: amount,
                        earnings: <?php echo $account['earnings']; ?>,
                        wallet_address: wallet_address,
                        payment_method: payment_method,
                        form_submit: form_submit
                    }
                }).done(function(result) {
                    if (result !== "success") {
                        $("#form_message").html(result);
                    } else {
                        $("#form_message").html("<div class='alert alert-success'>Withdrawal request sent successfully.</div>");
                        location.reload();
                    }
                });
            });
        })
    </script>


</body>

</html>