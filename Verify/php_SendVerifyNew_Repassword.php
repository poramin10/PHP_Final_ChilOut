<?php
session_start();
include_once('../database/connectDB.php');

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $number = random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9);
    $_SESSION['numberOTP'] = $number;

    $name = "System";
    $emailName = "system@gmail.com";
    $subject = "มีการสมัครสมาชิกใหม่เว็บ Travel In Thailand";
    $body = "กรุณาเข้าไปยืนยันตัวตนเพื่อยืนยันการสมัครสมาชิกได้ที่ลิงค์ http://localhost:9000/Verify/Page_VerifyOTP_Repassword.php?email=" . $email .
    "<h2><strong>รหัสยืนยันตัวตนคือ " . $number . "</h2></strong>
                <strong style='color: red'>หากไม่ใช่การกระทำของท่านกรุณาเมินการตอบกลับ Email นี้</strong>";

    require_once "../assets/lib/PHPMailer/PHPMailer.php";
    require_once "../assets/lib/PHPMailer/SMTP.php";
    require_once "../assets/lib/PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //SMTP Settings
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
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
        header('location: ./Page_VerifyOTP_Repassword.php?email=' . $email . ' ');
    } else {
        $status = "failed";
        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        header('location: ./index.php');
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
}
