// JavaScript Document
function lof(x) {
	location.href = x
}
function login(table) {
	let user = {};
	user.acc = $("#acc").val();
	user.pw = $("#pw").val();

	let ans = $("#ans").val();
	$.post("./api/ans.php", { ans }, (ans) => {
		if (parseInt(ans)) {
			$.post("./api/login.php", { table, user }, (res) => {
				
				switch (parseInt(res)) {
					case 1:
						console.log('admin');
						if (table == 'Admin') {
							location.href = "backend.php";
						} else {
							location.href = "index.php";
						}
						break;
					case 0:
						alert("帳號密碼錯誤");
						break;
					
				}
			})
		} else {
			alert("驗證碼錯誤請重新輸入");
		}
	})
}