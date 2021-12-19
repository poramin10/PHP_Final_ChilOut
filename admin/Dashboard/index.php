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

            <div class="col-lg-12">
              <!-- Bar chart -->
              <div class="card card-primary card-outline" style="height: auto;">
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

                    <canvas id="chart-line" width="450" height="450" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>

                  </div>


                </div>

                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
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
                      <table class="table m-0">
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
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>

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
            text: 'ข้อมูลจำนวนประเภทสถานที่ท่องเที่ยว'
          }
        }
      });
    });
  </script>


</body>

</html>