<?php

use Google\Service\TrafficDirectorService\GoogleRE2;

require_once "vendor/autoload.php";

$clientId = "159448910259-lgjd52krml824n3q8esk1gmtqrcfkn92.apps.googleusercontent.com";
$clientSecret = "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";
$redirectUrl = "http://localhost/sem-V/googlelogin/login.php";

//Client request
$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');

if(isset($_GET['code'])){
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    //User profile
    $gauth = new Google_Service_Oauth2($client);
    $google_info = $gauth->userinfo->get();
    $email = $google_info->email;
    $name = $google_info->name;
    echo "Welcome " . $name . ". Email is: ". $email; 
}else{
    ?>
    <a href="<?=$client->createAuthUrl()?>"><button>Login with Google</button></a>
    <?php
}



?>