<?php
session_start();
include_once('../database/connectDB.php');
$sql = "SELECT * FROM `user` WHERE `email` LIKE '" . $_GET['email'] . "' AND `status` LIKE '1'   ORDER BY `id_user` DESC";
$resule = $conn->query($sql);

echo "<br>";
if ($resule->num_rows >= 1) {
    // echo "Email นี้ผ่านการยืนยันตัวตนแล้ว";
} else {
    $sql = "SELECT * FROM `user` WHERE `email` LIKE '" . $_GET['email'] . "' ORDER BY `id_user` DESC";
    $resule = $conn->query($sql);
    $row = $resule->fetch_assoc();
    $_SESSION["id_user"] = $row['id_user'];
    // echo "Email ของคุณคือ ".$row['email']." กรุณายืนยันตัวตน";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Link -->
    <?php include_once('../include/inc_css_front.php') ?>


</head>

<body>
    <div class="container">

        <form action="./php_CheckVerify.php" method="POST">
            <div class="row">

                <div class="col-md-2"></div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify">
                    <a href="./Page_SendEmail.php" type="button" class="btn btn-light btn-circle btn-lg"><i class="fas fa-chevron-left fa-"></i></a>
                </div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify2"> 

                    <div class="mt-4 text-center">
                        <img id="imgUpload" class="figure-img img-fluid rounded img-profile-cycle-verify" src="../assets/img/OTP.png" width="150px" alt="">
                    </div>

                    <h2 class="my-1 text-center"><b>กรอกรหัส OTP</b></h2>

                    <label for="">รหัสยืนยัน</label>
                    <!-- <input type="text" size="8" id="counter" disabled />  -->

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>" class="form-control style-form">
                        <input type="text" name="otp" class="form-control style-form" placeholder="กรุณากรอกรหัสยืนยัน">
                    </div>

                    OTP <label id="count">10</label>

                    <input type="hidden" name="email_check" value="<?php echo $_GET['email'] ?>">

                    <div class="col-12 text-center mt-4 mb-2">
                        <button type="submit" name="submit" class="btn btn-primary form-control"> ยืนยันอีเมล์</button>
                    </div>

                    <div class="col-12 text-center mt-1 mb-5 my-2">
                        <a href="./php_SendVerifyNew.php?email=<?php echo $_GET['email'] ?>" type="button" class="btn btn-secondary form-control"> ส่งรหัสยืนยันใหม่อีกครั้ง</a>
                    </div>
                </div>
                <div class="col-md-2"></div>

            </div>

        </form>
    </div>
    <!-- Link -->
    <?php include_once('../include/inc_js_front.php') ?>

    <?php include_once('../include/sweetAlert.php') ?>

    <script>
        // กำหนดเวลาเริ่มต้น

        <?php
        if (isset($_SESSION['timeOTP'])) {
        ?>
            var time = '<?php echo $_SESSION['timeOTP'] ?>'
            sessionStorage.setItem("timeOTP", time);
            <?php $_SESSION['timeOTP'] = NULL ?>
        <?php
        }
        ?>

        var seconds = parseInt(sessionStorage.getItem("timeOTP"));

        document.getElementById("count").innerHTML = 'หมดเวลา'; //แสดงค่าเริ่มต้นใน 10 วินาที ใน text box

        function display() { //function ใช้ในการ นับถอยหลัง

            seconds -= 1; //ลบเวลาทีละหนึ่งวินาทีทุกครั้งที่ function ทำงาน
            sessionStorage.setItem("timeOTP", seconds);

            if (seconds == -1) {
                return;
            } //เมื่อหมดเวลาแล้วจะหยุดการทำงานของ function display

            document.getElementById("count").innerHTML = 'จะหมดในอีก '+seconds+' วินาที'
            // document.getElementById("count").innerHTML = seconds; //แสดงเวลาที่เหลือ
            setTimeout("display()", 1000); // สั่งให้ function display() ทำงาน หลังเวลาผ่านไป 1000 milliseconds ( 1000  milliseconds = 1 วินาที )

            if (seconds == 0) {

                window.location = `./Page_VerifyOTP.php?email=<?php echo $_GET['email'] ?>&expire=true`;

                document.getElementById("count").innerHTML = 'หมดเวลา'
            }

            if (seconds <= 0) {

                document.getElementById("count").innerHTML = 'หมดเวลา'
            }

            <?php
            if (isset($_GET['expire'])) {
                $_SESSION['numberOTP'] = NULL;
            }
            ?>

        }
        display(); //เปิดหน้าเว็บให้ทำงาน function  display()
    </script>

</body>


</html>