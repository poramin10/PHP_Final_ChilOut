<?php

require_once('../authen_frontend.php');
if(isset($_POST['submit'])){

    $sql = "INSERT INTO `comment_rating` (
        `id_rating`, 
        `comment_rating`, 
        `ratestar`, 
        `create_at`, 
        `update_at`, 
        `id_user`, 
        `id_place`) 
    VALUES (NULL, 
        '".$_POST['comment']."', 
        '".$_POST['rating']."', 
        '".date("Y-m-d H:i:s")."', 
        '".date("Y-m-d H:i:s")."', 
        '".$_POST['id_user']."', 
        '".$_POST['id_place']."');
        ";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['Success'] = "รีวิวสำเร็จ";
        header("Location:./Detail.php?idTravel=".$_POST['id_place']);
    }
    
}

if(isset($_POST['submitUpdate'])){
    $sql = "UPDATE `comment_rating` SET 
        `comment_rating` = '".$_POST['comment']."', 
        `ratestar` = '".$_POST['rating']."', 
        `update_at` = '".date("Y-m-d H:i:s")."' 
    WHERE `id_user` = '".$_POST['id_user']."' AND 
          `id_place` = '".$_POST['id_place']."' ";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['Success'] = "แก้ไขรีวิวสำเร็จ";
        header("Location:./Detail.php?idTravel=".$_POST['id_place']);
    }
}
