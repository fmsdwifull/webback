<html>
<head>
<title>注册新用户</title>
</head>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<br>
<?
	if($userid!="")
	{
		$ID = uniqid("userID");
		$db = mysql_connect("localhost","root","");
		mysql_select_db ("test");
		$result = mysql_query ("insert into users (id, username, userid, password, email)
        	VALUES ('$ID', '$username', '$userid', '$password','$email')");
		if(!$result)
		{
			echo "<center>出现错误：</center>", mysql_error();
			exit;
		}
		if($result)
		{
			mysql_close($db);
			echo "<center>用户 <b>$username</b> 注册成功！</center>";
		}
	}
	else
	{
	echo "<center>资料填写不完整，请仔细填写！</center>";
?>
<form method="post" action="<?echo $PHP_SELF?>">
<table cellspacing=0 bordercolordark=#FFFFFF width="60%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
  <tr bgcolor="#6b8ba8" style="color:FFFFFF">
    <td width="100%" align="center" valign="bottom" height="19">注册新用户</td>
  </tr>
  <tr>
    <td width="100%" align="center">
姓名：<INPUT TYPE=text MAXLENGTH=20 NAME="username" SIZE=20><Br>
呢称：<INPUT TYPE=text MAXLENGTH=20 NAME="userid" SIZE=20><Br>
密码：<Input Type=text Maxlength=20 Name="password" Size=20><Br>
邮件：<Input Type=text Maxlength=50 Name="email" Size=20><Br>
<INPUT TYPE=submit VALUE="注 册">
<INPUT type=reset VALUE="重 填">
    </td>
  </tr>
</table>
</form>
<?
	}
?>
</body>
</html>