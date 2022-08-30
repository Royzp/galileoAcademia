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

    $idusuario   = $_GET['id_pro'];
    $nombre      = $_GET['nombre_producto'];
    $precio_actl = $_GET['precio'];
    $stockk      = $_GET['stockk'];
    $creadooo    = $_GET['creadoo_porr'];

    
    

    $precio     = $con->real_escape_string(htmlentities($_POST['precio_producto_venta']));
    $stock       = $con->real_escape_string(htmlentities($_POST['stock_producto_nv']));

    // $nombre    = $con->real_escape_string(htmlentities($_POST['nombre_prod_stock']));






    $ins = $con->query("UPDATE tb_producto SET   

        precio_venta = '" . $precio . "',
        stock = '" . $stock . "'


        WHERE id_producto='" . $idusuario . "'  ");


    if ($ins == true) {

        $con->query("INSERT INTO tb_entradas ( 
                nombre_producto,
                codigo_producto,
                precio_producto,
                stock_actualizado,
                creado_por,
           
            statuss)

                      VALUES (
                              '$nombre',
                              '$idusuario',
                              '$precio_actl',
                              '$stockk',
                              '$creadooo',
                               'Y')");



        echo 'success';
    } else {
    }
} else {
    echo 'ERROR CONEXION';
}
