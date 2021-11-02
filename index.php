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