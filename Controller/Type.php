<?php
include_once "DB.php";
class Type extends DB
{
    function __construct()
    {
        parent::__construct('types');
    }
    function backend()
    {
        $view = [
            'rows' => $this->all()
        ];
        return $this->view("./view/backend/type.php", $view);
    }
    function getBig()
    {
        $bigs=$this->all(['big'=>0]);
        $html='';
        foreach ($bigs as $big) {
            $html.= "<option value='{$big['id']}'>";
            $html.= $big['name'];
            $html.= "</option>";
        }
        return $html;
    }
    function getMid($id)
    {
        $mids=$this->all(['big'=>$id]);
        $html='';
        foreach ($mids as $mid) {
            $html.= "<option value='{$mid['id']}'>";
            $html.= $mid['name'];
            $html.= "</option>";
        }
        return $html;
    }
}
