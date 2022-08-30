<?php


include('conexion_nueva.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $responsable = $con->real_escape_string(htmlentities($_POST['txt_respon']));
    $resolucion  = $con->real_escape_string(htmlentities($_POST['txt_tipDocumento']));

    $ruc           = $con->real_escape_string(htmlentities($_POST['txt_ruc']));
    $razon         = $con->real_escape_string(htmlentities($_POST['txt_razonSocial']));
    $fecha_ingreso = $con->real_escape_string(htmlentities($_POST['txt_fecha_ingreso']));


    $expediente  = $con->real_escape_string(htmlentities($_POST['txt_expediente']));
    $multa       = $con->real_escape_string(htmlentities($_POST['txt_importeMonto']));
    $estado      = $con->real_escape_string(htmlentities($_POST['txt_estado']));

    $documento   = $con->real_escape_string(htmlentities($_POST['txt_doc_Adj']));
    $condicion   = $con->real_escape_string(htmlentities($_POST['txt_cond_exp']));
    $folio       = $con->real_escape_string(htmlentities($_POST['txt_num_folio']));



    $file_name = $_FILES['archivo']['name'];

    $new_name_file = null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['archivo']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'pdf') {
             $dir = 'archivos/';
             //$dir = 'archivos/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
               
            }
            $file_tmp_name = $_FILES['archivo']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;

          /*   if (file_exists($file_tmp_name)) {
               $fp = fopen($file_tmp_name,$new_name_file); 
            }*/

           if (!copy($file_tmp_name, $new_name_file)) {
                
            } 
        }
    }

    $ins = $con->query("INSERT INTO tb_documento (responsable,
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


                                                VALUES ( '$responsable',
                                                         '$resolucion',
                                                                 '$ruc',
                                                               '$razon',
                                                       '$fecha_ingreso',
                                                          '$expediente',
                                                               '$multa',
                                                              '$estado',
                                                                  now(),
                                                              '$estado',
                                                           '$documento',
                                                           '$condicion',
                                                               '$folio',
                                                        '$new_name_file')");

  



    if ($ins === true) {
         $last_id = $con->insert_id;

           $sql2 ="INSERT INTO tb_estados(id_document,
                                            estado,
                                            fecha)

                 VALUES('$last_id','$estado',now())";  


               $con->query($sql2);


        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'fail';
}
