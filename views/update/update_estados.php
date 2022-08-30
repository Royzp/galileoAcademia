<?php 

    $conexion=mysqli_connect('localhost','apiuser','DBApi...program','bdapp12');
   mysqli_query($conexion,"set names utf8");

   /*include_once "../conexion_bd/config_conexion.php";*/



    $idusuario =$_POST["id_docum"];
    $estado    =$_POST["ultimo_estad"];
    


  


   

    $sql  =" UPDATE tb_documento SET  
         
         ultimo_estado  =  '". $estado ."'

        WHERE

        id_document='".$idusuario."'  ";

  
   // $conexion=mysqli_connect('localhost','root','','bd_coactiva');
   //mysqli_query($conexion,"set names utf8");


    if(mysqli_query($conexion, $sql)){
 
        echo "1";
    } else {
        echo "0";
    }
    // Cierra la conexion
    mysqli_close($conexion);

 ?>