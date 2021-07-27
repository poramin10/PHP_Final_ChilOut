<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<?php
$i = 0;
$num = 0;
$sql_popular = "SELECT * FROM `countertravel` ORDER BY `count_travel` DESC LIMIT 12";
$result_popular = $conn->query($sql_popular);
while ($row_popular = $result_popular->fetch_assoc()) {
    $dataT[$i] = $row_popular['id_travel'];
    $i++;
}
?>
<script>
    var data;
    <?php for ($i = 0; $i <= 11; $i++) { 
        $num++;
        
    ?>
        axios
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
                    data = res.data.result;
                    dataTag = res.data.result['place_information']['activities']
                    console.log(dataTag);
                    dataArr = [];
                    if (dataTag == null) {
                        dataArr[0] = '<span class = "badge badge-pill badge-red">ไม่พบข้อมูลกิจกรรม</span>'
                    } else {
                        for (let i = 0; i < dataTag.length; i++) {
                            dataArr[i] = `<span class = "badge badge-pill badge-pink">${dataTag[i]}</span>`
                        }
                    }
                    dataAll = dataArr.join(" ");

                    let dataElm = $("#dataPopular");
                    dataElm.append(
                        `
                            <div class="hover01 column col-md-4 col-sm-6"">
                                <div class="card mb-3 h-card"  style="height: auto">
                                    <figure>
                                        <img class="card-img-top" height="250px" src="${res.data.result['web_picture_urls'][0]}" alt="Card image cap">
                                    </figure>
                                    <div class="card-body" >
                                    
                                        <h3 class="card-title"><strong>${res.data.result['place_name']}</strong></h3>
                                        <h5 class="text-pink"><strong> จังหวัด ${res.data.result['location']['province']} </strong></h5>
                                        <p class="card-text">${res.data.result['place_information']['introduction']}</p>
                                        <hr>
                                        <label for=""><b>กิจกรรม</b></label><br>
                                      
                                            ${dataAll} 
                                       
                                        <a type="button" href="../Travel/Detail.php?id=${res.data.result.place_id}" class="btn btn-primary btn-lg btn-block mt-4">ดูสถานที่ท่องเที่ยว</a>
                                    </div>
                                </div>
                            </div>
                    `
                    )
                }
            )
            .catch((e) => {
                console.log(e);
            })
    <?php } ?>
</script>
