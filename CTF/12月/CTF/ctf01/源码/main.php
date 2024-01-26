<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

// 检查是否已经绕过第一个页面
if(!isset($_SESSION['authenticated']) && $_SESSION['authenticated'] !== true) {
    header('Location: index.php');
	exit();  
}
?>
<!DOCTYPE html>
<html lang="Zh-CN">
<head>
	<meta charset="utf-8">
    <title>flag</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body oncontextmenu=self.event.returnValue=false onselectstart="return false">
	<div id="wrap">
		<h1>CONGRATULATIONS</h1>
		<br><br><br>
		<div id="form-wrap">
			<form style="text-align: center;">
				<br>
				<br>
				<p>HELLO STRANGER</p>
				<br>
				<br>
				<br>
				<br>
				<br>
				<span></span>
				<img src="./img/5A6D78685A3373794D4497A4D5449794D5445784E546374E58303D.png" style="width: 200px;height: 200px">
			</form>
		</div>
	</div>
  </body>
</html>


