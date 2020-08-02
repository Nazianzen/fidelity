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
    <section class="signup-bg">
        <br>
        <div class="signup-box animate" data-anim-type="fadeInUp" data-anim-delay="100" id="signupBox">

            <form id="login_form" method="post" name="login_form" action="includes/login.inc.php" novalidate>
                <div class="col-md-12">
                    <div class="upline">
                        <i class="pe-7s-lock"></i>
                        <h4 style="margin-bottom:3px;">Password <span class="blu">Reset</span></h4>
                    </div>
                </div>

                <!-- Form message alerts -->
                <div class="col-md-12 text-center">
                    <div id="form_message"></div>
                </div>

                <div class="col-md-12">
                    <div class="inp-group">
                        <i class="pe-7s-mail-open"></i>
                        <label for="email">Email</label>
                        <input required id="email" type="email" name='email' value="" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button id="form_submit" name="form_submit" type="submit" class="btn btn-default btn-light-bg-three" style="margin-top:10px;">Reset Password</button>
                </div>
            </form>
        </div>
        <div class="login-box animate" data-anim-type="fadeInUp" data-anim-delay="300"> Not a member yet? <a href="register.php" class="btn btn-default button">Signup Now</a></div>
    </section>


    <?php
    include "footer.php";
    include "scripts.php";
    ?>

    <!-- Form validation -->
    <script>
        $(document).ready(function() {
            $("#login_form").submit(function(event) {
                event.preventDefault();
                let email = $("#email").val();
                let form_submit = $("#form_submit").val();

                $.ajax({
                    url: "includes/password_reset.inc.php",
                    type: "POST",
                    data: {
                        email: email,
                        form_submit: form_submit
                    }
                }).done(function(result) {
                    if (result !== "success") {
                        $("#form_message").html(result);
                    } else {
                        window.location.href = "../dashboard";
                    }
                });
            });
        })
    </script>

</body>

</html>