<?php
ob_start();
//Start session
session_start();
include('connection.php');
 function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
 }
if(isset($_POST['security_update'])){
    $u_id = mysqli_real_escape_string($link, $_POST['u_id']);
    $auto_detect_ip = mysqli_real_escape_string($link, $_POST['ip_setting']);
    $auto_detect_browser = mysqli_real_escape_string($link, $_POST['browser_setting']);

    $username = test_input(strtolower($username));
    $email = test_input(strtolower($email));

    $sql = "SELECT * FROM `security` WHERE `u_id` = '$u_id'" ;
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    if ($count >= 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $sec_id =$row['id']; 
        $sql = "UPDATE `security` SET `u_id`='$u_id', `auto_detect_ip`='$auto_detect_ip', `auto_detect_browser`='$auto_detect_browser' WHERE `id`= '$sec_id'";    
        $result = mysqli_query($link, $sql);
        if($result){
            echo "worked";
        }else{
            echo "didn't worked";
        }
        echo "<script>
        function navigate(){
        window.location = './?a=security';
        }
        
        setTimeout(navigate, 2000);
        </script>";
        exit;
        
    } 
    $sql = "INSERT INTO `security`(`u_id`,`auto_detect_ip`,`auto_detect_browser`) VALUES ('$u_id','$auto_detect_ip','$auto_detect_browser')";
    $result = mysqli_query($link, $sql);
    echo "<script>
        function navigate(){
        window.location = './?a=security';
        }
        
        setTimeout(navigate, 2000);
        </script>";


    

}
