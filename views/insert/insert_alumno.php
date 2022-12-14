<?php

$con = new mysqli('localhost', 'root', '', 'bd_academia');
if ($con->connect_errno) {
    die('fail');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $creado_por_nombre = $con->real_escape_string(htmlentities($_POST['creado_por_nombre']));
    $creado_por_apellido = $con->real_escape_string(htmlentities($_POST['creado_por_apellido']));
    //
    $created_by = $creado_por_nombre.' '.$creado_por_apellido;
    $id_user = $con->real_escape_string(htmlentities($_POST['id_user']));
    $sede_user_id = $con->real_escape_string(htmlentities($_POST['sede_id']));

    // datos de la persona
    $tipo_documento  = $con->real_escape_string(htmlentities($_POST['tipo_documento']));
    $numero_documento = $con->real_escape_string(htmlentities($_POST['numero_dni_alumno']));
    $nombre_alumno   = $con->real_escape_string(htmlentities($_POST['nombre_alumno']));
    $apellido_alumno = $con->real_escape_string(htmlentities($_POST['apellido_alumno']));
    $numero_alumno   = $con->real_escape_string(htmlentities($_POST['numero_cel_alumno']));
    $colegio_proced  = $con->real_escape_string(htmlentities($_POST['colegio_procedencia']));
    $culmino_estudio = $con->real_escape_string(htmlentities($_POST['culmino_estudios']));

    // datos de la matricula
    $carrera_alumno         = $con->real_escape_string(htmlentities($_POST['carrera_alumno']));
    $turno_alumno           = $con->real_escape_string(htmlentities($_POST['turno_alumno']));
    $direcc_alumno          = $con->real_escape_string(htmlentities($_POST['direcc_alumno']));
    // $sede                   = $con->real_escape_string(htmlentities($_POST['sede_matricula']));
    $modalidad              = $con->real_escape_string(htmlentities($_POST['modalidad_academia']));
    $ciclo_id               = $con->real_escape_string(htmlentities($_POST['ciclo_id']));
    $periodo_id             = $con->real_escape_string(htmlentities($_POST['periodo_id']));
    $nombre_apoderado         = $con->real_escape_string(htmlentities($_POST['nombre_apoderado']));
    $telef_apoderado        = $con->real_escape_string(htmlentities($_POST['telefono_apoderado']));
    $dni_apoderado          = $con->real_escape_string(htmlentities($_POST['dni_apoderado']));
    $direc_apoderado        = $con->real_escape_string(htmlentities($_POST['direccion_apoderado']));
    $tipo_pago_matricula    = $con->real_escape_string(htmlentities($_POST['tipo_pago_matricula']));
    $promo_academia         = $con->real_escape_string(htmlentities($_POST['promocion_academia']));

    $monto_total            = $con->real_escape_string(htmlentities($_POST['monto_total']));

    // DATOS DE LAS CUOTAS DE PAGO
    $tipo_pago_matricula           = $con->real_escape_string(htmlentities($_POST['tipo_pago_matricula']));
    $numero_cuotas           = $con->real_escape_string(htmlentities($_POST['numero_cuotas']));
    $primer_pago           = $con->real_escape_string(htmlentities($_POST['primer_pago']));

    $segunda_cuota          = $con->real_escape_string(htmlentities($_POST['segunda_cuota']));
    $fecha_segunda          = $con->real_escape_string(htmlentities($_POST['fecha_segunda_cuota']));

    $tercera_cuota          = $con->real_escape_string(htmlentities($_POST['tercera_cuota']));
    $fecha_tercera          = $con->real_escape_string(htmlentities($_POST['fecha_tercera_cuota']));

    $timestamp = new DateTime(null, new DateTimeZone('America/Lima'));
    $fecha_sistem = $timestamp->format('Y-m-d H:i:s');    

    // 1.- BUSCAR PERSONA POR NUMERO DE DOCUMENTO
    $existe_persona = $con->query("SELECT * FROM tb_persona AS p WHERE p.numero_documento = '$numero_documento' ");
    // 2.- VALIDAR SI EXISTE LA PERSONA
    if (mysqli_num_rows($existe_persona) == 0) {
        // print_r("PERSONA NO EXISTE Y SE INSERTA");
        $sql_ins_persona = "INSERT INTO tb_persona( tipo_documento_id,
                                                    numero_documento,
                                                    nombre,
                                                    apellidos,
                                                    celular_1,
                                                    colegio_porcedencia ,
                                                    tipo_colegio,
                                                    ano_egreso)
        VALUES ( '$tipo_documento',
                '$numero_documento',
                '$nombre_alumno',
                '$apellido_alumno',
                '$numero_alumno',
                '$colegio_proced',
                '1',
                 '$culmino_estudio')";
        // echo 'success';
        //  GET  ID PERSONA QUE SE AGREGO
        if ($con->query($sql_ins_persona) === true) {
            $persona_id = $con->insert_id;
            // print_r($persona_id);
        } else {
            echo 'error';
        }
    } else {
        // print_r("PERSONA YA SE ENCUNETRA REGISTRADA");
        $row = mysqli_fetch_row($existe_persona);
        $persona_id = $row[0];
        // echo $row[0];
    }

    if ($tipo_pago_matricula == 1){
        $condicion = "PAGADO";
    }else{
        $condicion = "PENDIENTE";
    }
    // 3.- REGISTRAR MATRICULA
    $ins_matricula = $con->query("INSERT INTO tb_matricula( 
                                                            persona_id,
                                                            carrera,
                                                            turno,
                                                            modalidad_id,
                                                            ciclo_id,
                                                            periodo_id,
                                                            nombres_apoderado,
                                                            numero_documento_apoderado,
                                                            telefono,
                                                            direccion,
                                                            tipo_pago_matricula,
                                                            medio_informacion_id,
                                                            condicion,
                                                            sede_id,
                                                            id_user,
                                                            estate,
                                                            created_by,
                                                            created_date )
                                                VALUES (
                                                        '$persona_id',
                                                        '$carrera_alumno',
                                                        '$turno_alumno',
                                                        '$modalidad ',
                                                        '$ciclo_id ',
                                                        '$periodo_id',
                                                        '$nombre_apoderado',
                                                        '$dni_apoderado',
                                                        '$telef_apoderado',
                                                        '$direc_apoderado',
                                                        '$tipo_pago_matricula',
                                                        '$promo_academia',
                                                        '$condicion',
                                                        '$sede_user_id',
                                                        '$id_user',
                                                        'Y',
                                                        '$created_by',
                                                        '$fecha_sistem')");
    // echo 'success';
    if ($ins_matricula == true) {
        $matricula_id = $con->insert_id;
    }
    //  REGISTRA  RECIBO Y CUOTAS    
    //  valor  0  es  fraccionado
    if ($tipo_pago_matricula == 1) {
        //  REGISTRO DE RECIBO
        $ins_recibo = $con->query("INSERT INTO tb_recibos( 
                                                            sede_recibo_id,
                                                            tipo_concepto_id,
                                                            monto_total,
                                                            descripcion,
                                                            id_user,
                                                            responsable,
                                                            status,
                                                            created_by,
                                                            created_date
                                                            )
                                                            VALUES (
                                                                    '$sede_user_id',
                                                                    '1',
                                                                    '$primer_pago',
                                                                    '',
                                                                    '$id_user',
                                                                    '$nombre_apoderado',
                                                                    'Y',
                                                                    '$created_by',
                                                                    '$fecha_sistem')");
            // echo 'success';
            if ($ins_recibo == true) {
            $recibo_cuota_unica_id = $con->insert_id;
            }

        // DETALLE  RECIBO
        $ins_detalle_recibo = $con->query("INSERT INTO tb_detalle_recibo( 
                                                            recibo_id,
                                                            concepto_id,
                                                            descripcion,
                                                            precio_unitario,
                                                            unidades,
                                                            total)
                                                            VALUES (
                                                                    '$recibo_cuota_unica_id',
                                                                    '1',
                                                                    'PAGO TOTAL DE MATRICULA',
                                                                    '$primer_pago',
                                                                    '1',
                                                                    '$primer_pago')");
            // echo 'success';
            if ($ins_detalle_recibo == true) {
            $detalle_recibo_id = $con->insert_id;
            // print_r("Detalle Recibo _id:");
            // print_r($detalle_recibo_id);
            }

        //  REGISTRO DE CUOTA

        $ins_cuota_unica = $con->query("INSERT INTO tb_cuotas_pendientes( 
                                                             
                                                                matricula_id,
                                                                numero_cuota,
                                                                total_cuotas,
                                                                monto_cuota,

                                                                estado_cuota,

                                                                fecha_pago,
                                                                fecha_programada,
                                                                comprobante_pago_id,
                                                                status,
                                                                created_by,
                                                                created_date
                                                                )
                                                                VALUES (

                                                                        '$matricula_id',
                                                                        '1',
                                                                        '$numero_cuotas',
                                                                        '$primer_pago', 

                                                                        'CANCELADO',

                                                                        '$fecha_sistem',
                                                                        '$fecha_sistem',
                                                                        '$recibo_cuota_unica_id',
                                                                        'Y',
                                                                        '$created_by',
                                                                        '$fecha_sistem'
                                                                        )");

        // echo 'success';
        if ($ins_cuota_unica == true) {
            $cuota_unica_id = $con->insert_id;
        }else{

        }
    }

    if ($tipo_pago_matricula == 0 && $numero_cuotas == 2) {
        
    //  REGISTRO DE RECIBO
        $ins_recibo = $con->query("INSERT INTO tb_recibos( 
                                                            sede_recibo_id,
                                                            tipo_concepto_id,
                                                            monto_total,
                                                            id_user,
                                                            responsable,
                                                            status,
                                                            created_by,
                                                            created_date
                                                            )
                                                            VALUES (
                                                                    '$sede_user_id',
                                                                    '1',
                                                                    '$primer_pago',
                                                                    '$id_user',
                                                                    '$nombre_apoderado',
                                                                    'Y',
                                                                    '$created_by',
                                                                    '$fecha_sistem')");
            // echo 'success';
            if ($ins_recibo == true) {
            $recibo_primera_cuota_id = $con->insert_id;
            // print_r("Id de primera cuota:");
            // print_r($recibo_primera_cuota_id);
            }

        // DETALLE  RECIBO
        $ins_detalle_recibo = $con->query("INSERT INTO tb_detalle_recibo( 
                                                            recibo_id,
                                                            concepto_id,
                                                            descripcion,
                                                            precio_unitario,
                                                            unidades,
                                                            total)
                                                            VALUES (
                                                                    '$recibo_primera_cuota_id',
                                                                    '2',
                                                                    'MATRICULA PRIMERA CUOTA',
                                                                    '$primer_pago',
                                                                    '1',
                                                                    '$primer_pago')");
            // echo 'success';
            if ($ins_detalle_recibo == true) {
            $detalle_recibo_id = $con->insert_id;
            // print_r("Detalle Recibo _id:");
            // print_r($detalle_recibo_id);
            }

        //  REGISTRO DE PRIMERA CUOTA
        $ins_primera_cuota = $con->query("INSERT INTO tb_cuotas_pendientes( 
                                                                matricula_id,
                                                                numero_cuota,
                                                                total_cuotas,
                                                                monto_cuota,
                                                                estado_cuota,
                                                                fecha_pago,
                                                                fecha_programada,
                                                                comprobante_pago_id,
                                                                status,
                                                                created_by,
                                                                created_date
                                                                )
                                                                VALUES (
                                                                        '$matricula_id',
                                                                        '1',
                                                                        '$numero_cuotas',
                                                                        '$primer_pago',
                                                                        'CANCELADO',
                                                                        '$fecha_sistem',
                                                                        '$fecha_sistem',
                                                                        '$recibo_primera_cuota_id',
                                                                        'Y',
                                                                        '$created_by',
                                                                        '$fecha_sistem'
                                                                        )");
        // echo 'success';
        if ($ins_primera_cuota == true) {
            $primera_cuota_id = $con->insert_id;
            // print_r("Id de la unica cuota:");
            // print_r($primera_cuota_id);
        }
        //  REGISTRO DE SEGUNDA CUOTA
        $ins_segunda_cuota = $con->query("INSERT INTO tb_cuotas_pendientes( 
            matricula_id,
            numero_cuota,
            total_cuotas,
            monto_cuota,
            estado_cuota,
            fecha_programada,            
            status,
            created_by,
            created_date
            )
            VALUES (
                    '$matricula_id',
                    '2',
                    '$numero_cuotas',
                    '$segunda_cuota',
                    'PENDIENTE',
                    '$fecha_segunda',
                    'Y',
                    '$created_by',
                    '$fecha_sistem'
                    )");
        // echo 'success';
        if ($ins_segunda_cuota == true) {
            $segunda_cuota_id = $con->insert_id;
        }
    }

    if ($tipo_pago_matricula == 0 && $numero_cuotas == 3) {
        
        //  REGISTRO DE RECIBO
        $ins_recibo = $con->query("INSERT INTO tb_recibos( 
                                                            sede_recibo_id,
                                                            tipo_concepto_id,
                                                            monto_total,
                                                            id_user,
                                                            responsable,
                                                            status,
                                                            created_by,
                                                            created_date
                                                            )
                                                    VALUES (
                                                            '$sede_user_id',
                                                            '1',
                                                            '$primer_pago',
                                                            '$id_user',
                                                            '$nombre_apoderado',
                                                            'Y',
                                                            '$created_by',
                                                            '$fecha_sistem')");
        // echo 'success';
        if ($ins_recibo == true) {
            $recibo_primera_cuota_id = $con->insert_id;
        }

        // DETALLE  RECIBO
        $ins_detalle_recibo = $con->query("INSERT INTO tb_detalle_recibo( 
                recibo_id,
                concepto_id,
                descripcion,
                precio_unitario,
                unidades,
                total)
                VALUES (
                        '$recibo_primera_cuota_id',
                        '2',
                        'MATRICULA PRIMERA CUOTA',
                        '$primer_pago',
                        '1',
                        '$primer_pago')");
        if ($ins_detalle_recibo == true) {
            $detalle_recibo_id = $con->insert_id;
        }

        //  REGISTRO DE PRIMERA CUOTA
        $ins_primera_cuota = $con->query("INSERT INTO tb_cuotas_pendientes( 
                    matricula_id,
                    numero_cuota,
                    total_cuotas,
                    monto_cuota,
                    estado_cuota,
                    fecha_pago,
                    fecha_programada,
                    comprobante_pago_id,
                    status,
                    created_by,
                    created_date
                    )
                    VALUES (
                            '$matricula_id',
                            '1',
                            '$numero_cuotas',
                            '$primer_pago',
                            'CANCELADO',
                            '$fecha_sistem',
                            '$fecha_sistem',
                            '$recibo_primera_cuota_id',
                            'Y',
                            '$created_by',
                            '$fecha_sistem'
                            )");
        // echo 'success';
        if ($ins_primera_cuota == true) {
            $primera_cuota_id = $con->insert_id;
        }

        //  REGISTRO DE SEGUNDA CUOTA
        $ins_segunda_cuota = $con->query("INSERT INTO tb_cuotas_pendientes( 
            matricula_id,
            numero_cuota,
            total_cuotas,
            monto_cuota,
            estado_cuota,
            fecha_programada,            
            status,
            created_by,
            created_date
            )
            VALUES (
            '$matricula_id',
            '2',
            '$numero_cuotas',
            '$segunda_cuota',
            'PENDIENTE',
            '$fecha_segunda',
            'Y',
            '$created_by',
            '$fecha_sistem'
            )");
        // echo 'success';
        if ($ins_segunda_cuota == true) {
            $segunda_cuota_id = $con->insert_id;
        }
        //  REGISTRO DE TERCERA CUOTA
        $ins_tercera_cuota = $con->query("INSERT INTO tb_cuotas_pendientes( 
            matricula_id,
            numero_cuota,
            total_cuotas,
            monto_cuota,
            estado_cuota,
            fecha_programada,            
            status,
            created_by,
            created_date
            )
            VALUES (
            '$matricula_id',
            '2',
            '$numero_cuotas',
            '$tercera_cuota',
            'PENDIENTE',
            '$fecha_tercera',
            'Y',
            '$created_by',
            '$fecha_sistem'
            )");
        // echo 'success';
        if ($ins_tercera_cuota == true) {
            $tercera_cuota_id = $con->insert_id;
        }
    }

    echo $matricula_id;

} else {
    echo 'fail';
}
