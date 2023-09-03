<?php
include_once "DB.php";
class User extends DB
{
    function __construct()
    {
        parent::__construct('users');
    }
    function backend(){
        $view=[
            'rows'=>$this->all()
        ];
        return $this->view("./view/backend/user.php",$view);
    }

}
