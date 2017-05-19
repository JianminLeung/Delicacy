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
</head>

<body>
	<?php
    	date_default_timezone_set('prc');
		$post_id=$_GET["post_id"];
		$content=$_POST["comment"];
		$date=date("y-m-d");
		$time=date("H:i:s");
		if($content!=""){
			require "./common/config.php";
			$num=$_SESSION["num"];
			$query="select * from users where num=\"$num\"";
			$result=mysql_query($query);
			$name=mysql_result($result,0,"name");
			$query="insert into comments set post_id=\"".$post_id."\", content=\"".$content."\", user=\"".$name."\", date=\"".$date."\", time=\"".$time."\"";
			$result=mysql_query($query);
			$query="update posts set num_com=num_com+1 where post_id=\"".$post_id."\"";
			$result=mysql_query($query);
			mysql_close($hd);
		}
		echo "<meta http-equiv=\"refresh\" content=\"0; url=forum.php\" />";
	?>
</body>
</html>
<?php
	}
?>