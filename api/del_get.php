<?php
include_once "../base.php";
$table=$_GET["table"];
echo $$table->del($_GET['id']);
to("../backend.php?do=$table");

