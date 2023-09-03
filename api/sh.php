<?php
include_once "../base.php";

$data=$Goods->find($_POST['id']);
$data['sh']=$_POST['sh'];
$Goods->save($data);
