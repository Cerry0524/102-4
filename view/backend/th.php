<h2 class="ct">商品分類</h2>
<div class="ct">
    <label for="">新增大分類</label>
    <input type="text" name="big" id="big">
    <button onclick="add_type('big')">新增</button>
</div>
<div class="ct">
    <label for="">新增中分類</label>
    <select name="bigs" id="bigs">
        <?php
        $bigs = $Type->all(['big' => 0]);
        foreach ($bigs as $big) {
        ?>
            <option value="<?= $big['id']; ?>"><?= $big['name']; ?></option>
        <?php
        }
        ?>
    </select>
    <input type="text" name="mid" id="mid">
    <button onclick="add_type('mid')">新增</button>
</div>
<table class="all">

    <?php
    $bigs = $Type->all(['big' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt">
                <?= $big['name']; ?>
            </td>
            <td class="tt">
                <button onclick="edit_type( this,<?= $big['id']; ?>)">修改</button>
                <button onclick="del(<?= $big['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php
        $mids = $Type->all(['big' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <td class="pp">
                    <?= $mid['name']; ?>
                </td>
                <td class="pp">
                    <button onclick="edit_type(this, <?= $mid['id']; ?>)">修改</button>
                    <button onclick="del(<?= $mid['id']; ?>)">刪除</button>
                </td>
            </tr>
    <?php
        }
    }
    ?>

</table>
<script>
    function edit_type(dom, id) {
        let text = $(dom).parent().prev().text();
        let name = prompt("修改選擇類別", text);

        if (name != null) {
            $.post("./api/edit_type.php", {
                name,
                id
            }, (res) => {
                console.log(res);
            })
        }
    }

    function add_type(type) {
        switch (type) {
            case 'big':
                $.post("./api/edit_type.php", {
                    name: $("#big").val(),
                    big: 0
                }, (res) => {
                    location.reload();
                })
                break;
            case 'mid':
                $.post("./api/edit_type.php", {
                    name: $("#mid").val(),
                    big: $("#bigs").val()
                }, (res) => {
                    location.reload();
                })
                break;
        }
    }

    function del(id) {
        $.post("./api/del.php", {
            id,
            table: 'Type'
        }, (res) => {
            location.reload();
        })
    }
</script>
<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>
<table class="all">
    <tr>
        <td class="tt">編號</td>
        <td class="tt">商品名稱</td>
        <td class="tt">庫存量</td>
        <td class="tt">狀態</td>
        <td class="tt">操作</td>
    </tr>
    <?php
    $rows = $Goods->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp"><?= $row['no']; ?></td>
            <td class="pp"><?= $row['name']; ?></td>
            <td class="pp"><?= $row['stock']; ?></td>
            <td class="pp"><?= ($row['sh'] == 1) ? "販售中" : "已下架"; ?></td>
            <td class="pp">
                <button onclick="location.href='?do=edit_goods&id=<?= $row['id']; ?>'">修改</button>
                <button onclick="del_goods(<?= $row['id']; ?>)">刪除</button>
                <button onclick="sh(<?= $row['id']; ?>,1)">上架</button>
                <button onclick="sh(<?= $row['id']; ?>,0)">下架</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    function del_goods(id) {
        $.post("./api/del.php", {
            id,
            table: 'Goods'
        }, (res) => {
            location.reload();
        })
    }

    function sh(id, sh) {
        $.post("./api/sh.php", {
            id,
            sh
        }, () => {
            location.reload();
        })
    }
</script>