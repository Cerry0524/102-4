<h2 class="ct">會員管理</h2>
<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="tt">會員帳號</td>
        <td class="tt">註冊日期</td>
        <td class="tt">操作</td>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp">
                <?= $row['name']; ?>
            </td>
            <td class="pp">
                <?= $row['acc']; ?>
            </td>
            <td class="pp">
                <?= $row['regdate']; ?>
            </td>
            <td class="pp">
                <button onclick="location.href='?do=edit_user&id=<?= $row['id']; ?>'">修改</button>
                <button onclick="location.href='./api/del_get.php?id=<?= $row['id']; ?>&table=User'">刪除</button>
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