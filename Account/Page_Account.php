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
    <title>Profile</title>
    <!-- CSS -->
    <?php include_once('../include/inc_css_front.php') ?>
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
                            <?php if (isset($_SESSION['access_token'])) { ?>

                                <h3 class="text-center font-weight-bold">ไม่สามารถแก้ไขรหัสผ่านได้</h3>
                            <?php } else { ?>
                                <div class="card card-profile p-3 my-3">
                                    <form action="./php_update.php" method="POST" class="needs-validation" novalidate>
                                        <div class="row">
                                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><strong>ชื่อผู้ใช้งาน (Username)</strong></label>
                                                    <input type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><strong>รหัสผ่านเดิม</strong></label>
                                                    <input type="password" name="password" class="form-control" placeholder="กรุณากรอกรหัสผ่านเดิม" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกรหัสผ่านเดิม
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><strong>รหัสผ่านใหม่</strong></label>
                                                    <input type="password" name="passwordNew" class="form-control" placeholder="กรุณากรอกรหัสผ่านใหม่" required>
                                                    <div class="invalid-feedback">
                                                        กรุณากรอกรหัสผ่านใหม่
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><strong>ยืนยันรหัสผ่าน</strong></label>
                                                    <input type="password" name="confirm_passwordNew" class="form-control" placeholder="กรุณายืนยันรหัสผ่าน" required>
                                                    <div class="invalid-feedback">
                                                        กรุณายืนยันรหัสผ่าน
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" name="submit" class="btn btn-success btn-block">แก้ไขรหัสผ่าน</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            <?php } ?>
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