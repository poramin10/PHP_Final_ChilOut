<?php
include_once('../authen_backend.php');

// Member Status 1
$sql = "SELECT * FROM `recommed_south` JOIN user ON recommed_south.id_user = user.id_user;";
$result = $conn->query($sql);


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
                            <h1 class="m-0"><strong>ข้อมูลการแนะนำทั้งหมด</strong></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">ข้อมูลการแนะนำทั้งหมด</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

                    <div iv class="card">
                        <div class="card-header">
                            <h3 class="card-title">ข้อมูลการแนะนำทั้งหมด</h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>ประเภทที่ได้</th>
                                            <th>วัด</th>
                                            <th>พิพิธภัณฑ์</th>
                                            <th>อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า</th>
                                            <th>แลนด์มาร์กและอนุสรณ์สถาน</th>
                                            <th>น้ำตก</th>
                                            <th>สถานที่ท่องเที่ยวเชิงประวัติศาสตร์และอนุสาวรีย์</th>
                                            <th>อ่าวและชายหาด</th>
                                            <th>หมู่เกาะ</th>
                                            <th>ถ้ำ</th>
                                            <th>สวนสัตว์ และพิพิธภัณฑ์สัตว์น้ำ</th>
                                            <th>จุดดำน้ำ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $num = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            if ($row['label-categories'] == 'measure') {
                                                $nameCategory = 'วัด';
                                            }
                                            if ($row['label-categories'] == 'museum') {
                                                $nameCategory = 'พิพิธภัณฑ์';
                                            }
                                            if ($row['label-categories'] == 'national park wildlife sanctuary') {
                                                $nameCategory = 'อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า';
                                            }
                                            if ($row['label-categories'] == 'landmarks and monuments') {
                                                $nameCategory = 'แลนด์มาร์กและอนุสรณ์สถาน';
                                            }
                                            if ($row['label-categories'] == 'waterfall') {
                                                $nameCategory = 'น้ำตก';
                                            }
                                            if ($row['label-categories'] == 'historical attractions and monuments') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวเชิงประวัติศาสตร์และอนุสาวรีย์';
                                            }
                                            if ($row['label-categories'] == 'bay and beach') {
                                                $nameCategory = 'อ่าวและชายหาด';
                                            }
                                            if ($row['label-categories'] == 'islands') {
                                                $nameCategory = 'หมู่เกาะ';
                                            }
                                            if ($row['label-categories'] == 'cave') {
                                                $nameCategory = 'ถ้ำ';
                                            }
                                            if ($row['label-categories'] == 'zoo and aquarium') {
                                                $nameCategory = 'สวนสัตว์ และพิพิธภัณฑ์สัตว์น้ำ';
                                            }
                                            if ($row['label-categories'] == 'dive site') {
                                                $nameCategory = 'จุดดำน้ำ';
                                            }
                                            $num++;
                                        ?>
                                            <tr>
                                                <td><?php echo $num ?></td>
                                                <td><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                                <td>
                                                    <?php echo $nameCategory ?>
                                                </td>
                                                <td><?php echo $row['score_measure'] ?></td>
                                                <td><?php echo $row['score_museum'] ?></td>
                                                <td><?php echo $row['score_national_park'] ?></td>
                                                <td><?php echo $row['score_landmarks'] ?></td>
                                                <td><?php echo $row['score_waterfall'] ?></td>
                                                <td><?php echo $row['score_historical'] ?></td>
                                                <td><?php echo $row['score_beach'] ?></td>
                                                <td><?php echo $row['score_islands'] ?></td>
                                                <td><?php echo $row['score_cave'] ?></td>
                                                <td><?php echo $row['score_zoo'] ?></td>
                                                <td><?php echo $row['score_dive_site'] ?></td>
                                            </tr>
                                        <?php } ?>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>ประเภทที่ได้</th>
                                            <th>วัด</th>
                                            <th>พิพิธภัณฑ์</th>
                                            <th>อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า</th>
                                            <th>แลนด์มาร์กและอนุสรณ์สถาน</th>
                                            <th>น้ำตก</th>
                                            <th>สถานที่ท่องเที่ยวเชิงประวัติศาสตร์และอนุสาวรีย์</th>
                                            <th>อ่าวและชายหาด</th>
                                            <th>หมู่เกาะ</th>
                                            <th>ถ้ำ</th>
                                            <th>สวนสัตว์ และพิพิธภัณฑ์สัตว์น้ำ</th>
                                            <th>จุดดำน้ำ</th>

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