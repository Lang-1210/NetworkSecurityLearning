<?php
/**
 * Created by runner.han
 * There is nothing new under the sun
 */


$PIKA_ROOT_DIR = "./";

include_once $PIKA_ROOT_DIR . 'inc/config.inc.php';
include_once $PIKA_ROOT_DIR . 'inc/mysql.inc.php';

$SELF_PAGE = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1);
if ($SELF_PAGE = "login.php") {
    $ACTIVE = array('', 'active open', '', 'active', "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

}

// include_once $PIKA_ROOT_DIR . 'header.php';

$link = connect();
$html = "";

//典型的问题,没有验证码,没有其他控制措施,可以暴力破解
if (isset($_POST['submit']) && $_POST['username'] && $_POST['password']) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from users where username=? and password=md5(?)";
    $line_pre = $link->prepare($sql);


    $line_pre->bind_param('ss', $username, $password);

    if ($line_pre->execute()) {
        $line_pre->store_result();
        if ($line_pre->num_rows > 0) {
            header('location:./index.php');
            $html .= '<p> login success</p>';

        } else {
            $html .= '<p style="color:red;"> username or password is not exists～</p>';
        }

    } else {
        $html .= '<p>执行错误:' . $line_pre->errno . '错误信息:' . $line_pre->error . '</p>';
    }

}



?>

<style>
    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bf_form {
        width: 100%;
        margin: 100px auto;
    }

    .lb {
        display: block;
    }

    .btn {
        display: block;
        margin-top: 10px;
    }
</style>
<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">

            <div class="bf_form">
                <div class="bf_form_main">
                    <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        Please Enter Your Information
                    </h4>
                    <form method="post" action="login.php">

                        <!--            <fieldset>-->
                        <label class="lb">
                            <span>
                                <input type="text" name="username" placeholder="Username" />
                                <i class="ace-icon fa fa-user"></i>
                            </span>
                        </label>
                        </br>
                        <label class="lb">
                            <span>
                                <input type="password" name="password" placeholder="Password" />
                                <i class="ace-icon fa fa-lock"></i>
                            </span>
                        </label>
                        <div class="space"></div>
                        <div class="btn">
                            <label class="lb"><input class="submit" name="submit" type="submit" value="Login" /></label>
                        </div>
                    </form>
                    <?php echo $html; ?>


                </div><!-- /.widget-main -->

            </div><!-- /.widget-body -->



        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->


<?php

?>