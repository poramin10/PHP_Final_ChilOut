<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<?php
$i = 0;
$num = 0;
$sql_popular = "SELECT * FROM `countertravel` ORDER BY `count_travel` DESC LIMIT 12";
$result_popular = $conn->query($sql_popular);
while ($row_popular = $result_popular->fetch_assoc()) {
    $dataT[$i] = $row_popular['id_travel'];
    $dataNum[$i] = $row_popular['count_travel'];

    // echo '<script type="text/javascript">';

    // echo "dataNum1 = '$dataNum[0]';";
    // echo "dataNum2 = '$dataNum[1]';";
    // echo "dataNum3 = '$dataNum[2]';";
    // echo "dataNum4 = '$dataNum[3]';";
    // echo "dataNum5 = '$dataNum[4]';";
    // echo "dataNum6 = '$dataNum[5]';";
    // echo "dataNum7 = '$dataNum[6]';";
    // echo "dataNum8 = '$dataNum[7]';";
    // echo "dataNum9 = '$dataNum[8]';";
    // echo "dataNum10 = '$dataNum[9]';";
    // echo "dataNum11 = '$dataNum[10]';";
    // echo "dataNum12 = '$dataNum[11]';";

    // echo '</script>';

    $i++;
}
?>
<script>
    fetchData();
    async function fetchData() {
        let numPop = 1;
        var data = [];
        var t = [];


        <?php for ($i = 0; $i <= 11; $i++) {
            $num++;

        ?>

            await axios

                .get(
                    "https://tatapi.tourismthailand.org/tatapi/v5/attraction/<?php echo $dataT[$i] ?>", {
                        headers: {
                            Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
                            "Accept-Language": `TH`,
                        },
                    }
                )
                .then(
                    res => {
                        data = data.concat(res.data.result);
                        console.log(data);

                    }
                ).catch((e) => {
                    console.log(e);
                })

        <?php } ?>

        data.forEach((res) => {
            dataTag = res['place_information']['activities']
            dataArr = [];

            if (dataTag == null) {
                dataArr[0] = '<span class = "badge badge-pill badge-red">ไม่พบข้อมูลกิจกรรม</span>'
            } else {
                for (let i = 0; i < dataTag.length; i++) {
                    dataArr[i] = `<span class = "badge badge-pill badge-pink">${dataTag[i]}</span>`
                }
            }

            dataAll = dataArr.join(" ");
            // console.log(dataAll);
            let dataElm = $("#dataPopular");


            dataElm.append(

                `
                <div class="hover01 column col-md-4 col-sm-6">
                    <div class="card mb-3 h-card" style="height:auto">
                        <figure>
                            <img class="card-img-top" height="250px" src="${res['web_picture_urls'][0]}" alt="Card image cap">
                              <div class="img-popular">
                                <h1 class="text-fixed-popular">${numPop}</h1>
                            </div>
                        </figure>
                        <div class="card-body">  
                            <h3 class="card-title"><strong>${res['place_name']}</strong></h3>
                            <h5 class="text-pink"><strong> จังหวัด ${res['location']['province']} </strong></h5>
                            <p class="card-text">${res['place_information']['introduction']}</p>
                            
                            <hr>
                            <label for=""><b>กิจกรรม</b></label><br>
                                ${dataAll} 
                            <a type="button" href="../Travel/Detail.php?id=${res.place_id}" class="btn btn-danger btn-lg btn-block mt-4">ดูสถานที่ท่องเที่ยว</a>
                        </div>
                    </div>
                </div>
                    `

            )

            numPop++;
        })
    }
</script>