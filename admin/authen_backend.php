<?php
    require_once('../../database/connectDB.php');
    session_start();

    if(!$_SESSION['id_admin']){
        header("Location: ../Login/");
    }

?>