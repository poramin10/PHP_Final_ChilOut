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

    $_SESSION["email_user"] = $_GET['email'];

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

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/verify.css">

    <!-- Link SetUp Style -->
    <?php include_once('../include/inc_css_front.php') ?>

</head>

<body>
    <div class="container">

        <form action="./php_CheckVerify.php" method="POST">
            <div class="row">

                <div class="col-md-2"></div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify">
                    <a href="../Register/Page_FormRegister.php" type="button" class="btn btn-light btn-circle btn-lg"><i class="fas fa-chevron-left fa-"></i></a>
                </div>

                <div class="col-md-4 col-12 mt-5 mb-1 p-3 card-verify2">

                    <div class="profile-img mt-4">
                        <img id="imgUpload" class="figure-img img-fluid rounded img-profile-cycle-verify" src="../assets/img/verify.png" alt="">
                    </div>

                    <h2 class="my-1 text-center"><b>ยืนยันอีเมล์</b></h2>
                    <label for="">รหัสยืนยัน</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                        </div>
                        <input type="text" name="otp" class="form-control style-form" placeholder="กรุณากรอกรหัสยืนยัน">
                    </div>
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
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<!-- Sweet Alert -->
<?php include_once('../include/sweetAlert.php') ?>

<!-- SetUp -->
<?php include_once('../include/inc_js_front.php') ?>

</html>