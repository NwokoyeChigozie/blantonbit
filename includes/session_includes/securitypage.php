<?php
include('phpscripts/connection.php');
$id = $_SESSION['id'];
$auto_detect_ip = "";
$auto_detect_browser = "";

$sql = "SELECT * FROM `security` WHERE `u_id` = '$id'";
$result = mysqli_query($link, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $auto_detect_ip = $row['auto_detect_ip'];
            $auto_detect_browser = $row['auto_detect_browser'];
        }
        //close the result set
        mysqli_free_result($result);
    }
}
echo $auto_detect_ip;
echo $auto_detect_browser;

?>
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Dashboard</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-sm-12 text-left">
                    <div class="card bg-primary p-30">
                        <h5 class="text-white">Advanced login security settings</h5>

                        <div class="card-body">


                            <form method="post" id="security_form">
                                <input type=hidden id="idu" value="<?php echo $_SESSION['id']; ?>">
                                <input type=hidden name=action value="save"> Detect IP Address Change Sensitivity<br>
                                <input type=radio name="ip" value="disabled" <?php if (empty($auto_detect_ip) || $auto_detect_ip=="" || $auto_detect_ip=="disabled" ) { echo "checked"; } ?>>Disabled<br>
                                <input type=radio name="ip" value="medium" <?php if ($auto_detect_ip=="medium" ) { echo "checked"; } ?>>Medium<br>
                                <input type=radio name="ip" value="high" <?php if ($auto_detect_ip=="high" ) { echo "checked"; } ?>>High<br>
                                <input type=radio name="ip" value="always" <?php if ($auto_detect_ip=="always" ) { echo "checked"; } ?>>Paranoic<br><br> Detect Browser Change<br>
                                <input type=radio name="browser" value="disabled" <?php if (empty($auto_detect_browser) || $auto_detect_browser=="" || $auto_detect_browser=="disabled" ) { echo "checked"; } ?>>Disabled<br>
                                <input type=radio name="browser" value="enabled" <?php if ($auto_detect_browser=="enabled" ) { echo "checked"; } ?>>Enabled<br><br>
                                <input type=submit id="sec_b" value="Set" class="btn btn-primary btn-sm waves-effect">
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sec_message"></div>
        <script>
            $(document).ready(function() {
                $("#security_form").submit(function(event) {
                    event.preventDefault();


                    var ip_setting = $('input[name="ip"]:checked').val();
                    var browser_setting = $('input[name="browser"]:checked').val();
                    var security_update = "";
                    var u_id = $("#idu").val();
                    // console.log(u_id);
                    // console.log("ip_setting: " + ip_setting + " browser_setting: " + browser_setting);


                    $("#sec_b").html('<b>....</b>');
                    $.ajax({
                        type: "POST",
                        url: "phpscripts/security.php/",
                        data: {
                            ip_setting: ip_setting,
                            browser_setting: browser_setting,
                            security_update: security_update,
                            u_id: u_id
                        },
                        success: function(response) {
                            $(".sec_message").html(response);
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });

                });

            });
        </script>