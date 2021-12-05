<?php

include_once('../authen_backend.php');

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

    <!-- bootstrap toggle Select -->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <style>
        .toggle.btn {
            min-width: 5.7rem !important;
            min-height: 2.15rem;
        }

        .toggle-handle {
            background-color: #888888 !important;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <?php include_once('../include/sidebar.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><strong>จัดการประเภทสถานที่ท่องเที่ยว</strong></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">จัดการประเภทสถานที่ท่องเที่ยว</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <form action="php_insertcat.php" method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="name_cat" class="form-control" placeholder="กรอกข้อมูลประเภทสถานที่ท่องเที่ยว">

                                <div class="float-right mt-3" style="display:flex">
                                    <input type="checkbox" name="status_cat" data-toggle="toggle" data-onstyle="success" checked data-on="เปิด" data-off="ปิด" data-style="ios">
                                    <button type="submit" name="submit" class="btn btn-primary ml-2">เพิ่มข้อมูลประเภทสถานที่ท่องเที่ยว</button>
                                </div>

                            </div>
                        </div>
                    </form>

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
                                                <th>ชื่อประเภทสถานที่ท่องเที่ยว</th>
                                                <th>สถานะ</th>
                                                <th>วันที่สร้าง</th>
                                                <th>วันที่แก้ไข</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql = "SELECT * FROM `category` ";
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
                                                    <td><?php echo $row['name_cat'] ?></td>
                                                    <td>
                                                        <?php if ($row['status_cat'] == 'open') { ?>
                                                            <span class="badge badge-success">เปิด</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger">ปิด</span>
                                                        <?php } ?>
                                                    </td>

                                                    <td><?php echo date_format(new DateTime($row['created_at']), 'd/m/Y H:i:s') ?></td>
                                                    <td><?php echo date_format(new DateTime($row['updated_at']), 'd/m/Y H:i:s') ?></td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?php echo $row['id_cat']; ?>">แก้ไข</button>
                                                        <button onclick="DeleteData(<?php echo $row['id_cat'] ?>,'<?php echo $row['name_cat'] ?>')" class="btn btn-danger">ลบ</button>
                                                    </td>

                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="Modal<?php echo $row['id_cat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">
                                                                            ประเภท: <?php echo $row['name_cat'] ?>
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <form action="php_updatecat.php" method="POST">
                                                                        <div class="modal-body" id="form<?php echo $row['id_cat']; ?>">
                                                                            <input type="hidden" name="id_cat" value="<?php echo $row['id_cat'] ?>">
                                                                            <input type="hidden" name="status_cat" id="status_cat">

                                                                            <div class="form-group">
                                                                                <label for="recipient-name" class="col-form-label">ประเภทสถานที่ท่องเที่ยว</label>
                                                                                <input type="text" class="form-control" name="name_cat" value="<?php echo $row['name_cat'] ?>">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="status_cat"><strong>สถานะแสดง </strong></label> <br>
                                                                                <input type="checkbox" <?php echo $row['status_cat'] == 'open' ? 'checked' : ''; ?> name="status_cat" data-toggle="toggle" data-onstyle="success" data-on="เปิด" data-off="ปิด" data-style="ios" onchange="onSwitchStatus(this, '<?php echo $row['id_cat']; ?>')">
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                                            <button type="submit" name="submitUpdate" class="btn btn-primary">บันทึก</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                            <?php } ?>



                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อประเภทสถานที่ท่องเที่ยว</th>
                                                <th>สถานะ</th>
                                                <th>วันที่สร้าง</th>
                                                <th>วันที่แก้ไข</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

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

    <!-- bootstrap toggle select -->
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <!-- Script Modal ปุ่มลบ -->
    <script>
        function DeleteData(id_cat, name_cat) {
            Swal.fire({
                title: `ต้องการลบข้อมูล "${name_cat}" ใช่หรือไม่`,
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
                    window.location = `./php_deletecat.php?id=${id_cat}`;
                }
            })
        }
    </script>

    <!-- JS Edit -->
    <script>
        function onSwitchStatus(_this, id) {
            let str = '#form' + id + ' ' + '#status_cat' // $('#form1 #status_cat')
            $(str).attr('value', $(_this).is(':checked'))
        }
    </script>


</body>

</html>