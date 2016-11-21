<?php 
//计数器 
//本计数器无需数据库支持。 
//说明： 
// $five,$four等标量表示零的个数，放在数字前构成6位 
//的来访者数目。当然，如果你的网站 
//浏览量十分巨大，你可以添加$six,$seven等等构成更大的数字显 
//示来访者的数目。 
function Counter() { 
$five="00000"; 
$four="0000"; 
$three="000"; 
$two="00"; 
$one="0"; 
$counter="counternumber.dat"; //存放访客数目的文件.dat格式 
if (!file_exists($counter)) //判断文件是否存在,如果不存在以写方式建立一个文件 
{ 
$counter=fopen($counter,"w"); 
fputs($counter,"0"); 
fclose($counter); 
} 
else 
{ 
$num=file($counter,"r"); //如果文件存在则读出文件，并加1 
$num[0]+=1; 
if($num[0]<10){ //判断数字的大小，如果小于100000根据不同情况在前面 
print "$five"."$num[0]"; //加上不同个数的0，为了凑够6位。 
}elseif($num[0]<100){ 
print "$four"."$num[0]"; 
}elseif($num[0]<1000){ 
print "$three"."$num[0]"; 
}elseif($num[0]<10000){ 
print "$two"."$num[0]"; 
}elseif($num[0]<100000){ 
print "$one"."$num[0]"; 
}else{ 
print "$num[0]"; 
} } 
$fp=fopen($counter,"w"); //以写入文件方式打开文件 
fputs($fp,"$num[0]"); //将加过1的数字放入文件中 
fclose($fp); //关闭文件 
} 


?> 

<!-- 可以用<?php Counter()?>形式调用函数，并用html标记或 
CSS样式单来修饰显示出的数字,如下所示 --> 
<html> 
<body> 
<U> 
<B> 
<FONT SIZE="9" face="verdana" COLOR="#ffcc00"> 
<?php Counter()?> 
</FONT> 
</B> 
</U> 
</body> 
</html>