<?php
if(isset($_GET['ref'])){
    header("Location: auth/register.php?ref=".$_GET['ref']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <section data-stellar-background-ratio="0.3" id="home" class="welcome-area home-parallax" style="background-image: url(assets/images/s2.jpg);  background-size:cover; background-position: top center;">

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
            <!-- End of header -->

            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="hero-text pt100">
                        <h2>Honesty. Clarity. Integrity</h2>
                        <p>Fidelity Limited website has managed global and international equities in a disciplined and consistent manner. We are a focused, boutique investment manager and are 100% employee owned. We invest personally in the strategies we manage, ensuring our interests are aligned with those of our clients. Alliance employees are invested in the success of Fidelity Limited website, in every way.</p>
                        <a class="btn btn-default btn-light-bg page-scroll" href="register.php">Register Account</a>
                        <a class="btn btn-default btn-light-bg-two page-scroll" href="about.php">Read More</a>
                    </div>
                </div><!-- END COL-->
                <div class="col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="hero-text pt100">
                        <div class="presentation"><iframe width="430" height="242" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="frame"></iframe>

                        </div>
                    </div>
                </div><!-- END COL-->

            </div><!-- END ROW-->

            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="lastpayments">
                        <ul>

                            <li><i class="fa fa-angle-right"></i>BTC: <span class="btcLive"></span></li>
                            <li><i class="fa fa-angle-right"></i>BCH: <span class="bchLive"></span></li>
                            <li><i class="fa fa-angle-right"></i>ETH: <span class="ethLive"></span></li>
                            <li><i class="fa fa-angle-right"></i>LTC: <span class="ltcLive"></span></li>
                            <li><i class="fa fa-angle-right"></i>DOGE: <span class="dogeLive"></span></li>
                            <li><i class="fa fa-angle-right"></i>DASH: <span class="dashLive"></span></li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- End HOME -->

    <section id="about" class="about-us section-padding">
        <div class="container">
            <div class="row animate" data-anim-type="fadeInUp">

                <div class="col-md-7 col-xs-12">
                    <div class="about-us-content">
                        <h2>About <span>Fidelity Limited website</span></h2>
                        <div class="about-line"></div>
                        <p>The Fidelity Limited website goal remains establishing a focused, investment-driven culture. This culture continues to define our organization today, attracting like-minded employees and investors. We are a tight-knit team one that’s not afraid to respectfully challenge and debate ideas in search of the best results/outcome.</p>
                        <p>We focus on understanding the long-term drivers of a winning business, not quarter to quarter earnings. </p>
                    </div>
                </div><!-- END COL -->

                <div class="col-md-5 col-xs-12 bluebg">
                    <div class="presentation"><iframe width="430" height="242" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="frame"></iframe>

                    </div>

                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>




    <section id="pricing" class="our_pricing section-padding">
        <div class="container">
            <div class="row animate" data-anim-type="fadeInUp">
                <div class="section-title text-center">
                    <h2>PROFICIENT PLAN</h2>
                    <p>YOUR INVESTMENT BUDGET DETERMINES YOUR RETURN ON INVESTMENT AMOUNT</p>
                </div><br>


                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="single-pricing single-pricing-bg">
                        <div class="pricing-price pricing-price-bg">

                            <p>2.5%</p>
                            <p><span>Daily Profit</span></p>
                        </div>
                        <div class="pricing-features pricing-features-white">
                            <p>Start with as low as $100</p>
                            <p>Earn daily profits</p>
                            <p>Instant withdrawal anytime, anyday</p>
                        </div>
                    </div>
                </div>
                <!--- END COL -->

                <div class="col-md-7 col-sm-12 col-xs-12">

                    <div class="row ">
                        <div class="col-md-12" align="center">
                            <h4 class="blu">We’re a team of dedicated investment professionals who believe all investors should have access to unbiased information and the best wealth managers.</h4>
                            <p><small style="line-height:0.5;"></small></p><br><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="procesor"><img src="assets/img/bitcoin.svg" width="120" alt="" /></div>
                            <div class="hidden"><img src="assets/img/litecoin.svg" width="110" alt="" /></div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="procesor"><img src="assets/img/bitcoincash.svg" width="120" alt="" /></div>
                            <div class="hidden"><img src="assets/img/dash.svg" width="120" alt="" /></div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="procesor"><img src="assets/img/ethereum.svg" width="120" alt="" /></div>
                            <div class="hidden" style="margin-bottom:0;"><img src="assets/img/dogecoin.svg" width="120" alt="" /></div>
                        </div>
                    </div>


                </div>
            </div>
            <br><br>
            <div class="row animate" data-anim-type="fadeInUp">
                <div class="section-title text-center">
                    <h2>EXPERT PLAN</h2>
                    <p>YOUR INVESTMENT BUDGET DETERMINES YOUR RETURN ON INVESTMENT AMOUNT</p>
                </div><br>


                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="single-pricing single-pricing-bg">
                        <div class="pricing-price pricing-price-bg">

                            <p>5%</p>
                            <p><span>Daily Profit</span></p>
                        </div>
                        <div class="pricing-features pricing-features-white">
                            <p>Start with as low as $500 </p>
                            <!-- <p>Start with as low as $300 for accounts with $1000 and above. </p> -->
                            <p>Earn daily profits</p>
                            <p>Instant withdrawal anytime, anyday</p>
                        </div>
                    </div>
                </div>
                <!--- END COL -->


            </div>
        </div>
    </section>


    <section class="statcs section-padding" style="position:relative;">
        <div class="container">
            <div class="row">

                <div class="col-md-6 animate" data-anim-type="fadeInLeft" data-anim-delay="100">
                    <h1><i class="pe-7s-graph1"></i> 10% REFERRAL COMMISSION</h1>
                    <p>Our goal is to develop and grow a community of investors. To do this, we are offering one of the most lucrative affiliate programs in the investment market. If you're a networking investor or are interested in making additional profit, this is a offer you should leverage on</p><br>
                    <p>When anyone clicks on your referral link and registers an account on with us he/she becomes your direct referral. As soon as he/she begins their investment you earn 10% commission from this amount instantly.</p><br>

                    <a class="btn btn-default btn-light-bg page-scroll" href="about.php">Read More</a>

                </div>


                <div class="col-md-5 col-md-offset-1 animate" data-anim-type="fadeInRight" data-anim-delay="200">
                    <div class="stepsh stepshfirst">
                        <i class="pe-7s-note"></i>
                        <strong>1. Open Your Account</strong>
                        <p>Fill out the signup form with all the necessary information</p>
                    </div>

                    <div class="stepsh">
                        <i class="pe-7s-wallet"></i>
                        <strong>2. Make Your Investment</strong>
                        <p>Go to your account dashboard and submit your investments</p>
                    </div>

                    <div class="stepsh">
                        <i class="pe-7s-cash"></i>
                        <strong>3. Earn Daily Interest</strong>
                        <p>Every day your profits will be sent to your account balance</p>
                    </div>

                    <div class="stepsh" style="margin-bottom:0;">
                        <i class="pe-7s-portfolio"></i>
                        <strong>4. Process A Withdrawal</strong>
                        <p>Initiate your withdrawals and have your profit returns paid to you</p>
                    </div>
                </div>




            </div>
        </div>
    </section>


    <section class="hidden">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-project-complete">
                        <i class="pe-7s-timer"></i>
                        <h2 class="counter-num">2002</h2>
                        <h3>Running Days</h3>
                    </div>
                </div><!-- END COL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-project-complete">
                        <i class="pe-7s-users"></i>
                        <h2>5366</h2>
                        <h3>Total Accounts</h3>
                    </div>
                </div><!-- END COL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-project-complete">
                        <i class="pe-7s-graph3"></i>
                        <h2>$<span class="counter-num"> 12623650.96</span></h2>
                        <h3>Total Investments</h3>
                    </div>
                </div><!-- END COL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-project-complete">
                        <i class="pe-7s-science"></i>
                        <h2><span class="counter-num">81</span></h2>
                        <h3>Visitors Online</h3>
                    </div>
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div>
    </section>
    <section class="why_choose_us section-padding">
        <div class="container">
            <div class="row">
                <div class="section-title text-center animate" data-anim-type="fadeInUp">
                    <h2>Why Choose Us</h2>
                    <p>Incorporating a blend of advanced computer equipment and a centrally located data center, Fidelity Limited website Limited is capable of engaging in effective strategic Bitcoin mining, at a fraction of conventional price.</p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single_feature animate" data-anim-type="fadeInUp" data-anim-delay="300">
                                <p style="text-align:center"><img src="assets/img/ico1.svg" width="53" alt="" /></p>
                                <h3>Focused</h3>
                                <span></span>
                                <p>A global financial services firm with a focused model built around clients and their needs, with an emphasis on informed advice, tailored ideas and solutions and best-in-class execution.</p>
                            </div>
                        </div><!-- END col-sm-6 -->
                        <div class="col-md-4">
                            <div class="single_feature animate" data-anim-type="fadeInUp" data-anim-delay="600">
                                <p style="text-align:center"><img src="assets/img/ico2.svg" width="46" alt="" /></p>
                                <h3>Diverse</h3>
                                <span></span>
                                <p>We offer investment capabilities across traditional and alternative asset classes for private clients, intermediaries and institutional investors.</p>
                            </div>
                        </div><!-- END col-sm-6 -->
                        <div class="col-md-4">
                            <div class="single_feature animate" data-anim-type="fadeInUp" data-anim-delay="900">
                                <p style="text-align:center"><img src="assets/img/ico3.svg" width="62" alt="" /></p>
                                <h3>Investor Support</h3>
                                <span></span>
                                <p>We provide unbeatable support service through ticket system, email and phone to cater your needs and give a professional, fast and effectively response.</p>
                            </div>
                        </div><!-- END col-sm-6 -->
                    </div>
                </div>
                <!--- END COL -->
            </div>
            <!--- END ROW -->
        </div>
    </section>
    <section id="about" class="about-us section-padding">
        <div class="container">
            <div class="row animate" data-anim-type="fadeInUp">

                <div class="col-md-7 col-xs-12">
                    <div class="about-us-content">
                        <h2>More about <span>Us</span></h2>
                        <div class="about-line"></div>
                        <p>Our investment process requires independent and sometimes contrarian thinking. We provide services that help clients engage with local markets globally. Client needs vary, but our focus is constant – to provide nimble, innovative and bespoke access to solutions, from market and insight tools, to trading strategies and execution.</p>

                    </div>
                </div><!-- END COL -->

                <div class="col-md-5 col-xs-12 bluebg">
                    <div class="presentation"><iframe width="430" height="242" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="frame"></iframe>

                    </div>

                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>


    <div class="partner-logo section-padding2">
        <div class="partner_overlay">
            <div class="hidden" data-anim-type="fadeIn" data-anim-delay="300">

                <div class="hidden">
                    <div class="partner">
                        <span><img src="assets/img/s1.png" width="135" alt="image"></span>
                        <span><img src="assets/img/s2.png" width="161" alt="image"></span>
                        <span><img src="assets/img/s3.png" width="158" alt="image"></span>
                        <span><img src="assets/img/s4.png" width="99" alt="image"></span>
                        <span><img src="assets/img/s5.png" width="88" alt="image"></span>
                        <span><img src="assets/img/s6.png" width="124" alt="image"></span>
                        <span><img src="assets/img/s7.png" width="123" alt="image"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="modal-calculator">
        <div class="calculate-lightbox">
            <button class="close-box" data-izimodal-close=""></button>
            <div class="inputs-holder">
                <div class="input-group">
                    <label>Investment Amount</label>
                    <input type="text" id="txtAmount" value="10.00" placeholder="Investment Amount" class="dollar"> </div>
                <div class="input-group">
                    <label>Investment Period (Days)</label>
                    <input type="text" id="txtDays" value="30" placeholder="Investment Period" class="calendar"> </div>
                <input type="hidden" id="txtRate" value="3.6">
            </div>
            <div class="results">
                <div class="hourly-profit text-center">
                    <div>Hourly Profit</div> <span id="lblHourlyProfit"></span> USD
                </div>
                <div class="inlines-profit text-right">
                    <div>Daily Profit</div> <span id="lblDailyProfit"></span> USD
                </div>
                <div class="inlines-profit text-left">
                    <div>Total Return</div> <span id="lblTotalProfit"></span> USD
                </div>
            </div>

            <div class="text-center"> <a href="#" class="btn btn-small">Make Investment</a></div>
        </div>
    </div>

    <?php
    include "footer.php";
    include "scripts.php";
    ?>
</body>

</html>