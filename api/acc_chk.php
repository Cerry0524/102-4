<?php
include_once "../base.php";
if($_POST['acc']=='admin'){
    echo 2;
}else{
    if($User->count($_POST)){
        echo 0;
    }else{
        echo 1;
    }
}