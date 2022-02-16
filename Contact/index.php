<?php
require_once('../authen_frontend.php');

?>

<!doctype html>
<html lang="en">

<head>
    <title>Contact</title>
    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>
</head>

<body>



    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="jumbotron bg-contact">
                    <h1 class="display-4 text-center">ข้อมูลติดต่อ</h1>
                    <div class="bg-white mt-1 mb-1" style="padding: 1px;"></div>
                    <div class="text-center mt-3">
                        <img src="../assets/img/logo-rmutt.png" alt="" width="150px">
                    </div>
                    <div class="text-center">
                        <h5 class="mt-3">สาขาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</h5>
                        <h6><strong>นักศึกษาประจำโปรเจค</strong></h6>
                        <p>
                            นายปรมินทร์ เหลืองอมรศักดิ์ 116110905012-9 <br>
                            นายฐิติวัฒน์ ปราเปรม 116110905044-2
                        </p>
                        <h6><strong>อาจารย์ประจำโปรเจค</strong></h6>
                        <p>
                            อาจารย์ประภาส ทองรัก (ที่ปรึกษาหลัก) <br>
                            อาจารย์ปิยนันท์ เทียบศรไชย (ที่ปรึกษาร่วม)
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="../assets/lib/slick/slick.js" type="text/javascript" charset="utf-8"></script>



</body>

</html>