<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Profile</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-sm-12 text-left">
                <div class="card p-30 bg-primary">
                    <h5 class="text-white">Your account</h5>

                    <div class="card-body">
                        <form action="" method=post id="edit_account_form"><input type="hidden" name="form_id" value="16344586454280"><input type="hidden" name="form_token" value="09895740034c82b8842e4b5c3bade75d">
                            <input type=hidden name=a value=edit_account>
                            <input type=hidden name=action value=edit_account>
                            <input type=hidden name=say value="">

                            <div class="table-responsive">
                                <table class="table table-borderless table-centered m-0">
                                    <tr>
                                        <td>User Name:</td>
                                        <td><?php echo ucwords($m_username); ?></td>
                                    </tr>
                                    <tr>

                                        <td>Registration date:</td>
                                        <td><?php echo $registered_at; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Your Full Name:</td>
                                        <td><input type=text id="edit_full_name" name=fullname value='<?php echo ucwords($full_name); ?>' class="form-control" size=30>
                                    </tr>
                                    <tr>
                                        <td>Your Phone Number:</td>
                                        <td><input type=text id="edit_phone" name=phone value='<?php echo ucwords($phone); ?>' class="form-control" size=30>
                                    </tr>

                                    <tr>
                                        <td>New Password:</td>
                                        <td><input type=password id="editPassword" name=password value="" class="form-control" size=30>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Retype Password:</td>
                                        <td><input type=password id="editRePassword" name=password2 value="" class="form-control" size=30>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Your Bitcoin Wallet Address:</td>
                                        <td><input type=text id="edit_bitcoin_address" class="form-control" size=30 name="" value="<?php echo $bitcoin_wallet_address; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Your Ethereum Wallet Address:</td>
                                        <td><input type=text id="edit_ethereum_wallet" class="form-control" size=30 name="" value="<?php echo $ethereum_wallet_address; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Your E-mail address:</td>
                                        <td><input type=text id="edit_email" name=email value='<?php echo $email; ?>' class="form-control" size=30></td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type=submit id="edit_account_button" value="Change Account data" class="btn btn-primary btn-sm waves-effect"></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <div class="e_message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#edit_account_form").submit(function(event) {
                event.preventDefault();
                //
                var u_id = <?php echo '"'.$_SESSION['id'].'"'; ?> ;
                var old_password = <?php echo '"'.$password.'"'; ?> ;
                var main_email = <?php echo '"'.$email.'"'; ?> ;
                var fullname = $("#edit_full_name").val();
                var phone = $("#edit_phone").val();
                var password = $("#editPassword").val();
                var password2 = $("#editRePassword").val();
                var bitcoin_wallet = $("#edit_bitcoin_address").val();
                var ethereum_wallet = $("#edit_ethereum_wallet").val();
                var email = $("#edit_email").val();
                var edit_account_button = "";

                               console.log("U_id: " + u_id + " fullname: " + fullname + " phone: " + phone + " password: " + password + " password2: " + password2 + " bitcoin_wallet: " + bitcoin_wallet + " email: " + email + " edit_account_button: " + edit_account_button);

                //                $("#new-password--js").val('');
                $("#edit_account_button").val('...');
                $.ajax({
                    type: "POST",
                    url: "phpscripts/edit_account.php/",
                    data: {
                        u_id: u_id,
                        old_password: old_password,
                        main_email: main_email,
                        fullname: fullname,
                        phone: phone,
                        password: password,
                        password2: password2,
                        bitcoin_wallet: bitcoin_wallet,
                        ethereum_wallet: ethereum_wallet,
                        email: email,
                        edit_account_button: edit_account_button
                    },
                    success: function(response) {
                        $(".e_message").html(response);
                        //      console.log(response);
                        //      console.log("Done"); 
                        $("#edit_account_button").val('Change Account data');
                    },
                    error: function(response) {
                        console.log(response);
                        $("#edit_account_button").val('Change Account data');
                    }
                });

            });

        });
    </script>

    <script language="javascript">
        function IsNumeric(sText) {
            var ValidChars = "0123456789.";
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

        function checkform() {
            if (document.editform.fullname.value == '') {
                alert("Please type your full name!");
                document.editform.fullname.focus();
                return false;
            }


            if (document.editform.password.value != document.editform.password2.value) {
                alert("Please check your password!");
                document.editform.fullname.focus();
                return false;
            }




            if (document.editform.email.value == '') {
                alert("Please enter your e-mail address!");
                document.editform.email.focus();
                return false;
            }



            for (i in document.editform.elements) {
                f = document.editform.elements[i];
                if (f.name && f.name.match(/^pay_account/)) {
                    if (f.value == '') continue;
                    var notice = f.getAttribute('data-validate-notice');
                    var invalid = 0;
                    if (f.getAttribute('data-validate') == 'regexp') {
                        var re = new RegExp(f.getAttribute('data-validate-regexp'));
                        if (!f.value.match(re)) {
                            invalid = 1;
                        }
                    } else if (f.getAttribute('data-validate') == 'email') {
                        var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
                        if (!f.value.match(re)) {
                            invalid = 1;
                        }
                    }
                    if (invalid) {
                        alert('Invalid account format. Expected ' + notice);
                        f.focus();
                        return false;
                    }
                }
            }

            return true;
        }
    </script>