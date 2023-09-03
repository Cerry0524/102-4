<?php
include_once "../base.php";
$_SESSION['cart'][$_GET['id']]=$_GET['qt'];
to("../index.php?do=buycart");
