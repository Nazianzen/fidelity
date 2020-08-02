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
    <!-- <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon"> -->
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

                <!-- END OF EVERY OTHER PAGE  -->

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="det-box animate" data-anim-type="fadeInUp" data-anim-delay="500" id="signupBox">
                                <div class="upline">
                                    <i class="pe-7s-piggy"></i>
                                    <h4 style="margin-bottom:3px;">Total <span class="blu">Balance</span></h4>
                                </div>
                                <h2>$<b><?php echo $account['balance'];?></b></h2>

                                <table class="tabel">
                                    <tr>
                                        <td>Total Deposit:</td>
                                        <td class="dark">$<b><?php echo $total_deposit; ?></b></td>
                                    </tr>

                                    <tr>
                                        <td>Last Deposit:</td>
                                        <td class="dark">$<b><?php echo $last_deposit_amount ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Earned Total:</td>
                                        <td class="dark">$<b><?php echo $account['earnings']; ?></b></td>
                                    </tr>
                                </table>

                                <a href="invest.php" class="btn btn-light-bg-three" style="margin-top:25px;">Make Investment</a>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="det-box animate" data-anim-type="fadeInUp" data-anim-delay="600" id="signupBox">
                                <div class="upline">
                                    <i class="pe-7s-culture"></i>
                                    <h4 style="margin-bottom:3px;">Total <span class="blu">Withdrawals</span></h4>
                                </div>
                                <h2>$<b><?php echo $total_withdrawal ?></b></h2>

                                <table class="tabel">

                                    <tr>
                                        <td>Pending Withdrawal:</td>
                                        <td class="dark">$<b><?php echo $pending_withdrawal_amount ?></b></td>
                                    </tr>

                                    <tr>
                                        <td>Last Withdrawal:</td>
                                        <td class="dark">$<b><?php echo $last_withdrawal_amount ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Last Access:</td>
                                        <td class="dark"><?php echo $last_withdrawal_date ?></td>
                                    </tr>
                                </table>

                                <a href="withdrawal.php" class="btn btn-light-bg-three" style="margin-top:25px;">Withdraw Funds</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="reff-box animate" data-anim-type="fadeInUp" data-anim-delay="800">
                        <div class="col-md-7">
                            <h3>AFFILIATE PROGRAM</h3>
                            <p>Share your affiliate link and collect a commission of 10% from your referral's first deposit.</p>
                        </div>

                        <div class="col-md-5">
                            <label style="cursor:pointer; width:100%;" id="copy-address" data-clipboard-target="#ref_link">
                                <div class="reffl"><i class="fa fa-floppy-o" title="Copy Link"></i> Your Referral Link: <span id="ref_link">https://fidelitylimited.org/?ref=<?php echo $user['username'] ?></span></div>
                            </label>
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
    <script src="../assets/js/clipboard.min.js"></script>
    <script>
        new ClipboardJS('#copy-address');
    </script>
    
</body>

</html>