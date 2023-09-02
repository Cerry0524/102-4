// JavaScript Document
function lof(x) {
	location.href = x
}
function login(table) {
	let user = {};
	user.acc = $("#acc").val();
	user.pw = $("#pw").val();
	let ans = $("#ans").val();
	$.post("./api/ans.php", {
		ans
	}, (res) => {
		switch (parseInt(res)) {
			case 1:
				$.post("./api/login.php", {
					table,
					user
				}, (login) => {
					console.log(res);
					switch (parseInt(login)) {
						case 0:
							alert("帳號密碼錯誤");
							break;
						case 1:
							location.href = 'index.php';
							break;
						case 2:
							location.href = 'backend.php';
							break;
					}
				})

				break;
			case 0:
				alert("對不起，你輸入的驗證碼有誤。請您重新輸入")
				break;
		}
	})
}