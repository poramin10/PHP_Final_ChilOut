<?php
session_start();
require_once('../database/connectDB.php');

if (isset($_POST['submit'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);


    // Recaptcha
    $secretKey = '6LfcC7scAAAAADQhbeN06701ef8ydrriJsQh1Puh';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$remoteip";
    $resp = json_decode(file_get_contents($url));
    // Recaptcha ตรวจสอบ
    if ($resp->success) {

        // นำข้อมูลเข้าสู่ Database
        $sql_check = "SELECT * FROM `user` WHERE `username` = '" . $username . "' OR `email` = '" . $username . "'  AND `status` = '1' ";
        $result_check = $conn->query($sql_check);
        $row_check = $result_check->fetch_assoc();

        if ($result_check) {

            // Hash Password ต้องมีอย่างน้อย 60 ตัวอักษร 
            // ทำการเช็คค่าว่าง และเช็ค Password
            if (!empty($row_check && password_verify($password, $row_check['password']))) {

                $_SESSION['id_user'] = $row_check['id_user'];
                $_SESSION['firstname'] = $row_check['firstname'];
                $_SESSION['lastname'] = $row_check['lastname'];
                $_SESSION['gender'] = $row_check['gender'];
                $_SESSION['email'] = $row_check['email'];
                $_SESSION['birthdate'] = $row_check['birthdate'];
                $_SESSION['phone'] = $row_check['phone'];
                $_SESSION['profile'] = $row_check['profile'];
                $_SESSION['username'] = $row_check['username'];
                $_SESSION['status'] = $row_check['status'];


                // RECOM สำหรับสถานที่ท่องเที่ยวทั้งหมด
                $sql_select = "SELECT * FROM `recommed` WHERE id_user = '" . $_SESSION['id_user'] . "' ;";
                $result_select = $conn->query($sql_select);
                if ($result_select->num_rows == 1) {
                    $row_select = $result_select->fetch_assoc();
                    $_SESSION['Travel_Recommend'] = $row_select['label-categories'];
                    $_SESSION['stat_recom']['eco'] = $row_select['score_eco'];
                    $_SESSION['stat_recom']['art science'] = $row_select['score_art_science'];
                    $_SESSION['stat_recom']['history'] = $row_select['score_history'];
                    $_SESSION['stat_recom']['nature'] = $row_select['score_nature'];
                    $_SESSION['stat_recom']['recreation'] = $row_select['score_recreation'];
                    $_SESSION['stat_recom']['culture'] = $row_select['score_culture'];
                    $_SESSION['stat_recom']['natural_hot_springs'] = $row_select['score_natural_hot_springs'];
                    $_SESSION['stat_recom']['beach'] = $row_select['score_beach'];
                    $_SESSION['stat_recom']['waterfall'] = $row_select['score_waterfall'];
                    $_SESSION['stat_recom']['cave'] = $row_select['score_cave'];
                    $_SESSION['stat_recom']['island'] = $row_select['score_island'];
                    $_SESSION['stat_recom']['rapids'] = $row_select['score_rapids'];
                }

                // RECOM สำหรับสถานที่ท่องเที่ยวในจังหวัดภาคใต้
                $sql_select_south = "SELECT * FROM `recommed_south` WHERE id_user = '" . $_SESSION['id_user'] . "' ;";
                $result_select_south = $conn->query($sql_select_south);
                if ($result_select_south->num_rows == 1) {
                    $row_select_south = $result_select_south->fetch_assoc();
                    $_SESSION['label-categories'] = $row_select_south['label-categories'];
                    // Stat
                    $_SESSION['stat_recom_south']['temple'] = $row_select_south['score_temple'];
                    $_SESSION['stat_recom_south']['museum'] = $row_select_south['score_museum'];
                    $_SESSION['stat_recom_south']['national_park'] = $row_select_south['score_national_park'];
                    $_SESSION['stat_recom_south']['landmarks'] = $row_select_south['score_landmarks'];
                    $_SESSION['stat_recom_south']['waterfall'] = $row_select_south['score_waterfall'];
                    $_SESSION['stat_recom_south']['historical'] = $row_select_south['score_historical'];
                    $_SESSION['stat_recom_south']['beach'] = $row_select_south['score_beach'];
                    $_SESSION['stat_recom_south']['islands'] = $row_select_south['score_islands'];
                    $_SESSION['stat_recom_south']['cave'] = $row_select_south['score_cave'];
                    $_SESSION['stat_recom_south']['zoo'] = $row_select_south['score_zoo'];
                    $_SESSION['stat_recom_south']['dive_site'] = $row_select_south['score_dive_site'];
                }



                // echo $result_select->num_rows;

                $_SESSION['Success'] = "เข้าสู่ระบบสำเร็จ";
                // print_r($row_check);
                header('location: ../HomePage/index.php');
            } else {
                $_SESSION['Failed'] = "เข้าสู่ระบบไม่สำเร็จ";
                header('location: ./Page_FormLogin.php');
            }
        } else {
            $_SESSION['Failed'] = "เข้าสู่ระบบไม่สำเร็จ";
            header('location: ./Page_FormLogin.php');
        }
    } else {
        $_SESSION['Failed'] = "Verify Recaptchar Failed!";
        header('location: ./Page_FormLogin.php');
    }

    // echo '<pre>',print_r($_POST),'</pre>';



}
