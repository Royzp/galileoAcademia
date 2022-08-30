<?php    
     if ($_POST['datito']){
      require_once '../conexion_bd/config_conexion.php';
       $pid = ($_POST['datito']);
       $query = "Delete From tb_usuario Where id_user=".$pid ;
       $resp=mysqli_query($conexion,$query);
       echo $resp;
     }
 
?>