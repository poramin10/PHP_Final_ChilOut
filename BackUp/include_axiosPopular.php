<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<?php
$i = 0;
$num = 0;
$sql_popular = "SELECT * FROM `countertravel` ORDER BY `count_travel` DESC LIMIT 12";
$result_popular = $conn->query($sql_popular);
while ($row_popular = $result_popular->fetch_assoc()) {
    $dataT[$i] = $row_popular['id_travel'];
    $dataNum[$i] = $row_popular['count_travel'];
    $i++;
}
$dataAllView = join(',', $dataNum);
?>

<!-- ส่งค่าจาก PHP ให้ Javascript -->
<script>
    var check = '<?= $dataAllView ?>'
    var view = check.split(",");
    // console.log('check '+check)
    // console.log('arr '+view[0])
</script>


<script>
    fetchData();
    async function fetchData() {
        let numPop = 1;
        var data = [];
        var t = []; 


        <?php for ($i = 0; $i < 12; $i++) {
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


        data.forEach((res, idx) => {
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
                <div class="hover01 column col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card mb-3 h-card h-100">
                        <figure>
                            <img class="card-img-top" height="250px" src="${res['web_picture_urls'][0]}" alt="Card image cap">
                            <div class="img-popular2">
                                <img src="../assets/img/medal.png" width="80px" height="80px" alt="">
                            </div> 
                              <div class="img-popular">
                                 <h3 class="text-fixed-popular">${numPop}</h3>
                              </div>
                        </figure>
                        <div class="text-center"><small>---- ยอดผู้เข้าชม ${view[numPop-1]} ----</small> </div> 
                        <div class="card-body"> 
                        
                            
                            <h3 class="card-title"><strong>${res['place_name']}</strong></h3>
                            <h5 class="text-pink"><strong> จังหวัด ${res['location']['province']} </strong></h5>
                            <p class="card-text">${res['place_information']['introduction']}</p>
                            
                            <hr>
                            <label for=""><b>กิจกรรม</b> </label><br>
                                ${dataAll} 
                           

                         </div>  
                         <div class="card-footer d-flext flex-column">

                            <div class="mt-auto">
                                    <a href="../Travel/Detail.php?id=${res.place_id}">
                                        <button type="button" class="button btn btn-danger btn-lg btn-block mt-4">
                                            <span> ดูสถานที่ท่องเที่ยว</span>
                                        </button>
                                    </a>
                                </div>
                            </div>

                    </div>
                </div>
                    `

            )
            document.getElementById("notify").hidden = true;
            numPop++;

        })

    }
</script>