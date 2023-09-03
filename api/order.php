<?php
include_once "../base.php";
$_POST['cart']=serialize($_SESSION['cart']);
$_POST['no']=date("Ymd").rand(100000,999999);
$_POST['orderdate']=date("Y-m-d");
$_POST['acc']=$_SESSION['user'];

$Order->save($_POST);

