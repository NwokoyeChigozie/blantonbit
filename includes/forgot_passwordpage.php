<?php
include('phpscripts/connection.php');
?>
<?php 
$forgot_passsword_v = 'false';
if(isset($_GET['sr']) && isset($_GET['pri']) && isset($_GET['email']) && isset($_GET['et'])){
    $get_email = $_GET['email'];
    $get_sr = $_GET['sr'];
    $get_pri = $_GET['pri'];
    $get_et = $_GET['et'];
 $sql = "SELECT * FROM password_recovery WHERE email='$get_email' AND elapse_time='$get_et'";
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if($count == 1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $main_sr = $row['sr'];
            $main_et = $row['elapse_time'];
            $main_count = $row['count'];
            
            if(time() < $main_et && $get_sr == $main_sr && $main_count == 0){
               $forgot_passsword_v = 'true'; 
            }
        }
}
// echo $forgot_passsword_v;
?>
<div class="breadcrumb-area pt-245 pb-245 " style="background-image:url(img/bg9.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-wrapper text-center">
                    <div class="breadcrumb-text">
                        <h1>Forgot Password</h1>
                    </div>
                    <div class="breadcrumb-menu mt-20">
                        <ul>
                            <li><a href="?a=home">home</a></li>
                            <li><span>Forgot Password</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-area gray-bg pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-bg white-bg mt-60">
                    <div class="section-title section3-title title-contact text-center mb-50">
                        <h1>Forgot Password</h1>
                    </div>

                    <script language=javascript>
                        function checkform() {
                            if (document.forgotform.email.value == '') {
                                alert("Please type your username or email!");
                                document.forgotform.email.focus();
                                return false;
                            }
                            return true;
                        }
                    </script>

                    <h3>Forgot your password:</h3><br>




                    <div id="first_display">
                    <form method=post name=forgotform id="forgot_password1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-20">
                                <input type=text name='email' id="forgot_email" value="" placeholder="Your E-Mail" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>

                            <div class="text-center mt-20">
                                <button class="btn" id="forgot_submit1" type="submit">Recover</button>
                            </div>

                        </div>
                    </form>
                    <div class="input-row fo1_message" style="padding: 0px !important; margin: 25px auto !important;text-align: center;display: flex;justify-content: center; ">
                        <!-- <div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:5px 85px;margin-top:0px"> Registration Successful</div> -->
                </div>
                    </div>



                    <div id="second_display" style="display:none">
                    <form method=post name=forgotform id="forgot_password2">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-20">
                                <input type=text name='password' id="forgot_password" value="" placeholder="New Password" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-12 col-md-12 mb-20">
                                <input type=text name='password' id="forgot_password4" value="" placeholder="Confirm Password" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>

                            <div class="text-center mt-20">
                                <button class="btn" id="forgot_submit2" type="submit">Change Password</button>
                            </div>

                        </div>
                    </form>
                    <div class="input-row fo2_message" style="padding: 0px !important; margin: 25px auto !important;text-align: center;display: flex;justify-content: center; ">
                        <!-- <div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:5px 85px;margin-top:0px"> Registration Successful</div> -->
                </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="map-area">
    <div id="map" class="map"></div>
</div>

<script>
        $(document).ready(function() {
            $("#forgot_password1").submit(function(event) {
                event.preventDefault();
                

                var email = $("#forgot_email").val();
                var forgot_submit1 = $("#forgot_submit1").val();
                
                console.log("forgot_email: " + email );


//                $("#new-password--js").val('');
                $("#forgot_submit1").html('<b>....</b>');
                $.ajax({
                    type: "POST",
                    url: "phpscripts/forgot_password.php/",
                    data: {
                        email: email,
                        forgot_submit1: forgot_submit1
                    },
                    success: function(response) {
                        $(".fo1_message").html(response);
                             console.log(response);
                        //      console.log("Done"); 
                        $("#forgot_submit1").html('Recover');
                    },
                    error: function(response) {
                        console.log(response);
                        $("#forgot_submit1").html('Recover');
                    }
                });

            });

        });

    </script>


<script>
        $(document).ready(function() {
            if(<?php echo '"' . $forgot_passsword_v . '"'; ?> == "true"){
                console.log("true");
                $("#first_display").css("display", "none");
                $("#second_display").css("display", "block");
                
            }else{
                console.log("false");
            }
            
            
            $("#forgot_password2").submit(function(event) {
                event.preventDefault();
                
                var email = <?php if(isset($_GET['email'])){ echo '"' . $_GET['email'] . '"';} ?>;
                var elapsetime = <?php if(isset($_GET['email'])){ echo '"' . $get_et . '"';} ?>;
                var forgot_password = $("#forgot_password").val();
                var forgot_password4 = $("#forgot_password4").val();
                var forgot_submit2 = $("#forgot_submit2").val();
                


//                $("#new-password--js").val('');
                $("#forgot_submit2").html('<b>....</b>');
                $.ajax({
                    type: "POST",
                    url: "phpscripts/forgot_password.php/",
                    data: {
                        email: email,
                        elapsetime: elapsetime,
                        forgot_password: forgot_password,
                        forgot_password2: forgot_password4,
                        forgot_submit2: forgot_submit2
                    },
                    success: function(response) {
                        $(".fo2_message").html(response);
                        //      console.log(response);
                        //      console.log("Done"); 
                        $("#forgot_submit2").html('Change Password');
                    },
                    error: function(response) {
                        console.log(response);
                        $("#forgot_submit2").html('Change Password');
                    }
                });

            });

        });

    </script>