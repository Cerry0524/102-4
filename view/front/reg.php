<h2 class="ct">會員註冊</h2>
<form action="./api/reg.php" method="post">
    <table class="all">
        <tr>
            <td class="tt">姓名</td>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp">
                <input type="text" name="acc" id="acc">
                <input type="button" value="檢測帳號" onclick="chk_acc()">
            </td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <td class="tt">住址</td>
            <td class="pp"><input type="text" name="addr" id="addr"></td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp"><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" onclick="reg()" value="註冊">
        <input type="reset" value="重置">
    </div>
</form>
<script>
    error(<?=$_GET['error'];?>);
    function error(error){
        switch (parseInt(res)) {
                case 1:
                    alert("歡迎註冊請登入")
                    break;
                case 2:
                    alert("admin帳號無法申請")
                    break;
                case 0:
                    alert("帳號重複")
                    break;
            }
    }
    function chk_acc() {
        let acc = $("#acc").val()
        $.post("./api/acc_chk.php", {
            acc
        }, (res) => {
            switch (parseInt(res)) {
                case 1:
                    alert("帳號無人使用")
                    break;
                case 2:
                    alert("admin帳號無法申請")
                    break;
                case 0:
                    alert("帳號重複")
                    break;
            }
        })
    }


</script>