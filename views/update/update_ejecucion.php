<?php 

//session_start();

  //   if (empty($_SESSION['active'])) 
    //  {
      
      // header('location: index.php');

      //}


   include_once "../conexion_bd/config_conexion.php";



    $idusuario          = $_POST["id_document"];
    $resolucion         = $_POST["resolucion"];
    $fecha_emision      = $_POST["fecha_emision"];
    $fecha_notificacion = $_POST["fecha_notificacion"];


  


   

    $sql  =" UPDATE tb_documento SET  
         
         resolucion_ejecucion  =  '". $resolucion ."' ,
         fecha_emision         =  '". $fecha_emision ."',
         fecha_notificacion    =  '". $fecha_notificacion ."'

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