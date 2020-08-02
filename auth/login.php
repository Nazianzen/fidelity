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
                        <h4 style="margin-bottom:3px;">Account <span class="blu">Login</span></h4>
                    </div>
                </div>

                <!-- Form message alerts -->
                <div class="col-md-12 text-center">
                    <div id="form_message">
                        <?php
                        if (isset($_GET["signup"]) && $_GET["signup"] == "success"){
                            echo "<div class='alert alert-success'>Account successfully created. You can now login.</div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="inp-group">
                        <i class="pe-7s-add-user"></i>
                        <label for="username">Username</label>
                        <input required id="username" type="text" name='username' value='' placeholder="Enter your username">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="inp-group">
                        <i class="pe-7s-lock"></i>
                        <label for="password">Password</label>
                        <input required id="password" type="password" name='password' value="" id="password" placeholder="Password">
                        <a href="password_reset.php" class="recover-btn">Recover Password</a>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button id="form_submit" name="form_submit" type="submit" class="btn btn-default btn-light-bg-three" style="margin-top:10px;">Login Now</button>
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
                let username = $("#username").val();
                let password = $("#password").val();
                let form_submit = $("#form_submit").val();

                $.ajax({
                    url: "includes/login.inc.php",
                    type: "POST",
                    data: {
                        username: username,
                        password: password,
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