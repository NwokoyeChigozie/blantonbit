<div class="breadcrumb-area pt-245 pb-245 " style="background-image:url(img/bg9.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-wrapper text-center">
                    <div class="breadcrumb-text">
                        <h1>Sign Up</h1>
                    </div>
                    <div class="breadcrumb-menu mt-20">
                        <ul>
                            <li><a href="?a=home">home</a></li>
                            <li><span>Sign Up</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-area gray-bg pt-120" style="margin-bottom: -400px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-bg white-bg mt-60">
                    <div class="section-title section3-title title-contact text-center mb-50">
                        <h1>Sign Up</h1>
                    </div>
                    <form method=post id="signup_form">
                        <input type="hidden" name="form_id" value="16336787898254">
                        <input type="hidden" name="form_token" value="bbdc861d340ea57d319f9fc83226f5c2">
                        <input type=hidden name=a value="signup">
                        <input type=hidden name=action value="signup">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=text name="fullname" id="register_fullname" value='' placeholder="Your Full Name" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=text name="username" id="register_username" value='' placeholder="Username" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=password name="password" id="register_password" value='' placeholder="Password" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=password name="password2" id="register_password2" value='' placeholder="Confirm Password" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=text class="inpts" size="30" name="bitcoin_id" id="register_bitcoin_id" value="" placeholder="Your Bitcoin Wallet Address" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=text class="inpts" size="30" name="ethereum_id" id="register_ethereum_id" value="" placeholder="Your Ethereum Wallet Address" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=text name="email" id="register_email" value='' placeholder="E-mail Address" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=text name="email1" id="register_email1" value='' placeholder="Confirm E-mail" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=text value='<?php
                                if(isset($_GET['ref'])){
                                   echo $_GET['ref'];
                                }
                                ?>' id="register_ref" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-20">

                            </div>

                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=checkbox name=agree value=1 required> I agree with <a href="?a=rules">Terms
                                    and conditions</a></td>
                            </div>
                            <div class="text-center mt-20">
                                <button class="btn" id="register_submit" type="submit">Sign Up</button>
                            </div>


                        </div>
                        <!-- <div class="alert alert-sucess text-center">testing output</div> -->

                    </form>
                    <div class="input-row reg_message" style="padding: 0px !important; margin: 25px auto !important;text-align: center;display: flex;justify-content: center; ">
                        <!-- <div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:5px 85px;margin-top:0px"> Registration Successful</div> -->
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
        $("#signup_form").submit(function(event) {
            event.preventDefault();

            //
            var ref = $("#register_ref").val();
            var full_name = $("#register_fullname").val();
            var username = $("#register_username").val();
            var email = $("#register_email").val();
            var email1 = $("#register_email1").val();
            var password = $("#register_password").val();
            var password2 = $("#register_password2").val();
            var bitcoin_id = $("#register_bitcoin_id").val();
            var ethereum_id = $("#register_ethereum_id").val();
            var create_button = $("#register_submit").val();
            var agree = true;
            if (!checkform(full_name, username, email, email1, password, password2, bitcoin_id, ethereum_id,
                    create_button)) {
                return false
            }
            // console.log("ref: " + ref + " full_name: " + full_name + " username: " + username +" bitcoin_id: " + bitcoin_id + " email: " + email + " email1: " + email1 + " password: " + password + " password2: " + password2 + " ethereum_id: " + ethereum_id + " create_button: " + create_button)
            $(".reg_message").val(' ');
            $("#register_submit").html('<b>....</b>');
            $.ajax({
                type: "POST",
                url: "phpscripts/signup.php/",
                data: {
                    ref: ref,
                    full_name: full_name,
                    username: username,
                    email: email,
                    email1: email1,
                    password: password,
                    password2: password2,
                    bitcoin_id: bitcoin_id,
                    ethereum_id: ethereum_id,
                    create_button: create_button,
                    agree: agree
                },
                success: function(response) {
                    $(".reg_message").html(response);
                    //      console.log(response);
                    //      console.log("Done"); 
                    $("#register_submit").html('Sign Up');
                },
                error: function(response) {
                    console.log(response);
                    $("#register_submit").html('Sign Up');
                }
            });
            // $("#register_submit").html('Sign Up');
        });

    });
</script>

<script language=javascript>
    function error(message) {
        errm = '<div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:5px 85px;margin-top:0px">' + message + '</div>'
            // document.getElementsByClassName("reg_message").innerHTML = errm;
        document.querySelector(".reg_message").innerHTML = errm;
    }

    function initFocus(id) {
        document.getElementById(id).focus();
    }

    function checkform(full_name, username, email, email1, password, password2, bitcoin_id, ethereum_id,
        create_button) {

        if (full_name == '') {
            error("Please enter your full name!");
            initFocus("register_fullname");
            return false;
        }

        if (username == '') {
            error("Please enter your username!");
            initFocus("register_username");
            return false;
        }

        if (!username.match(/^[A-Za-z0-9_\-]+$/)) {
            error("For username, you should use English letters and digits only!");
            initFocus("register_username");
            return false;
        }

        if (password == '') {
            error("Please enter your password!");
            initFocus("register_password");
            return false;
        }

        if (password != password2) {
            error("Passwords do not match");
            initFocus("register_password2");
            return false;
        }

        if (bitcoin_id == '') {
            error("Please enter your Bitcoin Account ID!");
            initFocus("register_bitcoin_id");
            return false;
        }
        if (ethereum_id == '') {
            error("Please enter your Ethereum adAccount ID!");
            initFocus("register_ethereum_id");
            return false;
        }

        if (email == '') {
            error("Please enter your e-mail address!");
            initFocus("register_email");
            return false;
        }

        if (!email.match(/^[^\@]+\@[^\@]+\.\w{2,4}$/)) {
            error("Invalid E-mail Address!");
            initFocus("register_email");
            return false;
        }

        if (email != email1) {
            error("E-mail addresses do not match");
            initFocus("register_email1");
            return false;
        }


        return true;
    }

    function IsNumeric(sText) {
        var ValidChars = "0123456789";
        var IsNumber = true;
        var Char;
        if (sText == '') return false;
        for (i = 0; i < sText.length && IsNumber == true; i++) {
            Char = sText.charAt(i);
            if (ValidChars.indexOf(Char) == -1) {
                IsNumber = false;
            }
        }
        return IsNumber;
    }
</script>