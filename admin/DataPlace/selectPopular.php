<?php 
include_once('../authen_backend.php');

if(isset($_POST['dataPop'])){

    $sql_select = "SELECT * FROM `popular` WHERE id_place = '".$_POST['dataPop']."' ";
    $result_select = $conn->query($sql_select);
    if($result_select->num_rows >= 1){
        $sql = "DELETE FROM `popular` WHERE `popular`.`id_place` = '".$_POST['dataPop']."' ";
        $result = $conn->query($sql);
    }else{
        $sql = "INSERT INTO `popular` (
            `id_pop`, 
            `created_at`, 
            `id_place`) 
            VALUES (NULL, 
            '".date('Y-m-d H:i:s')."', 
            '".$_POST['dataPop']."');";
        $result = $conn->query($sql);
    }

  
}
