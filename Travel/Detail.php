<?php
require_once('../authen_frontend.php'); 

include_once('../database/connectDB.php');
$id_travel = $_GET['id'];

$sql_count = "SELECT * FROM `countertravel` WHERE `id_travel` LIKE '" . $id_travel . "'";
$result_count = $conn->query($sql_count);
if ($result_count->num_rows == 1) {
    $row_count = $result_count->fetch_assoc();
    $num = $row_count['count_travel'] + 1;
    $sql_update = "UPDATE `countertravel` SET `count_travel` = '" . $num . "' WHERE `id_travel` LIKE '" . $id_travel . "'";
    $result_update = $conn->query($sql_update);
} elseif ($result_count->num_rows == 0) {
    $sql_create = "INSERT INTO `countertravel` (`id_counter`, `id_travel`, `count_travel`) VALUES (NULL, '" . $id_travel . "', 1);";
    $result_create = $conn->query($sql_create);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>

</head>

<body>
    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <!-- แสดงข้อมูลสถานที่ท่องเที่ยว -->

    <div id="dataDetail">

    </div>

    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- WOW JS -->
    <!-- <script src="../assets/Js/wow.js"></script> -->

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var data;
        axios
            .get(
                "https://tatapi.tourismthailand.org/tatapi/v5/attraction/<?php echo $_GET['id'] ?>", {
                    headers: {
                        Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
                        "Accept-Language": `TH`,
                    },
                }
            )
            .then(
                res => {
                    data = res.data.result;
                    console.log(data);

                    // ข้อมูลกิจกรรม
                    dataTagEvent = res.data.result['place_information']['activities'];
                    dataArrEvent = [];
                    if (dataTagEvent == null) {
                        dataArrEvent[0] = '<span class = "badge badge-pill badge-red">ไม่พบข้อมูลกิจกรรม</span>'
                    } else {
                        for (let i = 0; i < dataTagEvent.length; i++) {
                            dataArrEvent[i] = `<span class = "badge badge-pill badge-pink">${dataTagEvent[i]}</span>`
                        }
                    }
                    dataAllEvent = dataArrEvent.join(" ");

                    // เหมาะสำหรับใครบ้าง
                    dataTagTarget = res.data.result['place_information']['targets'];
                    dataArrTarget = [];
                    if (dataTagTarget == null) {
                        dataArrTarget[0] = '<span class = "badge badge-pill badge-red">ไม่พบข้อมูลกิจกรรม</span>'
                    } else {
                        for (let i = 0; i < dataTagTarget.length; i++) {
                            dataArrTarget[i] = `<span class = "badge badge-pill badge-pink">${dataTagTarget[i]}</span>`
                        }
                    }
                    dataAllTarget = dataArrTarget.join(" ");




                    let dataElm = $("#dataDetail");
                    dataElm.append(
                        `
                        <img class="img-travel" src="${res.data.result['web_picture_urls'][0]}" alt="">
                            <div class="bg-img">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="card0" class="card card-img-shadow mt-4 mb-5">
                                                <div class="card-header card-header-color">
                                                    <h3><b>${res.data.result['place_name']}</b></h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h6>ยอดผู้เข้าชมจำนวน 25 คน</h6>
                                                        </div>
                                  
                                                        <?php if(isset($_SESSION['id_user'])){ ?>
                                                        <div class="col-md-6 btn-love">
                                                            <?php if (true) { ?>
                                                                <a href=""><button class="btn btn-pink float-right"><i class="fas fa-heart"></i> ชอบ</button></a>
                                                            <?php } else { ?>
                                                                <a href=""><button class="btn btn-pink float-right"><i class="far fa-heart"></i> คุณชื่นชอบแล้ว</button></a>
                                                            <?php } ?>
                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <!-- ข้อมูลสถานที่ตั้ง -->
                                                        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                            <div id="card1" class="box-part text-center text-light">

                                                                <i class="fas fa-map-marked-alt fa-5x"></i>

                                                                <div class="title">
                                                                    <h4><b>สถานที่ตั้ง</b></h4>
                                                                </div> 

                                                                <div class="text">
                                                                    <span> ${res.data.result['location']['address']} 
                                                                    ตำบล ${res.data.result['location']['sub_district']} 
                                                                    อำเภอ ${res.data.result['location']['district']} 
                                                                    จังหวัด ${res.data.result['location']['province']} 
                                                                    ${res.data.result['location']['postcode']}</span><br><br>

                                                                    <div class="text-left">
                                                                        <span> ${res.data.result['place_information']['introduction']}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </section>

                                                        <hr>

                                                        <!-- ข้อมูลรายละเอียด -->
                                                        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                            <div id="card2" class="box-part my-element text-center text-light">

                                                                <i class="fas fa-book-open fa-5x"></i>

                                                                <div class="title">
                                                                    <h4><b>รายละเอียด</b></h4>
                                                                </div>

                                                                <div class="text">


                                                                    <div class="text-left">
                                                                        <span> ${res.data.result['place_information']['detail']}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </section>

                                                        <hr>

                                                        <!-- ข้อมูลกิจกรรม -->
                                                        <section class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                            <div id="card3" class="box-part text-center text-light">

                                                                <i class="fas fa-hiking fa-5x"></i>

                                                                <div class="title">
                                                                    <h4><b>กิจกรรม</b></h4>
                                                                </div>

                                                                <div class="text">
                                                                    ${dataAllEvent}
                                                                </div>

                                                            </div>
                                                        </section>

                                                        <!-- เหมาะสำหรับ -->
                                                        <section class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                            <div id="card4" class="box-part text-center text-light">

                                                                <i class="fas fa-users fa-5x"></i>

                                                                <div class="title">
                                                                    <h4><b>เหมาะสำหรับ</b></h4>
                                                                </div>

                                                                <div class="text">

                                                                    ${dataAllTarget}
                                                                  
                                                                </div>

                                                            </div>
                                                        </section>

                                                        <!-- การเดินทาง -->
                                                        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                            <div id="card5" class="box-part text-center text-light">

                                                                <i class="fas fa-route fa-5x"></i>

                                                                <div class="title">
                                                                    <h4><b>การเดินทาง</b></h4>
                                                                </div>

                                                                <div class="text">


                                                                    <div class="text-left">
                                                                        <span>${res.data.result['how_to_travel']}</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </section>

                                                        <!-- ข้อมูลกิจกรรม -->
                                                        <section class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                            <div id="card6" class="box-part text-center text-light">

                                                                <i class="fas fa-clock fa-5x"></i>

                                                                <div class="title">
                                                                    <h4><b>วันทำการ</b></h4>
                                                                </div>

                                                                <table class="table table-hover">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th scope="col">วัน</th>
                                                                            <th scope="col">เวลา</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">จันทร์</th>
                                                                            <td>${res.data.result['opening_hours']['weekday_text']['day1'] != null ? res.data.result['opening_hours']['weekday_text']['day1']['time'] : 'ไม่พบเวลา'}</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">อังคาร</th>
                                                                            <td>${res.data.result['opening_hours']['weekday_text']['day2'] != null ? res.data.result['opening_hours']['weekday_text']['day2']['time'] : 'ไม่พบเวลา'}</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">พุธ</th>
                                                                            <td>${res.data.result['opening_hours']['weekday_text']['day3'] != null ? res.data.result['opening_hours']['weekday_text']['day3']['time'] : 'ไม่พบเวลา'}</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">พฤหัสบดี</th>
                                                                            <td>${res.data.result['opening_hours']['weekday_text']['day4'] != null ? res.data.result['opening_hours']['weekday_text']['day4']['time'] : 'ไม่พบเวลา'}</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">ศุกร์</th>
                                                                            <td>${res.data.result['opening_hours']['weekday_text']['day5'] != null ? res.data.result['opening_hours']['weekday_text']['day5']['time'] : 'ไม่พบเวลา'}</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">เสาร์</th>
                                                                            <td>${res.data.result['opening_hours']['weekday_text']['day6'] != null ? res.data.result['opening_hours']['weekday_text']['day6']['time'] : 'ไม่พบเวลา'}</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">อาทิตย์</th>
                                                                            <td>${res.data.result['opening_hours']['weekday_text']['day7'] != null ? res.data.result['opening_hours']['weekday_text']['day7']['time'] : 'ไม่พบเวลา'}</td>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>


                                                        </section>

                                                        <!-- เหมาะสำหรับ -->
                                                        <section class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                            <div id="card7" class="box-part text-center text-light">

                                                                <i class="fas fa-comment-alt fa-5x"></i>

                                                                <div class="title">
                                                                    <h4><b>ข้อมูลติดต่อ</b></h4>
                                                                </div>

                                                                <div class="text">
                                                                    <table class="table table-hover">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col"></th>
                                                                                <th scope="col">รายละเอียด</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">เบอร์โทรศัพท์</th>
                                                                                <td> ${res.data.result['contact']['phones'] != null ? res.data.result['contact']['phones'] : 'ไม่มีข้อมูล'} </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">เบอร์มือถือ</th>
                                                                                <td> ${res.data.result['contact']['mobiles'] != null ? res.data.result['contact']['mobiles'] : 'ไม่มีข้อมูล'}</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">แฟกซ์</th>
                                                                                <td>${res.data.result['contact']['fax'] != null ? res.data.result['contact']['fax'] : 'ไม่มีข้อมูล'}</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">อีเมล์</th>
                                                                                <td>${res.data.result['contact']['emails'] != null ? res.data.result['contact']['emails'] : 'ไม่มีข้อมูล'}</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">เว็บไซต์</th>
                                                                                <td>${res.data.result['contact']['urls'] != null ? res.data.result['contact']['urls'] : 'ไม่มีข้อมูล'}</td>

                                                                            </tr>

                                                                        </tbody>
                                                                    </table>


                                                                </div>

                                                            </div>
                                                        </section>

                                                        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <iframe style="width: 100% ; height: 500px" src='https://map.longdo.com/snippet/iframe.php?locale=th&zoom=10&mode=icons&map=epsg3857&zoombar=yes&toolbar=no&mapselector=no&scalebar=yes&search=${res.data.result['place_name']}' frameborder="0"></iframe>
                                                        </section>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    `
                    )

                }

            )
    </script>

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5eb7889c7d4ec20012dc03fe&product=inline-share-buttons' async='async'></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6113d87857814e0012ebd5c4&product=sop' async='async'></script>
</body>

</html>