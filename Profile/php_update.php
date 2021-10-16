<?php
include_once('../authen_frontend.php');

if (isset($_POST['submit'])) {

    $id_user = $_POST['id_user'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];

    // มีการ Upload รูปภาพ | ไม่มีการ Upload รูปภาพ
    if ($_FILES['fileUpload']['name'] != "") {

        $temp = explode('.', $_FILES['fileUpload']['name']);
        $newName = round(microtime(true)) . '.' . end($temp);

        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../assets/img/profile/' . $newName)) {
            $sql = "UPDATE `user` SET 
                `firstname` = '" . $firstname . "', 
                `lastname` = '" . $lastname . "', 
                `gender` = '" . $gender . "', 
                `phone` = '" . $phone . "', 
                `birthdate` = '" . $birthdate . "' 
            WHERE `user`.`id_user` = '" . $id_user . "' ";

            $_SESSION['profile'] = $newName;
            $result = $conn->query($sql) or die($conn->error);
        }
    } else {

        $sql = "UPDATE `user` SET 
        `firstname` = '" . $firstname . "', 
        `lastname` = '" . $lastname . "', 
        `gender` = '" . $gender . "', 
        `phone` = '" . $phone . "', 
        `birthdate` = '" . $birthdate . "'
    WHERE `user`.`id_user` = '" . $id_user . "' ";

        $result = $conn->query($sql);
    }

    if ($result) {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['gender'] = $gender;
        $_SESSION['birthdate'] = $birthdate;
        $_SESSION['phone'] = $phone;
        $_SESSION['Success'] = "แก้ไขข้อมูลสำเร็จ";
        header('location: ./Page_Profile.php');
    }
}

if (isset($_POST['submitFB'])) {

    $id_user = $_POST['id_user'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];

    $sql = "UPDATE `user_fb` SET 
        `firstname_fb` = '" . $firstname . "', 
        `lastname_fb` = '" . $lastname . "', 
        `gender_fb` = '" . $gender . "', 
        `phone_fb` = '" . $phone . "', 
        `birthdate_fb` = '" . $birthdate . "',
        `updated_fb` = '" . date("Y-m-d H:i:s") . "'
    WHERE `id_user_fb` = '" . $id_user . "' ";
    $result = $conn->query($sql) or die($conn->error);


    if ($result) {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['gender'] = $gender;
        $_SESSION['birthdate'] = $birthdate;
        $_SESSION['phone'] = $phone;
        $_SESSION['Success'] = "แก้ไขข้อมูลสำเร็จ";
        header('location: ./Page_Profile.php');
    }

}
