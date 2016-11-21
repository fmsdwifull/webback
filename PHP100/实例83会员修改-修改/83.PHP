<?
	//本例是用PHP4实现修改一个mysql数据表，
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
<title>会员注册 - 修改记录测试</title>
</HEAD>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<br><br><center><font color=green size=3><b>注 册 会 员 信 息 编 辑 表 单</b></font></center>
<br>
<?
	//连接到本地mysql数据库
	$myconn=mysql_connect("localhost","root","");
	//选择test为操作库
	mysql_select_db("test",$myconn);
	if(strlen($id)<1)
	{
?>

<table cellspacing=0 bordercolordark=#FFFFFF width="95%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
  <tr bgcolor="#6b8ba8" style="color:FFFFFF">
    <td width="5%" align="center" valign="bottom" height="19">ＩＤ</td>
    <td width="10%" align="center" valign="bottom">姓名</td>
    <td width="5%" align="center" valign="bottom">性别</td>
    <td width="5%" align="center" valign="bottom">年龄</td>
    <td width="20%" align="center" valign="bottom">联系电话</td>
    <td width="20%" align="center" valign="bottom">电子邮件</td>
    <td width="20%" align="center" valign="bottom">家庭住址</td>
  </tr>
<?
	$strSql="select * from reguser";
	//用mysql_query函数从reguser表里读取数据
	$result=mysql_query($strSql,$myconn);
	while($row=mysql_fetch_array($result))//通过循环读取数据内容
	{
?>
  <tr>
    <td align="center" height="19"><?echo $row["id"]?></td>
    <td align="center"><a href="83.php?id=<?echo $row["id"]?>"><?echo $row["userid"]?></a></td>
    <td align="center"><?echo $row["sex"]?></td>
    <td align="center"><?echo $row["age"]?></td>
    <td align="center"><?echo $row["tel"]?></td>
    <td align="center"><?echo $row["email"]?></td>
    <td align="center"><?echo $row["address"]?></td>
  </tr>
<?
	}
?>
</table>
<?
	}
	else if(strlen($userid)<1)
	{
		//将用户的信息填写到输入框
		$strSql="select * from reguser where id=$id";
		$result=mysql_query($strSql,$myconn) or die(mysql_error());
		$row=mysql_fetch_array($result);
?>
<form action="<? echo $PHP_SELF; ?>" method="get" name="frmAdduser">
<table cellspacing=0 bordercolordark=#FFFFFF width="60%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
  <tr bgcolor="#6b8ba8" style="color:FFFFFF">
    <td width="100%" align="center" valign="bottom" height="19" colspan="2">用户信息修改</td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">姓名：</td>
    <td width="70%"><input type="text" name="userid" size="10" maxlength="18" value="<?echo $row["userid"]?>"></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">性别：</td>
    <td width="70%">
<?//隐藏用户ID?>
<input type="hidden" name="id" value="<?echo $row["id"]?>">
<input type="radio" name="sex" value="男"<?if($row["sex"]=="男") print(" checked");?>>男
<input type="radio" name="sex" value="女"<?if($row["sex"]=="女") print(" checked");?>>女</td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">年龄：</td>
    <td width="70%"><input type="text" name="age" size="5" maxlength="2" value="<?echo $row["age"]?>"></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">联系电话：</td>
    <td width="70%"><input type="text" name="tel" size="20" value="<?echo $row["tel"]?>"></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">电子邮件：</td>
    <td width="70%"><input type="text" name="email" size="20" value="<?echo $row["email"]?>"></td>
  </tr>
  <tr>
    <td width="30%" align="right" height="19">家庭住址：</td>
    <td width="70%"><input type="text" name="address" size="30" value="<?echo $row["address"]?>"></td>
  </tr>
  <tr>
    <td width="100%" align="center" colspan="2"><input type="submit" value="修 改"> <input type="reset" value="取 消"></td>
  </tr>
</table>
</form>
<?
	}
	//如果用户填写了资料则对数据进行更新
	if(strlen($userid)>1)
	{
		$strSql="update reguser set userid='$userid',sex='$sex',age=$age,tel='$tel',email='$email',address='$address' where id=$id";
		//更新该ID所对应的资料
		$result=mysql_query($strSql,$myconn) or die(mysql_error());
		echo "<br><br><br><center>您已经成功修改了用户信息！<br><br><br><br><a href=\"82.php\">查看会员资料</a></center>";
	}
	//关闭对数据库的连接
	mysql_close($myconn);
?>
</BODY>
</HTML>