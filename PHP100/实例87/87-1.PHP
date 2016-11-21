<html>
<head>
<title>用户登录</title>
</head>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<br>
<?
	if($userid!="")
	{
		mysql_connect("localhost", "root", "");
		mysql_select_db("test") or die ("不能连接到数据库！");
		//判断用户名和密码是否在正确
		$strSql="select * from users where userid='$userid' and password='$password'";
		$result=mysql_query($strSql);// or die("读取数据库出现错误！");
		$num=mysql_numrows($result);
		mysql_close($myconn);
		if($num>0)
		{
			echo "<center>登录成功！</center><br>";
		}
		else echo "<center><font color=red>登录失败！请检查用户名和密码！</font></center><br>";
	}
	else
	{
		echo "<center>请输入用户名和密码登录！</center>"
?>
<form action="<?echo $PHP_SELF?>" method="post">
<table cellspacing=0 bordercolordark=#FFFFFF width="60%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
  <tr bgcolor="#6b8ba8" style="color:FFFFFF">
    <td width="100%" align="center" valign="bottom" height="19" colspan="3">用户登录</td>
  </tr>
  <tr>
    <td width="30%" align="center">用户名：</td>
    <td width="70%" align="center"><input type="text" name="userid" size="20" maxsize="20"></td>
  </tr>
  <tr>
    <td width="30%" align="center">密  码：</td>
    <td width="70%" align="center"><input type="password" name="password" size="20" maxsize="20"></td>
  </tr>
  <tr>
    <td width="100%" align="center" colspan="2"><input type="submit" value="登录"></td>
  </tr>
</table>
</form>
<?
	}
?>
</body>
</html>