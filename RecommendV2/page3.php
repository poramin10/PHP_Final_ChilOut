<?php require_once('../authen_frontend.php');
if (!isset($_SESSION['id_user'])) {
    header('location: ../Login/Page_FormLogin.php');
}

// if(isset($_SESSION['Travel_Recommend'])){
//     header('Location: ./recom_travel.php');
// }

// Check ว่า Page 1 ทำครบหรือยัง
if (!isset($_SESSION['page2'])) {
    header('location: ./page2.php');
}

include_once('./choice.php');






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

    <!-- <img src="../assets/img/img-recom.png" width="100%" alt=""> -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 150px;">
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
                    <span class="hide-mobile">ข้อมูลทั่วไป</span>
                    <span class="show-mobile">ส่วน 1</span>
                </div>
                <div class="item active">
                    <span class="arrow"></span>
                    <span class="hide-mobile">ข้อมูลในการท่องเที่ยว</span>
                    <span class="show-mobile">ส่วน 2</span>
                </div>
                <div class="item active">
                    <span class="arrow"></span>
                    <span class="hide-mobile">แผนในการท่องเที่ยว</span>
                    <span class="show-mobile">ส่วน 3</span>
                </div>
                <div class="item">
                    <span class="hide-mobile">ปัจจัยที่ตัดสินใจท่องเที่ยว</span>
                    <span class="show-mobile">ส่วน 4</span>
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

                        <div class="choice mt-3">
                            <label for="car"> <strong>10. ระยะเวลาในการท่องเที่ยวของท่าน</strong> </label>
                            <div class="row">

                                <?php for ($i = 0; $i < count($arr_time_travel); $i++) { ?>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-check">
                                            <input <?php echo isset($_SESSION['Recom']['timetravel_recom']) && $_SESSION['Recom']['timetravel_recom'] == $arr_time_travel_choice[$i] ? 'checked' : '' ?> class="form-check-input mr-3" name="timetravel_recom" type="radio" value="<?php echo $arr_time_travel_choice[$i] ?>" id="timetravel_recom-<?php echo $i ?>">
                                            <label class="form-check-label" for="timetravel_recom-<?php echo $i ?>">
                                                <?php echo $arr_time_travel[$i] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>

                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['validate_timetravel'])) { ?>
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
                            <label for="car"> <strong>11. ค่าใช้จ่ายในการเดินทาง (ค่าเดินทาง ค่าอาหาร ค่าที่พัก และอื่นๆ)</strong> </label>
                            <div class="row">
                                <?php for ($i = 0; $i < count($arr_expenses_travel); $i++) { ?>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-check">
                                            <input <?php echo isset($_SESSION['Recom']['expenses_recom']) && $_SESSION['Recom']['expenses_recom'] == $arr_expenses_travel_choice[$i] ? 'checked' : '' ?> class="form-check-input mr-3" name="expenses_recom" type="radio" value="<?php echo $arr_expenses_travel_choice[$i] ?>" id="expenses_recom-<?php echo $i ?>">
                                            <label class="form-check-label" for="expenses_recom-<?php echo $i ?>">
                                                <?php echo $arr_expenses_travel[$i] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['validate_expenses'])) { ?>
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
                            <label for="car"> <strong>12. ภาคที่ท่านต้องการไป</strong> </label>
                            <div class="row">
                                <select name="region_recom" class="form-control">
                                    <option value="">
                                        เลือกภาคที่ท่านต้องการจะไป
                                    </option>
                                    <?php for ($i = 0; $i < count($arrRegion); $i++) { ?>
                                        <option <?php echo isset($_SESSION['Recom']['region_recom']) && $_SESSION['Recom']['region_recom'] == $arrRegion_choice[$i] ? 'selected' : '' ?> value="<?php echo $arrRegion_choice[$i]  ?>"><?php echo $arrRegion[$i]  ?></option>
                                    <?php } ?>

                                </select>

                            </div>
                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['validate_region'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong>คุณยังไม่กรอกข้อมูล</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <hr>
                        </div>


                        <button name="backChoice2" class="btn btn-secondary mt-3 float-left px-5">ย้อนกลับ</button>
                        <button type="submit" name="submitChoice3" class="btn btn-blue mt-3 float-right px-5">ต่อไป</button>

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