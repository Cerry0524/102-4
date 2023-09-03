<?php
include_once "DB.php";
class Admin extends DB
{
    function __construct()
    {
        parent::__construct('admins');
    }
    function backend(){
        $view=[
            'rows'=>$this->all()
        ];
        return $this->view("./view/backend/admin.php",$view);
    }
 
}
