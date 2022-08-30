<?php

$conexion=mysqli_connect('localhost','root','','bd_academia');
mysqli_query($conexion,"set names utf8");
    if(!empty($_POST['matricula_id'])){
        $_post_matricula_id = $_POST['matricula_id'];

        $query = mysqli_query($conexion,"SELECT m.*,p.*,mo.nombre_modalidad,s.nombre_sede,pe.nombre_periodo,c.nombre_ciclo, tu.turno AS nombre_turno FROM tb_matricula AS m
        INNER JOIN tb_persona AS p ON p.persona_id = m.persona_id
        INNER JOIN tb_modalidad AS mo ON mo.modalidad_id = m.modalidad_id
        INNER JOIN tb_sede AS s ON s.sede_id = m.sede_id
        INNER JOIN tb_periodo AS pe ON pe.periodo_id = m.periodo_id
        INNER JOIN tb_ciclo AS c ON c.ciclo_id = m.ciclo_id
        INNER JOIN tb_medio_informacion AS mi ON mi.medio_informacion_id = m.medio_informacion_id
        INNER JOIN tb_turno AS tu ON tu.turno_id = m.turno
        WHERE m.matricula_id  = '$_post_matricula_id' ");

        mysqli_close($conexion);
        $result = mysqli_num_rows($query);
        $data = '';
        if($result > 0){           
            $data = mysqli_fetch_assoc($query);
        }else{
            $data = 0 ;  
        }
        echo json_encode($data);       
    }
    exit;
    // print_r($_POST);
    // echo "Buscar cliente";
    // exit;
 
