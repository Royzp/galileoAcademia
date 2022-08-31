<?php 


$conexion=mysqli_connect('localhost','root','','bd_academia');
mysqli_query($conexion,"set names utf8");

    $idusuario   = $_POST["id_matricula"];
    $estado      = $_POST["status_eliminar"];
    

    $sql  =" UPDATE tb_matricula SET  
                              estate  =  'N'

                             WHERE

                            matricula_id='".$idusuario."'  ";



    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);
