<?php
include_once "DB.php";
class Goods extends DB
{
    function __construct()
    {
        parent::__construct('goods');
    }
    function backend()
    {
        $view = [
            'rows' => $this->all()
        ];
        return $this->view("./view/backend/goods.php", $view);
    }
    function items($type)
    {
        $Type = new Type;
        if ($type == 0) {
            return $this->all(['sh' => 1]);
        } else {
            $type = $Type->find($type);
            if ($type['big'] == 0) {
                return $this->all(['sh' => 1,'big'=>$type['id']]);
            } else {
                return $this->all(['sh' => 1,'mid'=>$type['id']]);
            }
        }
    }
}
