<?php
// 启动会话
header("Content-Type:text/html;charset=utf-8");
session_start();
if(isset($_POST['flag'])){
	$input_flag=$_POST['flag'];
	$session_flag=$_SESSION['flag'];
	if($input_flag===$session_flag){
		echo "<script>alert('flag正确')</script>";
		echo $session_flag;
	}else{
		echo "<script>alert('flag不正确,请重新输入！');window.location.href='index.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>flag</title>
</head>
<body>

</body>
</html>