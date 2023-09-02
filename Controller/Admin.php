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
    function login($admin){
        $chk=$this->count($admin);
        if($chk){
            $_SESSION['admin']=$admin['acc'];
            return 2;
        }else{
            return 0;
        }
    }
    function front(){
        
        return $this->view("./view/front/admin.php");
    }
}
