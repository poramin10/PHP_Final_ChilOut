<?php 
include_once('../authen_backend.php');

$sql = "SELECT * FROM `admin` WHERE id_admin = '".$_SESSION['id_admin']."' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

    <?php include_once('../include/inc_css.php') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include_once('../include/navbar.php') ?>

        <?php include_once('../include/sidebar.php') ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><strong>Profile</strong></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

                    <!-- แก้ไขข้อมูลประวัติ -->
                    <form action="./php_update.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">

                                    <h5 class="card-header">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                ข้อมูลประวัติ
                                                <span class="float-right"><small>แก้ไขเมื่อวันที่: <?php echo date_format(new DateTime($row['update_at']), 'd/m/Y H:i:s'); ?></small></span>

                                            </div>
                                        </div>
                                    </h5>

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-4 col-12 text-center">
                                                <div class="profile-fixed">
                                                    <div class="figure mx-auto">
                                                        <img id="imgUpload" class="figure-img img-fluid rounded" src="../dist/img/profile/<?php echo $_SESSION['profile_admin'] ?>" width="300px" height="300px" alt="">
                                                    </div>

                                                    <div class="file">
                                                        <input type="file" id="fileUpload" name="fileUpload" class="form-control" onchange="readURL(this)">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-8 col-12">


                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username: </label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['username_admin'] ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อจริง: </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="firstname" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['firstname_admin'] ?>" placeholder="ชื่อจริง" required>
                                                        <div class="invalid-feedback">
                                                            กรุณากรอกชื่อจริง
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">นามสกุล: </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="lastname" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['lastname_admin'] ?>" placeholder="นามสกุล" required>
                                                        <div class="invalid-feedback">
                                                            กรุณากรอกนามสกุล
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">เบอร์โทร: </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="phone" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['phone_admin'] ?>" placeholder="เบอร์โทร" required>
                                                        <div class="invalid-feedback">
                                                            กรุณากรอกเบอร์โทรศัพท์
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">อีเมล์: </label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control" id="inputEmail3" value="<?php echo $_SESSION['email_admin'] ?>" placeholder="อีเมล์" required>
                                                        <div class="invalid-feedback">
                                                            กรุณากรอกอีเมล์
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-12">
                                                <hr>
                                            </div>


                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">รหัสผ่านเก่า</label>
                                                    <input type="password" name="password-old" class="form-control" id="exampleInputEmail1" placeholder="รหัสผ่านเก่า">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">รหัสผ่านใหม่</label>
                                                    <input type="password" name="password-new" class="form-control" id="exampleInputEmail1" placeholder="รหัสผ่านใหม่">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mt-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">ยืนยันรหัสผ่านใหม่</label>
                                                    <input type="password" name="confirm_password" class="form-control" id="exampleInputEmail1" placeholder="ยืนยันรหัสผ่านใหม่">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <button name="submit" class="btn btn-success float-right">แก้ไขข้อมูล</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </section>

        </div>


        <?php include_once('../include/footer.php') ?>


        <?php include_once('../include/inc_js.php') ?>

        <!-- ScriptSweetAlert -->
        <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <!-- Sweet Alert -->
        <?php include_once('../include/sweetAlert.php') ?>

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

    </div>


</body>

</html>