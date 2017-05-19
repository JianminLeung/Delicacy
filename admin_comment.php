<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delicacy</title>
<link type="text/css" rel="stylesheet" href="css/admin_index.css">
</head>

<body background="images/admin_bg.jpg">
<div class="header">
  <div class="header_wrapper">
    <div class="g_container">
      <ul class='nav'>
        <li><a id="active" href="admin_index.php">首页</a></li>
        <li><a href="admin_user.php">管理用户</a></li>
        <li><a href="admin_post.php">管理帖子</a></li>
        <li><a href="admin_comment.php">管理评论</a></li>
        <li><a href="admin_personal.php">个人信息</a></li>
      </ul>
      <div class="log_res">
      <?php
	  include("./common/users.php");
	 ?>
     </div>
    </div>
  </div>
</div>
<br class="clearfloat" />
<div id="mainContent">
  <div id="content">
  <table border="1px">
  		<tr>
    		<td>ID</td>
            <td>内容</td>
    		<td>发布者</td>
    		<td>日期</td>
            <td>时间</td>
    		<td></td>
  		</tr>
        <?php
        	require "./common/config.php";
			$query="select * from comments";
			$result=mysql_query($query);
			while($r_array=mysql_fetch_array($result)){
				echo "<tr>";
    			echo "<td>",$r_array["com_id"],"</td>";
				echo "<td>",$r_array["content"],"</td>";
    			echo "<td>",$r_array["user"],"</td>";
    			echo "<td>",$r_array["date"],"</td>";
    			echo "<td>",$r_array["time"],"</td>";
    			echo "<td><a href=\"./common/delete.php?com_id=",$r_array["com_id"],"\">删除</a></td>";
  				echo "</tr>";
			}
			mysql_close($hd);
		?>
	</table>

    <br />
    </div>
  </div>
</div>
<br class="clearfloat" />
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