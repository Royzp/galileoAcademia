<?php


//include('conexion_nueva.php');

$con = new mysqli('localhost', 'root', '', 'bd_academia');
if ($con->connect_errno) {
    die('fail');
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $dni   = $con->real_escape_string(htmlentities($_POST['tx_dni']));
    $name  = $con->real_escape_string(htmlentities($_POST['tx_nombre']));
    $apell = $con->real_escape_string(htmlentities($_POST['tx_apellido']));
    $clave  = $con->real_escape_string(htmlentities($_POST['tx_contra']));
    $sede  = $con->real_escape_string(htmlentities($_POST['select_sede']));
    $tipo  = $con->real_escape_string(htmlentities($_POST['select_user']));
    $creado  = $con->real_escape_string(htmlentities($_POST['creado_por']));










    $con->query("INSERT INTO tb_usuario (numero_dni,
                                         nombre_user,
                                         apellido_user,
                                         clave_user,
                                         sede_user_id,
                                         tipo_user,
                                         estado,
                                         creado_por)

                                         VALUES ('$dni',
                                                 '$name',
                                                 '$apell',
                                                  MD5('$clave'),
                                                  '$sede',
                                                 '$tipo',
                                                 'Y',
                                                 '$creado')");



    echo 'success';
} else {
    echo 'ERROR CONEXION';
}
