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


    $nombre      = $con->real_escape_string(htmlentities($_POST['nombre_cliente']));
    $apellip    = $con->real_escape_string(htmlentities($_POST['apellido_paterno']));
    $apellim    = $con->real_escape_string(htmlentities($_POST['apellido_materno']));

    $dni        = $con->real_escape_string(htmlentities($_POST['numero_dni']));
    $ruc      = $con->real_escape_string(htmlentities($_POST['numero_ruc']));
    $razon   = $con->real_escape_string(htmlentities($_POST['razon_social_clie']));

    $direccion       = $con->real_escape_string(htmlentities($_POST['direccion_cliente']));
    $celular      = $con->real_escape_string(htmlentities($_POST['celular_cliente']));
    $genero     = $con->real_escape_string(htmlentities($_POST['genero_cliente']));
    $creado     = $con->real_escape_string(htmlentities($_POST['creado_por']));





    $con->query("INSERT INTO tb_cliente ( nombre_cliente,
                                                  apellido_paterno,
                                                  apellido_materno,
                                                  numero_dni,
                                                  ruc,
                                                  razon_social,
                                                  direccion,
                                                  celular,
                                                  genero,
                                                  estad,
                                                  creado_por)

                                                            VALUES (  '$nombre',
                                                                    '$apellip',
                                                                    '$apellim',
                                                                         '$dni',
                                                                       '$ruc',
                                                                    '$razon',
                                                                       '$direccion',
                                                                       '$celular',
                                                                       '$genero',
                                                                       'Y',
                                                                       '$creado')");



    echo 'success';
} else {
    echo 'ERROR CONEXION';
}
