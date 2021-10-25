<?php
include_once('../include/connectDB.php');

if (isset($_POST['deleteData'])) {
    $sql = "DELETE FROM `user` WHERE `user`.`status` = 0";
    $result = $conn->query($sql);

    if ($result) {
        header('Location: ./index.php');
    }
}
