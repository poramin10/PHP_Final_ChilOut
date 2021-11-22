<?php 
include_once('../authen_backend.php');
$sql = "DELETE FROM `manage_place`";
$result = $conn->query($sql);

if($result){
    $_SESSION['Success'] = 'ลบตารางสำเร็จ';
    header('Location: ./index.php');
}else{
    $_SESSION['Failed'] = 'ลบตารางไม่สำเร็จ';
    header('Location: ./index.php');
}

?>