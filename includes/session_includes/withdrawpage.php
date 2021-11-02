<?php

$hu_id = $_SESSION['id'];
//echo $hu_id;

$btcsum = 0;
$ethsum = 0;
include('phpscripts/connection.php');
$sql = "SELECT * FROM `withdrawal` WHERE u_id = '$hu_id' AND status = 'pending'";
$prods = [];
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $prods[] = $row;
            if ($row["crypto_currency"] == "BTC") {
                $btcsum += $row["withdrawal_amount"];
            } else if ($row["crypto_currency"] == "ETH") {
                $ethsum += $row["withdrawal_amount"];
            }
        }
    }
}
//print_r($prods);
$pend_total = $btcsum + $ethsum
?>
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Withdrawal</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Withdrawal</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-sm-12 text-left">
                <div class="card p-30 bg-primary">
                    <h5 class="text-white">Ask for withdrawal</h5>

                    <div class="card-body">







                        <form method=post id="withdrawal_form">
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-centered m-0">
                                    <tr>
                                        <td>Account Balance:</td>
                                        <td><b>$<?php echo  normalize_amount($account_balance); ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Pending Withdrawals: </td>
                                        <td>$<?php echo  normalize_amount($pend_total); ?><b></b></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-centered m-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th></th>
                                            <th style="padding-left:50px">Processing</th>
                                            <!-- <th>Available</th> -->
                                            <th>Pending</th>
                                            <th>Account</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td></td>
                                        <td><img src="images/1006.gif" width=44 height=17 align=absmiddle style="text-align:center"> Bitcoin</td>
                                        <!-- <td><b style="color:green">$0.00</b></td> -->
                                        <td><b style="color:red">$<?php echo  normalize_amount($btcsum); ?>0</b></td>
                                        <td>Account Address: <?php echo $bitcoin_wallet_address; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><img src="images/1007.gif" width=44 height=17 align=absmiddle style="text-align:center"> Ethereum</td>
                                        <!-- <td><b style="color:green">$0.00</b></td> -->
                                        <td><b style="color:red">$<?php echo  normalize_amount($ethsum); ?></b></td>
                                        <td>Account Address: <?php echo $ethereum_wallet_address; ?></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                            <br><br>
                            <?php
                if(isset($_SESSION['id'])){
                     if(normalize_amount($account_balance) > 0){
                    ?>
                    <!-- <hr> -->
                    <!-- <label class="form-label">Bitcoin Wallet Address:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="withdraw_bitcoin_address" id="withdraw_bitcoin_address" value="<?php
                        // if(!empty($bitcoin_wallet_address)){
                        //     echo $bitcoin_wallet_address;
                        // }else{
                        //     echo "Not Set";
                        // }
                
                        ?>" style="font-size: 14px;background-color:grey" autofocus placeholder="Username" readonly> -->
                    <!-- <label for="withdraw_bitcoin_address" style="margin-left:10px;color:red">Make sure your wallet address is correct!</label><br> -->
                        <!-- <br>
                    <label class="form-label">Ethereum Wallet Address:</label>
                    <input type="text" name="withdraw_bitcoin_address" id="withdraw_bitcoin_address" value="<?php
                        // if(!empty($ethereum_wallet_address)){
                        //     echo $ethereum_wallet_address;
                        // }else{
                        //     echo "Not Set";
                        // }
                
                        ?>" style="font-size: 14px;background-color:grey" autofocus placeholder="Username" readonly> -->
                    <!-- <label for="withdraw_bitcoin_address" style="margin-left:10px;color:red">Make sure your wallet address is correct!</label><br> -->

                    <!-- <br> -->
                    <label for="withdraw_bitcoin_address" style="color:red"><b>Please ensure your wallet addresses are correct!</b></label><br>
                <!-- <hr><br><br> -->

                <hr>
                    <label for="plan" class="form-label">Withdaw from:</label><br>
                   <select id="plan" class="plan_select form-control" >
                       <option value="">Select plan to withdraw</option>
                        <?php 
                                $plans_b = [];
                                $plans_c = [];
                                $plans_array = array("BASIC PLAN", "INTERMEDIATE PLAN", "STANDARD PLAN", "PREMIUM PLAN");
                        if(isset($_SESSION['id'])){
                            $user_i = $_SESSION['id'];
                            include('phpscripts/connection.php');
                               $sql = "SELECT * FROM `deposit_list` WHERE u_id = '$user_i' AND status= 'pending'" ;
                                
                                          if($result = mysqli_query($link, $sql)){
                                    if(mysqli_num_rows($result)>0){
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                            $plans_b[] = $row;

                                        }
                                    }
                                          }
                            
                            
                            if(!empty($plans_b)){
                                foreach($plans_b as $plb){
                                    $plans_c[] = $plb['type'];
                                }
                            }
                            sort($plans_c);
                            $plans_c = array_unique($plans_c);
                        }
                        if(!empty($plans_c)){
                            foreach($plans_c as $plc){
                                echo '<option value="'. $plc .'">' . $plans_array[$plc - 1] . '</option>';
                            }
                        }
                        if(isset($_SESSION['id'])){
                            if($total_referal_commission != '' && $total_referal_commission > 0){
                                echo '<option value="5">REFERRAL COMMISSION</option>';
                            }
                        }
                    
                       ?>
                    </select><br>
                    <label for="country" class="form-label">Amount($):</label>
                    <input type="text" name="withdraw_amount" class="form-control" id="withdraw_amount" value='0' autofocus placeholder="Amount" readonly>
                <br>
                <label class="form-label">Select Withdrawal Method</label>
                            <select name=type id="withdraw_currency" class="form-control">
                                <option value="BTC" selected>Bitcoin</option>
                                <option value="ETH">Ethereum</option>
                            </select>
                            <br>
                    <label for="country" class="form-label">Enter Password:</label><br>
                    <input type="password" name="withdraw_password" class="form-control" id="withdraw_password" value='' autofocus placeholder="Password">
                
                
                
                <div class="account-modal-bottom" style="padding: 0 !important; position: relative; margin: 40px auto !important;text-align: center;display: flex;justify-content: center; ">
		<button class="btn btn--blue register-btn" style="text-decoration:none" id="withdrawal_submit"> <span>Withdraw Funds</span>
				<div class="spinner" style="display:block">
					<div class="bounce1"></div>
					<div class="bounce2"></div>
					<div class="bounce3"></div>
				</div>
			</button>
		</div>
                <!-- <div class="account-modal-bottom wi_message" style="padding: 0 !important; position: relative; margin: 40px auto !important;text-align: center;display: flex;justify-content: center; ">
                </div> -->
                <?php
                }else{
                    ?>
                <div class="error-modal">
                  <div class="modal-head">
                  </div>
                  <ul>
                    <li>
                    <div class="alert alert-danger text-center" role="alert">You have no funds to withdraw.</div>
                    </li>
                  </ul>
                </div>
                <?php
                }
                }
                ?>

                        </form>

                    <div class="wi_message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            
    $('.plan_select').change(function() {
        var plan_g = $(".plan_select").val();
        var get_amount = "";
        var u_id = <?php
            if(isset($_SESSION['id'])){
                     echo '"' . $_SESSION['id'] . '"'; 
                    }
            
             ?>;
//        console.log(plan_g);
        var total_referal_commission = <?php
            if(isset($_SESSION['id'])){
                     echo '"' . $total_referal_commission . '"';
                    }
            
             ?>;
        if(plan_g != ""){
            $.ajax({
                    type: "POST",
                    url: "phpscripts/withdraw.php/",
                    data: {
                        u_id: u_id,
                        total_referal_commission: total_referal_commission,
                        plan_g: plan_g,
                        get_amount: get_amount
                    },
                    success: function(response) {
//                        $(".wi_message").html(response);
                        $('#withdraw_amount').attr('value', response)
                              console.log(response);
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
        }else{
            $('#withdraw_amount').attr('value', 0);
        }
                        
});         
            
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////          
            $("#withdrawal_form").submit(function(event) {
                event.preventDefault();
                var u_id = <?php
                    if(isset($_SESSION['id'])){
                      echo '"' . $_SESSION['id'] . '"';  
                    }
                    
                     ?>;
                var main_password = <?php
                    if(isset($_SESSION['id'])){
                      echo '"' . $password . '"';  
                    }
                    
                     ?>;
                var email = <?php
                    if(isset($_SESSION['id'])){
                      echo '"' . $email . '"';  
                    }
                    
                     ?>;
                var account_balance = <?php
                    if(isset($_SESSION['id'])){
                      echo '"' . $account_balance . '"';  
                    }
                    
                     ?>;
                var withdraw_bitcoin_address = $("#withdraw_bitcoin_address").val();
                var plan_c = $(".plan_select").val();
                if ($("#plan").val() != ''){
                    plan = '';
                }
                var withdraw_password = $("#withdraw_password").val();
                var withdraw_amount = $("#withdraw_amount").val();
                var withdraw_currency = $("#withdraw_currency").val();
                var withdrawal_submit = $("#withdrawal_submit").val();
//                
//                console.log("email: " + email + " account_balance: " + account_balance  + " withdraw_amount: " + withdraw_amount + " plan: " + plan_c);


//                $("#new-password--js").val('');
                $("#withdrawal_submit").html('<b>....</b>');
                $.ajax({
                    type: "POST",
                    url: "phpscripts/withdraw.php/",
                    data: {
                        u_id: u_id,
                        plan: plan_c,
                        main_password: main_password,
                        email: email,
                        account_balance: account_balance,
                        withdraw_bitcoin_address: withdraw_bitcoin_address,
                        withdraw_password: withdraw_password,
                        withdraw_amount: withdraw_amount,
                        withdraw_currency: withdraw_currency,
                        withdrawal_submit: withdrawal_submit
                    },
                    success: function(response) {
                        $(".wi_message").html(response);
                        //      console.log(response);
                        //      console.log("Done"); 
                        $("#withdrawal_submit").html('Withdraw Funds');
                    },
                    error: function(response) {
                        console.log(response);
                        $("#withdrawal_submit").html('Withdraw Funds');
                    }
                });

            });

        });

    </script>