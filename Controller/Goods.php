<?php
include_once "DB.php";
class Goods extends DB
{
    function __construct()
    {
        parent::__construct('goods');
    }
    function backend(){
        $view=[
            'rows'=>$this->all()
        ];
        return $this->view("./view/backend/goods.php",$view);
    }
}
