<?php
if(isset($_GET['ref'])){
    session_start();
    $_SESSION['referrer'] = $_GET['ref'];
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

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

</head>

<body data-spy="scroll" data-offset="80">

    <div id="large-header" style="position:absolute;"><canvas id="demo-canvas"></canvas></div>
    <!-- END  HOME DESIGN -->


    <section class="signup-bg">

        <div class="signup-box animate" data-anim-type="fadeInUp" data-anim-delay="100" id="signupBox">


            <!-- Registration form -->
            <form id="registration_form" method="POST" action="includes/register.inc.php" novalidate>
                <div class="col-md-12">
                    <div class="upline">
                        <i class="pe-7s-users"></i>
                        <h4 style="margin-bottom:3px;">Account <span class="blu">Registration</span></h4>
                    </div>
                </div>

                <!-- Form message alerts -->
                <div class="col-md-12 text-center">
                    <div id="form_message"></div>
                </div>

                <div class="col-md-12">
                    <div class="inp-group">
                        <i class="pe-7s-add-user"></i>
                        <label for="username">Username</label>
                        <input id="username" class="form-control" required type='text' name='username' placeholder='Enter Your Username'>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="inp-group">
                        <i class="pe-7s-add-user"></i>
                        <label for="fullname">First Name</label>
                        <input id="firstname" required type="text" name='firstname' value="" placeholder="Enter your first name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inp-group">
                        <i class="pe-7s-add-user"></i>
                        <label for="fullname">Last Name</label>
                        <input id="lastname" required type="text" name='lastname' value="" placeholder="Enter your last name">
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="inp-group">
                        <i class="pe-7s-phone"></i>
                        <label class="password icon">Phone Number</label>
                        <input id="phone" required type="tel" name='phone' value="" placeholder="Enter your Phone Number"> </div>
                </div> -->

                <div class="col-md-6">
                    <div class="inp-group">
                        <i class="pe-7s-mail-open"></i>
                        <label for="email">Email Address</label>
                        <input id="email" required type="email" name='email' value="" placeholder="Enter your email"> </div>
                    <p id="email-error"></p>
                </div>
                <div class="col-md-6">
                    <div class="inp-group">
                        <i class="pe-7s-mail-open"></i>
                        <label for="confirm_email">Retype Your E-mail</label>
                        <input id="confirm_email" required type="email" name='confirm_email' value="" placeholder="Retype Your E-mail"> </div>
                </div>

                <div class="col-md-6">
                    <div class="inp-group">
                        <i class="pe-7s-lock"></i>
                        <label for="password">Password</label>
                        <input id="password" required type="password" name='password' value="" placeholder="Enter your password"> </div>
                </div>
                <div class="col-md-6">
                    <div class="inp-group">
                        <i class="pe-7s-lock"></i>
                        <label class="password icon" for="confirm_password">Retype Password</label>
                        <input id="confirm_password" required type="password" name='confirm_password' value="" placeholder="Retype your password"> </div>
                </div>

                <div class="col-md-12 text-center">
                    <input id="agree" required type=checkbox name='agree' value=1 checked style=" visibility:hidden;">
                    <p class="terms">By registration you agree with our <a href="terms.php" target="_blank">Terms and Services</a></p>
                    <button id="form_submit" type="submit" name="form_submit" class="btn btn-default btn-light-bg-three">Create Account</button>
                </div>
            </form>
        </div>

        <div class="login-box animate" data-anim-type="fadeInUp" data-anim-delay="100"> Already have an account? <a href="login.php" class="btn btn-default button">Login Now</a> </div>
    </section>

    <?php
    include "footer.php";
    include "scripts.php";
    ?>

    <!-- Form validation -->
    <script>
        $(document).ready(function() {
            $("#registration_form").submit(function(event) {
                event.preventDefault();
                let username = $("#username").val();
                let firstname = $("#firstname").val();
                let lastname = $("#lastname").val();
                let email = $("#email").val();
                let confirm_email = $("#confirm_email").val();
                let password = $("#password").val();
                let confirm_password = $("#confirm_password").val();
                let form_submit = $("#form_submit").val();

                $.ajax({
                    url: "includes/register.inc.php",
                    type: "POST",
                    data: {
                        username: username,
                        firstname: firstname,
                        lastname: lastname,
                        email: email,
                        confirm_email: confirm_email,
                        password: password,
                        confirm_password: confirm_password,
                        form_submit: form_submit
                    }
                }).done(function(result) {
                    if (result !== "success") {
                        $("#form_message").html(result);
                    } else {
                        window.location.href = "login.php?signup=success";
                    }
                });
            });
        })
    </script>

</body>

</html>