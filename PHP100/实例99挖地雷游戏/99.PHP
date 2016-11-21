<? 
	// PHPMINE v1.0 
	//来源http://www.phpvault.com 
	//是根据microsoft的挖地雷游戏编写 
	print "<html>"; 
	print "<head>"; 
	print "<title>PHP挖地雷</title>"; 
	print "</head>"; 
	print "<body bgcolor=#FFFFCC><center>"; 
	print "<font size=3 face=Verdana><b>PHP挖地雷</b>"; 
	if ($submit=="")
	{
		$NumMine=4; 
		$RowSize=5; 
		$ColSize=5; 
		$generer=1; 
	}
	if($generer==1)
	{
		srand((double)microtime()*100000000); 
		$time_start=time(); 
		//判断输入的数值是否正确 
		if(($RowSize<=1) || ($ColSize<=1) || ($NumMine==0))
		{
			print "<p><br><font size=-1 color=red>行数，列数或地雷数输入错误!!</font>"; 
			exit;
		}
		if($NumMine > $RowSize*$ColSize)
		{
			print "<p><br><font size=-1 color=red>地雷数太多!</font>"; 
			exit;
		}
		//初始化 
		for($Row=1;$Row<=$RowSize;$Row++)
		{
			for($Col=1;$Col<=$ColSize;$Col++)
			{
				$Mine[$Row][$Col]="0"; 
				$Decouv[$Row][$Col]="0"; 
			}
		}
		$index=0; 
		while($index<$NumMine)
		{
			$Row=rand(1,$RowSize); 
			$Col=rand(1,$ColSize); 
			if($Mine[$Row][$Col]=="0")
			{
				$Mine[$Row][$Col]="1"; 
				$index++; 
			}
		}
	}
	else
	{
		$perdu=0; 
		$reste=$RowSize*$ColSize; 
		for($Row=1;$Row<=$RowSize;$Row++)
		{
			for($Col=1;$Col<=$ColSize;$Col++)
			{
				$temp="Mine".($Row*($ColSize+1)+$Col); 
				$Mine[$Row][$Col]=$$temp; 
				$temp="Decouv".($Row*($ColSize+1)+$Col); 
				$Decouv[$Row][$Col]=$$temp; 
				if($Decouv[$Row][$Col]=="1") {$reste=$reste-1;} 
				$temp="submit".($Row*($ColSize+1)+$Col); 
				if($$temp=="ok")
				{
					$reste=$reste-1; 
					if($Mine[$Row][$Col]=="0")
					{
						$Decouv[$Row][$Col]="1"; 
					}
					else
					{
						$perdu=1; 
					}
				}
			}
		}
		if($perdu==1)
		{
			print "<h2><font color=red>您输啦!</font></h2>"; 
			for($i=1;$i<=$RowSize;$i++)
			{
				for($j=1;$j<=$ColSize;$j++)
				{
					$Decouv[$i][$j]="1"; 
				}
			} 
		} 
		if(($reste==$NumMine)&&($perdu!=1))
		{ 
			print "<h2>你赢啦!</h2>"; 
			$time_stop=time(); 
			$time=$time_stop-$time_start; 
			print "<p><font size=-1><i>您的分数: $time</i></font>"; 
			for ($i=1;$i<=$RowSize;$i++)
			{
				for($j=1;$j<=$ColSize;$j++)
				{
					$Decouv[$i][$j]="1"; 
				}
			}
		}
	}
	print "<form method=get action='$PHP_SELF'>"; 
	print "<input type=hidden name=time_start value=$time_start>"; 
	print "<input type=hidden name=NumMine value=$NumMine>"; 
	print "<input type=hidden name=RowSize value=$RowSize>"; 
	print "<input type=hidden name=ColSize value=$ColSize>"; 
	print "<input type=hidden name=generer value=0>"; 
	print "<p><table border=1 cellpadding=8>"; 
	for($Row=1; $Row<=$RowSize; $Row++)
	{
		print "<tr>"; 
		for($Col=1; $Col<=$ColSize; $Col++)
		{
			$nb=0;
			for($i=-1; $i<=1; $i++)
			{
				for($j=-1; $j<=1; $j++)
				{
					if($Mine[$Row+$i][$Col+$j] == "1")
					{
						$nb++;
					}
				}
			}
			print "<td width=15 height=15 align=center valign=middle>"; 
			if($Decouv[$Row][$Col]=="1")
			{
				if($nb==0)
				{
					print "&nbsp;";
				}
				else
				{
					if($Mine[$Row][$Col]=="1")
					{
						print "<font color=red>*</font>"; 
					}
					else
					{
						print "$nb";
					}
				}
			}
			else
			{
				print "<input type=hidden name=submit value=ok>"; 
				print "<input type=submit name=submit".($Row*($ColSize+1)+$Col)." value=ok>"; 
			}
			print "<input type=hidden name=Mine".($Row*($ColSize+1)+$Col)." value=".$Mine[$Row][$Col].">"; 
			print "<input type=hidden name=Decouv".($Row*($ColSize+1)+$Col)." value=".$Decouv[$Row][$Col].">"; 
			print "</td>"; 
		} 
		print "</tr>"; 
	}
	print "</table>"; 
	print "</form>"; 
?>
<hr> 
<form method=post> 
行数 : &nbsp; 
<input type=text name=RowSize value=5 size=2> 
<br> 
列数 : &nbsp; 
<input type=text name=ColSize value=5 size=2> 
<br> 
地雷数 : &nbsp; 
<input type=text name=NumMine value=4 size=2> 
<p> 
<input type=submit name=submit value=开始> 
<input type=hidden name=generer value=1> 
</form>
</body> 
</html>