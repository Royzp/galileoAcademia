<?php 


   include_once "../conexion_bd/config_conexion.php";



  
    //$estado       = $_POST["estado_elim"];
    $descripcion       = $_POST["descripcion"];
    $id_recibo     = $_POST["id_recibo"];
    
   

    $sql  =" UPDATE tb_recibos  SET  
         
         descripcion =  '$descripcion',
         status =  'N'

        WHERE

        recibo_id='".$id_recibo."'  ";



    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);
