<?php $item = $Goods->find($_GET['id']); ?>
<h2 class="ct"><?= $item['name']; ?></h2>
<div style="display: flex;width:100%;margin:auto;border:1px solid white">
    <div class="pp" style="width:60%;padding:15px">
            <img src="../upload/<?= $item['img']; ?>" style="width:350px;height:350px">
    </div>
    <div class="pp" style="display: flex;width:40%;flex-direction:column;justify-content:space-between;">
        <div class="pp"><?=$Type->topNav($item['mid']);?></div>
        <div class="pp"> 編號：<?= $item['no']; ?></div>
        <div class="pp"> 價格：<?= $item['price']; ?></div>
        <div class="pp"> <?=$item['intro']; ?></div>
        <div class="pp"> 庫存量：<?=$item['stock']; ?></div>
    </div>
</div>
<div class="tt ct">
    購買數量
    <input type="number" name="qt" id="qt" value="1">
    <a href="?" onclick="buy(<?=$item['id']; ?>)">
        <img src="./icon/0402.jpg"></a>
</div>
<script>
    function buy(id){
        $.get("./api/buy.php",{id,qt:$("#qt").val()},(res)=>{
            console.log(res);
        })
        
    }
</script>