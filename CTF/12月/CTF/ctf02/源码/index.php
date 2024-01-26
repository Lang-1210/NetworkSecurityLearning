<?php
	error_reporting(0);
	setcookie('FLAG', 'ZmxhZ3tJIGFtIGZsYWd9', time() + 3600, '/'); 
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	$user = $_SESSION["user"];
	$username = $_SESSION["username"];
	$sign=$_SESSION['sign'];
	if(empty($username)){
		header("Location: login.php");
		exit();
	}
	if(!empty($_POST)){
		if($_POST['key'] == 'xxx'){
			echo 'xx';
			exit();
		}
	}
	// highlight_file(filename)

?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>内部系统</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<style type="text/css">
		body{
		   	padding: 0;
			margin: 0;
            overflow: hidden;
            position: relative;
		}
		.container{
			width: 100%;
			height:100%;
			position: absolute;
			top: 0;
			left: 0;
			display: flex;
			justify-content: center;
			z-index: 999;
		}
		.box{
			line-height: 2;
			margin-top: 65px;
			width: 400px;
			height: 400px;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			/*border:1px solid red;*/
			border-radius: 18px;
			/*box-shadow: 5px 5px 20px 10px rgba(0,0,0,0.2);*/
		}
		a{
			text-decoration: none;
			display: block;
			color: white;
		}
		a:hover{
			color: white;
		}
		#myCanvas{
			z-index: -1;
		}
		.f{
			opacity: 0;
			transition: 0.5s;
		}
		.box:hover .f{
			opacity: 1;
		}
		input[type='text']{
			width: 300px;
			height: 35px;
			margin:10px;
		}
		.logout{
			position: absolute;
			top: 350px;
			left: 450px
		}
	</style>
  </head>
  <body oncontextmenu=self.event.returnValue=false onselectstart="return false">
  	<canvas id="myCanvas"></canvas>
    <div class="container">
	     <form class="box" action="flag.php" method="POST">	
	     	<h1 style="color: #0f0">HELLO <?php echo $user; ?></h1>
	     	<h2 style="color: #0f0">FLAG IS HERE</h2>
	     	<p class="f"><?php echo $sign; ?></p>
	     	<input type="text" id="flag" name="flag" class="form-control" placeholder="请输入 flag" required>
	     	<a href="./logout.php">退出登录</a>
	        <button class="btn btn-lg btn-primary" type="submit">提交</button>
	     </form>
    </div>
  </body>
  <script type="text/javascript" src="./js/code.js"></script>
</html>


