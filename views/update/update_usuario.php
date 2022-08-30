<?php 


   include_once "../conexion_bd/config_conexion.php";



    $idusuario   = $_POST["id_usuario"];

    $dni         = $_POST["dni_edit"];
    $nombre      = $_POST["nombre_edit"];
    $apellido    = $_POST["apellido_edit"];

    $contra      = $_POST["contra_edit"];
    $tipousuario = $_POST["tipousuario_edit"];
   


  


   

    $sql  =" UPDATE tb_usuario SET  
         
         numero_dni      =  '". $dni ."' ,
         nombre_user   =  '". $nombre ."',
         apellido_user =  '". $apellido ."',
         clave_user     =  MD5('".$contra."'),
         tipo_user     =  '". $tipousuario ."'

        WHERE

        id_user='".$idusuario."'  ";



    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);

 ?>