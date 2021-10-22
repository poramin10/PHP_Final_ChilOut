<?php require_once('../authen_frontend.php');
if (!isset($_SESSION['id_user'])) {
    header('location: ../Login/Page_FormLogin.php');
}

// หัวข้อ: ความต้องการในการมาท่องเที่ยวของท่าน
$arrDecideTravel = [
    "สถานที่ท่องเที่ยวที่มีความปลอดภัย",
    "สถานที่ท่องเที่ยวที่มีบรรยากาศดี",
    "เป็นเอกลักษณ์",
    "มีความสวยงามเป็นธรรมชาติ",
    "ความงดงามของสถานที่ท่องเที่ยว",
    "ความหลากหลายของแหล่งท่องเที่ยว",
    "มีสถานที่ควรค่าแก่การสักการะ",
    "มีความสมบูรณ์ทางโบราณวัตถุ",
    "มีความทันสมัยทางด้านเทคโนโลยี",
    "มีหลากหลายเส้นทางการเข้าถึง",
    "สภาพถนนไม่ขรุขระ",
    "มีแหล่งศึกษาวัฒนธรรม",
    "ได้เปิดโลกกว้าง",
    "ได้ความรู้ในการท่องเที่ยว",
    "มีสินค้าท้องถิ่นจัดจำหน่าย",

];
$arrDecideChoice = [
    '5',
    '4',
    '3',
    '2',
    '1'
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
                        <h3><strong>ปัจจัยที่มีผลต่อการตัดสินใจของท่าน</strong></h3>
                        <div class="choice mt-3">
                            <label for="career"> 11. ปัจจัยที่มีผลต่อการตัดสินใจ </label>
                            <div class="row">

                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr class="title-table-head bg-blue text-light">
                                            <th rowspan="2">ลำดับ</th>
                                            <th rowspan="2">หัวข้อ</th>
                                            <th colspan="5">คะแนนการเห็นด้วย</th>
                                        </tr>
                                        <tr class="bg-blue text-light">
                                            <th>5</th>
                                            <th>4</th>
                                            <th>3</th>
                                            <th>2</th>
                                            <th>1</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $num = 0;
                                        for ($i = 0; $i < count($arrDecideTravel); $i++) {
                                            $num++;
                                        ?>
                                            <tr>
                                                <th class="text-center" scope="row"><?php echo $num ?></th>
                                                <td><?php echo $arrDecideTravel[$i] ?></td>
                                                <?php for ($y = 0; $y < count($arrDecideChoice); $y++) { ?>
                                                    <td class="text-center">
                                                        <input <?php echo isset($_SESSION['decide_travel-'.$i]) && $_SESSION['decide_travel-'.$i] == $arrDecideChoice[$y] ? 'checked' : '' ?> class="form-check-input mr-3" name="decide_travel-<?php echo $i ?>" type="radio" value="<?php echo $arrDecideChoice[$y] ?>" id="decide_travel-<?php echo $y ?>">
                                                        <?php //echo $_SESSION['need_travel-'.$i].' == '.$arrDecideChoice[$y] 
                                                        ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                            </div>

                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['validate_decide'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong>คุณยังไม่กรอกข้อมูล</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>


                            <hr>

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