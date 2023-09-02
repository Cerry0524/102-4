<?php
include_once "../base.php";
// dd($_POST);
if($_POST['acc']=='admin'){
    to("../index.php?do=login&error=2");
}else{
    if($User->count(['acc'=>$_POST['acc']])){
        to("../index.php?do=login&error=0");
    }else{
        $_POST['regdate']=date("Y-m-d");
        $User->save($_POST);
        to("../index.php?do=login&error=1");
    }
}