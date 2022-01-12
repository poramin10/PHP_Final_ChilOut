<?php 
session_start();
if(isset($_POST['dataLabel'])){
    $_SESSION['label-categories'] = $_POST['dataLabel'];
}

?>