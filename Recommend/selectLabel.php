<?php 
session_start();
if(isset($_POST['dataLabel'])){
    $_SESSION['Travel_Recommend'] = $_POST['dataLabel'];
}

?>