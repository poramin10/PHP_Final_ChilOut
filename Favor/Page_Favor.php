<?php
require_once('../authen_frontend.php');
require_once("./pagination_function.php");

if (!isset($_SESSION['id_user'])) {
    header('location: ../Login/Page_FormLogin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- CSS -->
    <?php include_once('../include/inc_css_front.php') ?>
</head>

<body>

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>


    <section class="profile-page">
        <img src="../assets/img/img-Profile.jpg" class="img-fulid cover" width="100%" height="500px" alt="">
        <?php if (isset($_SESSION['access_token'])) { ?>
            <img src="<?php echo $_SESSION['profile'] ?>" class="img-fulid avatar" alt="">
        <?php } else { ?>
            <img src="../assets/img/profile/<?php echo $_SESSION['profile'] ?>" class="img-fulid avatar" alt="">
        <?php } ?>
    </section>
    
    <section class="name-profile text-center">
        <h1 class="font-weight-bold text-blue text-name-profile"><strong><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></strong></h1>
    </section>

    <section class="data-profile">
        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-11">
                    <div class="row">
                        <div class="col-lg-3">
                            <?php include_once('../include/sideProfile.php') ?>
                        </div>

                        <div class="col-lg-9">
                            <div class="row">
                                <?php

                                $num = 0;
                                $sql = "SELECT * FROM `love` JOIN place ON love.id_place = place.place_id AND love.id_user = '" . $_SESSION['id_user'] . "' ";
                                $result = $conn->query($sql);
                                $total = $result->num_rows;

                                $e_page = 9; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   

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

                                $sql .= " ORDER BY love.id_love LIMIT " . $s_page . ",$e_page";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $sql_count = "SELECT * FROM `countertravel` WHERE id_travel = '" . $row['place_id'] . "' ";
                                        $result_count = $conn->query($sql_count);
                                        $row_count = $result_count->fetch_assoc();
                                ?>
                                        <div class="col-lg-4 mt-3 mb-3">
                                            <a href="../Travel/Detail.php?idTravel=<?php echo $row['place_id']  ?>">
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
                                                        </div>
                                                    </div>
                                                </section>
                                            </a>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>

                            <?php
                           
                            if ($result->num_rows != 0) {
                                page_navi($total, (isset($_GET['page'])) ? $_GET['page'] : 1, $e_page);
                            }else{
                            ?>
                                <div class="text-center mt-2"><img src="../assets/img/404.png" width="30%" alt=""></div>
                                <h3 class="text-center mt-2">คุณยังไม่มีสถานที่ท่องเที่ยวที่ชื่นชอบ! </h3>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('../include/footer.php') ?>

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>



</body>

</html>