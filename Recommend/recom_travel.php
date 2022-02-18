<?php require_once('../authen_frontend.php');

// if (!isset($_SESSION['id_user'])) {
//     header('location: ../Login/Page_FormLogin.php');
// }

// ประเภท
if (isset($_GET['category'])) {
    $category = $_GET['category'];
} else {
    $category = 'ประเภททั้งหมด';
}

/**
 * Recom category
 */

$num = 0;

foreach ($_SESSION['stat_recom'] as $category_name => $category_value) {

    if (max($_SESSION['stat_recom']) == $category_value) {

        if ($category_name == 'eco') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวเชิงนิเวศ";
            $arrCategoryNumber_Eng[$num] = 'eco';
            $num++;
        }
        if ($category_name == 'art science') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวทางศิลปะวิทยาการ";
            $arrCategoryNumber_Eng[$num] = 'art science';
            $num++;
        }
        if ($category_name == 'history') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวทางประวัติศาสตร์";
            $arrCategoryNumber_Eng[$num] = 'history';
            $num++;
        }
        if ($category_name == 'nature') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวประเภทธรรมชาติ";
            $arrCategoryNumber_Eng[$num] = 'nature';
            $num++;
        }
        if ($category_name == 'recreation') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวเพื่อนันทนาการ";
            $arrCategoryNumber_Eng[$num] = 'recreation';
            $num++;
        }
        if ($category_name == 'culture') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวทางวัฒนธรรม";
            $arrCategoryNumber_Eng[$num] = 'culture';
            $num++;
        }
        if ($category_name == 'natural hot springs') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวเชิงสุขภาพน้ำพุร้อนธรรมชาติ";
            $arrCategoryNumber_Eng[$num] = 'natural hot springs';
            $num++;
        }
        if ($category_name == 'beach') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวประเภทชายหาด";
            $arrCategoryNumber_Eng[$num] = 'beach';
            $num++;
        }
        if ($category_name == 'waterfall') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวประเภทน้ำตก";
            $arrCategoryNumber_Eng[$num] = 'waterfall';
            $num++;
        }
        if ($category_name == 'cave') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวประเภทถ้ำ";
            $arrCategoryNumber_Eng[$num] = 'cave';
            $num++;
        }
        if ($category_name == 'island') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวประเภทเกาะ";
            $arrCategoryNumber_Eng[$num] = 'island';
            $num++;
        }
        if ($category_name == 'rapids') {
            $arrCategoryNumber[$num] = "สถานที่ท่องเที่ยวประเภทแก่ง";
            $arrCategoryNumber_Eng[$num] = 'rapids';
            $num++;
        }
    }
}


/**
 * Main Lebel สถานที่ท่องเที่ยว
 */
if (isset($_SESSION['Travel_Recommend'])) {
    $place_recommend = $_SESSION['Travel_Recommend'];
}

if ($place_recommend == 'eco') {

    $nameCategory = 'สถานที่ท่องเที่ยวเชิงนิเวศ';
    $arrCategory = [
        "พิพิธภัณฑ์",
        "น้ำตก",
        "อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า",
        "อ่าวและชายหาด",
        "หมู่เกาะ",
        "สวนและสวนสาธารณะ",
        "เขื่อน พื้นที่อนุรักษ์ ทะเลสาบ",
        "ดอยและภูเขา",
        "แหล่งท่องเที่ยวทางธรรมชาติอื่นๆ",
        "สวนเพื่อการศึกษา",
        "สวนสัตว์ และพิพิธภัณฑ์สัตว์น้ำ",
        "โครงการหลวงและโครงการในพระราชดำริ",
        "ทุ่งดอกไม้",
        "จุดดำน้ำ",
        "ท่องเที่ยวเชิงอนุรักษ์",
    ];
}
if ($place_recommend == 'art science') {
    $nameCategory = 'สถานที่ท่องเที่ยวทางศิลปะวิทยาการ';
    $arrCategory = [
        "วัด",
        "พิพิธภัณฑ์",
        "แลนด์มาร์กและอนุสรณ์สถาน",
        "สถานที่เกี่ยวกับศาสนาอื่นๆ",
        "สถานที่ท่องเที่ยวเชิงประวัติศาสตร์และอนุสาวรีย์",
        "หมู่บ้าน ชุมชน",
        "โครงการหลวงและโครงการในพระราชดำริ",
        "ตลาดท้องถิ่น",
        "ตลาดน้ำ",
        "ศูนย์ศิลปะและวัฒนธรรม",
        "พระราชวัง",
        "วิถีชีวิต",
        "ศิลปะ วัฒนธรรม แหล่งมรดก และสถาปัตยกรรม",
    ];
}
if ($place_recommend == 'history') {
    $nameCategory = 'สถานที่ท่องเที่ยวทางประวัติศาสตร์';
    $arrCategory = [
        "วัด",
        "พิพิธภัณฑ์",
        "แลนด์มาร์กและอนุสรณ์สถาน",
        "สถานที่เกี่ยวกับศาสนาอื่นๆ",
        "สถานที่ท่องเที่ยวเชิงประวัติศาสตร์และอนุสาวรีย์",
        "โครงการหลวงและโครงการในพระราชดำริ",
        "พระราชวัง",
        "บ้านโบราณ",
        "แหล่งโบราณสถาน",
        "ศูนย์ศิลปะและวัฒนธรรม",
        "สถานที่ศักดิ์สิทธิ์",
        "ศิลปะ วัฒนธรรม แหล่งมรดก และสถาปัตยกรรม",
    ];
}
if ($place_recommend == 'nature') {
    $nameCategory = 'สถานที่ท่องเที่ยวประเภทธรรมชาติ';
    $arrCategory = [
        "น้ำตก",
        "อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า",
        "อ่าวและชายหาด",
        "หมู่เกาะ",
        "สวนและสวนสาธารณะ",
        "ดอยและภูเขา",
        "ถ้ำ",
        "แหล่งท่องเที่ยวทางธรรมชาติอื่นๆ",
        "สวนเพื่อการศึกษา",
        "สวนสัตว์ และพิพิธภัณฑ์สัตว์น้ำ",
        "กิจกรรมกลางแจ้ง และกิจกรรมผจญภัย",
        "ทุ่งดอกไม้",
        "จุดดำน้ำ",
        "น้ำพุร้อน",
    ];
}
if ($place_recommend == 'recreation') {
    $nameCategory = 'สถานที่ท่องเที่ยวเพื่อนันทนาการ';
    $arrCategory = [
        "พิพิธภัณฑ์",
        "แลนด์มาร์กและอนุสรณ์สถาน",
        "หมู่บ้าน ชุมชน",
        "สวนและสวนสาธารณะ",
        "ตลาดท้องถิ่น",
        "สวนเพื่อการศึกษา",
        "โครงการหลวงและโครงการในพระราชดำริ",
        "ช้อปปิ้ง",
        "ตลาดน้ำ",
        "กิจกรรมกลางแจ้ง และกิจกรรมผจญภัย",
        "พิพิธภัณฑ์เพื่อการศึกษา",
        "แคมป์สัตว์ และการแสดงสัตว์",
        "ศูนย์ศิลปะและวัฒนธรรม",
        "สวนสนุก",
        "โรงละคร",
        "ตลาดกลางคืน",

    ];
}
if ($place_recommend == 'culture') {
    $nameCategory = 'สถานที่ท่องเที่ยวทางวัฒนธรรม';
    $arrCategory = [
        "วัด",
        "พิพิธภัณฑ์",
        "แลนด์มาร์กและอนุสรณ์สถาน",
        "สถานที่เกี่ยวกับศาสนาอื่นๆ",
        "สถานที่ท่องเที่ยวเชิงประวัติศาสตร์และอนุสาวรีย์",
        "หมู่บ้าน ชุมชน",
        "ตลาดท้องถิ่น",
        "พระราชวัง",
        "แหล่งโบราณสถาน",
        "ศูนย์ศิลปะและวัฒนธรรม",
        "สถานที่ศักดิ์สิทธิ์",
        "มัสยิด",
        "ศิลปะ วัฒนธรรม แหล่งมรดก และสถาปัตยกรรม",
    ];
}
if ($place_recommend == 'natural hot springs') {
    $nameCategory = 'สถานที่ท่องเที่ยวเชิงสุขภาพน้ำพุร้อนธรรมชาติ';
    $arrCategory = [
        "อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า",
        "น้ำพุร้อน",
    ];
}
if ($place_recommend == 'beach') {
    $nameCategory = 'สถานที่ท่องเที่ยวประเภทชายหาด';
    $arrCategory = [
        "อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า",
        "อ่าวและชายหาด",
        "หมู่เกาะ",
        "จุดดำน้ำ"
    ];
}
if ($place_recommend == 'waterfall') {
    $nameCategory = 'สถานที่ท่องเที่ยวประเภทน้ำตก';
    $arrCategory = [
        "อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า",
        "น้ำตก",
    ];
}
if ($place_recommend == 'cave') {
    $nameCategory = 'สถานที่ท่องเที่ยวประเภทถ้ำ';
    $arrCategory = [
        "อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า",
        "ถ้ำ",
    ];
}
if ($place_recommend == 'island') {
    $nameCategory = 'สถานที่ท่องเที่ยวประเภทเกาะ';
    $arrCategory = [
        "หมู่เกาะ",
        "จุดดำน้ำ",
    ];
}
if ($place_recommend == 'rapids') {
    $nameCategory = 'สถานที่ท่องเที่ยวประเภทแก่ง';
    $arrCategory = [
        "อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า",
        "น้ำตก",
        "แม่น้ำลำคลอง",
        "แหล่งท่องเที่ยวทางธรรมชาติอื่นๆ",
        "อุทยานแห่งชาติ เขตรักษาพันธุ์สัตว์ป่า",
    ];
}

// DB ของจังหวัดในประเทศไทย
$sql = "SELECT * FROM `provinces` ORDER BY `name_th` ASC ";
$result = $conn->query($sql);
// จังหวัด
if (isset($_GET['province'])) {
    $province = $_GET['province'];
} else {
    $province = 'แสดงจังหวัดทั้งหมด';
}

// Pagination
require_once("./pagination_function.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommend</title>
    <!-- CSS -->
    <?php include_once('../include/inc_css_front.php') ?>

</head>

<body style="height: 100%">

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center" style="margin-top: 10rem"><strong>แนะนำข้อมูลสถานที่ท่องเที่ยว</strong></h1>
                <hr>
            </div>
        </div>
    </div>

    <section class="recom-stat-travel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>สถานที่ท่องเที่ยวที่ท่านต้องการจะไปคือ: <br> <span><strong class="text-blue">"<?php echo $nameCategory ?>"</strong></span> </h1>
                    <h3>คุณมี <?php echo count($arrCategoryNumber) - 1 ?> อันดับ ประเภทที่คะแนนเท่ากัน</h3>

                    <?php for ($i = 0; $i < count($arrCategoryNumber); $i++) { ?>
                        <?php if ($arrCategoryNumber[$i] != $nameCategory) { ?>
                            <button onclick="SelectLabelMain('<?php echo $arrCategoryNumber_Eng[$i] ?>')" class="btn btn-blue"><?php echo $arrCategoryNumber[$i] ?></button>
                        <?php } ?>
                    <?php } ?>

                    <div>
                        <!-- <a href="./page1.php" class="btn btn-warning text-light mt-3">ทำแบบทดสอบใหม่อีกครั้ง</a> -->
                        <form action="page1.php" method="POST">
                            <button type="submit" name="submitReCom" href="./page1.php" class="btn btn-warning text-light mt-3">ทำแบบทดสอบใหม่อีกครั้ง</button>
                        </form>
                    </div>

                    <hr>
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
    </section>

    <section class="btn-category">
        <div class="container">
            <div class="row mt-2">
                <div class="col-lg-12 text-center">
                    <button class="btn <?php echo $category == 'ประเภททั้งหมด' ? 'btn-blue-active' : 'btn-blue' ?>  mr-2 mt-2" onclick="SelectCategory('ประเภททั้งหมด')">ประเภททั้งหมด</button>
                    <?php for ($i = 0; $i < count($arrCategory); $i++) { ?>
                        <input type="hidden" value="<?php echo $arrCategory[$i] ?>" name="category">
                        <button class="btn <?php echo $category == $arrCategory[$i] ? 'btn-blue-active' : 'btn-blue' ?> mr-2 mt-2" onclick="SelectCategory('<?php echo $arrCategory[$i] ?>') "><?php echo $arrCategory[$i] ?></button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="place_recom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <form action="./recom_travel.php" method="$_GET" name="test">
                        <input type="hidden" name="category" value="<?php echo $category ?>">
                        <select id="selectValue" name="province" onchange="test.submit();" class="form-control">
                            <option <?php echo $province == 'แสดงจังหวัดทั้งหมด' ? 'selected' : '' ?> value="แสดงจังหวัดทั้งหมด">แสดงจังหวัดทั้งหมด</option>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <option <?php echo $province == $row['name_th'] ? 'selected' : '' ?> value="<?php echo $row['name_th'] ?>"><?php echo $row['name_th'] ?></option>
                            <?php } ?>
                        </select>

                        <!-- ตัวสั่งให้ทำงาน -->
                        <input type="hidden" value="Click" />
                        <?php
                        if (isset($_GET['province'])) {
                            $province = $_GET['province'];
                            $category = $_GET['category'];
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="data-place-recom">

        <div class="container">
            <div class="row">


                <?php if ($province == 'แสดงจังหวัดทั้งหมด') { ?>

                    <!-- แสดงจังหวัดทั้งหมด -->
                    <?php if ($category == 'ประเภททั้งหมด') { ?>

                        <?php

                        $num = 0;
                        $sql = "SELECT * FROM place WHERE";

                        $result = $conn->query($sql);

                        for ($i = 0; $i < count($arrCategory); $i++) {
                            $sql .= " category = '" . $arrCategory[$i] . "' ||";
                        }

                        $sql = substr($sql, 0, -2);

                        $result = $conn->query($sql);

                        $total = $result->num_rows;

                        $e_page = 30; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
                        $step_num = 0;
                        if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 1)) {
                            $_GET['page'] = 1;
                            $step_num = 0;
                            $s_page = 0;
                        } else {
                            $s_page = $_GET['page'] - 1;
                            $step_num = $_GET['page'] - 1;
                            $s_page = $s_page * $e_page;
                        }

                        // อย่าลืมเปลี่ยน id travel เป็น id ที่ถูกต้องด้วย 
                        $sql .= " ORDER BY id_travel LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                $num++;

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_place = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                // Check Rating
                                if ($result_avg->num_rows == 0) {
                                    $ratestar = 0;
                                } else {
                                    $row_avg = $result_avg->fetch_assoc();
                                    $ratestar = $row_avg['AVG(ratestar)'];
                                }
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop" style="border-radius: 8% ;">
                                                    <div class="img-card" style=" border-radius: 8% ; background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
                                                        <div class="card-color">
                                                        </div>
                                                    </div>
                                                    <div class="card-text">
                                                        <h5><?php echo $row['place_name'] ?></h5>
                                                        <p><?php echo $row['province'] ?></p>
                                                    </div>
                                                    <div class="card-text-view">
                                                        <small><i class="fas fa-eye"> </i> <?php echo $result_count->num_rows != 0 ? $row_count['count_travel'] : 0 ?> </small>
                                                    </div>
                                                    <div class="card-star">
                                                        <div class="rating-comment-avg-card mt-2">
                                                            <input <?php echo floor($ratestar) == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                                            <label for="rating-comment-5"></label>
                                                            <input <?php echo floor($ratestar) == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                                            <label for="rating-comment-4"></label>
                                                            <input <?php echo floor($ratestar) == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                                            <label for="rating-comment-3"></label>
                                                            <input <?php echo floor($ratestar) == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                                            <label for="rating-comment-2"></label>
                                                            <input <?php echo floor($ratestar) == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                                            <label for="rating-comment-1"></label>
                                                        </div>
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($ratestar, '1', '.', '') ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </a>

                                </div>
                        <?php
                            }
                        }
                        ?>

                    <?php } else { ?>

                        <?php

                        $num = 0;
                        $sql = "SELECT * FROM place WHERE category = '" . $category . "' ";

                        $result = $conn->query($sql);

                        $total = $result->num_rows;

                        $e_page = 30; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
                        $step_num = 0;
                        if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 1)) {
                            $_GET['page'] = 1;
                            $step_num = 0;
                            $s_page = 0;
                        } else {
                            $s_page = $_GET['page'] - 1;
                            $step_num = $_GET['page'] - 1;
                            $s_page = $s_page * $e_page;
                        }

                        // อย่าลืมเปลี่ยน id travel เป็น id ที่ถูกต้องด้วย 
                        $sql .= " ORDER BY id_travel LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                $num++;

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_place = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                // Check Rating
                                if ($result_avg->num_rows == 0) {
                                    $ratestar = 0;
                                } else {
                                    $row_avg = $result_avg->fetch_assoc();
                                    $ratestar = $row_avg['AVG(ratestar)'];
                                }
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop" style="border-radius: 8% ;">
                                                    <div class="img-card" style=" border-radius: 8% ; background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
                                                        <div class="card-color">
                                                        </div>
                                                    </div>
                                                    <div class="card-text">
                                                        <h5><?php echo $row['place_name'] ?></h5>
                                                        <p><?php echo $row['province'] ?></p>
                                                    </div>
                                                    <div class="card-text-view">
                                                        <small><i class="fas fa-eye"> </i> <?php echo $result_count->num_rows != 0 ? $row_count['count_travel'] : 0 ?> </small>
                                                    </div>
                                                    <div class="card-star">
                                                        <div class="rating-comment-avg-card mt-2">
                                                            <input <?php echo floor($ratestar) == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                                            <label for="rating-comment-5"></label>
                                                            <input <?php echo floor($ratestar) == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                                            <label for="rating-comment-4"></label>
                                                            <input <?php echo floor($ratestar) == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                                            <label for="rating-comment-3"></label>
                                                            <input <?php echo floor($ratestar) == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                                            <label for="rating-comment-2"></label>
                                                            <input <?php echo floor($ratestar) == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                                            <label for="rating-comment-1"></label>
                                                        </div>
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($ratestar, '1', '.', '') ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </a>

                                </div>
                        <?php
                            }
                        }
                        ?>


                    <?php } ?>

                <?php } else { ?>

                    <!-- มีการเลือกจังหวัด -->
                    <?php if ($category == 'ประเภททั้งหมด') { ?>
                        <?php

                        $num = 0;
                        $sql = "SELECT * FROM place WHERE province LIKE '" . $province . "' && ( ";

                        $result = $conn->query($sql);

                        for ($i = 0; $i < count($arrCategory); $i++) {
                            $sql .= " category = '" . $arrCategory[$i] . "' ||";
                        }

                        $sql = substr($sql, 0, -2);
                        $sql .= ')';

                        // echo $sql;

                        $result = $conn->query($sql);

                        $total = $result->num_rows;

                        $e_page = 30; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
                        $step_num = 0;
                        if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 1)) {
                            $_GET['page'] = 1;
                            $step_num = 0;
                            $s_page = 0;
                        } else {
                            $s_page = $_GET['page'] - 1;
                            $step_num = $_GET['page'] - 1;
                            $s_page = $s_page * $e_page;
                        }

                        // อย่าลืมเปลี่ยน id travel เป็น id ที่ถูกต้องด้วย 
                        $sql .= " ORDER BY id_travel LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                $num++;

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_place = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                // Check Rating
                                if ($result_avg->num_rows == 0) {
                                    $ratestar = 0;
                                } else {
                                    $row_avg = $result_avg->fetch_assoc();
                                    $ratestar = $row_avg['AVG(ratestar)'];
                                }
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop" style="border-radius: 8% ;">
                                                    <div class="img-card" style=" border-radius: 8% ; background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
                                                        <div class="card-color">
                                                        </div>
                                                    </div>
                                                    <div class="card-text">
                                                        <h5><?php echo $row['place_name'] ?></h5>
                                                        <p><?php echo $row['province'] ?></p>
                                                    </div>
                                                    <div class="card-text-view">
                                                        <small><i class="fas fa-eye"> </i> <?php echo $result_count->num_rows != 0 ? $row_count['count_travel'] : 0 ?> </small>
                                                    </div>
                                                    <div class="card-star">
                                                        <div class="rating-comment-avg-card mt-2">
                                                            <input <?php echo floor($ratestar) == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                                            <label for="rating-comment-5"></label>
                                                            <input <?php echo floor($ratestar) == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                                            <label for="rating-comment-4"></label>
                                                            <input <?php echo floor($ratestar) == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                                            <label for="rating-comment-3"></label>
                                                            <input <?php echo floor($ratestar) == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                                            <label for="rating-comment-2"></label>
                                                            <input <?php echo floor($ratestar) == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                                            <label for="rating-comment-1"></label>
                                                        </div>
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($ratestar, '1', '.', '') ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </a>

                                </div>
                        <?php
                            }
                        }
                        ?>
                    <?php } else { ?>

                        <?php

                        $num = 0;
                        $sql = "SELECT * FROM place WHERE province LIKE '" . $province . "' && category = '" . $category . "' ";

                        $result = $conn->query($sql);

                        $total = $result->num_rows;

                        $e_page = 30; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
                        $step_num = 0;
                        if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] == 1)) {
                            $_GET['page'] = 1;
                            $step_num = 0;
                            $s_page = 0;
                        } else {
                            $s_page = $_GET['page'] - 1;
                            $step_num = $_GET['page'] - 1;
                            $s_page = $s_page * $e_page;
                        }

                        // อย่าลืมเปลี่ยน id travel เป็น id ที่ถูกต้องด้วย 
                        $sql .= " ORDER BY id_travel LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                $num++;

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_place = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                // Check Rating
                                if ($result_avg->num_rows == 0) {
                                    $ratestar = 0;
                                } else {
                                    $row_avg = $result_avg->fetch_assoc();
                                    $ratestar = $row_avg['AVG(ratestar)'];
                                }
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop" style="border-radius: 8% ;">
                                                    <div class="img-card" style=" border-radius: 8% ; background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
                                                        <div class="card-color">
                                                        </div>
                                                    </div>
                                                    <div class="card-text">
                                                        <h5><?php echo $row['place_name'] ?></h5>
                                                        <p><?php echo $row['province'] ?></p>
                                                    </div>
                                                    <div class="card-text-view">
                                                        <small><i class="fas fa-eye"> </i> <?php echo $result_count->num_rows != 0 ? $row_count['count_travel'] : 0 ?> </small>
                                                    </div>
                                                    <div class="card-star">
                                                        <div class="rating-comment-avg-card mt-2">
                                                            <input <?php echo floor($ratestar) == 5 ? 'checked' : '' ?> type="radio" value="5" id="rating-comment-5" disabled>
                                                            <label for="rating-comment-5"></label>
                                                            <input <?php echo floor($ratestar) == 4 ? 'checked' : '' ?> type="radio" value="4" id="rating-comment-4" disabled>
                                                            <label for="rating-comment-4"></label>
                                                            <input <?php echo floor($ratestar) == 3 ? 'checked' : '' ?> type="radio" value="3" id="rating-comment-3" disabled>
                                                            <label for="rating-comment-3"></label>
                                                            <input <?php echo floor($ratestar) == 2 ? 'checked' : '' ?> type="radio" value="2" id="rating-comment-2" disabled>
                                                            <label for="rating-comment-2"></label>
                                                            <input <?php echo floor($ratestar) == 1 ? 'checked' : '' ?> type="radio" value="1" id="rating-comment-1" disabled>
                                                            <label for="rating-comment-1"></label>
                                                        </div>
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($ratestar, '1', '.', '') ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </a>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-lg-12 mt-3">
                                <h1 class="text-center">ไม่พบข้อมูล</h1>
                            </div>


                        <?php } ?>

                    <?php } ?>

                <?php } ?>
            </div>
        </div>

        <?php
        if ($result->num_rows != 0) {
        ?>
            <!-- WEB -->
            <div class="respon-Navi-Web">
                <?php page_navi($total, $province, $category, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page); ?>
            </div>

            <!-- MOBILE -->
            <div class="respon-Navi-Mobile">
                <?php page_navi_mobile($total, $province, $category, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page); ?>
            </div>

        <?php
        }
        ?>


    </section>

    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- ChartJS -->
    <script src="../assets/lib/chart.js/Chart.min.js"></script>

    <script src="../assets/lib/jquery/jquery.min.js"></script>
    <script src="../assets/lib/adminlte.min.js"></script>


    <!-- Page specific script -->
    <script>
        $(function() {
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = {
                labels: [
                    <?php
                    $num = 0;
                    foreach ($_SESSION['stat_recom'] as $category_name => $category_value) {
                        $num++;
                        if ($category_name == 'eco') {
                            $arrDataThai[$num] = 'เชิงนิเวศ';
                        } else if ($category_name == 'art science') {
                            $arrDataThai[$num] = 'ศิลปะวิทยาการ';
                        } else if ($category_name == 'history') {
                            $arrDataThai[$num] = 'ประวัติศาสตร์';
                        } else if ($category_name == 'nature') {
                            $arrDataThai[$num] = 'ธรรมชาติ';
                        } else if ($category_name == 'recreation') {
                            $arrDataThai[$num] = 'นันทนาการ';
                        } else if ($category_name == 'culture') {
                            $arrDataThai[$num] = 'วัฒนธรรม';
                        } else if ($category_name == 'natural_hot_springs') {
                            $arrDataThai[$num] = 'น้ำพุร้อนธรรมชาติ';
                        } else if ($category_name == 'beach') {
                            $arrDataThai[$num] = 'ชายหาด';
                        } else if ($category_name == 'waterfall') {
                            $arrDataThai[$num] = 'น้ำตก';
                        } else if ($category_name == 'cave') {
                            $arrDataThai[$num] = 'ถ้ำ';
                        } else if ($category_name == 'island') {
                            $arrDataThai[$num] = 'เกาะ';
                        } else if ($category_name == 'rapids') {
                            $arrDataThai[$num] = 'แก่ง';
                        } else {
                            $arrDataThai[$num] = 'เกิดข้อผิดพลาด';
                        }
                    ?>

                        '<?php echo $arrDataThai[$num] ?>',

                    <?php } ?>
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

                            <?php foreach ($_SESSION['stat_recom'] as $category_name => $category_value) { ?>
                                <?php echo $category_value * 10 ?>,
                            <?php } ?>

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

    <!-- Category -->
    <script>
        function SelectCategory(nameCategory) {
            location.replace("recom_travel.php?province=<?php echo $province ?>&category=" + nameCategory);
        }

        function SelectLabelMain(nameLabel) {

            console.log(nameLabel);

            $.ajax({
                type: "POST",
                url: "./selectLabel.php",
                data: {
                    dataLabel: nameLabel
                }
            }).done(function() {
                location.replace("recom_travel.php?category=ประเภททั้งหมด");
            });


        }
    </script>





    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>