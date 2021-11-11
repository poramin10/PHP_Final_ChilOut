<?php
session_start();
include_once('../database/connectDB.php');

if(isset($_POST['submit'])){
    if($_SESSION['numberOTP']==$_POST['otp']){
        $sql = "UPDATE `user` SET `status` = '1' WHERE `user`.`id_user` = '".$_SESSION['id_user']."';";
        $result = $conn->query($sql) or die($conn->error);

        $sql_delete = "DELETE FROM `user` WHERE `email` = '".$_SESSION['email_user']."' AND status <> 1 ";
        $result_delete = $conn->query($sql_delete);

        $_SESSION['id_user'] = NULL;
        $_SESSION['email_user'] = NULL;
        $_SESSION['email_Verify_Regis'] = NULL;
        $_SESSION['Success'] = "สมัครสมาชิกสำเร็จ";


        header('location: ../Login/Page_FormLogin.php');
    }else{
        $sql_error = "SELECT *  FROM `user` WHERE `id_user` = '".$_SESSION['id_user']."' ";
        $result_error = $conn->query($sql_error) or die($conn->error);
        $row_error = $result_error->fetch_assoc();
        echo $row_error['email'];
        $_SESSION['id_user'] = NULL;
        $_SESSION['Failed'] = "รหัส OTP ไม่ถูกต้อง";
        header("location: ./Page_VerifyOTP.php");
    }
}

?>