<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '452692540592-arfic0elb11ocu5e4gsdpc87vi0cj1iu.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'nQCmIabuR3fTQ2gQaqHs6VHv'; //Google client secret
$redirectURL = 'http://enterprisesoftware272.tk/index.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>