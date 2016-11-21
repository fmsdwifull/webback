<?
//本例用PHP4实现顶级域名查询
if ($domain) 
{ 
if ($domain) 
        { 
         //连接到internic域名服务器
        $fp = fsockopen( "rs.internic.net", 43, &$errno, &$errstr, 10); 
        if (!$fp) 
    { 
        echo  "$errstr ($errno)<br>\n"; 
        } 
        else 
        { 
        fputs($fp, "$domain\r\n"); 
        while(!feof($fp)) 
                { 
                $buf = fgets($fp,128); 
                if (ereg( "Whois Server:", $buf)) 
                        { 
                        $server = str_replace( "Whois Server: ",  "", $buf); 
                        $server = trim($server); 
                        } 
                } 
        fclose($fp); 
        } 
        if ($server) 
                { 
                echo  "<B>$domain 的注册服务器是 $server:</B><BR>"; 
                echo  "<PRE>"; 
                $fp = fsockopen($server, 43, &$errno, &$errstr, 10); 
                if(!$fp) 
                        { 
                        echo  "不能连接到服务器 $server 的43端口.\n"; 
                        echo  "$errstr ($errno)<br>\n"; 
                        } 
                else 
                        { 
                        fputs($fp, "$domain\r\n"); 
                        while(!feof($fp)) 
                                { 
                                echo fgets($fp,128); 
                                } 
                        fclose($fp); 
                        } 
                } 
        else    { 
                echo( "<b>$domain 没有注册。</b><BR>"); 
                } 
        echo ( "</PRE><BR>"); 
        } 

} 
?>

<FORM ACTION=" <?PHP echo($PHP_SELF); ?>" METHOD="post"> 
  只能查询.com,.net和.org的域名<br> 
  输入域名：<INPUT TYPE="text" NAME="domain" SIZE="30" MAXLENGTH="100"> 
  <INPUT TYPE=submit VALUE="查 询"> 
</FORM>