<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
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


    <?php
    include "navbar.php";
    ?>


    <!-- START HOME -->
    <section data-stellar-background-ratio="0.3" id="home" class="home-parallax2" style="background-image: url(assets/img/bg/parallax-bg.jpg); background-size:cover; background-position:top center;">

        <div id="large-header" style="position:absolute;"><canvas id="demo-canvas"></canvas></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <p class="servertime">

                        <span><b style="margin-right: 45px; font-weight:normal;"><i class="pe-7s-medal"></i> Registered in USA</b>
                        </span>

                    </p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="minh">
                        <h2>Customer Service</h2>
                        <p>We provide 24/7 support email and live chat to help you out with absolutely any problem.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTAINER-->
    </section>
    <!-- END  HOME DESIGN -->

    <section class="why_choose_us" style="padding: 20px 0 60px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single_feature animate" data-anim-type="fadeInUp" align="center">
                                <p style="text-align:center"><img src="assets/img/ico5.svg" alt="" /></p>
                                <h3>HEADQUARTERS</h3>
                                <span></span>
                                <p class="blu">get address from lucky</p>
                            </div>
                        </div><!-- END col-sm-6 -->
                        <div class="col-md-4">
                            <div class="single_feature animate" data-anim-type="fadeInUp" align="center">
                                <p style="text-align:center"><img src="assets/img/ico4.svg" alt="" /></p>
                                <h3>Email Address</h3>
                                <span></span>
                                <!-- <p class="blu">clientscontact@alliancelimited.org</p> -->
                                <p class="blu">support@fidelitylimited.org</p>
                            </div>
                        </div><!-- END col-sm-6 -->
                        <div class="hidden">
                            <div class="single_feature animate" data-anim-type="fadeInUp" align="center">
                                <p style="text-align:center"><img src="assets/img/ico6.svg" alt="" /></p>
                                <h3>Phone Support</h3>
                                <span></span>
                                <p class="blu">+44 20 3868 3777</p>
                                <p><small>Hours: 9.00AM - 5.00PM (GMT+1)</small></p>
                            </div>
                        </div><!-- END col-sm-6 -->
                    </div>
                </div>
                <!--- END COL -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>



    <section class="signup-bg">
        <div class="signup-box animate" data-anim-type="fadeInUp" data-anim-delay="300" id="signupBox">



            <div class="col-md-12">



                <div class="upline">
                    <i class="pe-7s-chat"></i>
                    <h4 style="margin-bottom:3px;">Support <span class="blu">Form</span></h4>
                </div>
            </div>



            <script language=javascript>
                function checkform() {
                    if (document.mainform.name.value == '') {
                        alert("Please type your full name!");
                        document.mainform.name.focus();
                        return false;
                    }
                    if (document.mainform.email.value == '') {
                        alert("Please enter your e-mail address!");
                        document.mainform.email.focus();
                        return false;
                    }
                    if (document.mainform.message.value == '') {
                        alert("Please type your message!");
                        document.mainform.message.focus();
                        return false;
                    }
                    return true;
                }
            </script>



            <form method=post name=mainform onsubmit="return checkform()">


                <div class="col-md-12">
                    <div class="inp-group">
                        <i class="pe-7s-add-user"></i>
                        <label for="name">Full Name</label>


                        <input type="text" name="name" value="" placeholder="Enter your full name">

                    </div>

                </div>
                <div class="col-md-12">
                    <div class="inp-group">
                        <i class="pe-7s-mail-open"></i>
                        <label for="email">Email</label>
                        <input type="text" name="email" value="" placeholder="Enter your email">

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="inp-group">
                        <label for="message">Message</label>
                        <textarea name=message rows="5" id="message" style="padding-left:10px;"></textarea> </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-default btn-light-bg-three" style="margin-top:10px;">Send Message</button>
                </div>
            </form>

        </div>
    </section>

    <?php
    include "footer.php";
    include "scripts.php";
    ?>

</body>

</html>