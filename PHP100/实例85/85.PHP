<?
	/*本例是用PHP4通过ODBC访问数据库操作的演示*/
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
<title>注册会员列表 - 通过ODBC访问数据库演示</title>
</HEAD>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<br><br><center><font color=green size=3><b>注 册 会 员 列 表</b></font></center>
<br>
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
	//连接到ODBC数据库
	$myconn=odbc_connect("fengfeng","sa","123");
	$strSql="select * from reguser";
	/*执行查询*/
	$result=odbc_do($myconn,$strSql);
	//Boolean odbc_fetch_row(integer result,integer row)
	while(odbc_fetch_row($result))//通过循环读取数据内容
	{
?>
  <tr>
    <td align="center" height="19"><?echo odbc_result($result,1)?></td>
    <td align="center"><?echo odbc_result($result,2)?></td>
    <td align="center"><?echo odbc_result($result,3)?></td>
    <td align="center"><?echo odbc_result($result,4)?></td>
    <td align="center"><?echo odbc_result($result,5)?></td>
    <td align="center"><?echo odbc_result($result,6)?></td>
    <td align="center"><?echo odbc_result($result,7)?></td>
  </tr>
<?
	}
	//关闭对数据库的连接
	odbc_close("$myconn");
?>
</table>
</BODY>
</HTML>