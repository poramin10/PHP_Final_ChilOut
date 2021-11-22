<?php
session_start();
require './fb-init.php';

if (isset($_SESSION['access_token'])) {
    header('Location: ../HomePage/index.php');
}

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

    .g-recaptcha {
        transform-origin: left top;
        -webkit-transform-origin: left top;
    }
</style>

<body>
    <div class="container">

        <form action="../Login/php_login.php" method="POST">
            <div class="row mt-5 justify-content-center align-item-center vh-50">

                <!-- Back -->
                <div class="col-md-5 col-lg-4 col-sm-12 col-12 mt-4 mb-3 p-3 card-login">
                    <a href="../HomePage/index.php"><button type="button" class="btn btn-light btn-circle btn-lg"><i class="fas fa-chevron-left fa-"></i></button> </a>
                </div>

                <div class="col-md-5 col-lg-4 col-sm-12 col-12 mt-4 mb-3 p-3 card-login2">
                    <div class="row text-right">
                        <div class="col-12">
                            คุณยังไม่ได้สมัครสมาชิก? <a href="../Register/Page_FormRegister.php"><button href="../Register/Page_FormRegister.php" type="button" class="btn btn-outline-blue">สมัครสมาชิก</button> </a>
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

                    <div class="mt-3">
                        <div class="g-recaptcha" data-callback="recapCallback" data-sitekey="6LfcC7scAAAAAP-bVlmuVMpg7uBaERxhQ44iTyAE"></div>
                    </div>


                    <div class="col-12 text-center mt-4 mb-2">
                        <button type="submit" name="submit" id="btn-submit" class="btn btn-blue btn-block" disabled> เข้าสู่ระบบ</button>
                    </div>

                    <div class="col-12 mb-2 text-center">
                        <a href="../Repassword/Page_SendEmail.php">ลืมรหัสผ่าน?</a>
                    </div>

                    <div class="btn-facebook">
                        <a href="<?php echo $login_url ?>" class="btn btn-outline-primary btn-block"><span class="float-left"><i class="fab fa-facebook-f"></i></span> Facebook</a>
                    </div>
                </div>

        </form>

    </div>
</body>


<!-- JS -->
<?php include_once('../include/inc_js_front.php') ?>

<!-- Sweet Alert -->
<?php include_once('../include/sweetAlert.php') ?>

<!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Responsive Recaptcha -->
<script>
    function scaleCaptcha(elementWidth) {
        var reCaptchaWidth = 304;

        var containerWidth = $('.container').width();


        if (reCaptchaWidth > containerWidth) {

            var captchaScale = containerWidth / reCaptchaWidth;

            $('.g-recaptcha').css({
                'transform': 'scale(' + captchaScale + ')'
            });
        }
    }

    $(function() {
        scaleCaptcha();
        $(window).resize($.throttle(100, scaleCaptcha));

    });
</script>

<!-- Recaptcha CallBack -->
<script>
    function recapCallback() {
        $('#btn-submit').removeAttr('disabled')
    }
</script>



</html>