<?php


include_once "../conexion_bd/config_conexion.php";



$id_egreso           = $_POST["egreso_id"];

$tipo_ingreso        = $_POST["tipo_ingreso_id"];
$comprobante         = $_POST["tipo_comprobante"];
$numero_comprobante  = $_POST["numero_comprobante"];
$descripcion         = $_POST["descripcion"];
$monto               = $_POST["monto"];
$fecha               = $_POST["fecha"];




$sql  = " UPDATE tb_egreso  SET  
         
         
         tipo_egreso_id =  '" . $tipo_ingreso . "',
         tipo_comprobante_id   =  '" . $comprobante . "',
         numero_comprobante   =  '" . $numero_comprobante . "',
         descripcion   =  '" . $descripcion . "',
         monto_egreso   =  '" . $monto . "',
         fecha_pago  =  '" . $fecha . "'

        WHERE

        id_egreso='" . $id_egreso . "'  ";



if (mysqli_query($conexion, $sql)) {

    echo "1";
} else {
    echo "0";
}
// Cierra la conexion
mysqli_close($conexion);
