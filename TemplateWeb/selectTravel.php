<?php
require_once('../authen_frontend.php');

// header('Content-Type: application/json');
$number = 0;

for ($page = 0; $page <= 80; $page++) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/places/search?&provinceName=กรุงเทพมหานคร&radius=20&numberOfResult=100&pagenumber=' . $page,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2',
            'Accept-Language: th'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $dataTravel = json_decode($response);

    if (!isset($dataTravel->result)) {
    } else {
        for ($i = 0; $i < count($dataTravel->result); $i++) {
            if ($dataTravel->result[$i]->category_code == 'ATTRACTION' && $dataTravel->result[$i]->thumbnail_url != "") {
                echo $number.")  ";

                $id_place = str_replace('"',"",json_encode($dataTravel->result[$i]->id_place, JSON_UNESCAPED_UNICODE));
                $place_name = str_replace('"',"",json_encode($dataTravel->result[$i]->place_name, JSON_UNESCAPED_UNICODE));
                $location_address = str_replace('"',"",json_encode($dataTravel->result[$i]->location->address, JSON_UNESCAPED_UNICODE));


                $sql_insert = "INSERT INTO `place` (
                    `id_travel`, 
                    `id_place`
                ) VALUES (NULL, 
                    '".$id_place."'
                    );";
                $result_insert = $conn->query($sql_insert);

                echo "รหัสสถานที่: ".json_encode($dataTravel->result[$i]->id_place, JSON_UNESCAPED_UNICODE) . '<br>';
                echo "ชื่อสถานที่: ".json_encode($dataTravel->result[$i]->place_name, JSON_UNESCAPED_UNICODE) . '<br>';
                echo "ที่ตั้ง: ".json_encode($dataTravel->result[$i]->location->address, JSON_UNESCAPED_UNICODE) . '<br>';
                echo "ตำบล: ".json_encode($dataTravel->result[$i]->location->sub_district, JSON_UNESCAPED_UNICODE) . '<br>';
                echo "อำเภอ: ".json_encode($dataTravel->result[$i]->location->district, JSON_UNESCAPED_UNICODE) . '<br>';
                echo "จังหวัดสถานที่: ".json_encode($dataTravel->result[$i]->location->province, JSON_UNESCAPED_UNICODE) . '<br>';
                echo "รหัสไปรษณีย์: ".json_encode($dataTravel->result[$i]->location->postcode, JSON_UNESCAPED_UNICODE) . '<br>';
                echo "รูปภาพ: ".json_encode($dataTravel->result[$i]->thumbnail_url, JSON_UNESCAPED_UNICODE) . '<br>';
                echo "วันที่ Update: ".json_encode($dataTravel->result[$i]->update_date, JSON_UNESCAPED_UNICODE) . '<br>';

                echo "<hr>";
                
                $number++;
            }
        }
    }
}










// echo $dataTravel->result[0];
// print_r($dataTravel);

// echo count($dataTravel->result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


</body>

</html>