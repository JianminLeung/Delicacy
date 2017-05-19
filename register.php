<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link type="text/css" rel="stylesheet" href="css/register.css">
</head>

<body background="images/login_bg.jpg">
<?php
		if(isset($_POST["submit"])){
			$num=$_POST["num"];
			$name=$_POST["name"];
			$password=$_POST["password"];
			$gender=$_POST["sex"];
			if($num==""||$password==""){
				echo "<script language=\"javascript\" type=\"text/javascript\">";
				echo "alert(\"账号和密码不能为空！\");";
				echo "</script>";
			}
			else{
				require_once "./common/config.php";
				$query="select * from users where num=\"$num\"";
				$result=mysql_query($query);
				$count=mysql_num_rows($result);
				if($count!=0){
					echo "<script language=\"javascript\" type=\"text/javascript\">";
					echo "alert(\"账号已存在！\");";
					echo "</script>";
				}
				else{
					if($gender=="male") $gender="male";
					else if($gender=="female") $gender="female";
					if($name=="") $name="user";
					$query = "insert into users set num='$num',name='$name',password='$password',gender='$gender'";
					$result=mysql_query($query,$hd);
					mysql_close($hd);
					if($result){
						$_SESSION["num"]=$num;
						echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\" />";
					}
					else{
						echo "<script language=\"javascript\" type=\"text/javascript\">";
						echo "alert(\"注册失败！\");";
						echo "</script>";
					}
				}
			}
		}
	?>
<div id="container">
  <div id="mainContent">
    <div id="content">
    <div id="sidebar"> <br />REGISTER<br />
    <br />
      <form method="post" action="">
        <input class="text" type="text" name="num" value="" size=20 maxlength=13 placeholder="请输入账号" style="width:230px; height:30px; align-content:center">
        <br />
        <br />        
        <input class="text" type="text" name="name" value="" size=20 maxlength=16 placeholder="请输入昵称" style="width:230px; height:30px; align-content:center">
        <br />
        <br />        
        <input class="text" type="password" name="password" value="" size=20 maxlength=16 placeholder="请输入密码" style="width:230px; height:30px; align-content:center"><br />
        <input type="radio" name="sex" value="male" checked="checked" />
        <font color="#919289" size="-1">男</font>
        <input type="radio" name="sex" value="female" />
        <font color="#919289" size="-1">女</font>
        <br />
        <input class="register" type="submit" name="submit" value="注册">
        <br />
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
