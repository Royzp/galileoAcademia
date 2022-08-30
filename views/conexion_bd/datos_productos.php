<?php 

    $sql= " SELECT pr.*,p.razon_social,ca.nombre_categoria FROM tb_producto AS pr         
    LEFT  JOIN  tb_proveedor AS  p  ON p.id_proveedor = pr.proveedor
    LEFT  JOIN  tb_categoria AS  ca ON ca.id_categoria = pr.categoria 
    WHERE  estate = 'Y' ";

    $sentencia = $pdo->prepare($sql);
    $sentencia-> execute();
    $resultado = $sentencia-> fetchAll();


?>