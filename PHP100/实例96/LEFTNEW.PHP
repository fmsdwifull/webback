<HTML>
<HEAD>
<TITLE>访客留言本</TITLE>
<META content="text/html; charset=gb2312" http-equiv=Content-Type>
<META content="MSHTML 5.00.2614.3500" name=GENERATOR>
<link rel="stylesheet" href="css.css">
</HEAD>
<script language="JavaScript">
<!--

function Juge(theForm)
{
  if (theForm.name.value == "")
  {
    alert("请输入您的姓名!");
    theForm.name.focus();
    return (false);
  }
    if (theForm.txt.value == "")
  {
    alert("请输入留言内容!");
    theForm.txt.focus();
    return (false);
  }
}

//-->
</script>

<body alink="#FF0000" link="#000099" vlink="#CC6600" bgColor="#CCCCCC">
<TABLE align=center border=0 cellPadding=0 cellSpacing=1 width=264>
  <TBODY> 
  <TR>
    <TD> 
      <TABLE border=0 cellPadding=5 cellSpacing=1 width="60%" align="center">
        <TR vAlign=top> 
          <TD bgColor=#ffffff><IMG src="images/doodle_title.gif"></TD>
        </TR>
        <TBODY> 
        <TR vAlign=top> 
          <FORM action=listnew.php?type=add method=post target=right onSubmit="return Juge(this)">
            <TD bgColor=#ffffff> 
              <div align="center"><BR>
                姓名 <INPUT class=stedit name=name size=24>
                <BR>
                信箱 <INPUT class=stedit name=email size=24 value=@>
                <BR>
                主页 <INPUT class=stedit name=url size=24 value=http://>
                <BR>
                主题 <INPUT class=stedit name=title size=24>
                <BR>
                选项 <INPUT CHECKED id=radio1 name=sex type=radio value=1>
                男 <INPUT id=radio2 name=sex type=radio value=0>
                女 <SELECT class=stbtm name=mind size=1 style="BACKGROUND-COLOR: #f5f5f5; FONT-SIZE: 9pt">
                  <OPTION selected value=01>大家讨论</OPTION>
                  <OPTION value=02>真高兴</OPTION>
                  <OPTION value=03>不高兴</OPTION>
                  <OPTION value=04>很满意</OPTION>
                  <OPTION value=05>我赞同</OPTION>
                  <OPTION value=06>说得好</OPTION>
                  <OPTION value=07>你真傻</OPTION>
                  <OPTION value=08>交个朋友</OPTION>
                  <OPTION value=09>请注意</OPTION>
                  <OPTION value=10>为什么</OPTION>
                  <OPTION value=11>真奇怪</OPTION>
                  <OPTION value=12>还不错</OPTION>
                  <OPTION value=13>我愤怒</OPTION>
                  <OPTION value=14>我伤心</OPTION>
                </SELECT>
                <BR>
                内 容 <BR>
                <textarea class="stedit" cols="25" name="txt" rows="7"></textarea>
                <BR>
                <IMG 
            border=0 height=5 src="" width=1><BR>
                <input class=stedit name=Submit type=submit value=" 提 交 ">
                <input class=stedit name=Submit2 type=reset value=" 清 除 ">
              </div>
            </TD>
          </FORM>
        </TR>
        </TBODY> 
      </TABLE>
    </TD></TR>
  </TABLE>
<br>
</BODY>
</HTML>
