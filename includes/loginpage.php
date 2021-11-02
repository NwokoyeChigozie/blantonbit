<div class="breadcrumb-area pt-245 pb-245 " style="background-image:url(img/bg9.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-wrapper text-center">
                    <div class="breadcrumb-text">
                        <h1>Log In</h1>
                    </div>
                    <div class="breadcrumb-menu mt-20">
                        <ul>
                            <li><a href="?a=home">home</a></li>
                            <li><span>Log In</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-area gray-bg pt-120" style="margin-bottom: -500px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-bg white-bg mt-60">
                    <div class="section-title section3-title title-contact text-center mb-50">
                        <h1>Log In</h1>
                    </div>
                    <form method="post" id="login_form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=text name="email" id="login_email" value='' placeholder="E-mail" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>

                            <div class="col-lg-6 col-md-6 mb-20">
                                <input type=password name="password" id="login_password" value='' placeholder="Password" style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
                            </div>

                            <div class="col-lg-6 col-md-6 mb-20">
                                <a href="?a=forgot_password">Forgot Password?</a>
                            </div>
                            <div class="text-center mt-20">
                                <button class="btn" id="login_submit" type="submit">Log In</button>
                            </div>

                        </div>
                    </form>
                    <div class="input-row l_message" style="padding: 0px !important; margin: 25px auto !important;text-align: center;display: flex;justify-content: center; ">
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
        $("#login_form").submit(function(event) {
            event.preventDefault();

            var email = $("#login_email").val();
            var password = $("#login_password").val();
            var login_button = $("#login_submit").val();

            //                console.log("email: " + email + " password: " + password );


            $("#login_submit").html('<b>....</b>');
            $.ajax({
                type: "POST",
                url: "phpscripts/login.php/",
                data: {
                    email: email,
                    password: password,
                    login_button: login_button
                },
                success: function(response) {
                    $(".l_message").html(response);
                    $("#login_submit").html('Log In');
                },
                error: function(response) {
                    console.log(response);
                    $("#login_submit").html('Log In');
                }
            });

        });

    });
</script>