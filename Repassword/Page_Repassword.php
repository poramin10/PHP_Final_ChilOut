<?php
session_start();
include_once('../database/connectDB.php');


if ($_SESSION['CheckVerify'] == false) {
    header('location: ../HomePage/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>


</head>

<body>
    <div class="container">

        <form action="./php_EditPassword.php" method="POST" class="needs-validation" novalidate>
            <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>" class="form-control style-form">

            <div class="row">

                <div class="col-md-2"></div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify">
                    <a href="./Page_SendEmail.php" type="button" class="btn btn-light btn-circle btn-lg"><i class="fas fa-chevron-left fa-"></i></a>
                </div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify2">

                    <div class="mt-4 text-center">
                        <img id="imgUpload" class="figure-img img-fluid rounded img-profile-cycle-email" src="../assets/img/key.png" width="150px" alt="">
                    </div>

                    <h2 class="mt-2 mb-5 text-center"><b>แก้ไขรหัสผ่าน</b></h2>
                    <label for="">รหัสผ่าน</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control style-form" placeholder="กรุณากรอกรหัสผ่าน" required>
                        <div class="invalid-feedback">
                            กรุณากรอกรหัสผ่าน
                        </div>
                    </div>
                    <label for="">ยืนยันรหัสผ่าน</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="verify_password" class="form-control style-form" placeholder="กรุณากรอกยืนยันรหัสผ่าน" required>
                        <div class="invalid-feedback">
                            กรุณากรอกยืนยันรหัสผ่าน
                        </div>
                    </div>

                    <div class="col-12 text-center mt-4 mb-2">
                        <button type="submit" name="submit" class="btn btn-primary form-control">แก้ไขรหัสผ่าน</button>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

        </form>
    </div>
    <!-- Link -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>


    <!-- Script Validate -->
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