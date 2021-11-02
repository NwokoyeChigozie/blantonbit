<?php
if(!isset($_SESSION['id'])){

    // echo "<script>window.location.replace('./');</script>";
}
?>
<?php
    session_start();
    include_once('pages.php');
    if(!isset($_SESSION['id']) && in_array($_GET['a'], $session_pages)){

        echo "<script>window.location.replace('./?a=login');</script>";
    }elseif(isset($_SESSION['id']) && in_array($_GET['a'], $session_pages)){
        include_once('session.php');
    }elseif (!isset($_SESSION['id']) && in_array($_GET['a'], $nonsession_pages)) {
        include_once('external.php');
    }else{
        include_once('external.php');
    }


?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61813d5d6885f60a50b9f865/1fjgdfear';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->