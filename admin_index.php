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

<body background="images/home_bg.jpg">
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