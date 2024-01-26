<?php
include '../base.php';
// 获取当前请求的 User-Agent
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// 判断 User-Agent 是否为 Aurora2024 浏览器
if (strpos($userAgent, 'Aurora2024') !== false) {
    // 如果 User-Agent 是 Aurora2024 浏览器，则继续访问第二个页面
    // 这里放置第二个页面的内容
} else {
    // 如果 User-Agent 不是 Aurora2024 浏览器，则重定向回第一个页面
    echo "<script>window.location.href='3.php';alert('请使用Aurora2024浏览器')</script>"; 
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Congratulate</title>
    <link rel="stylesheet" href="../css/45.css">
</head>

<body>
<div class="container">
        <div class="card">
            <div class="img-box">
                <img src="../images/2.jpg" alt="">
            </div>
            <div class="text-box">
                <h2>Congratulate</h2>
                <p>愿你在CTF赛场上攀登高峰，闪耀出炫目的技术光芒，成为真正的安全大师！</p>
                <p>last：_2024_happy_new_year}</p>  
            </div>
        </div>
    </div>
</body>

</html>
