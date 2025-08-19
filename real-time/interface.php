<?php
include_once('key.php');
$mikrotik_ip = $ip;  
$mikrotik_username = $user;  
$mikrotik_password =$pass;
$api_port=$port_api;

if ($API->connect($mikrotik_ip, $mikrotik_username,$mikrotik_password,$api_port)) {
$items = $API->comm("/interface/print");
echo "<pre>";print_r($items['0']);die();
}
?>