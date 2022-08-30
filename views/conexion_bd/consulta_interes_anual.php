<?php


//$conexion = mysqli_connect('localhost', 'apiuser', 'DBApi...program', 'bdapp12');



 try{
     $conexion = new PDO('mysql:host=localhost;dbname=bdapp12','apiuser','DBApi...program');
     $sql ="SELECT  id_legal,interes_anual FROM tb_interes_legal  ORDER BY id_legal DESC   LIMIT  1   ;";
     $stmt = $conexion->prepare($sql);
     $stmt ->execute();
     $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
     printf(json_encode($rows));

    }catch(PDOException $e){

        echo "!Error de conexion ¡ ".$e;
        exit;

 }





?>
