<?php
include_once('../authen_backend.php');

/**
 * User
 */

$sql_user = "SELECT COUNT(*) FROM `user` WHERE status <> 0";
$result_user = $conn->query($sql_user);
$row_user = $result_user->fetch_assoc();


$sql_place = "SELECT COUNT(*) FROM `place`;";
$result_place = $conn->query($sql_place);
$row_place = $result_place->fetch_assoc();

$sql_counter_travel = "SELECT SUM(count_travel) FROM `countertravel`";
$result_counter_travel = $conn->query($sql_counter_travel);
$row_counter_travel = $result_counter_travel->fetch_assoc();

$sql_category_all = "SELECT category , COUNT(category) FROM `place` GROUP BY category;";
$result_category_all = $conn->query($sql_category_all);
$result_category_all_2 = $conn->query($sql_category_all);
$result_category_all_3 = $conn->query($sql_category_all);



// กำหนดปี RegisstatUser
if (!isset($_SESSION['YearRegisUser'])) {
  $_SESSION['YearRegisUser'] = date('Y');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <?php include_once('../include/inc_css.php') ?>

  <style>
    .chartjs-render-monitor {
      display: block !important;
      width: auto !important;
      height: auto !important;
    }
  </style>

  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
              <h1 class="m-0"><strong>Dashboard</strong></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $row_user['COUNT(*)'] ?></h3>
                  <p>จำนวนสมาชิกทั้งหมด</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="../Member/index.php" class="small-box-footer">ดูข้อมูล <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $row_place['COUNT(*)'] ?></h3>
                  <p>จำนวนสถานที่ท่องเที่ยวทั้งหมด</p>
                </div>
                <div class="icon">
                  <i class="fas fa-passport"></i>
                </div>
                <a href="../DataPlace/index.php" class="small-box-footer">ดูข้อมูล <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $row_counter_travel['SUM(count_travel)'] ?></h3>

                  <p>ยอดผู้เข้าชมทั้งหมด</p>
                </div>
                <div class="icon">
                  <i class="fas fa-hiking"></i>
                </div>
                <a href="#" class="small-box-footer">ดูข้อมูล <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $result_category_all->num_rows ?></h3>
                  <p>ประเภทสถานที่ท่องเที่ยวทั้งหมด</p>
                </div>
                <div class="icon">
                  <i class="fas fa-archway"></i>
                </div>
                <a href="#" class="small-box-footer">ดูข้อมูล <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <!-- ===== ข้อมูลสถิติการแนะนำ ===== -->
            <div class="col-lg-6">
              <!-- ข้อมูลสถิติการแนะนำ -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">ข้อมูลสถิติการแนะนำ แบบทั้งประเทศ</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <!-- ===== ข้อมูลสถิติการแนะนำ ===== -->
            <div class="col-lg-6">
              <!-- ข้อมูลสถิติการแนะนำ -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">ข้อมูลสถิติการแนะนำ แบบภาคใต้</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-lg-12">
              <!-- solid sales graph -->
              <div class="card card-primary">
                <div class="card-header border-0">
                  <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    ข้อมูลการสมัครสมาชิกปี <?php echo $_SESSION['YearRegisUser'] ?>
                    <select class="form-control mt-2" id='selectRegisYear' onchange="SelectYearRegis()">
                      <?php
                      $sql_yearRegis_user = "SELECT YEAR(create_at) FROM `user` GROUP BY YEAR(create_at) ORDER BY YEAR(create_at) DESC;";
                      $result_yearRegis_user = $conn->query($sql_yearRegis_user);
                      ?>
                      <?php while ($row_yearRegis_user = $result_yearRegis_user->fetch_assoc()) { ?>
                        <option <?php echo $_SESSION['YearRegisUser'] == $row_yearRegis_user['YEAR(create_at)'] ? 'selected' : '' ?>><?php echo $row_yearRegis_user['YEAR(create_at)'] ?></option>
                      <?php } ?>
                    </select>
                  </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>

                </div>
                <div class="card-body">
                  <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card -->
            </div>

            <div class="col-lg-6">
              <!-- Bar chart -->
              <div class="card card-primary" style="height: auto;">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    ข้อมูลจำนวนสถานที่ประเภทสถานที่ท่องเที่ยวทั้งหมด
                  </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                      <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                      </div>
                    </div>

                    <canvas id="chart-line" width="600" height="450" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>

                  </div>


                </div>
              </div>

            </div>

            <div class="col-lg-6">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card card-primary">
                <div class="card-header border-transparent">
                  <h3 class="card-title">ชื่อประเภทตามลำดับตัวเลข</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ลำดับ</th>
                          <th>ชื่อประเภทสถานที่ท่องเที่ยว</th>
                          <th>จำนวนสถานที่</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $num = 0;
                        while ($row_category_all = $result_category_all_3->fetch_assoc()) {
                          $num++;
                        ?>
                          <tr>
                            <td><?php echo $num ?></td>
                            <td><?php echo $row_category_all['category'] ?></td>
                            <td><?php echo $row_category_all['COUNT(category)'] ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>ลำดับ</th>
                          <th>ชื่อประเภทสถานที่ท่องเที่ยว</th>
                          <th>จำนวนสถานที่</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
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

  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
  <script>
    $(document).ready(function() {
      //-------------
      //- DONUT CHART -
      //-------------
      <?php
      $sql_stat_recom = "SELECT `label-categories` , COUNT(`label-categories`) FROM `recommed` GROUP BY `label-categories`;";
      $result_stat_recom = $conn->query($sql_stat_recom);
      $result_stat_recom2 = $conn->query($sql_stat_recom);
      ?>
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        labels: [
          <?php while ($row_stat_recom = $result_stat_recom->fetch_assoc()) {
            if ($row_stat_recom['label-categories'] == 'eco') {
              $nameCategory = 'สถานที่ท่องเที่ยวเชิงนิเวศ';
            }
            if ($row_stat_recom['label-categories'] == 'art science') {
              $nameCategory = 'สถานที่ท่องเที่ยวทางศิลปะวิทยาการ';
            }
            if ($row_stat_recom['label-categories'] == 'history') {
              $nameCategory = 'สถานที่ท่องเที่ยวทางประวัติศาสตร์';
            }
            if ($row_stat_recom['label-categories'] == 'nature') {
              $nameCategory = 'สถานที่ท่องเที่ยวประเภทธรรมชาติ';
            }
            if ($row_stat_recom['label-categories'] == 'recreation') {
              $nameCategory = 'สถานที่ท่องเที่ยวเพื่อนันทนาการ';
            }
            if ($row_stat_recom['label-categories'] == 'culture') {
              $nameCategory = 'สถานที่ท่องเที่ยวทางวัฒนธรรม';
            }
            if ($row_stat_recom['label-categories'] == 'natural hot springs') {
              $nameCategory = 'สถานที่ท่องเที่ยวเชิงสุขภาพน้ำพุร้อนธรรมชาติ';
            }
            if ($row_stat_recom['label-categories'] == 'beach') {
              $nameCategory = 'สถานที่ท่องเที่ยวประเภทชายหาด';
            }
            if ($row_stat_recom['label-categories'] == 'waterfall') {
              $nameCategory = 'สถานที่ท่องเที่ยวประเภทน้ำตก';
            }
            if ($row_stat_recom['label-categories'] == 'cave') {
              $nameCategory = 'สถานที่ท่องเที่ยวประเภทถ้ำ';
            }
            if ($row_stat_recom['label-categories'] == 'island') {
              $nameCategory = 'สถานที่ท่องเที่ยวประเภทเกาะ';
            }
            if ($row_stat_recom['label-categories'] == 'rapids') {
              $nameCategory = 'สถานที่ท่องเที่ยวประเภทแก่ง';
            }
          ?>

            '<?php echo $nameCategory ?>',
          <?php } ?>
        ],
        datasets: [{

          data: [
            <?php while ($row_stat_recom = $result_stat_recom2->fetch_assoc()) { ?>
              <?php echo $row_stat_recom['COUNT(`label-categories`)'] ?>,
            <?php } ?>
          ],
          backgroundColor: [
            '#041562', 
            '#11468F', 
            '#DA1212', 
            '#4C3F91', 
            '#9145B6', 
            '#B958A5', 
            '#FF5677', 
            '#D22779', 
            '#24A19C', 
            '#6D9886', 
            '#D9CAB3'
          ],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      //-------------
      //- DONUT CHART -
      //-------------
      <?php
      $sql_stat_recom = "SELECT `label-categories` , COUNT(`label-categories`) FROM `recommed_south` GROUP BY `label-categories`;";
      $result_stat_recom = $conn->query($sql_stat_recom);
      $result_stat_recom2 = $conn->query($sql_stat_recom);
      ?>
      var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
      var donutData = {
        labels: [
          <?php while ($row_stat_recom = $result_stat_recom->fetch_assoc()) {
            if ($row_stat_recom['label-categories'] == 'temple') {
              $nameCategory = 'วัด';
            }
            if ($row_stat_recom['label-categories'] == 'museum') {
              $nameCategory = 'พิพิธภัณฑ์';
            }
            if ($row_stat_recom['label-categories'] == 'national park wildlife sanctuary') {
              $nameCategory = 'อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า';
            }
            if ($row_stat_recom['label-categories'] == 'landmarks and monuments') {
              $nameCategory = 'แลนด์มาร์กและอนุสรณ์สถาน';
            }
            if ($row_stat_recom['label-categories'] == 'waterfall') {
              $nameCategory = 'น้ำตก';
            }
            if ($row_stat_recom['label-categories'] == 'historical attractions and monuments') {
              $nameCategory = 'สถานที่ท่องเที่ยวเชิงประวัติศาสตร์และอนุสาวรีย์';
            }
            if ($row_stat_recom['label-categories'] == 'bay and beach') {
              $nameCategory = 'อ่าวและชายหาด';
            }
            if ($row_stat_recom['label-categories'] == 'islands') {
              $nameCategory = 'หมู่เกาะ';
            }
            if ($row_stat_recom['label-categories'] == 'cave') {
              $nameCategory = 'ถ้ำ';
            }
            if ($row_stat_recom['label-categories'] == 'zoo and aquarium') {
              $nameCategory = 'สวนสัตว์ และพิพิธภัณฑ์สัตว์น้ำ';
            }
            if ($row_stat_recom['label-categories'] == 'dive site') {
              $nameCategory = 'จุดดำน้ำ';
            }
          ?>

            '<?php echo $nameCategory ?>',
          <?php } ?>
        ],
        datasets: [{

          data: [
            <?php while ($row_stat_recom = $result_stat_recom2->fetch_assoc()) { ?>
              <?php echo $row_stat_recom['COUNT(`label-categories`)'] ?>,
            <?php } ?>
          ],
          backgroundColor: [
            '#041562', 
            '#11468F', 
            '#DA1212', 
            '#4C3F91', 
            '#9145B6', 
            '#B958A5', 
            '#FF5677', 
            '#D22779', 
            '#24A19C', 
            '#6D9886', 
            '#D9CAB3'
          ],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      new Chart(donutChartCanvas2, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      var ctx = $("#chart-line");
      var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [
            <?php
            $num = 0;
            while ($row_category_all = $result_category_all->fetch_assoc()) {
              $num++;
            ?>
              <?php echo $num ?>,
            <?php } ?>

          ],
          datasets: [{
            data: [
              <?php while ($row_category_all_2 = $result_category_all_2->fetch_assoc()) { ?>
                <?php echo $row_category_all_2['COUNT(category)'] ?>,
              <?php } ?>

            ],
            label: ["จำนวนประเภท"],
            borderColor: "#458af7",
            backgroundColor: '#458af7',
            fill: true
          }]
        },
        options: {
          title: {
            display: true,
            text: 'ข้อมูลจำนวนประเภทสถานที่ท่องเที่ยว',
          },
        }
      });
    });


    // Sales graph chart
    var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
    // $('#revenue-chart').get(0).getContext('2d');
    <?php

    $sql_user_stat = "SELECT create_at , MONTH(create_at) , COUNT(*) FROM `user` 
      WHERE YEAR(create_at) = '" . $_SESSION['YearRegisUser'] . "' GROUP BY create_at , MONTH(create_at);";
    $result_user_stat = $conn->query($sql_user_stat);

    ?>
    var salesGraphChartData = {

      labels: [
        'ม.ค',
        'ก.พ',
        'มี.ค',
        'เม.ย',
        'พ.ค',
        'มิ.ย',
        'ก.ค',
        'ก.ย',
        'ส.ค',
        'ต.ค',
        'พ.ย',
        'ธ.ค.',
      ],
      datasets: [{
        label: 'จำนวนผู้สมัครสมาชิก',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#007bff',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#007bff',
        pointBackgroundColor: '#007bff',
        data: [
          <?php
          for ($i = 1; $i <= 12; $i++) {
            $sql_checkRegis_user = "SELECT create_at ,  MONTH(create_at) FROM `user`  
                WHERE status <> 0 && YEAR(create_at) = '" . $_SESSION['YearRegisUser'] . "' AND MONTH(create_at) = '" . $i . "';";
            $result_checkRegis_user = $conn->query($sql_checkRegis_user);
            $row_checkRegis_user = $result_checkRegis_user->fetch_assoc();
          ?>
            <?php echo $result_checkRegis_user->num_rows != 0 ? $result_checkRegis_user->num_rows : 0 ?>,
          <?php } ?>
        ]
      }]
    }

    var salesGraphChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          ticks: {
            fontColor: '#6c757d',
          },
          gridLines: {
            display: false,
            color: '#DBDBDB',
            drawBorder: false
          }
        }],
        yAxes: [{
          ticks: {
            stepValue: 1,
            max: 20,
            fontColor: '#6c757d'
          },
          gridLines: {
            display: true,
            color: '#DBDBDB',
            drawBorder: false
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    // eslint-disable-next-line no-unused-vars
    var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
      type: 'line',
      data: salesGraphChartData,
      options: salesGraphChartOptions
    })
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
            "sFirst": "เริ่มต้น",
            "sPrevious": "ก่อนหน้า",
            "sNext": "ถัดไป",
            "sLast": "สุดท้าย"
          }
        },
        "fnDrawCallback": function() {
          $('.toggle-event').bootstrapToggle();
        }
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>

  <script>
    function SelectYearRegis() {
      let selectRegisYear = document.getElementById('selectRegisYear').value
      $.ajax({
        type: "POST",
        url: "./selectRegisYear.php",
        data: {
          dataSelectRegisYear: selectRegisYear
        }
      }).done(function() {
        location.replace("./index.php");
      });
    }
  </script>



</body>

</html>