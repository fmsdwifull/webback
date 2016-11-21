<?php  
  /*********************************************/
  /*  PHP4 目录树                              */
  /*                                           */
  /*                                           */  
  /*********************************************/

  /*********************************************/
  /*  设置                                     */
  /*********************************************/
  /*                                           */      
  /*  变量$treefile 需要在主文件里设置         */
  /*                                           */ 
  /*********************************************/
  
  $script       = $SCRIPT_NAME;
  
  $img_expand   = "tree_expand.gif";    //可展开图片
  $img_collapse = "tree_collapse.gif";  //可收缩图片
  $img_line     = "tree_vertline.gif";  //直线图片
  $img_split	= "tree_split.gif";     //分杈图片
  $img_end      = "tree_end.gif";       //树结
  $img_leaf     = "tree_leaf.gif";      //树叶
  $img_spc      = "tree_space.gif";     //空白图片
  
  /*********************************************/
  /*  丛树结构文件中读出内容                   */
  /*********************************************/
  
  /*********************************************/
  /* 数组变量$tree                             */
  /* tree[x][0] -> tree level   层             */
  /* tree[x][1] -> item text    条目名称       */
  /* tree[x][2] -> item link    条目连接       */
  /* tree[x][3] -> link target  连接目标       */
  /* tree[x][4] -> last item in subtree        */
  /*********************************************/

  $maxlevel=0;
  $cnt=0;
  
  $fd = fopen($treefile, "r");
  if ($fd==0) die("treemenu.inc : Unable to open file ".$treefile);
  while ($buffer = fgets($fd, 4096)) 
  {
    $tree[$cnt][0]=strspn($buffer,".");
    $tmp=rtrim(substr($buffer,$tree[$cnt][0]));
    $node=explode("|",$tmp); 
    $tree[$cnt][1]=$node[0];
    $tree[$cnt][2]=$node[1];
    $tree[$cnt][3]=$node[2];
    $tree[$cnt][4]=0;
    if ($tree[$cnt][0] > $maxlevel) $maxlevel=$tree[$cnt][0];    
    $cnt++;
  }
  fclose($fd);

  for ($i=0; $i<count($tree); $i++) {
     $expand[$i]=0;
     $visible[$i]=0;
     $levels[$i]=0;
  }

  /*********************************************/
  /*  得到节点数                               */
  /*********************************************/
  
  if ($p!="") $explevels = explode("|",$p);
  
  $i=0;
  while($i<count($explevels))
  {
    $expand[$explevels[$i]]=1;
    $i++;
  }
  
  /*********************************************/
  /*  找到最后一个下一级结点                   */
  /*********************************************/
  
  $lastlevel=$maxlevel;
  for ($i=count($tree)-1; $i>=0; $i--)
  {
     if ( $tree[$i][0] < $lastlevel )
     {
       for ($j=$tree[$i][0]+1; $j <= $maxlevel; $j++)
       {
          $levels[$j]=0;
       }
     }
     if ( $levels[$tree[$i][0]]==0 )
     {
       $levels[$tree[$i][0]]=1;
       $tree[$i][4]=1;
     }
     else
       $tree[$i][4]=0;
     $lastlevel=$tree[$i][0];  
  }
  
  
  /*********************************************/
  /*  判定可视结点                             */
  /*********************************************/
  
  $visible[0]=1;   // root is always visible
  for ($i=0; $i<count($explevels); $i++)
  {
    $n=$explevels[$i];
    if ( ($visible[$n]==1) && ($expand[$n]==1) )
    {
       $j=$n+1;
       while ( $tree[$j][0] > $tree[$n][0] )
       {
         if ($tree[$j][0]==$tree[$n][0]+1) $visible[$j]=1;     
         $j++;
       }
    }
  }
  
  
  /*********************************************/
  /*  Output nicely formatted tree             */
  /*********************************************/
  
  for ($i=0; $i<$maxlevel; $i++) $levels[$i]=1;

  $maxlevel++;
  
  echo "<table cellspacing=0 cellpadding=0 border=0 cols=".($maxlevel+3)." width=".($maxlevel*16+100).">\n";
  echo "<tr>";
  for ($i=0; $i<$maxlevel; $i++) echo "<td width=16></td>";
  echo "<td width=100></td></tr>\n";
  $cnt=0;
  while ($cnt<count($tree))
  {
    if ($visible[$cnt])
    {
      /****************************************/
      /* 开始新的一 行                        */
      /****************************************/      
      echo "<tr>";
      
      /****************************************/
      /* 来自较高一层的树直线                 */
      /****************************************/
      $i=0;
      while ($i<$tree[$cnt][0]-1) 
      {
        if ($levels[$i]==1)
            echo "<td><img src=\"".$img_line."\"></td>";
        else
            echo "<td><img src=\"".$img_spc."\"></td>";
        $i++;
      }
      
      /****************************************/
      /*下一级结点                            */
      /****************************************/         
      if ($tree[$cnt][4]==1) 
      {
        echo "<td><img src=\"".$img_end."\"></td>";
        $levels[$tree[$cnt][0]-1]=0;
      }
      else
      {
        echo "<td><img src=\"".$img_split."\"></td>";                  
        $levels[$tree[$cnt][0]-1]=1;    
      } 
      
      /********************************************/
      /* 节点(有下一级)或树叶 (无下一级)          */
      /********************************************/
      if ($tree[$cnt+1][0]>$tree[$cnt][0])
      {
        
        /****************************************/
        /* 生成展开或收缩参数                   */
        /****************************************/
        $i=0; $params="?p=";
        while($i<count($expand))
        {
          if ( ($expand[$i]==1) && ($cnt!=$i) || ($expand[$i]==0 && $cnt==$i))
          {
            $params=$params.$i;
            $params=$params."|";
          }
          $i++;
        }
               
        if ($expand[$cnt]==0)
            echo "<td><a href=\"".$script.$params."\"><img src=\"".$img_expand."\" border=no></a></td>";
        else
            echo "<td><a href=\"".$script.$params."\"><img src=\"".$img_collapse."\" border=no></a></td>";         
      }
      else
      {
        /*************************/
        /* 树叶                  */
        /*************************/

        echo "<td><img src=\"".$img_leaf."\"></td>";         
      }
      
      /****************************************/
      /* 输出条目名称                         */
      /****************************************/
      if ($tree[$cnt][2]=="")
          echo "<td colspan=".($maxlevel-$tree[$cnt][0]).">".$tree[$cnt][1]."</td>";
      else
          echo "<td colspan=".($maxlevel-$tree[$cnt][0])."><a href=\"".$tree[$cnt][2]."\" target=\"".$tree[$cnt][3]."\">".$tree[$cnt][1]."</a></td>";
          
      /****************************************/
      /* 结束行                               */
      /****************************************/
              
      echo "</tr>\n";      
    }
    $cnt++;    
  }
  echo "</table>\n";

  /***************************************************/
  /* Tree file format                                */
  /*                                                 */
  /*                                                 */
  /* The first line is always of format :            */
  /* .[rootname]                                     */
  /*                                                 */
  /* each line contains one item, the line starts    */ 
  /* with a series of dots(.). Each dot is one level */
  /* deeper. Only one level at a time once is allowed*/
  /* Next comes the come the item name, link and     */
  /* link target, seperated by a |.                  */
  /*                                                 */  
  /* example:                                        */
  /*                                                 */  
  /* .top                                            */
  /* ..category 1                                    */
  /* ...item 1.1|item11.htm|main                     */
  /* ...item 2.2|item12.htm|main                     */
  /* ..category 2|cat2overview.htm|main              */
  /* ...item 2.1|item21.htm|main                     */
  /* ...item 2.2|item22.htm|main                     */
  /* ...item 2.3|item23.htm|main                     */
  /*                                                 */  
  /***************************************************/
?>
