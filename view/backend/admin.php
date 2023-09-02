<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>
</div>
<table class="all">
    <tr>
        <td class="tt">帳號</td>
        <td class="tt">密碼</td>
        <td class="tt">管理</td>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp">
                <?= $row['acc']; ?>
            </td>
            <td class="pp">
                <?= str_repeat("*", strlen($row['pw'])); ?>
            </td>
            <td class="pp">
                <?php
                if ($row['acc'] == 'admin') {
                    echo "此帳號為最高權限";
                } else {
                ?>
                    <button onclick="location.href='?do=edit_admin&id=<?= $row['id']; ?>'">修改</button>
                    <button onclick="location.href='./api/del_get.php?id=<?= $row['id']; ?>&table=Admin'">刪除</button>
                <?php
                }
                ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    function del(id) {
        let table = 'User';
        $.post("./api/del.php", {
            table,
            id
        }, (res) => {
            console.log(res);
            // location.reload();
        })
    }
</script>