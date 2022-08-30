<?php 


$sql= "SELECT * from tb_proveedor WHERE estado ='Y' " ;

$sentencia = $pdo->prepare($sql);
$sentencia-> execute();
$resultado = $sentencia-> fetchAll();


?>