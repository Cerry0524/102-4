<?php
include_once "../base.php";
dd($_POST);


if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}


$Goods->save($_POST);

to("../backend.php?do=edit_goods&id={$_POST['id']}");