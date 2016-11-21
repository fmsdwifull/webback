<? 
// 本例来自与ZEND网站，由HUNTE整理 

if($action1){ 
//如果文件上传，进行处理
?> 
<html> 
<head> 
<title>多文件上传</title> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"> 
</head> 

<body bgcolor="#FFFFFF" text="#000000"> 
<p><font face="Arial, Helvetica, sans-serif"><font size="+1">文件上传处理</font><br><br> 

<? 
set_time_limit(60); 
// 以确保较大文件上传 
$path1 = dirname($PATH_TRANSLATED)."/upload/"; 
//输出上传路径; 
//print $path1."<br>"; 
// assign our path in a form PHP for Windows understands 

for($i=1;$i<3;$i++) 
{ 
$temp1="file".$i; 
$temp2="file".$i."_name"; 
$source=$$temp1; 
$source_name=$$temp2; 
// print $temp."=".$$temp."<br>"; 

//print $file1_name; 
//print $file2_name; 
//exit; 

//***************** 
//$source = $file1; 
//$source_name = $file1_name; 
//print $source."<br>"; 
//print $source_name; 
//exit; 
if(($source <> "none")&&($source <> "")) 
{ 
// see if the file exists; non-existing file has name of "none" 
if($error1 <> 1) 
{ 
// no need to copy a file if directory not write-enabled 
$dest = $path1.$source_name; 
// append file name to our path 

if(copy($source,$dest)){ 
// copy the file from the temp directory to the upload directory, and test for success 
echo "$source has been uploaded<br>\n"; 
$imagesize = getimagesize($dest); 
switch($imagesize[2]) 
{ 
case 0: 
echo "<br> Image is a unknown <br>"; 
//unlink($dest); 
exit; 
case 1: 
echo "<br> Image is a GIF <br>"; 
echo "$dest has a width of $imagesize[0]<br>"; 
echo "$dest has a height of $imagesize[1]<br>"; 
$newname = $path1; 
$newname .=$i.time() . ".gif"; 
if(copy($dest,$newname)) 
{ 
//echo "<br> GIF Rename Successful from $dest to $newname"; 
}else { 
//echo "<br> GIF Rename Unsuccessful"; 
} 
//unlink ($dest); 
break; 
case 2: 
echo "<br> Image is a JPG <br>"; 
echo "$dest has a width of $imagesize[0]<br>"; 
echo "$dest has a height of $imagesize[1]<br>"; 
$newname = $path1; 
$newname .=$i.time() . ".jpg"; 
if(copy($dest,$newname)) 
{ 
//echo "<br> JPG Rename Successful from $dest to $newname"; 
}else { 
//echo "<br> JPG Rename Unsuccessful"; 
} 
//unlink ($dest); 
break; 
case 3: 
echo "<br> Image is a PNG <br>"; 
echo "$dest has a width of $imagesize[0]<br>"; 
echo "$dest has a height of $imagesize[1]<br>"; 
$newname = $path1; 
$newname .=time() . ".png"; 
if(copy($dest,$newname)) 
{ 
//echo "<br> PNG Rename Successful from $dest to $newname"; 
}else { 
//echo "<br> PNG Rename Unsuccessful"; 
} 
//unlink ($dest); 
break; 
} 
}else { 
echo "Upload directory not write-enabled\n"; 
// you need to write-enable the upload directory 
$error1 = 1; // set flag 
} 
} 
//unlink($source); 
// delete the file from the temp directory 
} 

?> 
<image src="upload/<? print basename($newname)?>"> 
<? 
} //end for 
?> 
<br><a href="90.php">Back</a> 
</font></p> 
</body> 
</html> 

<? 
} 
else { 

?> 

<html> 
<head> 
<title>多文件上传</title> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"> 
</head> 

<body bgcolor="#FFFFFF" text="#000000"> 
<p><font face="Arial, Helvetica, sans-serif"><font size="+1">File 
Upload</font><br><br> 
If your browser is upload-enabled, you will see &quot;Browse&quot; 
(Netscape, Internet Explorer) or &quot;. . .&quot; (Opera) buttons below. 
Use them to select file(s) to upload, then click the &quot;Upload&quot; 
button. After the files have been uploaded, you will see a results screen.<br> 
<form method="post" enctype="multipart/form-data" action="90.php"> 
<input type="hidden" name="MAX_FILE_SIZE" value="800000"> 
<input type="hidden" name="action1" value="1"> 
File 1: <input type="file" name="file1" size="30"><br> 
File 2: <input type="file" name="file2" size="30"><br> 
<br> 
<input type="submit" value="Upload"> 
</form> 
</font></p> 
</body> 
</html> 

<? 

} 

?> 
