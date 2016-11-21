<?php   
   if (! empty ( $_FILES ['file'] ['name'] ))
        {
           $tmp_file = $_FILES ['file'] ['tmp_name'];
           
           //$tmp_size = $_FILES ['file_stu'] ['size'];
   
           $file_types = explode ( ".", $_FILES ['file'] ['name'] );
           $file_type = $file_types [count ( $file_types ) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower ( $file_type ) != "xls")              
           {
                 $this->error ( '不是Excel文件，重新上传' );
            }
           /*设置上传路径*/
      

           $savePath = "upload/";
           
    
           /*以时间来命名上传的文件*/
            $str = date ( 'Ymdhis' ); 
            $file_name = $str . "." . $file_type;
            
            /*是否上传成功*/
            if (! move_uploaded_file( $tmp_file, $savePath . $file_name )) 
             {
                 $this->error ( '上传失败' );
             }
		}
?>		   
		   