<?php
header("Content-type: text/html; charset=utf-8"); // 设置页面的字符编码为 UTF-8
// 检查是否从第一个页面跳转而来
$referer = $_SERVER['HTTP_REFERER'];
if (strpos($referer, '53.php') === false) {
    echo 'Access denied!';
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <title>Congratulate</title>
    <link rel="stylesheet" href="./css/97.css">
</head>

<body>
    <div class="box">
        <div class="side front">开箱</div>
        <div class="side back"></div>
        <div class="side left"></div>
        <div class="side right"></div>
        <div class="side top">
            <div class="tl"></div>
            <div class="tr"></div>
        </div>
        <div class="side bottom"></div>
        <div class="text">flag{344t496jogi0r6}</div>
    </div>

    <script src="./js/19.js"></script>
</body>

</html>