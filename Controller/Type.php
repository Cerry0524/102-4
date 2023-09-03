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
        $bigs = $this->all(['big' => 0]);
        $html = '';
        foreach ($bigs as $big) {
            $html .= "<option value='{$big['id']}'>";
            $html .= $big['name'];
            $html .= "</option>";
        }
        return $html;
    }
    function getMid($id)
    {
        $mids = $this->all(['big' => $id]);
        $html = '';
        foreach ($mids as $mid) {
            $html .= "<option value='{$mid['id']}'>";
            $html .= $mid['name'];
            $html .= "</option>";
        }
        return $html;
    }
    function nav()
    {
        $Goods = new Goods;
        $bigs = $this->all(['big' => 0]);

        echo  "<a href='?type=0'>全部商品";
        echo "(" . $Goods->count() . ")";
        echo  "</a>";
        foreach ($bigs as $big) {
            $mids = $this->all(['big' => $big['id']]);

            echo  "<div class='ww'>";
            echo  "<a href='?type={$big['id']}'>";
            echo  $big['name'];
            echo "(" . $Goods->count(['big' => $big['id']]) . ")";
            echo  "</a>";
            echo  "<div class='s'>";
            foreach ($mids as $mid) {
                if ($Goods->count(['mid' => $mid['id']]) != 0) {
                    echo  "<a href='?type={$mid['id']}'>";
                    echo  $mid['name'];
                    echo "(" . $Goods->count(['mid' => $mid['id']]) . ")";
                    echo  "</a>";
                }
            }
            echo  "</div>";
            echo  "</div>";
        }
    }
    function topNav($type)
    {
        if ($type == 0) {
            return "全部商品";
        } else {
            $type = $this->find($type);
            if ($type['big'] == 0) {
                return $type['name'];
            } else {
                return $this->find($type['big'])['name'] . ">" . $type['name'];
            }
        }
    }

}
