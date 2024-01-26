<?php
header("Content-type: text/html; charset=utf-8"); // 设置页面的字符编码为 UTF-8
// 检查是否通过域名访问
$host = $_SERVER['HTTP_HOST'];
if ($host !== 'world') {
    header("Refresh: 5; url=./error/error.html"); // 5 秒后跳转到指定页面
    echo "正在跳转，请稍候...";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/element.css">
    
</head>
<body oncontextmenu=self.event.returnValue=false>
   <div id="app">
        <el-result icon="info" title="Informational Tips" subTitle="请根据提示进行操作">
            <template slot="extra">              
                <p><a href="main.php"><el-button @click="open1">点我</el-button></a></p>
                <el-button @click="visible = true" type="primary">点我</el-button>
            </template>
        </el-result>
        <el-dialog :visible.sync="visible" title="NO FLAG" class="dialog">
                <p>你被骗啦🤪，在仔细找找看！！！！</p>
        </el-dialog>
   </div>

    <script src="./js/vue2.js"></script>
    <script src="./js/element.js"></script>
    <script src="./js/19.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                msg: 'Hello Vue!',
                visible:false
            },
            methods: {
                open1() {
                    const h = this.$createElement;
                    this.$notify({
                    title: 'HELLO',
                    message: h('i', { style: 'color: teal'}, 'Stranger')
                    });
                },
            },
            mounted() {
               this.open1()
            }
        })
    </script>
</body>
</html>


