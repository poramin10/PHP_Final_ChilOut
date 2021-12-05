<?php
require_once('../authen_frontend.php');


// DB ของจังหวัดในประเทศไทย
$sql = "SELECT * FROM `provinces` ORDER BY `name_th` ASC ";
$result = $conn->query($sql);

// จังหวัด
if (isset($_GET['province'])) {
    $province = $_GET['province'];
} else {
    $province = 'แสดงจังหวัดทั้งหมด';
}


// ประเภทสถานที่ท่องเที่ยว
$sql_cat = "SELECT * FROM `category` WHERE status_cat = 'open' ORDER BY `name_cat` ASC ";
$result_cat = $conn->query($sql_cat);

// ประเภทสถานที่ท่องเที่ยว
if (isset($_GET['category'])) {
    $category = $_GET['category'];
} else {
    $category = 'ประเภทสถานที่ท่องเที่ยวทั้งหมด';
}

// ค้นหาจังหวัด
if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = '';
}

// Pagination
require_once("./pagination_function.php");



?>

<!doctype html>
<html lang="en">

<head>

    <title>Search</title>
    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


</head>

<style>
    .bg {
        background-image: url(../assets/img/bg-search.jpg);
        width: 100%;
        background-size: cover;
        padding: 18%;
    }
</style>

<body>
    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <div class="bg-img">

    </div>


    <div class="fixed-bg-search">
        <div class="bg">
            <div class="row my-4">
                <div class="col-md-12 ">
                    <h1 class="text-light text-center"><strong>คุณอยากไปเที่ยวไหน?</strong></h1>
                    <div class="inner-form">
                        <form action="./travelSearch.php" method="$_GET" name="test">
                            <!-- เลือกจังหวัด -->
                            <div class="row justify-content-center">

                                <div class="col-lg-10">

                                    <div class="input-group flex-nowrap">
                                        <input type="text" name="search" class="form-control" value="<?php echo $search ?>" placeholder="ค้นหาชื่อสถานที่ท่องเที่ยว" aria-describedby="addon-wrapping">
                                        <span type="submit" onclick="test.submit();" class="input-group-text btn btn-primary" id="addon-wrapping"><i class="fas fa-search"></i></span>
                                    </div>

                                    <!-- ตัวสั่งให้ทำงาน -->
                                    <input type="hidden" value="Click" />
                                    <?php
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                        $province = $_GET['province'];
                                        $category = $_GET['category'];
                                    }
                                    ?>

                                </div>

                                <div class="col-lg-8 mt-3">

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <select id="selectValue" name="province" onchange="test.submit();" class="input-field custom-select custom-select-md">
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
                                                $search = $_GET['search'];
                                                $category = $_GET['category'];
                                            }
                                            ?>
                                        </div>

                                        <div class="col-lg-6">
                                            <select id="selectValue" name="category" onchange="test.submit();" class="input-field custom-select custom-select-md">
                                                <option <?php echo $category == 'ประเภทสถานที่ท่องเที่ยวทั้งหมด' ? 'selected' : '' ?> value="ประเภทสถานที่ท่องเที่ยวทั้งหมด">ประเภทสถานที่ท่องเที่ยวทั้งหมด</option>
                                                <?php while ($row_cat = $result_cat->fetch_assoc()) { ?>
                                                    <option <?php echo $category == $row_cat['name_cat'] ? 'selected' : '' ?> value="<?php echo $row_cat['name_cat'] ?>"><?php echo $row_cat['name_cat'] ?></option>
                                                <?php } ?>
                                            </select>

                                            <!-- ตัวสั่งให้ทำงาน -->
                                            <input type="hidden" value="Click" />
                                            <?php
                                            if (isset($_GET['category'])) {
                                                $province = $_GET['province'];
                                                $search = $_GET['search'];
                                                $category = $_GET['category'];
                                            }
                                            ?>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ข้อมูล -->
    <div class="container">
        <div class="row">

            <?php if ($province == 'แสดงจังหวัดทั้งหมด') { ?>

                <?php if ($search == '') { ?>

                    <!-- START แสดงจังหวัดทั้งหมด NO SEARCH -->

                    <?php if ($category == 'ประเภทสถานที่ท่องเที่ยวทั้งหมด') { ?>

                        <?php
                        $num = 0;
                        $sql = "SELECT * FROM place";
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
                        $sql .= " ORDER BY id_travel  LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                $num++;

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop">
                                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
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
                            <div class="col-lg-12">
                                <div style="margin: 10rem 0">
                                    <h3 class="text-center font-weight-bold">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                                </div>
                            </div>
                        <?php
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
                        $sql .= " ORDER BY id_travel  LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ
                                $num++;

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop">
                                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
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
                            <div class="col-lg-12">
                                <div style="margin: 10rem 0">
                                    <h3 class="text-center font-weight-bold">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    <?php } ?>

                    <!-- END แสดงจังหวัดทั้งหมด NO SEARCH -->

                <?php } else { ?>

                    <!-- START แสดงจังหวัดทั้งหมด HAVE SEARCH -->

                    <?php if ($category == 'ประเภทสถานที่ท่องเที่ยวทั้งหมด') { ?>


                        <?php
                        $num = 0;
                        $sql = "SELECT * FROM `place` WHERE `place_name` LIKE '%" . $search . "%' ";
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
                        $sql .= " ORDER BY id_travel  LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                                $num++;
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop">
                                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
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

                            <div class="col-lg-12">
                                <div style="margin: 10rem 0">
                                    <h3 class="text-center font-weight-bold">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    <?php } else { ?>

                        <?php
                        $num = 0;
                        $sql = "SELECT * FROM `place` WHERE `place_name` LIKE '%" . $search . "%' AND category = '" . $category . "' ";
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
                        $sql .= " ORDER BY id_travel  LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                                $num++;
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop">
                                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
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

                            <div class="col-lg-12">
                                <div style="margin: 10rem 0">
                                    <h3 class="text-center font-weight-bold">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    <?php } ?>

                    <!-- END แสดงจังหวัดทั้งหมด HAVE SEARCH -->

                <?php } ?>

            <?php } else { ?>
                <?php if ($search == '') { ?>

                    <!-- START เลือกจังหวัด NO SEARCH -->

                    <?php if ($category == 'ประเภทสถานที่ท่องเที่ยวทั้งหมด') { ?>

                        <?php
                        $num = 0;
                        $sql = "SELECT * FROM `place` WHERE province = '" . $province . "' ";
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
                        $sql .= " ORDER BY id_travel  LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                                $num++;
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop">
                                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
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
                            <div class="col-lg-12">
                                <div style="margin: 10rem 0">
                                    <h3 class="text-center font-weight-bold">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    <?php } else { ?>

                        <?php
                        $num = 0;
                        $sql = "SELECT * FROM `place` WHERE province = '" . $province . "' && category = '" . $category . "' ";
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
                        $sql .= " ORDER BY id_travel  LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                                $num++;
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop">
                                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
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
                            <div class="col-lg-12">
                                <div style="margin: 10rem 0">
                                    <h3 class="text-center font-weight-bold">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    <?php } ?>

                    <!-- END เลือกจังหวัด NO SEARCH -->

                <?php } else { ?>


                    <!-- START เลือกจังหวัด SEARCH -->

                    <?php if ($category == 'ประเภทสถานที่ท่องเที่ยวทั้งหมด') { ?>

                        <?php
                        $num = 0;
                        $sql = "SELECT * FROM `place` WHERE province = '" . $province . "' AND `place_name` LIKE '%" . $search . "%' ";
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
                        $sql .= " ORDER BY id_travel  LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                                $num++;
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop">
                                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
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
                            <div class="col-lg-12">
                                <div style="margin: 10rem 0">
                                    <h3 class="text-center font-weight-bold">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    <?php } else { ?>

                        <?php
                        $num = 0;
                        $sql = "SELECT * FROM `place` WHERE province = '" . $province . "' AND `place_name` LIKE '%" . $search . "%' AND category = '".$category."' ";
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
                        $sql .= " ORDER BY id_travel  LIMIT " . $s_page . ",$e_page";
                        $result = $conn->query($sql) or die($conn->error);
                        if ($result && $result->num_rows > 0) {  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                            while ($row = $result->fetch_assoc()) { // วนลูปแสดงรายการ

                                $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['id_place'] . "' ";
                                $result_count = $conn->query($sql_count);
                                $row_count = $result_count->fetch_assoc();

                                $sql_avg = "SELECT AVG(ratestar) FROM `comment_rating` WHERE id_place = '" . $row['id_place'] . "';";
                                $result_avg = $conn->query($sql_avg);
                                $row_avg = $result_avg->fetch_assoc();

                                $num++;
                        ?>
                                <div class="col-md-4 mt-3 mb-3">
                                    <a href="../Travel/Detail.php?idTravel=<?php echo $row['id_place']  ?>">
                                        <section class="card-v2">
                                            <div class="crop-zoom">
                                                <div class="card card-relative cardTop">
                                                    <div class="img-card" style=" background-image: url('<?php echo $row['picture'] ?>'); width: 100%">
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
                                                        <strong style="margin-top: 6px; margin-left: 2px"> <?php echo number_format($row_avg['AVG(ratestar)'], '1', '.', '') ?></strong>
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
                            <div class="col-lg-12">
                                <div style="margin: 10rem 0">
                                    <h3 class="text-center font-weight-bold">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    <?php } ?>

                    <!-- END เลือกจังหวัด NO SEARCH -->

                <?php } ?>
            <?php } ?>
        </div>
    </div>


    <?php
    if ($result->num_rows != 0) {
    ?>
        <!-- WEB -->
        <div class="respon-Navi-Web">
            <?php page_navi($total, $search, $province, $category, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page); ?>
        </div>

        <!-- MOBILE -->
        <div class="respon-Navi-Mobile">
            <?php page_navi_mobile($total, $search, $province, $category, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page); ?>
        </div>


    <?php
    }
    ?>


    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>

    <!-- Link -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>


</body>

</html>