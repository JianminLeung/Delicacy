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
<link type="text/css" rel="stylesheet" href="css/privacy.css">
</head>

<body background="images/privacy_bg.jpg">
<?php
    	require_once "./common/config.php";
		$num=$_SESSION["num"];
		$query="select * from users where num=\"$num\"";
		$result=mysql_query($query);
		$name=mysql_result($result,0,"name");
		$gender=mysql_result($result,0,"gender");
		$birthday=mysql_result($result,0,"birthday");
		$introduction=mysql_result($result,0,"introduction");
		mysql_close($hd);
	?>
<div class="header">
  <div class="header_wrapper">
    <div class="g_container">
      <ul class='nav'>
        <li><a href="index.php">首页</a></li>
        <li><a href="forum.php">论坛</a></li>
        <li><a href="post.php">发帖</a></li>
        <li><a id="active" href="privacy.php">个人</a></li>
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
          <td class="td1">昵称:</td>
          <td><?php echo $name; ?></td>
        </tr>
        <BR>
        <p>
        <tr>
          <td class="td1">性别:</td>
          <td><?php echo $gender; ?></td>
        </tr>
        <p>
        <tr>
          <td class="td1">生日:</td>
          <td><?php echo $birthday; ?></td>
        </tr>
        <p>
        <tr>
          <td class="td1">个人简介:</td>
          <td><?php echo $introduction; ?></td>
        </tr>
      </table>
      <BR>
      <div class="gallery">
      <p> 我的相册：
      <div class="banner">
        <ul class="line-1">
          <li class="pic_1"><img src="images/6.jpg" alt="" /></li>
          <li class="pic_2"><img src="images/7.jpg" alt="" /></li>
          <li class="pic_3"><img src="images/8.jpg" alt="" /></li>
        </ul>
        <ul class="line-2">
          <li class="pic-4"><img src="images/9.jpg" alt="" /></li>
          <li class="pic-5"><img src="images/11.jpg" alt="" /></li>
          <li class="pic-6"><img src="images/12.jpg" alt="" /></li>
        </ul>
      </div>
      </div>
      <br>
      <br>
      <br>
      <INPUT class="change" TYPE="button" onclick="location.href='revision.php'"   value="修改个人资料" >
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