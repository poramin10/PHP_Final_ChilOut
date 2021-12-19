<?php
// หาที่อยู่ที่แน่นอนของ Navbar 
$uri = $_SERVER['REQUEST_URI'];
//แยก String เป็น Array โดยพารามิเตอร์แรกคือตัวที่จะตัด ส่วนพารามิเตอร์ 2 คือข้อมูลที่นำมาตัด
$array = explode('/', $uri);
$key = array_search("pages", $array);
$name = $array[$key + 3]; //เพื่อหาที่อยู่ที่แน่นอน

?>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../../assets/img/LOGOv2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/profile/<?php echo $_SESSION['profile_admin'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="../ProfileAdmin/" class="d-block"><?php echo $_SESSION['firstname_admin'] . ' ' . $_SESSION['lastname_admin'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../Dashboard/index.php" class="nav-link <?php echo $name == 'Dashboard' ? 'active' : '' ?> ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../Member/index.php" class="nav-link <?php echo $name == 'Member' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            ผู้ใช้งานทั้งหมด
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../ManageData/index.php" class="nav-link <?php echo $name == 'ManageData' ? 'active' : '' ?>">

                        <i class="nav-icon fas fa-passport"></i>
                        <p>
                            จัดการข้อมูล
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../DataPlace/index.php" class="nav-link <?php echo $name == 'DataPlace' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            ข้อมูลสถานที่ท่องเที่ยวทั้งหมด
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../ManageCategory/index.php" class="nav-link <?php echo $name == 'ManageCategory' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-pager"></i>
                        <p>
                            จัดการประเภทสถานที่ท่องเที่ยว
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-pager"></i>
                        <p>
                            ระบบแนะนำ
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link 
                    <?php echo $name == 'RatingPlace' ? 'active' : '' ||
                               $name == 'ViewPlace' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            ข้อมูลสถิติ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../RatingPlace/index.php" class="nav-link <?php echo $name == 'RatingPlace' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><small>คะแนนรีวิวสถานที่</small>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../ViewPlace/index.php" class="nav-link <?php echo $name == 'ViewPlace' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><small>จำนวนยอดผู้เข้าชมสถานที่</small>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="../Login/php_logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            ออกจากระบบ
                        </p>
                    </a>
                </li>


            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>