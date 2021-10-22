<?php
include_once('./include/connectDB.php');
// $sql = "SELECT * FROM `place`";
// $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <?php include_once('./include/inc_css.php') ?>

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

        <?php include_once('./include/navbar.php') ?>

        <?php include_once('./include/sidebar.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><strong>ข้อมูลสถานที่ท่องเที่ยวทั้งหมด</strong></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                                <li class="breadcrumb-item active">ข้อมูลสถานที่ท่องเที่ยวทั้งหมด</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div iv class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ประวัติการอัพเดตข้อมูล</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รูปภาพ</th>
                                                    <th>ไอดีสถานที่ท่องเที่ยว</th>
                                                    <th>ชื่อสถานที่ท่องเที่ยว</th>
                                                    <th>ที่อยู่</th>
                                                    <th>ตำบล</th>
                                                    <th>อำเภอ</th>
                                                    <th>จังหวัด</th>
                                                    <th>postcode</th>

                                                    <th>ประเภท</th>
                                                    <th>กิจกรรม</th>
                                                    <th>กลุ่มเป้าหมาย</th>
                                                    <th>รายละเอียดคร่าวๆ</th>
                                                    <th>เนื้อหา</th>
                                                    <th>เบอร์ติดต่อ</th>
                                                    <th>เบอร์มือถือ</th>
                                                    <th>Fax</th>
                                                    <th>Email</th>
                                                    <th>URL</th>
                                                    <th>สถานะทำการ</th>
                                                    <th>เวลา</th>
                                                    <th>ที่จอดรถ</th>
                                                    <th>วิธีเดินทาง</th>
                                                    <th>อัพเดตเมื่อวันที่</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $num = 0;
                                                while ($row = $result->fetch_assoc()) {
                                                    $num++;

                                                    $arrActivity = explode(',', $row['activitie']);
                                                    $arrTarget = explode(',', $row['target']);

                                                ?>
                                                    <tr>
                                                        <td><?php echo $num ?></td>
                                                        <td><?php echo $row['place_id'] ?></td>
                                                        <td><img src="<?php echo $row['picture'] ?>" width="50px" height="50px" alt=""></td>
                                                        <td><?php echo $row['place_name'] ?></td>
                                                        <td><?php echo $row['address'] ?></td>
                                                        <td><?php echo $row['sub_district'] ?></td>
                                                        <td><?php echo $row['district'] ?></td>
                                                        <td><?php echo $row['province'] ?></td>
                                                        <td><?php echo $row['postcode'] ?></td>

                                                        <td><?php echo $row['category'] ?></td>

                                                        <td>
                                                            <?php for ($i = 0; $i < count($arrActivity); $i++) {
                                                            ?>
                                                                <span class="badge badge-primary"><?php echo $arrActivity[$i] != 'null' ? $arrActivity[$i] : 'ไม่พบข้อมูล' ?></span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php for ($i = 0; $i < count($arrTarget); $i++) {
                                                            ?>
                                                                <span class="badge badge-primary"><?php echo $arrTarget[$i] != 'null' ? $arrTarget[$i] : 'ไม่พบข้อมูล' ?></span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row['Introduction'] ?></td>
                                                        <td><?php echo $row['detail'] ?></td>
                                                        <td><?php echo $row['phones'] == null ? $row['phones'] : 'ไม่พบข้อมูล' ?></td>
                                                        <td><?php echo $row['mobiles'] == null ? $row['phones'] : 'ไม่พบข้อมูล' ?></td>
                                                        <td><?php echo $row['fax'] == null ? $row['phones'] : 'ไม่พบข้อมูล' ?></td>
                                                        <td><?php echo $row['emails'] == null ? $row['phones'] : 'ไม่พบข้อมูล' ?></td>
                                                        <td><?php echo $row['fax'] == null ? $row['phones'] : 'ไม่พบข้อมูล' ?></td>
                                                        <td>
                                                            <?php if($row['open_now'] == 'true'){ ?>
                                                                <span class="badge badge-success">เปิดทำการ</span>
                                                            <?php }else if($row['open_now'] == 'false'){ ?>
                                                                <span class="badge badge-danger">ปิดทำการ</span>
                                                            <?php }else{ ?>
                                                                <span class="badge badge-secondary">ไม่ระบุ</span>
                                                            <?php } ?>
                                                        </td>

                                                        <td><?php echo $row['times'] ?></td>

                                                        <td><?php echo $row['parking'] ?></td>

                                                        <td><?php echo $row['how_to_travel'] ?></td>
                                                        <td><?php echo date_format (new DateTime($row['update_date']), 'd/m/Y H:i:s'); ?></td>
                                                    </tr>
                                                <?php } ?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รูปภาพ</th>
                                                    <th>ไอดีสถานที่ท่องเที่ยว</th>
                                                    <th>ชื่อสถานที่ท่องเที่ยว</th>
                                                    <th>ที่อยู่</th>
                                                    <th>ตำบล</th>
                                                    <th>อำเภอ</th>
                                                    <th>จังหวัด</th>
                                                    <th>postcode</th>

                                                    <th>ประเภท</th>
                                                    <th>กิจกรรม</th>
                                                    <th>กลุ่มเป้าหมาย</th>
                                                    <th>รายละเอียดคร่าวๆ</th>
                                                    <th>เนื้อหา</th>

                                                    <th>เบอร์ติดต่อ</th>
                                                    <th>เบอร์มือถือ</th>
                                                    <th>Fax</th>
                                                    <th>Email</th>
                                                    <th>URL</th>
                                                    <th>สถานะทำการ</th>
                                                    <th>เวลา</th>
                                                    <th>ที่จอดรถ</th>
                                                    <th>วิธีเดินทาง</th>
                                                    <th>อัพเดตเมื่อวันที่</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section> -->
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0-rc
            </div>
        </footer>


        <?php include_once('./include/inc_js.php') ?>

        <!-- DataTables  & Plugins -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="plugins/jszip/jszip.min.js"></script>
        <script src="plugins/pdfmake/pdfmake.min.js"></script>
        <script src="plugins/pdfmake/vfs_fonts.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

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