<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$config=require_once 'config.php';

$secret_key=$config['jwt_secret'];
$headers=apache_request_headers();

if (isset($headers['Authorization'])) {
    $auth_header = $headers['Authorization'];
    //print_r( $auth_header);
    $header_val = explode(' ', $auth_header);

    $jwt = $header_val[1];
    try {
        $decoded = JWT::decode($jwt, new key($secret_key, 'HS256'));
        print_r($decoded);
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
} else {
    echo 'no authorization for this token';
}

$data=[
    'name'=>"my secure product",
    'code'=>'4567',
    'data'=>'timestamp'
];
//print_r($data);
?>