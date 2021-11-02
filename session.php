<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('phpscripts/connection.php');
include('phpscripts/functions.php');

?>





<?php

if(isset($_SESSION['id'])){
    $base_id = $_SESSION['id'];
    $plan_duration = array(0, 86400,259200,432000,864000);  
    $plan_percentage = array(0, 0.1,0.2,0.35,0.6);
    $part_plan_percentage = array(0, 0.1,0.067,0.07,0.06);
    $ref_com = array(0, 0.05,0.05,0.1,0.1);
    $depos = [];
    $all_depos = [];
    $all_withd = [];
       $sql = "SELECT * FROM `deposit_list` WHERE u_id = '$base_id' AND status = 'pending'" ;
          if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $depos[] = $row;
            
        }
    }
          }

          $sql = "SELECT * FROM `users` WHERE `id` = '$base_id'" ;
          if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $total_referal_commission_1 =$row['total_referal_commission'];
            $refe =$row['ref'];
            if($total_referal_commission_1 == "" || empty($total_referal_commission_1)){
                $total_referal_commission_1 = 0;
            }
        }
    }
          }
    if(!empty($depos) && $depos[0] != ""){
        foreach($depos as $depo){
            $depo_id = $depo['id'];
            $depo_type = $depo['type'];
            $depo_amount = $depo['amount'];
            $depo_total_amount = $depo['total_amount'];
            $depo_create_timestamp = $depo['create_timestamp'];
            $depo_last_update_timestamp = $depo['last_update_timestamp'];
            $new_last_update_timestamp = time();
//             && $depo_amount == $depo_total_amount
            if(time() - $depo_create_timestamp > $plan_duration[$depo_type]){
//                $n_time = time() - $depo_last_update_timestamp;
//            $int_day = $n_time / (24 * 3600);
//            $int_day = $int_day / ($plan_duration[$depo_type]/(24 * 3600));
                
                $new_total_amount = $depo_amount + ($plan_percentage[$depo_type] * $depo_amount);
                
                $sql_t = "UPDATE `deposit_list` SET `total_amount`='$new_total_amount', `last_update_timestamp`='$new_last_update_timestamp' WHERE `id`= '$depo_id'";    
                                        if(mysqli_query($link, $sql_t)){
                                        }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM `users` WHERE `username` = '$refe'" ;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $total_ref_referal_commission_1 =$row['total_referal_commission'];
            if($total_ref_referal_commission_1 == "" || empty($total_ref_referal_commission_1)){
                $total_ref_referal_commission_1 = 0;
            }
        }
    }
}
$total_ref_referal_commission_new = $total_ref_referal_commission_1 + ($ref_com[$depo_type] * $depo_amount);
$sql_t = "UPDATE `users` SET `total_referal_commission`='$total_ref_referal_commission_new' WHERE `username`= '$refe'";    
if(mysqli_query($link, $sql_t)){
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                
            }else{
               $rate_d = floor((time() - $depo_create_timestamp)/(86400));
               $new_total_amount = $depo_amount + ($part_plan_percentage[$depo_type] * $depo_amount * $rate_d);
                $sql_t = "UPDATE `deposit_list` SET `total_amount`='$new_total_amount', `last_update_timestamp`='$new_last_update_timestamp' WHERE `id`= '$depo_id'";    
                                        if(mysqli_query($link, $sql_t)){
                                        }



            }
            
            
        }
    }
 

            
                     
        $sql = "SELECT * FROM `deposit_list` WHERE u_id = '$base_id'" ;
          if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $all_depos[] = $row;
            
        }
    }
          }  
    
        $sql = "SELECT * FROM `history` WHERE u_id = '$base_id'" ;
          if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $all_withd[] = $row;
            
        }
    }
          }  
    $last_investment_v = 0;
    $account_balance_v = $total_referal_commission_1;
    $total_earnings_v = $total_referal_commission_1;
    $all_time_investments = 0;
//    print_r($all_depos);
    if(!empty($all_depos) && !empty($all_depos[0])){
        $de_counter = 0;
        foreach($all_depos as $all_depo){
            $all_depo_id = $all_depo['id'];
            $all_depo_type = $all_depo['type'];
            $all_depo_amount = $all_depo['amount'];
            $all_depo_total_amount = $all_depo['total_amount'];
            $all_depo_status = $all_depo['status'];
            $de_counter = $de_counter + 1;
            
            $all_time_investments = $all_time_investments + $all_depo_amount;
            
            if($de_counter == 0){
                $last_investment_v = $all_depo_amount;
            }
            if($all_depo_status == "pending"){
                $account_balance_v = $account_balance_v + $all_depo_total_amount;
                $total_earnings_v = $total_earnings_v + ($all_depo_total_amount - $all_depo_amount);
            }
            
            
            
        }
    }
    
    $last_withdrawal_v = 0;
    $pending_withdrawal_v = 0;
    $total_withdrawal_v = 0;
//    print_r($all_withd);
        if(!empty($all_withd) && !empty($all_withd[0])){
        $wi_counter = 0;
        foreach($all_withd as $all_with){
            $all_with_id = $all_depo['id'];
            $all_with_amount = $all_depo['amount'];
            $all_with_status = $all_depo['status'];
            $wi_counter = $wi_counter + 1;
            
            $total_withdrawal_v = $total_withdrawal_v + $all_with_amount;
            
            if($wi_counter == 0){
                $last_withdrawal_v = $all_with_amount;
            }
            if($all_depo_status == "pending"){
                $pending_withdrawal_v = $pending_withdrawal_v + $all_with_amount;
            }
            
            
            
        }
    }
//    echo "<br>Depo id: $depo_id<br>";
    $sql_t = "UPDATE `users` SET `account_balance`='$account_balance_v', `earned_total`='$total_earnings_v', `total_withdrawal`='$total_withdrawal_v', `last_withdrawal`='$last_withdrawal_v', `pending_withdrawal`='$pending_withdrawal_v', `last_deposit`='$last_investment_v', `total_deposit`='$all_time_investments' WHERE `id`= '$base_id'";    
                                        if(mysqli_query($link, $sql_t)){
//                                            echo "<br> updated";
                                        }
    
    
    



}

?>









<?php
if(isset($_SESSION['id'])){   
    $id= $_SESSION['id'];
    
  $sql = "SELECT * FROM `users` WHERE `id` = '$id'" ;
          if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            
                     $id = $row['id'];//
    $full_name =$row['full_name']; 
    $m_username =$row['username']; 
    $email =$row['email']; 
    $phone =$row['phone']; 
    $password =$row['password']; 
    $country =$row['country']; 
    $ip_address =$row['ip_address']; 
    $ref =$row['ref']; 
    $account_status =$row['account_status']; 
    $login_count =$row['login_count']; 
    $registered_at =$row['registered_at']; 
    $reg_d = explode(' ', $registered_at);   
    $reg_d =  $reg_d[0];
    $rd_split = explode('-', $reg_d);
    $reg_stamp = strtotime($rd_split[1] . '-' . $rd_split[0] . '-' . $rd_split[2] . ' ' . $reg_d[1]);
    $c_time = time();
    $elapse_time = $reg_stamp + 86400;
    $regt_diff = $elapse_time - $c_time;
    $account_balance =$row['account_balance']; 
    $earned_total =$row['earned_total']; 
    $total_withdrawal =$row['total_withdrawal']; 
    $last_withdrawal =$row['last_withdrawal']; 
    $pending_withdrawal =$row['pending_withdrawal']; 
    $active_deposit =$row['active_deposit']; 
    $last_deposit =$row['last_deposit']; 
    $total_deposit =$row['total_deposit']; 
    $bitcoin_wallet_address =$row['bitcoin_wallet_address']; 
   $ethereum_wallet_address =$row['ethereum_wallet_address']; 
    $detect_ip =$row['detect_ip']; 
    $detect_browser =$row['detect_browser']; 
    $no_of_referals =$row['no_of_referals']; 
    $active_referals =$row['active_referals']; 
    $total_referal_commission =$row['total_referal_commission']; 
    $count_down =$row['count_down']; 
    $last_seen =$row['last_seen']; 
    $new_seen = date("M-d-Y h:i:s A", time());
            
        $sql_t = "UPDATE `users` SET `last_seen`='$new_seen' WHERE `email`= '$email'";    
    if(mysqli_query($link, $sql_t)){
    }
        
        }
        //close the result set
        mysqli_free_result($result);

    }
}  
    if($login_count == 0){
            $new_login_count = $login_count + 1;
     $sql_t = "UPDATE `users` SET `login_count`='$new_login_count' WHERE `id`= '$id'";    
                                        if(mysqli_query($link, $sql_t)){

                                        } 
    }

    
    
}
$sql = "SELECT * FROM `admin` WHERE `id` = 1" ;
if($result = mysqli_query($link, $sql)){
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$support_email =$row['support_email']; //
$support_phone =$row['support_phone']; //

}
//close the result set
mysqli_free_result($result);

}
}  
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png" />
    <title>Blanton Limited</title>
    <!-- Custom CSS -->

    <link href="scss/export.css" rel="stylesheet" />
    <link href="scss/owl.carousel.min.css" rel="stylesheet" />
    <link href="scss/owl.theme.default.min.css" rel="stylesheet" />
    <link href="scss/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://use.fontawesome.com/1731be311f.js"></script>
</head>

<body class="header-fix fix-sidebar">
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="?a=account">
                        <!-- Logo icon -->
                        <b><img src="img/slogo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="img/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link toggle-nav hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggle text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello <?php echo ucfirst($m_username);?>! <i class="fa fa-user"></i></a>
                            <div class="dropdown-menu dropdown-menu-right animated slideInRight">
                                <ul class="dropdown-user">
                                    <li role="separator" class="divider"></li>
                                    <li><a href="?a=deposit"> Deposit</a></li>
                                    <li><a href="?a=edit_account"> Profile</a></li>
                                    <li><a href="#" class="logout_button"> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebar-menu">
                        <li class="nav-devider"></li>
                        <li><a href="?a=account"><i class="fas fa-home"></i>Dashboard</a></li>
                        <li><a href="?a=deposit"><i class="fa fa-plus-square"></i> Deposit</a></li>
                        <li><a href="?a=deposit_list"><i class="fas fa-list"></i>Deposit List</a></li>
                        <li><a href="?a=withdraw"><i class="fas fa-download"></i> Withdraw</a></li>
                        <li><a href="?a=edit_account"><i class="fas fa-user"></i> Profile</a></li>
                        <!-- <li><a href="?a=referallinks"><i class="fas fa-network-wired"></i> Banners</a></li> -->
                        <li><a href="?a=history"><i class="fas fa-arrow-up"></i> History</a></li>
                        <!-- <li><a href="?a=deposit_history"><i class="fas fa-arrow-up"></i> Deposit History</a></li>
                        <li><a href="?a=earnings"><i class="fas fa-people-arrows"></i> Earnings History</a></li>
                        <li><a href="?a=withdraw_history"><i class="fas fa-history"></i> Withdrawals History</a></li> -->
                        <li><a href="?a=referals"><i class="fas fa-user"></i>Referrals </a></li>
                        <li><a href="?a=security"><i class="fas fa-shield-alt"></i>Security</a></li>
                        <li><a href="#" class="logout_button"><i class="fas fa-sign-out-alt"></i> Logout</a></li>


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->







<?php
//////////////////////////////////////////////////////////////////////////////////////////////


if (!isset($_GET['a']) || $_GET['a'] == "home") {
    include_once('includes/indexpage.php');
} else {
    if (in_array($_GET['a'], $session_pages) || in_array($_GET['a'], $nonsession_pages)) {
        $link = "includes/" . $_GET['a'] . "page.php";

        if (in_array($_GET['a'], $session_pages)) {
            $link = "includes/session_includes/" . $_GET['a'] . "page.php";
            include_once("includes/session_includes/base.php");
        }

        if ($_GET['a'] == 'deposit' && !isset($_SESSION['id'])) {
            $link = 'includes/indexpage.php';
        }

        include_once($link);
    } else {
        include_once('includes/indexpage.php');
    }
}

?>






























        <!-- footer -->
        <div class="logout_message"></div>        

        <footer class="footer"> ©
            <script>
                document.write(new Date().getFullYear());
            </script> Blanton Limited All Right Reserved.
        </footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="sjs/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="sjs/popper.min.js"></script>
    <script src="sjs/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="sjs/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="sjs/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="sjs/sticky-kit.min.js"></script>

    <!-- Amchart -->
    <script src="1/https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="sjs/serial.js"></script>
    <script src="sjs/export.min.js"></script>
    <script src="sjs/light.js"></script>
    <script src="sjs/ammap.js"></script>
    <script src="sjs/worldLow.js"></script>
    <script src="sjs/pie.js"></script>
    <script src="sjs/amstock.js"></script>
    <script src="sjs/amchart-init.js"></script>
    <script src="https://kit.fontawesome.com/a0c361a166.js" crossorigin="anonymous"></script>

    <script src="sjs/jquery.simpleWeather.min.js"></script>
    <script src="sjs/weather-init.js"></script>
    <script src="sjs/owl.carousel.min.js"></script>
    <script src="sjs/owl.carousel-init.js"></script>
    <script src="sjs/scripts.js"></script>
    <!--Custom JavaScript -->
    <script src="sjs/custom.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".logout_button").click(function(event) {
                event.preventDefault();
                var logout_button = $(".logout_button").val();
//                console.log("clicked")
                $.ajax({
                    type: "POST",
                    url: "phpscripts/logout.php/",
                    data: {
                        logout_button: logout_button
                    },
                    success: function(response) {
                        $(".logout_message").html(response);
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });

            });

        });

    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>


</body>

</html>