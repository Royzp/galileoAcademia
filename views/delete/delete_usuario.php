<?php 


$conexion=mysqli_connect('localhost','root','','bd_academia');
mysqli_query($conexion,"set names utf8");

    $idusuario   = $_POST["id_usuario"];
    $estado      = $_POST["estado_edit"];
    

    $sql  =" UPDATE tb_usuario SET  
                              estado   =  'N'
                             WHERE
                            id_user='".$idusuario."'  ";



    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);
