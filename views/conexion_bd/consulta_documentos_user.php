
<?php

$sql2 = 'SELECT  d.*, a.nombre_user,td.nombre_docum  FROM   tb_documento as d 

INNER JOIN tb_usuario as a ON a.id_user = d.responsable 

INNER JOIN tb_tipo_documento as td  on td.id_tip_docum = d.resolucion
         
         where d.responsable = '.$user_id;
    
$sentencia2 = $pdo->prepare($sql2);
$sentencia2-> execute();

$resultado2 = $sentencia2-> fetchAll(); 

?>