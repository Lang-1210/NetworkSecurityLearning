<?php
include("install/config.php");
error_reporting(0);
$conn=mysql_connect($host,$user,$pass) or die("数据库连接出错,请检查数据库配置是否正确!");
mysql_query("set names 'utf8'");
$select_db = mysql_select_db($database,$conn);
if(!$select_db){
  echo "无相关数据，请选择正确的数据库！或者请重新安装<a href='install/inatall.php' target='_self'>>>>点击安装<<<</a>";
}
?>