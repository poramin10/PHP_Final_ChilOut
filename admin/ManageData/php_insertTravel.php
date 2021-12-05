<?php
include_once('../authen_backend.php');
$_SESSION['Check'] = 'ไม่สำเร็จ';

// header('Content-Type: application/json');
$number = 0;

$sql = "SELECT * FROM `provinces` LIMIT 10";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    for ($page = 0; $page <= 1; $page++) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/places/search?&provinceName=' . $row['name_th'] . '&radius=20&numberOfResult=100&pagenumber=' . $page,
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

                
                    $id_place = str_replace('"', "", json_encode($dataTravel->result[$i]->place_id, JSON_UNESCAPED_UNICODE));

                    $sql_check = "SELECT * FROM `place` WHERE id_place = '" . $id_place . "';";
                    $result_check = $conn->query($sql_check);

                    if ($result_check->num_rows == 0) {
                        echo "เจอ";
                        echo $number . '<br>';
                        echo "id: " . $id_place . '<br>';
                        echo "ชื่อสถานที่: " . json_encode($dataTravel->result[$i]->place_name, JSON_UNESCAPED_UNICODE) . '<br>';
                        echo "จังหวัดสถานที่: " . json_encode($dataTravel->result[$i]->location->province, JSON_UNESCAPED_UNICODE) . '<br>';
                        echo "ที่ตั้ง: " . json_encode($dataTravel->result[$i]->location->address, JSON_UNESCAPED_UNICODE) . '<br>';
                        echo '<hr>';

                        $sql_insert = "INSERT INTO `place` (
                            `id_travel`, 
                            `id_place`
                                ) VALUES (NULL, 
                            '" . $id_place . "'
                            );";
                        $result_insert = $conn->query($sql_insert);
                        if ($result_insert) {

                            $curl2 = curl_init();
                            curl_setopt_array($curl2, array(
                                CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/attraction/' . $id_place,
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

                            $response2 = curl_exec($curl2);

                            curl_close($curl2);
                            $dataTravel2 = json_decode($response2);

                            $place_name = str_replace(array('"', "';yf"), "", json_encode($dataTravel2->result->place_name, JSON_UNESCAPED_UNICODE));

                            $address = str_replace('"', "", json_encode($dataTravel2->result->location->address, JSON_UNESCAPED_UNICODE));
                            $sub_district = str_replace('"', "", json_encode($dataTravel2->result->location->sub_district, JSON_UNESCAPED_UNICODE));
                            $district = str_replace('"', "", json_encode($dataTravel2->result->location->district, JSON_UNESCAPED_UNICODE));
                            $province = str_replace('"', "", json_encode($dataTravel2->result->location->province, JSON_UNESCAPED_UNICODE));
                            $postcode = str_replace('"', "", json_encode($dataTravel2->result->location->postcode, JSON_UNESCAPED_UNICODE));

                            $picture = str_replace('"', "", json_encode($dataTravel2->result->thumbnail_url, JSON_UNESCAPED_UNICODE));

                            $introduction = str_replace(array("'", "&quot;"), '', json_encode($dataTravel2->result->place_information->introduction, JSON_UNESCAPED_UNICODE));
                            $detail = str_replace(array("'", "&quot;"), '', json_encode($dataTravel2->result->place_information->detail, JSON_UNESCAPED_UNICODE));
                            $category = str_replace('"', "", json_encode($dataTravel2->result->place_information->attraction_types[0]->description, JSON_UNESCAPED_UNICODE));
                            $activity = str_replace(str_split('\\/:*?"<>|[]'), '', json_encode($dataTravel2->result->place_information->activities, JSON_UNESCAPED_UNICODE));

                            if (json_encode($dataTravel2->result->place_information->targets, JSON_UNESCAPED_UNICODE) != NULL) {
                                $target = str_replace(str_split('\\/:*?"<>|[]'), '', json_encode($dataTravel2->result->place_information->targets, JSON_UNESCAPED_UNICODE));
                            } else {
                                $target = '';
                            }

                            $phones = str_replace(str_split('"[]'), '', json_encode($dataTravel2->result->contact->phones, JSON_UNESCAPED_UNICODE));
                            $mobiles = str_replace(str_split('"[]'), '', json_encode($dataTravel2->result->contact->mobiles, JSON_UNESCAPED_UNICODE));
                            $fax = str_replace(str_split('"<>|[]'), '', json_encode($dataTravel2->result->contact->fax, JSON_UNESCAPED_UNICODE));
                            $emails = str_replace(str_split('"[]'), '', json_encode($dataTravel2->result->contact->emails, JSON_UNESCAPED_UNICODE));
                            $urls = str_replace(str_split('"[]'), '', json_encode($dataTravel2->result->contact->urls, JSON_UNESCAPED_UNICODE));

                            $open = str_replace('"', "", json_encode($dataTravel2->result->opening_hours->open_now, JSON_UNESCAPED_UNICODE));

                            if (
                                !isset($dataTravel2->result->opening_hours->weekday_text->day1) &&
                                !isset($dataTravel2->result->opening_hours->weekday_text->day2) &&
                                !isset($dataTravel2->result->opening_hours->weekday_text->day3) &&
                                !isset($dataTravel2->result->opening_hours->weekday_text->day4) &&
                                !isset($dataTravel2->result->opening_hours->weekday_text->day5) &&
                                !isset($dataTravel2->result->opening_hours->weekday_text->day6) &&
                                !isset($dataTravel2->result->opening_hours->weekday_text->day7)
                            ) {
                                $times = 'ไม่ได้ระบุเวลาทำการ';
                            } else {
                                $times = json_encode($dataTravel2->result->opening_hours->weekday_text->day1->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day1->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day2->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day2->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day3->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day3->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day4->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day4->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day5->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day5->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day6->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day6->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day7->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                    json_encode($dataTravel2->result->opening_hours->weekday_text->day7->time, JSON_UNESCAPED_UNICODE) . ' , ';
                            }
                            $time_all = str_replace('"', "", $times);

                            if (!isset($dataTravel2->result->x[0]->description)) {
                                $parking = 'ไม่พบที่จอดรถ';
                            } else {
                                $parking = str_replace('"', "", json_encode($dataTravel2->result->x[0]->description, JSON_UNESCAPED_UNICODE));
                            }

                            if (!isset($dataTravel2->result->services)) {
                                $service = 'ไม่ได้ระบุ';
                            } else {
                                $service = str_replace('"', "", json_encode($dataTravel2->result->services, JSON_UNESCAPED_UNICODE));
                            }

                            if (!isset($dataTravel2->result->payment_methods)) {
                                $payment = 'ไม่ได้ระบุ';
                            } else {
                                $payment = str_replace('"', "", json_encode($dataTravel2->result->payment_methods, JSON_UNESCAPED_UNICODE));
                            }

                            if (!isset($dataTravel2->result->how_to_travel)) {
                                $how_to_tarvel = 'ไม่ได้ระบุ';
                            } else {
                                $how_to_tarvel = str_replace('"', "", json_encode($dataTravel2->result->how_to_travel, JSON_UNESCAPED_UNICODE));
                            }

                            $update = str_replace('"', "", json_encode($dataTravel2->result->update_date, JSON_UNESCAPED_UNICODE));

                            if (!isset($dataTravel2->result)) {
                            } else {

                                $sql_update = "UPDATE `place` 
                                    SET 
                                    `place_name` = '" . $place_name . "',
                                    `address` = '" . $address . "', 
                                    `sub_district` = '" . $sub_district . "', 
                                    `district` = '" . $district . "',
                                    `province` = '" . $province . "',
                                    `postcode` = '" . $postcode . "',
                                    `picture` = '" . $picture . "',
                                    `Introduction` = '" . $introduction . "',
                                    `detail` = '" . $detail . "',
                                    `category` = '" . $category . "',
                                    `activitie` = '" . $activity . "',
                                    `target` = '" . $target . "',
                                    `phones` = '" . $phones . "',
                                    `mobiles` = '" . $mobiles . "',
                                    `fax` = '" . $fax . "',
                                    `emails` = '" . $emails . "',
                                    `urls` = '" . $urls . "',
                                    `open_now` = '" . $open . "',
                                    `times` = '" . $time_all . "',
                                    `parking` = '" . $parking . "',
                                    `services` = '" . $service . "',
                                    `payment` = '" . $payment . "',
                                    `how_to_travel` = '" . $how_to_tarvel . "',
                                    `update_date` = '" . $update . "' 
                                    WHERE  `id_place` = '" . $id_place . "'  ";

                                $number++;
?>
                                <?php
                                // echo $number . ' ' . $place_name . '<br>';
                                $result_update = $conn->query($sql_update) or die($conn->error);
                                if ($result_update) {
                                    $_SESSION['Check'] = 'สำเร็จ';
                                }
                                ?>
<?php
                            }
                        }
                    }
                }
            }
        }
    }
}

if ($_SESSION['Check'] == 'สำเร็จ') {
    // echo 'เพิ่มข้อมูลสถานที่ท่องเที่ยวจำนวน ' . $number . ' แห่ง';

    $sql_updateHistory = "INSERT INTO `manage_place` 
    (`id_manage_place`, 
    `title_manage_place`, 
    `data_manage_place`, 
    `created_manage_place`, 
    `status_manage_place`) 
VALUES (NULL, 
    'เพิ่มข้อมูลสำเร็จ', 
    'เพิ่มข้อมูลสถานที่ท่องเที่ยวจำนวน " . $number . " แห่ง', 
    '" . date('Y-m-d H:i:s') . "', 
    '1');";
    $result_updateHistory = $conn->query($sql_updateHistory) or die($conn->error);

    $_SESSION['SuccessConfirm'] = 'เพิ่มข้อมูลสำเร็จ';
    $_SESSION['dataConfirm'] = 'เพิ่มข้อมูลสถานที่ท่องเที่ยวจำนวน ' . $number . ' แห่ง';
    header('Location: ./index.php');
} else {

    $sql_updateHistory = "INSERT INTO `manage_place` 
    (`id_manage_place`, 
    `title_manage_place`, 
    `data_manage_place`, 
    `created_manage_place`, 
    `status_manage_place`) 
VALUES (NULL, 
    'เพิ่มข้อมูลสำเร็จ', 
    'ไม่พบข้อมูลสถานที่ท่องเที่ยวที่ใหม่กว่า', 
    '" . date('Y-m-d H:i:s') . "', 
    '1');";
    $result_updateHistory = $conn->query($sql_updateHistory);

    $_SESSION['SuccessConfirm'] = 'เพิ่มข้อมูลสำเร็จ';
    $_SESSION['dataConfirm'] = 'ไม่พบข้อมูลสถานที่ท่องเที่ยวที่ใหม่กว่า';
    header('Location: ./index.php');
}


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