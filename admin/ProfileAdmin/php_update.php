<?php
  include_once('../authen_backend.php');
  
if (isset($_POST['submit'])) {
    // echo '<pre>';
    //     print_r($_POST);
    // echo '</pre>';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $check = false;

    /**
     * เช็คว่ามีการแก้ไข Password รึเปล่า
     * 
     */

    if ($_POST['password-old'] != "") {

        // มีแก้ไขรหัสผ่าน 
        $password = $conn->real_escape_string($_POST['password-old']);

        $sql_check = "SELECT * FROM `admin` WHERE `id_admin` = '" . $_SESSION['id_admin'] . "' ";
        $result_check = $conn->query($sql_check);
        $row_check = $result_check->fetch_assoc();

        echo  $_POST['password-old'].'==='.$row_check['password_admin'];

        // ตรวจสอบรหัสผ่านเก่า 
        if (!empty($row_check && password_verify($password, $row_check['password_admin']) || $_POST['password-old'] === $row_check['password_admin'])) {

            $passwordNew = $_POST['password-new'];
            $confirm_passwordNew = $_POST['confirm_password'];

            // ตรวจสอบรหัสผ่านใหม่ 
            echo $passwordNew.'==='.$confirm_passwordNew;
            if ($passwordNew == $confirm_passwordNew) {
                $hashed_password = password_hash($_POST['password-new'], PASSWORD_DEFAULT);

                /**
                 * เช็คว่ามีการ Upload รูปภาพรึเปล่า 
                 * 
                 */

                if ($_FILES['fileUpload']['name'] != "") {

                    // Upload Image
                    $temp = explode('.', $_FILES['fileUpload']['name']);
                    $newName = round(microtime(true)) . '.' . end($temp);
                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../dist/img/profile/' . $newName);

                    $sql = "UPDATE `admin` SET 
                        `firstname_admin` = '" . $firstname . "', 
                        `lastname_admin` = '" . $lastname . "', 
                        `phone_admin` = '" . $phone . "', 
                        `email_admin` = '" . $email . "', 
                        `profile_admin` = '" . $newName . "', 
                        `password_admin` = '" . $hashed_password . "',
                        `update_at` = '" . date('d-m-Y H:i:s') . "'
                    WHERE `admin`.`id_admin` = '" . $_SESSION['id_admin'] . "';";
                    $result = $conn->query($sql);

                    if ($result) {
                        $_SESSION['firstname_admin'] = $firstname;
                        $_SESSION['lastname_admin'] = $lastname;
                        $_SESSION['phone_admin'] = $phone;
                        $_SESSION['email_admin'] = $email;
                        $_SESSION['profile_admin'] = $newName;

                        $check = true;
                    }
                } else {

                    // Not Upload Image

                    $sql = "UPDATE `admin` SET 
                          `firstname_admin` = '" . $firstname . "', 
                          `lastname_admin` = '" . $lastname . "', 
                          `phone_admin` = '" . $phone . "', 
                          `email_admin` = '" . $email . "', 
                          `password_admin` = '" . $hashed_password . "',
                          `update_at` = '" . date('d-m-Y H:i:s') . "'
                      WHERE `admin`.`id_admin` = '" . $_SESSION['id_admin'] . "';";
                    $result = $conn->query($sql);

                    if ($result) {
                        $_SESSION['firstname_admin'] = $firstname;
                        $_SESSION['lastname_admin'] = $lastname;
                        $_SESSION['phone_admin'] = $phone;
                        $_SESSION['email_admin'] = $email;

                        $check = true;
                    }
                }
            } else {
                $_SESSION['Failed'] = 'รหัสผ่านไม่ตรงกัน';
                header("Location: ./index.php");
            }
        } else {
            $_SESSION['Failed'] = 'รหัสผ่านเก่าไม่ถูกต้อง';
            header("Location: ./index.php");
        }
    } else {
        // ไม่มีการแก้ไขรหัสผ่าน

        /**
         * เช็คว่ามีการ Upload รูปภาพรึเปล่า 
         * 
         */

        if ($_FILES['fileUpload']['name'] != "") {

            // Upload Image
            $temp = explode('.', $_FILES['fileUpload']['name']);
            $newName = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../dist/img/profile/' . $newName);

            $sql = "UPDATE `admin` SET 
                `firstname_admin` = '" . $firstname . "', 
                `lastname_admin` = '" . $lastname . "', 
                `phone_admin` = '" . $phone . "', 
                `email_admin` = '" . $email . "', 
                `profile_admin` = '" . $newName . "',
                `update_at` = '" . date('d-m-Y H:i:s') . "'
            WHERE `admin`.`id_admin` = '" . $_SESSION['id_admin'] . "';";
            $result = $conn->query($sql);

            if ($result) {
                $_SESSION['firstname_admin'] = $firstname;
                $_SESSION['lastname_admin'] = $lastname;
                $_SESSION['phone_admin'] = $phone;
                $_SESSION['email_admin'] = $email;
                $_SESSION['profile_admin'] = $newName;

                $check = true;
            }
        } else {

            // Not Upload Image

            $sql = "UPDATE `admin` SET 
                  `firstname_admin` = '" . $firstname . "', 
                  `lastname_admin` = '" . $lastname . "', 
                  `phone_admin` = '" . $phone . "', 
                  `email_admin` = '" . $email . "',
                  `update_at` = '" . date('Y-m-d H:i:s') . "'
              WHERE `admin`.`id_admin` = '" . $_SESSION['id_admin'] . "';";
            $result = $conn->query($sql);

            if ($result) {
                $_SESSION['firstname_admin'] = $firstname;
                $_SESSION['lastname_admin'] = $lastname;
                $_SESSION['phone_admin'] = $phone;
                $_SESSION['email_admin'] = $email;

                $check = true;
            }
        }
    }

    if ($check == true) {
        $_SESSION['Success'] = "แก้ไขข้อมูลสำเร็จ";
        header("Location: ./index.php");
    }
}
