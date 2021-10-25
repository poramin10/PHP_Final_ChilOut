<?php
include_once('../authen_frontend.php');

if (isset($_POST['submit'])) {

    $password = $conn->real_escape_string($_POST['password']);

    $sql_check = "SELECT * FROM `user` WHERE `id_user` = '" . $_SESSION['id_user'] . "' AND status <> 0 ";
    $result_check = $conn->query($sql_check);
    $row_check = $result_check->fetch_assoc();

    if ($result_check) { 
        if (!empty($row_check && password_verify($password, $row_check['password']))) {
            $passwordNew = $_POST['passwordNew'];
            $confirm_passwordNew = $_POST['confirm_passwordNew'];

            if ($passwordNew == $confirm_passwordNew) {
                $hashed_password = password_hash($_POST['passwordNew'], PASSWORD_DEFAULT);

                $sql_update = "UPDATE `user` SET `password` = '" . $hashed_password . "' WHERE `user`.`id_user` = '" . $_SESSION['id_user'] . "' ";
                $result_update = $conn->query($sql_update);

                if ($result_update) {
                    $_SESSION['Success'] = 'แก้ไขรหัสผ่านสำเร็จ';
                    header('location: ./Page_Account.php');
                }
            } else {
                $_SESSION['Failed'] = 'รหัสผ่านไม่ตรงกัน';
                header('location: ./Page_Account.php');
            }
        } else {
            $_SESSION['Failed'] = 'รหัสผ่านไม่ถูกต้อง';
            header('location: ./Page_Account.php');
        }
    }
}
