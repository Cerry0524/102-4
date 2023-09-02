<?php
session_start();
date_default_timezone_set("Asia/Taipei");


include_once __DIR__."/Controller/Admin.php";
$Admin=new Admin;
include_once __DIR__."/Controller/Bottom.php";
$Bottom=new Bottom;
include_once __DIR__."/Controller/Goods.php";
$Goods=new Goods;
include_once __DIR__."/Controller/Order.php";
$Order=new Order;
include_once __DIR__."/Controller/Type.php";
$Type=new Type;
include_once __DIR__."/Controller/User.php";
$User=new User;

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
    header("location:".$url);
}