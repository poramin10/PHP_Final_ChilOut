<?php
require_once('../authen_frontend.php');

if (isset($_GET['popular'])) {
    $popularSelect = $_GET['popular'];
} else {
    $popularSelect = 'สถานที่ท่องเที่ยวที่มีผู้เข้าชมมากที่สุด';
}

/**
 * ถ้ามี Error อย่าลืมเปลี่ยน General CI เป็น Unicode CI ด้วย
 * 
 */
if ($popularSelect == 'สถานที่ท่องเที่ยวที่มีผู้เข้าชมมากที่สุด') {
    // แสดงข้อมูลสถานที่ท่องเที่ยวที่เด่นๆ ตามยอดวิว
    $sql = "SELECT * FROM `countertravel` 
       JOIN place ON countertravel.id_place = place.id_place 
   ORDER BY countertravel.count_travel DESC LIMIT 12";
    $result = $conn->query($sql);
    $number = 0;
} else {
    // แสดงข้อมูลสถานที่ท่องเที่ยวที่เด่นๆ ตามคะแนน
    $sql = "SELECT comment_rating.id_place ,  place.place_name , place.province , place.picture , AVG(comment_rating.ratestar) as avg FROM `place` 
        JOIN comment_rating ON place.id_place = comment_rating.id_place
        JOIN countertravel ON place.id_place = countertravel.id_place
    GROUP BY comment_rating.id_place ,  place.place_name , place.province , place.picture
    ORDER BY AVG(comment_rating.ratestar) DESC LIMIT 12";
    $result = $conn->query($sql);
    $number = 0;
}



/**
 * SQL สถานที่ท่องเที่ยวแนะนำ
 */
$sql_select = "SELECT * FROM `popular` ";
$result_select = $conn->query($sql_select);

if ($result_select->num_rows != 0) {
    $sql_multi_carousel = "SELECT * FROM `place` WHERE ";
    while ($row_select = $result_select->fetch_assoc()) {
        $sql_multi_carousel .= "id_place = '" . $row_select['id_place'] . "'||";
    }
    $sql_multi_carousel = substr($sql_multi_carousel, 0, -2);
    $result_multi_carousel = $conn->query($sql_multi_carousel);
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>HomePage</title>
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

                        <!-- <img src="../assets/img/LOGO-Banner.png" width="250px" alt=""> -->

                        <h1 class="text-red"><strong>Chill Out</strong></h1>
                    </div>
                    <h3 class="text-blue">Take time your chill out, Take out your strees</h3>
                    <h4 class="text-blue">ระบบแนะนำสถานที่ท่องเที่ยวที่เหมาะสำหรับคุณ</h4>
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
            <div class="col-md-8 mt-4">
                <h3 class="text-blue"><strong>12 อันดับ <?php echo $popularSelect ?></strong></h3>

            </div>
            <div class="col-md-4 mt-4">
                <select onchange="SelectPlace(this.value)" class="form-control float-right">
                    <option <?php echo $popularSelect == 'สถานที่ท่องเที่ยวที่มีผู้เข้าชมมากที่สุด' ? 'selected' : '' ?> value="สถานที่ท่องเที่ยวที่มีผู้เข้าชมมากที่สุด">สถานที่ท่องเที่ยวที่มีผู้เข้าชมมากที่สุด</option>
                    <option <?php echo $popularSelect == 'สถานที่ท่องเที่ยวที่มีคะแนนมากที่สุด' ? 'selected' : '' ?> value="สถานที่ท่องเที่ยวที่มีคะแนนมากที่สุด">สถานที่ท่องเที่ยวที่มีคะแนนมากที่สุด</option>
                </select>
            </div>
            <div class="col-md-12">
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
                                <div class="card card-relative cardTop" style="border-radius: 8% ;">
                                    <div class="img-card" style="border-radius: 8% ; background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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

    <?php if ($result_select->num_rows != 0) { ?>
        <section class="multicarousel-data">
            <div class="container-fulid" style="overflow: hidden;">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="regular slider">
                            <?php while ($row_multi = $result_multi_carousel->fetch_assoc()) {

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row_multi['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_place = '" . $row_multi['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();
                            ?>

                                <a href="../Travel/Detail.php?idTravel=<?php echo $row_multi['id_place'] ?>">
                                    <section class="card-v2">
                                        <div class="crop-zoom">
                                            <div class="card card-relative cardTop">
                                                <div class="img-card" style=" background-image: url('<?php echo $row_multi['picture'] ?>'); width: 100%">
                                                    <div class="card-color">
                                                    </div>
                                                </div>
                                                <div class="card-text">
                                                    <h5><?php echo $row_multi['place_name'] ?></h5>
                                                    <p><?php echo $row_multi['province']  ?></p>
                                                </div>

                                                <div class="card-text-view">
                                                    <small><i class="fas fa-eye"> </i> <?php echo $row_count['count_travel'] ?? 0 ?> </small>
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
                            <?php } ?>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>


    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="../assets/lib/slick/slick.js" type="text/javascript" charset="utf-8"></script>


    <!-- Multicare -->
    <script type="text/javascript">
        $(document).on('ready', function() {
            $(".regular").slick({
                dots: true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            arrows: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        })
    </script>

    <script>
        function SelectPlace(dataSelect) {
            location.replace("index.php?popular=" + dataSelect);
        }
    </script>


</body>

</html>