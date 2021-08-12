<?php require_once('../authen_frontend.php'); ?>

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
        <div class="container-fulid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <img src="../assets/img/img-Profile.jpg" class="img-fulid cover" width="100%" height="500px" alt="">
                </div>
                <div class="col-12 col-lg-12">
                    <img src="../assets/img/Avatar.png" class="img-fulid avatar" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="name-profile text-center">
        <h1 class="font-weight-bold text-pink text-name-profile"><strong>คุณปรมินทร์ เหลืองอมรศักดิ์</strong></h1>

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
                                            <input type="password" class="form-control" placeholder="กรุณากรอกรหัสผ่านเดิม">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>รหัสผ่านใหม่</strong></label>
                                            <input type="password" class="form-control" placeholder="กรุณากรอกรหัสผ่านใหม่">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>ยืนยันรหัสผ่าน</strong></label>
                                            <input type="password" class="form-control" placeholder="กรุณายืนยันรหัสผ่าน">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-success btn-block">แก้ไขรหัสผ่าน</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include_once('../include/footer.php') ?>



    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

</body>

</html>