<?php 

    $sql= " SELECT e.*,te.nombre_tipo_egreso from tb_egreso as e
           INNER JOIN  tb_tipo_egreso AS te  ON  te.id_tipo_egreso = e.tipo_egreso_id
           WHERE status = 'Y' ";
    $sentencia = $pdo->prepare($sql);
    $sentencia-> execute();
    $resultado = $sentencia-> fetchAll();

?>