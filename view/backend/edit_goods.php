<?php $row = $Goods->find($_GET['id']); ?>
<h2 class="ct">修改商品</h2>
<form action="./api/edit_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big">
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid">
                    <option value=""></option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt">商品編號</td>
            <td class="pp"><input type="text" name="no" value="<?= $row['no']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?= $row['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp"><input type="text" name="price" value="<?= $row['price']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp"><input type="text" name="spec" value="<?= $row['spec']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp"><input type="text" name="stock" value="<?= $row['stock']; ?>"></td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp">
                <input type="file" name="img" id="img">
            </td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp">
                <textarea name="intro" id="intro" style="width:300px;height:150px"> <?= $row['intro']; ?>
        </textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <div class="ct">
            <input type="hidden" name="id" value="<?=$row['id'];?>">
            <input type="submit" value="更新">
            <input type="reset" value="重置">
            <input type="button" value="返回" onclick="location.href='?do=th'">
        </div>
    </div>
</form>
<script>
    getBig();

    $("#big").change(function() {
        getMid($("#big").val());
    })

    function getBig() {
        $.get("./api/getOption.php", {
            type: 'big'
        }, (big) => {
            // console.log(big);
            $("#big").html(big);
            $("#big option[value='<?= $row['big']; ?>']").prop("selected", true);
            getMid($("#big").val());
        })
    }

    function getMid(id) {
        console.log(id);
        $.get("./api/getOption.php", {
            type: 'mid',
            id
        }, (mid) => {
            $("#mid").html(mid);
            $(`#mid option[value='<?= $row['mid']; ?>']`).prop("selected", true);
        })
    }
</script>