<?php
include_once "DB.php";
class Type extends DB
{
    function __construct()
    {
        parent::__construct('types');
    }
    function backend(){
        $view=[
            'rows'=>$this->all()
        ];
        return $this->view("./view/backend/type.php",$view);
    }
}
