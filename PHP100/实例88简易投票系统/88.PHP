<?
	//用COOKIE保存投票人的投票记录
	if($vote && !$already_voted) SetCookie("already_voted","1");
?>
<html>
<head>
<title>简易投票系统</title>
</head>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<br><center><font color=green>简易投票系统-学习PHP 4.0容易吗？</font></center><br>
<table cellspacing=0 bordercolordark=#FFFFFF width="60%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
  <tr>
    <td align="center">
<form action="<?echo $PHP_SELF?>" method="post" name="frmVote">
<br>添加一个投票类别: <input type="text" name="newvoteitem" size="20" maxlength="30"><input type=submit value="添 加"><br><br>
<?
	//连接数据库
	mysql_connect("localhost","root","");
	$mysqldb="test";
	if($newvoteitem)
	{
		//添加新的投票项
		if(!mysql_db_query($mysqldb,"insert into vote values ('$newvoteitem',0)"))
		{
			echo "添加出错！<br>";
		}
	}
	//用COOKIE保存投票人的投票记录
	if($vote && $already_voted) {
         echo "<font color=red>请您不要重复投票，谢谢！</font><br><br>\n";
     }
     else if($vote)
     {
         if(!mysql_db_query($mysqldb,"update vote set votes=votes+1 where name='$vote'"))
         {
             echo "投票出错！<br>";
         }
     }
     //计算总投票数
     $result=mysql_db_query($mysqldb,"select sum(votes) as sum from vote");
     if($result)
     {
         $sum=(int) mysql_result($result,0,"sum");
         mysql_free_result($result);
     }
     //读出投票项数据
     $result=mysql_db_query($mysqldb,"select * from vote order by votes DESC");
?>
<table cellspacing=0 bordercolordark=#FFFFFF width="90%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
  <tr>
    <td align="center" width="15%">投票</td>
    <td align="center" width="60%">选项</td>
    <td align="center" width="25%">票数/比例</td>
  </tr>
<?
	//循环读出投票项
	while($row=mysql_fetch_row($result))
	{
		//计算百分比
		$per=(int)(100*$row[1]/$sum);
?>
  <tr>
    <td align="center"><input type=radio name=vote value="<?echo $row[0]?>"></td>
    <td><?echo $row[0]?></td>
    <td align="right"><?echo $row[1]?><img src="blue.gif" height=10 width="<?echo $per?>"><?echo $per?></td>
  </tr>
<?
	}
	//释放结果集
     mysql_free_result($result);
 ?>
</table>
<br><input type=submit value="投 票">
</form>
    </td>
  </tr>
</table>
</BODY>
</HTML>