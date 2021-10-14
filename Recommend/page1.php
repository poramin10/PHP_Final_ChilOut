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
    <title>Recommend</title>
    <!-- CSS -->
    <?php include_once('../include/inc_css_front.php') ?>

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
                <div class="item">
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
                        <h3><strong>ข้อมูลส่วนตัว</strong></h3>
                        <div class="choice">
                            <label for="education_recom">1. การศึกษา</label>
                            <select class="custom-select" name="education_recom" id="inputGroupSelect01" required>
                                <option <?php echo !isset($_SESSION['education_recom']) ? 'selected' : '' ?> value="">เลือกการศึกษา</option>
                                <option <?php echo isset($_SESSION['education_recom']) && $_SESSION['education_recom'] == 'ประถมศึกษา' ? 'selected' : ''  ?> value="ประถมศึกษา">ประถมศึกษา</option>
                                <option <?php echo isset($_SESSION['education_recom']) && $_SESSION['education_recom'] == 'มัธยมศึกษาตอนต้น' ? 'selected' : ''  ?> value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                                <option <?php echo isset($_SESSION['education_recom']) && $_SESSION['education_recom'] == 'มัธยมศึกษาตอนปลาย/ปวช' ? 'selected' : ''  ?> value="มัธยมศึกษาตอนปลาย/ปวช">มัธยมศึกษาตอนปลาย/ปวช</option>
                                <option <?php echo isset($_SESSION['education_recom']) && $_SESSION['education_recom'] == 'อนุปริญญา/ปวส' ? 'selected' : ''  ?> value="อนุปริญญา/ปวส">อนุปริญญา/ปวส</option>
                                <option <?php echo isset($_SESSION['education_recom']) && $_SESSION['education_recom'] == 'ปริญญาตรี' ? 'selected' : ''  ?> value="ปริญญาตรี">ปริญญาตรี</option>
                                <option <?php echo isset($_SESSION['education_recom']) && $_SESSION['education_recom'] == 'ปริญญาโท' ? 'selected' : ''  ?> value="ปริญญาโท">ปริญญาโท</option>
                                <option <?php echo isset($_SESSION['education_recom']) && $_SESSION['education_recom'] == 'ปริญญาเอก' ? 'selected' : ''  ?> value="ปริญญาเอก">ปริญญาเอก</option>
                            </select>
                            <div class="invalid-feedback">
                                คุณยังไม่ได้กรอกข้อมูล
                            </div>
                        </div>

                        <div class="choice mt-3">                  
                            <label for="career_recom">2. อาชีพ</label>
                            <select class="custom-select" name="career_recom" id="inputGroupSelect01" required>
                                <option <?php echo !isset($_SESSION['career_recom']) ? 'selected' : '' ?> value="">เลือกอาชีพ</option>
                                <option <?php echo isset($_SESSION['career_recom']) && $_SESSION['career_recom'] == 'พนักงานบริษัทเอกชน' ? 'selected' : ''  ?> value="พนักงานบริษัทเอกชน">พนักงานบริษัทเอกชน</option>
                                <option <?php echo isset($_SESSION['career_recom']) && $_SESSION['career_recom'] == 'ธุรกิจส่วนตัว' ? 'selected' : ''  ?> value="ธุรกิจส่วนตัว">ธุรกิจส่วนตัว</option>
                                <option <?php echo isset($_SESSION['career_recom']) && $_SESSION['career_recom'] == 'นิสิต/นักศึกษา' ? 'selected' : ''  ?> value="นิสิต/นักศึกษา">นิสิต/นักศึกษา</option>
                                <option <?php echo isset($_SESSION['career_recom']) && $_SESSION['career_recom'] == 'นักเรียน' ? 'selected' : ''  ?> value="นักเรียน">นักเรียน</option>
                                <option <?php echo isset($_SESSION['career_recom']) && $_SESSION['career_recom'] == 'รับจ้าง' ? 'selected' : ''  ?> value="รับจ้าง">รับจ้าง</option>
                                <option <?php echo isset($_SESSION['career_recom']) && $_SESSION['career_recom'] == 'ข้าราชการ/รัฐวิสาหกิจ' ? 'selected' : ''  ?> value="ข้าราชการ/รัฐวิสาหกิจ">ข้าราชการ/รัฐวิสาหกิจ</option>
                                <option <?php echo isset($_SESSION['career_recom']) && $_SESSION['career_recom'] == 'ว่างงาน' ? 'selected' : ''  ?> value="ว่างงาน">ว่างงาน</option>
                            </select>
                            <div class="invalid-feedback">
                                คุณยังไม่ได้กรอกข้อมูล
                            </div>
                        </div>

                        <div class="choice mt-3">
                            <label for="salary_recom">3. รายได้เฉลี่ยต่อเดือน </label>
                            <select class="custom-select" name="salary_recom" id="inputGroupSelect01" required>
                                <option <?php echo !isset($_SESSION['salary_recom']) ? 'selected' : '' ?> value="">เลือกรายได้เฉลี่ย</option>
                                <option <?php echo isset($_SESSION['salary_recom']) && $_SESSION['salary_recom'] == 'ต่ำกว่า 5,000 บาท' ? 'selected' : ''  ?> value="ต่ำกว่า 5,000 บาท">ต่ำกว่า 5,000 บาท</option>
                                <option <?php echo isset($_SESSION['salary_recom']) && $_SESSION['salary_recom'] == '5,001 - 10,000 บาท' ? 'selected' : ''  ?> value="5,001 - 10,000 บาท">5,001 - 10,000 บาท</option>
                                <option <?php echo isset($_SESSION['salary_recom']) && $_SESSION['salary_recom'] == '10,001 - 15,000 บาท' ? 'selected' : ''  ?> value="10,001 - 15,000 บาท">10,001 - 15,000 บาท</option>
                                <option <?php echo isset($_SESSION['salary_recom']) && $_SESSION['salary_recom'] == '15,001 - 20,000 บาท' ? 'selected' : ''  ?> value="15,001 - 20,000 บาท">15,001 - 20,000 บาท</option>
                                <option <?php echo isset($_SESSION['salary_recom']) && $_SESSION['salary_recom'] == '20,001 - 25,000 บาท' ? 'selected' : ''  ?> value="20,001 - 25,000 บาท">20,001 - 25,000 บาท</option>
                                <option <?php echo isset($_SESSION['salary_recom']) && $_SESSION['salary_recom'] == 'มากกว่า 25,000 บาทขึ้นไป' ? 'selected' : ''  ?> value="มากกว่า 25,000 บาทขึ้นไป">มากกว่า 25,000 บาทขึ้นไป</option>
                            </select>
                            <div class="invalid-feedback">
                                คุณยังไม่ได้กรอกข้อมูล
                            </div>
                        </div>

                        <div class="choice mt-3">
                            <label for="domicile_recom">4. ภูมิลำเนา </label>
                            <select class="custom-select" name="domicile_recom" id="inputGroupSelect01" required>
                                <option <?php echo !isset($_SESSION['domicile_recom']) ? 'selected' : '' ?> value="">เลือกภูมิลำเนาของท่าน</option>
                                <option <?php echo isset($_SESSION['domicile_recom']) && $_SESSION['domicile_recom'] == 'กรุงเทพ' ? 'selected' : ''  ?> value="กรุงเทพ">กรุงเทพ</option>
                                <option <?php echo isset($_SESSION['domicile_recom']) && $_SESSION['domicile_recom'] == 'ปริมณฑล' ? 'selected' : ''  ?> value="ปริมณฑล">ปริมณฑล</option>
                                <option <?php echo isset($_SESSION['domicile_recom']) && $_SESSION['domicile_recom'] == 'ภาคเหนือ' ? 'selected' : ''  ?> value="ภาคเหนือ">ภาคเหนือ</option>
                                <option <?php echo isset($_SESSION['domicile_recom']) && $_SESSION['domicile_recom'] == 'ภาคกลาง' ? 'selected' : ''  ?> value="ภาคกลาง">ภาคกลาง</option>
                                <option <?php echo isset($_SESSION['domicile_recom']) && $_SESSION['domicile_recom'] == 'ภาคใต้' ? 'selected' : ''  ?> value="ภาคใต้">ภาคใต้</option>
                                <option <?php echo isset($_SESSION['domicile_recom']) && $_SESSION['domicile_recom'] == 'ภาคตะวันออก' ? 'selected' : ''  ?> value="ภาคตะวันออก">ภาคตะวันออก</option>
                                <option <?php echo isset($_SESSION['domicile_recom']) && $_SESSION['domicile_recom'] == 'ภาคตะวันตก' ? 'selected' : ''  ?> value="ภาคตะวันตก">ภาคตะวันตก</option>
                                <option <?php echo isset($_SESSION['domicile_recom']) && $_SESSION['domicile_recom'] == 'ภาคตะวันออกเฉียงเหนือ' ? 'selected' : ''  ?> value="ภาคตะวันออกเฉียงเหนือ">ภาคตะวันออกเฉียงเหนือ</option>
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
</body>

</html>