<?php
include_once('../authen_backend.php');
$sql = "SELECT * FROM `place` WHERE place_id = '" . $_GET['id'] . "' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if ($row['activitie'] == 'null') {
    $arrActivity[0] = 'ไม่พบข้อมูล';
} else {
    $arrActivity = explode(',', $row['activitie']);
}

if ($row['target'] == 'null') {
    $arrTarget[0] = 'ไม่พบข้อมูล';
} else {
    $arrTarget = explode(',', $row['target']);
}

$arrTimes = explode(',', $row['times']);



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
                            <h1 class="m-0"><strong>ข้อมูลสถานที่: <?php echo $row['place_name'] ?></strong></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">ข้อมูลสถานที่ท่องเที่ยวทั้งหมด</a></li>
                                <li class="breadcrumb-item active">ข้อมูลสถานที่: <?php echo $row['place_name'] ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            ข้อมูลสถานที่ท่องเที่ยว
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="<?php echo $row['picture'] ?>" width="100%" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <h1><strong><?php echo $row['place_name'] ?></strong> </h1>
                                    <hr>
                                    <h3>ข้อมูลสถานที่ตั้ง</h3>
                                    <p><?php echo $row['address'] . ' <b>ตำบล</b> ' . $row['sub_district'] . ' <b>อำเภอ</b> ' . $row['district'] . ' <b>จังหวัด</b> ' . $row['province'] . ' <b>รหัสไปรษณีย์</b> ' . $row['postcode'] ?></p>
                                    <hr>
                                    <h6><strong>ประเภทสถานที่ท่องเที่ยว</strong></h6>
                                    <span class="badge badge-pill badge-primary"><?php echo $row['category'] ?></span>
                                    <h6><strong>กิจกรรม</strong></h6>
                                    <?php
                                    foreach ($arrActivity as $activity) {
                                    ?>
                                        <span class="badge badge-pill badge-primary"><?php echo $activity ?></span>
                                    <?php
                                    }
                                    ?>

                                    <h6><strong>เหมาะสำหรับ</strong></h6>
                                    <?php
                                    foreach ($arrTarget as $target) {
                                    ?>
                                        <span class="badge badge-pill badge-primary"><?php echo $target ?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-lg-12">
                                    <hr>
                                    <h3>ข้อมูลรายละเอียด</h3>
                                    <p><?php echo str_replace('"', "", $row['Introduction']); ?></p>
                                    <p><?php echo str_replace('"', "", $row['detail']); ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <h3>ข้อมูลติดต่อ</h3>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>ช่องทางติดต่อ</th>
                                                <th>ข้อมูลติดต่อ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>เบอร์โทรศัพท์</td>
                                                <td> <?php echo $row['phones'] != null ? $row['phones'] : 'ไม่พบข้อมูล' ?></td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>เบอร์มือถือ</td>
                                                <td> <?php echo $row['mobiles'] != null ? $row['mobiles'] : 'ไม่พบข้อมูล' ?></td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>FAX</td>
                                                <td> <?php echo $row['fax'] != null ? $row['fax'] : 'ไม่พบข้อมูล' ?></td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>อีเมล์</td>
                                                <td>
                                                    <div style="word-wrap: break-word;"><?php echo $row['emails'] != null ? $row['emails'] : 'ไม่พบข้อมูล' ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td>เว็บไซต์</td>
                                                <td>
                                                    <?php if ($row['urls'] == 'null') { ?>
                                                        ไม่พบข้อมูล
                                                    <?php } else { ?>
                                                        <a style="word-wrap: break-word;" href="<?php echo 'https://' . $row['urls'] ?>" target="_blank"> <?php echo $row['urls'] ?></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <h3>เวลาทำการ</h3>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>วัน</th>
                                                <th>เวลา</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>จันทร์</td>
                                                <td><?php echo str_replace('จันทร์ - ', "", isset($arrTimes[0]) ? $arrTimes[0] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>อังคาร</td>
                                                <td><?php echo str_replace('อังคาร - ', "", isset($arrTimes[1]) ? $arrTimes[1] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>พุธ</td>
                                                <td><?php echo str_replace('พุธ - ', "", isset($arrTimes[2]) != '' ? $arrTimes[2] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>พฤหัสบดี</td>

                                                <td><?php echo str_replace('พฤหัสบดี - ', "", isset($arrTimes[3]) != '' ? $arrTimes[3] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>

                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td>ศุกร์</td>

                                                <td><?php echo str_replace('ศุกร์ - ', "", isset($arrTimes[4]) != '' ? $arrTimes[4] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>

                                            </tr>
                                            <tr>
                                                <td>6.</td>
                                                <td>เสาร์</td>
                                                <td><?php echo str_replace('เสาร์ - ', "", isset($arrTimes[5]) != '' ? $arrTimes[5] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>

                                            </tr>
                                            <tr>
                                                <td>7.</td>
                                                <td>อาทิตย์</td>
                                                <td><?php echo str_replace('อาทิตย์ - ', "", isset($arrTimes[6]) != '' ? $arrTimes[6] : 'ไม่ได้ระบุเวลาทำการ'); ?></td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12">
                                    <hr>
                                    <h6>อัพเดตล่าสุดเมื่อวันที่: <?php echo date_format(new DateTime($row['update_date']),'d/m/Y') ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>


        <?php include_once('../include/footer.php') ?>


        <?php include_once('../include/inc_js.php') ?>

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
    </div>


</body>

</html>