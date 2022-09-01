<?php 

    $sql= "SELECT r.*, s.nombre_sede, tc.tipo_concepto FROM tb_recibos as r 
    inner join tb_sede as s ON s.sede_id = r.sede_recibo_id
    inner join tb_tipo_concepto as tc ON tc.tipo_concepto_id = r.tipo_concepto_id
    where r.status = 'N'";
    $sentencia = $pdo->prepare($sql);
    $sentencia-> execute();
    $resultado = $sentencia-> fetchAll();

?>