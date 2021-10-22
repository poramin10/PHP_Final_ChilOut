<?php
session_start();
$number = 0;

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://tatapi.tourismthailand.org/tatapi/v5/attraction/P03002579',
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

print_r($dataTravel);
