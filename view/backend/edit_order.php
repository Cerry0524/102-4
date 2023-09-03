<?php $order = $Order->find($_GET['id']); ?>
<h2 class="ct">訂單編號<span style="color:red"><?= $order['no']; ?></span> 的詳細資料</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><?= $order['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?= $order['name']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?= $order['email']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?= $order['addr']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?= $order['tel']; ?>"></td>
    </tr>
</table>
<table class="all">
    <tr>
        <td class="tt">商品名稱</td>
        <td class="tt">編號</td>
        <td class="tt">數量</td>
        <td class="tt">單價</td>
        <td class="tt">小計</td>
    </tr>
    <?php
    $row['cart']=unserialize($order['cart']);
    foreach ($row['cart'] as $id => $qt) {
        $row = $Goods->find($id);
    ?>
        <tr>
            <td class="pp"><?= $row['name']; ?></td>
            <td class="pp"><?= $row['no']; ?></td>
            <td class="pp"><?= $qt; ?></td>
            <td class="pp"><?= $row['price']; ?></td>
            <td class="pp"><?= $row['price'] * $qt; ?></td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="all tt ct">總價<?=  $order['total'] ; ?> </div>
<div class="ct">
    <input type="hidden" name="table" value="Order">
    <input type="button" value="返回" onclick="location.href='?do=order'">
</div>

<script>
    function order() {
        let order = {};
        order.name = $("#name").val();
        order.email = $("#email").val();
        order.addr = $("#addr").val();
        order.tel = $("#tel").val();
        order.total = <?= $total; ?>;

        alert("訂購成功，感謝您的選購")
        $.post("./api/order.php", order, (res) => {
            location.href = 'index.php';
        })
    }
</script>