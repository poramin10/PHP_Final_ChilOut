<?php

session_start();
include_once('../database/connectDB.php');

if (isset($_POST['submitChoice1'])) {

    // เพศ
    $_SESSION['Recom']['gender_recom'] = $_POST['gender_recom'];
    if (!isset($_POST['gender_recom'])) {
        $_SESSION['validate_gender'] = 'กรุณากรอกข้อมูล';
        $check_number1 = false;
    } else {
        $_SESSION['validate_gender'] = NULL;
        $_SESSION['Recom']['gender_recom'] = $_POST['gender_recom'];
        $check_number1 = true;
    }

    // อายุ
    $_SESSION['Recom']['age_recom'] = $_POST['age_recom'];

    // การศึกษา
    $_SESSION['Recom']['education_recom'] = $_POST['education_recom'];

    // อาชีพ
    $_SESSION['Recom']['career_recom'] = $_POST['career_recom'];

    // เงินเดือน
    $_SESSION['Recom']['salary_recom'] = $_POST['salary_recom'];

    if ($check_number1 == 'true') {
        $_SESSION['page1'] = true;
        header("Location: ./page2.php");
        // print_r($_SESSION['Recom']);
    } else {
        header("Location: ./page1.php");
    }
}

if (isset($_POST['submitChoice2'])) {

    $check_number1 = false;
    $check_number2 = false;
    $check_number3 = false;
    $check_number4 = false;
    $check_number5 = false;

    if (!isset($_POST['objective_recom'])) {
        $_SESSION['validate_objective'] = 'กรุณากรอกข้อมูล';
        $_SESSION['objective_recom'] = NULL;
        $check_number1 = false;
    } else {
        $_SESSION['validate_objective'] = NULL;
        $_SESSION['Recom']['objective_recom'] = $_POST['objective_recom'];
        $check_number1 = true;
    }
    if (!isset($_POST['car_recom'])) {
        $_SESSION['validate_car'] = 'กรุณากรอกข้อมูล';
        $check_number2 = false;
    } else {
        $_SESSION['validate_car'] = NULL;
        $_SESSION['Recom']['car_recom'] = $_POST['car_recom'];
        $check_number2 = true;
    }

    if (!isset($_POST['friend_recom'])) {
        $_SESSION['validate_friend'] = 'กรุณากรอกข้อมูล';
        $check_number3 = false;
    } else {
        $_SESSION['validate_friend'] = NULL;
        $_SESSION['Recom']['friend_recom'] = $_POST['friend_recom'];
        $check_number3 = true;
    }

    if (!isset($_POST['planning_recom'])) {
        $_SESSION['validate_planning'] = 'กรุณากรอกข้อมูล';
        $_SESSION['planning_recom'] = NULL;
        $check_number4 = false;
    } else {
        $_SESSION['validate_planning'] = NULL;
        $_SESSION['Recom']['planning_recom'] = $_POST['planning_recom'];
        $check_number4 = true;
    }
    if (
        $check_number1 == 'true' &&
        $check_number2 == 'true' &&
        $check_number3 == 'true' &&
        $check_number4 == 'true'
    ) {
        $_SESSION['page2'] = true;

        header("Location: ./page3.php");
    } else {
        header("Location: ./page2.php");
    }
}

if (isset($_POST['submitChoice3'])) {
    $check_number1 = false;
    $check_number2 = false;
    $check_number3 = false;

    if (!isset($_POST['timetravel_recom'])) {
        $_SESSION['validate_timetravel'] = 'กรุณากรอกข้อมูล';
        $check_number1 = false;
    } else {
        $_SESSION['Recom']['timetravel_recom'] = $_POST['timetravel_recom'];
        $_SESSION['validate_timetravel'] = NULL;
        $check_number1 = true;
    }

    if (!isset($_POST['expenses_recom'])) {
        $_SESSION['validate_expenses'] = 'กรุณากรอกข้อมูล';
        $check_number2 = false;
    } else {
        $_SESSION['Recom']['expenses_recom'] = $_POST['expenses_recom'];
        $_SESSION['validate_expenses'] = NULL;
        $check_number2 = true;
    }

    if (!isset($_POST['region_recom']) || $_POST['region_recom'] == '') {
        $_SESSION['validate_region'] = 'กรุณากรอกข้อมูล';
        $check_number3 = false;
    } else {
        $_SESSION['Recom']['region_recom'] = $_POST['region_recom'];
        $_SESSION['validate_region'] = NULL;
        $check_number3 = true;
    }

    if ($check_number1 && $check_number2 && $check_number3) {
        $_SESSION['validate_timetravel'] = NULL;
        $_SESSION['validate_expenses'] = NULL;
        $_SESSION['validate_region'] = NULL;

        // print_r($_SESSION['Recom']);
        header("Location: ./page4.php");
    } else {
        header("Location: ./page3.php");
    }
}

if (isset($_POST['submitChoice4'])) {
    $check_number1 = false;
    if (
        !isset($_POST['decide_travel-0']) ||
        !isset($_POST['decide_travel-1']) ||
        !isset($_POST['decide_travel-2']) ||
        !isset($_POST['decide_travel-3']) ||
        !isset($_POST['decide_travel-4']) ||
        !isset($_POST['decide_travel-5']) ||
        !isset($_POST['decide_travel-6']) ||
        !isset($_POST['decide_travel-7']) ||
        !isset($_POST['decide_travel-8']) ||
        !isset($_POST['decide_travel-7']) ||
        !isset($_POST['decide_travel-8']) ||
        !isset($_POST['decide_travel-9']) ||
        !isset($_POST['decide_travel-10']) ||
        !isset($_POST['decide_travel-11']) ||
        !isset($_POST['decide_travel-12']) ||
        !isset($_POST['decide_travel-13']) ||
        !isset($_POST['decide_travel-14'])
    ) {
        $_SESSION['validate_decide'] = 'กรุณากรอกข้อมูล';
        $_SESSION['Recom']['Decide']['decide_travel-0'] = $_POST['_travel-0'];
        $_SESSION['Recom']['Decide']['decide_travel-1'] = $_POST['decide_travel-1'];
        $_SESSION['Recom']['Decide']['decide_travel-2'] = $_POST['decide_travel-2'];
        $_SESSION['Recom']['Decide']['decide_travel-3'] = $_POST['decide_travel-3'];
        $_SESSION['Recom']['Decide']['decide_travel-4'] = $_POST['decide_travel-4'];
        $_SESSION['Recom']['Decide']['decide_travel-5'] = $_POST['decide_travel-5'];
        $_SESSION['Recom']['Decide']['decide_travel-6'] = $_POST['decide_travel-6'];
        $_SESSION['Recom']['Decide']['decide_travel-7'] = $_POST['decide_travel-7'];
        $_SESSION['Recom']['Decide']['decide_travel-8'] = $_POST['decide_travel-8'];
        $_SESSION['Recom']['Decide']['decide_travel-9'] = $_POST['decide_travel-9'];
        $_SESSION['Recom']['Decide']['decide_travel-10'] = $_POST['decide_travel-10'];
        $_SESSION['Recom']['Decide']['decide_travel-11'] = $_POST['decide_travel-11'];
        $_SESSION['Recom']['Decide']['decide_travel-12'] = $_POST['decide_travel-12'];
        $_SESSION['Recom']['Decide']['decide_travel-13'] = $_POST['decide_travel-13'];
        $_SESSION['Recom']['Decide']['decide_travel-14'] = $_POST['decide_travel-14'];
        $check_number1 = false;
    } else {
        $_SESSION['Recom']['Decide']['decide_travel-0'] = $_POST['decide_travel-0'];
        $_SESSION['Recom']['Decide']['decide_travel-1'] = $_POST['decide_travel-1'];
        $_SESSION['Recom']['Decide']['decide_travel-2'] = $_POST['decide_travel-2'];
        $_SESSION['Recom']['Decide']['decide_travel-3'] = $_POST['decide_travel-3'];
        $_SESSION['Recom']['Decide']['decide_travel-4'] = $_POST['decide_travel-4'];
        $_SESSION['Recom']['Decide']['decide_travel-5'] = $_POST['decide_travel-5'];
        $_SESSION['Recom']['Decide']['decide_travel-6'] = $_POST['decide_travel-6'];
        $_SESSION['Recom']['Decide']['decide_travel-7'] = $_POST['decide_travel-7'];
        $_SESSION['Recom']['Decide']['decide_travel-8'] = $_POST['decide_travel-8'];
        $_SESSION['Recom']['Decide']['decide_travel-9'] = $_POST['decide_travel-9'];
        $_SESSION['Recom']['Decide']['decide_travel-10'] = $_POST['decide_travel-10'];
        $_SESSION['Recom']['Decide']['decide_travel-11'] = $_POST['decide_travel-11'];
        $_SESSION['Recom']['Decide']['decide_travel-12'] = $_POST['decide_travel-12'];
        $_SESSION['Recom']['Decide']['decide_travel-13'] = $_POST['decide_travel-13'];
        $_SESSION['Recom']['Decide']['decide_travel-14'] = $_POST['decide_travel-14'];
        $check_number1 = true;
    }
    if ($check_number1) {

        $_SESSION['validate_decide'] = NULL;

        $gender = $_SESSION['Recom']['gender_recom'];
        $age = $_SESSION['Recom']['age_recom'];
        $education = $_SESSION['Recom']['education_recom'];
        $career = $_SESSION['Recom']['career_recom'];
        $salary = $_SESSION['Recom']['salary_recom'];
        $objectives = $_SESSION['Recom']['objective_recom'];
        $car_travel = $_SESSION['Recom']['car_recom'];
        $timetravel = $_SESSION['Recom']['timetravel_recom'];
        $firend = $_SESSION['Recom']['friend_recom'];
        $travel_expenses = $_SESSION['Recom']['expenses_recom'];
        $regionx = $_SESSION['Recom']['region_recom'];
        $decide0 = $_SESSION['Recom']['Decide']['decide_travel-0'];
        $decide1 = $_SESSION['Recom']['Decide']['decide_travel-1'];
        $decide2 = $_SESSION['Recom']['Decide']['decide_travel-2'];
        $decide3 = $_SESSION['Recom']['Decide']['decide_travel-3'];
        $decide4 = $_SESSION['Recom']['Decide']['decide_travel-4'];
        $decide5 = $_SESSION['Recom']['Decide']['decide_travel-5'];
        $decide5 = $_SESSION['Recom']['Decide']['decide_travel-5'];
        $decide6 = $_SESSION['Recom']['Decide']['decide_travel-6'];
        $decide7 = $_SESSION['Recom']['Decide']['decide_travel-7'];
        $decide8 = $_SESSION['Recom']['Decide']['decide_travel-8'];
        $decide9 = $_SESSION['Recom']['Decide']['decide_travel-9'];
        $decide10 = $_SESSION['Recom']['Decide']['decide_travel-10'];
        $decide11 = $_SESSION['Recom']['Decide']['decide_travel-11'];
        $decide12 = $_SESSION['Recom']['Decide']['decide_travel-12'];
        $decide13 = $_SESSION['Recom']['Decide']['decide_travel-13'];
        $decide14 = $_SESSION['Recom']['Decide']['decide_travel-14'];
        
        $arrColumn = [
            "Gender",
            "Age",
            "Education",
            "Career",
            "Salary",
            "Your-travel-objectives",
            "How-do-you-travel",
            "Length-of-your-travel",
            "Person-traveling-with-you",
            "travel-expenses",
            "region",
            "Safe-travel",
            "Good-atmosphere",
            "Unique",
            "Natural-beauty",
            "Splendor",
            "Diversity",
            "Worship",
            "Antiquities",
            "Modern-in-technology",
            "Various-access-routes",
            "The-road-is-not-rough",
            "Cultural-study-site",
            "Opened-up-the-world",
            "Gain-knowledge",
            "Local-products"
        ];

        $arrValues = [
            "$gender",
            "$age",
            "$education",
            "$career",
            "$salary",
            "$objectives",
            "$car_travel",
            "$timetravel",
            "$firend",
            "$travel_expenses",
            "$region",
            "$decide0",
            "$decide1",
            "$decide2",
            "$decide3",
            "$decide4",
            "$decide5",
            "$decide6",
            "$decide7",
            "$decide8",
            "$decide9",
            "$decide10",
            "$decide11",
            "$decide12",
            "$decide13",
            "$decide14"
        ];

        $data = [
            "Inputs" => array(
                "input1" => array(
                    "ColumnNames" => $arrColumn,
                    "Values" => array(
                        $arrValues
                    )
                ),
            ),
            "GlobalParameters" => (object) array()
        ];

        $payload = json_encode($data);

        echo $payload;

        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://ussouthcentral.services.azureml.net/workspaces/ddaece509e5646a1bd5e039d6ddf1f02/services/93702eb5d0764401b5328d80e4d6ba59/execute?api-version=2.0&details=true',
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_HTTPHEADER => array(
        //         'Content-Type: application/json',
        //         'Content-Length: ' . strlen($payload),
        //         'Authorization: Bearer ER/2W/XHeNbdodvJbc3nIvgC6VAdtPnIQgGqZVAn/UycOlAJdd4Nd2SV9NL1iWiN9i4z8lOLOUW76uU2siV38w==',
        //         'Content-Type: application/json',
        //     ),
        //     CURLOPT_POST => 1,
        //     CURLOPT_POSTFIELDS => $payload
        // ));
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($curl);

        // echo $response;

        // $dataRecommed = json_decode($response);
        // curl_close($curl);
        // function mapLabelValue($keyword, $dataRecommed)
        // {
        //     if ($dataRecommed) {
        //         $index = array_search($keyword, $dataRecommed->Results->output1->value->ColumnNames);
        //         $dataVlues = $dataRecommed->Results->output1->value->Values[0][$index];
        //         $_SESSION['Recom'] = NULL;
        //         return $dataVlues;
        //     }
        // }

        

        // $Label = mapLabelValue('Scored Labels', $dataRecommed);
        // $eco = floatval(mapLabelValue("Scored Probabilities for Class \"eco\"", $dataRecommed));
        // // echo 's='.$eco;
        // $art_science = floatval(mapLabelValue("Scored Probabilities for Class \"art science\"", $dataRecommed));
        // $history = floatval(mapLabelValue("Scored Probabilities for Class \"history\"", $dataRecommed));
        // $nature =  floatval(mapLabelValue("Scored Probabilities for Class \"nature\"", $dataRecommed));
        // $recreation = floatval(mapLabelValue("Scored Probabilities for Class \"recreation\"", $dataRecommed));
        // $culture = floatval(mapLabelValue("Scored Probabilities for Class \"culture\"", $dataRecommed));
        // $natural_hot_springs =  floatval(mapLabelValue("Scored Probabilities for Class \"natural hot springs\"", $dataRecommed));
        // $beach = floatval(mapLabelValue("Scored Probabilities for Class \"beach\"", $dataRecommed));
        // $waterfall = floatval(mapLabelValue("Scored Probabilities for Class \"waterfall\"", $dataRecommed));
        // $cave = floatval(mapLabelValue("Scored Probabilities for Class \"cave\"", $dataRecommed));
        // $island = floatval(mapLabelValue("Scored Probabilities for Class \"island\"", $dataRecommed));
        // $rapids = floatval(mapLabelValue("Scored Probabilities for Class \"rapids\"", $dataRecommed));


        // $sql_select = "SELECT * FROM `recommed` WHERE id_user = '".$_SESSION['id_user']."' ;";
        // $result_select = $conn->query($sql_select);

        // if ($result_select->num_rows == 0) {
        //     $sql_insertLabel = "INSERT INTO `recommed` (
        //         `id_recom`, 
        //         `label-categories`, 
        //         `score_eco`, 
        //         `score_art_science`, 
        //         `score_history`, 
        //         `score_nature`, 
        //         `score_recreation`, 
        //         `score_culture`, 
        //         `score_natural_hot_springs`, 
        //         `score_beach`, 
        //         `score_waterfall`, 
        //         `score_cave`, 
        //         `score_island`, 
        //         `score_rapids`, 
        //         `id_user`) VALUES (NULL, 
        //         '" . $Label . "', 
        //         '" . $eco . "', 
        //         '" . $art_science . "', 
        //         '" . $history . "', 
        //         '" . $nature . "', 
        //         '" . $recreation . "', 
        //         '" . $culture . "', 
        //         '" . $natural_hot_springs . "', 
        //         '" . $beach . "', 
        //         '" . $waterfall . "', 
        //         '" . $cave . "', 
        //         '" . $island . "', 
        //         '" . $rapids . "', 
        //         '" . $_SESSION['id_user'] . "');";
        //     $result_insertLabel = $conn->query($sql_insertLabel);
        // }else{
        //     $sql_updateLabel = "UPDATE `recommed` SET 
        //         `label-categories` = '".$Label."', 
        //         `score_eco` = '".$eco."', 
        //         `score_art_science` = '".$art_science."', 
        //         `score_history` = '".$history."', 
        //         `score_nature` = '".$nature."', 
        //         `score_recreation` = '".$recreation."', 
        //         `score_culture` = '".$culture."', 
        //         `score_natural_hot_springs` = '".$natural_hot_springs."', 
        //         `score_beach` = '".$beach."', 
        //         `score_waterfall` = '".$waterfall."', 
        //         `score_cave` = '".$cave."', 
        //         `score_island` = '".$island."', 
        //         `score_rapids` = '".$rapids."'
        //     WHERE `recommed`.`id_user` = '".$_SESSION['id_user']."' ;";
        //     $result_updateLabel = $conn->query($sql_updateLabel);
        // }

        // $_SESSION['Travel_Recommend'] = $Label;
        // // Stat
        // $_SESSION['stat_recom']['eco'] = $eco;
        // $_SESSION['stat_recom']['art science'] = $art_science;
        // $_SESSION['stat_recom']['history'] = $history;
        // $_SESSION['stat_recom']['nature'] = $nature;
        // $_SESSION['stat_recom']['recreation'] = $recreation;
        // $_SESSION['stat_recom']['culture'] = $culture;
        // $_SESSION['stat_recom']['natural_hot_springs'] = $natural_hot_springs;
        // $_SESSION['stat_recom']['beach'] = $beach;
        // $_SESSION['stat_recom']['waterfall'] = $waterfall;
        // $_SESSION['stat_recom']['cave'] = $cave;
        // $_SESSION['stat_recom']['island'] = $island;
        // $_SESSION['stat_recom']['rapids'] = $rapids;

        header("Location: ./recom_travel2.php");
    } else {
        header("Location: ./page4.php");
    }
}

if (isset($_POST['backChoice1'])) {
    header("Location: ./page1.php");
}
if (isset($_POST['backChoice2'])) {
    header("Location: ./page2.php");
}
if (isset($_POST['backChoice3'])) {
    header("Location: ./page3.php");
}
