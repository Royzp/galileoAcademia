<?php


    $sql7='SELECT 
    d.*,
    tda.notif_tiempo,
    tda.notif_habilitar,
    u.nombre_user,
    td.nombre_docum,
    tda.nombre_document,
    te.nombre_estado
    FROM tb_documento  AS d
    INNER JOIN tb_usuario AS u ON u.id_user = d.responsable
    INNER JOIN tb_tipo_documento AS td  on td.id_tip_docum = d.resolucion
    INNER JOIN tb_tipo_documento_adjunto AS tda  on tda.id_tip_docum_adj = d.documento_adjunto
    INNER JOIN tb_tipo_estados AS te ON   te.id_tip_estado = d.ultimo_estado  

     
    where  fecha_ultima_actualizacion <= date_add(NOW(), INTERVAL -tda.notif_tiempo DAY) 
    and d.ultimo_estado !=4 and tda.notif_habilitar=1 ';

    $sentencia7 = $pdo->prepare($sql7);
    $sentencia7-> execute();
    $resultado7= $sentencia7-> fetchAll();


  


?>