<?php



//首页产品列表
function cms_prolist($top,$title){
  $sql="select * from pro order by id desc limit 0,$top";
  $result=mysql_query($sql);
  while($rs=mysql_fetch_array($result)){
    echo "<li><a href='showproducts.php?id=".$rs['id']."' target='_blank'><img src='".$rs['img']."' width='150' height='120' /></a><span><a href='showproducts.php?id=".$rs['id']."' target='_blank'>".cut_str($rs['title'],$title,0,'UTF-8')."</a></span></li>";
  }
}

function flag(){
  $flag='ctf{128530kkrlkd85094360}';
}
?>