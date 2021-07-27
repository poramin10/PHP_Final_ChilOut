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
    $body = "กรุณาเข้าไปยืนยันตัวตนเพื่อยืนยันการสมัครสมาชิกที่ลิงค์ http://localhost:9000/Verify/Page_VerifyOTP.php?email=" . $email . " รหัสยืนยันตัวตนคือ " . $number;

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
        $_SESSION['Success'] = "สมัครสมาชิกสำเร็จ";
        header('location: ./Page_VerifyOTP.php?email=' . $email . ' ');
    } else {
        $status = "failed";
        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        $_SESSION['RegisterError'] = "อีเมลล์ไม่ถูกต้อง";
        header('location: ./index.php');
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
}

