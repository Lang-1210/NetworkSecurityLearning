<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

// 检查是否已经绕过第一个页面
// if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
//     // 已经绕过，跳转到第二个页面
//     header('Location: main.php');
//     exit();
// }

// 验证逻辑，例如检查传递的参数是否正确
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['verify']) && $_GET['verify'] === 'pass') {
    // 验证通过，设置会话标记，标记已经绕过第一个页面
    $_SESSION['authenticated'] = true;
    // 跳转到第二个页面
    header('Location: main.php');
    exit();
}
?>

<!DOCTYPE html>
<html oncontextmenu=self.event.returnValue=false onselectstart="return false">
<head>
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="./css/index.css">
</head>
<body>
    <div class="con">
        <p>I want a parameter that can <i> verify</i>&nbsp; if you can <i>pass</i> go to the next page</p>
    </div>
</body>
</html>