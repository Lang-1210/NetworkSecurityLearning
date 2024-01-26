<!DOCTYPE html>
<html>
<head>
<title>login</title>
<!-- Metatags  -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!--//font-awesome-css-->
<!-- style_sheet -->
<link href="./css/element.css" rel="stylesheet" type="text/css">
<link href="./html/css/style.css" rel="stylesheet" type="text/css" media="all" /><!--style_sheet-->
<link href="./html/css/font-awesome.css" rel="stylesheet"><!--font-awesome-css-->	

<!-- //style-Css -->
</head>

<body>
<!-- main -->
<div class="main" id="app">
	<!-- <h1>Flat Multi Form Widget</h1> -->
	<div class="content">
		<div class="main-grids">
			<div class="signin-left-grid">
				<h4>sign up </h4>
				<div class="left-form">
					<form v-on:submit.prevent method="post" id="form">
						<input suffix-icon="el-icon-date" type="text" placeholder="username" v-model="name"/>
						<input type="password" placeholder="password" v-model="password"/>
						<input type="text" placeholder="verify code" v-model="verifyCode"/>
						<span v-text="getVerifyCode" id="verify" @click="generatePassword"></span>
						<input type="submit" value="Sign Up Now" @click="toSubmit"/>
						<span style="display: none;" ref="pass">509e0895bd82e3315e79018a6ce02181</span>
						<!-- <el-button plain @click="toSubmit">朴素按钮</el-button> -->
					</form>
				</div>
			</div>		
			<div class="clear"></div>
		</div>
	</div>
	<!--copy-right-->
	<div class="copyright">
		<p>&copy; 2023 Power By Aurora. All Rights Reserved | Design by  <a href="https://pic.imgdb.cn/item/6165a9472ab3f51d91728dfd.jpg"><ins>Aurora</ins></a></p>
	</div>
	<!--//copy-right-->
</div>
<!--// main -->
<script src="./js/vue2.js"></script>
<script src="./js/element.js"></script>
<script src="./js/crypto-js.min.js"></script>

<script>
	var app = new Vue({
    el: '#app',
    data: {
        name: '',
        password: '',
        verifyCode:'',
        getVerifyCode: '',
    },
    methods: {
        generatePassword() {
            var length = 6;
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            var password = "";

            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }
            this.getVerifyCode = password;
            return this.getVerifyCode;
        },
		// encryptMessage() {
		// 	let encryptedMessage=''
		// 	if()
		// 	console.log(this.encryptedMessage);
		// },
        toSubmit(){
            if(this.name == '' || this.password == '' || this.verifyCode == ''){
                this.$message.error('请完整输入');
                return
            }else{
                if(this.verifyCode!=this.getVerifyCode){
                    console.log(this.verifyCode,this.getVerifyCode);
                    this.$message.error('验证码输入错误');
                    return
                }else{
                    let passu=this.$refs.pass.innerText
                    let cryptoname=CryptoJS.MD5(this.name).toString()
                    if(this.password!= this.verifyCode || cryptoname!=passu){
                        this.$message.error('用户名密或码错误');
                        return
                    }
                    else if(cryptoname==passu && this.password==this.verifyCode){
                        const loading = this.$loading({
                        lock: true,
                        text: '登录成功，请稍后',
                        spinner: 'el-icon-loading',
                        });
                        setTimeout(() => {
                            loading.close();
                            window.location.href='53.php'
                        }, 3000);
                    }
                }
            }
        },
		open3() {
			this.$notify.info({
			title: 'TIPS',
			message: 'Sometimes blasting and dictionaries may not be a good way, you need to use another way of thinking, to observe, to think'
			});
		},
    },
    mounted() {
        this.getVerifyCode = this.generatePassword();
		this.open3()

    },
})
</script>
<script src="./html/fonts/d6711866f6f24e2f14bf1dc590ea206ea.js"></script>
<script src="./js/19.js"></script>

</body>
</html>