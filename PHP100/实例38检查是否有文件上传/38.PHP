<HTML>
<HEAD>
<TITLE>文件上传</TITLE>
</HEAD>
<BODY>
<?
	//检查是否有文件上传
	if(isset($UploadedFile))
	{
		//unlink($UploadedFile);
		print("本地 File: $UploadedFile <BR>\n");
		print("名称: $UploadedFile_name <BR>\n");
		print("大小: $UploadedFile_size <BR>\n");
		print("类型: $UploadedFile_type <BR>\n");
		print("<HR>\n");
	}
?>
<FORM ENCTYPE="multipart/form-data" ACTION="38.php" METHOD="post"> 
<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="4096"> 
<INPUT NAME="UploadedFile" TYPE="file"  size='15'> 
<INPUT TYPE="submit" VALUE="上传文件"> 
</FORM>
</BODY>
</HTML>