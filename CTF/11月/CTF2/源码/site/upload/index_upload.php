<?php
$SELF_PAGE = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1);

if ($SELF_PAGE = "clientcheck.php") {
    $ACTIVE = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active open', '', '', '', 'active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
}
$PIKA_ROOT_DIR = "../../";
include_once $PIKA_ROOT_DIR . 'header.php';
include_once $PIKA_ROOT_DIR . 'inc/uploadfunction.php';

$html = '';
if (isset($_POST['submit'])) {
    $type = array('jpg', 'jpeg', 'png'); //指定类型
    $mime = array('image/jpg', 'image/jpeg', 'image/png');
    $save_path = 'uploads' . date('/Y/m/d/'); //根据当天日期生成一个文件夹
    $upload = upload('uploadfile', '512000', $type, $mime, $save_path); //调用函数
    if ($upload['return']) {
        $html .= "<p class='notice'>文件上传成功</p><p class='notice'>文件保存的路径为：{$upload['save_path']}</p>";
    } else {
        $html .= "<p class=notice>{$upload['error']}</p>";

    }
}


?>
<div class="main-content">
    <div class="main-content-inner">

        <div class="page-content">
            <div id="usu_main">
                <p class="title">这里只能上传图片，别的文件不允许哦！，不信你可以试试😁。。。。。。</p>
                <form class="upload" method="post" enctype="multipart/form-data" action="">
                    <input class="uploadfile" type="file" name="uploadfile" /><br />
                    <input class="sub" type="submit" name="submit" value="开始上传" />
                </form>
                <?php
                echo $html; //输出路径
                ?>
            </div>


        </div>
    </div>
</div>

<?php
include_once $PIKA_ROOT_DIR . 'footer.php';

?>