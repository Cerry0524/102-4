<h2 class="ct">新增商品</h2>
<form action="./api/save.php" method="post" enctype="multipart/form-data">
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
            <td class="pp"><input type="text"></td>
        </tr>
        <tr>
            <td class="tt">商品名稱</td>
            <td class="pp"><input type="text"></td>
        </tr>
        <tr>
            <td class="tt">商品價格</td>
            <td class="pp"><input type="text"></td>
        </tr>
        <tr>
            <td class="tt">規格</td>
            <td class="pp"><input type="text"></td>
        </tr>
        <tr>
            <td class="tt">庫存量</td>
            <td class="pp"><input type="text"></td>
        </tr>
        <tr>
            <td class="tt">商品圖片</td>
            <td class="pp"><input type="text"></td>
        </tr>
        <tr>
            <td class="tt">商品介紹</td>
            <td class="pp"><input type="text"></td>
        </tr>
    </table>
    <div class="ct">
        <div class="ct">
            <input type="hidden" name="table" value="Goods">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
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
            getMid($("#big").val());
        })
    }

    function getMid(id) {
        console.log(id);
        $.get("./api/getOption.php", {
            type: 'mid',id
        }, (mid) => {
            $("#mid").html(mid);
        })
    }
</script>