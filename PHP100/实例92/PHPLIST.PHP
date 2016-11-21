<body bgcolor="#fafad2">
<? 
require ("phplist.inc"); 
if ($rootpath=="") {$rootpath=$htmlroot;} 
function filelist($pathname){ //遍历所有的文件和目录，$pathnam为起始目录，$searchs为搜索关键字 
global $htmlroot; 
if (eregi("[/][.][.]$",$pathname)) { 
$temp=split("[/]",$pathname); 
$pathname=""; 
for ($tt=1;$tt<(count($temp)-2);$tt++) 
$pathname=$pathname."/".$temp[$tt]; 
} 
echo $pathname."<br>"; 
$handle=opendir($pathname); //打开目录 
if (@chdir($pathname)) { //cd 进入目录，若无权限则不进入 
$file = readdir($handle); //读出所有当前目录下的元素名，第一次读出为‘。’，指上层目录 
while ($file = readdir($handle)) { //若有元素就进行以下处理 
$fname=$pathname."/".$file; //将元素名与当前目录名结合组成完整的文件名，并赋值给$fname 
if ((is_file($file)) and (ereg("\.php[3]{0,1}$",$file) or ereg("\.htm[l]{0,1}$",$file))) //判断是否为文件并且是否以.php和.php3结尾 
{ 
$temppp=split($htmlroot,$fname); 
echo "<a href=$temppp[1]>".$file."</a>&nbsp;&nbsp;&nbsp;".filesize($file)."bytes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=codeshow.php?filename=$fname><font size=-1>源文件</font></a><br>"; 
//findinfile($fname,$searchs); //调用findinfile函数 
} 
elseif (is_dir($fname)) { //判断是否为目录 
linkres($fname); 
//filelist($fname,$searchs);} //递归调用filelist函数 
} 
} 
chdir(".."); //结束当前递归，返回上层 
} 
closedir($handle); //关闭当前目录读取 
} 
// 
function linkres($filename){ 
$tpath=split("/web/html",$filename); 
$turepath=$tpath[1]; 
ereg("[^\\\/\~]{0,}$",$filename,$res); 
//$ft=filetitle($filename); 
//if ($ft=="") $ft="无标题"; 
echo "<a href=phplist.php?rootpath=$filename>".$res[0]."</a>&nbsp;&nbsp;&nbsp;&lt;dir&gt;<br>"; 
} 
// 
filelist($rootpath); 
?> 

</body>