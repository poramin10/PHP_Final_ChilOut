<?php require_once('../authen_frontend.php');
if (!isset($_SESSION['id_user'])) {
    header('location: ../Login/Page_FormLogin.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                <div class="item active">
                    <span class="arrow"></span>
                    <span class="hide-mobile">ส่วนที่ 3</span>
                    <span class="show-mobile">ส่วนที่ 3</span>
                </div>
                <div class="item active">
                    <span class="hide-mobile">ส่วนที่ 4</span>
                    <span class="show-mobile">ส่วนที่ 4</span>
                </div>
            </div>
        </section>
    </div>

    <!-- choice  -->
    <section class="choice">
        <form action="./php_sessionChoice.php" method="POST">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">

                        <h3><strong>ข้อมูลการท่องเที่ยว</strong></h3>

                        <div class="choice-3">
                            <label for="career">3. วัตถุประสงค์หลักในการเดินทางมาท่องเที่ยว (ตอบได้มากกว่า 1 ข้อ)</label>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            1) ท่องเที่ยว/พักผ่อน
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            2) เยี่ยมญาติ/เพื่อน
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            3) ประชุม/สัมมนา
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            4) สักการะสิ่งศักดิ์สิทธิ์
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            5) ปฏิบัติงาน/ติดต่อธุรกิจ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            6) เป็นทางผ่านในการเดินทาง
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="choice-4 mt-3">
                            <label for="career"> 4.การเดินทางมาเที่ยวในครั้งนี้ท่านเดินทางมาอย่างไร</label>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="radio" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        1) รถส่วนตัว
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="radio" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        2) รถโดยสารประจำทาง
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="radio" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        3) รถรับจ้าง/เหมา
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="radio" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        4) กรุ๊ปทัวร์
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="radio" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        5) อื่นๆ
                                        </label>
                                    </div>
                                </div>
                               
                            </div>

                        </div>

                        <div class="choice-5 mt-3">
                            <label for="career"> 5.ท่านรับรู้ข้อมูลข่าวสารจากแหล่งใดที่ทำให้ท่านสนใจเดินทางมาเที่ยวจังหวัดอุบลฯ(ตอบได้มากกว่า 1 ข้อ)</label>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        1) การบอกเล่าปากต่อปากจากคนรู้จัก
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        2) หนังสือนำเที่ยว
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        3) หนังสือพิมพ์/นิตยสาร
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        4) วิทยุ/โทรทัศน์
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        5) อินเทอร์เน็ต,เว็บไซต์
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        6) แอพพลิเคชั่นแนะนำสถานที่ท่องเที่ยว
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input mr-3" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        7) อื่นๆ
                                        </label>
                                    </div>
                                </div>
                               
                            </div>

                        </div>

                        <button name="backChoice3" class="btn btn-secondary mt-3 float-left px-5">ย้อนกลับ</button>
                        <button type="submit" name="submitChoice4" class="btn btn-blue mt-3 float-right px-5">ประมวลผลแบบสอบถาม</button>

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