<?php require_once('../authen_frontend.php');

// if (!isset($_SESSION['id_user'])) {
//     header('location: ../Login/Page_FormLogin.php');
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommend</title>
    <!-- CSS -->
    <?php include_once('../include/inc_css_front.php') ?>

</head>

<body style="height: 100%">

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <?php

    if ($_SESSION['Travel_Recommend'] == 'eco') {
        $data_thai = 'แหล่งท่องเที่ยวเชิงนิเวศ';
    } else if ($_SESSION['Travel_Recommend'] == 'art science') {
        $data_thai = 'แหล่งท่องเที่ยวทางศิลปะวิทยาการ';
    } else if ($_SESSION['Travel_Recommend'] == 'history') {
        $data_thai = 'แหล่งท่องเที่ยวทางประวัติศาสตร์';
    } else if ($_SESSION['Travel_Recommend'] == 'nature') {
        $data_thai = 'แหล่งท่องเที่ยวทางธรรมชาติ';
    } else if ($_SESSION['Travel_Recommend'] == 'recreation') {
        $data_thai = 'แหล่งท่องเที่ยวเพื่อนันทนาการ';
    } else if ($_SESSION['Travel_Recommend'] == 'culture') {
        $data_thai = 'แหล่งท่องเที่ยวทางวัฒนธรรม';
    } else if ($_SESSION['Travel_Recommend'] == 'natural hot springs') {
        $data_thai = 'แหล่งท่องเที่ยวเชิงสุขภาพน้ำพุร้อนธรรมชาติ';
    } else if ($_SESSION['Travel_Recommend'] == 'beach') {
        $data_thai = 'แหล่งท่องเที่ยวประเภทชายหาด';
    } else if ($_SESSION['Travel_Recommend'] == 'waterfall') {
        $data_thai = 'แหล่งท่องเที่ยวประเภทน้ำตก';
    } else if ($_SESSION['Travel_Recommend'] == 'cave') {
        $data_thai = 'แหล่งท่องเที่ยวทางธรรมชาติประเภทถ้ำ';
    } else if ($_SESSION['Travel_Recommend'] == 'island') {
        $data_thai = 'แหล่งท่องเที่ยวทางธรรมชาติประเภท เกาะ';
    } else if ($_SESSION['Travel_Recommend'] == 'rapids') {
        $data_thai = 'แหล่งท่องเที่ยวทางธรรมชาติประเภท แก่ง';
    } else {
        $data_thai = 'เกิดข้อผิดพลาด';
    }

    ?>


    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center" style="margin-top: 100px"><strong>ข้อมูลจากการแนะนำสถานที่ท่องเที่ยว</strong></h1>
                <h1 class="text-center my-5">สถานที่ ที่ท่านอยากไป: <strong class="text-success"><?php echo $_SESSION['Travel_Recommend'] . ' : ' . $data_thai ?></strong></h1>
                <h3 class="text-center mt-2">หากไม่ถูกต้องสามารถทำการตอบแบบสอบถามใหม่ได้</h3>
                <div class="text-center">
                    <a href="./page1.php" class="btn btn-primary">กดปุ่ม เพื่อทำใหม่</a>
                </div>

                <h1><strong>สรุปผลคะแนน</strong></h1>

            </div>
            <div class="col-lg-12 bg-light p-4">
                <?php
                $num = 0;
                foreach ($_SESSION['stat_recom'] as $category_name => $category_value) {
                    if ($category_name == 'eco') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวเชิงนิเวศ';
                    } else if ($category_name == 'art science') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวทางศิลปะวิทยาการ';
                    } else if ($category_name == 'history') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวทางประวัติศาสตร์';
                    } else if ($category_name == 'nature') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวทางธรรมชาติ';
                    } else if ($category_name == 'recreation') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวเพื่อนันทนาการ';
                    } else if ($category_name == 'culture') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวทางวัฒนธรรม';
                    } else if ($category_name == 'natural_hot_springs') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวเชิงสุขภาพน้ำพุร้อนธรรมชาติ';
                    } else if ($category_name == 'beach') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวประเภทชายหาด';
                    } else if ($category_name == 'waterfall') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวประเภทน้ำตก';
                    } else if ($category_name == 'cave') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวทางธรรมชาติประเภทถ้ำ';
                    } else if ($category_name == 'island') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวทางธรรมชาติประเภท เกาะ';
                    } else if ($category_name == 'rapids') {
                        $arrDataThai[$num] = 'แหล่งท่องเที่ยวทางธรรมชาติประเภท แก่ง';
                    } else {
                        $arrDataThai[$num] = 'เกิดข้อผิดพลาด';
                    }
                ?>
                    <h6><strong><?php echo $category_name . ' ( ' . $arrDataThai[$num].' ) ' ?></strong></h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $category_value * 100 ?>% " aria-valuenow="<?php echo $category_value ?>" aria-valuemin="0" aria-valuemax="1"><?php echo $category_value ?></div>
                    </div>
                <?php
                    $num++;
                }
                ?>
            </div>

        </div>
    </div>


    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>