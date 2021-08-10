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
                            <ul class="list-group sticky-top pt-3">
                                <a href="../Profile/Page_Profile.php">
                                    <li class="list-group-item text-pink"> <i class="fas fa-address-card"></i> ข้อมูลโปรไฟล์</li>
                                </a>
                                <a href="../Account/Page_Account.php">
                                    <li class="list-group-item text-pink"><i class="fas fa-user-shield"></i> แก้ไขรหัสผ่าน</li>
                                </a>
                                <a href="./">
                                    <li class="list-group-item active " aria-current="true"><i class="fas fa-heart"></i> สถานที่ท่องเที่ยวที่ชื่นชอบ</li>
                                </a>
                                <a href="">
                                    <li class="list-group-item text-pink"><i class="fas fa-map-marked-alt"></i> แนะนำสถานที่ท่องเที่ยว</li>
                                </a>
                            </ul>
                        </div>

                        <div class="col-lg-9">
                            <div class="card card-profile p-3 my-3">

                                <div class="row p-2">
                                    <div class="row row-cols-1 row-cols-md-3">
                                        <div class="col mb-4">
                                            <div class="card h-100">
                                                <img src="https://images.unsplash.com/photo-1498598457418-36ef20772bb9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="...">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">ฟิวเจอร์พาร์ค</h5>
                                                    <hr>
                                                    <p class="card-text">จังหวัดปทุมธานี</p>
                                                    <button class="btn btn-primary btn-block">ดูข้อมูล</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-4">
                                            <div class="card h-100">
                                                <img src="https://images.unsplash.com/photo-1498598457418-36ef20772bb9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="...">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">ฟิวเจอร์พาร์ค</h5>
                                                    <hr>
                                                    <p class="card-text">จังหวัดปทุมธานี</p>
                                                    <button class="btn btn-primary btn-block">ดูข้อมูล</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-4">
                                            <div class="card h-100">
                                                <img src="https://images.unsplash.com/photo-1498598457418-36ef20772bb9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="...">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">ฟิวเจอร์พาร์ค</h5>
                                                    <hr>
                                                    <p class="card-text">จังหวัดปทุมธานี</p>
                                                    <button class="btn btn-primary btn-block">ดูข้อมูล</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-4">
                                            <div class="card h-100">
                                                <img src="https://images.unsplash.com/photo-1498598457418-36ef20772bb9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" class="card-img-top" alt="...">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">ฟิวเจอร์พาร์ค</h5>
                                                    <hr>
                                                    <p class="card-text">จังหวัดปทุมธานี</p>
                                                    <button class="btn btn-primary btn-block">ดูข้อมูล</button>
                                                </div>
                                            </div>
                                        </div>
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