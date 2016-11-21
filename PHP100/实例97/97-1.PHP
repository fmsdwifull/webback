<?
//-----------------------------------------------------------------
// 安装说明：
// 1，把97-1.php（就是本文件）加到一个PHP页中。
// 2，设置好选票数据文件和选票IP记录文件的路径及文件名，并设置属性为666（保证可读写）。
// 安装完成了（太简单拉^_^）
//-----------------------------------------------------------------
// 选票数据文件的格式说明：
// 该文件只有1行，共分成11段，每段都用“|”分隔，内容如下（“[]”内为说明如该段不需要有内容，则需将其空出来。）
// [选票标题]|[选择A]|[选择A的得票数]|[选择B]|[选择B的得票数]|[选择C]|[选择C的得票数]|[选择D]|[选择D的得票数]|[选择E]|[选择E的得票数]
//-----------------------------------------------------------------
// 选票IP记录文件的格式说明：
// 这个文件不需要编辑，只是为了防止某些人重复投票而做的IP判断过滤。
// 文件的格式就是每个IP值占一行，有多少人投票就有多少行。
// 该文件的初始状态就是为空（0字节）。
//-----------------------------------------------------------------
  $file="97_data.txt"; /*选票数据文件*/
  $fd=fopen("$file","r");
  $fd_data=fread($fd,filesize($file));
  fclose($fd);
  list($votez_name,$vote1_name,$vote1_counter,$vote2_name,$vote2_counter,$vote3_name,$vote3_counter,$vote4_name,$vote4_counter,$vote5_name,$vote5_counter)=split("\|",$fd_data);
  $votez_counter=$vote1_counter+$vote2_counter+$vote3_counter+$vote4_counter+$vote5_counter;
  if($vote1_counter>0){$vote1_countera=substr($vote1_counter/$votez_counter*100,0,4)."%";}else{$vote1_countera="0.00%";}
  if($vote2_counter>0){$vote2_countera=substr($vote2_counter/$votez_counter*100,0,4)."%";}else{$vote2_countera="0.00%";}
  if($vote3_counter>0){$vote3_countera=substr($vote3_counter/$votez_counter*100,0,4)."%";}else{$vote3_countera="0.00%";}
  if($vote4_counter>0){$vote4_countera=substr($vote4_counter/$votez_counter*100,0,4)."%";}else{$vote4_countera="0.00%";}
  if($vote5_counter>0){$vote5_countera=substr($vote5_counter/$votez_counter*100,0,4)."%";}else{$vote5_countera="0.00%";}
  echo "<hr size=0 color=#FFC864><img src=97_img.php?vote1=$vote1_counter&vote2=$vote2_counter&vote3=$vote3_counter&vote4=$vote4_counter&vote5=$vote5_counter><br>
        $votez_name<br>
        总票数：<font color=#FF0000><b>$votez_counter</b></font>票<br>
        <a href=97-2.php?vote=1><font color=#FF0000>选择Ａ：</font><b>$vote1_name</b></a><br>（<font color=#FF0000><b>$vote1_counter</b></font>票|<font color=#0F0F0F>$vote1_countera</font>）<br>
        <a href=97-2.php?vote=2><font color=#FF8040>选择Ｂ：</font><b>$vote2_name</b></a><br>（<font color=#FF0000><b>$vote2_counter</b></font>票|<font color=#0F0F0F>$vote2_countera</font>）<br>
        <a href=97-2.php?vote=3><font color=#DFDF00>选择Ｃ：</font><b>$vote3_name</b></a><br>（<font color=#FF0000><b>$vote3_counter</b></font>票|<font color=#0F0F0F>$vote3_countera</font>）<br>
        <a href=97-2.php?vote=4><font color=#00C800>选择Ｄ：</font><b>$vote4_name</b></a><br>（<font color=#FF0000><b>$vote4_counter</b></font>票|<font color=#0F0F0F>$vote4_countera</font>）<br>
        <a href=97-2.php?vote=5><font color=#0000FF>选择Ｅ：</font><b>$vote5_name</b></a><br>（<font color=#FF0000><b>$vote5_counter</b></font>票|<font color=#0F0F0F>$vote5_countera</font>）<br>
       <hr size=0 color=#FFC864>";
//-----------------------------------------------------------------
?>