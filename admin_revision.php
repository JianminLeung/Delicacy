<?php
	session_start();
	if(!isset($_SESSION["num"])) echo "<script>alert(\"Please login!\");location.href=\"login.php\";</script>";
	else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link type="text/css" rel="stylesheet" href="css/admin_revision.css">
</head>

<body background="images/privacy_bg.jpg">
	<?php
    	require_once "./common/config.php";
		$num=$_SESSION["num"];
		$query="select * from administrators where num=\"$num\"";
		$result=mysql_query($query);
		$name=mysql_result($result,0,"name");
		$password=mysql_result($result,0,"password");
		$gender=mysql_result($result,0,"gender");
		$birthday=mysql_result($result,0,"birthday");
		if(isset($_POST["update"])){
			if($_POST["update"]=="修改"){
				$query="update administrators set name=\"".$_REQUEST["name"]."\", password=\"".$_REQUEST["password"]."\", gender=\"".$_REQUEST["gender"]."\", birthday=\"".$_REQUEST["birthday"]."\" where num=\"".$_REQUEST["num"]."\"";
				$result=mysql_query($query);
				mysql_close($hd);
				echo "<meta http-equiv=\"refresh\" content=\"0; url=admin_personal.php\" />";
			}
			else echo "<meta http-equiv=\"refresh\" content=\"0; url=admin_personal.php\" />";
		}
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
  账号:
  <INPUT class="no-input" TYPE="text" NAME="num" value="<?php echo $num; ?>" size=20 maxlength=13 readonly="readonly">
  <BR>
  <p>
  昵称:
  <INPUT class="input" TYPE="text" NAME="name" value="<?php echo $name; ?>" size=20 maxlength=13  >
  <BR>
  <p>
  密码:
  <INPUT class="input" TYPE="text" NAME="password" value="<?php echo $password; ?>" size=20 maxlength=16  >
  <BR>
  <p>
  生日:
  <INPUT class="input" type="date" NAME="birthday" value="<?php echo $birthday; ?>" size=20 maxlength=10  >
  <BR>
  <p>
  性别:
  <?php
	if($gender=="female"){
		echo "<INPUT TYPE=\"radio\" NAME=\"gender\" value=\"male\">男";
		echo "<INPUT TYPE=\"radio\" NAME=\"gender\" value=\"female\" checked>女";
	}
	else{
		echo "<INPUT TYPE=\"radio\" NAME=\"gender\" value=\"male\" checked>男";
		echo "<INPUT TYPE=\"radio\" NAME=\"gender\" value=\"female\">女";
	}
  ?>
  <br />
    <INPUT class="change" TYPE="submit" name="update"  value="修改" >
    <INPUT class="change" TYPE="submit" name="update"  value="取消" >
</FORM>
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