<HTML>
<HEAD>
<TITLE>session函数</TITLE>
</HEAD>
<BODY>
<?php
$username="guest1";
if(isset($username)) {
    session_name($username);
}
echo "您的名字为：".session_name()."\n";
?>
</BODY>
</HTML>