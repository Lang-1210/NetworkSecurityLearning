<?php
    include 'base.php';
    if(isset($_GET['money'])){
        $money=$_GET['money'];
        if($money>=888){
            header('Location: pages/2.php');
            exit;
        }else{
            echo "<script>alert('太少了')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <title>SECRET</title>
    <link rel="stylesheet" href="./css/45.css">
    <style>
  
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="img-box">
                <img src="./images/1.jpg" alt="">
            </div>
            <div class="text-box">
                <h2>Hello</h2>
                <p>我是ctf，马上要过年了，你打算给我发多少<span class="money">money</span>的红包呢🧧，（请直接给我放在URL参数里吧😁）</p>
                <p>当我满意后才能通过这关哦</p>
            </div>
        </div>
    </div>
</body>

</html>