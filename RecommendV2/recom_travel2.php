<?php
require_once('../authen_frontend.php');

$Region = 'ภาคใต้';
$LabelTag = 'หมู่เกาะ';

$sql_region = "SELECT * FROM `geographies`  JOIN provinces ON geographies.id = provinces.geography_id 
    WHERE  geographies.name LIKE  '" . $Region . "';";
$result_region = $conn->query($sql_region);
$result_region2 = $conn->query($sql_region);
$result_region3 = $conn->query($sql_region);


$sql_place_rate = "SELECT  place.id_place , place.place_name , place.picture , place.province , AVG(ratestar) as ratestar FROM `comment_rating` 
                    JOIN place ON comment_rating.id_place = place.id_place WHERE place.category = '" . $LabelTag . "' AND ( ";
while ($row_region2 = $result_region2->fetch_assoc()) {
    $sql_place_rate .= "place.province = '" . $row_region2['name_th'] . "' ||";
}
$sql_place_rate = substr($sql_place_rate, 0, -2);
$sql_place_rate .= " ) GROUP BY place.id_place
                    ORDER BY ratestar DESC LIMIT 12;";
$result_place_rate = $conn->query($sql_place_rate);
$result_place_rate2 = $conn->query($sql_place_rate);
$countPlaceRate = 12 - $result_place_rate->num_rows;

if ($result_place_rate->num_rows <> 0) {


    $sql_place = "SELECT id_place , place_name , picture , province FROM `place`  
        WHERE category = '" . $LabelTag . "' AND ( ";
    while ($row_place_rate2 = $result_place_rate2->fetch_assoc()) {
        $sql_place .= " id_place <> '" . $row_place_rate2['id_place'] . "' &&";
    }

    $sql_place = substr($sql_place, 0, -2);

    $sql_place .= " ) AND ( ";

    while ($row_region3 = $result_region3->fetch_assoc()) {
        $sql_place .= "province = '" . $row_region3['name_th'] . "' ||";
    }
    $sql_place = substr($sql_place, 0, -2);
    $sql_place .= " ) LIMIT " . $countPlaceRate . " ";
    $result_place = $conn->query($sql_place);
    // echo $sql_place;
} else {
    $sql_place = "SELECT id_place , place_name , picture , province FROM `place`  
        WHERE category = '" . $LabelTag . "' AND ( ";
    while ($row_region3 = $result_region3->fetch_assoc()) {
        $sql_place .= "province = '" . $row_region3['name_th'] . "' ||";
    }
    $sql_place = substr($sql_place, 0, -2);
    $sql_place .= " ) LIMIT " . $countPlaceRate . " ";
    $result_place = $conn->query($sql_place);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=z, initial-scale=1.0">
    <title>RecomV2</title>
    <!-- CSS -->
    <?php include_once('../include/inc_css_front.php') ?>
</head>

<body style="height: 100%">

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <h1 class="text-center"><strong>12 อันดับสถานที่ท่องเที่ยวที่แนะนำ</strong></h1>
                <h1 class="text-center"><strong>สถานที่ท่องเที่ยวที่แนะนำคือประเภท: <span class="text-blue"><?php echo $LabelTag ?></strong> </span></h1>
                <h3 class="text-center"><strong>ภาคที่ท่านเลือกคือ: <span class="text-blue"><?php echo $Region ?></span> </strong></h3>
            </div>

            <div class="col-lg-12">
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="card-title">แผนภูมิแสดงคะแนนประเภทสถานที่ท่องเที่ยว</h3>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool float-right" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>
    </div>

    <!-- <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <select id="selectValue" name="province" onchange="test.submit();" class="form-control">
                    <option value="แสดงจังหวัดทั้งหมด">แสดงจังหวัดทั้งหมด</option>
                    <?php while ($row_region = $result_region->fetch_assoc()) { ?>
                        <option value="<?php echo $row_region['name_th'] ?>"><?php echo $row_region['name_th'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="row">

            <?php if ($result_place_rate->num_rows != 0 || $result_place->num_rows != 0) { ?>

                <?php while ($row_place_rate = $result_place_rate->fetch_assoc()) {
                    $sql_count = "SELECT * FROM `countertravel` WHERE id_place = '" . $row_place_rate['id_place'] . "' ";
                    $result_count = $conn->query($sql_count);
                    $row_count = $result_count->fetch_assoc();
                ?>
                    <div class="col-md-4 mt-3 mb-3">
                        <a href="../Travel/Detail.php?idTravel=<?php echo $row_place_rate['id_place']  ?>">
                            <section class="card-v2">
                                <div class="crop-zoom">
                                    <div class="card card-relative cardTop" style="border-radius: 8% ;">
                                        <div class="img-card" style=" border-radius: 8% ; background-image: url('<?php echo $row_place_rate['picture'] ?>'); width: 100%">
                                            <div class="card-color">
                                            </div>
                                        </div>
                                        <div class="card-text">
                                            <h5><?php echo $row_place_rate['place_name'] ?></h5>
                                            <p><?php echo $row_place_rate['province'] ?></p>
                                        </div>
                                        <div class="card-text-view">
                                            <small><i class="fas fa-eye"> </i> <?php echo $result_count->num_rows != 0 ? $row_count['count_travel'] : 0 ?> </small>
                                        </div>
                                        <div class="card-star">
                                            <div class="rating-comment-avg-card mt-2">
                                                <input <?php echo floor($row_place_rate['ratestar']) == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                                <label for="rating-comment-5"></label>
                                                <input <?php echo floor($row_place_rate['ratestar']) == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                                <label for="rating-comment-4"></label>
                                                <input <?php echo floor($row_place_rate['ratestar']) == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                                <label for="rating-comment-3"></label>
                                                <input <?php echo floor($row_place_rate['ratestar']) == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                                <label for="rating-comment-2"></label>
                                                <input <?php echo floor($row_place_rate['ratestar']) == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                                <label for="rating-comment-1"></label>
                                            </div>
                                            <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_place_rate['ratestar'], '1', '.', '') ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </a>

                    </div>
                <?php } ?>

                <?php if ($result_place->num_rows != 0) { ?>
                    <?php while ($row_place = $result_place->fetch_assoc()) {
                        $sql_count = "SELECT * FROM `countertravel` WHERE id_place = '" . $row_place['id_place'] . "' ";
                        $result_count = $conn->query($sql_count);
                        $row_count = $result_count->fetch_assoc();
                        $row_avg['ratestar'] = 0;
                        $sql_check = "SELECT * FROM `comment_rating` WHERE id_place = '" . $row_place['id_place'] . "' ";
                        $result_check = $conn->query($sql_check);
                    ?>
                        <div class="col-md-4 mt-3 mb-3">
                            <a href="../Travel/Detail.php?idTravel=<?php echo $row_place['id_place']  ?>">
                                <section class="card-v2">
                                    <div class="crop-zoom">
                                        <div class="card card-relative cardTop" style="border-radius: 8% ;">
                                            <div class="img-card" style=" border-radius: 8% ; background-image: url('<?php echo $row_place['picture'] ?>'); width: 100%">
                                                <div class="card-color">
                                                </div>
                                            </div>
                                            <div class="card-text">
                                                <h5><?php echo $row_place['place_name'] ?></h5>
                                                <p><?php echo $row_place['province'] ?></p>
                                            </div>
                                            <div class="card-text-view">
                                                <small><i class="fas fa-eye"> </i> <?php echo $result_count->num_rows != 0 ? $row_count['count_travel'] : 0 ?> </small>
                                            </div>
                                            <div class="card-star">
                                                <div class="rating-comment-avg-card mt-2">
                                                    <input <?php echo floor($row_avg['ratestar']) == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                                    <label for="rating-comment-5"></label>
                                                    <input <?php echo floor($row_avg['ratestar']) == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                                    <label for="rating-comment-4"></label>
                                                    <input <?php echo floor($row_avg['ratestar']) == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                                    <label for="rating-comment-3"></label>
                                                    <input <?php echo floor($row_avg['ratestar']) == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                                    <label for="rating-comment-2"></label>
                                                    <input <?php echo floor($row_avg['ratestar']) == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                                    <label for="rating-comment-1"></label>
                                                </div>
                                                <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['ratestar'], '1', '.', '') ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </a>

                        </div>
                    <?php
                    }
                    ?>
                <?php } ?>

            <?php } else { ?>
                <div class="col-lg-12">
                    <h3 class="text-center mt-3"><strong>ไม่พบข้อมูลสถานที่ท่องเที่ยวนี้</strong></h3>
                </div>
            <?php } ?>

        </div>
    </div>

    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>
    <?php   ?>

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- ChartJS -->
    <script src="../assets/lib/chart.js/Chart.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = {
                labels: [
                    'วัด',
                    'พิพิธภัณฑ์',
                    'น้ำตก',
                    'ประวัติศาสตร์',
                    'อุทยานแห่งชาติ',
                    'อ่าวและชายหาด',
                    'หมู่เกาะ',
                    'ดอยภูเขา',
                    'สวนสัตว์',
                    'ศูนย์ศิลปะและวัฒนธรรม',
                    'น้ำพุร้อน',
                    'สวนสนุก',
                ],
                datasets: [{
                        label: 'คะแนนจากการประมวลผล',
                        backgroundColor: '#124E96',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [
                            10,
                            5,
                            6,
                            7,
                            8,
                            4,
                            3,
                            2,
                            5,
                            8,
                            7,
                            0,
                            4,
                        ]
                    },

                ]
            }
            var temp0 = barChartData.datasets[0]


            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        })
    </script>

</body>

</html>