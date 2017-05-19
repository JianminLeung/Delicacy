<?php
	session_start();
	if(!isset($_SESSION["num"])) echo "<script>alert(\"Please login!\");location.href=\"login.php\";</script>";
	else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delicacy</title>
<link type="text/css" rel="stylesheet" href="css/admin_personal.css">
</head>

<body background="images/privacy_bg.jpg">
	<?php
    	require_once "./common/config.php";
		$num=$_SESSION["num"];
		$query="select * from administrators where num=\"$num\"";
		$result=mysql_query($query);
		$name=mysql_result($result,0,"name");
		$gender=mysql_result($result,0,"gender");
		$birthday=mysql_result($result,0,"birthday");
		mysql_close($hd);
	?>
<div class="header">
  <div class="header_wrapper">
    <div class="g_container">
      <ul class='nav'>
        <li><a href="admin_index.php">首页</a></li>
        <li><a href="admin_user.php">管理用户</a></li>
        <li><a href="admin_post.php">管理帖子</a></li>
        <li><a href="admin_comment.php">管理评论</a></li>
        <li><a id="active" href="admin_personal.php">个人信息</a></li>
      </ul>
      <div class="log_res">
      <?php
	  include("./common/users.php");
	 ?>
     </div>
    </div>
  </div>
</div>
  <!-- 个人信息 --> 
<br class="clearfloat" />
<div class="mainContent">
  <div class="content">
    <FORM METHOD=POST ACTION="">
      <table>
        <tr>
          <td>账号:</td>
          <td><?php echo $num; ?></td>
        </tr>
        <BR>
        <p>
        <tr>
          <td>昵称:</td>
          <td><?php echo $name; ?></td>
        </tr>
        <BR>
        <p>
        <tr>
          <td>性别:</td>
          <td><?php echo $gender; ?></td>
        </tr>
        <p>
        <tr>
          <td>生日:</td>
          <td><?php echo $birthday; ?></td>
        </tr>
      </table>
      <INPUT class="change" TYPE="button" onclick="location.href='admin_revision.php'" value="修改个人资料" >
    </FORM>
    <br>
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
<?php
	}
?>