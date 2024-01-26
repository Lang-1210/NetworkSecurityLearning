<?php include_once 'conn.php';?>
<?php include_once 'inc/function1.php';?>
<?php include_once 'inc/cms.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/index.css" type="text/css" rel="stylesheet" />
<title>None</title></head>
<body>
<div id="contain">
  <div id="head">
  
  </div>
  <div id="focus">
 
  </div>
  <div id="dc">
    <div class="dc_l" style="margin-left: 100px">
      <div class="dc_l_c" style="margin-left: 20px;margin-top: 100px">
        <div class="dc_l_c_s">
          <?php
		    $id=verify_null(verify_id($_GET['id']),"参数");
  			$ssql="select * from pro where id=$id";
  			$sresult=mysql_query($ssql);
			  if(!$num=mysql_num_rows($sresult)){
			  // echo "没有这条记录";
			  // echo "<br/>";
			  // echo "<a href='javascript:history.go(-1)'>返回上一页！</a>";
			  }else{
			  $rs=mysql_fetch_array($sresult);
			  ?>
         <!--  <div class="dc_l_c_s_t">
            <?php echo $rs['title'];?>
          </div> -->
          <div id="contain" style="margin-left: 100px">
            <img src="./uploadfile/image/20231219/l1.jpg">
          </div>

          <div class="dc_l_c_s_l">
            信息来源：<?php echo $rs['info_from'];?> 作者：Aurora 更新时间 : 2023/12/08
          </div>
          <div class="dc_l_c_s_c">
            <?php echo $rs['content'];?>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  
    <div class="clear"></div>
  </div>
  <div id="foot">
    <!-- <?php include_once 'footer.php'; ?> -->
  </div>
</div>
</body>
</html>
