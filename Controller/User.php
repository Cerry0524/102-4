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
    function login($user){
        $chk=$this->count($user);
        if($chk){
            $_SESSION['user']=$user['acc'];
            return 1;
        }else{
            return 0;
        }
    }
}
