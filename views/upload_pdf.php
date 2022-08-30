<?php

include('conexion_nueva.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //$idusuario = $con->real_escape_string(htmlentities($_POST['id_pdf_update'])); 
    $idusuario = $_GET['id_doc'];

    //$idusuario =$_POST["id_docum"];
    $file_name = $_FILES['actualizar_nuevo_pdf']['name'];
    $new_name_file = null;

    if ($file_name != '' || $file_name != null) {
        $file_type = $_FILES['actualizar_nuevo_pdf']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'pdf') {
            $dir = 'archivos_pdf/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['actualizar_nuevo_pdf']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (!copy($file_tmp_name, $new_name_file)) {                
            }
        }
    }

    $ins = $con->query("UPDATE tb_documento SET nuevo_pdf = '". $new_name_file ."' 
                         WHERE id_document='".$idusuario."'  "); 
  
    if ($ins === true) {
             //$last_id = $con->insert_id;
             $sql2 ="INSERT INTO tb_historial_pdf(id_documento, nombre_pdf ) VALUES('$idusuario','$new_name_file')"; 
             $con->query($sql2);
        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'fail';
}
