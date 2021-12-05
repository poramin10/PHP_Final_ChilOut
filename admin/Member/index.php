<?php
include_once('../authen_backend.php');

// Member Status 1
$sql = "SELECT * FROM `user` WHERE status = 1";
$result = $conn->query($sql);

// Member Status 0
$sql_notMember = "SELECT count(*) FROM `user` WHERE status = 0";
$result_notMember = $conn->query($sql_notMember);
$row_notMember = $result_notMember->fetch_assoc();

$sql_Member = "SELECT count(*) FROM `user` WHERE status = 1";
$result_Member = $conn->query($sql_Member);
$row_Member = $result_Member->fetch_assoc();

$sql_Member_system = "SELECT count(*) FROM `user` WHERE status = 1 AND `register_by` = 'system' ";
$result_Member_system = $conn->query($sql_Member_system);
$row_Member_system = $result_Member_system->fetch_assoc();

$sql_Member_facebook = "SELECT count(*) FROM `user` WHERE status = 1 AND `register_by` = 'facebook' ";
$result_Member_facebook = $conn->query($sql_Member_facebook);
$row_Member_facebook = $result_Member_facebook->fetch_assoc();





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <?php include_once('../include/inc_css.php') ?>

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


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

          <div class="row">
            <div class="col-lg-2">

              <form action="php_deleteData.php" method="POST">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 class="card-title">ข้อมูลขยะ</h3>
                  </div>
                  <div class="card-body" style="text-align: center;">
                    <input type="text" class="knob" data-readonly="true" value="<?php echo $row_notMember['count(*)'] ?>" data-width="80" data-height="80" data-fgColor="#39CCCC">
                  </div>
                  <button type="submit" name="deleteData" class="btn btn-warning">ล้างข้อมูลขยะ</button>
                </div>
              </form>

            </div>
            
            <div class="col-lg-2 col-6">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">จำนวนสมาชิกทั้งหมด</h3>
                </div>
                <div class="card-body" style="text-align: center;">
                  <h1><strong><?php echo $row_Member['count(*)'] ?></strong></h1>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">เข้าสู่ระบบด้วย System</h3>
                </div>
                <div class="card-body" style="text-align: center;">
                  <h1><strong><?php echo $row_Member_system['count(*)'] ?></strong></h1>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">เข้าสู่ระบบด้วย Facebook</h3>
                </div>
                <div class="card-body" style="text-align: center;">
                  <h1><strong><?php echo $row_Member_facebook['count(*)'] ?></strong></h1>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">เข้าสู่ระบบด้วย Google+</h3>
                </div>
                <div class="card-body" style="text-align: center;">
                  <h1><strong><?php echo 0 ?></strong></h1>
                </div>
              </div>
            </div>

          </div>

          <div iv class="card">
            <div class="card-header">
              <h3 class="card-title">ข้อมูลสมาชิกทั้งหมด</h3>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ลำดับ</th>
                      <th>ภาพโปรไฟล์</th>
                      <th>ชื่อจริง-นามสกุล</th>
                      <th>เพศ</th>
                      <th>วิธีการสมัคร</th>
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
                        <?php if ($row['register_by'] == 'facebook') { ?>
                          <td><img src="<?php echo $row['profile'] ?>" width="50px" height="50px" alt=""></td>
                        <?php } else { ?>
                          <td><img src="../../assets/img/profile/<?php echo $row['profile'] ?>" width="50px" height="50px" alt=""></td>

                        <?php } ?>
                        <td><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['register_by'] ?></td>
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
                      <th>วิธีการสมัคร</th>
                      <th>วันที่สมัครสมาชิก</th>
                    </tr>
                  </tfoot>
                </table>
              </div>

            </div>
          </div>

        </div>
      </section>

    </div>


    <?php include_once('../include/footer.php') ?>


    <?php include_once('../include/inc_js.php') ?>

    <!-- ScriptSweetAlert -->
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>


    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          "language": {
            "sProcessing": "รอดำเนินการ...",
            "sLengthMenu": "แสดง_MENU_ แถว",
            "sZeroRecords": "ไม่พบข้อมูล",
            "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
            "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
            "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
            "sInfoPostFix": "",
            "sSearch": "ค้นหา:",
            "sUrl": "",
            "oPaginate": {
              "sFirst": "เิริ่มต้น",
              "sPrevious": "ก่อนหน้า",
              "sNext": "ถัดไป",
              "sLast": "สุดท้าย"
            }
          }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,

        });

      });
    </script>

  </div>

</body>

</html>