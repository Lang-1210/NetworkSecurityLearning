<?php
    include '../base.php';
    if(isset($_POST['money'])){
        $money = $_POST['money'];
        if($money==2024){
            header('Location: 3.php');
            exit;
        }else{
            echo "<script>alert('不对哦。。。')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <title>Gratitude</title>
    <link rel="stylesheet" href="../css/45.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="img-box">
                <img src="../images/4.jpg" alt="">
            </div>
            <div class="text-box">
                <h2>Gratitude</h2>
                <p>如果我还想让你以POST方式来给我 <span class="money">money</span> 呢？</p>
                <p>而且我想要一个指定数字的红包才能通过这关，想想这个数字在哪儿出现过...</p>
            </div>
        </div>
    </div>
</body>
</html>