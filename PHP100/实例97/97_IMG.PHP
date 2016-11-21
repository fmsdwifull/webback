<?
  Header("Content-type: image/gif");
  /**************************************/
  /** 程序：选票统计                   **/
  /** 文件：emi_vote.php               **/
  /** 日期：2000/01/25                 **/
  /** 版本：v1.0                       **/
  /** 作者：emildy                     **/
  /** 主页：http://www.e-mi.net        **/
  /** 请勿删除此段版权信息  谢谢合作   **/
  /**************************************/
  $votez=$vote1+$vote2+$vote3+$vote4+$vote5;
  if($vote1>0){$vote1a=$vote1/$votez*360;}else{$vote1a=0;}
  if($vote2>0){$vote2a=$vote2/$votez*360;}else{$vote2a=0;}
  if($vote3>0){$vote3a=$vote3/$votez*360;}else{$vote3a=0;}
  if($vote4>0){$vote4a=$vote4/$votez*360;}else{$vote4a=0;}
  if($vote5>0){$vote5a=$vote5/$votez*360;}else{$vote5a=0;}
  $img_output=ImageCreate(88,70);
  $color0a=imagecolorallocate($img_output,255,255,255); /*白*/
  $color0b=imagecolorallocate($img_output,  0,  0,  0); /*黑*/
  $color1a=imagecolorallocate($img_output,255,  0,  0); /*红a*/
  $color1b=imagecolorallocate($img_output,200,  0,  0); /*红b*/
  $color2a=imagecolorallocate($img_output,255,128, 64); /*橙a*/
  $color2b=imagecolorallocate($img_output,198, 64,  0); /*橙b*/
  $color3a=imagecolorallocate($img_output,255,255,  0); /*黄a*/
  $color3b=imagecolorallocate($img_output,200,200,  0); /*黄b*/
  $color4a=imagecolorallocate($img_output,133,248, 18); /*绿a*/
  $color4b=imagecolorallocate($img_output,  0,200,  0); /*绿b*/
  $color5a=imagecolorallocate($img_output,  0,  0,255); /*蓝a*/
  $color5b=imagecolorallocate($img_output,  0,  0,200); /*蓝b*/
  imagecolortransparent($img_output,$color0a); /*白色为透明色*/

  $picture_x=43; /*饼图的中心点-X*/
  $picture_y=30; /*饼图的中心点-Y*/
  $picture_w=80; /*饼图的中心点-w*/
  $picture_h=40; /*饼图的中心点-h*/

  for($temp_a=$picture_y+11;$temp_a>$picture_y;$temp_a--){
    if($vote5>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$temp_a,$temp_b,$temp_b*5/8,0                              ,$vote5a                        ,$color5b);}}
    if($vote4>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$temp_a,$temp_b,$temp_b*5/8,$vote5a                        ,$vote5a+$vote4a                ,$color4b);}}
    if($vote3>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$temp_a,$temp_b,$temp_b*5/8,$vote5a+$vote4a                ,$vote5a+$vote4a+$vote3a        ,$color3b);}}
    if($vote2>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$temp_a,$temp_b,$temp_b*5/8,$vote5a+$vote4a+$vote3a        ,$vote5a+$vote4a+$vote3a+$vote2a,$color2b);}}
    if($vote1>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$temp_a,$temp_b,$temp_b*5/8,$vote5a+$vote4a+$vote3a+$vote2a,360                            ,$color1b);}}
  }
  if($vote5>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$picture_y,$temp_b,$temp_b*5/8,0                              ,$vote5a                        ,$color5a);}}
  if($vote4>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$picture_y,$temp_b,$temp_b*5/8,$vote5a                        ,$vote5a+$vote4a                ,$color4a);}}
  if($vote3>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$picture_y,$temp_b,$temp_b*5/8,$vote5a+$vote4a                ,$vote5a+$vote4a+$vote3a        ,$color3a);}}
  if($vote2>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$picture_y,$temp_b,$temp_b*5/8,$vote5a+$vote4a+$vote3a        ,$vote5a+$vote4a+$vote3a+$vote2a,$color2a);}}
  if($vote1>0){for($temp_b=$picture_w;$temp_b>0;$temp_b--){imagearc($img_output,$picture_x,$picture_y,$temp_b,$temp_b*5/8,$vote5a+$vote4a+$vote3a+$vote2a,360                            ,$color1a);}}

  ImageGif($img_output);
  ImageDestory($img_output);
?>