<?php require_once('../authen_frontend.php');


if (!isset($_SESSION['id_user'])) {
    header('location: ../Login/Page_FormLogin.php');
}

if (isset($_POST['submitReCom'])) {
    $_SESSION['label-categories'] = NULL;
    $_SESSION['stat_recom_south'] = NULL;
} else {
    if (isset($_SESSION['label-categories'])) {
        header('Location: ./recom_travel2.php');
    }
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

    <img src="../assets/img/img-recom.png" width="100%" alt="">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-blue mt-3"><strong>ระบบแนะนำสถานที่ท่องเที่ยวในภาคใต้ของประเทศไทย</strong></h3>
                <h6>กรุณาป้อนข้อมูลของท่านเพื่อระบบจะแนะนำกิจกรรมการท่องเที่ยวที่เหมาะสำหรับคุณ</h6>
            </div>
        </div>
    </div>

    <!-- BreadCrumb -->
    <div class="container">
        <section class="breadcrumb-recomv2">
            <div class="breadcrumb">
                <div class="item active">
                    <span class="arrow"></span>
                    <span class="hide-mobile">ข้อมูลทั่วไป</span>
                    <span class="show-mobile">ส่วน 1</span>
                </div>
                <div class="item">
                    <span class="arrow"></span>
                    <span class="hide-mobile">พฤติกรรมในการท่องเที่ยว</span>
                    <span class="show-mobile">ส่วน 2</span>
                </div>
                <div class="item">
                    <span class="hide-mobile">ปัจจัยที่ตัดสินใจท่องเที่ยว</span>
                    <span class="show-mobile">ส่วน 3</span>
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
                        <h3><strong>ข้อมูลส่วนตัว</strong></h3>

                        <div class="choice label-gender mt-3">
                            <label for=""><strong>1. เพศ</strong></label>
                            <div class="row">
                                <?php for ($i = 0; $i < count($arr_Gender); $i++) { ?>
                                    <div class="col-lg-4 mt-3">
                                        <div class="form-check">
                                            <input <?php echo isset($_SESSION['Recom']['gender_recom']) && $_SESSION['Recom']['gender_recom'] == $arr_Gender_Choice[$i] ? 'checked' : '' ?> class="form-check-input mr-3" name="gender_recom" type="radio" value="<?php echo $arr_Gender_Choice[$i] ?>" id="gender_recom">
                                            <label class="form-check-label">
                                                <?php echo $arr_Gender[$i] ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>

                            <!-- กรณีไม่พบการกรอกข้อมูล -->
                            <?php if (isset($_SESSION['Recom']['validate_gender'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    <strong>คุณยังไม่กรอกข้อมูล</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <hr>

                        </div>

                        <div class="choice label-age mt-3">
                            <label for="age_recom"><strong>2. อายุ</strong> </label>
                            <select class="custom-select" name="age_recom" id="inputGroupSelect01" required>
                                <option <?php echo !isset($_SESSION['Recom']['age_recom']) ? 'selected' : '' ?> value="">ช่วงอายุ</option>
                                <?php for ($i = 0; $i < count($arr_age); $i++) { ?>
                                    <option <?php echo isset($_SESSION['Recom']['age_recom']) && $_SESSION['Recom']['age_recom'] == $arr_age_choice[$i] ? 'selected' : ''  ?> value="<?php echo $arr_age_choice[$i] ?>"><?php echo $arr_age[$i] ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                คุณยังไม่ได้กรอกข้อมูล
                            </div>
                        </div>

                        <div class="choice label-career mt-3">
                            <label for="career_recom"><strong>4. อาชีพ</strong> </label>
                            <select class="custom-select" name="career_recom" id="inputGroupSelect01" required>
                                <option <?php echo !isset($_SESSION['Recom']['career_recom']) ? 'selected' : '' ?> value="">เลือกอาชีพ</option>

                                <?php for ($i = 0; $i < count($arr_career); $i++) { ?>
                                    <option <?php echo isset($_SESSION['Recom']['career_recom']) && $_SESSION['Recom']['career_recom'] == $arr_career_choice[$i] ? 'selected' : ''  ?> value="<?php echo $arr_career_choice[$i] ?>"><?php echo $arr_career[$i] ?></option>
                                <?php } ?>

                            </select>
                            <div class="invalid-feedback">
                                คุณยังไม่ได้กรอกข้อมูล
                            </div>
                        </div>

                        <div class="choice label-salary mt-3">
                            <label for="salary_recom"><strong>5. รายได้เฉลี่ยต่อเดือน</strong> </label>
                            <select class="custom-select" name="salary_recom" id="inputGroupSelect01" required>
                                <option <?php echo !isset($_SESSION['Recom']['salary_recom']) ? 'selected' : '' ?> value="">เลือกรายได้เฉลี่ย</option>

                                <?php for ($i = 0; $i < count($arr_salary); $i++) { ?>
                                    <option <?php echo isset($_SESSION['Recom']['salary_recom']) && $_SESSION['Recom']['salary_recom'] == $arr_salary_choice[$i] ? 'selected' : ''  ?> value="<?php echo $arr_salary_choice[$i] ?>"><?php echo $arr_salary[$i] ?></option>
                                <?php } ?>

                            </select>
                            <div class="invalid-feedback">
                                คุณยังไม่ได้กรอกข้อมูล
                            </div>
                        </div>

                        <button type="submit" name="submitChoice1" class="btn btn-blue mt-3 float-right px-5">ต่อไป</button>

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

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

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