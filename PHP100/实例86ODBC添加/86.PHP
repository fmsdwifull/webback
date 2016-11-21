<?
	//本例是用PHP4实现向一个ODBC数据表添加记录，
?>
<HTML>
<HEAD>
<META NAME="GENERATOR" Content="Microsoft Visual Studio 6.0">
<style type="text/css">
<!--
input { font-size:9pt;}
A:link {text-decoration: underline; font-size:9pt;color:000059}
A:visited {text-decoration: underline; font-size:9pt;color:000059}
A:active {text-decoration: none; font-size:9pt}
A:hover {text-decoration:underline;color:red}
body,table {font-size: 9pt}
tr,td{font-size:9pt}
-->
</style>
<title>会员注册 - 添加记录演示</title>
</HEAD>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<?
	if(strlen($userid)<1)
	{
?>
<br><br><center><font color=green size=3><b>注 册 会 员 表 单</b></font></center>
<br>
<form action="<? echo $PHP_SELF; ?>" method="get" name="frmAdduser">
<table cellspacing=0 bordercolordark=#FFFFFF width="60%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
  <tr bgcolor="#6b8ba8" style="color:FFFFFF">
    <td width="100%" align="center" valign="bottom" height="19" colspan="2">请仔细填写以下内容</td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">姓名：</td>
    <td width="70%"><input type="text" name="userid" size="10" maxlength="18"></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">性别：</td>
    <td width="70%"><input type="radio" name="sex" value="男" checked>男
<input type="radio" name="sex" value="女">女</td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">年龄：</td>
    <td width="70%"><input type="text" name="age" size="5" maxlength="2"></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">联系电话：</td>
    <td width="70%"><input type="text" name="tel" size="20"></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">电子邮件：</td>
    <td width="70%"><input type="text" name="email" size="20"></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">家庭住址：</td>
    <td width="70%"><input type="text" name="address" size="30"></td>
  </tr>
  <tr>
    <td width="100%" align="center" colspan="2"><input type="submit" value="马上注册"> <input type="reset" value="全部重写"></td>
  </tr>
</table>
</form>
<?
	}
	else
	{
		//连接到ODBC数据库
		$myconn=odbc_connect("fengfeng","sa","123");
		//将用户填写信息添加到数据库
		$strSql="insert into reguser(userid,sex,age,tel,email,address)
		 values('$userid','$sex',$age,'$tel','$email','$address')";
		$result=odbc_do($myconn,$strSql);
		//关闭对数据库的连接
		odbc_close("$myconn");
		echo "<br><br><br><center>您已经成功注册成我们的会员！<br><br><br><br><a href=\"7-5.php\">查看会员资料</a></center>";
	}	
?>
</BODY>
</HTML>