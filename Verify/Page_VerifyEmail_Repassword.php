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

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/verify.css">

    <!-- Link SetUp Style -->
    <?php include_once('../LinkStyle.php') ?>


</head>

<body>
    <div class="container">

        <form action="./php_CheckEmail.php" method="POST">
            <div class="row">

                <div class="col-md-2"></div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify">
                    <a href="../Register/Page_FormRegister.php" type="button" class="btn btn-light btn-circle btn-lg"><i class="fas fa-chevron-left fa-"></i></a>
                </div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify2">

                    <div class="profile-img mt-4">
                        <img id="imgUpload" class="figure-img img-fluid rounded img-profile-cycle-email" src="../assets/img/pngEmail.png" alt="">
                    </div>

                    <h2 class="mt-2 mb-5 text-center"><b>ลืมรหัสผ่าน</b></h2>
                    <label for="">อีเมล์</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control style-form" placeholder="กรุณากรอกอีเมล์">
                    </div>
                    <div class="col-12 text-center mt-4 mb-2">
                        <button type="submit" name="submit" class="btn btn-primary form-control"> ส่งรหัสยืนยัน</button>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<!-- Sweet Alert -->
<?php include_once('../include/sweetAlert.php') ?>

<!-- Link SetUp SetUp -->
<?php include_once("../LinkScript.php") ?>

</html>