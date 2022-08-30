<?php


//include('conexion_nueva.php');

//$conexion=mysqli_connect('localhost','apiuser','DBApi...program','bdapp12');

$con = new mysqli('localhost','apiuser','DBApi...program','bdapp12');
if ($con->connect_errno) {
    die('fail');

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $factor_uno = $con->real_escape_string(htmlentities($_POST['txt_factor_uno']));
    $fecha_uno  = $con->real_escape_string(htmlentities($_POST['fecha_uno']));

    $factor_dos = $con->real_escape_string(htmlentities($_POST['factor_dos']));
    $fecha_dos  = $con->real_escape_string(htmlentities($_POST['fecha_dos']));
    $cuota      = $con->real_escape_string(htmlentities($_POST['cuota_inicial']));






    $ins = $con->query("INSERT INTO tb_factor_acumulado(factor_acum_uno,
                                                   fecha_registro_uno,
                                                   factor_acumu_dos,
                                                   fecha_registro_dos,
                                                   cuota_inicial)


                                                VALUES ( '$factor_uno',
                                                         '$fecha_uno',
                                                         '$factor_dos',
                                                         '$fecha_dos',
                                                          '$cuota')");




        echo 'success';
   
} else {
    echo 'fail';
}
