<?php
include_once "../base.php";

switch ($_GET['type']) {
    case 'big':
        echo $Type->getBig();
        break;
    case 'mid':
        echo $Type->getMid($_GET['id']);
        break;
}