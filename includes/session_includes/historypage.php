<?php

$hu_id = $_SESSION['id'];
//echo $hu_id;
 include('phpscripts/connection.php');
//  include('phpscripts/functions.php');
   $sql = "SELECT * FROM `history` WHERE u_id = '$hu_id'";
$prods = [];
          if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $prods[] = $row;
            
        }
    }
          }
//print_r($prods);
$r_months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
if(isset($_SESSION['history_type'])){
    $history_type = $_SESSION['history_type'];
}else{
    $history_type = "";
}
if(isset($_SESSION['history_start_date'])){
    $history_start_date = $_SESSION['history_start_date'];
    $history_start_exploded = explode('-', $history_start_date);
    
    $history_start_month = $r_months[$history_start_exploded[1] -1 ];
}else{
    $history_start_date = "";
}
if(isset($_SESSION['history_end_date'])){
    $history_end_date = $_SESSION['history_end_date'];
    $history_end_exploded = explode('-', $history_end_date);
    $history_end_month = $r_months[$history_end_exploded[1] -1 ];
}else{
    $history_end_date = "";
}

if(isset($_SESSION['crypto_type'])){
    $history_crypto_type = $_SESSION['crypto_type'];
}else{
    $history_crypto_type = "";
}




// print_r($prods);
if($history_start_date != "" && $history_end_date != ""){
    $prods = filter_date($prods, $history_start_date, $history_end_date);
}
// print_r($prods);
if($history_type != ""){
    $prods = filter_type($prods, $history_type);
}
// print_r($prods);
if($history_crypto_type != ""){
    $prods = filter_crypto($prods, $history_crypto_type);
}
// print_r($prods);
?>
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
                    <h5 class="text-white">Transaction Type</h5>

                    <div class="card-body">

                        <script language=javascript>
                            function go(p) {
                                document.opts.page.value = p;
                                document.opts.submit();
                            }
                        </script>




                        <div class="row">
                            <div class="col-md-12">
                                <form method=post name=opts id="history_filter_form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select id="history-type" name=type class="form-control">
                                                    <?php if($history_type != ""){ echo "<option value='". $history_type ."' selected>". $history_type ."</option>";} ?>

                                                        <option value="">All transactions</option>
                                                        <option value="Deposit">Deposit</option>
                                                        <option value="Withdrawal">Withdrawal</option>
                                                        <option value="Earning">Earning</option>
                                                        <option value="Referral commission">Referral commission</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-1">
                                                    <label>From:</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=month_from id="from-month" class="form-control">
                                                        <?php if($history_start_date != ""){ echo "<option value='". $history_start_exploded[1] ."' selected>". $history_start_month ."";} ?>
                                                        <option value=1>Jan
                                                        <option value=2>Feb
                                                        <option value=3>Mar
                                                        <option value=4>Apr
                                                        <option value=5>May
                                                        <option value=6>Jun
                                                        <option value=7>Jul
                                                        <option value=8>Aug
                                                        <option value=9>Sep
                                                        <option value=10 <?php if($history_end_date == ""){ echo "selected";} ?>>Oct
                                                        <option value=11>Nov
                                                        <option value=12>Dec
                                                    </select> &nbsp;
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=day_from id="from-day" class="form-control">
                                                    <?php if($history_start_date != ""){ echo "<option value='". $history_start_exploded[0] ."' selected>". $history_start_exploded[0] ."";} ?>
                                                        <option value=1>1
                                                        <option value=2>2
                                                        <option value=3>3
                                                        <option value=4>4
                                                        <option value=5>5
                                                        <option value=6>6
                                                        <option value=7>7
                                                        <option value=8>8
                                                        <option value=9>9
                                                        <option value=10>10
                                                        <option value=11>11
                                                        <option value=12 <?php if($history_start_date == ""){ echo "selected";} ?>>12
                                                        <option value=13>13
                                                        <option value=14>14
                                                        <option value=15>15
                                                        <option value=16>16
                                                        <option value=17>17
                                                        <option value=18>18
                                                        <option value=19>19
                                                        <option value=20>20
                                                        <option value=21>21
                                                        <option value=22>22
                                                        <option value=23>23
                                                        <option value=24>24
                                                        <option value=25>25
                                                        <option value=26>26
                                                        <option value=27>27
                                                        <option value=28>28
                                                        <option value=29>29
                                                        <option value=30>30
                                                        <option value=31>31
                                                    </select> &nbsp;
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=year_from id="from-year" class="form-control">
                                                        <?php if($history_start_date != ""){ echo "<option value='". $history_start_exploded[2] ."' selected>". $history_start_exploded[2] ."";} ?>

                                                        <option value=2011>2011
                                                        <option value=2012>2012
                                                        <option value=2013>2013
                                                        <option value=2014>2014
                                                        <option value=2015>2015
                                                        <option value=2016>2016
                                                        <option value=2017>2017
                                                        <option value=2018>2018
                                                        <option value=2019>2019
                                                        <option value=2020>2020
                                                        <option value=2021 <?php if($history_start_date == ""){ echo "selected";} ?>>2021
                                                        <option value=2022>2022
                                                        <option value=2023>2023
                                                        <option value=2024>2024
                                                        <option value=2025>2025
                                                    </select><br><img src=images/q.gif width=1 height=4><br>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <br><img src=images/q.gif width=1 height=4><br>
                                                    <select id="crypto-type" name=ec class="form-control">
                                                        <option value="">All eCurrencies</option>
                                                        <?php if($history_crypto_type == "BTC"){
                                                            echo '<option value="BTC" selected>Bitcoin</option>
                                                            <option value="ETH">Ethereum</option>';
                                                        }elseif($history_crypto_type == "ETH"){
                                                            echo '<option value="BTC">Bitcoin</option>
                                                            <option value="ETH" selected>Ethereum</option>';
                                                        }else{
                                                            echo '<option value="BTC">Bitcoin</option>
                                                            <option value="ETH">Ethereum</option>';
                                                        }
                                                        ?>
                                                        <!-- <option value="BTC">Bitcoin</option>
                                                        <option value="ETH">Ethereum</option> -->
                                                    </select>
                                                </div>

                                                <div class="col-md-1">
                                                    <label>To:</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=month_to id="to-month" class="form-control">
                                                        <?php if($history_end_date != ""){ echo "<option value='". $history_end_exploded[1] ."' selected>". $history_end_month ."";} ?>
                                                        <option value=1>Jan
                                                        <option value=2>Feb
                                                        <option value=3>Mar
                                                        <option value=4>Apr
                                                        <option value=5>May
                                                        <option value=6>Jun
                                                        <option value=7>Jul
                                                        <option value=8>Aug
                                                        <option value=9>Sep
                                                        <option value=10 <?php if($history_end_date == ""){ echo "selected";} ?>>>Oct
                                                        <option value=11>Nov
                                                        <option value=12>Dec
                                                    </select> &nbsp;
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=day_to id="to-day" class="form-control">
                                                        <?php if($history_end_date != ""){ echo "<option value='". $history_end_exploded[0] ."' selected>". $history_end_exploded[0] ."";} ?>
                                                        <option value=1>1
                                                        <option value=2>2
                                                        <option value=3>3
                                                        <option value=4>4
                                                        <option value=5>5
                                                        <option value=6>6
                                                        <option value=7>7
                                                        <option value=8>8
                                                        <option value=9>9
                                                        <option value=10>10
                                                        <option value=11>11
                                                        <option value=12>12
                                                        <option value=13>13
                                                        <option value=14>14
                                                        <option value=15>15
                                                        <option value=16>16
                                                        <option value=17>17
                                                        <option value=18 <?php if($history_end_date == ""){ echo "selected";} ?>>18
                                                        <option value=19>19
                                                        <option value=20>20
                                                        <option value=21>21
                                                        <option value=22>22
                                                        <option value=23>23
                                                        <option value=24>24
                                                        <option value=25>25
                                                        <option value=26>26
                                                        <option value=27>27
                                                        <option value=28>28
                                                        <option value=29>29
                                                        <option value=30>30
                                                        <option value=31>31
                                                    </select> &nbsp;
                                                </div>
                                                <div class="col-md-2">
                                                    <select name=year_to id="to-year" class="form-control">
                                                        <?php if($history_end_date != ""){ echo "<option value='". $history_end_exploded[2] ."' selected>". $history_end_exploded[2] ."";} ?>
                                                        <option value=2011>2011
                                                        <option value=2012>2012
                                                        <option value=2013>2013
                                                        <option value=2014>2014
                                                        <option value=2015>2015
                                                        <option value=2016>2016
                                                        <option value=2017>2017
                                                        <option value=2018>2018
                                                        <option value=2019>2019
                                                        <option value=2020>2020
                                                        <option value=2021 <?php if($history_end_date == ""){ echo "selected";} ?>>2021
                                                        <option value=2022>2022
                                                        <option value=2023>2023
                                                        <option value=2024>2024
                                                        <option value=2025>2025
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-4">
                                            &nbsp; <input type=submit id="filter_submit" value="Filter" class="btn btn-primary ml-auto">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br><br>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0 text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th><b>Type</b></th>
                                        <th width="30%"><b>Amount</b></th>
                                        <th><b>Transaction Currency</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Date</b></th>
                                    </tr>
                                </thead>
                                <!-- <tr>
                                    <td colspan=3 align=center>
                                        <div class="alert alert-warning m-b-lg" role="alert">
                                            No transactions found
                                        </div>
                                    </td>
                                </tr> -->
                                <?php
                                if(!empty($prods) && $prods[0] != ''){
                                    foreach($prods as $prod){
                                        
                                    
                                    ?>
                                    <tr>
                                    <td><?php echo $prod['type']; ?></td>
                                    <td>$<?php echo  normalize_amount($prod['amount']); ?></td>
                                    <td>$<?php if($prod['crypto_currency'] == "BTC"){
                                        echo "Bitcoin";
                                    }elseif($prod['crypto_currency'] == "ETH"){
                                        echo "Ethereum";
                                    }
                                    ?></td>
                                    <td><?php echo $prod['status']; ?></td>
                                    <td><?php echo $prod['date']; ?></td>
                                </tr>
                                <?php
                                    }
                                }else{
                                    ?>
                                   <tr>
                                    <td colspan=5 align=center>
                                        <div class="alert alert-warning m-b-lg text-center" role="alert">
                                            No transactions found
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>


                                <tr>
                                    <td colspan=2>Total:</td>
                                    <td align=right><b>$ <?php echo history_sum($prods); ?></b></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="fi_message"></div>
    <script>
        $(document).ready(function() {
            $("#history_filter_form").submit(function(event) {
                event.preventDefault();
//
                var u_id = <?php echo '"' . $_SESSION['id'] . '"'; ?>;
                var main_email = <?php echo '"' . $email . '"'; ?>;
                var from_day = $("#from-day").val();
                var from_month = $("#from-month").val();
                var from_year = $("#from-year").val();
                var to_day = $("#to-day").val();
                var to_month = $("#to-month").val();
                var to_year = $("#to-year").val();
//                var ethereum_wallet = $("#ethereum_wallet").val();
                var history__type = $("#history-type").val();
                var crypto_type = $("#crypto-type").val();
                var filter_submit = $("#filter_submit").val();
                
                console.log("crypto_type: " + crypto_type + "u_id: " + u_id + " main_email: " + main_email + " from_day: " + from_day + " from_month: " + from_month + " from_year: " + from_year + " to_day: " + to_day + " to_month: " + to_month + " to_year: " + to_year + " history__type: " + history__type + " filter_submit: " + filter_submit);

//                $("#new-password--js").val('');
                $("#filter_submit").html('<b>....</b>');
                $.ajax({
                    type: "POST",
                    url: "phpscripts/history_filter.php/",
                    data: {
                        u_id: u_id,
                        main_email: main_email,
                        from_day: from_day,
                        from_month: from_month,
                        from_year: from_year,
                        to_day: to_day,
                        to_month: to_month,
                        to_year: to_year,
                        history__type: history__type,
                        crypto_type: crypto_type,
                        filter_submit: filter_submit
                    },
                    success: function(response) {
                        $(".fi_message").html(response);
                        //      console.log(response);
                        //      console.log("Done"); 
                        $("#filter_submit").html('Search');
                    },
                    error: function(response) {
                        console.log(response);
                        $("#filter_submit").html('Search');
                    }
                });

            });

        });

    </script>