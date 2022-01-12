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

    if (!isset($_POST['friend_recom'])) {
        $_SESSION['validate_friend'] = 'กรุณากรอกข้อมูล';
        $check_number3 = false;
    } else {
        $_SESSION['validate_friend'] = NULL;
        $_SESSION['Recom']['friend_recom'] = $_POST['friend_recom'];
        $check_number3 = true;
    }
    if (
        $check_number1 == 'true' &&
        $check_number2 == 'true' &&
        $check_number3 == 'true'
    ) {
        $_SESSION['page2'] = true;

        header("Location: ./page3.php");
    } else {
        header("Location: ./page2.php");
    }
}

if (isset($_POST['submitChoice3'])) {
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
        !isset($_POST['decide_travel-14']) ||
        !isset($_POST['decide_travel-15']) ||
        !isset($_POST['decide_travel-16']) ||
        !isset($_POST['decide_travel-17'])
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
        $_SESSION['Recom']['Decide']['decide_travel-15'] = $_POST['decide_travel-15'];
        $_SESSION['Recom']['Decide']['decide_travel-16'] = $_POST['decide_travel-16'];
        $_SESSION['Recom']['Decide']['decide_travel-17'] = $_POST['decide_travel-17'];
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
        $_SESSION['Recom']['Decide']['decide_travel-15'] = $_POST['decide_travel-15'];
        $_SESSION['Recom']['Decide']['decide_travel-16'] = $_POST['decide_travel-16'];
        $_SESSION['Recom']['Decide']['decide_travel-17'] = $_POST['decide_travel-17'];
        $check_number1 = true;
    }
    if ($check_number1) {

        $_SESSION['validate_decide'] = NULL;

        $gender = $_SESSION['Recom']['gender_recom'];
        $age = $_SESSION['Recom']['age_recom'];
        $career = $_SESSION['Recom']['career_recom'];
        $salary = $_SESSION['Recom']['salary_recom'];
        $timetravel = $_SESSION['Recom']['timetravel_recom'];
        $firend = $_SESSION['Recom']['friend_recom'];
        $travel_expenses = $_SESSION['Recom']['expenses_recom'];
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
        $decide15 = $_SESSION['Recom']['Decide']['decide_travel-15'];
        $decide16 = $_SESSION['Recom']['Decide']['decide_travel-16'];
        $decide17 = $_SESSION['Recom']['Decide']['decide_travel-17'];

        $arrColumn = [
            "Gender",
            "Age",
            "Career",
            "Salary",
            "Length-of-your-travel",
            "Person-traveling-with-you",
            "travel-expenses",
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
            "Local-products",
            "There-are-natural-resources",
            "have-fun",
            "spot-to-relax-and-eat"
        ];

        $arrValues = [
            "$gender",
            "$age",
            "$career",
            "$salary",
            "$timetravel",
            "$firend",
            "$travel_expenses",
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
            "$decide14",
            "$decide15",
            "$decide16",
            "$decide17"
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

        // echo $payload;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ussouthcentral.services.azureml.net/workspaces/ddaece509e5646a1bd5e039d6ddf1f02/services/b2a7d54742af41628cbbe39bbeb107b5/execute?api-version=2.0&details=true',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload),
                'Authorization: Bearer RGWNTVBj1NaSRq2O4uQ7yUYiSUUeiW8CbDzDcb/Ev1YFyW3Qpy48xY3F3vdFgSItgoadVhHyYXEa9i2/5lroKg==',
                'Content-Type: application/json',
            ),
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $payload
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        echo $response;

        $dataRecommed = json_decode($response);
        curl_close($curl);
        function mapLabelValue($keyword, $dataRecommed)
        {
            if ($dataRecommed) {
                $index = array_search($keyword, $dataRecommed->Results->output1->value->ColumnNames);
                $dataVlues = $dataRecommed->Results->output1->value->Values[0][$index];
                $_SESSION['Recom'] = NULL;
                return $dataVlues;
            }
        }

        $Label = mapLabelValue('Scored Labels', $dataRecommed);
        // $eco = floatval(mapLabelValue("Scored Probabilities for Class \"eco\"", $dataRecommed));
        // // echo 's='.$eco;

        $measure = floatval(mapLabelValue("Scored Probabilities for Class \"measure\"", $dataRecommed));
        $museum = floatval(mapLabelValue("Scored Probabilities for Class \"museum\"", $dataRecommed));
        $national_park = floatval(mapLabelValue("Scored Probabilities for Class \"national park wildlife sanctuary\"", $dataRecommed));
        $landmarks = floatval(mapLabelValue("Scored Probabilities for Class \"landmarks and monuments\"", $dataRecommed));
        $waterfall = floatval(mapLabelValue("Scored Probabilities for Class \"waterfall\"", $dataRecommed));
        $historical = floatval(mapLabelValue("Scored Probabilities for Class \"historical attractions and monuments\"", $dataRecommed));
        $beach = floatval(mapLabelValue("Scored Probabilities for Class \"bay and beach\"", $dataRecommed));
        $islands = floatval(mapLabelValue("Scored Probabilities for Class \"islands\"", $dataRecommed));
        $cave = floatval(mapLabelValue("Scored Probabilities for Class \"cave\"", $dataRecommed));
        $zoo = floatval(mapLabelValue("Scored Probabilities for Class \"zoo and aquarium\"", $dataRecommed));
        $dive_site = floatval(mapLabelValue("Scored Probabilities for Class \"dive site\"", $dataRecommed));

        $sql_select = "SELECT * FROM `recommed_south` WHERE id_user = '".$_SESSION['id_user']."' ;";
        $result_select = $conn->query($sql_select);

        if ($result_select->num_rows == 0) {
            $sql_insertLabel = "INSERT INTO `recommed_south` (
                `id_recom`, 
                `label-categories`, 
                `score_measure`, 
                `score_museum`, 
                `score_national_park`, 
                `score_landmarks`, 
                `score_waterfall`, 
                `score_historical`, 
                `score_beach`, 
                `score_islands`, 
                `score_cave`, 
                `score_zoo`, 
                `score_dive_site`, 
                `id_user`) VALUES (NULL, 
                '" . $Label . "', 
                '" . $measure . "', 
                '" . $museum . "', 
                '" . $national_park . "', 
                '" . $landmarks . "', 
                '" . $waterfall . "', 
                '" . $historical . "', 
                '" . $beach . "', 
                '" . $islands . "', 
                '" . $cave . "', 
                '" . $zoo . "', 
                '" . $dive_site . "', 
                '" . $_SESSION['id_user'] . "');";
            $result_insertLabel = $conn->query($sql_insertLabel) or die($conn->error);
            // echo $conn->query($sql_insertLabel)
        }else{
            $sql_updateLabel = "UPDATE `recommed_south` SET 
                `label-categories` = '".$Label."', 
                `score_measure` = '".$measure."', 
                `score_museum` = '".$museum."', 
                `score_national_park` = '".$national_park."', 
                `score_landmarks` = '".$landmarks."', 
                `score_waterfall` = '".$waterfall."', 
                `score_historical` = '".$historical."', 
                `score_beach` = '".$beach."', 
                `score_islands` = '".$islands."', 
                `score_cave` = '".$cave."', 
                `score_zoo` = '".$zoo."', 
                `score_dive_site` = '".$dive_site."'
            WHERE `recommed_south`.`id_user` = '".$_SESSION['id_user']."' ;";
            $result_updateLabel = $conn->query($sql_updateLabel) or die($conn->error);
        }

        $_SESSION['label-categories'] = $Label;
        // Stat
        $_SESSION['stat_recom_south']['measure'] = $measure;
        $_SESSION['stat_recom_south']['museum'] = $museum;
        $_SESSION['stat_recom_south']['national_park'] = $national_park;
        $_SESSION['stat_recom_south']['landmarks'] = $landmarks;
        $_SESSION['stat_recom_south']['waterfall'] = $waterfall;
        $_SESSION['stat_recom_south']['historical'] = $historical;
        $_SESSION['stat_recom_south']['beach'] = $beach;
        $_SESSION['stat_recom_south']['islands'] = $islands;
        $_SESSION['stat_recom_south']['cave'] = $cave;
        $_SESSION['stat_recom_south']['zoo'] = $zoo;
        $_SESSION['stat_recom_south']['dive_site'] = $dive_site;

        // echo '<pre>';
        // print_r($_SESSION['stat_recom_south']);
        // echo '</pre>';

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
