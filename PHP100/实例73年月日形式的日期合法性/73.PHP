<?
/* 
这个函数可以用来检查年月日形式的日期合法性,您只要稍作修改便可以检查其它形式的日期合法性. 
功能:日期合法性检查 
返回: true(合法)/false(不合法) 
参数:$ymd 年月日形式的日期 
    $sep 年月日之间的分隔符,默认为- 
*/ 
function datecheck($ymd,$sep='-'){ 
   $parts = explode($sep,$ymd); 
   $year = $parts[0]; 
   $month = $parts[1]; 
   $day = $parts[2]; 

   if(isint($year) && isint($month) && isint($day)){ 
      if(checkdate($month,$day,$year)) return true; 
      else return false; 
   } 
   else return false; 
} 

// [ php/inc/isint.php ] cvs 1.2 
function isint($str){ 
   $str = (string)$str; 

   $pos = 0; 
   $len = strlen($str); 
   for($i=0;$i<$len;$i++){ 
      if($str[$i]=='0') $pos++; 
      else break; 
   } 
   $str = substr($str,$pos); 

   $int = (int)$str; 
   if($str==(string)$int) return true; 
   else return false; 
} 

//测试 
$dates = array( 
               '2000-4-11' => '-', 
               '1900-2-1' => '-', 
               '2001-03-01' => '-', 
               'abaf' => '-', 
               '20.03.05' => '.' 
              ); 
while(list($date,$sep)=each($dates)){ 
   if(datecheck($date,$sep)) echo $date.' 是合法日期<br>'; 
   else echo $date.' 不是合法日期<br>'; 
} 
// 
?>