<?php 


   include_once "../conexion_bd/config_conexion.php";



    $idusuario    =$_POST["id_document"];
    $responsable  =$_POST["responsable_edit"];
    $resolucion   =$_POST["resolucion_edit"];
    $ruc          =$_POST["ruc_edit"];
    $razon        =$_POST["razon_edit"];
    $expediente   =$_POST["expediente_edit"];
    $monto        =$_POST["monto_edit"];
    $documento    =$_POST["documento_edit"];
    $condicion    =$_POST["condicion_edit"];
    $numero       =$_POST["numero_edit"];
   


  


   

    $sql  =" UPDATE tb_documento SET  
         
         responsable  =  '". $responsable ."' ,
         resolucion   =  '". $resolucion ."',
         ruc          =  '". $ruc ."',
         razon_social =  '". $razon ."',
         expediente   =  '". $expediente ."',
         monto_multa  =  '". $monto ."',
         documento_adjunto     =  '".$documento."',
         condicion_expediente  =  '".$condicion."',
         numero_folios         =  '".$numero."'
         

        WHERE

        id_document='".$idusuario."'  ";

  
  

    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);

 ?>