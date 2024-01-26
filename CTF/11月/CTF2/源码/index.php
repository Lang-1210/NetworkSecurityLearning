<?php

include_once 'inc/config.inc.php';

include "header.php";

$html = "";
try {
    mysqli_connect(DBHOST, DBUSER, DBPW, DBNAME);
} catch (Exception $e) {
    $html .=
        "<p >
        <a href='install.php' style='color:red;'>
        提示:欢迎使用,还没有初始化，点击进行初始化安装!
        </a>
    </p>";
}

?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <?php echo $html; ?>
            <div id="intro_main">
                <p class="p1">
                    可以请我喝一杯奶茶嘛。。。。。。
                </p>
                <p>
                    <img src="./6562c5c1f33db6e05a082a88cddab5ea.png" alt=" 微信支付">
                    <img src="./81dc9bdb52d04dc20036dbd8313ed055.png" alt="支付宝支付">
                </p>
            </div>


        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>