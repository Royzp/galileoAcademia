<?php 


$sql= ' SELECT * from tb_documento  as d where   d.fecha_ingreso <= date_add(NOW(), INTERVAL -7 DAY)';

$sentencia = $pdo->prepare($sql);
$sentencia-> execute();
$resultado = $sentencia-> fetchAll();


?>