<?php if (isset($_SESSION['id_user'])) { ?>

    <nav style="z-index: 1050">
        <div class="menu-icon">
            <i class="fa fa-bars fa-2x"></i>
        </div>
        <div class="logo">
            <img src="../assets/img/LOGOv2.png" width="40px" alt="">
        </div>
        <div class="menu">
            <ul>
                <li><a href="../HomePage/"><i class="fas fa-home"></i> หน้าหลัก</a></li>
                <li><a href="../Search/travelSearch.php"><i class="fas fa-search"></i> ค้นหาที่เที่ยว</a></li>
                <li><a href="../RecommendV2/page1.php"><i class="fas fa-passport"></i> ระบบแนะนำสถานที่ท่องเที่ยว (แบบใหม่)</a></li>
                <li><a href="../Recommend/page1.php"><i class="fas fa-passport"></i> ระบบแนะนำสถานที่ท่องเที่ยว (แบบเก่า)</a></li>
                <li><a href="#"><i class="fas fa-phone-alt"></i> ติดต่อ</a></li>
                <li>

                    <?php if (isset($_SESSION['access_token'])) { ?>
                        <img src="<?php echo $_SESSION['profile'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle dropup" width="50px" height="50px" style="border-radius: 100%" alt="">
                    <?php } else { ?>
                        <img src="../assets/img/profile/<?php echo $_SESSION['profile'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle dropup" width="50px" height="50px" style="border-radius: 100%" alt="">
                    <?php } ?>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../Profile/Page_Profile.php">ข้อมูลโปรไฟล์</a>
                        <a class="dropdown-item" href="../Recommend/page1.php">ระบบแนะนำสถานที่ท่องเที่ยว</a>
                        <a class="dropdown-item" href="../Login/php_logout.php">ออกจากระบบ</a>
                    </div>


                </li>

            </ul>
        </div>

    </nav>

<?php } else { ?>

    <nav style="z-index: 1050">
        <div class="menu-icon">
            <i class="fa fa-bars fa-2x"></i>
        </div>
        <div class="logo">
            <img src="../assets/img/LOGOv2.png" width="40px" alt="">
        </div>
        <div class="menu">
            <ul>
                <li><a href="../HomePage/"><i class="fas fa-home"></i> หน้าหลัก</a></li>
                <li><a href="../Search/travelSearch.php"><i class="fas fa-search"></i> ค้นหาที่เที่ยว</a></li>
                <li><a href="../RecommendV2/page1.php"><i class="fas fa-passport"></i> ระบบแนะนำสถานที่ท่องเที่ยว (แบบใหม่)</a></li>
                <li><a href="../Recommend/page1.php"><i class="fas fa-passport"></i> ระบบแนะนำสถานที่ท่องเที่ยว (แบบเก่า)</a></li>
                <li><a href="#"><i class="fas fa-phone-alt"></i> ติดต่อ</a></li>
                <li>
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            เข้าสู่ระบบ
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../Login/Page_FormLogin.php"><i class="fas fa-key"></i> เข้าสู่ระบบ</a>
                            <a class="dropdown-item" href="../Register/Page_FormRegister.php"><i class="fas fa-address-card"></i> สมัครสมาชิก</a>
                        </div>
                    </div>


                </li>

            </ul>
        </div>

    </nav>

<?php } ?>