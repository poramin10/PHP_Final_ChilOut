<?php
include_once('../database/connectDB.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST['email'];

$sql = "SELECT * FROM `user` WHERE `email` LIKE '" . $email . "' AND `status` LIKE '1'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $number = random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9);
    $_SESSION['numberOTP'] = $number;

    $timestamp = strtotime(date('H:i:s')) + 60;
    $_SESSION['timeOTP'] = date('H:i:s', $timestamp);

    // echo '<script>sessionStorage.setItem("timeOTP", 30);</script>';


    $name = "System";
    $emailName = "system@gmail.com";
    $subject = "มีการสมัครสมาชิกใหม่เว็บ Travel In Thailand";
    $body = "<h2><strong>รหัสยืนยันตัวตนคือ " . $number . "</h2></strong> <strong style='color: red'>หากไม่ใช่การกระทำของท่านกรุณาเมินการตอบกลับ Email นี้</strong>";

    require_once "../assets/lib/PHPMailer/PHPMailer.php";
    require_once "../assets/lib/PHPMailer/SMTP.php";
    require_once "../assets/lib/PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    // $mail->SMTPDebug = 1;
    $mail->Mailer = "smtp";
    $mail->CharSet = "utf-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    // $mail->SMTPAutoTLS = false;
    $mail->Username = "travelinthailand90@gmail.com"; //enter you email address
    $mail->Password = 'rootroot'; //enter you email password
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($emailName, $name);
    $mail->addAddress($email); //enter you email address
    $mail->Subject = ("$emailName ($subject)");
    $mail->Body = $body;

    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
        $result = $conn->query($sql) or die($conn->error);
        $_SESSION['Warning'] = "กรุณายืนยันตัวตน!";
        header('location: ./Page_VerifyOTP.php?email=' . $email . ' ');
    } else {
        $status = "failed";
        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
} else {
    $_SESSION['Failed'] = "ไม่พบ Email นี้ในระบบ";
    header('location: ./Page_SendEmail.php');
}
