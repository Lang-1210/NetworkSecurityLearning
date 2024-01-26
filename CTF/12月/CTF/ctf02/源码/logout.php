<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	// 清除会话数据
	unset($_SESSION['username']);
	// 销毁会话
	session_destroy();
	// 重定向到其他页面或显示退出成功的消息
	header("Location: login.php");
	exit();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>