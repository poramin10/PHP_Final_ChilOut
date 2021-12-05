<?php
include_once('../authen_backend.php');

$number = 0;

$sql_id = "SELECT * FROM `place` LIMIT 50"; 
$result_id = $conn->query($sql_id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data RUN</title>
    <?php include_once('../include/inc_css.php') ?>
</head>

<body>

    <div class="container">
        <h1>Data Upload</h1>

        <div style="height: 550px; overflow: auto;">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อสถานที่ท่องเที่ยว</th>
                        <th scope="col">จังหวัด</th>
                        <th scope="col">สถานะ</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row_id = $result_id->fetch_assoc()) {
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/attraction/' . $row_id['id_place'],
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

                        $place_name = str_replace(array('"', "';yf"), "", json_encode($dataTravel->result->place_name, JSON_UNESCAPED_UNICODE));

                        $address = str_replace('"', "", json_encode($dataTravel->result->location->address, JSON_UNESCAPED_UNICODE));
                        $sub_district = str_replace('"', "", json_encode($dataTravel->result->location->sub_district, JSON_UNESCAPED_UNICODE));
                        $district = str_replace('"', "", json_encode($dataTravel->result->location->district, JSON_UNESCAPED_UNICODE));
                        $province = str_replace('"', "", json_encode($dataTravel->result->location->province, JSON_UNESCAPED_UNICODE));
                        $postcode = str_replace('"', "", json_encode($dataTravel->result->location->postcode, JSON_UNESCAPED_UNICODE));

                        $picture = str_replace('"', "", json_encode($dataTravel->result->thumbnail_url, JSON_UNESCAPED_UNICODE));

                        $introduction = str_replace(array("'", "&quot;"), '', json_encode($dataTravel->result->place_information->introduction, JSON_UNESCAPED_UNICODE));
                        $detail = str_replace(array("'", "&quot;"), '', json_encode($dataTravel->result->place_information->detail, JSON_UNESCAPED_UNICODE));
                        $category = str_replace('"', "", json_encode($dataTravel->result->place_information->attraction_types[0]->description, JSON_UNESCAPED_UNICODE));
                        $activity = str_replace(str_split('\\/:*?"<>|[]'), '', json_encode($dataTravel->result->place_information->activities, JSON_UNESCAPED_UNICODE));
                        
                        if(json_encode($dataTravel->result->place_information->targets, JSON_UNESCAPED_UNICODE) != NULL){
                            $target = str_replace(str_split('\\/:*?"<>|[]'), '', json_encode($dataTravel->result->place_information->targets, JSON_UNESCAPED_UNICODE));
                        }else{
                            $target = '';
                        }

                        $phones = str_replace(str_split('"[]'), '', json_encode($dataTravel->result->contact->phones, JSON_UNESCAPED_UNICODE));
                        $mobiles = str_replace(str_split('"[]'), '', json_encode($dataTravel->result->contact->mobiles, JSON_UNESCAPED_UNICODE));
                        $fax = str_replace(str_split('"<>|[]'), '', json_encode($dataTravel->result->contact->fax, JSON_UNESCAPED_UNICODE));
                        $emails = str_replace(str_split('"[]'), '', json_encode($dataTravel->result->contact->emails, JSON_UNESCAPED_UNICODE));
                        $urls = str_replace(str_split('"[]'), '', json_encode($dataTravel->result->contact->urls, JSON_UNESCAPED_UNICODE));

                        $open = str_replace('"', "", json_encode($dataTravel->result->opening_hours->open_now, JSON_UNESCAPED_UNICODE));

                        if (
                            !isset($dataTravel->result->opening_hours->weekday_text->day1) &&
                            !isset($dataTravel->result->opening_hours->weekday_text->day2) &&
                            !isset($dataTravel->result->opening_hours->weekday_text->day3) &&
                            !isset($dataTravel->result->opening_hours->weekday_text->day4) &&
                            !isset($dataTravel->result->opening_hours->weekday_text->day5) &&
                            !isset($dataTravel->result->opening_hours->weekday_text->day6) &&
                            !isset($dataTravel->result->opening_hours->weekday_text->day7)
                        ) {
                            $times = 'ไม่ได้ระบุเวลาทำการ';
                        } else {
                            $times = json_encode($dataTravel->result->opening_hours->weekday_text->day1->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day1->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day2->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day2->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day3->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day3->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day4->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day4->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day5->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day5->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day6->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day6->time, JSON_UNESCAPED_UNICODE) . ' , ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day7->day, JSON_UNESCAPED_UNICODE) . ' - ' .
                                json_encode($dataTravel->result->opening_hours->weekday_text->day7->time, JSON_UNESCAPED_UNICODE) . ' , ';
                        }
                        $time_all = str_replace('"', "", $times);

                        if (!isset($dataTravel->result->x[0]->description)) {
                            $parking = 'ไม่พบที่จอดรถ';
                        } else {
                            $parking = str_replace('"', "", json_encode($dataTravel->result->x[0]->description, JSON_UNESCAPED_UNICODE));
                        }

                        if (!isset($dataTravel->result->services)) {
                            $service = 'ไม่ได้ระบุ';
                        } else {
                            $service = str_replace('"', "", json_encode($dataTravel->result->services, JSON_UNESCAPED_UNICODE));
                        }

                        if (!isset($dataTravel->result->payment_methods)) {
                            $payment = 'ไม่ได้ระบุ';
                        } else {
                            $payment = str_replace('"', "", json_encode($dataTravel->result->payment_methods, JSON_UNESCAPED_UNICODE));
                        }

                        if (!isset($dataTravel->result->how_to_travel)) {
                            $how_to_tarvel = 'ไม่ได้ระบุ';
                        } else {
                            $how_to_tarvel = str_replace('"', "", json_encode($dataTravel->result->how_to_travel, JSON_UNESCAPED_UNICODE));
                        }

                        $update = str_replace('"', "", json_encode($dataTravel->result->update_date, JSON_UNESCAPED_UNICODE));

                        if (!isset($dataTravel->result)) {
                        } else {

                            $sql_check = "SELECT * FROM `place` WHERE id_place = '" . $row_id['id_place'] . "' AND update_date <> '" . $update . "' ";
                            $result_check = $conn->query($sql_check);

                            if ($result_check->num_rows != 0) {

                                $sql = "UPDATE `place` 
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
                                WHERE  `id_place` = '" . $row_id['id_place'] . "' AND update_date <> '" . $update . "'   ";

                                $number++;
                    ?>
                                <?php
                                // echo $number . ' ' . $place_name . '<br>';
                                $result = $conn->query($sql) or die($conn->error);
                                if ($result) {
                                    $_SESSION['check'] = 'สำเร็จ';
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $number ?></th>
                                        <td><?php echo $place_name ?></td>
                                        <td><?php echo $province ?></td>
                                        <td class="text-success font-weight-bold">ผ่าน</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            <?php
                            } else {
                                $_SESSION['check'] = 'สำเร็จ';
                            }
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <?php if (isset($_SESSION['check'])) { ?>

            <?php
            $sql_updateHistory = "INSERT INTO `manage_place` 
                (`id_manage_place`, 
                `title_manage_place`, 
                `data_manage_place`, 
                `created_manage_place`, 
                `status_manage_place`) 
            VALUES (NULL, 
                'อัพเดตข้อมูล', 
                'อัพเดตข้อมูลสถานที่ท่องเที่ยวจำนวน " . $number . " แห่ง', 
                '" . date('Y-m-d H:i:s') . "', 
                '1');";
            $result_updateHistory = $conn->query($sql_updateHistory);


            $_SESSION['SuccessConfirm'] = 'อัพเดตข้อมูลสำเร็จ';
            $_SESSION['dataConfirm'] = 'อัพเดตข้อมูลสถานที่ท่องเที่ยวจำนวน ' . $number . ' แห่ง';

            header('Location: ./index.php');

            ?>


            <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>สำเร็จ!</strong> คุณอัพเดตข้อมูลสำเร็จ.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->


        <?php } ?>

    </div>



    <?php include_once('../include/inc_js.php') ?>

</body>

</html>