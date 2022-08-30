<?php 

    $sql= "SELECT c.*, tc.tipo_concepto from tb_concepto as c
    inner join tb_tipo_concepto as tc ON tc.tipo_concepto_id = c.tipo_concepto_id";
    $sentencia = $pdo->prepare($sql);
    $sentencia-> execute();
    $resultado = $sentencia-> fetchAll();

?>