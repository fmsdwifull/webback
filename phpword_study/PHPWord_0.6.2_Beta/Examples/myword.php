<?php
    /*
    * 必须将 php.ini 中的 com.allow_dcom 设为 TRUE
    */
 
    function php_Word($wordname,$htmlname,$content)
    {
        //获取链接地址
        $url = $_SERVER['HTTP_HOST'];
        $url = $url.$_SERVER['PHP_SELF'];
        $url = dirname($url)."/";
        //建立一个指向新COM组件的索引
        $word = new COM("word.application") or die("Unable to instanciate Word");
 
        //显示目前正在使用的Word的版本号
        echo "Loading Word, v. {$word->Version}";
 
        //把它的可见性设置为0（假），如果要使它在最前端打开，使用1（真）
        $word->Visible = 1;
        //---------------------------------读取Word内容操作 START-----------------------------------------
        //打开一个word文档
        $word->Documents->Open($url.$wordname);
 
        //将filename.doc转换为html格式，并保存为html文件
        $word->Documents[1]->SaveAs(dirname(__FILE__)."/".$htmlname,8);
 
        //获取htm文件内容并输出到页面 (文本的样式不会丢失)
        $content = file_get_contents($url.$htmlname);
        echo $content;
 
        //获取word文档内容并输出到页面（文本的原样式已丢失）
        $content= $word->ActiveDocument->content->Text;
        echo $content;
 
        //关闭与COM组件之间的连接
        $word->Documents->close(true);
        $word->Quit();
        $word = null;
        unset($word);
        //---------------------------------新建立Word文档操作 START--------------------------------------
        //建立一个空的word文档
        $word->Documents->Add();
 
        //写入内容到新建word
        $word->Selection->TypeText("$content");
 
        //保存新建的word文档
        $word->Documents[1]->SaveAs(dirname(__FILE__)."/".$wordname);
 
        //关闭与COM组件之间的连接
        $word->Quit();
    }
    php_Word("BasicTable.docx","filename.html","写入word的内容");
?>