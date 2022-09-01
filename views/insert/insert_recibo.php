<?php

$con = new mysqli('localhost', 'root', '', 'bd_academia');
if ($con->connect_errno) {
    die('fail');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $fecha_sistem = date("Y-m-d h:i:sa");
    
    // 
    $sede_recibo_id  = $_POST['sede_recibo_id'];
    $monto_total  = $_POST['monto_total'];
    $responsable  = $_POST['responsable'];   
    $status = "Y";//  desde donde esta asignado el usuario
    $created_by  = $_POST['created_by'];
    $items  = $_POST['items'];

    $sql_ins_recibo = "INSERT INTO tb_recibos ( sede_recibo_id,
                                                monto_total,
                                                responsable,
                                                status,
                                                created_by,
                                                created_date )
                                            VALUES ( '$sede_recibo_id',
                                                    '$monto_total',
                                                    '$responsable',
                                                    '$status',
                                                    '$created_by',
                                                    '$fecha_sistem')";       
    if ($con->query($sql_ins_recibo) === true) {
        $recibo_id = $con->insert_id;
        // print_r($recibo_id);
    } else { echo '0'; }

    foreach ($items as $clave ) {
   
        $concepto_id        = $clave['concepto_id'];
        $descripcion        = $clave['nombre_producto'];
        $precio_unitario    = $clave['precio_producto'];
        $unidades           = $clave['cantidad_producto'];
        $total              = $clave['total_venta'];

        $sql_ins_detalle = "INSERT INTO tb_detalle_recibo ( recibo_id,
                                                            concepto_id,
                                                            descripcion,
                                                            precio_unitario,
                                                            unidades,
                                                            total)
                                            VALUES ( '$recibo_id',
                                                    '$concepto_id',
                                                    '$descripcion',
                                                    '$precio_unitario',
                                                    '$unidades',
                                                    '$total')";       
        if ($con->query($sql_ins_detalle) === true) {
            $detalle_id = $con->insert_id;
        }else{
            echo "error";
        }
        
    }


    echo $recibo_id;

} else {
    echo 'fail';
}