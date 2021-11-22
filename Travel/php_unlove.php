<?php

include_once('../authen_frontend.php');

$id_user = $_GET['id_user'];
$id_place = $_GET['id_place'];

if ($_SESSION['id_user'] != $id_user) {
    header('location: ./Detail.php?idTravel=' . $id_place);
} else {

    // echo $id_user;
    // echo '<br>';
    // echo $id_place;

    $sql_check = "SELECT * FROM `favor` WHERE id_user = '" . $id_user . "' AND id_place = '" . $id_place . "' ";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {

        $sql =  "DELETE FROM `favor` WHERE id_place = '" . $id_place . "' AND id_user = '" . $id_user . "'";
        $result = $conn->query($sql) or die($conn->error);

        if ($result) {
            header('location: ./Detail.php?idTravel=' . $id_place);
        }
    } else {
        header('location: ./Detail.php?idTravel=' . $id_place);
    }
}
