<?php
include_once "../base.php";
dd($_POST);
$table=$_POST["table"];
unset($_POST["table"]);
echo $$table->del($_POST['id']);
to("../backend.php?do=".$table);