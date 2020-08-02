<div class="navbar navbar-default navbar-fixed-top menu-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../index.php" class="navbar-brand"></a>
        </div>
        <div class="navbar-collapse collapse">
            <nav>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../about.php">About Us</a></li>
                    <li><a href="../faq.php">Frequently Asked</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                    <li><a href="index.php" class="topb">Your Backoffice</a></li>
                    <li><a href="../auth/logout.php" class="topb off"><i class="fa fa-power-off"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- START HOME -->
<section data-stellar-background-ratio="0.3" id="home" class="home-parallax2" style="background-image: url(../assets/img/bg/parallax-bg.jpg); background-size:cover; background-position:top center;">

    <div id="large-header" style="position:absolute;"><canvas id="demo-canvas"></canvas></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="servertime">
                    <span><b style="margin-right: 50px; font-weight:normal;"><i class="pe-7s-user"></i> Username:
                            <strong>
                                <?php
                                include_once "includes/db_comms.inc.php";
                                echo $user['username'];
                                ?>
                            </strong></b>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <!-- END CONTAINER-->
</section>