<?php
header("Content-type: text/html; charset=utf-8"); // 设置页面的字符编码为 UTF-8
// 检查是否从第一个页面跳转而来
$referer = $_SERVER['HTTP_REFERER'];
if (strpos($referer, '/') === false) {
    echo 'Access denied!';
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/element.css">
</head>
<body oncontextmenu=self.event.returnValue=false>
    <div id="app1">
        <span class='f'>F
            <i class="i">flag{ue8934jdjkf0}</i>
        </span>
        <em class='f'>L</em>
        <span class='f'>A</span>
        <el-tooltip content="F" placement="bottom" effect="light">
            <span class='f'>G</span>
        </el-tooltip>
    </div>
    

    <script src="./js/vue2.js"></script>
    <script src="./js/element.js"></script>
    <script src="./js/19.js"></script>
    <script>
        var app = new Vue({
            el: '#app1',
            data: {
                msg: 'Hello Vue!',
                visible:false
            },
            methods: {
                open() {
                        this.$message({
                        message: 'Congratulate，flag就在这儿',
                        type: 'warning'
                    });
                },
                open2() {
                    this.$notify({
                    title: 'Warning',
                    message: '仔细看看，有什么不同🧐',
                    type: 'warning'
                    });
                },
            },
            mounted() {
               this.open()
               this.open2()
            }
        })
    </script>
</body>
</html>