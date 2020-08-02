<?php
require "../auth/check_auth.php";
if (!isset($_GET['amount'])) {
    header("Location: deposit.php");
    exit();
}
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
                            <div class="col-md-12">
                                <h3>Confirm Your Deposit</h3>
                                <div style="text-align:center"><img src="../assets/img/frame.png" width="300" alt="" /></div>
                                <span></span>
                                <p>
                                    Please send exactly $<?php echo $_GET['amount']; ?> to this bitcoin wallet address
                                    <!-- Target -->
                                    <input id="wallet_address" value="bc1qha4smq4kamfty9xj2mm80ljfduy9flszdvtahg">
                                    <!-- Trigger -->
                                    <button id="wallet_btn" data-clipboard-target="#wallet_address">
                                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                                    </button>
                                </p>
                                <p>
                                    After payment is made, send your payment reciept to <strong>support@fidelitylimited.com</strong>
                                    using your registered email or chat us online for rapid response.
                                </p>
                            </div>
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
        new ClipboardJS('#wallet_btn');
    </script>

</body>

</html>