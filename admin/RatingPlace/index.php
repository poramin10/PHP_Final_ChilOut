<?php
include_once('../authen_backend.php');

$sql_avg = "SELECT id_place , AVG(ratestar) FROM `comment_rating` GROUP BY id_place ORDER BY AVG(ratestar) DESC";
$result_avg = $conn->query($sql_avg);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rating</title>

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
                            <h1 class="m-0"><strong>คะแนนรีวิวสถานที่ท่องเที่ยว</strong></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">คะแนนรีวิวสถานที่ท่องเที่ยว</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">

                    <div iv class="card">
                        <div class="card-header">
                            <h3 class="card-title">คะแนนรีวิวสถานที่ท่องเที่ยว</h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อสถานที่ท่องเที่ยว</th>
                                            <th>จังหวัด</th>
                                            <th>คะแนนเฉลี่ย</th>
                                            <th>จำนวนดาว</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $num = 0;
                                        while ($row_avg = $result_avg->fetch_assoc()) {
                                            $num++;
                                            $sql_place = "SELECT * FROM `place` WHERE id_place = '".$row_avg['id_place']."';";
                                            $result_place = $conn->query($sql_place);
                                            $row_place = $result_place->fetch_assoc();

                                            $sql_count_comment = "SELECT COUNT(*) FROM `comment_rating` WHERE id_place = '".$row_avg['id_place']."' ;";
                                            $result_count_coment = $conn->query($sql_count_comment);
                                            $row_count_comment = $result_count_coment->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td><?php echo $num ?></td>
                                                <td><?php echo $row_place['place_name']  ?></td>
                                                <td><?php echo $row_place['province']  ?></td>
                                                <td><?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?>(<?php echo $row_count_comment['COUNT(*)'] ?>)</td>
                                                <td>
                                                    <div class="rating-comment">
                                                        <input <?php echo floor($row_avg['AVG(ratestar)']) == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                                        <label for="rating-comment-5"></label>
                                                        <input <?php echo floor($row_avg['AVG(ratestar)']) == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                                        <label for="rating-comment-4"></label>
                                                        <input <?php echo floor($row_avg['AVG(ratestar)']) == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                                        <label for="rating-comment-3"></label>
                                                        <input <?php echo floor($row_avg['AVG(ratestar)']) == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                                        <label for="rating-comment-2"></label>
                                                        <input <?php echo floor($row_avg['AVG(ratestar)']) == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                                        <label for="rating-comment-1"></label>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ชื่อสถานที่ท่องเที่ยว</th>
                                            <th>จังหวัด</th>
                                            <th>คะแนนเฉลี่ย</th>
                                            <th>จำนวนดาว</th>
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