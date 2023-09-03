<?php $row = $User->find(['acc' => $_SESSION['user']]); ?>
<h2 class="ct">填寫資料</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><?= $row['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?= $row['name']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?= $row['email']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?= $row['addr']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?= $row['tel']; ?>"></td>
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
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
        $row = $Goods->find($id);
    ?>
        <tr>
            <td class="pp"><?= $row['name']; ?></td>
            <td class="pp"><?= $row['no']; ?></td>
            <td class="pp"><?= $qt; ?></td>
            <td class="pp"><?= $row['price']; ?></td>
            <td class="pp"><?= $row['price'] * $qt; ?></td>
            <?php $total += $row['price'] * $qt; ?>
        </tr>
    <?php
    }
    ?>
</table>
<div class="all tt ct">總價<?= $total; ?> </div>
<div class="ct">
    <input type="hidden" name="table" value="Order">
    <input type="button" onclick="order()" value="確定送出">
    <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
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