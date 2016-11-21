<?
	require("config.php");
	if (!$page)
	{
		$page=1;
	}
	$sqldo="select count(*) as title from $mytable where sub_id<1";
	$result=mysql_query($sqldo);
	$message_count=mysql_result($result,0,"title");
	$page_count=ceil($message_count/$page_size);
	$offset=($page-1)*$page_size;
	$sqldo="select * from $mytable where sub_id<1 order by id desc limit $offset, $page_size";
	$result=mysql_query($sqldo);
?>
<table border="0" width="70%" cellspacing="0" cellpadding="0" align="center">
  <tr bgcolor="FFEAA2">
    <td width="100%" height="18" valign="bottom" align="right">留言总数：<font color=red><?echo $message_count?></font> | <a href="add.php">写留言</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<br>
<table border="0" width="70%" cellspacing="0" cellpadding="0" align="center">
<?
	if($result)
	{
		while($myrow=mysql_fetch_array($result))
		{
			listtopic($myrow,"70%",1);
			$sqldo2="select * from $mytable where sub_id=$myrow[id] order by add_time";
			$result2=mysql_query($sqldo2);
			if($result2)
			{
				$rows2=mysql_num_rows($result2);
				if($rows2)
				{
?>

  <tr>
    <td width="100%">
      <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
        <tr>
          <td width="5%" bgcolor="FFFECC" align="center">回<br>复</td>
          <td width="95%">
<?
					while($myrow2=mysql_fetch_array($result2))
					{
						listtopic($myrow2,"100%",0);
						echo "  </table>";
					}
?>
		  </td>
        </tr>
      </table>
    </td>
  </tr>
<?
				}
			}

			echo "  </table>
<br>
";
		}
		$prev_page=$page-1;
		$next_page=$page+1;
		echo "             <p align=\"center\">| ";
		if ($page<=1){
			echo "第一页 | ";
		}
		else{
			echo "<a href='$PATH_INFO?page=1'>第一页</a> | ";
		}
		if ($prev_page<1){
			echo "上一页 | ";
		}
		else{
			echo "<a href='$PATH_INFO?page=$prev_page'>上一页</a> | ";
		}
		if ($next_page>$page_count){
			echo "下一页 | ";
		}
		else{
			echo "<a href='$PATH_INFO?page=$next_page'>下一页</a> | ";
		}
		if ($page>=$page_count){
			echo "最后一页 |</p>\n";
		}
		else{
			echo "<a href='$PATH_INFO?page=$page_count'>最后一页</a> |</p>\n";
		}
	}

	function listtopic($myrow,$this_table_width,$is_reply)
	{
			global $imgdir;
			$comment=nl2br($myrow[comment]);
			if ($myrow[email]) {
				$line1_left="<img border=\"0\" src=\"$imgdir\\$myrow[image]\"> <a href=\"mailto:$myrow[email]\">$myrow[name]</a>";
			}
			else {
				$line1_left="<img border=\"0\" src=\"$imgdir\\$myrow[image]\"> $myrow[name]";
			}
			if ($myrow[comefrom]) {
				$line1_left .= "&nbsp;&nbsp;来自: $myrow[comefrom]";
			}
			else {
				$line1_right="";
			}
			if ($myrow[oicq]) {
				$line1_right .= " <img border=\"0\" src=\"$imgdir\\oicq.gif\" alt=\"OICQ:$myrow[oicq]\">";
			}
			if ($myrow[homepage]) {
				$line1_right .= " <a href=\"$myrow[homepage]\" target=\"_blank\"><img border=\"0\" src=\"$imgdir\\homepage.gif\" alt=\"主页:$myrow[homepage]\"></a>";
			}
			if ($is_reply) {
				$toolsbar="<a href=\"add.php?reply=1&recid=$myrow[id]\" $table_head_bodystyle>回复</a>&nbsp;";
			}
			$toolsbar .= "修改&nbsp;删除&nbsp;";
?>
  <table border="0" width="<?echo $this_table_width?>" align="center">
    <tr>
      <td width="100%" bgcolor="fff8d9">
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><?echo $line1_left?></td>
            <td width="50%" align="right"><?echo $line1_right?>&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="100%" bgcolor="FFFBEC"><?echo $comment?></td>
    </tr>
    <tr>
      <td width="100%" bgcolor="FFFBEC">
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%">留言时间：<?echo $myrow[add_time]?></td>
            <td width="50%" align="right"><?echo $toolsbar?></td>
          </tr>
        </table>
      </td>
    </tr>
<?
}
?>