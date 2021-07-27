<?php
require_once('../authen_frontend.php');

// DB ของจังหวัดในประเทศไทย
$sql = "SELECT * FROM `provinces` ORDER BY `name_th` ASC ";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <title>HomePage</title>
    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>
</head>

<body>

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <!-- Carousel -->
    <?php include_once('./include_carousel.php') ?>

    <!-- Background Image -->
    <div class="bg-img">
    </div>

    <div class="container">

    <!-- หัวข้อ -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3><strong>12 อันดับสถานที่ท่องเที่ยวที่นิยม</strong> </h3>
                <hr>
            </div>
        </div>

    <!-- เนื้อหาสถานที่ท่องเที่ยว -->
        <div class="row" id="dataPopular">

        </div>

    </div>

    <!-- Footer -->

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Script Popular -->
    <?php include_once('./include_axiosPopular.php') ?>

</body>

</html>