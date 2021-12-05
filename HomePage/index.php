<?php
require_once('../authen_frontend.php');


// แสดงข้อมูลสถานที่ท่องเที่ยวที่เด่นๆ
$sql = "SELECT * FROM `countertravel` 
    JOIN place ON countertravel.id_place = place.id_place 
ORDER BY countertravel.count_travel DESC LIMIT 12";
$result = $conn->query($sql);
$number = 0;

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

    <div class="container-fulid">
        <!-- Banner -->
        <section class="banner">

            <div class="banner-fixed">

                <img src="../assets/img/BANNER.png" width="100%" height="100%" alt="">

                <!-- <div class="cloud-fixed">
                <img class="cloud" src="../assets/img/cloud.png" alt="">
            </div>

            <div class="build-fixed">
                <img class="build" src="../assets/img/build.png" alt="">
            </div>

            <div class="road-fixed">
                <img class="road" src="../assets/img/road.png" alt="">
            </div> -->

                <div class="train-fixed">
                    <img class="train" src="../assets/img/train.png" alt="">
                </div>

                <div class="plane-fixed">
                    <img class="plane" src="../assets/img/plane.png" alt="">
                </div>

                <div class="human-fixed">
                    <img class="human" src="../assets/img/human.png" alt="">
                </div>

                <div class="text-banner">
                    <div style="display:flex;">
                        <img src="../assets/img/LOGOv2.png" width="150px" alt="">
                        <h1 class="text-red"><strong>ดรีมเวล</strong></h1>
                    </div>
                    <h3 class="text-blue">ระบบแนะนำสถานที่ท่องเที่ยวที่เหมาะ สำหรับคุณ</h3>
                </div>

            </div>

        </section>
    </div>

    <!-- Background Image -->
    <div class="bg-img">
    </div>

    <div class="container">
        <!-- หัวข้อ Card -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3 class="text-color-pink"><strong>12 อันดับสถานที่ท่องเที่ยวยอดนิยม</strong> </h3>
                <hr>
            </div>
        </div>
    </div>

    <!-- เนื้อหาสถานที่ท่องเที่ยว -->
    <div class="container">
        <div class="row row-card">

            <?php while ($row = $result->fetch_assoc()) { ?>

                <?php
                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                $result_avg = $conn->query($sql_avg);
                $row_avg = $result_avg->fetch_assoc();
                ?>

                <!-- หาสถานที่ท่องเที่ยวยอดนิยม -->
                <?php
                $number++;
                ?>

                <div class="col-md-4 mt-3 mb-3">
                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                        <section class="card-v2">
                            <div class="crop-zoom">
                                <div class="card card-relative cardTop">
                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
                                        <div class="card-color">
                                        </div>
                                    </div>
                                    <div class="card-text">
                                        <h5><?php echo $row['place_name'] ?></h5>
                                        <p><?php echo $row['province'] ?></p>
                                    </div>

                                    <div class="card-text-view">
                                        <small><i class="fas fa-eye"> </i> <?php echo $result->num_rows != 0 ? $row['count_travel'] : 0 ?> </small>
                                    </div>

                                    <div class="card-star">
                                        <div class="rating-comment-avg-card mt-2">
                                            <input <?php echo floor($row_avg['AVG(ratestar)']) == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                            <label for="rating-comment-5"></label>
                                            <input <?php echo floor($row_avg['AVG(ratestar)']) == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                            <label for="rating-comment-4"></label>
                                            <input <?php echo floor($row_avg['AVG(ratestar)']) == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                            <label for="rating-comment-3"></label>
                                            <input <?php echo floor($row_avg['AVG(ratestar)']) == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                            <label for="rating-comment-2"></label>
                                            <input <?php echo floor($row_avg['AVG(ratestar)']) == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                            <label for="rating-comment-1"></label>
                                        </div>
                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
                                    </div>

                                  

                                </div>
                            </div>
                        </section>
                    </a>

                </div>

            <?php } ?>
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