<?
  $file1="97_data.txt"; /*选票数据文件*/
  $file2="97_ip.txt"; /*选票IP记录文件*/
  
//---------------------------------------------------
  $this_ip=getenv("REMOTE_ADDR")."\n";
  $fd2=fopen("$file2","r");
  $fd_data2=fread($fd2,filesize($file2));
  fclose($fd2);
  if(!ereg($this_ip,$fd_data2)){
    $fd2=fopen("$file2","a");
    $fd_write2=fwrite($fd2,$this_ip,strlen($this_ip));
    fclose($fd2);
  //---------------------------------------------------
    $fd1=fopen("$file1","r");
    $fd_data1=fread($fd1,filesize($file1));
    fclose($fd1);
    list($votez_name,$vote1_name,$vote1_counter,$vote2_name,$vote2_counter,$vote3_name,$vote3_counter,$vote4_name,$vote4_counter,$vote5_name,$vote5_counter)=split("\|",$fd_data1);
  //---------------------------------------------------
 
    if(!empty($vote)){
           if($vote==1 && !empty($vote1_name)){$vote1_counter++;
      }elseif($vote==2 && !empty($vote2_name)){$vote2_counter++;
      }elseif($vote==3 && !empty($vote3_name)){$vote3_counter++;
      }elseif($vote==4 && !empty($vote4_name)){$vote4_counter++;
      }elseif($vote==5 && !empty($vote5_name)){$vote5_counter++;
      }
      $fd_data1="$votez_name|$vote1_name|$vote1_counter|$vote2_name|$vote2_counter|$vote3_name|$vote3_counter|$vote4_name|$vote4_counter|$vote5_name|$vote5_counter";
      $fd1=fopen("$file1","w");
      $fd_write1=fwrite($fd1,$fd_data1,strlen($fd_data1));
      fclose($fd1);
    }
  }
//---------------------------------------------------
?>
<html><head><meta http-equiv='Refresh' content='0; URL=97-1.php'></head>
<body><p>谢谢您对本站的支持，三秒后将自动返回……</p></body></html>