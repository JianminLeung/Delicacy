<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
	<?php
    	$server="localhost";
		$username="root";
		$psw="";
		$db_name="delicacy";
		$hd=mysql_connect($server,$username,$psw) or die("Connectted unsuccessfully!");
		$db=mysql_select_db($db_name,$hd);
		mysql_query('set names utf8');
	?>
</body>
</html>