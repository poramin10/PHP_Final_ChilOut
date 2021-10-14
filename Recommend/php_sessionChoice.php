<?php

session_start();

if (isset($_POST['submitChoice1'])) {


    $_SESSION['education_recom'] = $_POST['education_recom'];
    $_SESSION['career_recom'] = $_POST['career_recom'];
    $_SESSION['salary_recom'] = $_POST['salary_recom'];
    $_SESSION['domicile_recom'] = $_POST['domicile_recom'];

    $_SESSION['page1'] = true;
    header("Location: ./page2.php");
}

if (isset($_POST['submitChoice2'])) {

    $check_number1 = false;
    $check_number2 = false;
    $check_number3 = false;
    $check_number4 = false;

    if (!isset($_POST['objective_recom'])) {
        $_SESSION['validate_objective'] = 'กรุณากรอกข้อมูล';
        $_SESSION['objective_recom'] = NULL;
        $check_number1 = false;
    } else {
        $_SESSION['validate_objective'] = NULL;
        $_SESSION['objective_recom'] = join(',', $_POST['objective_recom']);
        echo $_SESSION['objective_recom'];
        $check_number1 = true;
    }

    if (!isset($_POST['car_recom'])) {
        $_SESSION['validate_car'] = 'กรุณากรอกข้อมูล';
        $check_number2 = false;
    } else {
        $_SESSION['validate_car'] = NULL;
        $_SESSION['car_recom'] = $_POST['car_recom'];
        $check_number2 = true;
    }

    if (
        !isset($_POST['need_travel-0']) ||
        !isset($_POST['need_travel-1']) ||
        !isset($_POST['need_travel-2']) ||
        !isset($_POST['need_travel-3']) ||
        !isset($_POST['need_travel-4']) ||
        !isset($_POST['need_travel-5']) ||
        !isset($_POST['need_travel-6']) ||
        !isset($_POST['need_travel-7']) ||
        !isset($_POST['need_travel-8'])
    ) {
        $_SESSION['validate_need'] = 'กรุณากรอกข้อมูล';
        $_SESSION['need_travel-0'] = $_POST['need_travel-0'];
        $_SESSION['need_travel-1'] = $_POST['need_travel-1'];
        $_SESSION['need_travel-2'] = $_POST['need_travel-2'];
        $_SESSION['need_travel-3'] = $_POST['need_travel-3'];
        $_SESSION['need_travel-4'] = $_POST['need_travel-4'];
        $_SESSION['need_travel-5'] = $_POST['need_travel-5'];
        $_SESSION['need_travel-6'] = $_POST['need_travel-6'];
        $_SESSION['need_travel-7'] = $_POST['need_travel-7'];
        $_SESSION['need_travel-8'] = $_POST['need_travel-8'];
        $check_number3 = false;
    } else {
        $_SESSION['validate_need'] = NULL;
        $_SESSION['need_travel-0'] = $_POST['need_travel-0'];
        $_SESSION['need_travel-1'] = $_POST['need_travel-1'];
        $_SESSION['need_travel-2'] = $_POST['need_travel-2'];
        $_SESSION['need_travel-3'] = $_POST['need_travel-3'];
        $_SESSION['need_travel-4'] = $_POST['need_travel-4'];
        $_SESSION['need_travel-5'] = $_POST['need_travel-5'];
        $_SESSION['need_travel-6'] = $_POST['need_travel-6'];
        $_SESSION['need_travel-7'] = $_POST['need_travel-7'];
        $_SESSION['need_travel-8'] = $_POST['need_travel-8'];
        $check_number3 = true;
    }

    if (!isset($_POST['friend_recom'])) {
        $_SESSION['validate_friend'] = 'กรุณากรอกข้อมูล';
        $check_number4 = false;
    } else {
        $_SESSION['validate_friend'] = NULL;
        $_SESSION['friend_recom'] = $_POST['friend_recom'];
        $check_number4 = true;
    }

    if (
        $check_number1 == 'true' &&
        $check_number2 == 'true' &&
        $check_number3 == 'true' &&
        $check_number4 == 'true'
    ){
        $_SESSION['page2'] = true;
        header("Location: ./page3.php");
    } else {
        header("Location: ./page2.php");
    }
}

if (isset($_POST['submitChoice3'])) {
    header("Location: ./page4.php");
}

if (isset($_POST['submitChoice4'])) {
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
