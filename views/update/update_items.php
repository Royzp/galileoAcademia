<?php 


   include_once "../conexion_bd/config_conexion.php";



    $id_concepto  = $_POST["concepto_id"];
    $concepto     = $_POST["concepto"];
    $precio       = $_POST["precio_edit"];
    $id_tipo      = $_POST["idtipo_edit"];
    
   

    $sql  =" UPDATE tb_concepto  SET  
         
         
         concepto =  '". $concepto ."',
         precio   =  '". $precio ."',
         tipo_concepto_id     =  '". $id_tipo ."'

        WHERE

        concepto_id='".$id_concepto."'  ";



    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);
