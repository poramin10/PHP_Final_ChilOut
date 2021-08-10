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
                            <ul class="list-group pt-3">
                                <a href="./"><li class="list-group-item active" aria-current="true"> <i class="fas fa-address-card"></i> ข้อมูลโปรไฟล์</li></a> 
                                <a href="../Account/Page_Account.php"><li class="list-group-item text-pink"><i class="fas fa-user-shield"></i> แก้ไขรหัสผ่าน</li></a> 
                                <a href=""><li class="list-group-item text-pink"><i class="fas fa-heart"></i> สถานที่ท่องเที่ยวที่ชื่นชอบ</li></a> 
                                <a href=""><li class="list-group-item text-pink"><i class="fas fa-map-marked-alt"></i> แนะนำสถานที่ท่องเที่ยว</li></a> 
                            </ul>
                        </div>

                        <div class="col-lg-9">
                            <div class="card card-profile p-3 my-3">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>ชื่อผู้ใช้งาน (Username)</strong></label>
                                            <input type="text" class="form-control" value="poraminZaZa" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>ชื่อจริง</strong></label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกชื่อจริง" value="ปรมินทร์">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>นามสกุล</strong></label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกนามสกุล" value="เหลืองอมรศักดิ์">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>เพศ</strong></label>
                                            <select id="inputState" class="form-control">
                                                <option selected>ชาย</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>วัน/เดือน/ปีเกิด</strong></label>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>อีเมล์</strong></label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกนามสกุล" value="poramin10@gmail.com" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>เบอร์โทร</strong></label>
                                            <input type="text" class="form-control" placeholder="กรุณากรอกเบอร์โทร" value="0859061736">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>อาชีพ</strong></label>
                                            <select id="inputState" class="form-control">
                                                <option selected>นักศึกษา</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><strong>รายได้</strong></label>
                                            <select id="inputState" class="form-control">
                                                <option selected>ไม่มี</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-success btn-block">แก้ไขข้อมูล</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

</body>

</html>