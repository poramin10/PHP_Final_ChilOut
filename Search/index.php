<?php
require_once('../authen_frontend.php');

// DB ของจังหวัดในประเทศไทย
$sql = "SELECT * FROM `provinces` ORDER BY `name_th` ASC ";
$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">

<head>
    
    <title>Search</title>
    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>


</head>


<body>
    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <img src="https://66.media.tumblr.com/61da998c25433a8e769c2e5215f3cb44/tumblr_o7bd22tzma1rzo8x9o1_500.gif" width="100%" height="50%" style="background-size: cover" alt="">

    <div class="bg-img">

    </div>

    <!-- Search --> 
    <div class="container">

        <center>
            <div class="row">
                <div class="col-md-12 mt-4">
                    <h3><strong>
                            ข้อมูลสถานที่ท่องเที่ยว
                            <hr>
                        </strong></h3>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-md-12 ">

                    <div class="inner-form">

                        <!-- เลือกจังหวัด -->
                        <div class="row">
                            <div class="col-md-2">

                                <select id="selectValue" class="input-field custom-select custom-select-md" class="keyword-province form-control" id="validationCustom04">
                                    <option value="แสดงจังหวัดทั้งหมด" selected>แสดงจังหวัดทั้งหมด</option>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['name_th'] ?>"><?php echo $row['name_th'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="col-md-8 col-8">
                                <!-- ค้นหา -->
                                <div class="input-field second-wrap">
                                    <input id="search" type="text" class="keyword-TAT form-control" placeholder="ค้นหาสถานที่ท่องเที่ยว" />
                                </div>
                            </div>
                            <div class="col-md-2 col-3">
                                <!-- ปุ่ม -->
                                <div class="input-field third-wrap">
                                    <button type="submit" class="btn btn-primary btn-block" onclick="fetchData()">ค้นหา</button>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>


                    </div>
                </div>

            </div>
        </center>

    </div>

    <!-- Notify Data -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div id="notify" class="text-center">
                    <h3>
                        <img src="https://steamuserimages-a.akamaihd.net/ugc/499143799328359714/EE0470B9BD25872DC95E7973B2C2F7006B7B9FB8/" width="200px" height="100px" alt="">
                        <br>
                        <div class="spinner-border text-dark" role="status">
                            <h1><span class="sr-only">Loading...</span></h1>
                        </div>
                        <b>กำลังค้นหาข้อมูล...</b>
                    </h3>
                </div>
                <div id="notData" class="text-center" hidden>
                    <h3 class="my-5">ไม่พบข้อมูลสถานที่ท่องเที่ยว</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Travel -->
    <div class="container mb-5">
        <div class="row" id="data">
        </div>
    </div>

    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>


    <!-- Link -->
    <?php include_once('../include/inc_js_front.php') ?>                                    

    <!-- Axios Search Travel -->
    <?php include_once('./include_axiosTravel.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Script JS -->
    <script src="../assets/Js/scriptNavbar.js"></script>


</body>

</html>