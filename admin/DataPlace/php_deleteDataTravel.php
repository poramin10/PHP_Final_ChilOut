<?php 
include_once('../authen_backend.php');

$place_id = $_GET['id'];

$sql = "DELETE FROM `place` WHERE `place`.`place_id` = '".$place_id."' ";
$result = $conn->query($sql);
if($result){
    $_SESSION['Success'] = 'ลบข้อมูลสำเร็จ';
    header('Location: ./index.php');
}else{
    $_SESSION['Failed'] = 'ลบข้อมูลไม่สำเร็จ';
    header('Location: ./index.php');
}
?>