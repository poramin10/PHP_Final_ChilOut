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

try {

    $accessToken = $helper->getAccessToken();

    if (isset($accessToken)) {

        $_SESSION['access_token'] = (string) $accessToken;  //conver to string

        //if session is set we can redirect to the user to any page 
        header("Location:Page_FormLogin.php");
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


//now we will get users first name , email , last name
if (isset($_SESSION['access_token'])) {

    try {

        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('me?fields=id,name,first_name,last_name,email,gender,birthday,age_range,picture.type(large)');
        $user = $res->getGraphUser();
        $picture = $user->getField('picture');

        $id_user = $user->getField('id');
       

        $sql_fb = "SELECT * FROM `user_fb` WHERE id_user_fb = '". $id_user ."' ";
        $result_fb = $conn->query($sql_fb);

        if ($result_fb->num_rows == 0) {

            $firstname = $user->getField('first_name');
            $lastname = $user->getField('last_name');
            $username = $user->getField('name');
            $email = $user->getField('email');
            $gender = $user->getField('gender');

            // $profile = $picture->getField('url');

            $sql_insert = "INSERT INTO `user_fb` (
                `id_user_fb`, 
                `firstname_fb`, 
                `lastname_fb`,  
                `email_fb`, 
                `phone_fb`, 
                `username_fb`, 
                `gender_fb`) 
            VALUES (
                '" . $id_user . "', 
                '" . $firstname . "', 
                '" . $lastname . "', 
                '" . $username . "', 
                '', 
                '" . $username . "', 
                '" . $gender . "');";
            $result_insert = $conn->query($sql_insert);

            if ($result_insert) {

                $sql = "SELECT * FROM `user_fb` WHERE id_user_fb = '".$id_user."' ";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                
                $_SESSION['id_user'] = $row['id_user_fb'];
                $_SESSION['firstname'] = $row['firstname_fb'];
                $_SESSION['lastname'] = $row['lastname_fb'];
                $_SESSION['username'] = $row['username_fb'];
                $_SESSION['email'] = $row['email_fb'];
                $_SESSION['gender'] = $row['gender_fb'];
                $_SESSION['profile'] = $picture->getField('url');
                $_SESSION['phone'] = $row['phone_fb'];

            }
        } else {

            $sql = "SELECT * FROM `user_fb` WHERE id_user_fb = '".$id_user."' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            // echo $id_user;

            $_SESSION['id_user'] = $row['id_user_fb'];
            $_SESSION['firstname'] = $row['firstname_fb'];
            $_SESSION['lastname'] = $row['lastname_fb'];
            $_SESSION['username'] = $row['username_fb'];
            $_SESSION['email'] = $row['email_fb'];
            $_SESSION['gender'] = $row['gender_fb'];
            $_SESSION['profile'] = $picture->getField('url');
            $_SESSION['phone'] = $row['phone_fb'];
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
