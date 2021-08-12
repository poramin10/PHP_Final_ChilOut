<?php

// กำหนด Sessionn และ Connect DB
session_start();
include_once('../database/connectDB.php');
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['submit'])) {

    // Upload Image
    $temp = explode('.', $_FILES['fileUpload']['name']);
    $newName = round(microtime(true)) . '.' . end($temp);
    // if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../assets/img/profile/'.$newName)) {
    if ($_POST['password'] === $_POST['confirm-password']) {

        $username = $_POST['username'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $profession = $_POST['profession'];
        $salary = $_POST['salary'];

        //if Check ว่ามี Username นี้เปล่า 
        $sql_checkUsername = "SELECT * FROM `user` WHERE `username` = '" . $_POST['username'] . "' and `status` = 1 ";
        $resule_checkUsername = $conn->query($sql_checkUsername);
        if ($resule_checkUsername->num_rows == 0) {

            // if Check ว่ามี Email นี้เปล่า
            $sql_checkEmail = "SELECT * FROM `user` WHERE `email` = '" . $_POST['email'] . "' and `status` = 1  ";
            $resule_checkEmail = $conn->query($sql_checkEmail);
            if ($resule_checkEmail->num_rows == 0) {

                // กรณีไม่ Upload ภาพ
                if(!isset($_POST['fileUpload'])){
                    $sql = "INSERT INTO `user` (
                        `id_user`, 
                        `firstname`, 
                        `lastname`, 
                        `gender`, 
                        `email`, 
                        `phone`,
                        `birthdate`, 
                        `profile`, 
                        `username`, 
                        `password`, 
                        `status`, 
                        `profession`, 
                        `salary`,
                        `create_at`, 
                        `update_at`) 
                     VALUES (NULL, 
                     '" . $firstname . "', 
                     '" . $lastname . "', 
                     '" . $gender . "', 
                     '" . $email . "', 
                     '" . $phone . "', 
                     '" . $birthdate . "', 
                     'preview.png', 
                     '" . $username . "', 
                     '".$hashed_password. "', 
                     '0', 
                     '" . $profession . "', 
                     '" . $salary . "',
                     '" . date("Y-m-d H:i:s") . "',
                     '" . date("Y-m-d H:i:s") . "'
                     );";

                    // Send Email

                    // $name = $_POST['name'];
                    // $email = $_POST['email'];
                    // $subject = $_POST['subject'];
                    // $body = $_POST['body'];

                    $number = random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9);
                    $_SESSION['numberOTP'] = $number;

                    $name = "System";
                    $emailName = "system@gmail.com";
                    $subject = "มีการสมัครสมาชิกใหม่เว็บ Travel In Thailand";
                    $body = "กรุณาเข้าไปยืนยันตัวตนเพื่อยืนยันการสมัครสมาชิกได้ที่ลิงค์ http://localhost:9000/Verify/Page_VerifyOTP.php?email=" . $email . 
                    "<h2><strong>รหัสยืนยันตัวตนคือ " . $number."</h2></strong>
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
                        $result = $conn->query($sql) or die($conn->error);
                        $_SESSION['Warning'] = "กรุณากรอกรหัส OTP";
                        header('location: ../Verify/Page_VerifyOTP.php?email=' . $email . ' ');
                    } else {
                        $status = "failed";
                        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
                        // $_SESSION['RegisterError'] = "อีเมลล์ไม่ถูกต้อง";
                        // header('location: ./php_insertRegister.php');
                    }
                    exit(json_encode(array("status" => $status, "response" => $response)));

                    if ($result) {
                        $_SESSION['Warning'] = "กรุณากรอกรหัส OTP";
                        header('location: ./php_insertRegister.php');
                    }          
            
                // กรณี Upload ภาพ
                }else if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../assets/img/profile/' . $newName)) {

                    $sql = "INSERT INTO `user` (
                        `id_user`, 
                        `firstname`, 
                        `lastname`, 
                        `gender`, 
                        `email`, 
                        `phone`,
                        `birthdate`, 
                        `profile`, 
                        `username`, 
                        `password`, 
                        `status`, 
                        `profession`, 
                        `salary`,
                        `create_at`, 
                        `update_at`) 
                         
                     VALUES (NULL, 
                     '" . $firstname . "', 
                     '" . $lastname . "', 
                     '" . $gender . "', 
                     '" . $email . "', 
                     '" . $phone . "', 
                     '" . $birthdate . "', 
                     '" . $newName . "', 
                     '" . $username . "', 
                     '" . $hashed_password . "', 
                     '0', 
                     '" . $profession . "', 
                     '" . $salary . "',
                     '" . date("Y-m-d H:i:s") . "',
                     '" . date("Y-m-d H:i:s") . "'
                     );";


                    // Send Email

                    // $name = $_POST['name'];
                    // $email = $_POST['email'];
                    // $subject = $_POST['subject'];
                    // $body = $_POST['body'];

                    $number = random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9) . random_int(1, 9);
                    $_SESSION['numberOTP'] = $number;

                    $name = "System";
                    $emailName = "system@gmail.com";
                    $subject = "มีการสมัครสมาชิกใหม่เว็บ Travel In Thailand";
                    $body = "กรุณาเข้าไปยืนยันตัวตนเพื่อยืนยันการสมัครสมาชิกได้ที่ลิงค์ http://localhost:9000/Verify/Page_VerifyOTP.php?email=" . $email . 
                    "<h2><strong>รหัสยืนยันตัวตนคือ " . $number."</h2></strong>
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
                        $result = $conn->query($sql) or die($conn->error);
                        $_SESSION['Warning'] = "กรุณากรอกรหัส OTP";
                        header('location: ../Verify/Page_VerifyOTP.php?email=' . $email . ' ');
                    } else {
                        $status = "failed";
                        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
                        // $_SESSION['RegisterError'] = "อีเมลล์ไม่ถูกต้อง";
                        // header('location: ./Page_FormRegister.php');
                    }
                    exit(json_encode(array("status" => $status, "response" => $response)));

                    if ($result) {
                        $_SESSION['Warning'] = "กรุณากรอกรหัส OTP";
                        header('location: ./Page_FormRegister.php');
                    }
                }
            } else {
                $_SESSION['RegisterError'] = "Email นี้มีผู้ใช้งานแล้ว";
                header('location: ./Page_FormRegister.php');
            }
        } else {
            $_SESSION['RegisterError'] = "User นี้มีผู้ใช้งานแล้ว";
            header('location: ./Page_FormRegister.php');
        }
    } else {
        $_SESSION['RegisterError'] = "รหัสผ่านไม่ตรงกัน";
        header('location: ./Page_FormRegister.php');
    }
    // } else {
    //     หากมี Error เกิดขึ้น อย่าลืมเช็ค App ที่มีความปลอดภัยน้อยที่สุดของ Email
    // }
}
