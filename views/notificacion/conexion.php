<?php
	
    $conn = new mysqli("localhost","apiuser","DBApi...program","bdapp12");
    //session_start();

	$user_id = $_SESSION['idUser'];

    $count = 0;
    //$sql2 = "SELECT * FROM tb_notificaciones WHERE estado_notifica = 0";

    /*$sql2='SELECT *
	FROM tb_documento  AS d
	INNER JOIN tb_usuario AS u ON u.id_user = d.responsable
	INNER JOIN tb_tipo_documento as td  on td.id_tip_docum = d.resolucion
	where  fecha_ultima_actualizacion <= date_add(NOW(), INTERVAL -7 DAY) and u.id_user =  '.$user_id ; */




    $sql2 ='SELECT 
    d.*,
    tda.notif_tiempo,
    tda.notif_habilitar
    FROM tb_documento  AS d
    INNER JOIN tb_usuario AS u ON u.id_user = d.responsable
    INNER JOIN tb_tipo_documento AS td  on td.id_tip_docum = d.resolucion
    INNER JOIN tb_tipo_documento_adjunto AS tda  on tda.id_tip_docum_adj = d.documento_adjunto
     
    where  fecha_ultima_actualizacion <= date_add(NOW(), INTERVAL -tda.notif_tiempo DAY) 
    and d.ultimo_estado !=7 and tda.notif_habilitar=1 and u.id_user ='.$user_id ;

    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
