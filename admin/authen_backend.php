<?php
    include_once('../include/connectDB.php');
    session_start();

    if(!$_SESSION['id_admin']){
        header("Location: ../Login/");
    }

?>