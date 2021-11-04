<?php
  include_once('../authen_backend.php');

if (isset($_POST['deleteData'])) {
    $sql = "DELETE FROM `user` WHERE `user`.`status` = 0";
    $result = $conn->query($sql);

    if ($result) {
        header('Location: ./index.php');
    }
}
