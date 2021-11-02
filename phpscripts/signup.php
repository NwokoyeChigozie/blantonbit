    <?php
    function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    $ip = get_client_ip();
    ?>



    <?php
    include('connection.php');
    session_start();
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function digit_check($string)
    {
        if (preg_match('~[0-9]+~', $string)) {
            return "True";
        } else {
            return "False";
        }
    }
    if (isset($_POST['create_button'])) {

        $ref = '';
        $reff = mysqli_real_escape_string($link, $_POST['ref']);
        if (isset($_SESSION['ref'])) {
            $ref = $_SESSION['ref'];
        } elseif (!empty($reff)) {
            $ref = $reff;
        }

        $full_name = mysqli_real_escape_string($link, $_POST['full_name']);
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $password = mysqli_real_escape_string($link, $_POST['password']);
        $bitcoin_id = mysqli_real_escape_string($link, $_POST['bitcoin_id']);
        $ethereum_id = mysqli_real_escape_string($link, $_POST['ethereum_id']);
        $agree = mysqli_real_escape_string($link, $_POST['agree']);

        if ($ref != '') {
            $sql = "SELECT * FROM users WHERE username = '$ref'";
            $result = mysqli_query($link, $sql);
            $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $no_of_referals_o = $rows['no_of_referals'];
            $no_of_referals_n = $no_of_referals_o + 1;
            $sql_t = "UPDATE `users` SET `no_of_referals`='$no_of_referals_n' WHERE `username`= '$ref'";
            if (mysqli_query($link, $sql_t)) {
                //                                            $set = "ok";
            } else {
                //                                             $set = "false"; 
            }
        }

        $username = test_input(strtolower($username));
        $email = test_input(strtolower($email));

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            //    echo '<div class="alert alert-danger">Error occurred!</div>';
            echo '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Error Occurred!</div>';
            exit;
        }
        //If email & password don't match print error
        $count = mysqli_num_rows($result);
        if ($count >= 1) {
            echo '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Username has already been taken</div>';
            exit;
        }
        $full_name = test_input($full_name);
        $password = test_input($password);


        if (strlen($password) < 8) {
            echo '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Password must be atleat 8 characters</div>';
            exit;
        }


        if (digit_check($password) == "False") {
            echo '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Password must contain numeric character</div>';
            exit;
        }


        $password = hash('sha256', $password);
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($link, $sql);
        if (!$result) {
            //    echo '<div class="alert alert-danger">Error occurred!</div>';
            echo '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Error occurred!</div>';
            exit;
        }
        //If email & password don't match print error
        $count = mysqli_num_rows($result);
        if ($count >= 1) {
            echo '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">The email address you have entered is already registered. Please <a href="./?a=login" style="color:#6051da">log in</a></div>';
            exit;
        }
        //            $registered_at = date("F d, Y h:i:s", time());
        $registered_at = date("M-d-Y h:i:s A", time());
        $sql = "INSERT INTO `users`(`ref`,`full_name`, `username`,`email`, `bitcoin_wallet_address`,`password`,`login_count`, `ip_address`,`account_status`,`registered_at`,`last_seen`,`ethereum_wallet_address`,`agree`,`phone`,`country`) VALUES ('$ref','$full_name','$username','$email','$bitcoin_id','$password','0','$ip','Verified','$registered_at','$registered_at','$ethereum_id','$agree','','')";



        if (mysqli_query($link, $sql)) {
            $sql = "SELECT * FROM users WHERE email='$email' ";
            $result = mysqli_query($link, $sql);
            if (!$result) {
                echo '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Error running query!</div>';
                exit;
            }

            // $count = mysqli_num_rows($result);
            // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            //session_start();
            // $_SESSION['id'] = $row['id'];
            // $_SESSION['email'] = $row['email'];
            // $_SESSION['username'] = $row['username'];

            //            $resultMessage = "<p class='success'>Registration successful</p>";
            echo '<div class="alert alert-success" style="border-radius:3px;text-align:center;background-color:green;color:#fff;padding:10px 85px;margin-top:0px">Your registration was successfull. </div>';
            //            echo $_SESSION['id'] . ": " . $_SESSION['email'] . " " . ' Registered';
            //            echo $ip . " " . ' Registered';


            //                echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

            // echo "<script>
            //         function navigate(){
            //         window.location = './?page=account';
            //         }

            //         setTimeout(navigate, 2000);
            //         </script>";

            //            header("Refresh:3; url=../dashboard");





        } else {
            //            echo "<p class='error'>Error occurred while creating user<p>";
            echo("Error description: " . $link -> error);
            echo '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:10px 85px;margin-top:0px">Query Error</div>';
        }
    }

    ?>

