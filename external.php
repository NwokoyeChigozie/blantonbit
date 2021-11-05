<!doctype html>
<html class="no-js" lang="">
<?php
session_start();
include('phpscripts/connection.php');
include('phpscripts/functions.php');
if(isset($_GET['ref'])){
    $_SESSION['ref'] = $_GET['ref'];
}
?>
<?php
$sql = "SELECT * FROM `admin` WHERE `id` = 1" ;
if($result = mysqli_query($link, $sql)){
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$support_email =$row['support_email']; //
$support_phone =$row['support_phone']; //
$company_location =$row['company_location']; //

}
//close the result set
mysqli_free_result($result);

}
} 
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blanton Limited</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- <script src="https://use.fontawesome.com/1731be311f.js"></script> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <style>
        .goog-te-gadget .goog-te-combo {
            margin: 4px 0 !important;
            /*width: 300px;*/
            text-transform: uppercase;
            font-weight: 400;
            font-weight: bold;
            margin-top: 15px !important;
        }

        .goog-logo-link {
            display: none !important;
        }
    </style>
</head>

<body>

    <header>
        <div class="header-top-area theme-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <ul class="header-wrapper">
                            <li>
                                <div class="header-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="header-text">
                                    <a href="#"><?php echo $support_phone;?></a>
                                    

                                </div>
                            </li>
                            <li>
                                <div class="header-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="header-text">
                                    <a href="#"><?php echo $support_email;?></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo">
                            <a href="./?a=home"><img src="img/logo.png" style="width: 180px; height: auto;" alt="" /></a>
                            <span id="google_translate_element"></span>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="main-menu text-center">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active"><a href="?a=home">home</a></li>
                                    <li><a href="?a=about">about Us</a></li>

                                    <li><a href="?a=faq">FAQ's</a></li>
                                    <li><a href="?a=plans">Investment offers</a></li>
                                    <li><a href="?a=partner">Partnership & Loans</a></li>
                                    <li><a href="?a=login">Log In</a></li>
                                    <li><a href="?a=signup">Sign Up</a></li>

                                    <li><a href="?a=support">contact Us</a> </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>




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







<!-- <h1>PDF Example with iframe</h1> -->
    <!-- <iframe src="./cert/hong_kong_cert_of_incorporation_blanton_limited.pdf" width="10%" height="10%">
    </iframe> -->



    <footer>
        <div class="footer-top-area theme-bg pt-80">
            <div class="container">
                <div class="footer-border pb-45">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-wrapper mb-30">
                                <div class="footer-logo">
                                    <a href="#"><img src="img/footer-logo.png" alt="" /></a>
                                </div>
                                <div class="footer-text">
                                    <p>We're an investment comapny providing a range of investment services to support our clients in business and in life. We’re focused on empowering you financially right throughout your life. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-wrapper mb-30">
                                <h3 class="footer-title">Quick Links</h3>
                                <ul class="footer-menu">
                                    <li class="active"><a href="?a=home">Home</a></li>
                                    <li><a href="?a=about">About Us</a></li>

                                    <li><a href="?a=faq">FAQ's</a></li>
                                    <li><a href="?a=plans">Investment Offers</a></li>
                                    <li><a href="?a=login">Log In</a></li>
                                    <li><a href="?a=signup">Sign Up</a></li>
                                    <li><a href="?a=support">contact Us</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-icon-area pt-40 pb-10">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="footer-icon-wrapper mb-30">
                                <div class="footers-icon">
                                    <a href="#"><i class="fas fa-phone"></i></a>
                                </div>
                                <div class="footer-icon-text">
                                    <h4>call us</h4>
                                    <span><?php echo $support_phone;?></span>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                            <div class="footer-icon-wrapper pl-30 mb-30">
                                <div class="footers-icon">
                                    <a href="#"><i class="fas fa-envelope"></i></a>
                                </div>
                                <div class="footer-icon-text">
                                    <h4>Email Us</h4>
                                    <span><?php echo $support_email;?></span>
                                    


                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 d-sm-none d-md-block">
                            <div class="footer-icon-wrapper pl-80 mb-30">
                                <div class="footers-icon">
                                    <a href="#"><i class="fas fa-home"></i></a>
                                </div>
                                <div class="footer-icon-text">
                                    <h4>Location</h4>
                                    <span><?php echo $company_location;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-icon-area pt-40 pb-10">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-icon-wrapper mb-30">
                                <div class="footer-icon-text">
                                    <h4>Blanton Limited's Certificate of Incorporation</h4>
                                    <span>Click <a href="./cert/hong_kong_cert_of_incorporation_blanton_limited.pdf">Certificate of Incoporation</a> to view our certificate</span>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 d-sm-none d-md-block">
                            <div class="footer-icon-wrapper pl-80 mb-30">
                            <div class="footer-icon-text">
                                    <h4>Blanton Limited's Certificate of Insurance</h4>
                                    <span>Click <a href="./cert/hong_kong_insurance_certificate_blanton_limited.pdf">Certificate of Insurance</a> to view our certificate</span>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-area pt-20 pb-20">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="copyright text-center">
                                <p>Copyright <i class="far fa-copyright"></i> 2021 Blanton Limited. All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!--Start of Tawk.to Script-->
    <!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6095f5d6185beb22b30b3bfb/1f54sgjse';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->
    <!--End of Tawk.to Script-->
    <!-- <div >
  <iframe src="./cert/hong_kong_cert_of_incorporation_blanton_limited.pdf" frameborder="1" scrolling="no" width="40%" height="200" align="left"> </iframe>
</div>

<div>
  <iframe src="./cert/hong_kong_insurance_certificate_blanton_limited.pdf" frameborder="1" scrolling="no" width="60%" height="200" align="left"></iframe>
</div> -->
</body>

</html>