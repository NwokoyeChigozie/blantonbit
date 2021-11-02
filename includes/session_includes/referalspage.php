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
        <div class="row">
            <div class="col-sm-12 text-left">
                <div class="card bg-primary p-30">
                    <h5 class="text-white">Your Referrals</h5>

                    <div class="card-body">

                        <br>
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0">
                                <tr>
                                    <td class=item>Referrals:</td>
                                    <td class=item><?php echo  $no_of_referals; ?></td>
                                </tr>
                                <!-- <tr>
                                    <td class=item>Active referrals:</td>
                                    <td class=item>0</td>
                                </tr> -->
                                <tr>
                                    <td class=item>Total referral commission:</td>
                                    <td class=item>$<?php echo  normalize_amount($total_referal_commission); ?></td>
                                </tr>
                            </table>

                        </div>
                        <br>


                    </div>
                </div>
            </div>
        </div>
    </div>