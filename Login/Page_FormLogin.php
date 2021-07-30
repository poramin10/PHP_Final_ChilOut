<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <?php include_once('../include/inc_css_front.php') ?>



</head>
<style>
    .abcRioButtonBlue {
        height: 35px !important;
        width: 250px !important;
    }
</style>

<body>
    <div class="container">
        <form action="../Login/php_login.php" method="POST">

            <div class="row mt-5 justify-content-center align-item-center vh-50">
      
                <div class="col-md-4 col-sm-12 col-12 mt-5 mb-3 p-3 card-login">
                    <a href="../HomePage/index.php"><button type="button" class="btn btn-light btn-circle btn-lg"><i class="fas fa-chevron-left fa-"></i></button> </a>
                </div>

                <div class="col-md-4 col-sm-12 col-12 mt-5 mb-3 p-3 card-login2">
                    <div class="row text-right">
                        <div class="col-12">
                            คุณยังไม่ได้สมัครสมาชิก? <a href="../Register/Page_FormRegister.php"><button  href="../Register/Page_FormRegister.php" type="button" class="btn btn-outline-primary">สมัครสมาชิก</button> </a>
                        </div>
                    </div>
                    <h2 class="my-5 text-center"><b>เข้าสู่ระบบ</b></h2>
                    <label for="">ชื่อผู้ใช้งาน/อีเมล์ (Username/Email)</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control style-form" placeholder="กรุณากรอกชื่อผู้ใช้งาน" aria-label="phone" aria-describedby="basic-addon1">
                    </div>
                    <label for="">รหัสผ่าน (Password)</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control style-form" placeholder="กรุณากรอกรหัสผ่าน" aria-label="password" aria-describedby="basic-addon1">
                    </div>

                    <div class="col-12 text-center mt-4 mb-2">
                        <button type="submit" name="submit" class="btn btn-primary"> เข้าสู่ระบบ</button>
                    </div>

                    <div class="col-12 mb-5 text-center">
                        <a href="../Verify/Page_VerifyEmail_Repassword.php">ลืมรหัสผ่าน?</a>
                    </div>

                </div>
        </form>
    </div>
</body>


<!-- JS -->
<?php include_once('../include/inc_js_front.php') ?>

<!-- Sweet Alert -->
<?php include_once('../include/sweetAlert.php') ?>







</html>