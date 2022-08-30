<?php
$conn = new mysqli("localhost","apiuser","DBApi...program","bdapp12");

/*$sql = "UPDATE tb_notificaciones SET estado_notifica = 1 WHERE estado_notifica = 0";	
$result = mysqli_query($conn, $sql);*/

session_start();

$user_id = $_SESSION['idUser'];


 /*$sql='SELECT *
FROM tb_documento  AS d
INNER JOIN tb_usuario AS u ON u.id_user = d.responsable
INNER JOIN tb_tipo_documento as td  on td.id_tip_docum = d.resolucion
where  fecha_ultima_actualizacion <= date_add(NOW(), INTERVAL -7 DAY) and u.id_user =  '.$user_id ; */



 $sql ='SELECT 
        d.*,tda.notif_tiempo ,tda.notif_habilitar,u.nombre_user ,td.nombre_docum,tda.nombre_document
       FROM tb_documento  AS d
       INNER JOIN tb_usuario AS u ON u.id_user = d.responsable
       INNER JOIN tb_tipo_documento AS td  on td.id_tip_docum = d.resolucion
       INNER JOIN tb_tipo_documento_adjunto AS tda  on tda.id_tip_docum_adj = d.documento_adjunto
     
       where  fecha_ultima_actualizacion <= date_add(NOW(), INTERVAL -tda.notif_tiempo DAY)
            and d.ultimo_estado !=7    and tda.notif_habilitar=1    and u.id_user ='.$user_id;

                    

$result = mysqli_query($conn, $sql);

$response='';

while($row=mysqli_fetch_array($result)) {

	
	/* Formate fecha */
	$fechaOriginal = $row["fecha_ultima_actualizacion"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item notification_". $row["id_document"] . "' style='text-align: center;'>" .
	"<div class='notification-subject' align='center'>". $row["nombre_user"] . " - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment' align='center'>" . $row["nombre_docum"]  . "</div> " .
	"<div class='notification-comment' align='center'> Nº EXPEDIENTE : " . $row["expediente"]  . "</div> " .
    "<div class='notification-comment' align='center'> " . $row["nombre_document"]  . "</div> " .

	"<br><button class='btn btn-danger btnEditar9' align='center' 
	                            type='button' 
                                data-toggle='modal'
                                data-target='#exampleModal9'
                                        data-id='".  $row['id_document'] ."' 
                                    
                                    data-nombre='".  $row['nombre_user'] ."' 
                                     data-docum='".  $row['nombre_docum'] ."' 
                                       data-ruc='".  $row['ruc'] ."' 
                                     data-razon='".  $row['razon_social'] ."'
                                     data-monto='".  $row['monto_multa'] ."'
                                     data-exped='".  $row['expediente'] ."'
                               data-resoluc_eje='".  $row['resolucion_ejecucion'] ."'
                                 data-ultm-fecha='".$row['fecha_ultima_actualizacion']."'
                                    data-estado='".  $row['ultimo_estado'] ."' >

                                Ver Notificacion

                                 


                                </button>
                                  <br>
                                </div><hr style='color:#5D5B5B';background: #A62121 ;>";
}
if(!empty($response)) {
	print $response;
}


?>

<!-- jQuery -->
<script src="../views/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>