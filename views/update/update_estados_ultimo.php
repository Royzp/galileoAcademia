<?php 



   include_once "../conexion_bd/config_conexion.php";

    $idusuario       = $_POST["id_document"];
    $monto           = $_POST["monto_cobrado"];
    $fecha_archivado = $_POST["fecha_archivado"];
    $resolucion      = $_POST["resolucion_archivado"];
    $informe         = $_POST["informe_devuelto"];
    $expediente      = $_POST["expediente_judicial"];
    $proceso         = $_POST["proceso_contencioso"];
    $revision        = $_POST["revision_judicial"];
      



    $fecha           = $_POST["fecha_edit"];
    $estado          = $_POST["estado_edit_ultimo"];

   

    $sql  =" UPDATE tb_documento SET 
 
         monto_cobrado               =  '". $monto ."' ,
         fecha_archivado             =  '". $fecha_archivado ."' ,
         resolucion_archivado        =  '". $resolucion ."' ,
         informe_devuelto            =  '". $informe."' ,
         expediente_judicial         =  '". $expediente ."' ,
         proceso_contencioso         =  '". $proceso ."' ,
         revision_judicial           =  '". $revision."' , 

         fecha_ultima_actualizacion  =  '". $fecha ."' ,
         ultimo_estado               =  '". $estado ."'
         

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