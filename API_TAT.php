<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TestAPI</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<style>
    * {
        font-family: 'Kanit', sans-serif;
    }

    body {
        background: #00c6ff;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #0072ff, #00c6ff);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .jumbotron {
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        background-color: #e9ecef;
        border-radius: .3rem;
    }

    #data {
        min-height: 30vh;
    }
</style>

<body>
    <div class="bg-light p-5 rounded-lg m-3">
        <h1 class="display-4">API การท่องเที่ยว</h1>
        <p class="lead">ตัวทดสอบ</p>
        <hr class="my-4">
        <div class="row">
            <div class="input-group mb-3">
                <input type="text" class="form-control keyword-TAT" placeholder="ใส่คีย์เวิร์ดเพื่อค้นหาข้อมูล">
                <button class="btn btn-outline-success" type="button" onclick="fetchData()">ค้นหา</button>
            </div>
        </div>
    </div>
    <h2 class="text-center">ผลลัพท์</h2>
    <hr>
    <div class="container">
        <div class="row pb-5 mb-4 " id="data">
        </div>
    </div>
    <footer class="bg-dark text-center text-white py-4 mt-4">
        คณะวิทยาศาสตร์ และเทคโนโลยี<br>
        มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี
        </a>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function fetchData() {
            var keyword = document.querySelector(".keyword-TAT");
            axios
                .get(
                    "https://tatapi.tourismthailand.org/tatapi/v5/places/search?keyword=" +
                    keyword.value + "&categories=Attraction", {
                        headers: {
                            Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
                            "Accept-Language": `TH`,
                        },
                    }
                )
                .then((res) => {
                    let data = res.data.result;
                    let dataElm = $("#data");
                    dataElm.html("");
                    data.forEach((res) => {
                        if (res.category_code == "ATTRACTION") {
                            dataElm.append(` <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 mt-3">
            <div class="card rounded shadow-sm border-0">
                    <div class="card-body p-4"><img src="${
                      res.thumbnail_url ||
                      "https://piotrkowalski.pw/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png"
                    }" alt="" class="img-fluid d-block mx-auto mb-3">
                        <h5> <a href="#" class="text-dark">${
                          res.place_name
                        }</a></h5>
                        <p class="small text-muted font-italic">${
                          res.destination  
                        }</p>
                        <ul class="list-inline small">
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-success"></i></li>
                    </ul>
                        <a href="#" class="btn btn-success d-block">ดูเพิ่มเติม</a>
                    </div>
                </div> 
                </div>
                    `);
                        }

                    });
                });
        }
    </script>
</body>

</html>