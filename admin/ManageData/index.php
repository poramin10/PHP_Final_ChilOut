<?php include_once('../authen_backend.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><strong>จัดการข้อมูลสถานที่ท่องเที่ยว</strong></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">จัดการข้อมูลสถานที่ท่องเที่ยว</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4>วันที่อัพเดตข้อมูลล่าสุด: 21/10/2564</h4>
                        </div>
                        <div class="col-lg-6">
                            <a href="./php_updateTravel.php" type="button" class="btn btn-primary float-right">อัพเดตข้อมูลเดิม</a>
                            <button type="button" class="btn btn-primary float-right mr-2">เพิ่มข้อมูล API</button>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div iv class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ประวัติการอัพเดตข้อมูล</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>หัวข้อ</th>
                                                <th>จำนวนข้อมูลสถานที่ท่องเที่ยว</th>
                                                <th>วัน/เดือน/ปี</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>เพิ่มข้อมูล</td>
                                                <td>เพิ่มข้อมูลสถานที่ท่องเที่ยวจำนวน 2990 แห่ง</td>
                                                <td>21/10/2564</td>
                                                <td><span class="badge badge-pill badge-success">ปกติ</span></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>อัพเดตข้อมูล</td>
                                                <td>อัพเดตข้อมูลสถานที่ท่องเที่ยวจำนวน 120 แห่ง</td>
                                                <td>22/10/2564</td>
                                                <td><span class="badge badge-pill badge-success">ปกติ</span></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>อัพเดตข้อมูล</td>
                                                <td>อัพเดตข้อมูลสถานที่ท่องเที่ยวจำนวน 10 แห่ง</td>
                                                <td>22/10/2564</td>
                                                <td><span class="badge badge-pill badge-danger">ผิดพลาด</span></td>
                                            </tr>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>หัวข้อ</th>
                                                <th>จำนวนข้อมูลสถานที่ท่องเที่ยว</th>
                                                <th>วัน/เดือน/ปี</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <?php include_once('../include/footer.php') ?>

        <?php include_once('../include/inc_js.php') ?>

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
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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