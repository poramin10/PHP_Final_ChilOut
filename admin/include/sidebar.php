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
          <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
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
                      <a href="../Member/index.php" class="nav-link <?php echo $name == 'Member' ? 'active' : '' ?>" >
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              ผู้ใช้งานทั้งหมด
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="travelUpdate.php" class="nav-link <?php echo $name == 'travelUpdate.php' ? 'active' : '' ?>" >

                          <i class="nav-icon fas fa-passport"></i>
                          <p>
                              จัดการข้อมูล
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="place.php" class="nav-link <?php echo $name == 'place.php' ? 'active' : '' ?>" >
                      <i class="nav-icon fas fa-globe"></i>
                          <p>
                              ข้อมูลสถานที่ท่องเที่ยวทั้งหมด
                          </p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="index.php" class="nav-link" >
                          <i class="nav-icon fas fa-pager"></i>
                          <p>
                              ระบบแนะนำ
                          </p>
                      </a>
                  </li>

                 
                  <li class="nav-item">

                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              ข้อมูลสถิติ
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>

                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="./index.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>สถานที่ท่องเที่ยวที่นิยม
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index2.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v2</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index3.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v3</p>
                              </a>
                          </li>
                      </ul>

                  </li>

              </ul>
          </nav>

      </div>
      <!-- /.sidebar -->
  </aside>