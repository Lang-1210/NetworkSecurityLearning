
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>登录</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
	  <script type="text/javascript" src="./js/jquery.min.js"></script>
    <style type="text/css">
      .form-signin-heading{
        text-align: center;
      }
      input{
        margin: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">请登录</h2>
        <label for="username" class="sr-only">用户名</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="用户名" required autofocus>
        <label for="password" class="sr-only">密码</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="密码" required>
        <input class="btn btn-lg btn-primary btn-block" type="submit">
      </form>
    </div>
	
  </body>
</html>

<?php

// 随机生成一个包含字母和数字的16位密码
  function generatePassword() {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $password = '';
      $length = 16;

      for ($i = 0; $i < $length; $i++) {
          $index = rand(0, strlen($characters) - 1);
          $password .= $characters[$index];
      }
      return $password;
  }
  if(!empty($_POST)){
    if($_POST['username'] == 'admin' && $_POST['password'] == '654123'){   
      session_start();
      $pass=generatePassword();
      $flag="flag{".$pass."}";
      $key=base64_encode($flag);
      /*
      zMZmxhZ3tKdUIxYk9RVX0===
      zMZmxhZ3swUjZFd1owOX0===
      zMZmxhZ3tqMFVtVE9mV30===
      zMZmxhZ3t5UnV4ZzRxeH0===
      zMZmxhZ3tBN1VGeHZ5M30===
      */
      // "zM".$key."=="
      $sign="zM".$key."==";
      $_SESSION['flag']=$flag;
      $_SESSION["sign"]=$sign;
      $_SESSION["username"] = md5($_POST['username']);
      $_SESSION["user"] = $_POST['username'];
      header("Location: index.php");
      echo "<script>alert('登录成功');</script>";
      exit();
    }else{
     echo "<script>alert('用户名或密码错误');window.location.href='login.php'</script>";
    }
  }
?>
