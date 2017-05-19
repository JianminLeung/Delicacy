<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delicacy</title>
<link type="text/css" rel="stylesheet" href="css/home.css">
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="js/lubotu.js"></script>
</head>

<body background="images/home_bg.jpg">
<div class="header">
  <div class="header_wrapper">
    <div class="g_container">
      <ul class='nav'>
        <li><a id="active" href="index.php">首页</a></li>
        <li><a href="forum.php">论坛</a></li>
        <li><a href="post.php">发帖</a></li>
        <li><a href="privacy.php">个人</a></li>
      </ul>
      <div class="log_res">
      <?php
     	include("./common/users.php");
	 ?>
     </div>
    </div>
  </div>
</div>
<!-- banner部分 -->
<div class="lubo">
  <ul class="lubo_box">
    <li style=" opacity: 1;filter:alpha(opacity=100);"><a href="" style="background:url(images/1.jpg) center top no-repeat"></a></li>
    <li><a href="" style="background:url(images/2.jpg) center top no-repeat"></a></li>
    <li><a href="" style="background:url(images/3.jpg) center top no-repeat"></a></li>
    <li><a href="" style="background:url(images/4.jpg) center top no-repeat"></a></li>
    <li><a href="" style="background:url(images/5.jpg) center top no-repeat"></a></li>
  </ul>
</div>
<script type="text/javascript">

$(function(){

    $(".lubo").lubo({

    });

})

</script>

 <br />
  <br />
  <div class="content">
    <div class="sidebar1">
    	<table>
  			<tr class="title">
    			<td>最新动态</td>
  			</tr>
        	<?php
				require "./common/config.php";
				$query="select * from posts order by date desc,time desc";
				$result=mysql_query($query);
				$i=0;
				while($r_array=mysql_fetch_array($result)){
					if($i<10){
						echo "<tr class='details'>";
    					echo "<td>",$r_array["title"],"</td>";
  						echo "</tr>";
						$i++;
					}
				}
				mysql_close($hd);
			?>
            <tr class="more">
    			<td><a href="forum.php" class="lookmore">查看更多</a></td>
  			</tr>
		</table>
    </font><br />
    </div>
    <div class="sidebar2">
    	<table>
  			<tr class="title">
    			<td>热门内容</td>
  			</tr>
        	<?php
				require "./common/config.php";
				$query="select * from posts order by num_com desc";
				$result=mysql_query($query);
				$i=0;
				while($r_array=mysql_fetch_array($result)){
					if($i<10){
						echo "<tr class='details'>";
    					echo "<td>",$r_array["title"],"</td>";
  						echo "</tr>";
						$i++;
					}
				}
				mysql_close($hd);
			?>
            <tr class="more">
    			<td><a href="forum.php" class="lookmore">查看更多</a></td>
  			</tr>
		</table>
    </font><br />
    </div>
  </div>
<!-- 底部版权部分 -->
<div class="footer">
  <div class="g_container">
    <div class="f_line"> </div>
    <ul>
      <li><a href="#">网站简介</a></li>
      <li><a href="#">联系我们</a></li>
      <li><a href="#">意见反馈</a></li>
      <li><a href="#">版权声明</a></li>
      <li><a href="#">隐私保护</a></li>
    </ul>
  </div>
</div>
</body>
</html>
