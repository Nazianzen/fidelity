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
    <!-- Latest Bootstrap min CSS -->
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

                    <div class="row row2 animate" data-anim-type="fadeInUp" data-anim-delay="100">
                        <div class="card">
                            <div class="card-body">

                                <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                                    <tr>
                                        <td class=item>
                                            <table cellspacing=1 cellpadding=2 border=0 width=100% class="tab">
                                                <tr>
                                                    <th colspan=4 align=center><b>Withdrawal History</b></th>
                                                </tr>
                                                <tr>
                                                    <td class=inheader width=200>Amount($)</td>
                                                    <td class=inheader width=200>Payment Method</td>
                                                    <td class=inheader width=200>Wallet Address</td>
                                                    <td class=inheader width=100 nowrap>
                                                        <nobr>Date</nobr>
                                                    </td>
                                                </tr>
                                                <?php
                                                if (sizeof($all_withdrawals) < 1) {
                                                    echo "<tr>No withdrawals made yet.</tr>";
                                                } else {
                                                    foreach ($all_withdrawals as $key => $withdrawal_data) {
                                                        echo "<tr>
                                                                <td class=item>" . $withdrawal_data['amount'] . "</td>
                                                                <td class=item style='text-transform: capitalize;'>" . $withdrawal_data['payment_method'] . "</td>
                                                                <td class=item>" . $withdrawal_data['wallet_address'] . "</td>
                                                                <td class=item>" . $withdrawal_data['request_date'] . "</td>
                                                            </tr>";
                                                    }
                                                }
                                                ?>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
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

</body>

</html>