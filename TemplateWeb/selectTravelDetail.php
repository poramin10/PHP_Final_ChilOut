<?php
require_once('../authen_frontend.php');

// header('Content-Type: application/json');
$number = 0;

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/attraction/P03014326',
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
    echo $number . ")  ";
    echo "<b>รหัสสถานที่:</b> ".json_encode($dataTravel->result->id_place, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>ชื่อสถานที่:</b> ".json_encode($dataTravel->result->place_name, JSON_UNESCAPED_UNICODE) . '<br>';
    
    // echo "<h3><b>ข้อมูลสถานที่ตั้ง</b></h3>";
    echo "<b>ที่ตั้ง:</b> ".json_encode($dataTravel->result->location->address, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>ตำบล:</b> ".json_encode($dataTravel->result->location->sub_district, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>อำเภอ:</b> ".json_encode($dataTravel->result->location->district, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>จังหวัดสถานที่:</b> ".json_encode($dataTravel->result->location->province, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>รหัสไปรษณีย์:</b> ".json_encode($dataTravel->result->location->postcode, JSON_UNESCAPED_UNICODE) . '<br>';
    
    // echo "<h3><b>ข้อมูลสถานที่ท่องเที่ยว</b></h3>";
    echo "<b>รูปภาพ:</b> ".json_encode($dataTravel->result->thumbnail_url, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>Introduction:</b> ".json_encode($dataTravel->result->place_information->introduction, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>รายละเอียด:</b> ".json_encode($dataTravel->result->place_information->detail, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>ประเภท:</b> ".json_encode($dataTravel->result->place_information->attraction_types[0]->description, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>กิจกรรม:</b> ".json_encode($dataTravel->result->place_information->activities, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>เหมาะสำหรับ:</b> ".json_encode($dataTravel->result->place_information->targets, JSON_UNESCAPED_UNICODE) . '<br>';
    
    // echo "<h3><b>ข้อมูลติดต่อ</b></h3>";
    echo "<b>เบอร์ติดต่อ:</b> ".json_encode($dataTravel->result->contact->phones, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>เบอร์มือถือ:</b> ".json_encode($dataTravel->result->contact->mobiles, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>Fax:</b> ".json_encode($dataTravel->result->contact->fax, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>Email:</b> ".json_encode($dataTravel->result->contact->emails, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<b>Website:</b> ".json_encode($dataTravel->result->contact->urls, JSON_UNESCAPED_UNICODE) . '<br>';   
    
    // echo "<h3><b>เวลาทำการ</b></h3>";
    echo "<b>กำลังทำการ:</b> ".json_encode($dataTravel->result->opening_hours->open_now, JSON_UNESCAPED_UNICODE) . '<br>';   

    if(
        !isset($dataTravel->result->opening_hours->weekday_text->day1) &&
        !isset($dataTravel->result->opening_hours->weekday_text->day2) &&
        !isset($dataTravel->result->opening_hours->weekday_text->day3) &&
        !isset($dataTravel->result->opening_hours->weekday_text->day4) &&
        !isset($dataTravel->result->opening_hours->weekday_text->day5) &&
        !isset($dataTravel->result->opening_hours->weekday_text->day6) &&
        !isset($dataTravel->result->opening_hours->weekday_text->day7) 
    
    ){
        echo '<b>กำลังทำการ:</b> ไม่พบ';
    }else{
        echo "<b>กำลังทำการ:</b> ".json_encode($dataTravel->result->opening_hours->weekday_text->day1->day, JSON_UNESCAPED_UNICODE).' - '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day1->time, JSON_UNESCAPED_UNICODE).' , '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day2->day, JSON_UNESCAPED_UNICODE).' - '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day2->time, JSON_UNESCAPED_UNICODE).' , '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day3->day, JSON_UNESCAPED_UNICODE).' - '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day3->time, JSON_UNESCAPED_UNICODE).' , '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day4->day, JSON_UNESCAPED_UNICODE).' - '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day4->time, JSON_UNESCAPED_UNICODE).' , '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day5->day, JSON_UNESCAPED_UNICODE).' - '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day5->time, JSON_UNESCAPED_UNICODE).' , '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day6->day, JSON_UNESCAPED_UNICODE).' - '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day6->time, JSON_UNESCAPED_UNICODE).' , '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day7->day, JSON_UNESCAPED_UNICODE).' - '.
        json_encode($dataTravel->result->opening_hours->weekday_text->day7->time, JSON_UNESCAPED_UNICODE).' , '.

       '<br>';   
    }
  

    // echo "<h3><b>อื่นๆ</b></h3>";
    echo "<b>ที่จอดรถ:</b> ".json_encode($dataTravel->result->x[0]->description, JSON_UNESCAPED_UNICODE) . '<br>';  
    echo "<b>บริการ:</b> ".json_encode($dataTravel->result->services, JSON_UNESCAPED_UNICODE) . '<br>';  
    echo "<b>วิธีการจ่าย:</b> ".json_encode($dataTravel->result->payment_methods, JSON_UNESCAPED_UNICODE) . '<br>';  
    echo "<b>วิธีการเดินทาง:</b> ".json_encode($dataTravel->result->how_to_travel, JSON_UNESCAPED_UNICODE) . '<br>';  
    
    echo "<b>วันที่ Update:</b> ".json_encode($dataTravel->result->update_date, JSON_UNESCAPED_UNICODE) . '<br>';
    echo "<hr>";
    $number++;
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