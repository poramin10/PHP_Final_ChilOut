<?php
include_once('../database/connectDB.php');
$sql = "SELECT * FROM `user` WHERE `email` LIKE '".$_GET['email']."' AND `status` LIKE '1'   ORDER BY `id_user` DESC";
$resule = $conn->query($sql);

echo "<br>";
if($resule->num_rows >= 1){
    echo "Email นี้ผ่านการยืนยันตัวตนแล้ว";
}else{
    $sql = "SELECT * FROM `user` WHERE `email` LIKE '".$_GET['email']."'  ORDER BY `id_user` DESC";
    $resule = $conn->query($sql);
    $row = $resule->fetch_assoc();
    echo "Email ของคุณคือ ".$row['email']." กรุณายืนยันตัวตน";
}
