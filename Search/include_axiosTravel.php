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
        console.log("คลิ๊ก");
        var keyword = document.querySelector(".keyword-TAT");
        var province = document.getElementById('selectValue').value;
        var data = [];
        var check = true;

        if (province == "แสดงจังหวัดทั้งหมด") {
            for (var i = 1; i <= 10; i++) {
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
            for (var i = 1; i <= 10; i++) {
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
                dataElm.append(`<div class="col-md-4 mt-4 col-sm-12">
                    <div class="col">
                        <center>
                            <div class="card card-shadow mt-4 h-100">
                            <div class="img-hover-zoom img-hover-zoom--xyz">
                                <img src="${
                      res.thumbnail_url ||
                      "https://blackmantkd.com/wp-content/uploads/2017/04/default-image-300x225.jpg"
                    }" class="card-img-top" alt="..." width="350px" height="200px">
                            </div>
                            
                                <div class="card-body">
                              
                                    <h5 class="card-title">
                                    <b>${
                                    res.place_name
                                    }</b>
                                    </h5>
                                    <hr>
                                    <p class="card-text" style="color: #FA6476">${
                                    res.location['province']
                                    }</p>
                                    <a  href="../Travel/Detail.php?id=${res.place_id}" class="btn btn-primary ">อ่านรายละเอียด</a>
                                    
                                </div>
                            </div>
                            </center>
                    </div>
            </div>
                    `);
            }

        });

    }
</script>

<!-- แบบแสดงผลข้อมูลครั้งแรก -->
<script>
    var keyword = document.querySelector(".keyword-TAT");
    console.log(document.getElementById('selectValue').value);
    var data = [];

    for (var i = 1; i <= 12; i++) {

        axios
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
                    document.getElementById("notify").hidden = true;
                    // setTimeout(document.getElementById("notify").hidden = true , 3000);

                    data = data.concat(res.data.result);
                    console.log(data);
                    let dataElm = $("#data");
                    dataElm.html('');
                    data.forEach((res) => {

                        if (res.category_code == "ATTRACTION" && res.thumbnail_url != "") {

                            document.getElementById("notify").hidden = true;

                            dataElm.append(`

                <div class="col-md-4 mt-4 col-sm-12">
                    <div class="col">
                        <center> 
                            <div class="card card-shadow mt-4 h-100">
                            <div class="img-hover-zoom img-hover-zoom--xyz">
                                <img src="${
                      res.thumbnail_url ||
                      "https://blackmantkd.com/wp-content/uploads/2017/04/default-image-300x225.jpg"
                    }" class="card-img-top" alt="..." width="350px" height="200px">
                           </div>
                           
                                <div class="card-body">
                                    <h5 class="card-title"><b>${
                                    res.place_name
                                    }</b></h5>
                                    <hr>
                                    <p class="card-text" style="color: #FA6476">${
                                    res.location['province']
                                    }</p>
                                   
                                    <a onClick="ClickCount('${res.place_id}')" name="submit" href="../Travel/Detail.php?id=${res.place_id}" class="btn btn-primary ">อ่านรายละเอียด</a>
                                </div>
                            </div>
                            </center>
                    </div>
            </div>
                    `);
                        }
                    });
                }
            ).catch((e) => {
                document.getElementById("notify").hidden = true;
                console.log(e);
            })
    }
</script>

<!-- ../Travel/Detail.php?id=${res.place_id} -->