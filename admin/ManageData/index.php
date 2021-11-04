<?php
include_once('../authen_backend.php');
$sql_date = "SELECT * FROM `history_update_place` ORDER BY `history_update_place`.`id_update_place` DESC";
$result_date = $conn->query($sql_date);
$row_date = $result_date->fetch_assoc();
?>
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
                            <?php if($result_date->num_rows != 0){ ?>
                                <h4>วันที่อัพเดตข้อมูลล่าสุด: <?php echo date_format(new DateTime($row_date['date_update_place']), 'd/m/Y H:i:s')  ?></h4>
                            <?php }else{ ?>
                                <h4>วันที่อัพเดตข้อมูลล่าสุด: ยังไม่มีวันที่ล่าสุด</h4>
                            <?php } ?>
                        </div>
                        <div class="col-lg-6">
                            <button onclick="DeleteData()" type="button" class="btn btn-primary float-right">ล้างข้อมูล</button>
                            <a href="./php_updateTravel.php" type="button" class="btn btn-primary float-right mr-2">อัพเดตข้อมูลเดิม</a>
                            <a href="./php_insertTravel.php" type="button" class="btn btn-primary float-right mr-2">เพิ่มข้อมูล API</a>
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
                                        <?php
                                        $sql = "SELECT * FROM `history_update_place`  ORDER BY `history_update_place`.`id_update_place` DESC";
                                        $result = $conn->query($sql);
                                        ?>
                                        <tbody>
                                            <?php
                                            $num = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                $num++;
                                            ?>

                                                <tr>
                                                    <td><?php echo $num ?></td>
                                                    <td><?php echo $row['title_update_place'] ?></td>
                                                    <td><?php echo $row['data_update_place'] ?></td>
                                                    <td><?php echo date_format(new DateTime($row['date_update_place']), 'd/m/Y H:i:s') ?></td>
                                                    <td>
                                                        <?php if ($row['status_update_place'] == 1) { ?>
                                                            <span class="badge badge-pill badge-success">ปกติ</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-pill badge-danger">ผิดปกติ</span>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                            <?php } ?>



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
    </div>

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

    <!-- Script Modal ปุ่มลบ -->
    <script>
        function DeleteData() {
            Swal.fire({
                title: `คุณต้องการล้างตารางใช่หรือไม่`,
                text: `หากกดยืนยันแล้ว จะไม่สามารถยกเลิกการเปลี่ยนแปลงได้`,
                icon: 'warning',
                cancelButtonColor: '#C21807',
                confirmButtonColor: '#28a745',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = `./php_deleteData.php`;
                }
            })
        }
    </script>




</body>

</html>