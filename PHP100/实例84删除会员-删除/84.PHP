<?
	//本例是用PHP4实现删除一个mysql数据记录，
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
<title>会员注册 - 删除记录演示</title>
</HEAD>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<br><br><center><font color=green size=3><b>注 册 会 员 信 息 删 除 表 单</b></font></center>
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
    <td align="center"><a href="<?echo $PHP_SELF?>?id=<?echo $row["id"]?>"><?echo $row["userid"]?></a></td>
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
	else
	{
		//进行删除操作$id为删除的记录号
		$strSql="delete from reguser where id=$id";
		$result=mysql_query($strSql,$myconn) or die(mysql_error());
		echo "<br><br><br><center>您已经成功删除了该ID的信息！<br><br><br><br><a href=\"$PHP_SELF\">查看会员资料</a></center>";
	}
	//关闭对数据库的连接
	mysql_close($myconn);
?>
</BODY>
</HTML>