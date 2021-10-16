<?php
if (isset($_GET['idTravel'])) {
    require_once('../authen_frontend.php');
    $sql = "SELECT * FROM `place` WHERE place_id = '" . $_GET['idTravel'] . "' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (!isset($_SESSION['time_count' . $row['place_id']])) {

    $_SESSION['time_count' . $row['place_id']] = 'นับจำนวน';

    $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['place_id'] . "' ";
    $result_count = $conn->query($sql_count);
    if ($result_count->num_rows == 0) {

        $sql_insert = "INSERT INTO `countertravel` (`id_counter`, `id_travel`, `count_travel`) 
        VALUES (NULL, '" . $row['place_id'] . "', '1');";
        $result_insert = $conn->query($sql_insert);
    } else {
        $row_count = $result_count->fetch_assoc();
        $count = $row_count['count_travel'];
        $total = $count + 1;

        $sql_update_count = "UPDATE `countertravel` SET `count_travel` = '" . $total . "' WHERE `countertravel`.`id_travel` = '" . $row['place_id'] . "';";
        $result_update_count = $conn->query($sql_update_count);
    }
} else {
    // ไม่มีอะไรเกิดขึ้น
}



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

</head>

<body>

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

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
                        $sql_travel = "SELECT * FROM `love` WHERE id_user = '" . $_SESSION['id_user'] . "' AND id_place = '" . $row['place_id'] . "' ";
                        $result_travel = $conn->query($sql_travel);
                    ?>
                        <?php if ($result_travel->num_rows == 0) { ?>
                            <a class="bd-highlight btn-love" href="./php_love.php?id_user=<?php echo $_SESSION['id_user'] ?>&id_place=<?php echo $row['place_id']  ?>">
                                <img src="../assets/img/love.png" alt="" width="25px"> ชื่นชอบ
                            </a>
                        <?php } else { ?>
                            <a class="bd-highlight btn-love" href="./php_unlove.php?id_user=<?php echo $_SESSION['id_user'] ?>&id_place=<?php echo $row['place_id']  ?>">
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
                                                '<b>ตำบล </b>'.$row['sub_district'] . ' ' .
                                                '<b>อำเภอ </b>'.$row['district'] . ' ' .
                                                '<b>จังหวัด </b>'.$row['province'] . ' ' .
                                                '<b>รหัสไปรษณีย์ </b>'.$row['postcode']
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
                                            <?php echo $row['phones'] == null ? $row['phones'] : 'ไม่พบข้อมูล' ?>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <strong>เบอร์มือถือ: </strong>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <?php echo $row['mobiles'] == null ? $row['mobiles'] : 'ไม่พบข้อมูล' ?>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <strong>FAX: </strong>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <?php echo $row['fax'] == null ? $row['fax'] : 'ไม่พบข้อมูล' ?>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <strong>อีเมล์: </strong>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div style="word-wrap: break-word;"><?php echo $row['emails'] == null ? $row['emails'] : 'ไม่พบข้อมูล' ?></div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <strong>เว็บไซต์: </strong>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <?php if ($row['urls'] == null) { ?>

                                            <?php } else { ?>
                                                <a style="word-wrap: break-word;" href="<?php echo 'https://' . $row['urls'] ?>" target="_blank"> <?php echo $row['urls'] ?></a>
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


    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>


    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Share -->
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5eb7889c7d4ec20012dc03fe&product=inline-share-buttons' async='async'></script>
</body>

</html>