<?php
require_once 'function.php';
require_once 'Connect2.1/qqConnectAPI.php';

//请求accessToken
$oauth = new Oauth();
$accessToken = $oauth->qq_callback();
$openid = $oauth->get_openid();

setcookie('qq_accesstoken',$accessToken,time()+86400);
setcookie('qq_openid',$openid,time()+86400);

echo "succeed!";