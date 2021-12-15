<?php 
session_start();

//กำหนดค่า Access-Control-Allow-Origin ให้ เครื่อง อื่น ๆ สามารถเรียกใช้งานหน้านี้ได้
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//ตั้งค่าการเชื่อมต่อฐานข้อมูล
$link = mysqli_connect('localhost', 'root', '', 'travel');
mysqli_set_charset($link, 'utf8');

$requestMethod = $_SERVER["REQUEST_METHOD"];

//ตรวจสอบหากใช้ Method GET
if($requestMethod == 'GET'){

    //ตรวจสอบการส่งค่า id
    if(isset($_GET['id']) && !empty($_GET['id'])){

        $id = $_GET['id'];
        
        //คำสั่ง SQL กรณี มีการส่งค่า id มาให้แสดงเฉพาะข้อมูลของ id นั้น
        $sql = "SELECT * FROM recommed WHERE id_user = ".$_SESSION['id_user']." ";
        
    }else{
        //คำสั่ง SQL แสดงข้อมูลทั้งหมด
        $sql = "SELECT Gender , Age , Education , Career , Salary , How_do_you_travel , Length_of_you_travel FROM recommed";
    }
    
    $result = mysqli_query($link, $sql);
    
    //สร้างตัวแปร array สำหรับเก็บข้อมูลที่ได้
    $arr = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
         $arr[] = $row;
    }
    
    echo json_encode($arr);
}