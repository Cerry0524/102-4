<?php
include_once "../base.php";
switch ($_GET['logout']) {
    case 'admin':
        unset($_SESSION['admin']);
        break;
    case 'user':
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        break;
}
to("../index.php");