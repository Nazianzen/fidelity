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

                    </div>

                    <div class="row">

                        <table cellspacing=0 cellpadding=0 border=0 width=100% class="blank">
                            <tr>

                            </tr>
                            <tr>
                                <form method=post name=opts><input type="hidden" name="form_id" value="15934622578384"><input type="hidden" name="form_token" value="ea32f8cbc07ce52770a739abe9401a06">
                                    <input type=hidden name=a value=earnings>
                                    <input type=hidden name=page value=1>
                                    <td>
                                        <select name=type class=inpts onchange="document.opts.submit();" style='    width: 68%;'>
                                            <option value="">All transactions</option>
                                            <option value="commissions">Referral commission</option>
                                            <option value="penalty">Penalty</option>
                                            <option value="deposit">Deposit</option>
                                            <option value="withdrawal">Withdrawal</option>
                                            <option value="earning">Earning</option>
                                        </select>
                                        <br><img src=images/q.gif width=1 height=4><br>
                                        <select name=ec class=inpts style='    width: 68%;'>
                                            <option value=-1>All eCurrencies</option>
                                            <option value=1000>Bitcoin</option>
                                            <option value=1004>Perfect Money</option>
                                        </select>
                                    </td>
                                    <td align=right>
                                        From: <select name=month_from class=inpts>
                                            <option value=1>Jan
                                            <option value=2>Feb
                                            <option value=3 selected>Mar
                                            <option value=4>Apr
                                            <option value=5>May
                                            <option value=6>Jun
                                            <option value=7>Jul
                                            <option value=8>Aug
                                            <option value=9>Sep
                                            <option value=10>Oct
                                            <option value=11>Nov
                                            <option value=12>Dec
                                        </select> &nbsp;
                                        <select name=day_from class=inpts>
                                            <option value=1>1
                                            <option value=2>2
                                            <option value=3>3
                                            <option value=4>4
                                            <option value=5>5
                                            <option value=6>6
                                            <option value=7>7
                                            <option value=8>8
                                            <option value=9>9
                                            <option value=10>10
                                            <option value=11>11
                                            <option value=12>12
                                            <option value=13>13
                                            <option value=14>14
                                            <option value=15>15
                                            <option value=16 selected>16
                                            <option value=17>17
                                            <option value=18>18
                                            <option value=19>19
                                            <option value=20>20
                                            <option value=21>21
                                            <option value=22>22
                                            <option value=23>23
                                            <option value=24>24
                                            <option value=25>25
                                            <option value=26>26
                                            <option value=27>27
                                            <option value=28>28
                                            <option value=29>29
                                            <option value=30>30
                                            <option value=31>31
                                        </select> &nbsp;

                                        <select name=year_from class=inpts>
                                            <option value=2015>2015
                                            <option value=2016>2016
                                            <option value=2017>2017
                                            <option value=2018>2018
                                            <option value=2019>2019
                                            <option value=2020 selected>2020
                                        </select><br><img src=images/q.gif width=1 height=4><br>

                                        To: <select name=month_to class=inpts>
                                            <option value=1>Jan
                                            <option value=2>Feb
                                            <option value=3>Mar
                                            <option value=4>Apr
                                            <option value=5>May
                                            <option value=6 selected>Jun
                                            <option value=7>Jul
                                            <option value=8>Aug
                                            <option value=9>Sep
                                            <option value=10>Oct
                                            <option value=11>Nov
                                            <option value=12>Dec
                                        </select> &nbsp;
                                        <select name=day_to class=inpts>
                                            <option value=1>1
                                            <option value=2>2
                                            <option value=3>3
                                            <option value=4>4
                                            <option value=5>5
                                            <option value=6>6
                                            <option value=7>7
                                            <option value=8>8
                                            <option value=9>9
                                            <option value=10>10
                                            <option value=11>11
                                            <option value=12>12
                                            <option value=13>13
                                            <option value=14>14
                                            <option value=15>15
                                            <option value=16>16
                                            <option value=17>17
                                            <option value=18>18
                                            <option value=19>19
                                            <option value=20>20
                                            <option value=21>21
                                            <option value=22>22
                                            <option value=23>23
                                            <option value=24>24
                                            <option value=25>25
                                            <option value=26>26
                                            <option value=27>27
                                            <option value=28>28
                                            <option value=29 selected>29
                                            <option value=30>30
                                            <option value=31>31
                                        </select> &nbsp;

                                        <select name=year_to class=inpts>
                                            <option value=2015>2015
                                            <option value=2016>2016
                                            <option value=2017>2017
                                            <option value=2018>2018
                                            <option value=2019>2019
                                            <option value=2020 selected>2020
                                        </select>

                                    </td>
                                    <td>
                                        &nbsp; <input type=submit value="Go" class=sbmt>
                                    </td>
                            </tr>
                        </table>
                        </form>
                        <br><br>

                        <table cellspacing=1 cellpadding=2 border=0 width=100%>
                            <tr>
                                <td class=inheader>Date</td>
                                <td class=inheader>Type</td>
                                <td class=inheader>Credit</td>
                                <td class=inheader>Debit</td>
                                <td class=inheader>Balance</td>
                                <td class=inheader>P.S.</td>
                            </tr>
                            <tr>
                                <td align=center nowrap>Mar-17-2020<br>10:58:40 PM</td>
                                <td><b>Referral commission</b><br><small class=gray>referral bonus</small></td>
                                <td align=right><b>
                                        $250.00
                                    </b>
                                </td>
                                <td align=right><b>
                                        &nbsp;
                                </td>
                                <td align=right><b>
                                        $250.00
                                </td>
                                <td><img src="images/1000.gif" align=absmiddle hspace=1 height=17></td>
                            </tr>
                            <tr>
                                <td align=center nowrap>Mar-18-2020<br>03:09:15 AM</td>
                                <td><b>Penalty</b><br><small class=gray>Account Correction</small></td>
                                <td align=right><b>
                                        &nbsp;
                                </td>
                                <td align=right><b>
                                        $250.00
                                    </b>
                                </td>
                                <td align=right><b>
                                        $0.00
                                </td>
                                <td><img src="images/1000.gif" align=absmiddle hspace=1 height=17></td>
                            </tr>
                            <tr>
                                <td colspan=3>&nbsp;</td>

                            <tr>
                                <td colspan=2>Total for this period:</td>
                                <td align=right nowrap><b>$</b></td>
                                <td align=right nowrap><b>$</b></td>
                                <td align=right nowrap><b>$</b></td>
                            </tr>
                            <tr>
                                <td colspan=2>Total:</td>
                                <td align=right nowrap><b>$</b></td>
                                <td align=right nowrap><b>$</b></td>
                                <td align=right nowrap><b>$</b></td>
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