<html>
<head>
<title>PHP TreeMenu Demo (c)1999 Bjorge Dijkstra (bjorge@gmx.net)</title>
<style>
  TD { font-family : Verdana,Arial; font-size : 8pt; }
  A  { text-decoration : none; background-color : #EEFFEE; }
</style>
</head>
<body bgcolor=#eeffee link=#339933>

<?php  
  /*********************************************/
  /*  PHP3 TreeMenu Demo                       */
  /*                                           */
  /*  (c)1999 Bjorge Dijkstra                  */
  /*  email : bjorge@gmx.net                   */
  /*                                           */  
  /*********************************************/

  /*********************************************/
  /*  Set file with menu structure             */
  /*********************************************/
  
  $treefile = "demomenu.txt";
  
  /*********************************************/
  /*  Include tree code                        */
  /*********************************************/
  
  require "treemenu.inc";
  
?>

</body>
</html>