<?php
    header("Content-type: text/html; charset=utf-8"); // 设置页面的字符编码为 UTF-8
    // 检查是否从第一个页面跳转而来
    $referer = $_SERVER['HTTP_REFERER'];
    if (strpos($referer,'index.php') === false) {
        echo 'Access denied!';
        exit;
    }
    ?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

    <title>HELLO ADMIN</title>
    <link rel="stylesheet" href="./css/53.css">
    <link rel="stylesheet" href="./css/element.css">
</head>

<body>
    <div class="container" id="app">
        <el-tooltip class="item" effect="dark" content="Click Me" placement="top">
            <h2 @click="dialogFormVisible = true">
                <span>h</span>
                <span>e</span>
                <span>l</span>
                <span>l</span>
                <span>o</span>&nbsp;
                <span>a</span>
                <span>d</span>
                <span>m</span>
                <span>i</span>
                <span>n</span>
            </h2>
        </el-tooltip>
        <el-dialog title="GUESS" :visible.sync="dialogFormVisible">
            <el-form :model="form">
              <el-form-item label="什么东西在网络上永远存在，却无法被搜索引擎找到？">
                <el-input v-model.trim="form.name" autocomplete="off" maxlength="2" show-word-limit clearable autofocus></el-input>
              </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
              <el-button @click="dialogFormVisible = false">取 消</el-button>
              <el-button type="primary" @click="toSubmit">确 定</el-button>
            </div>
          </el-dialog>
    </div>
    <script src="./js/vue2.js"></script>
    <script src="./js/element.js"></script>
    <script src="./js/19.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                dialogFormVisible: false,
                form: {
                    name: '',
                    region: '',
                    date1: '',
                    date2: '',
                    delivery: false,
                    type: [],
                    resource: '',
                    desc: ''
                },
                formLabelWidth: '120px'
            },
            methods: {
                toSubmit(){
                    if(this.form.name==""){
                        this.$message.error("为什么不输，答案不可能为空哦！！！");
                        return
                    }else if(this.form.name!="密码"){
                        this.$message.error("不正确哦，在想想...");
                    }else{
                        const loading = this.$loading({
                        lock: true,
                        text: '答对了,恭喜🎉',
                        spinner: 'el-icon-loading',
                        });
                        setTimeout(() => {
                            loading.close();
                            window.location.href='97.php'
                        }, 3000);
                        this.dialogFormVisible=false
                    }
                    
                }

            },
            mounted() {

            },
        })
    </script>
</body>

</html>