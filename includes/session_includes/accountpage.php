<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->

        <br />

        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-4">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-bag f-s-40 color-primary"></i></span>
                        </div>
                        <div class="media-body text-right">
                            <h4>$<?php echo  normalize_amount($account_balance); ?></h4>
                            <p class="m-b-0">User Total Balance</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-comment f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body text-right">
                            <h4>$<?php echo  normalize_amount($total_withdrawal); ?></h4>
                            <p class="m-b-0">User Total Withdrawals</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-vector f-s-40 color-warning"></i></span>
                        </div>
                        <div class="media-body text-right">
                            <h4>$<?php echo  normalize_amount($pending_withdrawal); ?></h4>
                            <p class="m-b-0">User Pending Withdrawals</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card p-30 bg-primary">
                    <h3 class="text-white">User Data</h3>
                    <div class="card-body">
                        <div class="card-box">
                            <h4 class="mb-0"><?php echo ucfirst($m_username);?></h4>
                            <p class="text-white"><?php echo $email;?></p>

                            <div class="table-responsive">
                                <table class="table table-borderless table-centered text-white">
                                    <tbody>
                                        <tr>
                                            <td><strong>Referral Link :</strong></td>
                                            <td><?php echo $blanton_domain;?>/?a=signup&ref=<?php echo $m_username;?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sponsor : <?php echo ucfirst($ref);?></strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>User Total Balance :</strong></td>
                                            <td>$<?php echo  normalize_amount($account_balance); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card-box -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-30 bg-danger">
                    <h3 class="text-white">Dashboard</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-borderless table-centered">
                                    <tbody>
                                        <tr>
                                            <td>Total Earning</td>
                                            <td>$<?php echo  normalize_amount($earned_total); ?></td>
                                        </tr>

                                        <tr>
                                            <td>Active Deposit</td>
                                            <td>$<?php echo  normalize_amount($active_deposit); ?></td>
                                        </tr>


                                        <tr>
                                            <td>Last Access</td>
                                            <!-- <td>Oct-12-2021 09:46:02 AM</td> -->
                                            <td><?php echo  $last_seen; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card text-center">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>

                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                            {
                                "width": "100%",
                                "height": "490",
                                "defaultColumn": "overview",
                                "screener_type": "crypto_mkt",
                                "displayCurrency": "USD",
                                "colorTheme": "dark",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>

        <!-- Start Page Content -->

    </div>


    <br />
    <br />
    <br />
</div>