<?php require_once('../authen_frontend.php');
if (!isset($_SESSION['id_user'])) {
    header('location: ../Login/Page_FormLogin.php');
}

// if(isset($_SESSION['Travel_Recommend'])){
//     header('Location: ./recom_travel.php');
// }


// Check ว่า Page 1 ทำครบหรือยัง
if (!isset($_SESSION['page1'])) {
    header('location: ./page1.php');
}

// Check ว่า Page 2 ที่ทำไปแล้วคืออันไหนบ้าง
if (isset($_SESSION['Recom']['objective_recom'])) {
    $checkObjective = explode(',', $_SESSION['Recom']['objective_recom']);
} else {
    $checkObjective = [''];
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
                <div class="item">
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
        <form action="./php_sessionChoice.php" method="POST" class="needs-validation" novalidate>
            <div class="container">
                <div class="row" >

                    <div class="col-lg-12">
                        <h3><strong>ข้อมูลการท่องเที่ยว</strong></h3>

                        <div class="choice label-planning mt-3">
                            <label for="planning_recom"><strong>6. การวางแผนในการท่องเที่ยวของท่าน</strong> </label>
                            <select class="custom-select" name="planning_recom" id="inputGroupSelect01" required>
                                <option <?php echo !isset($_SESSION['Recom']['planning_recom']) ? 'selected' : '' ?> value="">การวางแผนในการท่องเที่ยว</option>
                                <?php for ($i = 0; $i < count($arr_planning); $i++) { ?>
                                    <option <?php echo isset($_SESSION['Recom']['planning_recom']) && $_SESSION['Recom']['planning_recom'] == $arr_planning_choice[$i] ? 'selected' : ''  ?> value="<?php echo $arr_planning_choice[$i] ?>"><?php echo $arr_planning[$i] ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                คุณยังไม่ได้กรอกข้อมูล
                            </div>
                        </div>

                        <div class="choice label-objective mt-3">
                            <label for="career"><strong>7. วัตถุประสงค์หลักในการเดินทางมาท่องเที่ยว</strong> </label>
                            <div class="form-check">
                                <div class="row">
                                    <?php for ($i = 0; $i < count($arr_objective); $i++) { ?>
                                        <div class="col-lg-6 mt-3">
                                            <input <?php echo in_array($arr_objective_choice[$i], $checkObjective) ? 'checked' : '' ?> class="form-check-input mr-3" type="radio" name="objective_recom" value="<?php echo $arr_objective_choice[$i] ?>" id="objective_recom-<?php echo $i ?>">
                                            <label class="form-check-label" for="objective_recom-<?php echo $i ?>">
                                                <?php echo $arr_objective[$i] ?>
                                            </label>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['Recom']['validate_objective'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong>คุณยังไม่กรอกข้อมูล</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <hr>
                        </div>

                        <div class="choice label-carTravel mt-3">
                            <label for="car"><strong>8.การเดินทางมาเที่ยวในครั้งนี้ท่านเดินทางมาอย่างไร</strong> </label>
                            <div class="row">

                                <?php for ($i = 0; $i < count($arr_car_travel); $i++) { ?>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-check">
                                            <input <?php echo isset($_SESSION['Recom']['car_recom']) && $_SESSION['Recom']['car_recom'] == $arr_car_travel_choice[$i] ? 'checked' : '' ?> class="form-check-input mr-3" name="car_recom" type="radio" value="<?php echo $arr_car_travel_choice[$i] ?>" id="car_recom-<?php echo $i ?>">
                                            <label class="form-check-label" for="car_recom-<?php echo $i ?>">
                                                <?php echo $arr_car_travel[$i] ?>
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
                            <label for="car"><strong>9. บุคคลที่ท่องเที่ยวร่วมกัน</strong> </label>
                            <div class="row">
                                <?php for ($i = 0; $i < count($arr_friend); $i++) { ?>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-check">
                                            <input <?php echo isset($_SESSION['Recom']['friend_recom']) && $_SESSION['Recom']['friend_recom'] == $arr_friend_choice[$i] ? 'checked' : '' ?> class="form-check-input mr-3" name="friend_recom" type="radio" value="<?php echo $arr_friend_choice[$i] ?>" id="friend_recom-<?php echo $i ?>">
                                            <label class="form-check-label" for="friend_recom-<?php echo $i ?>">
                                                <?php echo $arr_friend[$i] ?>
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