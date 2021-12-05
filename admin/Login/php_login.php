<?php

include_once('../include/connectDB.php');
session_start();

if (isset($_POST['submit'])) {

    // Check Data
    // echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql_check = "SELECT * FROM `admin` WHERE `username_admin` = '" . $username . "' OR `email_admin` = '" . $username . "'";
    $result_check = $conn->query($sql_check);
    $row_check = $result_check->fetch_assoc();

    if ($result_check) {

        // Hash Password ต้องมีอย่างน้อย 60 ตัวอักษร 
        // ทำการเช็คค่าว่าง และเช็ค Password
        if (!empty($row_check && password_verify($password, $row_check['password_admin']) || $_POST['password'] === $row_check['password_admin'])) {
            $_SESSION['id_admin'] = $row_check['id_admin'];
            $_SESSION['firstname_admin'] = $row_check['firstname_admin'];
            $_SESSION['lastname_admin'] = $row_check['lastname_admin'];
            $_SESSION['phone_admin'] = $row_check['phone_admin'];
            $_SESSION['email_admin'] = $row_check['email_admin'];
            $_SESSION['profile_admin'] = $row_check['profile_admin'];
            $_SESSION['username_admin'] = $row_check['username_admin'];
            $_SESSION['create_at'] = $row_check['create_at'];
            $_SESSION['updated_at'] = $row_check['updated_at'];

            $_SESSION['Success'] = 'เข้าสู่ระบบสำเร็จ';
            header('Location: ../Dashboard');

        }else{
            $_SESSION['Failed'] = 'เข้าสู่ระบบไม่สำเร็จ';
            header('Location: ./index.php');
        }

    }

    // header("Location: ../Dashboard");
}
