<?php

require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;

$config=require_once 'config.php';

$secret_key=$config['jwt_secret'];

$payload=array(
    'iss'=>'shahram',
    'iat'=>time(),
    'exp'=>strtotime("+1 min"),
    'email'=>"shahramemail@gmal.com"
);

$jwt=JWT::encode($payload,$secret_key,'HS256');
echo "JWT :". $jwt;