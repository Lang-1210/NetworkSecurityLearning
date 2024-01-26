<?php
///**
// * Created by runner.han
// * There is nothing new under the sun
// */


ob_start();

if (!isset($PIKA_ROOT_DIR)) {
    $PIKA_ROOT_DIR = '';
}


//$ACTIVE = array("active open","active","","","");

if (!isset($ACTIVE)) {
    $SELF_PAGE = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1);
    if ($SELF_PAGE = "index.php") {
        //22 title
        $ACTIVE = array("active open", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>My Admin Site</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo $PIKA_ROOT_DIR; ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $PIKA_ROOT_DIR; ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo $PIKA_ROOT_DIR; ?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo $PIKA_ROOT_DIR; ?>assets/css/ace.min.css" class="ace-main-stylesheet"
        id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo $PIKA_ROOT_DIR; ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo $PIKA_ROOT_DIR; ?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo $PIKA_ROOT_DIR; ?>assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo $PIKA_ROOT_DIR; ?>assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo $PIKA_ROOT_DIR; ?>assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo $PIKA_ROOT_DIR; ?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo $PIKA_ROOT_DIR; ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo $PIKA_ROOT_DIR; ?>assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo $PIKA_ROOT_DIR; ?>assets/js/bootstrap.min.js"></script>

</head>

<body class="no-skin">

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try { ace.settings.loadState('main-container') } catch (e) { }
        </script>


        <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
            <script type="text/javascript">
                try { ace.settings.loadState('sidebar') } catch (e) { }
            </script>
            <style>
                li {
                    text-align: center;
                }
            </style>
            <ul class="nav nav-list">
                <li class="<?php echo $ACTIVE[0]; ?>">
                    <a href="<?php echo $PIKA_ROOT_DIR; ?>index.php">
                        <i class=""></i>
                        <span class="menu-text"> 我的首页 </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php echo $ACTIVE[0]; ?>">
                    <a href="<?php echo $PIKA_ROOT_DIR; ?>site/upload/index_upload.php">
                        <i class=""></i>
                        内容管理
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php echo $ACTIVE[0]; ?>">
                    <a href="<?php echo $PIKA_ROOT_DIR; ?>site/file/local.php">
                        <i class=""></i>
                        我的文件
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php echo $ACTIVE[0]; ?>">
                    <a href="<?php echo $PIKA_ROOT_DIR; ?>login.php">
                        <i class=""></i>
                        退出登录
                    </a>

                    <b class="arrow"></b>
                </li>
                <!-- <li class="<?php echo $ACTIVE[1]; ?>">
                    <a href="#" class="dropdown-toggle">
                        <i class="ace-icon glyphicon glyphicon-lock"></i>
                        <span class="menu-text">
                            暴力破解
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="<?php echo $ACTIVE[2]; ?>">
                            <a href="<?php echo $PIKA_ROOT_DIR; ?>vul/burteforce/burteforce.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                概述
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="<?php echo $ACTIVE[3]; ?>">
                            <a href="<?php echo $PIKA_ROOT_DIR; ?>vul/burteforce/bf_form.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                基于表单的暴力破解
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="<?php echo $ACTIVE[4]; ?>">
                            <a href="<?php echo $PIKA_ROOT_DIR; ?>vul/burteforce/bf_server.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                验证码绕过(on server)
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="<?php echo $ACTIVE[5]; ?>">
                            <a href="<?php echo $PIKA_ROOT_DIR; ?>vul/burteforce/bf_client.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                验证码绕过(on client)
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="<?php echo $ACTIVE[6]; ?>">
                            <a href="<?php echo $PIKA_ROOT_DIR; ?>vul/burteforce/bf_token.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                token防爆破?
                            </a>

                            <b class="arrow"></b>
                        </li>








                    </ul>
                </li> -->
                <!-- <li class="<?php echo $ACTIVE[65]; ?>">
                    <a href="#" class="dropdown-toggle">
                        <i class="ace-icon glyphicon glyphicon-upload"></i>
                        <span class="menu-text">
                            Unsafe Fileupload
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">




                        <li class="<?php echo $ACTIVE[67]; ?>">
                            <a href="<?php echo $PIKA_ROOT_DIR; ?>vul/unsafeupload/clientcheck.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                client check
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="<?php echo $ACTIVE[68]; ?>">
                            <a href="<?php echo $PIKA_ROOT_DIR; ?>vul/unsafeupload/servercheck.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                MIME type
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="<?php echo $ACTIVE[69]; ?>">
                            <a href="<?php echo $PIKA_ROOT_DIR; ?>vul/unsafeupload/getimagesize.php">
                                <i class="menu-icon fa fa-caret-right"></i>
                                getimagesize
                            </a>
                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li> -->
            </ul><!-- /.nav-list -->


        </div>