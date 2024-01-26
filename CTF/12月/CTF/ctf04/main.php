<?php
// 检查请求头中的accept-language是否为法语
$acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
if (strpos($acceptLanguage, 'fr') === false) {
    // 如果不是法语，则进行重定向到第一个页面
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>第二个页面</title>
</head>
<body>
    <h1>欢迎访问第二个页面！</h1>
    
    <!-- 这里是第二个页面的其他内容 -->
</body>
</html>
