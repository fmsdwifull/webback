***************************************************************
*  PHP目录树 *
***************************************************************


文件列表:
- index.html			
- about.html			
- demo.php3			    演示目录树
- demomenu.txt			目录结构
- treemenu.inc			主目录节点
- tree_*.gif			七个目录树图片
- readme.txt			介绍文件


要求:
- 配有php的WEB服务器.


演示:
- 将文件拷贝到WEB服务器目录下
- 在浏览器中打开index.html




概述：

目录结构文件
-----------------------
我们首先需要产生一个目录树结构文件，这是一个常见的TEXT文本文件（见demomenu.txt），
第一行是一个单结点（根目录），紧其后是该结点的名称，.The following lines contain the menu items. Each line starts with
two or more dots to indicate the level in the tree. A level can't
be more than one level deeper than the previous one. Following the
dots come the item name, link and link target, seperated by a '|'.
If an item doesn't need to link to somewhere then the link and
target can be omitted. Item names can contain HTML code, 
for example you can put <b> tags around a name to make it bold or
you could even use images instead of text, there are all kinds of
possibilities.
An example menu will probably clarify a lot so here it is:

目录是例：:

.top
..category 1
...item 1.1|item11.html|main
...item 1.2|item12.html|main
..category 2
...sub category 2.1
....item 2.1.1|item211.html|main
....item 2.2.2


引用文件：
---------------
当建立一个新的目录结构文件后，我就可以向下面这样简单的引用。:

<html>
<body>

<?php  
  $treefile = "mymenu.txt";

  require "menutree.inc"; 
?>

</body>
</html>


变量$treefile 来指定目录结构的文件名，如果路径步特别说明，它将默认跟php文件在同一目录下。

ok!
-----------
现在保存所有的文件在WEB服务器的同一目录下，所后在浏览器上看看！




