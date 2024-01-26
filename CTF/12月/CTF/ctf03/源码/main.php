<?php include_once 'conn.php';?>
<?php include_once 'inc/function.php';?>
<?php include_once 'inc/cms.php';?>
<?php
header("Content-Type:text/html;charset=utf-8");
if(!file_exists("install/install.lock"))
{
Header("Location:install/install.php");
}

// 判断是否来自本机127.0.0.1，如果不是则禁止访问该页面
// X-Forwarded-For:IP伪造
if ($_SERVER['HTTP_X_FORWARDED_FOR'] !== '127.0.0.1') {//HTTP_X_FORWARDED_FOR
     echo '<script>alert("你的IP地址不正确哦！！！"); window.location.href = "index.php";</script>';
    exit;
}

// 继续加载下一个页面的逻辑代码

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link href="style/index.css" type="text/css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.css">  -->
<link rel="stylesheet" href="./style/swiper-bundle.css">
<style type="text/css">
  *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  body{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .swiper {
    width: 100%;
    height: 400px;
  }  
  .swiper .swiper-wrapper{
    width: 100%;
  }
  .swiper-slide {
    text-align: center;
  }
  .swiper-slide img{
    width: 100%;
    height: 100%;
  }
</style>

</head>
<body>
<div id="contain">
  <div id="head">
    <?php include_once 'header.php';?>
  </div>
  <div id="focus">
    <!-- <img src="adv/focus.jpg" alt="焦点图" /> -->
  </div>
  <div id="cont">
    <div class="c_r">
    
      <div class="c_r_c" style="margin-left: -120px;margin-top: -10px">
        <div class="c_r_c_c">
          <div class="c_r_c_cp">
            <ul>
              <?php echo cms_prolist(8,18);?>
            </ul>
            <div class="clear"></div>
          </div>   
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  
  <div id="foot" style="margin-top: 50px">
    <?php include_once 'footer.php'; ?>
  </div>
</div>
<!-- <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"> </script>  -->
<script src="./js/swiper-bundle.js"></script>

<script> 
 var mySwiper = new Swiper ('.swiper', {
    //direction: 'vertical', // 垂直切换选项
    loop: true, // 循环模式选项
    autoplay:true,//等同于以下设置
    /*autoplay: {
      delay: 3000,
      stopOnLastSlide: false,
      disableOnInteraction: true,
      },*/
    
    // 如果需要分页器
    pagination: {
      el: '.swiper-pagination',
    },
    
    // 如果需要前进后退按钮
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    
    // 如果需要滚动条
    // scrollbar: {
    //   el: '.swiper-scrollbar',
    // },
  })        
</script>

</body>
</html>
