<?php

include_once('../authen_backend.php');




if (isset($_POST['submitUpdate'])) {

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $status_upload = $_POST['status_cat'] == 'true' ? '1' : '0';


    if ($status_upload == '1') {
        $status_cat = 'open';
    } else if ($status_upload == '0') {
        $status_cat = 'close';
    }


    $sql = "UPDATE `category` SET 
        `name_cat` = '" . $_POST['name_cat'] . "' , 
        `status_cat` = '" . $status_cat . "'  
    WHERE `category`.`id_cat` = '" . $_POST['id_cat'] . "';";
    $result = $conn->query($sql) or die($conn->error);

    if ($result) {
        $_SESSION['Success'] = 'แก้ไขประเภทสถานที่ท่องเที่ยวสำเร็จ';
        header('Location: ./index.php');
    } else {
        $_SESSION['Failed'] = 'แก้ไขประเภทสถานที่ท่องเที่ยวไม่สำเร็จ';
        header('Location: ./index.php');
    }
}
