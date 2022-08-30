<?php


//$conexion = mysqli_connect('localhost', 'apiuser', 'DBApi...program', 'bdapp12');



 try{
     $conexion = new PDO('mysql:host=localhost;dbname=bdapp12','apiuser','DBApi...program');
     $sql ="SELECT  id_factor,factor_acum_uno,factor_acumu_dos,cuota_inicial FROM tb_factor_acumulado    ORDER BY id_factor DESC   LIMIT  1  ;";
     $stmt = $conexion->prepare($sql);
     $stmt ->execute();
     $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
     printf(json_encode($rows));

    }catch(PDOException $e){

        echo "!Error de conexion ¡ ".$e;
        exit;

 }





?>
