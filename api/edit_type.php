<?php
include_once "../base.php";
// dd($_POST);

$Type->save($_POST);

to("../backend.php?do=th");