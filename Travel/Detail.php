<?php
    include_once('../database/connectDB.php');
    $id_travel = $_GET['id'];

    $sql_count = "SELECT * FROM `countertravel` WHERE `id_travel` LIKE '".$id_travel."'";
    $result_count = $conn->query($sql_count);
    if($result_count->num_rows == 1){
        $row_count = $result_count->fetch_assoc();
        $num = $row_count['count_travel'] + 1;
        $sql_update = "UPDATE `countertravel` SET `count_travel` = '".$num."' WHERE `id_travel` LIKE '".$id_travel."'";
        $result_update = $conn->query($sql_update);
        
    }elseif($result_count->num_rows == 0){
        $sql_create = "INSERT INTO `countertravel` (`id_counter`, `id_travel`, `count_travel`) VALUES (NULL, '".$id_travel."', 1);";
        $result_create = $conn->query($sql_create);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Detail</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <!-- Navbar -->
    <?php include_once('../include/navbar.php') ?>

    <!-- แสดงข้อมูลสถานที่ท่องเที่ยว -->
    <div id="dataDetail">

    </div>

    </div>
</body>

</html>


<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var data;
    axios
        .get(
            "https://tatapi.tourismthailand.org/tatapi/v5/attraction/<?php echo $_GET['id'] ?>", {
                headers: {
                    Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
                    "Accept-Language": `TH`,
                },
            }
        )
        .then(
            res => {
                data = res.data.result;
                console.log(data);
                let dataElm = $("#dataDetail");
                dataElm.append(
                    `
                    <div class="container-fulid">
                        <div class="row">
                            <div class="col-md-12">
                                <img class="img-cover" src="${res.data.result['web_picture_urls'][0]}" 
                                style="width: 100%; height:60% "  alt="" no-repeat>      
                            </div>
                        </div>
                    </div>
                    
                    <div class="container ">
                        <div class="row mt-4"> 
                            <div class="col-md-12">
                                <div class="jumbotron jumbotron-fluid card card-travel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class=" text-center mt-4"><b>${res.data.result['place_name']}</b> </h3>
                                                <p class="lead text-center"><span><b>ที่ตั้ง:</b></span> 
                                                ${res.data.result['location']['address']} 
                                                ตำบล ${res.data.result['location']['sub_district']}
                                                อำเภอ ${res.data.result['location']['district']}  
                                                จังหวัด ${res.data.result['location']['province']} 
                                                ${res.data.result['location']['postcode']}
                                                </p>
                                                <br>
                                                <p>${res.data.result['place_information']['introduction']} </p>
                              
                                                <b>ข้อมูลรายละเอียด</b>
                                                <p>&nbsp&nbsp${res.data.result['place_information']['detail'] }</p>
                               
                                                <b>กิจกรรม</b>
                                                <p>&nbsp&nbsp${res.data.result['place_information']['activities'] != null ? res.data.result['place_information']['activities'] : 'ไม่พบกิจกรรม'}</p>
                                                <b>เหมาะสำหรับ</b>
                                                <p>&nbsp&nbsp${res.data.result['place_information']['targets'] != null ? res.data.result['place_information']['targets'] : 'ไม่พบข้อมูล'}</p>
                                                <b>การเดินทาง</b>
                                                <p>&nbsp&nbsp${res.data.result['how_to_travel']!= '' ? res.data.result['how_to_travel'] : 'ไม่พบข้อมูล'}</p>
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <b>วันทำการ</b>
                                                <p>
                                                    &nbsp&nbsp จันทร์
                                                    &nbsp&nbsp${res.data.result['opening_hours']['weekday_text']['day1'] != null ? res.data.result['opening_hours']['weekday_text']['day1']['time'] : 'ไม่พบเวลา'}
                                                    <br>
                                                
                                                    &nbsp&nbsp อังคาร
                                                    &nbsp&nbsp${res.data.result['opening_hours']['weekday_text']['day2'] != null ? res.data.result['opening_hours']['weekday_text']['day2']['time'] : 'ไม่พบเวลา'}
                                                    <br>
                                                
                                                    &nbsp&nbsp พุธ
                                                    &nbsp&nbsp${res.data.result['opening_hours']['weekday_text']['day3'] != null ? res.data.result['opening_hours']['weekday_text']['day1']['time'] : 'ไม่พบเวลา'}
                                                    <br>

                                                    &nbsp&nbsp พฤหัสบดี
                                                    &nbsp&nbsp${res.data.result['opening_hours']['weekday_text']['day4'] != null ? res.data.result['opening_hours']['weekday_text']['day1']['time'] : 'ไม่พบเวลา'}
                                                    <br>

                                                    &nbsp&nbsp ศุกร์
                                                    &nbsp&nbsp${res.data.result['opening_hours']['weekday_text']['day5'] != null ? res.data.result['opening_hours']['weekday_text']['day1']['time'] : 'ไม่พบเวลา'}
                                                    <br>

                                                    &nbsp&nbsp เสาร์
                                                    &nbsp&nbsp${res.data.result['opening_hours']['weekday_text']['day6'] != null ? res.data.result['opening_hours']['weekday_text']['day1']['time'] : 'ไม่พบเวลา'}
                                                    <br>

                                                    &nbsp&nbsp อาทิตย์
                                                    &nbsp&nbsp${res.data.result['opening_hours']['weekday_text']['day7'] != null ? res.data.result['opening_hours']['weekday_text']['day1']['time'] : 'ไม่พบเวลา'}
                                                    <br>
                                                </p>

                                            </div>
                                            <div class="col-md-3">
                                                <b>ข้อมูลติดต่อ</b><br>
                                                <label for="">เบอร์โทรศัพท์</label>
                                                ${res.data.result['contact']['phones'] != null ? res.data.result['contact']['phones'] : 'ไม่มี'} <br>
                                                <label for="">เบอร์มือถือ</label>
                                                ${res.data.result['contact']['mobiles'] != null ? res.data.result['contact']['mobiles'] : 'ไม่มี'} <br>
                                                <label for="">แฟกซ์</label>
                                                ${res.data.result['contact']['fax'] != null ? res.data.result['contact']['fax'] : 'ไม่มี'} <br>
                                                <label for="">อีเมล์</label>
                                                ${res.data.result['contact']['emails'] != null ? res.data.result['contact']['emails'] : 'ไม่มี'} <br>
                                                <label for="">เว็บไซต์</label>
                                                ${res.data.result['contact']['urls'] != null ? res.data.result['contact']['urls'] : 'ไม่มี'} <br>

                                            </div>
                                            <div class="col-md-6">
                                            <iframe style="width: 500px ; height: 400px" 
                                            src='https://map.longdo.com/snippet/iframe.php?locale=th&zoom=10&mode=icons&map=epsg3857&zoombar=yes&toolbar=no&mapselector=no&scalebar=yes
                                            &search=${res.data.result['place_name']}' frameborder="0"></iframe>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
    
                    `
                )

            }

        )
</script>