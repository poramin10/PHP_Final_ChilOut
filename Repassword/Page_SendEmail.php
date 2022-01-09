<?php
session_start();
include_once('../database/connectDB.php');
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

        <form action="./php_CheckEmail.php" method="POST">
            <div class="row">

                <div class="col-md-2"></div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify-2">
                    <a href="../Login/Page_FormLogin.php" type="button" class="btn btn-light btn-circle btn-lg"><i class="fas fa-chevron-left fa-"></i></a>
                </div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify2-2">

                    <div class="mt-4 text-center">
                        <img id="imgUpload" class="figure-img img-fluid rounded img-profile-cycle-email" src="../assets/img/gmail.png" width="150px" alt="">
                    </div>

                    <h2 class="mt-2 mb-3 text-center"><b>ลืมรหัสผ่าน</b></h2>
                    <label for="">อีเมล์</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control style-form" placeholder="กรุณากรอกอีเมล์">
                    </div>
                    <div class="col-12 text-center mt-4 mb-2">
                        <button type="submit" name="submit" class="btn btn-blue form-control"> ส่งรหัสยืนยัน</button>
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

</body>


</html>