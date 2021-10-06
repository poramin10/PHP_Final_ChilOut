<?php
require_once('../authen_frontend.php');


// แสดงข้อมูลสถานที่ท่องเที่ยวที่เด่นๆ
$sql_count = "SELECT * FROM `countertravel` ORDER BY `count_travel` DESC LIMIT 12";
$result_count = $conn->query($sql_count);

$number = 0;
$_SESSION['Wait'] = NULL;
?>

<!doctype html>
<html lang="en">

<head>
    <title>HomePage</title>
    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>

</head>

<body>

    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <!-- Banner -->
    <section class="banner">

        <div class="banner-fixed">

            <img src="../assets/img/BANNER.png" width="100%" height="100%" alt="">

            <div class="cloud-fixed">
                <img class="cloud" src="../assets/img/cloud.png" alt="">
            </div>

            <div class="build-fixed">
                <img class="build" src="../assets/img/build.png" alt="">
            </div>

            <div class="road-fixed">
                <img class="road" src="../assets/img/road.png" alt="">
            </div> 

            <div class="train-fixed">
                <img class="train" src="../assets/img/train.png" alt="">
            </div>

            <div class="plane-fixed">
                <img class="plane" src="../assets/img/plane.png" alt="">
            </div>

            <div class="human-fixed">
                <img class="human" src="../assets/img/human.png" alt="">
            </div>

            <div class="text-banner">
                <div style="display:flex;">
                    <img src="../assets/img/LOGOv2.png" width="150px" alt="">
                    <h1 class="text-pink"><strong>ดรีมเวล</strong></h1>
                </div>
                <h3><span class="text-green">ระบบแนะนำสถานที่ท่องเที่ยวที่เหมาะ </span><span class="text-pink"> สำหรับคุณ</span></h3>
            </div>

        </div>

    </section>

    <!-- Background Image -->
    <div class="bg-img">
    </div>

    <div class="container">

        <!-- หัวข้อ Card -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <h3 class="text-color-pink"><strong>12 อันดับสถานที่ท่องเที่ยวยอดนิยม</strong> </h3>
                <hr>
            </div>
        </div>
    </div>

    <!-- เนื้อหาสถานที่ท่องเที่ยว -->
    <div class="container">
        <div class="row row-card">

            <?php while ($row_count = $result_count->fetch_assoc()) { ?>

                <!-- <?php echo $row_count['id_travel'] ?> -->
                <!-- หาสถานที่ท่องเที่ยวยอดนิยม -->
                <?php
                $sql_place = "SELECT * FROM `place` WHERE place_id = '" . $row_count['id_travel'] . "' ";
                $result_place = $conn->query($sql_place);
                $row_place = $result_place->fetch_assoc();

                $number++;
                ?>

                <?php
                if ($result_place) {
                    $_SESSION['Wait'] = NULL;
                } else {
                    $_SESSION['Wait'] = 'Wait';
                }

                ?>

                <div class="col-md-4 mt-3 mb-3">
                    <a href="../Travel/Detail.php?idTravel=<?php echo $row_place['place_id']  ?>">
                        <section class="card-v2">
                            <div class="crop-zoom">
                                <div class="card card-relative cardTop">
                                    <div class="img-card" style=" background-image: url('<?php echo $row_place['picture'] ?>'); width: 100%">
                                        <div class="card-color">
                                        </div>
                                    </div>
                                    <div class="card-text">
                                        <h5><?php echo $row_place['place_name'] ?></h5>
                                        <p><?php echo $row_place['province'] ?></p>
                                    </div>
                                    <div class="card-text-view">
                                        <small><i class="fas fa-eye"> </i><?php echo ' ' . $row_count['count_travel'] ?> </small>
                                    </div>
                                </div>
                            </div>

                            <img class="popular-fixed" src="../assets/img/pop-<?php echo $number ?>.png" alt="">

                        </section>
                    </a>

                </div>

            <?php } ?>
        </div>


        <!-- <div id="wait" class="row justify-content-center align-item-center vh-100">
            <div class="col-md-12 text-center py-5">
                <img src="https://steamuserimages-a.akamaihd.net/ugc/499143799328359714/EE0470B9BD25872DC95E7973B2C2F7006B7B9FB8/" width="200px" height="100px" alt="">
                <div class="mt-2">
                    <h3>
                        <strong>กำลังโหลด...</strong>
                    </h3>
                </div>
            </div>
        </div> -->


    </div>

    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>


    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Script Popular -->
    <?php
    //  include_once('./include_axiosPopular.php') 
    ?>

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')
    </script>

    <!-- Animation Text Move -->
    <!-- <script>
        // $carousel.bind('slide.bs.carousel', function(e) {
        //     console.log('slide event!');
        // }); 

        // setInterval(function() {

        $('#carouselExampleIndicators').bind('slide.bs.carousel', function(e) {
            let item1 = document.getElementById("item1");
            let item2 = document.getElementById("item2");
            let item3 = document.getElementById("item3");
            if (item1.classList.contains("active")) {

            }
            if (item2.classList.contains("active")) {
                console.log('กด');
                textWelCome()
            }
            if (item3.classList.contains("active")) {

                textWelCome()

            }
        });
    </script>

    <script>
        var textWrapper = document.querySelector('.text-welcome');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
        anime.timeline({})
            .add({
                targets: '.text-welcome .letter',
                scale: [4, 1],
                opacity: [0, 1],
                translateZ: 0,
                easing: "easeOutExpo",
                duration: 950,
                delay: (el, i) => 70 * i
            }).add({
                targets: '.text-welcome',
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });


        function textWelCome() {
            var textWrapper = document.querySelector('.text-welcome');
            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
            anime.timeline({})
                .add({
                    targets: '.text-welcome .letter',
                    scale: [4, 1],
                    opacity: [0, 1],
                    translateZ: 0,
                    easing: "easeOutExpo",
                    duration: 950,
                    delay: (el, i) => 70 * i
                }).add({
                    targets: '.text-welcome',
                    duration: 1000,
                    easing: "easeOutExpo",
                    delay: 1000
                });
        }
    </script>

    <script>
        anime.timeline({
                loop: true
            })

            .add({
                targets: '.ml15 .word1',
                scale: [14, 1],
                opacity: [0, 1],
                easing: "easeOutCirc",
                duration: 1000,
                delay: (el, i) => 2000 * i
            }).add({
                targets: '.ml15 .word2',
                scale: [14, 1],
                opacity: [0, 1],
                easing: "easeOutCirc",
                duration: 1000,
                delay: (el, i) => 1000 * i
            }).add({
                targets: '.ml15',
                opacity: 0,
                duration: 3000,
                easing: "easeOutExpo",
                delay: 2000
            });
    </script>

    <script>
        anime.timeline({
                loop: true
            })
            .add({
                targets: '.ml5 .line',
                opacity: [0.5, 1],
                scaleX: [0, 1],
                easing: "easeInOutExpo",
                duration: 700
            }).add({
                targets: '.ml5 .line',
                duration: 600,
                easing: "easeOutExpo",
                translateY: (el, i) => (-0.625 + 0.625 * 2 * i) + "em"
            }).add({
                targets: '.ml5 .ampersand',
                opacity: [0, 1],
                scaleY: [0.5, 1],
                easing: "easeOutExpo",
                duration: 600,
                offset: '-=600'
            }).add({
                targets: '.ml5 .letters-left',
                opacity: [0, 1],
                translateX: ["0.5em", 0],
                easing: "easeOutExpo",
                duration: 600,
                offset: '-=300'
            }).add({
                targets: '.ml5 .letters-right',
                opacity: [0, 1],
                translateX: ["-0.5em", 0],
                easing: "easeOutExpo",
                duration: 5000,
                offset: '-=600'
            }).add({
                targets: '.ml5',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
    </script> -->



</body>

</html>