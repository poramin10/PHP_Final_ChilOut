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

        <div class="row">

            <div class="col-md-12">
                <div class="float-md-right text-center display-2 mt-5 text-color-pink">
                    ยินดีต้อนรับ
                </div>
            </div>

            <div class="col-md-12">
                <div class="float-right">
                    <hr width="450px" class="hr-13">
                </div>
            </div>

        </div>

        <!-- หัวข้อ Card -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3 class="text-color-pink"><strong>12 อันดับสถานที่ท่องเที่ยวยอดนิยม</strong> </h3>
                <hr>
            </div>
        </div>



        <!-- เนื้อหาสถานที่ท่องเที่ยว -->
        <div class="row" id="dataPopular">

        </div>

        <div id="notify" class="row justify-content-center align-item-center vh-100">
            <div class="col-md-12 text-center py-5">
                <img src="https://steamuserimages-a.akamaihd.net/ugc/499143799328359714/EE0470B9BD25872DC95E7973B2C2F7006B7B9FB8/" width="200px" height="100px" alt="">
                <div class="mt-2">
                    <h3>
                        <strong>กำลังโหลด...</strong>
                    </h3>
                </div>
            </div>
        </div>



    </div>

    <!-- Footer -->

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Script Popular -->
    <?php include_once('./include_axiosPopular.php') ?>

    <!-- Animation Text Move -->
    <script>
        var textWrapper = document.querySelector('.text-welcome');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({})
            .add({
                targets: '.text-welcome .letter',
                scale: [4, 1],
                opacity: [0, 1],
                translateZ: 0,
                easing: "easeOutExpo",
                duration: 950,
                delay: (el, i) => 70 * i
            }).add({
                targets: '.text-welcome',
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
    </script>


</body>

</html>