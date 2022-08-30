<?php

$con = new mysqli('localhost', 'root', '', 'bd_ferreteria');
if ($con->connect_errno) {
    die('fail');
}

function file_name($string)
{

    // Tranformamos todo a minusculas

    $string = strtolower($string);

    //Rememplazamos caracteres especiales latinos

    $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

    $repl = array('a', 'e', 'i', 'o', 'u', 'n');

    $string = str_replace($find, $repl, $string);

    // Añadimos los guiones

    $find = array(' ', '&', '\r\n', '\n', '+');
    $string = str_replace($find, '-', $string);

    // Eliminamos y Reemplazamos otros carácteres especiales

    $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

    $repl = array('', '-', '');

    $string = preg_replace($find, $repl, $string);

    return $string;
}








if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $idusuario = $_GET['id_produc'];


    $nombre      = $con->real_escape_string(htmlentities($_POST['txt_nombre_producto']));
    $categoria   = $con->real_escape_string(htmlentities($_POST['txt_categoria_edit']));
    $lote      = $con->real_escape_string(htmlentities($_POST['txt_lote_edit']));
    $stockp        = $con->real_escape_string(htmlentities($_POST['txt_stock_edit'])); 
    $preciov    = $con->real_escape_string(htmlentities($_POST['txt_precio_edit']));
    $proveedor      = $con->real_escape_string(htmlentities($_POST['txt_proveedor_edit']));
    $marca       = $con->real_escape_string(htmlentities($_POST['txt_marca_edit']));
    $modelo      = $con->real_escape_string(htmlentities($_POST['txt_modelo_edit']));
    $unidad   = $con->real_escape_string(htmlentities($_POST['txt_unidad_edit']));

  



    $file_name = $_FILES['txt_foto_edit']['name'];

    $tipo = $_FILES['txt_foto_edit']['type'];
    $tamano = $_FILES['txt_foto_edit']['size'];


    $new_name_file = null;

    if ($file_name != '' || $file_name != null) {

        $file_type = $_FILES['txt_foto_edit']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'png') {
            $dir = 'imagen_producto/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['txt_foto_edit']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
            }
        }



        $ins = $con->query("UPDATE tb_producto SET   
        nombre_producto = '" . $nombre . "',
        categoria = '" . $categoria . "',
        lote = '" . $lote . "',
        stock = '" . $stockp . "',
        precio_venta = '" . $preciov . "',
        proveedor = '" . $proveedor . "',
        marca = '" . $marca . "',
        modelo = '" . $modelo . "',
        unidad_medida = '" . $unidad . "',


        foto_producto = '" . $new_name_file . "'


        WHERE id_producto='" . $idusuario . "'  ");


    } else {

        $ins = $con->query("UPDATE tb_producto SET  

        nombre_producto = '" . $nombre . "',
        categoria = '" . $categoria . "',
        lote = '" . $lote . "',
        stock = '" . $stockp . "',
        precio_venta = '" . $preciov . "',
        proveedor = '" . $proveedor . "',
        marca = '" . $marca . "',
        modelo = '" . $modelo . "',
        unidad_medida = '" . $unidad . "'
       


        WHERE id_producto='" . $idusuario . "'  ");
    }

    if ($ins === true) {

        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'ERROR CONEXION';
}
