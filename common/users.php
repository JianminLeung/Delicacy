
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
		<?php
			if(isset($_SESSION["num"])){
				require "./common/config.php";
				$num=$_SESSION["num"];
				if(@$_SESSION["type"]=="admin") $query="select * from administrators where num=\"$num\"";
				else $query="select * from users where num=\"$num\"";
				$result=mysql_query($query);
				$name=mysql_result($result,0,"name");
				mysql_close($hd);
				echo "<a href=\"./common/logout.php\">退出登录</a>";
				if(@$_SESSION["type"]=="admin") echo "<a href=\"admin_personal.php\">".$name."</a>";
				else echo "<a href=\"privacy.php\">".$name."</a>";
			}
			else{
				echo "<a href=\"register.php\">注册</a>";
				echo "<a href=\"login.php\">登录</a>";
			}
		?>
</body>
</html>