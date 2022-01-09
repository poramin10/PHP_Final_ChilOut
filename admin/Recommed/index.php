<?php
include_once('../authen_backend.php');

// Member Status 1
$sql = "SELECT * FROM `recommed` JOIN user ON recommed.id_user = user.id_user;";
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
                                            <th>เชิงนิเวศ</th>
                                            <th>ศิลปะวิทยาการ</th>
                                            <th>ประวัติศาสตร์</th>
                                            <th>ธรรมชาติ</th>
                                            <th>นันทนาการ</th>
                                            <th>วัฒนธรรม</th>
                                            <th>น้ำพุร้อนธรรมชาติ</th>
                                            <th>ชายหาด</th>
                                            <th>น้ำตก</th>
                                            <th>ถ้ำ</th>
                                            <th>เกาะ</th>
                                            <th>แก่ง</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $num = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            if ($row['label-categories'] == 'eco') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวเชิงนิเวศ';
                                            }
                                            if ($row['label-categories'] == 'art science') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวทางศิลปะวิทยาการ';
                                            }
                                            if ($row['label-categories'] == 'history') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวทางประวัติศาสตร์';
                                            }
                                            if ($row['label-categories'] == 'nature') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวประเภทธรรมชาติ';
                                            }
                                            if ($row['label-categories'] == 'recreation') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวเพื่อนันทนาการ';
                                            }
                                            if ($row['label-categories'] == 'culture') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวทางวัฒนธรรม';
                                            }
                                            if ($row['label-categories'] == 'natural hot springs') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวเชิงสุขภาพน้ำพุร้อนธรรมชาติ';
                                            }
                                            if ($row['label-categories'] == 'beach') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวประเภทชายหาด';
                                            }
                                            if ($row['label-categories'] == 'waterfall') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวประเภทน้ำตก';
                                            }
                                            if ($row['label-categories'] == 'cave') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวประเภทถ้ำ';
                                            }
                                            if ($row['label-categories'] == 'island') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวประเภทเกาะ';
                                            }
                                            if ($row['label-categories'] == 'rapids') {
                                                $nameCategory = 'สถานที่ท่องเที่ยวประเภทแก่ง';
                                            }
                                            $num++;
                                        ?>
                                            <tr>
                                                <td><?php echo $num ?></td>
                                                <td><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                                <td>
                                                    <?php echo $nameCategory ?>
                                                </td>
                                                <td><?php echo $row['score_eco'] ?></td>
                                                <td><?php echo $row['score_art_science'] ?></td>
                                                <td><?php echo $row['score_history'] ?></td>
                                                <td><?php echo $row['score_nature'] ?></td>
                                                <td><?php echo $row['score_recreation'] ?></td>
                                                <td><?php echo $row['score_culture'] ?></td>
                                                <td><?php echo $row['score_natural_hot_springs'] ?></td>
                                                <td><?php echo $row['score_beach'] ?></td>
                                                <td><?php echo $row['score_waterfall'] ?></td>
                                                <td><?php echo $row['score_cave'] ?></td>
                                                <td><?php echo $row['score_island'] ?></td>
                                                <td><?php echo $row['score_rapids'] ?></td>


                                            </tr>
                                        <?php } ?>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>ประเภทที่ได้</th>
                                            <th>เชิงนิเวศ</th>
                                            <th>ศิลปะวิทยาการ</th>
                                            <th>ประวัติศาสตร์</th>
                                            <th>ธรรมชาติ</th>
                                            <th>นันทนาการ</th>
                                            <th>วัฒนธรรม</th>
                                            <th>น้ำพุร้อนธรรมชาติ</th>
                                            <th>ชายหาด</th>
                                            <th>น้ำตก</th>
                                            <th>ถ้ำ</th>
                                            <th>เกาะ</th>
                                            <th>แก่ง</th>

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