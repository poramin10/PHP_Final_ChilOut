<?php
include_once('../authen_backend.php');

if (isset($_GET['id'])) {
    $sql = "DELETE FROM `category` WHERE `category`.`id_cat` = '" . $_GET['id'] . "' ";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['Success'] = 'ลบประเภทสถานที่ท่องเที่ยวสำเร็จ';
        header('Location: ./index.php');
    } else {
        $_SESSION['Failed'] = 'ลบประเภทสถานที่ท่องเที่ยวไม่สำเร็จ';
        header('Location: ./index.php');
    }
}else{
    header('Location: ./index.php');
}
