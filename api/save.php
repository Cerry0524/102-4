<?php
include_once "../base.php";
$table=$_POST["table"];
unset($_POST["table"]);
echo $$table->save($_POST);
to("../backend.php?do=".$table);