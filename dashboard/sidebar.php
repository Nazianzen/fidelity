<div class="col-md-4">
    <div class="userbox animate" data-anim-type="fadeInUp" data-anim-delay="100">
        <i class="pe-7s-user user"></i>
        <div class="info">
            <h4>
                <?php
                include_once "includes/db_comms.inc.php";
                echo $user['username'];
                ?>
            </h4>

        </div> <a href="profile.php" class="edit"><i class="pe-7s-config"></i> Edit account</a>

    </div>
    <div>
        <ul class="usermenu animate" data-anim-type="fadeInUp" data-anim-delay="300">
            <li><a href="index.php"><i class="pe-7s-display1 hvr-pop"></i> Dashboard</a></li>
            <li><a href="deposit.php"><i class="pe-7s-upload hvr-pop"></i> Deposit</a></li>
            <li><a href="invest.php"><i class="pe-7s-wallet hvr-pop"></i> Make Investment</a></li>
            <li><a href="withdrawal.php"><i class="pe-7s-cash hvr-pop"></i> Withdraw Funds</a></li>
            <li><a href="invest_history.php"><i class="pe-7s-portfolio hvr-pop"></i> My Investments</a></li>
            <li><a href="withdrawal_history.php"><i class="pe-7s-date hvr-pop"></i> Withdrawal History</a></li>
            <li><a href="deposit_history.php"><i class="pe-7s-date hvr-pop"></i> Deposit History</a></li>
            <li><a href="referrals.php"><i class="pe-7s-users hvr-pop"></i> Referrals</a></li>
            <!-- <li><a href="?a=security"><i class="pe-7s-shield hvr-pop"></i> Security Settings</a></li> -->
            <!-- <li><a href="profile.php"><i class="pe-7s-config hvr-pop"></i> Edit Account</a></li> -->
        </ul>
    </div>
</div>