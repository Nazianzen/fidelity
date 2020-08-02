<?php
require "../auth/check_auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon"> -->
    <title>Fidelity Limited</title>
    <?php
    include "styles.php";
    ?>


    <script>
        $(function() {
            $('.reffl span').attr('id', 'copy-target');
        });
    </script>
    <script src="assets/js/clipboard.min.js"></script>
</head>

<body data-spy="scroll" data-offset="80">


    <?php
    include "navbar.php";
    ?>

    <section class="accountsection">

        <div class="container">
            <div class="row">
                <?php include "sidebar.php"; ?>
                <div class="col-md-8">
                    <div class="row">
                        <!-- Form message alerts -->
                        <div class="col-md-12 text-center">
                            <div id="form_message"></div>
                        </div>
                        <form method="post" name="invest_form" id="invest_form" action="includes/invest.inc.php">
                            <table cellspacing=1 cellpadding=2 border=0 width=100% class="tab">
                                <tr>
                                    <th colspan=3>
                                        <input type=radio name="plan" id="p_plan" value='proficient' checked required>
                                        <label for="p_plan"><b>Proficient Plan</b></label>
                                    </th>
                                </tr>
                                <tr>
                                    <td class=inheader width=200>Minimum Spend Amount ($)</td>
                                    <td class=inheader width=100 nowrap>
                                        <nobr>Daily Profit (%)</nobr>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=item>$100.00</td>
                                    <td class=item>2.5</td>
                                </tr>
                            </table>
                            <br>
                            <table cellspacing=1 cellpadding=2 border=0 width=100% class="tab">
                                <tr>
                                    <th colspan=3>
                                        <input type=radio name="plan" id="e_plan" value='expert' required>
                                        <label for="e_plan"><b>Expert Plan</b></label>
                                    </th>
                                </tr>
                                <tr>
                                    <td class=inheader width=200>Minimum Spend Amount ($)</td>
                                    <td class=inheader width=100 nowrap>
                                        <nobr>Daily Profit (%)</nobr>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=item>$500.00</td>
                                    <td class=item>5</td>
                                </tr>
                            </table>

                            <table cellspacing=0 cellpadding=2 border=0 class="blank">
                                <tr>
                                    <td>Your account balance ($):</td>
                                    <td align=right>
                                        <b>
                                            $<span>
                                                <?php
                                                include_once "includes/db_comms.inc.php";
                                                echo $account['balance'];
                                                ?>
                                            </span>
                                        </b>
                                    </td>
                                </tr>
                                <br>
                                <tr>
                                    <td>Amount to Spend ($):</td>
                                    <td align=right><input type="number" name="amount" id="amount" placeholder="Enter amount" class="pp" size=15 style="text-align: left;"></td>
                                </tr>
                                <tr>
                                    <td><button name="form_submit" id="form_submit" type="submit" class="btn btn-primary btn-lg" style="width: 200px;">Invest</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "footer.php";
    include "scripts.php";
    ?>

    <!-- Form validation -->
    <script>
        $(document).ready(function() {
            $("#invest_form").submit(function(event) {
                event.preventDefault();
                let plan = $("input[name=plan]:checked").val();
                let amount = $("#amount").val();
                let form_submit = $("#form_submit").val();

                $.ajax({
                    url: "includes/invest.inc.php",
                    type: "POST",
                    data: {
                        plan: plan,
                        amount: amount,
                        balance: <?php echo $account['balance'] ?>,
                        form_submit: form_submit
                    }
                }).done(function(result) {
                    if (result !== "success") {
                        $("#form_message").html(result);
                    } else {
                        $("#form_message").html("<div class='alert alert-success'>Investment has been made successfully.</div>");
                        location.reload();
                    }
                });
            });
        })
    </script>


</body>

</html>