<?php 


   include_once "../conexion_bd/config_conexion.php";



  
    $estado       = $_POST["estado_elim"];
    $id_concept     = $_POST["concept_id"];
    
   

    $sql  =" UPDATE tb_concepto  SET  
         
         
         estate =  'N'

        WHERE

        concepto_id='".$id_concept."'  ";



    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);
