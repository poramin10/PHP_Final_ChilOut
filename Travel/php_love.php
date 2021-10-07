<?php

include_once('../authen_frontend.php');

$id_user = $_GET['id_user'];
$id_place = $_GET['id_place'];

// echo $id_user;
// echo '<br>';
// echo $id_place;

if ($_SESSION['id_user'] != $id_user) {
    header('location: ./Detail.php?idTravel=' . $id_place);
} else {
    $sql_check = "SELECT * FROM `love` WHERE id_user = '" . $id_user . "' AND id_place = '" . $id_place . "' ";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        header('location: ./Detail.php?idTravel=' . $id_place);
    } else {
        $sql =  "INSERT INTO `love` 
        (`id_love`, 
        `id_user`, 
        `id_place`, 
        `created_love`) 
    VALUES (NULL, 
        '" . $id_user . "', 
        '" . $id_place . "', 
        '" . date("Y-m-d H:i:s") . "');";

        $result = $conn->query($sql) or die($conn->error);

        if ($result) {
            header('location: ./Detail.php?idTravel=' . $id_place);
        }
    }
}
