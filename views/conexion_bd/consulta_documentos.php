<?php
 
  $sql3 ='
    SELECT  d.*, a.nombre_user ,td.nombre_docum , ta.nombre_document ,te.nombre_estado  FROM  tb_documento as d   
    INNER JOIN tb_usuario as a  ON a.id_user = d.responsable  
    INNER JOIN tb_tipo_documento as td  on td.id_tip_docum = d.resolucion
    LEFT JOIN tb_tipo_documento_adjunto AS ta  ON ta.id_tip_docum_adj = d.documento_adjunto 
    INNER JOIN tb_tipo_estados AS te ON   te.id_tip_estado = d.ultimo_estado   
    ORDER BY  fecha_registro  DESC';
  
    $sentencia3= $pdo->prepare($sql3);
    $sentencia3-> execute();
    $resultado3 = $sentencia3-> fetchAll();     

?>