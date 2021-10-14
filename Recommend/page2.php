<?php require_once('../authen_frontend.php');
if (!isset($_SESSION['id_user'])) {
    header('location: ../Login/Page_FormLogin.php');
}

// Check ว่า Page 1 ทำครบหรือยัง
if (!isset($_SESSION['page1'])) {
    header('location: ./page1.php');
}

// Check ว่า Page 2 ที่ทำไปแล้วคืออันไหนบ้าง
if (isset($_SESSION['objective_recom'])) {
    $checkObjective = explode(',', $_SESSION['objective_recom']);
} else {
    $checkObjective = [''];
}

// หัวข้อ: วัตถุประสงค์ในการท่องเที่ยวของท่าน
$arrObjective = [
    "ท่องเที่ยว/พักผ่อน",
    "เยี่ยมญาติ/เพื่อน",
    "มาเพื่อประชุม/สัมมนา",
    "มาเพื่อสักการะสิ่งศักสิทธิ์",
    "มาเพื่อปฏิบัติงาน/ติดต่อธุรกิจ",
    "เป็นทางผ่านในการเดินทาง",
];

// หัวข้อ: ท่านเดินทางมาท่องเที่ยวอย่างไร
$arrCarTravel = [
    "จักรยาน",
    "จักรยานยนต์",
    "รถยนต์ส่วนตัว",
    "รถโดยสารประจำทาง",
    "รถรับจ้าง/เหมา",
    "เครื่องบิน",
    "รถไฟ",
    "เรือ",
    "อื่นๆ",
];

// หัวข้อ: ความต้องการในการมาท่องเที่ยวของท่าน
$arrNeedTravel = [
    "ต้องการเพื่อชมความงดงามของสถานที่",
    "ต้องการพักผ่อนหย่อนใจ",
    "ต้องการใช้เป็นแหล่งศึกษาหาความรู้",
    "ต้องการทำธุรกิจ",
    "ต้องการหากิจกรรมในวันหยุด",
    "ต้องการท่องเที่ยวผจญภัย",
    "ต้องการความตื่นเต้นความบันเทิง",
    "ต้องการศึกษาวัฒนธรรม",
    "ต้องการค้นหาความแปลกใหม่",
];
$arrNeedChoice = [
    'มากที่สุด',
    'มาก',
    'ปานกลาง',
    'น้อย',
    'น้อยที่สุด'
];

// หัวข้อ: บุคคลที่ท่องเที่ยวร่วมกับท่าน
$arrFriend = [
    "เที่ยวคนเดียว",
    "กลุ่มเพื่อน",
    "ครอบครัวหรือญาติ",
    "คนพิเศษ",
    "บริษัททัวร์",
];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommend</title>
    <!-- CSS -->
    <?php include_once('../include/inc_css_front.php') ?>

    <!-- Icheck -->
    <link href="../assets/lib/icheck/skins/square/blue.css" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <img src="../assets/img/img-recom.png" width="100%" alt="">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-blue mt-3"><strong>ระบบแนะนำสถานที่ท่องเที่ยว</strong></h3>
                <h6>กรุณาป้อนข้อมูลของท่านเพื่อระบบจะแนะนำกิจกรรมการท่องเที่ยวที่เหมาะสำหรับคุณ</h6>
            </div>
        </div>
    </div>

    <!-- BreadCrumb -->
    <div class="container">
        <section class="breadcrumb-recom">
            <div class="breadcrumb">
                <div class="item active">
                    <span class="arrow"></span>
                    <span class="hide-mobile">ส่วนที่ 1</span>
                    <span class="show-mobile">ส่วนที่ 1</span>
                </div>
                <div class="item active">
                    <span class="arrow"></span>
                    <span class="hide-mobile">ส่วนที่ 2</span>
                    <span class="show-mobile">ส่วนที่ 2</span>
                </div>
                <div class="item">
                    <span class="arrow"></span>
                    <span class="hide-mobile">ส่วนที่ 3</span>
                    <span class="show-mobile">ส่วนที่ 3</span>
                </div>
                <div class="item">
                    <span class="hide-mobile">ส่วนที่ 4</span>
                    <span class="show-mobile">ส่วนที่ 4</span>
                </div>
            </div>
        </section>
    </div>

    <!-- choice  -->
    <section class="choice">
        <form action="./php_sessionChoice.php" method="POST" class="needs-validation" novalidate>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <h3><strong>ข้อมูลการท่องเที่ยว</strong></h3>

                        <div class="choice">
                            <label for="career">5. วัตถุประสงค์หลักในการเดินทางมาท่องเที่ยว <span class="text-red"><strong>(ตอบได้มากกว่า 1 ข้อ)</strong></span> </label>
                            <div class="form-check">
                                <div class="row">
                                    <?php for ($i = 0; $i < count($arrObjective); $i++) { ?>
                                        <div class="col-lg-6 mt-3">
                                            <input <?php echo in_array($arrObjective[$i], $checkObjective) ? 'checked' : '' ?> class="form-check-input mr-3" type="checkbox" name="objective_recom[]" value="<?php echo $arrObjective[$i] ?>" id="objective_recom-<?php echo $i ?>">
                                            <label class="form-check-label" for="objective_recom-<?php echo $i ?>">
                                                <?php echo $arrObjective[$i] ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['validate_objective'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong>คุณยังไม่กรอกข้อมูล</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <hr>
                        </div>

                        <div class="choice mt-3">
                            <label for="car"> 6.การเดินทางมาเที่ยวในครั้งนี้ท่านเดินทางมาอย่างไร</label>
                            <div class="row">

                                <?php for ($i = 0; $i < count($arrCarTravel); $i++) { ?>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-check">
                                            <input <?php echo isset($_SESSION['car_recom']) && $_SESSION['car_recom'] == $arrCarTravel[$i] ? 'checked' : '' ?> class="form-check-input mr-3" name="car_recom" type="radio" value="<?php echo $arrCarTravel[$i] ?>" id="car_recom-<?php echo $i ?>">
                                            <label class="form-check-label" for="car_recom-<?php echo $i ?>">
                                                <?php echo $arrCarTravel[$i] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>

                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['validate_car'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong>คุณยังไม่กรอกข้อมูล</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <hr>

                        </div>

                        <div class="choice mt-3">
                            <label for="career"> 7. ความต้องการในการมาท่องเที่ยวของท่าน </label>
                            <div class="row">

                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr class="title-table-head bg-blue text-light">
                                            <th rowspan="2">ลำดับ</th>
                                            <th rowspan="2">หัวข้อ</th>
                                            <th colspan="5">ตัวเลือก</th>
                                        </tr>
                                        <tr class="bg-blue text-light">
                                            <th>มากที่สุด</th>
                                            <th>มาก</th>
                                            <th>ปานกลาง</th>
                                            <th>น้อย</th>
                                            <th>น้อยที่สุด</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $num = 0;
                                        for ($i = 0; $i < count($arrNeedTravel); $i++) {
                                            $num++;
                                        ?>
                                            <tr>
                                                <th class="text-center" scope="row"><?php echo $num ?></th>
                                                <td><?php echo $arrNeedTravel[$i] ?></td>
                                                <?php for ($y = 0; $y < count($arrNeedChoice); $y++) { ?>
                                                    <td class="text-center">
                                                        <input <?php echo isset($_SESSION['need_travel-' . $i]) && $_SESSION['need_travel-' . $i] == $arrNeedChoice[$y] ? 'checked' : '' ?> class="form-check-input mr-3" name="need_travel-<?php echo $i ?>" type="radio" value="<?php echo $arrNeedChoice[$y] ?>" id="need_travel-1<?php echo $y ?>">
                                                        <?php //echo $_SESSION['need_travel-'.$i].' == '.$arrNeedChoice[$y] 
                                                        ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                            </div>

                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['validate_need'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong>คุณยังไม่กรอกข้อมูล</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>


                            <hr>

                        </div>

                        <div class="choice mt-3">
                            <label for="car"> 8. บุคคลที่ท่องเที่ยวร่วมกัน</label>
                            <div class="row">

                                <?php for ($i = 0; $i < count($arrFriend); $i++) { ?>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-check">
                                            <input <?php echo isset($_SESSION['friend_recom']) && $_SESSION['friend_recom'] == $arrFriend[$i] ? 'checked' : '' ?> class="form-check-input mr-3" name="friend_recom" type="radio" value="<?php echo $arrFriend[$i] ?>" id="friend_recom-<?php echo $i ?>">
                                            <label class="form-check-label" for="friend_recom-<?php echo $i ?>">
                                                <?php echo $arrFriend[$i] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>

                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['validate_car'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong>คุณยังไม่กรอกข้อมูล</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <hr>

                        </div>

                        <button name="backChoice1" class="btn btn-secondary mt-3 float-left px-5">ย้อนกลับ</button>
                        <button type="submit" name="submitChoice2" class="btn btn-blue mt-3 float-right px-5">ต่อไป</button>

                    </div>
                </div>
            </div>
        </form>


    </section>


    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>


    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- ICheck -->
    <script src="../assets/lib/icheck/icheck.js"></script>

    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square',
                radioClass: 'iradio_square',
                increaseArea: '20%' // optional
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

</body>

</html>