<?php
session_start();
require_once('../database/connectDB.php');

if (isset($_POST['submit'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql_check = "SELECT * FROM `user` WHERE `username` = '" . $username . "' OR `email` = '" . $username . "'  AND `status` = '1' ";
    $result_check = $conn->query($sql_check);
    $row_check = $result_check->fetch_assoc();

    if ($result_check) {

        // Hash Password ต้องมีอย่างน้อย 60 ตัวอักษร 
        // ทำการเช็คค่าว่าง และเช็ค Password
        if (!empty($row_check && password_verify($password, $row_check['password']))) {

            $_SESSION['id_user'] = $row_check['id_user']; 
            $_SESSION['firstname'] = $row_check['firstname'];
            $_SESSION['lastname'] = $row_check['lastname'];
            $_SESSION['gender'] = $row_check['gender'];
            $_SESSION['email'] = $row_check['email'];
            $_SESSION['birthdate'] = $row_check['birthdate'];
            $_SESSION['phone'] = $row_check['phone'];
            $_SESSION['profile'] = $row_check['profile'];
            $_SESSION['username'] = $row_check['username'];
            $_SESSION['status'] = $row_check['status'];
            $_SESSION['profession'] = $row_check['profession'];
            $_SESSION['salary'] = $row_check['salary'];

            $_SESSION['Success'] = "เข้าสู่ระบบสำเร็จ";
            // print_r($row_check);
            header('location: ../HomePage/index.php');
        } else {
            $_SESSION['Failed'] = "เข้าสู่ระบบไม่สำเร็จ";
            header('location: ./Page_FormLogin.php');
        }
       
    } else {
        $_SESSION['Failed'] = "เข้าสู่ระบบไม่สำเร็จ";
    }
}
