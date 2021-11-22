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

<style>
    body {
        font-family: 'Kanit', sans-serif !important;
    }

    .card-relative {
        position: relative;
    }

    .img-card {
        width: 350px;
        height: 250px;
        background-size: cover;
    }

    .card-color {
        background: linear-gradient(180deg, rgba(0, 0, 0, 0) 53.83%, #000000 100%);
        height: 100%;
    }

    .card-absolute {
        position: absolute;
    }

    .card-text {
        position: absolute;
        bottom: 0;
        padding: 10px;
        color: #fff;
    }

    .img-card {
        transition: transform .2s;
    }

    .img-card:hover {
        opacity: 100 !important;
        margin: 0 auto;
        width: 100%;
        -ms-transform: scale(1.5);
        /* IE 9 */
        -webkit-transform: scale(1.5);
        /* Safari 3-8 */
        transform: scale(1.5);
        transition: transform .2s;
    }

    .img-card:hover .card-color {
        opacity: 0;
    }

    .crop-zoom {
        overflow: hidden;
    }
</style>


<body>
    <!-- Navbar -->
    <?php include_once('../include/navbarV2.php') ?>

    <img src="https://66.media.tumblr.com/61da998c25433a8e769c2e5215f3cb44/tumblr_o7bd22tzma1rzo8x9o1_500.gif" width="100%" height="50%" style="background-size: cover" alt="">

    <div class="bg-img">

    </div>




    




    <!-- Footer -->
    <?php include_once('../include/footer.php') ?>

    <!-- Link -->
    <?php include_once('../include/inc_js_front.php') ?>

    <!-- Sweet Alert -->
    <?php include_once('../include/sweetAlert.php') ?>

    <!-- Script JS -->
    <script src="../assets/Js/scriptNavbar.js"></script>

    <script src="../assets/Js/search/choices.js"></script>
    <script>
        const choices = new Choices('[data-trigger]', {
            searchEnabled: false,
            itemSelectText: '',
        });
    </script>

    <!-- Search สถานที่ท่องเที่ยวด้วย Axios -->

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Axios -->
    <!-- แบบค้นหาข้อมูล -->
    <script>
        async function fetchData() {

            var keyword = document.querySelector(".keyword-TAT");
            var province = document.getElementById('selectValue').value;
            var data = [];
            var check = true;

            if (province == "แสดงจังหวัดทั้งหมด") {
                for (var i = 1; i <= 20; i++) {
                    if (check) {

                        await axios
                            .get(
                                "https://tatapi.tourismthailand.org/tatapi/v5/places/search?keyword=" +
                                keyword.value + "&radius=20&numberOfResult=100&pagenumber=" + i, {
                                    headers: {
                                        Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
                                        "Accept-Language": `TH`,
                                    },
                                }
                            )
                            .then(
                                res => {
                                    if (res.data.result.length > 0) {
                                        data = data.concat(res.data.result);
                                        document.getElementById("notify").hidden = false;
                                    } else {
                                        check = false;
                                    }
                                }
                            ).catch((e) => {
                                document.getElementById("notify").hidden = true;
                                document.getElementById("notData").hidden = false;
                                check = false;
                            })
                    } else {
                        break;
                    }
                }
            } else {
                for (var i = 1; i <= 100; i++) {
                    if (check) {

                        await axios
                            .get(
                                "https://tatapi.tourismthailand.org/tatapi/v5/places/search?keyword=" +
                                keyword.value + "&radius=20&numberOfResult=100&provinceName=" + province + "&pagenumber=" + i, {
                                    headers: {
                                        Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
                                        "Accept-Language": `TH`,
                                    },
                                }
                            )
                            .then(
                                res => {
                                    if (res.data.result.length > 0) {
                                        data = data.concat(res.data.result);
                                        document.getElementById("notify").hidden = false;
                                    } else {
                                        check = false;
                                    }
                                }
                            ).catch((e) => {
                                document.getElementById("notify").hidden = true;
                                document.getElementById("notData").hidden = false;
                                check = false;
                            })
                    } else {
                        break;
                    }
                }
            }

            let dataElm = $("#data");
            document.getElementById("notify").hidden = true;
            console.log(data);
            dataElm.html("");
            data.forEach((res) => {
                if (res.category_code == "ATTRACTION" && res.thumbnail_url != "") {
                    document.getElementById("notData").hidden = true;
                    dataElm.append(`
                    <div class="col-md-4 mt-3 mb-3">
                        <div class="crop-zoom">

                            <div class="card card-relative cardTop">

                                <div class="img-card"
                                    style=" background-image: url('${res.thumbnail_url}');">
                                    <div class="card-color">
                                    </div>
                                </div>

                                <div class="card-text">
                                <h5>${res.place_name}</h5>
                                <p>${res.location['province']}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    `);
                }
            });
        }
    </script>

    <!-- แบบแสดงผลข้อมูลครั้งแรก -->
    <script>
        var data = [];
        <?php
        $sql = "SELECT * FROM `provinces`";
        $result = $conn->query($sql);
        ?>
        <?php while ($row = $result->fetch_assoc()) { ?>

            for (var i = 1; i <= 100; i++) {
                axios
                    .get(
                        "https://tatapi.tourismthailand.org/tatapi/v5/places/search?radius=20&numberOfResult=100&provinceName=<?php echo $row['name_th'] ?>&pagenumber=" + i, {
                            headers: {
                                Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
                                "Accept-Language": `TH`,
                            },
                        }
                    )
                    .then(
                        res => {
                            document.getElementById("notify").hidden = true;
                            // setTimeout(document.getElementById("notify").hidden = true , 3000);

                            data = data.concat(res.data.result);
                            // console.log(data);
                            let dataElm = $("#data");
                            dataElm.html('');

                            let Count = 0;

                            data.forEach((res) => {


                                if (res.category_code == "ATTRACTION" && res.thumbnail_url != "") {

                                    Count++;

                                    document.getElementById("notify").hidden = true;

                                    dataElm.append(`

                                ${Count}) ${res.place_name} || ${res.location['province']} <br>

                                `);

                                }
                            });
                        }
                    ).catch((e) => {
                        document.getElementById("notify").hidden = true;
                        console.log('ไม่เจอ <?php echo $row['name_th'] ?>');
                    })
            }
        <?php } ?>
    </script>

    <!-- ../Travel/Detail.php?id=${res.id_place} -->

</body>

</html>