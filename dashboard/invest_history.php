<?php
require "../auth/check_auth.php";
include "includes/db_comms.inc.php";
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

                    <div class="row row2 animate" data-anim-type="fadeInUp" data-anim-delay="100">

                        <b class="deposit-total">Total Investments: $<?php echo $total_investment ?></b><br><br>

                        <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                            <tr>
                                <td class=item>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100% class="tab">
                                        <tr>
                                            <th colspan=3 align=center><b>Active Investment Details</b></th>
                                        </tr>
                                        <tr>
                                            <td class=inheader>Plan</td>
                                            <td class=inheader width=200>Amount Spent ($)</td>
                                            <td class=inheader width=100 nowrap>
                                                <nobr>Date</nobr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class=item style="text-transform: capitalize;"><?php echo $active_investment_plan ?></td>
                                            <td class=item><?php echo $active_investment_amount ?></td>
                                            <td class=item><?php echo $active_investment_date ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table cellspacing=1 cellpadding=2 border=0 width=100% class=line>
                            <tr>
                                <td class=item>
                                    <table cellspacing=1 cellpadding=2 border=0 width=100% class="tab">
                                        <tr>
                                            <th colspan=3 align=center><b>Investment History</b></th>
                                        </tr>
                                        <tr>
                                            <td class=inheader>Plan</td>
                                            <td class=inheader width=200>Amount Spent ($)</td>
                                            <td class=inheader width=100 nowrap>
                                                <nobr>Date</nobr>
                                            </td>
                                        </tr>
                                        <?php
                                        if (sizeof($all_investments) < 1) {
                                            echo "<tr>No investments made yet.</tr>";
                                        } else {
                                            foreach ($all_investments as $key => $investment_data) {
                                                echo "<tr>
                                                        <td class=item style='text-transform: capitalize;'>". $investment_data['plan'] ."</td>
                                                        <td class=item>". $investment_data['amount'] ."</td>
                                                        <td class=item>". $investment_data['investment_date'] ."</td>
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
    </section>

    <?php
    include "footer.php";
    include "scripts.php";
    ?>

</body>

</html>