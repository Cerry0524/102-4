<?php if(!isset($_SESSION['cart'])){ 
    ?>
    <h2 class="ct">目前尚未購物，請前往商城選購</h2>
    <?php
}else{
?>

<h2 class="ct"><?= $_SESSION['user']; ?>的購物車</h2>
<table class="all">
    <tr>
        <td class="tt">編號</td>
        <td class="tt">商品名稱</td>
        <td class="tt">數量</td>
        <td class="tt">庫存量</td>
        <td class="tt">單價</td>
        <td class="tt">小計</td>
        <td class="tt">刪除</td>
    </tr>
    <?php
    foreach ($_SESSION['cart'] as $id => $qt) {
        $row=$Goods->find($id);
    ?>
        <tr>
            <td class="pp"><?= $row['no']; ?></td>
            <td class="pp"><?= $row['name']; ?></td>
            <td class="pp"><?= $qt; ?></td>
            <td class="pp"><?= $row['stock']; ?></td>
            <td class="pp"><?= $row['price']; ?></td>
            <td class="pp"><?= $row['price']*$qt; ?></td>
            <td class="pp">
                <a href="./api/delCart.php?id=".$id>
                    <img src="./icon/0415.jpg" alt="">
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <a href="?type=0">
        <img src="./icon/0411.jpg" alt="">
    </a>
    <a href="?do=checkout">
        <img src="./icon/0412.jpg" alt="">
    </a>
</div>

<?php
}
?>