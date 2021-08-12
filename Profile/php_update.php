<?php
include_once('../authen_frontend.php');

if (isset($_POST['submit'])) {

    $id_user = $_POST['id_user'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $profession = $_POST['profession'];
    $salary = $_POST['salary'];

    // มีการ Upload รูปภาพ | ไม่มีการ Upload รูปภาพ
    if ($_FILES['fileUpload']['name'] != "") {

        $temp = explode('.', $_FILES['fileUpload']['name']);
        $newName = round(microtime(true)) . '.' . end($temp);

        echo $newName;

        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../assets/img/profile/' . $newName)) {
            $sql = "UPDATE `user` SET 
                `firstname` = '" . $firstname . "', 
                `lastname` = '" . $lastname . "', 
                `gender` = '" . $gender . "', 
                `phone` = '" . $phone . "', 
                `birthdate` = '" . $birthdate . "', 
                `profile` = '".$newName."', 
                `profession` = '" . $profession . "', 
                `salary` = '" . $salary . "' 
            WHERE `user`.`id_user` = '" . $id_user . "' ";

            $_SESSION['profile'] = $newName;
            $result = $conn->query($sql);
        }
    } else {

        $sql = "UPDATE `user` SET 
        `firstname` = '" . $firstname . "', 
        `lastname` = '" . $lastname . "', 
        `gender` = '" . $gender . "', 
        `phone` = '" . $phone . "', 
        `birthdate` = '" . $birthdate . "', 
        `profession` = '" . $profession . "', 
        `salary` = '" . $salary . "' 
    WHERE `user`.`id_user` = '" . $id_user . "' ";

        $result = $conn->query($sql);
    }

    if ($result) {

        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['gender'] = $gender;
        $_SESSION['birthdate'] = $birthdate;
        $_SESSION['phone'] = $phone;
        $_SESSION['profession'] = $profession;
        $_SESSION['salary'] = $salary;

       

        $_SESSION['Success'] = "แก้ไขข้อมูลสำเร็จ";
        header('location: ./Page_Profile.php');
    }
}
