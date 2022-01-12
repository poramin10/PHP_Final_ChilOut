<?php
require_once('../authen_frontend.php');

?>

<!doctype html>
<html lang="en">

<head>
    <title>Recom</title>
    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>

    <link rel="stylesheet" type="text/css" href="../assets/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/lib/slick/slick-theme.css">

    <style type="text/css">
        .slider {
            width: 80%;
            margin: 35px auto;
        }

        .slick-slide {
            margin: 0px 10px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }

        .slick-slide {
            transition: all ease-in-out .3s;
            /* opacity: .2; */
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <!-- Background Image -->
    <div class="bg-img">
    </div>
    

    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 5rem">
                <h1 class="text-center"><strong>ระบบแนะนำสถานที่ท่องเที่ยวในประเทศไทย</strong></h1>
                <hr>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
        <div class="col-lg-4 mt-2">
                <div class="card h-100">
                    <img class="card-img-top" src="https://media.istockphoto.com/photos/wat-arun-temple-at-sunset-in-bangkok-thailand-picture-id507913346?b=1&k=20&m=507913346&s=170667a&w=0&h=jfRJi6F10M2spa13mxKlo92RH1milbqtYi2qxgm4nmA=" width="100%" height="250" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><strong>แนะนำทั้งประเทศ <small class="text-danger font-weight-bold">(Old)</small> </strong></h5>
                        <a href="../Recommend/page1.php" class="btn btn-primary form-control mt-auto">ทำแบบสอบถามการแนะนำ</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12"></div>
            <div class="col-lg-4 mt-2">
                <div class="card h-100">
                    <img class="card-img-top" src="https://travel.mthai.com/app/uploads/2016/04/121648qh7dbccgw4ahw6we.jpg" width="100%" height="250" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><strong>แนะนำสถานที่ท่องเที่ยว ภาคใต้ <small class="text-success font-weight-bold">(New)</small> </strong></h5>
                        <a href="../RecommendSourth/page1.php" class="btn btn-primary form-control mt-auto">ทำแบบสอบถามการแนะนำ</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-2">
                <div class="card h-100">
                    <img class="card-img-top" src="https://pbs.twimg.com/profile_images/654273010753339392/lCmpTjRu_400x400.jpg" width="100%" height="250" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><strong>แนะนำสถานที่ท่องเที่ยว ภาคเหนือ <small class="text-warning font-weight-bold">(Coming Soon)</small> </strong></h5>
                        <a href="#" class="btn btn-primary form-control mt-auto">ทำแบบสอบถามการแนะนำ</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-2">
                <div class="card h-100">
                    <img class="card-img-top" src="https://pbs.twimg.com/profile_images/654273010753339392/lCmpTjRu_400x400.jpg" width="100%" height="250" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><strong>แนะนำสถานที่ท่องเที่ยว ภาคกลาง <small class="text-warning font-weight-bold">(Coming Soon)</small> </strong></h5>
                        <a href="#" class="btn btn-primary form-control mt-auto">ทำแบบสอบถามการแนะนำ</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-2">
                <div class="card h-100">
                    <img class="card-img-top" src="https://pbs.twimg.com/profile_images/654273010753339392/lCmpTjRu_400x400.jpg" width="100%" height="250" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><strong>แนะนำสถานที่ท่องเที่ยว ภาคตะวันออก <small class="text-warning font-weight-bold">(Coming Soon)</small> </strong></h5>
                        <a href="#" class="btn btn-primary form-control mt-auto">ทำแบบสอบถามการแนะนำ</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-2">
                <div class="card h-100">
                    <img class="card-img-top" src="https://pbs.twimg.com/profile_images/654273010753339392/lCmpTjRu_400x400.jpg" width="100%" height="250" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><strong>แนะนำสถานที่ท่องเที่ยว ภาคตะวันออกเฉียงเหนือ <small class="text-warning font-weight-bold">(Coming Soon)</small> </strong></h5>
                        <a href="#" class="btn btn-primary form-control mt-auto">ทำแบบสอบถามการแนะนำ</a>
                    </div>
                </div>
            </div>  

            <div class="col-lg-4 mt-2">
                <div class="card h-100">
                    <img class="card-img-top" src="https://pbs.twimg.com/profile_images/654273010753339392/lCmpTjRu_400x400.jpg" width="100%" height="250" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><strong>แนะนำสถานที่ท่องเที่ยว ภาคตะวันตก <small class="text-warning font-weight-bold">(Coming Soon)</small> </strong></h5>
                        <a href="#" class="btn btn-primary form-control mt-auto">ทำแบบสอบถามการแนะนำ</a>
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

</body>

</html>