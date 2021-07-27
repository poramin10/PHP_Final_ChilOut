<?php if (isset($_SESSION['id_user'])) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-darkblue fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Travel in <span style="color:red">Th</span><span style="color:white">a</span><span style="color:blue">il</span><span style="color:white">a</span><span style="color:red">nd</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link active me-2" aria-current="page" href="#">หน้าหลัก</a>
                    <li class="nav-item">
                        <a class="nav-link  me-2" aria-current="page" href="#">แชทบอท</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-2" aria-current="page" href="#">ติดต่อ</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-split active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> คุณ<?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <center>
                                <img class="dropdown-item" style="width:150px ; height:150px" src="../assets/img/profile/<?php echo $_SESSION['profile'] ?>" alt="img-Profile">
                            </center>
                            <hr>
                            <a class="dropdown-item" href="#"><i class="fas fa-id-card"></i> ข้อมูลโปรไฟล์</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-atlas"></i> สถานที่ท่องเที่ยวที่แนะนำ</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                        </div>
                    </li>


                </ul>

            </div>
        </div>

    </nav>
<?php } else { ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-darkblue fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Travel in <span style="color:red">Th</span><span style="color:white">a</span><span style="color:blue">il</span><span style="color:white">a</span><span style="color:red">nd</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link active me-2" aria-current="page" href="#">หน้าหลัก</a>
                    <li class="nav-item">
                        <a class="nav-link  me-2" aria-current="page" href="#">แชทบอท</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-2" aria-current="page" href="#">ติดต่อ</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link active me-2 text-primary" aria-current="page" href="../Register/Page_FormRegister.php">สมัครสมาชิก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active me-2 text-success" aria-current="page" href="../Login/index.php">เข้าสู่ระบบ</a>
                    </li>
                </ul>

            </div>

        </div>

    </nav>

<?php } ?>