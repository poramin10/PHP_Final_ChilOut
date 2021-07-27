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
<style>

</style>

<body>
    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <!-- Carousel -->
    <?php include_once('./include_carousel.php') ?>

    <div class="bg-img">

    </div>

    <!-- <div class="container">
            <div class="row">
                <div class="col-md-12 text-light mt-5">
                    <h1 class="text-pink shadow-text"><strong>ยินดีต้อนรับสู่เว็บแนะนำสถานที่ท่องเที่ยวภายในประเทศไทย</strong> </h1>
                    <hr>
                   <h1>สวัสดีปี</h1>
                    <h1>
                        <div class="counter" data-target="2564">0</div>
                    </h1> 
                </div>
            </div>
        </div> -->


    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3><strong>12 อันดับสถานที่ท่องเที่ยวที่นิยม</strong> </h3>
                <hr>
            </div>

            <div class="row" id="dataPopular">

            </div>

            <!-- <div class="hover01 column col-md-4 col-sm-6">
                <div class=" card mb-3 h-card" style="height: auto">
                    <figure>
                        <img class="card-img-top" height="250px" src="https://travel.mthai.com/app/uploads/2019/03/phuket-cover.jpg" alt="Card image cap">
                        <div class="img-popular">
                            <h1 class="text-fixed-popular">1</h1>
                        </div>
                        <div class="view-popular">
                            <strong>ยอดผู้เข้าชม: 10000</strong> 
                        </div>
                    </figure>
                    <div class="card-body">

                        <h3 class="card-title"><strong>ทะเล</strong></h3>
                        <h5 class="text-pink"><strong> จังหวัดชลบุรี</strong></h5>
                        <p class="card-text">ทะเลไง</p>
                        <hr>
                        <label for=""><b>กิจกรรม</b></label><br>

                        เที่ยวๆ

                        <a type="button" href="../Travel/Detail.php?id=${res.data.result.place_id}" class="btn btn-primary btn-lg btn-block mt-4">ดูสถานที่ท่องเที่ยว</a>
                    </div>
                </div>
            </div> -->


        </div>
    </div>



    <!-- Footer -->


    <!-- Link -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Script Popular -->
    <?php include_once('./include_axiosPopular.php') ?>

    

</body>

</html>