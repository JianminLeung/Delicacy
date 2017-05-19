<?php
	session_start();
	if(!isset($_SESSION["num"])) echo "<script>alert(\"Please login!\");location.href=\"../login.php\";</script>";
	else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
	<?php
		if(isset($_GET["num"])){
			if(isset($_POST["delete"])){
				if($_POST["delete"]=="删除"){
					require_once "config.php";
					$query="delete from users where num='".$_GET["num"]."'";
					$result=mysql_query($query);
					mysql_close($hd);
					echo "<meta http-equiv=\"refresh\" content=\"0; url=../admin_user.php\" />";
				}
				else echo "<meta http-equiv=\"refresh\" content=\"0; url=../admin_user.php\" />";
			}
		}
		else if(isset($_GET["post_id"])){
			if(isset($_POST["delete"])){
				if($_POST["delete"]=="删除"){
					require_once "config.php";
					$query="delete from comments where post_id='".$_GET["post_id"]."'";
					$result=mysql_query($query);
					$query="delete from posts where post_id='".$_GET["post_id"]."'";
					$result=mysql_query($query);
					mysql_close($hd);
					echo "<meta http-equiv=\"refresh\" content=\"0; url=../admin_post.php\" />";
				}
				else echo "<meta http-equiv=\"refresh\" content=\"0; url=../admin_post.php\" />";
			}
		}
		else if(isset($_GET["com_id"])){
			if(isset($_POST["delete"])){
				if($_POST["delete"]=="删除"){
					require_once "config.php";
					$query="select * from comments where com_id='".$_GET["com_id"]."'";
					$result=mysql_query($query);
					$post_id=mysql_result($result,0,"post_id");
					$query="delete from comments where com_id='".$_GET["com_id"]."'";
					$result=mysql_query($query);
					$query="update posts set num_com=num_com-1 where post_id=\"".$post_id."\"";
					$result=mysql_query($query);
					mysql_close($hd);
					echo "<meta http-equiv=\"refresh\" content=\"0; url=../admin_comment.php\" />";
				}
				else echo "<meta http-equiv=\"refresh\" content=\"0; url=../admin_comment.php\" />";
			}
		}
	?>
    <form method="post">
    	<p>确定要删除<?php
			if(isset($_GET["num"])) echo "账号为".$_GET["num"]."的用户";
			else if(isset($_GET["post_id"])) echo "ID号为".$_GET["post_id"]."的帖子";
			else if(isset($_GET["com_id"])) echo "ID号为".$_GET["com_id"]."的评论";
		?>吗？</p>
        <input type="submit" value="删除" name="delete" />
        <input type="submit" value="取消" name="delete" />
    </form>
</body>
</html>
<?php
	}
?>