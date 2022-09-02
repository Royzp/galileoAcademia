<?php

$con = new mysqli('localhost', 'root', '', 'bd_academia');
if ($con->connect_errno) {
    die('fail');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $tipo_egreso = $con->real_escape_string(htmlentities($_POST['tipo_egreso_id']));
    $monto       = $con->real_escape_string(htmlentities($_POST['monto_egreso']));
    $fecha       = $con->real_escape_string(htmlentities($_POST['fecha_pago']));
    $otro      = $con->real_escape_string(htmlentities($_POST['monto_egreso_otro']));

    
    $creado      = $con->real_escape_string(htmlentities($_POST['creado_por']));



    $con->query("INSERT INTO tb_egreso ( tipo_egreso_id,
                                           monto_egreso,
                                             fecha_pago,
                                             descripcion,
                                                 status,
                                              creado_por)

                                                            VALUES (  '$tipo_egreso',
                                                                    '$monto',
                                                                    '$fecha',
                                                                    '$otro',
                                                                    'Y',
                                                                         '$creado')");



    echo 'success';
} else {
    echo 'ERROR CONEXION';
}
