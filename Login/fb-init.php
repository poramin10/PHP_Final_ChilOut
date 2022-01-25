<?php
$conn = new mysqli('localhost', 'root', '', 'travel');

require '../vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '374526864373355', // replace your app_id
    'app_secret' => 'a0813721b07c8f200d2ea77c12834532',   // replace your app_scsret
    'default_graph_version' => 'v12.0'
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/PaaFun/Login/Page_FormLogin.php");
// $login_url = $helper->getLoginUrl("http://localhost/PaaFun/Login/Page_FormLogin.php");

try {

    $accessToken = $helper->getAccessToken();

    if (isset($accessToken)) {

        $_SESSION['access_token'] = (string) $accessToken;  //conver to string

        //if session is set we can redirect to the user to any page 
        header("Location:Page_FormLogin.php");
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
    echo 'ระบบ Login ยังไม่พร้อมใช้งาน';
}


//now we will get users first name , email , last name
if (isset($_SESSION['access_token'])) {

    try {

        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('me?fields=id,name,first_name,last_name,email,gender,birthday,age_range,picture.type(large)');
        $user = $res->getGraphUser();
        $picture = $user->getField('picture');
        $id_user_fb = $user->getField('id');


        $sql_fb = "SELECT * FROM `user` WHERE id_user_fb = '" . $id_user_fb . "' ";
        $result_fb = $conn->query($sql_fb);

        if ($result_fb->num_rows == 0) {

            $firstname = $user->getField('first_name');
            $lastname = $user->getField('last_name');
            $username = $user->getField('name');
            $email = $user->getField('email');

            if ($user->getField('gender') == 'male') {
                $gender = 'ชาย';
            } else if ($user->getField('gender') == 'female') {
                $gender = 'หญิง';
            } else {
                $gender = 'ไม่ระบุ';
            }
            $phone = '';

            // $birthdate = $user->getField('birthday')->format('d-m-Y');
            $birthdate = NULL;

            // $profile = $picture->getField('url');

            $sql_insert = "INSERT INTO `user` (
                `id_user`, 
                `id_user_fb`, 
                `firstname`, 
                `lastname`, 
                `gender`, 
                `email`, 
                `phone`, 
                `birthdate`, 
                `profile`, 
                `register_by`, 
                `username`, 
                `password`, 
                `status`, 
                `create_at`, 
                `update_at`) 
            VALUES (NULL, 
                '" . $id_user_fb . "', 
                '" . $firstname . "', 
                '" . $lastname . "', 
                '" . $gender . "', 
                '" . $email . "', 
                '" . $phone . "', 
                '" . $birthdate . "', 
                '" . $picture->getField('url') . "', 
                'facebook', 
                '-', 
                '-', 
                '1', 
                '" . date("Y-m-d H:i:s") . "', 
                '" . date("Y-m-d H:i:s") . "');";

            $result_insert = $conn->query($sql_insert);

            if ($result_insert) {

                $sql = "SELECT * FROM `user` WHERE id_user_fb = '" . $id_user_fb . "' ";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['profile'] = $picture->getField('url');
                $_SESSION['birthdate'] = $row['birthdate'];
                $_SESSION['phone'] = $row['phone'];

                $_SESSION['Success'] = "เข้าสู่ระบบสำเร็จ";
            }
        } else {

            $sql = "SELECT * FROM `user` WHERE id_user_fb = '" . $id_user_fb . "' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            // echo $id_user;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['profile'] = $picture->getField('url');
            $_SESSION['birthdate'] = $row['birthdate'];
            $_SESSION['phone'] = $row['phone'];

            $_SESSION['Success'] = "เข้าสู่ระบบสำเร็จ";

        }

        // $_SESSION['id_user'] = $user->getField('id');
        // $_SESSION['firstname'] = $user->getField('first_name');
        // $_SESSION['lastname'] = $user->getField('last_name');
        // $_SESSION['username'] = $user->getField('name');
        // $_SESSION['email'] = $user->getField('email');
        // $_SESSION['gender'] = $user->getField('gender');
        // $_SESSION['profile'] = $picture->getField('url');

    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
