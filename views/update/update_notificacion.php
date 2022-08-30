<?php 



   include_once "../conexion_bd/config_conexion.php";



    $idusuario    = $_POST["id_document_not"];

    $fecha  = $_POST["fecha_edit_not"];
    $estado   = $_POST["estado_edit_not"];
    

  


   

    $sql  =" UPDATE tb_documento SET  
         
         fecha_ultima_actualizacion  =  '". $fecha ."' ,
         ultimo_estado   =  '". $estado ."'
         

        WHERE

        id_document='".$idusuario."'  ";

  
   // $conexion=mysqli_connect('localhost','root','','bd_coactiva');
   //mysqli_query($conexion,"set names utf8");


    if(mysqli_query($conexion, $sql)){
        $sql2 ="INSERT INTO tb_estados(id_document,
                                            estado,
                                            fecha)

        VALUES('$idusuario','$estado','$fecha')";  


        $x=mysqli_query($conexion,$sql2);
           if ($x == 1) {
              echo "1";
          }else{
            echo "Error a Insertar nuevo Registro : <br/> ";
          }
    } else {
        echo "0";
    }

    
              


    // Cierra la conexion
    mysqli_close($conexion);

 ?>