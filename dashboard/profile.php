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




                        <script language=javascript>
                            function IsNumeric(sText) {
                                var ValidChars = "0123456789.";
                                var IsNumber = true;
                                var Char;
                                if (sText == '') return false;
                                for (i = 0; i < sText.length && IsNumber == true; i++) {
                                    Char = sText.charAt(i);
                                    if (ValidChars.indexOf(Char) == -1) {
                                        IsNumber = false;
                                    }
                                }
                                return IsNumber;
                            }

                            function checkform() {
                                if (document.editform.fullname.value == '') {
                                    alert("Please type your full name!");
                                    document.editform.fullname.focus();
                                    return false;
                                }


                                if (document.editform.password.value != document.editform.password2.value) {
                                    alert("Please check your password!");
                                    document.editform.fullname.focus();
                                    return false;
                                }


                                if (document.editform.transaction_code.value != document.editform.transaction_code2.value) {
                                    alert("Please check your transaction code!");
                                    document.editform.transaction_code2.focus();
                                    return false;
                                }





                                for (i in document.editform.elements) {
                                    f = document.editform.elements[i];
                                    if (f.name && f.name.match(/^pay_account/)) {
                                        if (f.value == '') continue;
                                        var notice = f.getAttribute('data-validate-notice');
                                        var invalid = 0;
                                        if (f.getAttribute('data-validate') == 'regexp') {
                                            var re = new RegExp(f.getAttribute('data-validate-regexp'));
                                            if (!f.value.match(re)) {
                                                invalid = 1;
                                            }
                                        } else if (f.getAttribute('data-validate') == 'email') {
                                            var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
                                            if (!f.value.match(re)) {
                                                invalid = 1;
                                            }
                                        }
                                        if (invalid) {
                                            alert('Invalid account format. Expected ' + notice);
                                            f.focus();
                                            return false;
                                        }
                                    }
                                }

                                return true;
                            }
                        </script>



                        <form action="" method=post onsubmit="return checkform()" name=editform><input type="hidden" name="form_id" value="15934881994863"><input type="hidden" name="form_token" value="f70b4bcac3b0f03055dcf12bd67bb50e">
                            <input type=hidden name=a value=edit_account>
                            <input type=hidden name=action value=edit_account>
                            <input type=hidden name=say value="">

                            <table cellspacing=0 cellpadding=2 border=0 class="blank">
                                <tr>
                                    <td>Account Name:</td>
                                    <td>james5050</td>
                                </tr>
                                <tr>
                                    <td>Registration date:</td>
                                    <td>Mar-16-2020 01:29:20 AM</td>
                                </tr>
                                <tr>
                                    <td>Your Full Name:</td>
                                    <td><input type=text name=fullname value='james alred' class=pp size=30>
                                </tr>

                                <tr>
                                    <td>New Password:</td>
                                    <td><input type=password name=password value="" class=pp size=30></td>
                                </tr>
                                <tr>
                                    <td>Retype Password:</td>
                                    <td><input type=password name=password2 value="" class=pp size=30></td>
                                </tr>
                                <tr>
                                    <td>New Transaction Code:</td>
                                    <td><input type=password name=transaction_code value="" class=inpts size=30></td>
                                </tr>
                                <tr>
                                    <td>Retype Transaction Code:</td>
                                    <td><input type=password name=transaction_code2 value="" class=inpts size=30></td>
                                </tr>
                                <tr>
                                    <td>Your Bitcoin Your Withdrawal Address:</td>
                                    <td><input type=text class=inpts size=30 name="pay_account[1000][Your Withdrawal Address]" value=""></td>
                                </tr>
                                <tr>
                                    <td>Your Bitcoin Transactions Code Required Soon:</td>
                                    <td><input type=text class=inpts size=30 name="pay_account[1000][Transactions Code Required Soon]" value=""></td>
                                </tr>
                                <tr>
                                    <td>Your Bitcoin admin:</td>
                                    <td><input type=text class=inpts size=30 name="pay_account[1000][admin]" value=""></td>
                                </tr>
                                <tr>
                                    <td>Your Perfect Money Your USD Wallet ID:</td>
                                    <td><input type=text class=inpts size=30 name="pay_account[1004][Your USD Wallet ID]" value=""></td>
                                </tr>
                                <tr>
                                    <td>Your Perfect Money Transactions Code Required Soon:</td>
                                    <td><input type=text class=inpts size=30 name="pay_account[1004][Transactions Code Required Soon]" value=""></td>
                                </tr>
                                <tr>
                                    <td>Your Perfect Money admin:</td>
                                    <td><input type=text class=inpts size=30 name="pay_account[1004][admin]" value=""></td>
                                </tr>
                                <tr>
                                    <td>Your E-mail address:</td>
                                    <td>jerewire112@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Current Transaction Code:</td>
                                    <td><input type=password name=transaction_code_current value="" class=inpts size=30></td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                    <td><input type=submit value="Send" class=sbmt style='    width: 54%;'></td>
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



</body>

</html>