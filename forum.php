<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delicacy</title>
<link type="text/css" rel="stylesheet" href="css/forum.css">
<script type='text/javascript' src='js/show_hide.js'></script>
</head>

<body background="images/forum_bg.jpg">
<div class="header">
<div class="header_wrapper">
<div class="g_container">
<ul class='nav'>
  <li><a href="index.php">首页</a></li>
  <li><a id="active" href="forum.php">论坛</a></li>
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
<!-- 论坛 -->
<br class="clearfloat" />
<div class="mainContent">
  <div class="content">
  <?php
		require "./common/config.php";
		$query="select * from posts order by date desc,time desc";
		$result=mysql_query($query);
		while($r_array=mysql_fetch_array($result)){
			$post_id=$r_array["post_id"];	
			$innerquery="select * from comments where post_id='$post_id'";
			$innerresult=mysql_query($innerquery);
			//$content=$_POST["comment"];
			//$date=date("y-m-d");
			//$time=date("H:i:s");
			echo "<hr>";
			echo "<FORM method=\"post\" action=\"comment.php?post_id=",$post_id,"\">";
			echo "<div class=\"topic\">";
			echo $r_array["title"];
			echo "</div>";
			echo "<div class=\"instruct\">";
			echo $r_array["content"];
			echo "</div>";
			echo "<p>";
			echo "<ul class=\"picture\">";
			if($r_array["pic1"]!=""){
				echo "<li class='pic01'> <a href=\"#\"> <img src=\"upload/",$r_array["pic1"],"\" width=\"120px\" height=\"120px\"></a></li>";
			}
			if($r_array["pic2"]!=""){
				echo "<li class='pic02'> <a href=\"#\"> <img src=\"upload/",$r_array["pic2"],"\" width=\"120px\" height=\"120px\"></a></li>";
			}
			if($r_array["pic3"]!=""){
				echo "<li class='pic03'> <a href=\"#\"> <img src=\"upload/",$r_array["pic3"],"\" width=\"120px\" height=\"120px\"></a></li>";
			}
			if($r_array["pic4"]!=""){
				echo "<li class='pic04'> <a href=\"#\"> <img src=\"upload/",$r_array["pic4"],"\" width=\"120px\" height=\"120px\"></a></li>";
			}
			echo "</ul>";
			echo "<p>";
			echo "<div class=\"comment\">";
        	echo "<div class=\"click\">";
        	echo "<img src=\"images/comment.png\">";
        	echo "<INPUT TYPE=\"button\" value=\"评论\">";
        	echo "</div>";
        	echo "<div class=\"show-text\" style=\"display:none\">";
        	echo "<textarea NAME=\"comment\" ROWS=\"11\" COLS=\"120\" placeholder=\"说点什么吧……\"></textarea>";  
			echo "<input type=\"submit\" name=\"send\" value=\"发送\">";
        	echo "<br>";
        	while($inner_array=mysql_fetch_array($innerresult)){
				echo "<div class=\"head\">";
        		echo "<img src=\"images/friend1.jpg\">";
        		echo $inner_array["user"];
        		echo "</div>";
        		echo "<div class=\"repeat\">",$inner_array["content"],"</div>";
				echo "<hr>";
			}
			echo "</div>"; 
        	echo "</div>"; 
      		echo "</FORM>";
		}
		mysql_close($hd);
	?>
    
  </div>
</div>
<br class="clearfloat" />
<!-- 底部版权部分 -->
<div class="footer">
  <div class="g_container">
    <div class="f_line"></div>
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
