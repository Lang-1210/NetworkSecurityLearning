<?php
header("Content-type: text/html; charset=utf-8"); // 设置页面的字符编码为 UTF-8
// setcookie("lantern", "yellow", time()+3600*24*7, "/", $_SERVER['HTTP_HOST']);
header("Set-Cookie:lantern=yellow");
?>