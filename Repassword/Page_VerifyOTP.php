<?php
session_start();

include_once('../database/connectDB.php');

/**
 * ===========
 * Check Email
 * ===========
 */
if(!isset($_SESSION['email_Verify'])){
    header('Location:./Page_SendEmail.php');
}else{
    $email_Verify = $_SESSION['email_Verify'];
}


$sql = "SELECT * FROM `user` WHERE `email` LIKE '" . $email_Verify . "' AND `status` LIKE '1'   ORDER BY `id_user` DESC";
$resule = $conn->query($sql);

if ($resule->num_rows >= 1) {
    // echo "Email นี้ผ่านการยืนยันตัวตนแล้ว";
} else {
    $sql = "SELECT * FROM `user` WHERE `email` LIKE '" . $email_Verify . "' ORDER BY `id_user` DESC";
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

<body onload="StartClock24()">
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
                    <h6>ยืนยัน Email: <?php echo $email_Verify ?></h6>

                    <label for="">รหัสยืนยัน</label>
                    <!-- <input type="text" size="8" id="counter" disabled />  -->

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input type="hidden" name="email" value="<?php echo $email_Verify ?>" class="form-control style-form">
                        <input type="text" name="otp" class="form-control style-form" placeholder="กรุณากรอกรหัสยืนยัน">
                    </div>

                    OTP <label id="count">หมดเวลา</label>

                    <input type="hidden" name="email_check" value="<?php echo $email_Verify ?>">

                    <div class="col-12 text-center mt-4 mb-2">
                        <button type="submit" name="submit" class="btn btn-primary form-control"> ยืนยันอีเมล์</button>
                    </div>

                    <div class="col-12 text-center mt-1 mb-5 my-2">
                        <a href="./php_SendOTPNew.php" type="button" class="btn btn-secondary form-control"> ส่งรหัสยืนยันใหม่อีกครั้ง</a>
                    </div>
                </div>
                <div class="col-md-2"></div>

            </div>

        </form>
    </div>

    <!-- Link -->
    <?php include_once('../include/inc_js_front.php') ?>

    <?php include_once('../include/sweetAlert.php') ?>

    <!-- เวลา RealTime -->
    <script LANGUAGE="JavaScript">
        function showFilled(Value) {
            return (Value > 9) ? "" + Value : "0" + Value;
        }

        function StartClock24() {

            TheTime = new Date;

            // document.clock.showTime.value = showFilled(TheTime.getHours()) + ":" +
            //     showFilled(TheTime.getMinutes()) + ":" + showFilled(TheTime.getSeconds());

            const timeCur = showFilled(TheTime.getHours()) + ":" + showFilled(TheTime.getMinutes()) + ":" + showFilled(TheTime.getSeconds());
          
            

            setTimeout("StartClock24()", 1000)
            <?php

            if (isset($_SESSION['timeOTP'])) {
            ?>
                var time = '<?php echo $_SESSION['timeOTP'] ?>'
                sessionStorage.setItem("timeOTP", time);

            <?php
            }
            ?>

            // document.getElementById("timeOTP").value = sessionStorage.getItem("timeOTP");

            // TimeCur
            const HourCur = Number(showFilled(TheTime.getHours()));
            const MinuteCur = Number(showFilled(TheTime.getMinutes()));
            const SecondCur = Number(showFilled(TheTime.getSeconds()));

            // TimeSetOTP 
            const HourSet = Number(sessionStorage.getItem("timeOTP").substring(0, 2));
            const MinuteSet = Number(sessionStorage.getItem("timeOTP").substring(3, 5));
            const SecondSet = Number(sessionStorage.getItem("timeOTP").substring(6, 8));


            if (MinuteSet < MinuteCur) {
                HourSet - 1, MinuteSet + 60, SecondSet;
            }

            if (SecondSet < SecondCur) {
                HourSet,
                MinuteSet - 1,
                SecondSet + 60;
            }

            const Hour = HourSet - HourCur;
            const Minute = MinuteSet - MinuteCur;
            const Second = SecondSet - SecondCur;

            if (timeCur >= sessionStorage.getItem("timeOTP")) {

                document.getElementById("count").innerHTML = 'หมดเวลา'

                let check = true
                <?php
                if (isset($_GET['expire'])) {
                    $_SESSION['numberOTP'] = NULL;
                ?>
                    let check = false
                <?php 
                }
                ?>
                if(check == true){
                    window.location = `./Page_VerifyOTP.php?expire=true`;
                }
                

            } else {
                document.getElementById("count").innerHTML = ((Hour) * 60 * 60) + (Minute * 60) + Second;
            }
        }
    </script>

</body>


</html>