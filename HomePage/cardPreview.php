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


    <!-- Background Image -->
    <div class="bg-img">
    </div>

    <div class="container">
        <div class="row">
            <div class="hover01 column col-lg-4 col-md-6 col-sm-12 mb-4 mt-5">
                <div class="card mb-3 h-card h-100">
                    <figure>

                        <img class="card-img-top" height="250px" src="../assets/img/preview_card.png" alt="Card image cap">
                        <div class="img-popular2">
                            <img src="../assets/img/medal.png" width="100px" height="100px" alt="">
                        </div>

                        <div class="img-popular">
                            <h1 class="text-fixed-popular">1</h1>
                        </div>

                    </figure>
                    <div class="card-body">
                        <div class="text-center"><small>ยอดผู้เข้าชม 100</small> </div>

                        <h3 class="card-title"><strong>น้ำตกไทรโยคน้อย</strong></h3>
                        <h5 class="text-pink"><strong> จังหวัดกาญจนบุรี </strong></h5>
                        <p class="card-text">ไม่มีไร</p>

                        <hr>
                        <label for=""><b>กิจกรรม</b></label><br>
                        หนุกๆ


                    </div>
                    <div class="card-footer d-flext flex-column">
                        <div class="mt-auto">
                            <a href="../Travel/Detail.php">
                                <button type="button" class="button btn btn-danger btn-lg btn-block mt-4">
                                    <span> ดูสถานที่ท่องเที่ยว</span>
                                </button>
                            </a>
                        </div>
                    </div>

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

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')
    </script>


</body>

</html>