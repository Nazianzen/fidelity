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
                <?php
                include "sidebar.php";
                ?>

                <div class="col-md-8">

                    <div class="row row2 animate" data-anim-type="fadeInUp" data-anim-delay="100">
                        <table width=300 cellspacing=1 cellpadding=1 class="tab">
                            <tr>
                                <th colspan="2" align="center">Referral Details</th>
                            </tr>
                            <tr>
                                <td class=item>Referrals:</td>
                                <td class=item><?php echo sizeof($all_referrals); ?></td>
                            </tr>
                            <tr>
                                <td class=item>Active referrals:</td>
                                <td class=item><?php echo sizeof($active_referrals); ?></td>
                            </tr>
                            <tr>
                                <td class=item>Total referral commission:</td>
                                <td class=item>$<?php echo $account['referral_bonus']; ?></td>
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