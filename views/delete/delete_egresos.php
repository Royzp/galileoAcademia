<?php 


   include_once "../conexion_bd/config_conexion.php";



  
    $status_eliminar  = $_POST["status_eliminar"];
    $id_egreso        = $_POST["id_egreso"];
    
   

    $sql  =" UPDATE tb_egreso  SET  
         
         
         status =  'N'

        WHERE

        id_egreso= '".$id_egreso."'  ";



    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);
