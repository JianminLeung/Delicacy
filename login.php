<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	@session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link type="text/css" rel="stylesheet" href="css/login.css">
</head>

<body background="images/login_bg.jpg">
<?php
		if(isset($_POST["login"])){
			require_once "./common/config.php";
			$num=$_POST["num"];
			$password=$_POST["password"];
			$type=$_POST["type"];
			if($num!=""&&$password!=""&&$type!=""){
				if($type=="user"){
					$query="select * from users where num=\"$num\" and password=\"$password\"";
					$result=mysql_query($query);
					$count=mysql_num_rows($result);
					if($count==0){
						echo "<script language=\"javascript\" type=\"text/javascript\">";
						echo "alert(\"账号或密码错误！\");";
						echo "</script>";
					}
					else{
						$_SESSION["num"]=$num;
						$_SESSION["type"]=$type;
						echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\" />";
					}
				}
				else{
					$query="select * from administrators where num=\"$num\" and password=\"$password\"";
					$result=mysql_query($query);
					$count=mysql_num_rows($result);
					if($count==0){
						echo "<script language=\"javascript\" type=\"text/javascript\">";
						echo "alert(\"账号或密码错误！\");";
						echo "</script>";
					}
					else{
						$_SESSION["num"]=$num;
						$_SESSION["type"]=$type;
						echo "<meta http-equiv=\"refresh\" content=\"0; url=admin_index.php\" />";
					}
				}
				mysql_close($hd);
			}
			else{
				echo "<script language=\"javascript\" type=\"text/javascript\">";
				echo "alert(\"信息不能为空！\");";
				echo "</script>";
			}
		}
	?>
<div id="container">
  <div id="mainContent">
    <div id="content">
    <div id="sidebar"> <br />LOGIN<br />
    <br />
      <form method="post" action="login.php">
        <input class="text" type="text" name="num" value="" size=20 maxlength=13 placeholder="请输入账号" style="width:230px; height:30px; align-content:center">
        <br />
        <br />        
        <input class="text" type="password" name="password" value="" size=20 maxlength=16 placeholder="请输入密码" style="width:230px; height:30px; align-content:center">
        <br />
        <input type="radio" name="type" value="user" />
        <font color="#919289" size="-1">用户</font>
        <input type="radio" name="type" value="admin" />
        <font color="#919289" size="-1">管理员</font>
        <br />
        <input class="login" type="submit" name="login" value="登录">
        <br />
        <input class="register" type="button" onClick="window.open('register.php')" value="注册">
      </form>
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
</div>
</div>
</body>
</html>
