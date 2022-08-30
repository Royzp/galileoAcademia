<?php

include_once "../conexion_bd/config_conexion.php";

$nombre  = "";

if (isset($_POST['REGISTRAR'])) {
    $nombre  = $_FILES['archivo']['name'];
    $tipo    = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta    = $_FILES['archivo']['tmp_name'];
    $destino = "./arc/".$nombre;

    if ($nombre != ""){
          
        if(copy($ruta, $destino)){

            $titulo  = "asd";
            $descrip = "qweqweq";
            

           $sql5= "INSERT INTO tb_archivos (titulo,descripcion,tamanio_archivo,tipo_archivo,nombre_archivo) 
                      VALUES ('2','2','2','2','2')";
          
          mysqli_query($conexion,$sql5);
            
           echo " REGISTRO EXITOSO ... ";

         }else{

               echo "Error" ;

            }

        }
}

  $a=$_POST['txt_responsable'];
  $b=$_POST['txt_resolucion'];
  $c=$_POST['txt_ruc'];
  $d=$_POST['txt_razon_social'];
  $k=$_POST['txt_fecha_ingreso'];
  $e=$_POST['txt_expediente'];
  $f=$_POST['txt_monto_multa'];
  $g=$_POST['txt_estado_doc'];

  $h=$_POST['txt_documentoAdj'];
  $i=$_POST['txt_condicExp'];
  $j=$_POST['txt_numFolios'];


      
      $sql = " INSERT INTO tb_documento (responsable,
                                         resolucion,
                                         ruc,
                                         razon_social,
                                         fecha_registro,
                                         expediente,
                                         monto_multa,
                                         estado,
                                         fecha_ultima_actualizacion,
                                         ultimo_estado,
                                         documento_adjunto,
                                         condicion_expediente,
                                         numero_folios, 
                                         nombre_archivo)
                VALUES ('$a','$b','$c','$d','$k',$e','$f','$g',now(),'$g','$h','$i','$j','$nombre')";
    
        if ($conexion->query($sql)=== true) {


            $last_id = $conexion->insert_id;

          

      $sql2 ="INSERT INTO tb_estados(id_document,
                                            estado,
                                            fecha)

                 VALUES('$last_id','$g',now())";  


           $x=mysqli_query($conexion,$sql2);


           if ($x == 1) {
              echo "1";
          }else{
            echo "Error a Insertar nuevo Registro : <br/> ";
          }          







        }else{

          echo "Error:" .$sql. "<br>".$conexion->error;
        }
?>