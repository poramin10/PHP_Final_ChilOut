<?php
include_once('../authen_backend.php');
$sql = "SELECT * FROM `place` ORDER BY `place`.`province` ASC";
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

    <style type="text/css">
        #overlay {
            position: absolute;
            top: 0px;
            left: 0px;
            background: #ccc;
            width: 100%;
            height: 100%;
            opacity: .75;
            filter: alpha(opacity=75);
            -moz-opacity: .75;
            z-index: 999;
            background: #fff url(http://i.imgur.com/KUJoe.gif) 50% 50% no-repeat;
        }

        .main-contain {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include_once('../include/navbar.php') ?>

        <?php include_once('../include/sidebar.php') ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><strong>ข้อมูลสถานที่ท่องเที่ยวทั้งหมด</strong></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">ข้อมูลสถานที่ท่องเที่ยวทั้งหมด</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <!-- Load -->
                    <div id="overlay"></div>
                    <!-- Load -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ข้อมูลสมาชิกทั้งหมด</h3>
                        </div>
                        <div class="card-body">
                            <div class="main-contain">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ไอดีสถานที่ท่องเที่ยว</th>
                                                        <th>ชื่อสถานที่ท่องเที่ยว</th>
                                                        <th>ที่อยู่</th>
                                                        <th>ตำบล</th>
                                                        <th>อำเภอ</th>
                                                        <th>จังหวัด</th>
                                                        <th>postcode</th>
                                                        <th>ประเภท</th>
                                                        <th>อัพเดตเมื่อวันที่</th>
                                                        <th>คลิกดู</th>
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
                                                            <td><?php echo $row['place_id'] ?></td>
                                                            <td><?php echo $row['place_name'] ?></td>
                                                            <td><?php echo $row['address'] ?></td>
                                                            <td><?php echo $row['sub_district'] ?></td>
                                                            <td><?php echo $row['district'] ?></td>
                                                            <td><?php echo $row['province'] ?></td>
                                                            <td><?php echo $row['postcode'] ?></td>

                                                            <td><?php echo $row['category'] ?></td>
                                                            <td><?php echo date_format(new DateTime($row['update_date']), 'd/m/Y H:i:s'); ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-primary mt-2">ดูข้อมูล</a>
                                                                <button onclick="DeleteDataTravel(
                                                                    '<?php echo $row['place_name'] ?>',
                                                                    '<?php echo $row['place_id'] ?>'
                                                                )" class="btn btn-danger mt-2">ลบข้อมูล</button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ไอดีสถานที่ท่องเที่ยว</th>
                                                        <th>ชื่อสถานที่ท่องเที่ยว</th>
                                                        <th>ที่อยู่</th>
                                                        <th>ตำบล</th>
                                                        <th>อำเภอ</th>
                                                        <th>จังหวัด</th>
                                                        <th>postcode</th>
                                                        <th>ประเภท</th>
                                                        <th>อัพเดตเมื่อวันที่</th>
                                                        <th>คลิกดู</th>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>

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

        <!-- Ajax -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script type="text/javascript">
            $(function() {
                $("#overlay").fadeOut();
                $(".main-contain").removeClass("main-contain");
            });
        </script>

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

        <!-- Script Modal ปุ่มลบ -->
        <script>
            function DeleteDataTravel(nameTravel,idTravel) {
                Swal.fire({
                    title: `คุณต้องการลบ ${nameTravel} ใช่หรือไม่`,
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
                        window.location = `./php_deleteDataTravel.php?id=${idTravel}`;
                    }
                })
            }
        </script>
    </div>


</body>

</html>