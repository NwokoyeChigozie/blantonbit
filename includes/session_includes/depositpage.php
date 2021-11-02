<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Deposit</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Deposit</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">

            <br>


            <div class="col-sm-12 text-left">
                <div class="card p-30 bg-info">
                    <h3 class=" text-white">Make a deposit</h3>
<div id="display1" style="display:block">
                    <div class="card-body">
                        <div class="row my-3">
                            <div class="col-md-3">
                                <div class="card card-pricing">
                                    <div class="card-body text-center">
                                    <h4 class="card-pricing-price">Basic Package</h4>
                                        <p class="card-pricing-plan-name font-weight-bold text-uppercase">10%</p>
                                        <span class="card-pricing-icon text-primary">
                                            <i class="fe-bar-chart"></i>
                                        </span>
                                        <h2 class="card-pricing-price">After 24 Hours</h2>
                                        <ul class="card-pricing-features">
                                            <li>Min Amount: $100</li>
                                            <li>Max Amount: $499</li>
                                            <li>Referral Bonus: 5%</li>

                                        </ul>

                                    </div>
                                </div>
                                <!-- end Pricing_card -->
                            </div>
                            <!-- end col -->

                            <div class="col-md-3">
                                <div class="card card-pricing">
                                    <div class="card-body text-center">
                                    <h4 class="card-pricing-price">Intermediate Package</h4>
                                        <p class="card-pricing-plan-name font-weight-bold text-uppercase">20%</p>
                                        <span class="card-pricing-icon text-primary">
                                            <i class="fe-bar-chart"></i>
                                        </span>
                                        <h2 class="card-pricing-price">After 3 Days</h2>
                                        <ul class="card-pricing-features">
                                            <li>Min Amount: $500</li>
                                            <li>Max Amount: $1,999</li>
                                            <li>Referral Bonus: 5%</li>

                                        </ul>

                                    </div>
                                </div>
                                <!-- end Pricing_card -->
                            </div>
                            <!-- end col -->

                            <div class="col-md-3">
                                <div class="card card-pricing">
                                    <div class="card-body text-center">
                                    <h4 class="card-pricing-price">Standard Package</h4>
                                        <p class="card-pricing-plan-name font-weight-bold text-uppercase">35%</p>
                                        <span class="card-pricing-icon text-primary">
                                            <i class="fe-bar-chart"></i>
                                        </span>
                                        <h2 class="card-pricing-price">After 5 Days</h2>
                                        <ul class="card-pricing-features">
                                            <li>Min Amount: $2000</li>
                                            <li>Max Amount: $9,999</li>
                                            <li>Referral Bonus: 10%</li>

                                        </ul>

                                    </div>
                                </div>
                                <!-- end Pricing_card -->
                            </div>
                            <!-- end col -->
                            <div class="col-md-3">
                                <div class="card card-pricing">
                                    <div class="card-body text-center">
                                    <h4 class="card-pricing-price">Premium Package</h4>
                                        <p class="card-pricing-plan-name font-weight-bold text-uppercase">60%</p>
                                        <span class="card-pricing-icon text-primary">
                                            <i class="fe-bar-chart"></i>
                                        </span>
                                        <h2 class="card-pricing-price">After 10 Days</h2>
                                        <ul class="card-pricing-features">
                                            <li>Min Amount: $10,000</li>
                                            <li>Max Amount: UNLIMITED</li>
                                            <li>Referral Bonus: 10%</li>
                                        </ul>

                                    </div>
                                </div>
                                <!-- end Pricing_card -->
                            </div>
                            <!-- end col -->
                        </div>
<!-- ////////////////////////////////////////////////////////////form 1 ///////////////////////////////////////////////// -->
                        <form method=post id="deposit_form1">
                            <input type=hidden name=a value=deposit>
                            <label class="form-label">Your Account Balance</label>
                            <input class="form-control" value="$<?php echo  normalize_amount($account_balance); ?>" disabled>
                            <br>
                            <br>
                            <label class="form-label">Select Package</label>

                            <select name=h_id id="type_r" class="form-control">
                                <option value='1'>Basic</option>
                                <option value='2'>Intermediate</option>
                                <option value='3'>Standard</option>
                                <option value='4'>Premium</option>
                            </select>

                            <br>
                            <br>

                            <label class="form-label">Select Payment Method</label>
                            <select name=type id="pay_currency" class="form-control">
                                <option value="BTC" selected>Bitcoin</option>
                                <option value="ETH">Ethereum</option>
                            </select>
                            <br>
                            <br>
                            <br>
                            <label class="form-label">Enter Amount ($)</label>
                            <br>
                            <input class="form-control" name=amount id ="txtAmount" value='100' placeholder="Deposit Amount">
                            <br>
                    </div>
                    <div class="card-footer text-muted">
                        <button type=submit id="de_submit" value="Spend" class="btn btn-primary ml-auto">Pay to Blanton</button>

                    </div>

                    </form>
                    <div class="de_message"></div>
</div>

<!-- ////////////////////////////////////////////////////////////form 1 ///////////////////////////////////////////////// -->
<div id="display2" style="display:none">
<h2 style="text-align:center;">Pay With <span class="paynow_currency"></span> to Blanton</h2><br>

<form method=post id="deposit_form2">
<label class="form-label">Amount(<span class="paynow_currency"></span>): 
<input id="crypto_amount" style="margin-top: 6px;" type="text" class="form-control" readonly value="0.0988488 BTC"></label>

<h4 style="text-align:left;color:red;">Please pay exactly the above stated <span class="paynow_currency"></span> amount to this address: </h4>
<input style="margin-top: 6px;" id="admin_wallet" type="text" class="form-control" readonly value="ouebfouiwfb;iobeg;uioebg">
<br><br><br><br>

<h3 style="text-align:center;color:blue;">Made your Payment?</h3>
<label class="form-label">Please Enter Transaction Hashcode Here:</label>
<input style="margin-top: 6px;" id="hashcode" type="text" class="form-control" value="" placeholder="Enter Hash Code">

                    <div class="card-footer text-muted">
                        <button type=submit id="hashcode_button" value="Spend" class="btn btn-primary ml-auto">Pay to Blanton</button>

                    </div>

                    </form>
                    <div class="de_message"></div>

<div>
<!-- ////////////////////////////////////////////////////////////form 2 ///////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////form 2 ///////////////////////////////////////////////// -->
                

                    <script language=javascript>
                        // for (i = 0; i < document.spendform.type.length; i++) {
                        //     if ((document.spendform.type[i].value.match(/^process_/))) {
                        //         document.spendform.type[i].checked = true;
                        //         break;
                        //     }
                        // }
                        // updateCompound();
                    </script>


                </div>
            </div>
        </div>

    </div>



<script>
    var last_payment_id;
        $(document).ready(function() {
                     
            $("#deposit_form1").submit(function(event) {
                event.preventDefault();
                // console.log("submitted")
                var u_id = <?php echo '"' . $_SESSION['id'] . '"';  ?>;
                var username = <?php echo '"' . $m_username . '"';?>;
                var de_email = <?php echo '"' . $email . '"';?>;


                var de_amount = $("#txtAmount").val();
                var pay_currency = $("#pay_currency").val();
                var type = $("#type_r").val();
                var d_am = de_amount;

/////////////////////////////////////////amount validation///////////////////////////////////////////////
                if(d_am < 100){
                    $('.de_message').html('<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Minimum amount is $100</div>');
                    return false;
                }else{
                    if(type == "1" && d_am < 100){
                       $('.de_message').html('<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Minimum amount for this plan is $100</div>');
                       return false;
                    }else if(type == "2" && d_am < 500){
                        $('.de_message').html('<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Minimum amount for this plan is $500</div>');
                        return false;
                    }else if(type == "3" && d_am < 2000){
                         $('.de_message').html('<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Minimum amount for this plan is $2000</div>');
                         return false;    
                    }else if(type == "4" && d_am < 10000){
                         $('.de_message').html('<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Minimum amount for this plan is $10000</div>');
                         return false;    
                    }else{

                        if(d_am < 500){
                            type = "1"; 
                        }else if(d_am > 499 && d_am < 2000){
                          type = "2"; 
                       }else if(d_am > 1999 && d_am < 10000){
                          type = "3";      
                       }else if(d_am > 9999){
                          type = "4";      
                       }      
                    }
                    
                }

/////////////////////////////////////////amount validation///////////////////////////////////////////////



                var type_r = type;
                var de_submit = $("#de_submit").val();
                
            //    console.log('Type: ' + type);
                
                $("#de_submit").html('<b>....</b>');
                $.ajax({
                    type: "POST",
                    url: "phpscripts/process.php/",
                    dataType: "json",
                    data: {
                        u_id: u_id,
                        username: username,
                        de_amount: de_amount,
                        pay_currency: pay_currency,
                        de_email: de_email,
                        type: type_r,
                        de_submit: de_submit
                    },
                    success: function(response) {
                        // console.log(response);
                        let json = null;
                    try {
                        json = JSON.parse(response); 
                    } catch (e) {
                        json = response;
                    }
                        if(json.error != "ok"){
                            
                            var message = '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">' + json.error +'</div>';
                            $(".de1_message").html(message);
                        }else{
                           $(".de_message").html(" ");
                           
                           

                            $("#crypto_amount").val(json.amount + " " + json.to_currency);
                            $(".paynow_currency").html(json.to_currency);
                            $("#admin_wallet").val(json.wallet_address);
                            $("#last_id").val(json.last_id);
                            last_payment_id = json.last_id;
                            $("#hashcode").val("");
                            $(".de1_message").html(" ");
                            $("#display1").css("display", "none");
                            $("#display2").css("display", "block");
//                            console.log("Last ID:" + json.last_id);
//                            $("#pay_now_button").attr("href", json.gateway_url);
                            // console.log("ok");
                        }
                    
                    console.log(json.error);
                        $("#de_submit").html('Pay to Blanton');
                    },
                    error: function(response) {
                        console.log(response);
                        $("#de_submit").html('Pay to Blanton');
                    }
                });

            });

        });

    </script>


<script>
        $(document).ready(function() {
                     
            $("#hashcode_button").click(function(event) {
                event.preventDefault();
            //    console.log("tid "+ last_payment_id);
                var u_id = <?php echo '"' . $_SESSION['id'] . '"'; ?>;
                var payment_id = last_payment_id;
                var hashcode = $("#hashcode").val();
                var hashcode_button = $("#hashcode_button").val();
                
                
                $("#hashcode_button").html('<b>....</b>');
                $.ajax({
                    type: "POST",
                    url: "phpscripts/process.php/",
                    dataType: "json",
                    data: {
                        u_id: u_id,
                        payment_id: payment_id,
                        hashcode: hashcode,
                        hashcode_button: hashcode_button
                    },
                    success: function(response) {
                        let json = null;
                    try {
                        json = JSON.parse(response); 
                    } catch (e) {
                        json = response;
                    }
                        if(json.error != "ok"){
                            
                            var message = '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">' + json.error +'</div>';
                            $(".de_message").html(message);
                        }else{
                            var message = '<div class="alert alert-success" style="border-radius:3px;text-align:center;background-color:green;color:#fff;padding:10px 85px;margin-top:0px">Hashcode Sent <br> Hashcode will be verified ASAP</div>';
                           $(".de_message").html(message); 
                            
                            setTimeout(function(){
                                window.location = './?a=account';
                            }, 3000);
                            
                            
                            
                        }
                        $("#hashcode_button").html('Submit Hashcode');
                    },
                    error: function(response) {
                        console.log(response);
                        $("#hashcode_button").html('Submit Hashcode');
                    }
                });

            });

        });

    </script>








    <script language="javascript">
        function openCalculator(id) {

            w = 225;
            h = 400;
            t = (screen.height - h - 30) / 2;
            l = (screen.width - w - 30) / 2;
            window.open('?a=calendar&type=' + id, 'calculator' + id, "top=" + t + ",left=" + l + ",width=" + w +
                ",height=" + h + ",resizable=1,scrollbars=0");



            for (i = 0; i < document.spendform.h_id.length; i++) {
                if (document.spendform.h_id[i].value == id) {
                    document.spendform.h_id[i].checked = true;
                }
            }



        }

        function updateCompound() {
            var id = 0;
            var tt = document.spendform.h_id.type;
            if (tt && tt.toLowerCase() == 'hidden') {
                id = document.spendform.h_id.value;
            } else {
                for (i = 0; i < document.spendform.h_id.length; i++) {
                    if (document.spendform.h_id[i].checked) {
                        id = document.spendform.h_id[i].value;
                    }
                }
            }

            var cpObj = document.getElementById('compound_percents');
            if (cpObj) {
                while (cpObj.options.length != 0) {
                    cpObj.options[0] = null;
                }
            }

            if (cps[id] && cps[id].length > 0) {
                document.getElementById('coumpond_block').style.display = '';

                for (i in cps[id]) {
                    cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
                }
            } else {
                document.getElementById('coumpond_block').style.display = 'none';
            }
        }
        var cps = {};
    </script>