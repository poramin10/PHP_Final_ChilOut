<?php
include_once('../authen_backend.php');

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if (isset($_POST['submit'])) {

    if ($_POST['status_cat'] == 'on') {
        $status_cat = 'open';
    } else {
        $status_cat = 'close';
    }

    $sql = "INSERT INTO `category` (
        `id_cat`, 
        `name_cat`, 
        `status_cat`, 
        `created_at`, 
        `updated_at`
        ) VALUES (NULL, 
        '" . $_POST['name_cat'] . "', 
        '" . $status_cat . "', 
        '" . date('Y-m-d H:i:s') . "', 
        '" . date('Y-m-d H:i:s') . "');";

    $result = $conn->query($sql) or die($conn->error);

    if ($result) {
        $_SESSION['Success'] = 'เพิ่มประเภทสถานที่ท่องเที่ยวสำเร็จ';
        header('Location: ./index.php');
    } else {
        $_SESSION['Failed'] = 'เพิ่มประเภทสถานที่ท่องเที่ยวไม่สำเร็จ';
        header('Location: ./index.php');
    }
}
