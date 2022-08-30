<?php


//include('conexion_nueva.php');

$con = new mysqli('localhost','apiuser','DBApi...program','bdapp12');
if ($con->connect_errno) {
    die('fail');

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $interes = $con->real_escape_string(htmlentities($_POST['interes_anual']));
    $fecha  = $con->real_escape_string(htmlentities($_POST['fecha_anual']));







    $ins = $con->query("INSERT INTO tb_interes_legal (interes_anual,
                                                   fecha_interes)


                                                VALUES ( '$interes',
                                                         '$fecha' )");




        echo 'success';
   
} else {
    echo 'fail';
}
