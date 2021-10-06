<?php
session_start();
include_once('../database/connectDB.php');


if(isset($_POST['submit'])){
    $email = $_POST['email'];

    $password = $_POST['password'];
    $verifypassword = $_POST['verify_password'];

    $_SESSION['CheckVerify'] = false;

    if($password === $verifypassword){
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $sql = "UPDATE `user` SET `password` = '$hashed_password' WHERE `user`.`email` LIKE '$email' ";
        $result = $conn->query($sql);
        
        if($result){
            $_SESSION['Success'] = 'แก้ไขรหัสผ่านสำเร็จ';
            header('location: ../Login/Page_FormLogin.php');
        }else{
            $_SESSION['Failed'] = 'แก้ไขรหัสผ่านไม่สำเร็จ';
            header('location: ./Page_Verify_Repassword.php?email='.$email);
        }
        
    }else{
        $_SESSION['Failed'] = 'รหัสผ่านไม่ตรงกัน';
        header('location: ./Page_Verify_Repassword.php?email='.$email);
    }
   
}
