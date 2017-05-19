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
<link type="text/css" rel="stylesheet" href="css/post.css">
</head>

<body background="images/post_bg.jpg">
<?php
		date_default_timezone_set('prc');
		if(isset($_POST["submit"])){
			require_once "./common/config.php";
			$num=$_SESSION["num"];
			$query="select * from users where num=\"$num\"";
			$result=mysql_query($query);
			$name=mysql_result($result,0,"name");
			$title=$_POST["title"];
			$content=$_POST["content"];
			$date=date("y-m-d");
			$time=date("H:i:s");
			if($title==""||$content==""){
				echo "<script language=\"javascript\" type=\"text/javascript\">";
				echo "alert(\"标题和内容不能为空！\");";
				echo "</script>";
			}
			else{
				for($i=0;$i<4;$i++){
					$tem="pic".$i;
					if($_FILES["uploadfile"]["tmp_name"][$i]=="") echo "";
					else if($_FILES["uploadfile"]["tmp_name"][$i]=="none") echo "<script>alert(\"图片",$_FILES["uploadfile"]["name"][$i],"太大！\");</script>";
					else{
						$uploadpath="./upload/";
						$filename=$uploadpath.$_FILES["uploadfile"]["name"][$i];
            			if(file_exists($filename)) echo "<script>alert(\"图片",$_FILES["uploadfile"]["name"][$i],"已存在！\");</script>";
						else{
							$path=pathinfo($filename);
							if(strcasecmp($path["extension"],"jpg")==0||strcasecmp($path["extension"],"gif")==0||strcasecmp($path["extension"],"png")==0){
								if(copy($_FILES["uploadfile"]["tmp_name"][$i],$filename)){
									$$tem=$_FILES["uploadfile"]["name"][$i];
								}
								else echo "<script>alert(\"图片",$_FILES["uploadfile"]["name"][$i],"上传失败！\");</script>";
							}
							else echo "<script>alert(\"只能上传图片文件！\");</script>";
						}
					}
				}
				$query = "insert into posts set title='$title',content='$content',user='$name',date='$date',time='$time',pic1='$pic0',pic2='$pic1',pic3='$pic2',pic4='$pic3'";
				$result=mysql_query($query,$hd);
				mysql_close($hd);
				echo "<meta http-equiv=\"refresh\" content=\"0; url=forum.php\" />";
			}
		}
	?>
<div class="header">
  <div class="header_wrapper">
    <div class="g_container">
      <ul class='nav'>
        <li><a href="index.php">首页</a></li>
        <li><a href="forum.php">论坛</a></li>
        <li><a id="active" href="post.php">发帖</a></li>
        <li><a href="privacy.php">个人</a></li>
      </ul>
      <div class="log_res">
      <?php
     	include("./common/users.php");
	 ?>
     </div>
    </div>
  </div>
</div>
<!-- 发帖 -->
<br class="clearfloat" />
  <div class="mainContent">
    <div class="content">     
      <FORM enctype="multipart/form-data" method="post" action="post.php">
        <div class="topic">
          <INPUT TYPE="text" NAME="title" value="" size=80 maxlength=32 placeholder="题目" >
        </div>
        <div class="instruct">
          <textarea NAME="content" ROWS="11" COLS="60" placeholder="说点什么吧……"></textarea>
        </div>
        <INPUT class="upload" TYPE="button" value="上传图片" >
        <ul class="picture">
          <li class='add_pic01'> <a href="">+</a>
            <input type='file' name='uploadfile[]' id='file1'/>
          </li>
          <li class='add_pic02'> <a href="">+</a>
            <input type='file' name='uploadfile[]' id='file2'/>
          </li>
          <li class='add_pic03'> <a href="">+</a>
            <input type='file' name='uploadfile[]' id='file3'/>
          </li>
          <li class='add_pic04'> <a href="">+</a>
            <input type='file' name='uploadfile[]' id='file4'/>
          </li>
        </ul>
        <p>
        <br>
          <INPUT class="send" TYPE="submit" name="submit" value="发布" >
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