<?
//世纪万年历
#这是唯一的设置-请输入php文件的位置
$file="http://192.168.1.168/php/rl/s2m.php";
//#农历每月的天数
$everymonth=array(
0=>array(8,0,0,0,0,0,0,0,0,0,0,0,29,30,7,1),
1=>array(0,29,30,29,29,30,29,30,29,30,30,30,29,0,8,2),
2=>array(0,30,29,30,29,29,30,29,30,29,30,30,30,0,9,3),
3=>array(5,29,30,29,30,29,29,30,29,29,30,30,29,30,10,4),
4=>array(0,30,30,29,30,29,29,30,29,29,30,30,29,0,1,5),
5=>array(0,30,30,29,30,30,29,29,30,29,30,29,30,0,2,6),
6=>array(4,29,30,30,29,30,29,30,29,30,29,30,29,30,3,7),
7=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,4,8),
8=>array(0,30,29,29,30,30,29,30,29,30,30,29,30,0,5,9),
9=>array(2,29,30,29,29,30,29,30,29,30,30,30,29,30,6,10),
10=>array(0,29,30,29,29,30,29,30,29,30,30,30,29,0,7,11),
11=>array(6,30,29,30,29,29,30,29,29,30,30,29,30,30,8,12),
12=>array(0,30,29,30,29,29,30,29,29,30,30,29,30,0,9,1),
13=>array(0,30,30,29,30,29,29,30,29,29,30,29,30,0,10,2),
14=>array(5,30,30,29,30,29,30,29,30,29,30,29,29,30,1,3),
15=>array(0,30,29,30,30,29,30,29,30,29,30,29,30,0,2,4),
16=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,3,5),
17=>array(2,30,29,29,30,29,30,30,29,30,30,29,30,29,4,6),
18=>array(0,30,29,29,30,29,30,29,30,30,29,30,30,0,5,7),
19=>array(7,29,30,29,29,30,29,29,30,30,29,30,30,30,6,8),
20=>array(0,29,30,29,29,30,29,29,30,30,29,30,30,0,7,9),
21=>array(0,30,29,30,29,29,30,29,29,30,29,30,30,0,8,10),
22=>array(5,30,29,30,30,29,29,30,29,29,30,29,30,30,9,11),
23=>array(0,29,30,30,29,30,29,30,29,29,30,29,30,0,10,12),
24=>array(0,29,30,30,29,30,30,29,30,29,30,29,29,0,1,1),
25=>array(4,30,29,30,29,30,30,29,30,30,29,30,29,30,2,2),
26=>array(0,29,29,30,29,30,29,30,30,29,30,30,29,0,3,3),
27=>array(0,30,29,29,30,29,30,29,30,29,30,30,30,0,4,4),
28=>array(2,29,30,29,29,30,29,29,30,29,30,30,30,30,5,5),
29=>array(0,29,30,29,29,30,29,29,30,29,30,30,30,0,6,6),
30=>array(6,29,30,30,29,29,30,29,29,30,29,30,30,29,7,7),
31=>array(0,30,30,29,30,29,30,29,29,30,29,30,29,0,8,8),
32=>array(0,30,30,30,29,30,29,30,29,29,30,29,30,0,9,9),
33=>array(5,29,30,30,29,30,30,29,30,29,30,29,29,30,10,10),
34=>array(0,29,30,29,30,30,29,30,29,30,30,29,30,0,1,11),
35=>array(0,29,29,30,29,30,29,30,30,29,30,30,29,0,2,12),
36=>array(3,30,29,29,30,29,29,30,30,29,30,30,30,29,3,1),
37=>array(0,30,29,29,30,29,29,30,29,30,30,30,29,0,4,2),
38=>array(7,30,30,29,29,30,29,29,30,29,30,30,29,30,5,3),
39=>array(0,30,30,29,29,30,29,29,30,29,30,29,30,0,6,4),
40=>array(0,30,30,29,30,29,30,29,29,30,29,30,29,0,7,5),
41=>array(6,30,30,29,30,30,29,30,29,29,30,29,30,29,8,6),
42=>array(0,30,29,30,30,29,30,29,30,29,30,29,30,0,9,7),
43=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,10,8),
44=>array(4,30,29,30,29,30,29,30,29,30,30,29,30,30,1,9),
45=>array(0,29,29,30,29,29,30,29,30,30,30,29,30,0,2,10),
46=>array(0,30,29,29,30,29,29,30,29,30,30,29,30,0,3,11),
47=>array(2,30,30,29,29,30,29,29,30,29,30,29,30,30,4,12),
48=>array(0,30,29,30,29,30,29,29,30,29,30,29,30,0,5,1),
49=>array(7,30,29,30,30,29,30,29,29,30,29,30,29,30,6,2),
50=>array(0,29,30,30,29,30,30,29,29,30,29,30,29,0,7,3),
51=>array(0,30,29,30,30,29,30,29,30,29,30,29,30,0,8,4),
52=>array(5,29,30,29,30,29,30,29,30,30,29,30,29,30,9,5),
53=>array(0,29,30,29,29,30,30,29,30,30,29,30,29,0,10,6),
54=>array(0,30,29,30,29,29,30,29,30,30,29,30,30,0,1,7),
55=>array(3,29,30,29,30,29,29,30,29,30,29,30,30,30,2,8),
56=>array(0,29,30,29,30,29,29,30,29,30,29,30,30,0,3,9),
57=>array(8,30,29,30,29,30,29,29,30,29,30,29,30,29,4,10),
58=>array(0,30,30,30,29,30,29,29,30,29,30,29,30,0,5,11),
59=>array(0,29,30,30,29,30,29,30,29,30,29,30,29,0,6,12),
60=>array(6,30,29,30,29,30,30,29,30,29,30,29,30,29,7,1),
61=>array(0,30,29,30,29,30,29,30,30,29,30,29,30,0,8,2),
62=>array(0,29,30,29,29,30,29,30,30,29,30,30,29,0,9,3),
63=>array(4,30,29,30,29,29,30,29,30,29,30,30,30,29,10,4),
64=>array(0,30,29,30,29,29,30,29,30,29,30,30,30,0,1,5),
65=>array(0,29,30,29,30,29,29,30,29,29,30,30,29,0,2,6),
66=>array(3,30,30,30,29,30,29,29,30,29,29,30,30,29,3,7),
67=>array(0,30,30,29,30,30,29,29,30,29,30,29,30,0,4,8),
68=>array(7,29,30,29,30,30,29,30,29,30,29,30,29,30,5,9),
69=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,6,10),
70=>array(0,30,29,29,30,29,30,30,29,30,30,29,30,0,7,11),
71=>array(5,29,30,29,29,30,29,30,29,30,30,30,29,30,8,12),
72=>array(0,29,30,29,29,30,29,30,29,30,30,29,30,0,9,1),
73=>array(0,30,29,30,29,29,30,29,29,30,30,29,30,0,10,2),
74=>array(4,30,30,29,30,29,29,30,29,29,30,30,29,30,1,3),
75=>array(0,30,30,29,30,29,29,30,29,29,30,29,30,0,2,4),
76=>array(8,30,30,29,30,29,30,29,30,29,29,30,29,30,3,5),
77=>array(0,30,29,30,30,29,30,29,30,29,30,29,29,0,4,6),
78=>array(0,30,29,30,30,29,30,30,29,30,29,30,29,0,5,7),
79=>array(6,30,29,29,30,29,30,30,29,30,30,29,30,29,6,8),
80=>array(0,30,29,29,30,29,30,29,30,30,29,30,30,0,7,9),
81=>array(0,29,30,29,29,30,29,29,30,30,29,30,30,0,8,10),
82=>array(4,30,29,30,29,29,30,29,29,30,29,30,30,30,9,11),
83=>array(0,30,29,30,29,29,30,29,29,30,29,30,30,0,10,12),
84=>array(10,30,29,30,30,29,29,30,29,29,30,29,30,30,1,1),
85=>array(0,29,30,30,29,30,29,30,29,29,30,29,30,0,2,2),
86=>array(0,29,30,30,29,30,30,29,30,29,30,29,29,0,3,3),
87=>array(6,30,29,30,29,30,30,29,30,30,29,30,29,29,4,4),
88=>array(0,30,29,30,29,30,29,30,30,29,30,30,29,0,5,5),
89=>array(0,30,29,29,30,29,29,30,30,29,30,30,30,0,6,6),
90=>array(5,29,30,29,29,30,29,29,30,29,30,30,30,30,7,7),
91=>array(0,29,30,29,29,30,29,29,30,29,30,30,30,0,8,8),
92=>array(0,29,30,30,29,29,30,29,29,30,29,30,30,0,9,9),
93=>array(3,29,30,30,29,30,29,30,29,29,30,29,30,29,10,10),
94=>array(0,30,30,30,29,30,29,30,29,29,30,29,30,0,1,11),
95=>array(8,29,30,30,29,30,29,30,30,29,29,30,29,30,2,12),
96=>array(0,29,30,29,30,30,29,30,29,30,30,29,29,0,3,1),
97=>array(0,30,29,30,29,30,29,30,30,29,30,30,29,0,4,2),
98=>array(5,30,29,29,30,29,29,30,30,29,30,30,29,30,5,3),
99=>array(0,30,29,29,30,29,29,30,29,30,30,30,29,0,6,4),
100=>array(0,30,30,29,29,30,29,29,30,29,30,30,29,0,7,5),
101=>array(4,30,30,29,30,29,30,29,29,30,29,30,29,30,8,6),
102=>array(0,30,30,29,30,29,30,29,29,30,29,30,29,0,9,7),
103=>array(0,30,30,29,30,30,29,30,29,29,30,29,30,0,10,8),
104=>array(2,29,30,29,30,30,29,30,29,30,29,30,29,30,1,9),
105=>array(0,29,30,29,30,29,30,30,29,30,29,30,29,0,2,10),
106=>array(7,30,29,30,29,30,29,30,29,30,30,29,30,30,3,11),
107=>array(0,29,29,30,29,29,30,29,30,30,30,29,30,0,4,12),
108=>array(0,30,29,29,30,29,29,30,29,30,30,29,30,0,5,1),
109=>array(5,30,30,29,29,30,29,29,30,29,30,29,30,30,6,2),
110=>array(0,30,29,30,29,30,29,29,30,29,30,29,30,0,7,3),
111=>array(0,30,29,30,30,29,30,29,29,30,29,30,29,0,8,4),
112=>array(4,30,29,30,30,29,30,29,30,29,30,29,30,29,9,5),
113=>array(0,30,29,30,29,30,30,29,30,29,30,29,30,0,10,6),
114=>array(9,29,30,29,30,29,30,29,30,30,29,30,29,30,1,7),
115=>array(0,29,30,29,29,30,29,30,30,30,29,30,29,0,2,8),
116=>array(0,30,29,30,29,29,30,29,30,30,29,30,30,0,3,9),
117=>array(6,29,30,29,30,29,29,30,29,30,29,30,30,30,4,10),
118=>array(0,29,30,29,30,29,29,30,29,30,29,30,30,0,5,11),
119=>array(0,30,29,30,29,30,29,29,30,29,29,30,30,0,6,12),
120=>array(4,29,30,30,30,29,30,29,29,30,29,30,29,30,7,1)
);
##############################
#农历天干
$mten=array("null","甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
#农历地支
$mtwelve=array("null","子（鼠）","丑（牛）","寅（虎）","卯（兔）","辰（龙）",
               "巳（蛇）","午（马）","未（羊）","申（猴）","酉（鸡）","戌（狗）","亥（猪）");
#农历月份
$mmonth=array("闰","正","二","三","四","五","六",
              "七","八","九","十","十一","十二","月");
#农历日
$mday=array("null","初一","初二","初三","初四","初五","初六","初七","初八","初九","初十",
            "十一","十二","十三","十四","十五","十六","十七","十八","十九","二十",
            "廿一","廿二","廿三","廿四","廿五","廿六","廿七","廿八","廿九","三十");
##############################
#赋给初值
#天干地支
$ten=0;
$twelve=0;
#星期
$week=5;
#农历日
$md=0;
#农历月
$mm=0;
#阳历总天数 至1900年12月21日
$total=11;
#阴历总天数
$mtotal=0;
##############################
#获得当日日期
$today=getdate();
#如果没有输入，设为当日日期
if ($year=="" or $month=="" or ($year<1901 or $year>2020)
    or ($month<1 or $month>12)){
     $year=$today[year];
     $month=$today[mon];
   }
##############################
#计算到所求日期阳历的总天数-自1900年12月21日始
#先算年的和
for ($y=1901;$y<$year;$y++){
      $total+=365;
      if ($y%4==0) $total ++;
    }
#再加当年的几个月
switch ($month){
         case 12:
              $total+=30;
         case 11:
              $total+=31;
         case 10:
              $total+=30;
         case 9:
              $total+=31;
         case 8:
              $total+=31;
         case 7:
              $total+=30;
         case 6:
              $total+=31;
         case 5:
              $total+=30;
         case 4:
              $total+=31;
         case 3:
              $total+=28;
         case 2:
              $total+=31;
       }
#如果当年是闰年还要加一天
if ($year%4==0 and $month>2){
     $total++;
    }
#顺便算出当月1日星期几
$week=($total+$week)%7;
##############################
#用农历的天数累加来判断是否超过阳历的天数
$flag1=0;#判断跳出循环的条件
$j=0;
while ($j<=120){
      $i=1;
      while ($i<=13){
            $mtotal+=$everymonth[$j][$i];
            if ($mtotal>=$total){
                 $flag1=1;
                 break;
               }
            $i++;
          }
      if ($flag1==1) break;
      $j++;
    }
##############################
#计算所求月份1号的农历日期
$md=$everymonth[$j][$i]-($mtotal-$total);
#月头空开的天数
$k=$week;
#是否跨越一年
switch ($month){
         case 1:
         case 3:
         case 5:
         case 7:
         case 8:
         case 10:
         case 12:
              $dd=31;
              break;
         case 4:
         case 6:
         case 9:
         case 11:
              $dd=30;
              break;
         case 2:
              if ($year%4==0){
                  $dd=29;
                 }else{
                  $dd=28;
                 }
              break;
       }
#是否跨越一年
$ty=0;
if ((($everymonth[$j][0]<>0 and $i==13) or ($everymonth[$j][0]==0 and $i==12))
       and $mtotal-$total<$dd) $ty=1;
?>
<html>
<head>
<title>世纪万年历</title>
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
</head>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<?
	//打印年月抬头
	echo "<p align=\"center\"><font size=\"6\"><b>".$year."年".$month."月</b></font></p>\n";
	if($ty==0)
	{
		echo "<p align=\"center\"><b><font size=\"4\">".$mten[$everymonth[$j][14]].$mtwelve[$everymonth[$j][15]]."年</font></b></p>";
	}
	else
	{
		echo "<p align=\"center\"><b><font size=\"4\">".$mten[$everymonth[$j][14]].$mtwelve[$everymonth[$j][15]]."/".$mten[$everymonth[$j+1][14]].$mtwelve[$everymonth[$j+1][15]]."年</font></b></p>";
	}
?>
<div align="center">
  <center>
  <table border="1" width="85%">
    <tr>
      <td align="center" bgcolor="#CCCCCC"><font color="#FF0000"><b>星期日</b></font></td>
      <td width="14%" align="center" bgcolor="#CCCCCC"><b>星期一</b></td>
      <td width="14%" align="center" bgcolor="#CCCCCC"><b>星期二</b></td>
      <td width="14%" align="center" bgcolor="#CCCCCC"><b>星期三</b></td>
      <td width="14%" align="center" bgcolor="#CCCCCC"><b>星期四</b></td>
      <td width="14%" align="center" bgcolor="#CCCCCC"><b>星期五</b></td>
      <td width="14%" align="center" bgcolor="#CCCCCC"><b>星期六</b></td>
    </tr>
<?
$day=1;
$line=0;
while ($day<=$dd){
   echo "<tr>\n";
   for ($s=0;$s<=6;$s++){
         if ($k<>0 or $day>$dd){
              echo "<td width=\"14%\" align=\"center\">　</td>\n";
              $k--;
         }else{
	//设置字符颜色
               switch ($s){
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                             $color="#000000";
                             break;
                        case 0:
                             $color="#FF0000";
                             break;
                        case 6:
                             $color="#008000";
                             break;
                      }
#生成中文农历
               if ($md==1){#1日打印月份
                    if ($everymonth[$j][0]<>0 and $everymonth[$j][0]<$i){
                        $mm=$i-1;
                    }else{
                        $mm=$i;
                    }
                    if ($i==$everymonth[$j][0]+1 and $everymonth[$j][0]<>0) $chi=$mmonth[0].$mmonth[$mm];#闰月
                    else $chi=$mmonth[$mm].$mmonth[13];
               }else{
                    $chi=$mday[$md];
               }
               echo "<td width=\"14%\" align=\"center\"><font color=\"$color\"><b>$day </b> <b><font size=\"2\">$chi</font></b></font></td>\n";
               $day++;
               $md++;
               if ($md>$everymonth[$j][$i]){
                    $md=1;
                    $i++;
                  }
               if (($i>12 and $everymonth[$j][0]==0) or ($i>13 and $everymonth[$j][0]<>0)){
                     $i=1;
                     $j++;
                  }
           }
       }
   echo "</tr>\n";
   $line++;
}
?>
  </table>
  </center>
</div>
<?php
#补足空行
for ($l=1;$l<=(6-$line);$l++){
      echo "<table border=\"0\" width=\"100%\">\n";
      echo "<tr>\n";
      echo "<td width=\"100%\"><font color=\"#CCFFFF\">a</font></td>\n";
      echo "</tr>\n";
      echo "</table>\n";
    }
#打印上一月，下一月
$ly=$ny=$year;
$last=$month-1;
if ($last==0){
     $last=12;
     $ly--;
   }
$next=$month+1;
if ($next==13){
     $next=1;
     $ny++;
   }
if ($ly>=1901)
echo "<p align=\"center\"><a href=\"".$file."?year=".$ly."&month=".$last."\">&lt;&lt;上一个月</a>&nbsp;&nbsp;&nbsp;\n";
else
echo "<p align=\"center\">";
if ($ny<=2020)
echo "<a href=\"".$file."?year=".$ny."&month=".$next."\">下一个月&gt;&gt;</a></p>\n";
?>
 <?php
echo "<form method=\"POST\" action=\"".$file."\">\n";
?>
  <p align="center"><font color="#000000">年份：</font><select size="1" name="year">
  <option>2020</option>
  <option>2019</option>
  <option>2018</option>
  <option>2017</option>
  <option>2016</option>
  <option>2015</option>
  <option>2014</option>
  <option>2013</option>
  <option>2012</option>
  <option>2011</option>
  <option>2010</option>
  <option>2009</option>
  <option>2008</option>
  <option>2007</option>
  <option>2006</option>
  <option>2005</option>
  <option>2004</option>
  <option>2003</option>
  <option>2002</option>
  <option>2001</option>
  <option selected>2000</option>
  <option>1999</option>
  <option>1998</option>
  <option>1997</option>
  <option>1996</option>
  <option>1995</option>
  <option>1994</option>
  <option>1993</option>
  <option>1992</option>
  <option>1991</option>
  <option>1990</option>
  <option>1989</option>
  <option>1988</option>
  <option>1987</option>
  <option>1986</option>
  <option>1985</option>
  <option>1984</option>
  <option>1983</option>
  <option>1982</option>
  <option>1981</option>
  <option>1980</option>
  <option>1979</option>
  <option>1978</option>
  <option>1977</option>
  <option>1976</option>
  <option>1975</option>
  <option>1974</option>
  <option>1973</option>
  <option>1972</option>
  <option>1971</option>
  <option>1970</option>
  <option>1969</option>
  <option>1968</option>
  <option>1967</option>
  <option>1966</option>
  <option>1965</option>
  <option>1964</option>
  <option>1963</option>
  <option>1962</option>
  <option>1961</option>
  <option>1960</option>
  <option>1959</option>
  <option>1958</option>
  <option>1957</option>
  <option>1956</option>
  <option>1955</option>
  <option>1954</option>
  <option>1953</option>
  <option>1952</option>
  <option>1951</option>
  <option>1950</option>
  <option>1949</option>
  <option>1948</option>
  <option>1947</option>
  <option>1946</option>
  <option>1945</option>
  <option>1944</option>
  <option>1943</option>
  <option>1942</option>
  <option>1941</option>
  <option>1940</option>
  <option>1939</option>
  <option>1938</option>
  <option>1937</option>
  <option>1936</option>
  <option>1935</option>
  <option>1934</option>
  <option>1933</option>
  <option>1932</option>
  <option>1931</option>
  <option>1930</option>
  <option>1929</option>
  <option>1928</option>
  <option>1927</option>
  <option>1926</option>
  <option>1925</option>
  <option>1924</option>
  <option>1923</option>
  <option>1922</option>
  <option>1921</option>
  <option>1920</option>
  <option>1919</option>
  <option>1918</option>
  <option>1917</option>
  <option>1916</option>
  <option>1915</option>
  <option>1914</option>
  <option>1913</option>
  <option>1912</option>
  <option>1911</option>
  <option>1910</option>
  <option>1909</option>
  <option>1908</option>
  <option>1907</option>
  <option>1906</option>
  <option>1905</option>
  <option>1904</option>
  <option>1903</option>
  <option>1902</option>
  <option>1901</option>
  &nbsp;
  </select><font color="#000000">年</font><font color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;
  月份：<select size="1" name="month">
  <option selected>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  &nbsp;
  </select>月&nbsp;&nbsp;&nbsp;&nbsp; </font><input type="submit" value="查询" name="B1"></p>
</form>
</body>
</html>