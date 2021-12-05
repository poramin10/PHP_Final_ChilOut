<?php
if (isset($_GET['idTravel'])) {
    require_once('../authen_frontend.php');
    $sql = "SELECT * FROM `place` WHERE id_place = '" . $_GET['idTravel'] . "' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (!isset($_SESSION['time_count' . $row['id_place']])) {

    $_SESSION['time_count' . $row['id_place']] = 'นับจำนวน';

    $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
    $result_count = $conn->query($sql_count);
    if ($result_count->num_rows == 0) {

        $sql_insert = "INSERT INTO `countertravel` (`id_counter`, `id_travel`, `count_travel`) 
        VALUES (NULL, '" . $row['id_place'] . "', '1');";
        $result_insert = $conn->query($sql_insert);
    } else {
        $row_count = $result_count->fetch_assoc();
        $count = $row_count['count_travel'];
        $total = $count + 1;

        $sql_update_count = "UPDATE `countertravel` SET `count_travel` = '" . $total . "' WHERE `countertravel`.`id_travel` = '" . $row['id_place'] . "';";
        $result_update_count = $conn->query($sql_update_count);
    }
} else {
    // ไม่มีอะไรเกิดขึ้น
}

/**
 * SQL สถานที่ท่องเที่ยวแนะนำ
 */
$sql_multi_carousel = "SELECT * FROM `place` 
WHERE `province` = '" . $row['province'] . "' AND `id_place` <> '".$row['id_place']."' LIMIT 20";
$result_multi_carousel = $conn->query($sql_multi_carousel);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->
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

    <section class="detail-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 100px;">
                    <h1 class="font-weight-bold"><?php echo $row['place_name'] ?></h1>
                </div>
                <div class="col-lg-6">
                    <h3 class="center-text-sm"><?php echo $row['province'] ?></h3>
                </div>
                <div class="col-lg-6 mb-2">
                    <div class="d-lg-flex align-items-end flex-column bd-highlight">
                        <h5 class="text-blue bd-highlight font-weight-bold center-text-sm">ข้อมูลสถานที่ท่องเที่ยว</h5>

                        <?php
                        if (isset($_SESSION['id_user'])) {
                            $sql_travel = "SELECT * FROM `favor` WHERE id_user = '" . $_SESSION['id_user'] . "' AND id_place = '" . $row['id_place'] . "' ";
                            $result_travel = $conn->query($sql_travel);
                        ?>
                            <?php if ($result_travel->num_rows == 0) { ?>
                                <a class="bd-highlight btn-love" href="./php_love.php?id_user=<?php echo $_SESSION['id_user'] ?>&id_place=<?php echo $row['id_place']  ?>">
                                    <img src="../assets/img/love.png" alt="" width="25px"> ชื่นชอบ
                                </a>
                            <?php } else { ?>
                                <a class="bd-highlight btn-love" href="./php_unlove.php?id_user=<?php echo $_SESSION['id_user'] ?>&id_place=<?php echo $row['id_place']  ?>">
                                    <img src="../assets/img/unlove.png" alt="" width="25px"> ชอบแล้ว
                                </a>
                            <?php } ?>

                        <?php } ?>

                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="<?php echo $row['picture'] ?>" alt="" width="100%">
                </div>

                <!-- Tabs -->
                <div class="col-lg-6">
                    <section class="detailTravelContact">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="nav nav-pills flex-column flex-sm-row tab" id="pills-tab" role="tablist">
                                    <a role="presentation" class="flex-sm-fill text-sm-center nav-link active" id="pills-data1-tab" data-toggle="pill" href="#pills-data1" role="tab" aria-controls="pills-data1" aria-selected="true"><strong>ข้อมูลทั่วไป</strong> </a>
                                    <a role="presentation" class="flex-sm-fill text-sm-center nav-link" id="pills-data2-tab" data-toggle="pill" href="#pills-data2" role="tab" aria-controls="pills-data2" aria-selected="false"><strong>ข้อมูลติดต่อ</strong> </a>
                                </div>

                                <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-data1" role="tabpanel" aria-labelledby="pills-data1-tab">
                                        <div class="p-3">

                                            <!-- สถานที่ตั้ง -->
                                            <div style="display:flex">
                                                <img src="../assets/img/mark.svg" alt="" width="25.93px" height="34.14px">
                                                <h3 class="font-weight-bold ml-2">สถานที่ตั้ง</h3>
                                            </div>

                                            <div style="margin-left: 2.5rem!important;">
                                                <?php
                                                echo $row['address'] . ' ' .
                                                    '<b>ตำบล </b>' . $row['sub_district'] . ' ' .
                                                    '<b>อำเภอ </b>' . $row['district'] . ' ' .
                                                    '<b>จังหวัด </b>' . $row['province'] . ' ' .
                                                    '<b>รหัสไปรษณีย์ </b>' . $row['postcode']
                                                ?> <br>
                                                <?php
                                                echo str_replace('"', "", $row['Introduction']);
                                                ?>
                                            </div>

                                            <!-- กิจกรรม -->
                                            <div style="display:flex" class="mt-3">
                                                <img src="../assets/img/travel.svg" alt="" width="25.93px" height="34.14px">
                                                <h3 class="font-weight-bold ml-2">กิจกรรม</h3>
                                            </div>

                                            <div style="margin-left: 2.5rem!important;">
                                                <?php
                                                $arrActivity = explode(',', $row['activitie']);

                                                for ($i = 0; $i < count($arrActivity); $i++) {
                                                ?>
                                                    <span class="badge badge-blue"><?php echo $arrActivity[$i] != 'null' ? $arrActivity[$i] : 'ไม่พบข้อมูล' ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>

                                            <!-- เหมาะสำหรับ -->
                                            <div style="display:flex" class="mt-3">
                                                <img src="../assets/img/parent.svg" alt="" width="25.93px" height="34.14px">
                                                <h3 class="font-weight-bold ml-2">เหมาะสำหรับ</h3>
                                            </div>

                                            <div style="margin-left: 2.5rem!important;">
                                                <?php
                                                $arrTarget = explode(',', $row['target']);

                                                for ($i = 0; $i < count($arrTarget); $i++) {
                                                ?>
                                                    <span class="badge badge-blue"><?php echo $arrTarget[$i] != 'null' ? $arrTarget[$i] : 'ไม่พบข้อมูล' ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>

                                            <!-- ประเภท -->
                                            <div style="display:flex" class="mt-3">
                                                <img src="../assets/img/category.svg" alt="" width="25.93px" height="34.14px">
                                                <h3 class="font-weight-bold ml-2">ประเภท</h3>
                                            </div>

                                            <div style="margin-left: 2.5rem!important;">
                                                <?php
                                                $arrCategory = explode(',', $row['category']);

                                                for ($i = 0; $i < count($arrCategory); $i++) {
                                                ?>
                                                    <span class="badge badge-blue"><?php echo $arrCategory[$i] != 'null' ? $arrCategory[$i] : 'ไม่พบข้อมูล' ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>




                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="pills-data2" role="tabpanel" aria-labelledby="pills-data2-tab">
                                        <div class="p-3" style="text-align: center">
                                            <img src="../assets/img/contact.svg" alt="">
                                        </div>

                                        <div class="row p-3">
                                            <div class="col-6 mt-2">
                                                <strong>เบอร์โทรศัพท์: </strong>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <?php echo $row['phones'] != 'null' ? $row['phones'] : 'ไม่พบข้อมูล' ?>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <strong>เบอร์มือถือ: </strong>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <?php echo $row['mobiles'] != 'null' ? $row['mobiles'] : 'ไม่พบข้อมูล' ?>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <strong>FAX: </strong>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <?php echo $row['fax'] != 'null' ? $row['fax'] : 'ไม่พบข้อมูล' ?>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <strong>อีเมล์: </strong>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div style="word-wrap: break-word;"><?php echo $row['emails'] != 'null' ? $row['emails'] : 'ไม่พบข้อมูล' ?></div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <strong>เว็บไซต์: </strong>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <?php if ($row['urls'] == 'null') { ?>
                                                    ไม่พบข้อมูล
                                                <?php } else { ?>
                                                    <?php
                                                    $url = str_replace("https://", "", $row['urls']);
                                                    $urlReplace = str_replace("http://", "", $url)
                                                    ?>
                                                    <a style="word-wrap: break-word;" href="<?php echo 'http://' . $urlReplace;  ?>" target="_blank"> <?php echo $row['urls'] ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-lg-12 mt-3">
                    <div style="display:flex;align-items: center;">
                        <img src="../assets/img/planeicon.svg" alt="">
                        <h3 class="ml-3 text-greeninfo"><strong>ข้อมูลสถานที่ท่องเที่ยว</strong></h3>
                    </div>
                    <p class="mt-3">
                        <?php echo str_replace('"', "", $row['detail']); ?>
                    </p>
                </div>

                <?php
                $arrTimes = explode(',', $row['times']);
                ?>

                <div class="col-lg-12 mt-4">
                    <div class="row w-100">
                        <div class="col-lg-6">
                            <div class="img-icon-detail">
                                <img src="../assets/img/Calender.svg" width="50px" height="50px" alt="">
                                <h3 class="mt-3 text-greeninfo"><strong>เวลาทำการ</strong></h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-sm table-bordered text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="bg-blue text-white" scope="col">วัน</th>
                                        <th class="bg-blue text-white" scope="col">เวลา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">จันทร์</th>
                                        <td><?php echo str_replace('จันทร์ - ', "", isset($arrTimes[0]) ? $arrTimes[0] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">อังคาร</th>
                                        <td><?php echo str_replace('อังคาร - ', "", isset($arrTimes[1]) ? $arrTimes[1] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">พุธ</th>
                                        <td><?php echo str_replace('พุธ - ', "", isset($arrTimes[2]) != '' ? $arrTimes[2] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">พฤหัส</th>
                                        <td><?php echo str_replace('พฤหัสบดี - ', "", isset($arrTimes[3]) != '' ? $arrTimes[3] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">ศุกร์</th>
                                        <td><?php echo str_replace('ศุกร์ - ', "", isset($arrTimes[4]) != '' ? $arrTimes[4] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">เสาร์</th>
                                        <td><?php echo str_replace('เสาร์ - ', "", isset($arrTimes[5]) != '' ? $arrTimes[5] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">อาทิตย์</th>
                                        <td><?php echo str_replace('อาทิตย์ - ', "", isset($arrTimes[6]) != '' ? $arrTimes[6] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=600&amp;hl=th&amp;q=<?php echo $row['place_name'] ?>&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.fnfgo.com/">FNF Online Mods</a></div>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        width: 100%;
                                        height: 350px;
                                    }

                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        width: 100%;
                                        height: 350px;
                                    }

                                    .gmap_iframe {
                                        height: 350px !important;
                                    }
                                </style>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-3">
                            <div class="img-icon-detail2">
                                <img src="../assets/img/trainicon.svg" width="50px" height="50px" alt="">
                                <h3 class="mt-3 text-greeninfo"><strong>การเดินทาง</strong></h3>
                            </div>
                            <h4>
                                <?php echo $row['how_to_travel'] = '' ? $row['how_to_travel'] : '<div class="text-center">ไม่พบข้อมูล</div>'  ?>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="multicarousel-data">

        <div class="row">
            <div class="col-lg-12">
                <section class="regular slider">
                    <?php while ($row_multi = $result_multi_carousel->fetch_assoc()) {

                        $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row_multi['id_place'] . "';";
                        $result_avg = $conn->query($sql_avg);
                        $row_avg = $result_avg->fetch_assoc();

                        $sql_count = "SELECT * FROM `countertravel` WHERE id_place = '".$row_multi['id_place']."' ";
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

    </section>

    <section class="comment-data">
        <div class="container">
            <form action="php_comment.php" method="POST">
                <div class="row">
                    <div class="col-lg-12">

                        <h3 class="mt-5"><strong>รีวิวสถานที่ท่องเที่ยว</strong></h3>

                        <?php if (isset($_SESSION['id_user'])) { ?>

                            <?php
                            $sql_check_comment = "SELECT * FROM `comment_rating` WHERE id_user = '" . $_SESSION['id_user'] . "' AND id_place = '" . $_GET['idTravel'] . "' ";
                            $result_check_comment = $conn->query($sql_check_comment);
                            $row_check_comment = $result_check_comment->fetch_assoc();
                            ?>

                            <?php if ($result_check_comment->num_rows == 0) { ?>

                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                                <input type="hidden" name="id_place" value="<?php echo $_GET['idTravel'] ?>">

                                <textarea name="comment" class="form-control mt-3" id="" cols="30" rows="5" placeholder="รีวิวสถานที่ท่องเที่ยว"></textarea>

                                <!-- Emoji -->
                                <div class="container">
                                    <div>
                                        <div class="rating">
                                            <input type="radio" value="5" name="rating" id="rating-5" required>
                                            <label for="rating-5"></label>
                                            <input type="radio" value="4" name="rating" id="rating-4" required>
                                            <label for="rating-4"></label>
                                            <input type="radio" value="3" name="rating" id="rating-3" required>
                                            <label for="rating-3"></label>
                                            <input type="radio" value="2" name="rating" id="rating-2" required>
                                            <label for="rating-2"></label>
                                            <input type="radio" value="1" name="rating" id="rating-1" required>
                                            <label for="rating-1"></label>
                                            <div class="emoji-wrapper">
                                                <div class="emoji">
                                                    <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534" />
                                                        <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff" />
                                                        <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347" />
                                                        <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63" />
                                                        <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff" />
                                                        <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347" />
                                                        <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63" />
                                                        <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347" />
                                                    </svg>
                                                    <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                                        <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347" />
                                                        <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534" />
                                                        <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff" />
                                                        <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347" />
                                                        <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff" />
                                                        <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534" />
                                                        <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff" />
                                                        <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347" />
                                                        <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff" />
                                                    </svg>
                                                    <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                                        <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347" />
                                                        <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff" />
                                                        <circle cx="340" cy="260.4" r="36.2" fill="#3e4347" />
                                                        <g fill="#fff">
                                                            <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10" />
                                                            <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z" />
                                                        </g>
                                                        <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347" />
                                                        <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff" />
                                                    </svg>
                                                    <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347" />
                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                                        <g fill="#fff">
                                                            <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z" />
                                                            <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81" />
                                                        </g>
                                                        <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                                                        <g fill="#fff">
                                                            <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1" />
                                                            <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81" />
                                                        </g>
                                                        <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                                                        <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff" />
                                                    </svg>
                                                    <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                                        <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b" />
                                                        <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f" />
                                                        <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff" />
                                                        <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b" />
                                                        <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f" />
                                                        <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff" />
                                                        <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347" />
                                                        <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b" />
                                                    </svg>
                                                    <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <g fill="#ffd93b">
                                                            <circle cx="256" cy="256" r="256" />
                                                            <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z" />
                                                        </g>
                                                        <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4" />
                                                        <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea" />
                                                        <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88" />
                                                        <g fill="#38c0dc">
                                                            <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z" />
                                                        </g>
                                                        <g fill="#d23f77">
                                                            <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z" />
                                                        </g>
                                                        <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347" />
                                                        <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b" />
                                                        <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="sutmit" name="submit" class="btn btn-primary btn-block mt-3">รีวิวสถานทึ่ท่องเที่ยว</button>

                            <?php } else { ?>

                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                                <input type="hidden" name="id_place" value="<?php echo $_GET['idTravel'] ?>">

                                <textarea name="comment" class="form-control mt-3" id="" cols="30" rows="5" placeholder="รีวิวสถานที่ท่องเที่ยว"><?php echo $row_check_comment['comment_rating'] ?></textarea>

                                <!-- Emoji -->
                                <div class="container">
                                    <div>
                                        <div class="rating">
                                            <input type="radio" <?php echo $row_check_comment['ratestar'] == 5 ? 'checked' : '' ?> value="5" name="rating" id="rating-5" required>
                                            <label for="rating-5"></label>
                                            <input type="radio" <?php echo $row_check_comment['ratestar'] == 4 ? 'checked' : '' ?> value="4" name="rating" id="rating-4" required>
                                            <label for="rating-4"></label>
                                            <input type="radio" <?php echo $row_check_comment['ratestar'] == 3 ? 'checked' : '' ?> value="3" name="rating" id="rating-3" required>
                                            <label for="rating-3"></label>
                                            <input type="radio" <?php echo $row_check_comment['ratestar'] == 2 ? 'checked' : '' ?> value="2" name="rating" id="rating-2" required>
                                            <label for="rating-2"></label>
                                            <input type="radio" <?php echo $row_check_comment['ratestar'] == 1 ? 'checked' : '' ?> value="1" name="rating" id="rating-1" required>
                                            <label for="rating-1"></label>
                                            <div class="emoji-wrapper">
                                                <div class="emoji">
                                                    <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534" />
                                                        <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff" />
                                                        <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347" />
                                                        <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63" />
                                                        <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff" />
                                                        <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347" />
                                                        <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63" />
                                                        <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347" />
                                                    </svg>
                                                    <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                                        <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347" />
                                                        <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534" />
                                                        <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff" />
                                                        <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347" />
                                                        <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff" />
                                                        <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534" />
                                                        <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff" />
                                                        <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347" />
                                                        <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff" />
                                                    </svg>
                                                    <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                                        <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347" />
                                                        <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff" />
                                                        <circle cx="340" cy="260.4" r="36.2" fill="#3e4347" />
                                                        <g fill="#fff">
                                                            <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10" />
                                                            <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z" />
                                                        </g>
                                                        <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347" />
                                                        <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff" />
                                                    </svg>
                                                    <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347" />
                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                                        <g fill="#fff">
                                                            <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z" />
                                                            <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81" />
                                                        </g>
                                                        <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                                                        <g fill="#fff">
                                                            <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1" />
                                                            <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81" />
                                                        </g>
                                                        <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347" />
                                                        <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff" />
                                                    </svg>
                                                    <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <circle cx="256" cy="256" r="256" fill="#ffd93b" />
                                                        <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534" />
                                                        <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b" />
                                                        <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f" />
                                                        <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff" />
                                                        <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b" />
                                                        <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f" />
                                                        <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff" />
                                                        <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347" />
                                                        <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b" />
                                                    </svg>
                                                    <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <g fill="#ffd93b">
                                                            <circle cx="256" cy="256" r="256" />
                                                            <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z" />
                                                        </g>
                                                        <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4" />
                                                        <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea" />
                                                        <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88" />
                                                        <g fill="#38c0dc">
                                                            <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z" />
                                                        </g>
                                                        <g fill="#d23f77">
                                                            <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z" />
                                                        </g>
                                                        <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347" />
                                                        <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b" />
                                                        <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="sutmit" name="submitUpdate" class="btn btn-primary btn-block mt-3">แก้ไขรีวิว</button>


                            <?php } ?>

                        <?php } else { ?>
                            <h4 class="text-center"><strong>เข้าสู่ระบบเพื่อรีวิวสถานที่ท่องเที่ยว</strong></h4>
                        <?php } ?>
                        <hr>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <?php
                    $sql = "SELECT * FROM `comment_rating` WHERE id_place = '" . $_GET['idTravel'] . "' ORDER BY id_rating DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows == 0) {
                    ?>
                        <div class="mt-4">
                            <h5 class="text-center"><strong>ยังไม่มีการรีวิว</strong></h5>
                        </div>


                    <?php } else { ?>

                        <?php
                        $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $_GET['idTravel'] . "';";
                        $result_avg = $conn->query($sql_avg);
                        $row_avg = $result_avg->fetch_assoc();
                        ?>

                        <h1 class="text-center">
                            <strong>คะแนนสถานที่</strong>
                        </h1>

                        <div class="rating-comment-avg mt-2">
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


                        <h1 class="text-center">
                            <strong> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
                        </h1>

                        <?php while ($row = $result->fetch_assoc()) { ?>

                            <?php

                            $sql_user = "SELECT * FROM `user` WHERE id_user = '" . $row['id_user'] . "' ";
                            $result_user = $conn->query($sql_user);

                            if ($result_user->num_rows != 0) {
                                $row_user = $result_user->fetch_assoc();
                                $firstname = $row_user['firstname'];
                                $lastname = $row_user['lastname'];
                                $profile = $row_user['profile'];
                                $register_by = $row_user['register_by'];
                            }

                            ?>

                            <div class="card mt-3">
                                <div class="card-body">

                                    <h5 class="card-title">
                                        <?php if ($register_by == 'facebook') { ?>
                                            <img class="img-comment" src="<?php echo $profile ?>" width="50px" height="50px" alt="">
                                            <?php echo $firstname . " " . $lastname ?>
                                        <?php } else { ?>
                                            <img class="img-comment" src="../assets/img/profile/<?php echo $profile ?>" width="50px" height="50px" alt="">
                                            <?php echo $firstname . " " . $lastname ?>
                                        <?php } ?>
                                    </h5>

                                    <p class="card-text"><strong></strong><?php echo $row['comment_rating'] ?></p>
                                    <div class="rating-comment">
                                        <input <?php echo $row['ratestar'] == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                        <label for="rating-comment-5"></label>
                                        <input <?php echo $row['ratestar'] == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                        <label for="rating-comment-4"></label>
                                        <input <?php echo $row['ratestar'] == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                        <label for="rating-comment-3"></label>
                                        <input <?php echo $row['ratestar'] == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                        <label for="rating-comment-2"></label>
                                        <input <?php echo $row['ratestar'] == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                        <label for="rating-comment-1"></label>
                                    </div>
                                    <div class="float-right">
                                        <small>รีวิวเมื่อวันที่: <?php echo date_format(new DateTime($row['update_at']), 'd/m/Y H:i:s');  ?></small>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>

                    <?php } ?>



                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Share -->
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5eb7889c7d4ec20012dc03fe&product=inline-share-buttons' async='async'></script>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="../assets/lib/slick/slick.js" type="text/javascript" charset="utf-8"></script>

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

</body>

</html>