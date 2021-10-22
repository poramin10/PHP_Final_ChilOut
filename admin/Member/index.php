<?php
  include_once('../include/connectDB.php');
  $sql = "SELECT * FROM `user` WHERE status = 1";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <?php include_once('../include/inc_css.php') ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
  
  <?php include_once('../include/navbar.php') ?>

  <?php include_once('../include/sidebar.php') ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>ผู้ใช้งานทั้งหมด</strong></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">ผู้ใช้งานทั้งหมด</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="container-fluid">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ภาพโปรไฟล์</th>
                    <th>ชื่อจริง-นามสกุล</th>
                    <th>เพศ</th>
                    <th>วันที่สมัครสมาชิก</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 0;
                  while ($row = $result->fetch_assoc()) {
                    $num++;

                  ?>
                    <tr>
                      <td><?php echo $num ?></td>
                      <td><img src="../../assets/img/profile/<?php echo $row['profile'] ?>" width="50px" height="50px" alt=""></td>
                      <td><?php echo $row['firstname'].' '.$row['lastname'] ?></td>
                      <td><?php echo $row['gender'] ?></td>
                      <td><?php echo date_format(new DateTime($row['create_at']), 'd/m/Y H:i:s'); ?></td>
                    </tr>
                  <?php } ?>


                </tbody>
                <tfoot>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ภาพโปรไฟล์</th>
                    <th>ชื่อจริง-นามสกุล</th>
                    <th>เพศ</th>
                    <th>วันที่สมัครสมาชิก</th>
                  </tr>
                </tfoot>
              </table>
            </div>

          </div>
        </div>
      </section>

  </div>


  <?php include_once('../include/footer.php') ?>


  <?php include_once('../include/inc_js.php') ?>

</div>

</body>
</html>
