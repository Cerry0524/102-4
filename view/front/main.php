<h2><?= $Type->topNav($_GET['type'] ?? 0); ?></h2>
<?php
$items = $Goods->items($_GET['type'] ?? 0);
foreach ($items as $item) {
?>
    <div style="display: flex;width:80%;margin:auto;border:1px solid white">
        <div class="pp" style="width:30%;padding:15px">
            <img src="../upload/<?= $item['img']; ?>" style="width:150px;height:150px">
        </div>
        <div class="pp" style="display: flex;width:70%;flex-direction:column;justify-content:space-between;">
            <div  class="tt ct"> <?= $item['name']; ?></div>
            <div  class="pp"> 編號：<?= $item['no']; ?></div>
            <div  class="pp"> 價格：<?= $item['price']; ?></div>
            <div  class="pp"> <?= mb_substr($item['intro'],0,40); ?>...</div>
        </div>
    </div>




<?php
}
?>