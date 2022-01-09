<?php
include_once('../authen_backend.php');
$sql = "SELECT * FROM `place` ORDER BY `place`.`province` ASC LIMIT 60";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Place</title>

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
                            <h3 class="card-title">ข้อมูลสถานที่ท่องเที่ยวทั้งหมด</h3>
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
                                                        <th>จังหวัด</th>
                                                        <th>ประเภท</th>
                                                        <th>สถานะการแนะนำ (ปิด/เปิด)</th>
                                                        <th>อัพเดตเมื่อวันที่</th>
                                                        <th>จัดการ</th>
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
                                                            <td><?php echo $row['id_place'] ?></td>
                                                            <td><?php echo $row['place_name'] ?></td>
                                                            <td><?php echo $row['province'] ?></td>
                                                            <td><?php echo $row['category'] ?></td>
                                                            <td>
                                                                <?php
                                                                $sql_select_pop = "SELECT * FROM `popular` WHERE id_place = '" . $row['id_place'] . "' ";
                                                                $result_select_pop = $conn->query($sql_select_pop);
                                                                ?>

                                                                <!-- <div class="form-group">
                                                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                                        <input onchange="SelectPopular('<?php echo $row['id_place'] ?>')" type="checkbox" class="custom-control-input" id="customSwitch<?php echo $num ?>" <?php echo $result_select_pop->num_rows == 1 ? 'checked' : ''; ?>>
                                                                        <label class="custom-control-label" for="customSwitch<?php echo $num ?>"></label>
                                                                    </div>
                                                                </div> -->
                                                                <input type="checkbox" <?php echo $result_select_pop->num_rows == 1 ? 'checked' : ''; ?> name="status_cat" onchange="SelectPopular('<?php echo $row['id_place'] ?>')" data-toggle="toggle" data-onstyle="success" data-on="เด่น" data-off="ไม่เด่น" data-style="ios">

                                                            </td>
                                                            <td><?php echo date_format(new DateTime($row['update_date']), 'd/m/Y H:i:s'); ?></td>
                                                            <td>
                                                                <a href="./data.php?id=<?php echo $row['id_place'] ?>" class="btn btn-primary mt-2">ดูข้อมูล</a>
                                                                <button onclick="DeleteDataTravel(
                                                                    '<?php echo $row['place_name'] ?>',
                                                                    '<?php echo $row['id_place'] ?>'
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
                                                        <th>จังหวัด</th>
                                                        <th>ประเภท</th>
                                                        <th>สถานะการแนะนำ (ปิด/เปิด)</th>
                                                        <th>อัพเดตเมื่อวันที่</th>
                                                        <th>จัดการ</th>
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

           <!-- bootstrap toggle select -->
           <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


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
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    "fnDrawCallback": function() {
                        $('.toggle-event').bootstrapToggle();
                    }
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>

        <!-- Script Modal ปุ่มลบ -->
        <script>
            function DeleteDataTravel(nameTravel, idTravel) {
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

        <script>
            function SelectPopular(id_place) {
                console.log(id_place);
                $.ajax({
                    type: "POST",
                    url: "./selectPopular.php",
                    data: {
                        dataPop: id_place
                    }
                }).done(function() {
                    // location.replace("recom_travel.php?category=ประเภททั้งหมด");
                });
            }
        </script>

     
    </div>


</body>

</html>