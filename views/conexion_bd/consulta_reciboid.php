<?php



$recibo_id = $_POST['recibo_id'];

 try{
     $conexion = new PDO('mysql:host=localhost;dbname=bd_academia','root','');
     $sql ="SELECT r.* , s.nombre_sede FROM tb_recibos as r 
     INNER JOIN tb_sede as s ON s.sede_id = r.sede_recibo_id
     WHERE  r.recibo_id = '$recibo_id'";
     $stmt = $conexion->prepare($sql);
     $stmt ->execute();
     $recibo = $stmt->fetchAll();

     $sql ="SELECT * FROM tb_detalle_recibo WHERE  recibo_id = '$recibo_id'";
     $stmt = $conexion->prepare($sql);
     $stmt ->execute();
     $detalle = $stmt->fetchAll(\PDO::FETCH_OBJ);

     $result = array(
        'recibo' =>  $recibo,
        'detalle' =>  $detalle
     );

    echo  json_encode($result);





    }catch(PDOException $e){

        echo "!Error de conexion ¡ ".$e;
        exit;

 }





?>
