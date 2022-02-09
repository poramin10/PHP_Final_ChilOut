<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>
    
    <!-- ปฏิทินภาษาไทย -->
    <link rel="stylesheet" href="../assets/script/jquery.datetimepicker.css">

</head>

<body>

    <div class="container">
        <form action="./php_insertRegister.php" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4 col-12 mt-5 mb-3 p-3 card-register2">
                    <a href="../HomePage/index.php" type="button" class="btn btn-light btn-circle btn-lg"><i class="fas fa-chevron-left fa-"></i></a>
                    <h3 class="text-light text-center mt-5">โปรไฟล์</h3>
                    <div class="profile-img">
                        <figure class="figure mx-auto">
                            <img id="imgUpload" class="figure-img img-fluid rounded img-profile-cycle" src="../assets/img/preview.png" alt="">
                        </figure>

                        <div class="file btn btn-lg btn-primary">
                            อัพโหลดรูปภาพ
                            <input type="file" id="fileUpload" name="fileUpload" onchange="readURL(this)">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-12 mt-5 mb-3 p-3 card-register">
                    <h3><strong>สมัครสมาชิก</strong></h3>
                    <hr>
                    <label for="">ชื่อจริง (Firstname) <span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-book"></i></span>
                        </div>
                        <input type="text" value="<?php echo isset($_SESSION['check_firstname']) != NULL ? $_SESSION['check_firstname'] : '' ?>" name="firstname" class="form-control style-form" placeholder="กรุณากรอกชื่อจริง" aria-label="Firstname" aria-describedby="basic-addon1" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล!!
                        </div>
                    </div>
                    <label for=""> นามสกุล (Lastname)<span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-book"></i></span>
                        </div>
                        <input type="text" value="<?php echo isset($_SESSION['check_lastname']) != NULL ? $_SESSION['check_lastname'] : '' ?>" name="lastname" class="form-control style-form" placeholder="กรุณากรอกนามสกุล" aria-label="Lastname" aria-describedby="basic-addon1" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล!!
                        </div>
                    </div>
                    <label for="">เพศ (Gender) <span class="text-danger">*</span></label>

                    <div class="form-check">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="gender" value="ชาย" type="radio" name="inlineRadioOptions" id="inlineRadio1" <?php echo isset($_SESSION['check_gender']) == 'ชาย' ? 'checked' : '' ?> required>
                            <label class="form-check-label"   for="inlineRadio1" >ชาย</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  name="gender" value="หญิง" type="radio" name="inlineRadioOptions" id="inlineRadio1" <?php echo isset($_SESSION['check_gender']) == 'หญิง' ? 'checked' : '' ?> required>
                            <label class="form-check-label"   for="inlineRadio1" >หญิง</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="gender" value="LGBT"  type="radio" name="inlineRadioOptions" id="inlineRadio1" <?php echo isset($_SESSION['check_gender']) == 'LGBT' ? 'checked' : '' ?> required>
                            <label class="form-check-label"  for="inlineRadio1" >LGBT</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="gender" value="ไม่ระบุ"  type="radio" name="inlineRadioOptions" id="inlineRadio1" <?php echo isset($_SESSION['check_gender']) == 'ไม่ระบุ' ? 'checked' : '' ?> required>
                            <label class="form-check-label"  for="inlineRadio1" >ไม่ระบุ</label>
                        </div>
                        <div class="invalid-feedback">
                            กรุณาเลือกเพศ
                        </div>
                    </div>

                    <div class="mb-1">
                        <label for="birthday">วันเกิด (Birthday) <span class="text-danger">*</span></label>
                        <input id="testdate5" value="<?php echo isset($_SESSION['check_birthdate']) != NULL ? $_SESSION['check_birthdate'] : '' ?>" name="birthdate" class="form-control " required>
                        <div class="invalid-feedback">
                            กรุณาเลือกวันที่ 
                        </div>
                    </div>
                    <label for="">อีเมลล์ (Email) <span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email"  value="<?php echo isset($_SESSION['check_email']) != NULL ? $_SESSION['check_email'] : '' ?>" class="form-control style-form" placeholder="กรุณากรอกอีเมลล์" aria-label="email" aria-describedby="basic-addon1" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูลให้ครบถ้วนถูกต้อง
                        </div>
                    </div>
                    <label for="">เบอร์โทรศัพท์ (Phone)</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" minlength="10" maxlength="10" name="phone" value="<?php echo isset($_SESSION['check_phone']) != NULL ? $_SESSION['check_phone'] : '' ?>" class="form-control style-form" placeholder="กรุณากรอกเบอร์โทรศัพท์" aria-label="phone" aria-describedby="basic-addon1">
                        <div class="invalid-feedback">
                            กรุณากรอกเบอร์โทรศัพท์มือถือให้ถูกต้อง
                        </div>
                    </div>
                    <label for="">ชื่อผู้ใช้งาน (Username) <span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" value="<?php echo isset($_SESSION['check_username']) != NULL ? $_SESSION['check_username'] : '' ?>" class="form-control style-form" placeholder="กรุณากรอกชื่อผู้ใช้งาน" aria-label="phone" aria-describedby="basic-addon1" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล!!
                        </div>
                    </div>
                    <label for="">รหัสผ่าน (Password) <span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control style-form" placeholder="กรุณากรอกรหัสผ่าน" aria-label="password" aria-describedby="basic-addon1" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล!!
                        </div>
                    </div>
                    <label for="">ยืนยันรหัสผ่าน (Confirm-Password) <span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="confirm-password" class="form-control style-form" placeholder="กรุณากรอกรหัสผ่าน" aria-label="confirm-password" aria-describedby="basic-addon1" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล!!
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-12 text-right">
                            <button type="submit" name="submit" id="submit" class="btn btn-blue">สมัครสมาชิก <i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                    </div>

                </div>
                <div class="col-md-1"></div>
            </div>
        </form>
    </div>
</body>

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

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
                        console.log(form.checkValidity())
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script>
    //Function ในการแสดงรูปภาพกตัวอย่าง
    function readURL(input) {
        var reader = new FileReader();

        reader.onload = function(e) {

            // เรียกใช้ id ชื่อ imgUpload และเพิ่ม Attribute ชื่อ src
            $('#imgUpload').attr('src', e.target.result).width(250)
        }

        reader.readAsDataURL(input.files[0]);
    }
</script>
<style>
    #fileUpload {
        height: initial !important;
    }
</style>



<script>
    <?php if (isset($_SESSION['RegisterError'])) { ?>

        // evt.preventDefault();
        Swal.fire({
            title: 'Error!',
            text: '<?= $_SESSION['RegisterError'] ?>',
            icon: 'error',
            confirmButtonText: 'ตกลง'
        })
    <?php
        // session_destroy($_SESSION['RegisterError']);
        $_SESSION['RegisterError'] = NULL;
    } ?>
</script>

<script>
    <?php if (isset($_SESSION['Success'])) { ?>

        Swal.fire({
            icon: 'success',
            title: 'สมัครสมาชิกสำเร็จ',
            showConfirmButton: false,
            timer: 1500
        })

    <?php } ?>
</script>

<!-- Script ปฏิทินภาษาไทย -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../assets/script/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
    $(function() {

        $.datetimepicker.setLocale('th'); // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.

        // กรณีใช้แบบ inline
        $("#testdate4").datetimepicker({
            timepicker: false,
            format: 'd-m-Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
            lang: 'th', // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
            inline: true
        });


        // กรณีใช้แบบ input
        $("#testdate5").datetimepicker({
            timepicker: false,
            format: 'd-m-Y', // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
            lang: 'th', // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
            onSelectDate: function(dp, $input) {
                var yearT = new Date(dp).getFullYear() - 0;
                var yearTH = yearT + 543;
                var fulldate = $input.val();
                var fulldateTH = fulldate.replace(yearT, yearTH);
                $input.val(fulldateTH);
            },
        });

        // กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
        $("#testdate5").on("mouseenter mouseleave", function(e) {
            var dateValue = $(this).val();
            if (dateValue != "") {
                var arr_date = dateValue.split("-"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
                // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
                //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0 
                if (e.type == "mouseenter") {
                    var yearT = arr_date[2] - 543;
                }
                if (e.type == "mouseleave") {
                    var yearT = parseInt(arr_date[2]) + 543;
                }
                dateValue = dateValue.replace(arr_date[2], yearT);
                $(this).val(dateValue);
            }
        });


    });
</script>




</html>