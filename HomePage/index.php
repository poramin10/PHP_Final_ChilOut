<?php
require_once('../authen_frontend.php');

// DB ของจังหวัดในประเทศไทย
$sql = "SELECT * FROM `provinces` ORDER BY `name_th` ASC ";
$result = $conn->query($sql);
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

    <!-- Carousel -->
    <?php include_once('./include_carousel.php') ?>

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

        <div class="row" id="dataPopular">
        </div>

        <div id="notify" class="row justify-content-center align-item-center vh-100">
            <div class="col-md-12 text-center py-5">
                <img src="https://steamuserimages-a.akamaihd.net/ugc/499143799328359714/EE0470B9BD25872DC95E7973B2C2F7006B7B9FB8/" width="200px" height="100px" alt="">
                <div class="mt-2">
                    <h3>
                        <strong>กำลังโหลด...</strong>
                    </h3>
                </div>
            </div>
        </div>

    </div>




    <!-- Footer -->

    <!-- JS -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Script Popular -->
    <?php include_once('./include_axiosPopular.php') ?>

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')
    </script>

    <script>
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

    <!-- Animation Text Move -->
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
    </script>


</body>

</html>