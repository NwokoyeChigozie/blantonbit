
<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($data->send_kwek_email)) {
    $email = test_input($data->email);
    $product_name = test_input($data->product_name);
    $api_key = test_input($data->api_key);
    $from_email = test_input($data->from_email);
    $subject = test_input($data->subject);
    $message_event = $data->event;

    $main_api_key = "kwekmailapiphpmailsystem";

    if ($api_key != $main_api_key) {
        $message = array(
            "status" => false,
            "message" => "Access Denied"
        );

        echo json_encode($message);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = array(
            "status" => false,
            "message" => "Invalid Email Address"
        );

        echo json_encode($message);
        exit;
    }

    if ($message_event == "firstCorReset") {
        $title = $data->title;
        $small_text_detail = $data->small_text_detail;
        $link = $data->link;
        $button_name = $data->link_keyword;
        include('email.php');
    } else {
        $message = array(
            "status" => false,
            "message" => "Event Does not exist"
        );
        echo json_encode($message);
        exit;
    }


    $to = $email;
    $subject = $subject;
    $txt = $message_body;
    $headers = "";
    $headers .= "CC: $email\r\n"; 
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= 'From: ' . $product_name . ' <' . $from_email . '>' . "\r\n";
    $success = mail($to, $subject, $txt, $headers);
    if ($success) {
        $message = array(
            "status" => true,
            "message" => "Successfully Sent"
        );

        echo json_encode($message);
    } else {
        $message = array(
            "status" => $success,
            "message" => "Error Sending E-mail: " . error_get_last()["message"]
        );

        echo json_encode($message);
    }
} else {
    $message = array(
        "status" => false,
        "message" => "Access Denied"
    );

    echo json_encode($message);
    exit;
}
?>