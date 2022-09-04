<?php 

    if($_SESSION['tipoUser'] != 3){
        $sql= "SELECT r.*, s.nombre_sede, tc.tipo_concepto FROM tb_recibos as r 
        inner join tb_sede as s ON s.sede_id = r.sede_recibo_id
        left join tb_tipo_concepto as tc ON tc.tipo_concepto_id = r.tipo_concepto_id
        where r.status = 'Y'";
        $sentencia = $pdo->prepare($sql);
        $sentencia-> execute();
        $resultado = $sentencia-> fetchAll();   
    }else{
        $sql= "SELECT r.*, s.nombre_sede, tc.tipo_concepto FROM tb_recibos as r 
        inner join tb_sede as s ON s.sede_id = r.sede_recibo_id
        left join tb_tipo_concepto as tc ON tc.tipo_concepto_id = r.tipo_concepto_id
        where r.status = 'Y'  AND r.id_user = ".$_SESSION['idUser'];
        $sentencia = $pdo->prepare($sql);
        $sentencia-> execute();
        $resultado = $sentencia-> fetchAll();   
        
    }

?>