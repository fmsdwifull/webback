<?
	if($type=="add")
	{
		$file=file("record.txt");
		$intt=sizeof($file);
		$tx=$file[0]+1;

		$f = fopen("record.txt","r+");
		$msg = fread($f,filesize("record.txt")) ;
		fclose($f);

		$f = fopen("record.txt","r+");
		$text=$txt;
		$text=htmlspecialchars($text);
		$text=ereg_replace("\r\n","<br>",$text);
		$text=ereg_replace("\r","<br>",$text);
		$text=$text."\n";
		$t = date(Y年m月d日H时i分);
		$line1=$name."||".$email."||".$url."||".$sex."||".$mind."||".$title."||".$t."\n";
		if(str_replace("\n","",$file[2])!=trim($text))
		{
			fputs($f,$tx."\n");
			fputs($f,$line1);
			fputs($f,$text);
			fputs($f,$msg);
			fclose($f);}
		}
?>

<?
	$filename="record.txt";
	$file=file($filename);
	$intt=sizeof($file);
	$pagesize=3;
	$pagecount=round(($intt/3)/$pagesize) ;

	if($pagesize*$pagecount<$intt/3)
	{
		$pagecount++;
	}

	if($pagepage2)
	{
		$page=$pagepage2-1;
		if($pagepage2>$pagecount)
		{
			$page=$pagecount-1;}
			if($pagepage2<1)
			{
				$page=0;}
			}

			$pagecount2=$pagecount-1;
			$page2=$page+1;
			$pp=$page*$pagesize*3;
			$pp2=$pp+$pagesize*3;
			$nextpage=$page+1;
			$prevpage=$page-1;
?>
<HTML>
<HEAD>
<meta http-equiv="cache-control" content="private"></meta>
<meta http-equiv="Pragma" content="no-cache"></meta>
<link rel="stylesheet" href="css.css">
</HEAD>
<BODY aLink=#000000 bgColor=#f5f5f5 link=#000000 text=#000000 vLink=#999999>
<FORM action=listnew.php method=post name=form1>
  <table border=0 cellpadding=0 cellspacing=0 width=380 align="center">
    <tbody> 
    <tr> 
      <td><img height=12 src="images/newtop.gif" width=380></td>
    </tr>
    <tr bgcolor=#ffffff> 
      <td background=images/newbg.gif> 
        <table align=center border=0 cellpadding=0 cellspacing=0 width=363>
          <tbody> 
          <tr> 
            <td style="FONT-SIZE: 9pt" width="257"> 
              <div align=center>目前共有<font face=Tahoma><?echo $intt/3;?></font>条留言 
                <?if ($page != 0){ ?> <a href=listnew.php?page=<?echo $prevpage?>><img alt=后页 border=0 src="images/menu_left_a.gif"></a> 
                <?}?> <?      if ($page != $pagecount2) {?> <a href=listnew.php?page=<?echo $nextpage?>><img alt=后页 border=0 src="images/menu_right_a.gif"></a> 
                <?} ?> 　第<b><font
            face=Tahoma><?echo $page2."/".$pagecount; ?></font></b> </div>
            </td>
            <td style="FONT-SIZE: 9pt" width="106"> 第 
              <input class=stbtm name=pagepage2 size=2>
              页 
              <input alt=跳转 border=0 
            name=Submit2 src="images/go2.gif" type=image value=跳转>
            </td>
          </tr>
          </tbody> 
        </table>
      </td>
    </tr>
    <tr> 
      <td><img height=8 src="images/newdo.gif" width=380></td>
    </tr>
    </tbody>
  </table>
  </FORM>
<?

	for($i=$pp;$i<$pp2;$i=$i+3)
	{
		if($i<$intt)
		{
			$tp=explode("||",$file[$i+1]);
?>
<br>
<table width="50" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr background="images/newbg.gif" valign="top"> 
    <td height="101" background="images/newbg.gif"><img src="images/newtop.gif" width="380" height="12"><br>
      <table cellspacing=1 cellpadding=3 width="95%" border=0 align="center">
        <tr> 
          <td bgcolor="#FFFFFF" width="40" align="center"><a href="mailto:<?echo $tp[1];?>"><img alt=给我来信! border=0 src="images/<?echo $tp[3].$tp[4]?>.gif" ></a></td>
          <td bgcolor="#FFFFFF" width="320"><a href="mailto:<?echo $tp[1];?>"><font
            size=2><b><?echo $tp[0];?></b></font></a>　<a href="<?echo $tp[2];?>"
            target=_blank><font face="Verdana, Arial, Helvetica, sans-serif"
            size=1><?echo $tp[2];?></font></a><br>
            <a href="<?echo $tp[2];?>"
            target=_blank></a><font face=Tahoma><br>
            <?echo $tp[6];?></font></td>
        </tr>
        <tbody> 
        <tr bgcolor="#ffffff"> 
          <td colspan="2" style="font-size: 12px" background="images/dotbg.gif"> 
            <div align="center"> <b>留言主题：<?echo $tp[5];?></b></div>
          </td>
        </tr>
        <tr> 
          <td bgcolor=#f5f5f5 colspan="2"> 
            <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr> 
                <td style="font-size: 9pt"><?echo $file[$i+2];?></td>
              </tr>
            </table>
      </table>
    </td>
  </tr>
</table>
<div align="center"><img src="images/newdo.gif" width="380" height="8" align="top"> 
</div>
<p>
<?
		}
	}
?>
<FORM action=listnew.php method=post name=form1>
  <table border=0 cellpadding=0 cellspacing=0 width=380 align="center">
    <tbody> 
    <tr> 
      <td><img height=12 src="images/newtop.gif" width=380></td>
    </tr>
    <tr bgcolor=#ffffff> 
      <td background=images/newbg.gif> 
        <table align=center border=0 cellpadding=0 cellspacing=0 width=363>
          <tbody> 
          <tr> 
            <td style="FONT-SIZE: 9pt" width="257"> 
              <div align=center>目前共有<font face=Tahoma><?echo $intt/3;?></font>条留言 
                <?if ($page != 0){ ?> <a href=listnew.php?page=<?echo $prevpage?>><img alt=后页 border=0 src="images/menu_left_a.gif"></a> 
                <?}?> <?      if ($page != $pagecount2) {?> <a href=listnew.php?page=<?echo $nextpage?>><img alt=后页 border=0 src="images/menu_right_a.gif"></a> 
                <?} ?> 　第<b><font
            face=Tahoma><?echo $page2."/".$pagecount; ?></font></b> </div>
            </td>
            <td style="FONT-SIZE: 9pt" width="106"> 第 
              <input class=stbtm name=pagepage2 size=2>
              页 
              <input alt=跳转 border=0 
            name=Submit22 src="images/go2.gif" type=image value=跳转>
            </td>
          </tr>
          </tbody> 
        </table>
      </td>
    </tr>
    <tr> 
      <td><img height=8 src="images/newdo.gif" width=380></td>
    </tr>
    </tbody> 
  </table>
</FORM>
</BODY>
</HTML>