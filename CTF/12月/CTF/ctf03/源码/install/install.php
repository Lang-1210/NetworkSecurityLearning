<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Installation Wizard</title>
<style type=text/css>
*{font-size:9pt;
line-height:200%;
margin:0 auto;
}
body{margin-top:30px; background:url(../images/install_bg.jpg) repeat;}
li{
	list-style:none;
	margin-top:2px;
}
ul{padding:0;}
.install_title{ text-align:center; font:bold 16px/30px Arial, Helvetica, sans-serif; color:#1E5C0E;}
.install {FONT-FAMILY: Arial, Verdana; FONT-SIZE: 20px; FONT-WEIGHT: bold; color:#2F2F2F;}
.warn{ color:#FD1502;}
</style>
</head>
<body>
<div style="width:800px;">
<div class="install_title"><span class="install">Installation Wizard</span></div>
<br />
<?php
if(file_exists("install.lock"))
{
echo "警告(<span class='warn'>Warning</span>)：安装程序已经被锁定。<br/>
如果您确定要重新安装，请删除目录install下的 install.lock 文件。<br/><br/>
";
exit;
}
if(isset($_GET["step"]))
{$step=$_GET["step"];}
else
{$step=0;}
switch($step)
{
case 0:
?>
<script language="javascript" type="text/javascript">
function set()
{
 document.form2.Submit.disabled=!document.form2.Submit.disabled
 return ;
}
</script>
<form id="form2" name="form2" method="post" action="?step=1">
<ul>
  <li>
  <input name="alow" type="checkbox" id="alow" value="checkbox"  onclick="return set()"/>
  进行下一步操作！
</li>
<li>
  <input type="submit" name="Submit" value="下一步配置系统"  disabled="true"/>
  </li>
  </ul>
</form>


<?php
break;
case 1:
?>
<div style="border:1px gray solid;">
<div style="width:99%;padding-left:1%;height:30px;background: #C4E9FF;line-height:30px;font-size:11pt;">数据库帐号配置</div>
<form action="?step=2" method="post">
<ul style="padding:10px;">
  <li>数据库地址：
    <input name="host" type="text" value="localhost"/>
	一般为localhost
  </li>
<li>数据库名称：
  <input name="database" type="text"/></li>
<li>数据库帐号：
  <input name="user" type="text"/></li>
<li>数据库密码：
  <input name="pass" type="text"/></li>
<li><input name="下一步" type="submit" value="检测数据库连接情况"/></li>
</ul>

</form>
</div>
<?php
break;
case 2:
	$host = trim($_POST['host']);         //获取数据库地址
	$database = trim($_POST['database']); //获取数据库名称
	$user = trim($_POST['user']);         //获取数据库用户名
	$pass = trim($_POST['pass']);         //获取数据库密码
	
preg_match_all("/.*\//",$_SERVER["PHP_SELF"],$cs);
foreach($cs[0] as $wzml);
$content="<?php
\$host='".$host."'; //数据库地址
\$database='".$database."';   //数据库名称
\$user='".$user."';   //数据库帐户
\$pass='".$pass."';   //数据库密码
?>";

	
	if(@mysql_connect($host,$user,$pass))
	{
	$sqlDatabase = 'create database if not exists '.$database.' ';
    mysql_query($sqlDatabase);       
	$result1=mysql_select_db($database) or die("数据库连接出错,请检查数据库配置是否正确!<br/><a href='?step=1' class='button'>返回重新配置</a>");
	$result=file_put_contents("config.php",$content) or die("<script>alert('写入配置失败，请检查/目录是否可写入！');history.go(-1);</script>");
	echo "数据库连接配置正确！可点击下一步安装系统数据库！<br/>";
	echo "<input type=button onclick=\"window.location.href='?step=3'\" value=\"下一步安装数据库\">";
	}
	else
	{
    echo"<p>数据库连接出错,请检查数据库配置是否正确!</p>";
    echo"<p class='step'><a href='?step=1' class='button'>返回重新配置</a></p>";
	}
break;	
 
case 3:
include_once("config.php");

$conn=mysql_connect($host,$user,$pass);
mysql_query("set names 'utf8'");//这就是指定数据库字符集，一般放在连接数据库后面就系了就


if(!$conn)
 {
  die('数据库连接失败：'.mysql_error());
 }
$sqlDatabase = 'create database if not exists '.$database.' ';
if(!mysql_query($sqlDatabase))
{
echo "创建数据库出错，错误号：".mysql_errno()." 错误原因：".mysql_error();
}
mysql_select_db($database);
$file_name="site.sql";  //要导入的SQL文件名

        set_time_limit(0); //设置超时时间为0，表示一直执行。当php在safe mode模式下无效，此时可能会导致导入超时，此时需要分段导入
        $fp = @fopen($file_name, "r") or die("不能打开SQL文件 $file_name");//打开文件

        $sqlTable1='DROP TABLE IF EXISTS  down_flag';
        mysql_query($sqlTable1);
        $sqlTable1='DROP TABLE IF EXISTS manage_user';
        mysql_query($sqlTable1);
        $sqlTable1='DROP TABLE IF EXISTS pro';
        mysql_query($sqlTable1);

        function GetNextSQL() {
                global $fp;
                $sql="";
                while ($line = @fgets($fp, 40960)) {
                        $line = trim($line);
                        //以下三句在高版本php中不需要，在部分低版本中也许需要修改
                        $line = str_replace("\\\\","\\",$line);
                        $line = str_replace("\’","’",$line);
                        $line = str_replace("\\r\\n",chr(13).chr(10),$line);
                       //   $line = stripcslashes($line);
                        if (strlen($line)>1) {
                                if ($line[0]=="-" && $line[1]=="-") {
                                        continue;
                                }
                        }
                        $sql.=$line.chr(13).chr(10);
                        if (strlen($line)>0){
                                if ($line[strlen($line)-1]==";"){
                                        break;
                                }
                        }
                }
                return $sql;
        }
        
        
        
        while($SQL=GetNextSQL()){
                if (!mysql_query($SQL)){
                        echo "执行出错：".mysql_error()."";
                        echo "SQL语句为：".$SQL."";
                }

        }

        fclose($fp) or die("Can’t close file $file_name");//关闭文件
        mysql_close();

        //从文件中逐条取SQL
        

        echo "数据表创建完成<br/>";
        echo "系统安装成功。<br/>";
		echo "访问网站：<a target=_blank href=/index.php>点击访问</a><br/>";
        file_put_contents("install.lock","恭喜你，系统安装成功！");

break;
}
?>
<hr style="width:800px;margin-top:20px;"/>
</div>

</body>
</html>
