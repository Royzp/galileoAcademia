<?php

$con = new mysqli('localhost', 'root', '', 'bd_academia');
if ($con->connect_errno) {
    die('fail');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $tipo_egreso            = $con->real_escape_string(htmlentities($_POST['tipo_egreso_id']));
    $monto                  = $con->real_escape_string(htmlentities($_POST['monto_egreso']));
    $fecha                  = $con->real_escape_string(htmlentities($_POST['fecha_pago']));
    $descripcion_egreso     = $con->real_escape_string(htmlentities($_POST['descripcion_egreso']));
    $tipo_comprobante_id    = $con->real_escape_string(htmlentities($_POST['tipo_comprobante_id']));
    $numero_comprobante     = $con->real_escape_string(htmlentities($_POST['numero_comprobante']));
    
    $creado      = $con->real_escape_string(htmlentities($_POST['creado_por']));

    $con->query("INSERT INTO tb_egreso ( tipo_egreso_id,
                                           monto_egreso,
                                             fecha_pago,
                                             descripcion,
                                             tipo_comprobante_id,
                                             numero_comprobante,
                                                 status,
                                              creado_por)

                                                            VALUES (  '$tipo_egreso',
                                                                    '$monto',
                                                                    '$fecha',
                                                                    '$descripcion_egreso',
                                                                    '$tipo_comprobante_id',
                                                                    '$numero_comprobante',
                                                                    'Y',
                                                                         '$creado')");



    echo 'success';
} else {
    echo 'ERROR CONEXION';
}
