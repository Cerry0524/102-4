<?php
class DB
{
    protected $table;
    protected $pdo;
    protected $dsn = 'mysql:local=localhost;charset=utf8;dbname=db07';
    protected $links;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    protected function a2s($array)
    {
        foreach ($array as $key => $value) {
            if ($key != 'id') {
                $tmp[] = "`$key`='$value'";
            }
        }
        return $tmp;
    }
    protected function sql_all($sql, ...$arg)
    {
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $sql;
    }
    protected function sql_one($sql, $arg)
    {
        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= " where " . join(" && ", $tmp);
        } else {
            $sql .= " where `id`='$arg'";
        }
        return $sql;
    }
    function all(...$arg)
    {
        $sql = $this->sql_all(" select * from $this->table ", ...$arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function count(...$arg)
    {
        $sql = $this->sql_all(" select count(*) from $this->table ", ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function find($arg)
    {
        $sql = $this->sql_one(" select * from $this->table ", $arg);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($arg)
    {
        $sql = $this->sql_one(" delete  from $this->table ", $arg);
        return $this->pdo->exec($sql);
    }
    function save($arg)
    {
        if (isset($arg['id'])) {
            $tmp = $this->a2s($arg);
            $sql = "update $this->table set " . join(",", $tmp) . " where `id`='{$arg['id']}'";
        } else {
            $keys = array_keys($arg);
            $sql = "insert into $this->table (`" . join("`,`", $keys) . "`) values ('" . join("','", $arg) . "')";
        }
        return $this->pdo->exec($sql);
    }
    protected function math($math, $col, ...$arg)
    {
        $sql = $this->sql_all("select $math($col) from $this->table ", ...$arg);
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col,...$arg){
        return $this->math('sum',$col,...$arg);
    }
    function max($col,...$arg){
        return $this->math('max',$col,...$arg);
    }
    function min($col,...$arg){
        return $this->math('min',$col,...$arg);
    }
    function view($path,$arg=[]){
        extract($arg);
        include($path);
    }
    function paginate($num,$arg=null){
        $total=$this->count($arg);
        $pages=ceil($total/$num);
        $now=$_GET['p']??1;
        $start=($now-1)*$num;

        $rows=$this->all($arg, " limit $start,$num");

        $this->links=[
            'total'=>$total,
            'pages'=>$pages,
            'now'=>$now,
            'num'=>$num,
            'start'=>$start,
            'table'=>$this->table,
        ];
        return $rows;
    }
    function links($table=null){
        if(is_null($table)){
            $table=$this->table;
        }
        $html='';
        if($this->links['now']-1>=1){
            $prev=$this->links['now']-1;
            $html.="<a href='?do=$table&p=$prev'> &lt; </a>";
        }
        for ($i=1; $i <=$this->links['pages']; $i++) { 
            $fontsize=($i==$this->links['now'])?"24px":"16px";
            $html.="<a href='?do=$table&p=$i' style='font-size:$fontsize'> $i </a>";
        }
        if($this->links['now']+1<=$this->links['pages']){
            $next=$this->links['now']+1;
            $html.="<a href='?do=$table&p=$next'> &gt; </a>";
        }
        return $html;
    }
}
