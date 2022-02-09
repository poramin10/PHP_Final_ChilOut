<?php
include_once('../authen_frontend.php');
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

    <!-- ปฏิทินภาษาไทย -->
    <link rel="stylesheet" href="../assets/script/jquery.datetimepicker.css">
</head>

<body>

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>


    <section class="profile-page">
        <img src="../assets/img/img-Profile.jpg" class="img-fulid cover" width="100%" height="500px" alt="">
        <?php if (isset($_SESSION['access_token'])) { ?>
            <img src="<?php echo $_SESSION['profile'] ?>" class="img-fulid avatar" alt="">
        <?php } else { ?>
            <img src="../assets/img/profile/<?php echo $_SESSION['profile'] ?>" class="img-fulid avatar" alt="">
        <?php } ?>
    </section>

    <section class="name-profile text-center">
        <h1 class="font-weight-bold text-blue text-name-profile"><strong><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></strong></h1>

    </section>

    <section class="data-profile">
        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-11"> 
                    <div class="row">
                        <div class="col-lg-3">
                            <?php include_once('../include/sideProfile.php') ?>
                        </div>

                        <div class="col-lg-9">
                            <div class="card card-profile p-3 my-3">


                                <form action="./php_update.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><strong>ชื่อผู้ใช้งาน (Username)</strong></label>
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><strong>ชื่อจริง</strong></label>
                                                <input type="text" name="firstname" class="form-control" placeholder="กรุณากรอกชื่อจริง" value="<?php echo $_SESSION['firstname'] ?>" required>
                                                <div class="invalid-feedback">
                                                    กรุณากรอกชื่อจริง
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><strong>นามสกุล</strong></label>
                                                <input type="text" name="lastname" class="form-control" placeholder="กรุณากรอกนามสกุล" value="<?php echo $_SESSION['lastname'] ?>" required>
                                                <div class="invalid-feedback">
                                                    กรุณากรอกนามสกุล
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><strong>เพศ</strong></label>
                                                <select id="inputState" name="gender" class="form-control">
                                                    <option <?php echo $_SESSION['gender'] == 'ไม่ระบุ' ? 'selected' : '' ?> value="ไม่ระบุ">ไม่ระบุ</option>
                                                    <option <?php echo $_SESSION['gender'] == 'ชาย' ? 'selected' : '' ?> value="ชาย">ชาย</option>
                                                    <option <?php echo $_SESSION['gender'] == 'หญิง' ? 'selected' : '' ?> value="หญิง">หญิง</option>
                                                    <option <?php echo $_SESSION['gender'] == 'LGBT' ? 'selected' : '' ?> value="LGBT">LGBT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><strong>วัน/เดือน/ปีเกิด</strong></label>
                                                <input id="testdate5" name="birthdate" value="<?php echo $_SESSION['birthdate'] ?>" class="form-control " required>
                                                <div class="invalid-feedback">
                                                    กรุณากรอกวันเดือนปีเกิด
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><strong>อีเมล์</strong></label>
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['email'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><strong>เบอร์โทร</strong></label>
                                                <input type="text" class="form-control" name="phone" placeholder="กรุณากรอกเบอร์โทร" value="<?php echo $_SESSION['phone'] ?>" >
                                              
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h4><strong>ภาพโปรไฟล์</strong></h4>
                                                <?php if (isset($_SESSION['access_token'])) { ?>
                                                    <div class="figure mx-auto">
                                                        <img id="imgUpload" class="figure-img img-fluid rounded" src="<?php echo $_SESSION['profile'] ?>" width="300px" height="300px" alt="">
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="figure mx-auto">
                                                        <img id="imgUpload" class="figure-img img-fluid rounded" src="../assets/img/profile/<?php echo $_SESSION['profile'] ?>" width="300px" height="300px" alt="">
                                                    </div>
                                                    <br>
                                                    <div class="file">
                                                        <input type="file" id="fileUpload" name="fileUpload" class="form-control" onchange="readURL(this)" multiple>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <?php if (isset($_SESSION['access_token'])) { ?>
                                                <button type="submit" name="submitFB" class="btn btn-success btn-block">แก้ไขข้อมูล</button>
                                            <?php } else { ?>
                                                <button type="submit" name="submit" class="btn btn-success btn-block">แก้ไขข้อมูล</button>
                                            <?php } ?>
                                        </div>


                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>


    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>


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

    <!-- Script รูปภาพโปรไฟล์ -->
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