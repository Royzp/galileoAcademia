<?php

$conexion=mysqli_connect('localhost','root','','bd_academia');
mysqli_query($conexion,"set names utf8");


// BUSCAR CLIENTE 
 if($_POST['action']=='searchCliente')
 {

    if(!empty($_POST['cliente'])){

        $dni = $_POST['cliente'];

        $query = mysqli_query($conexion,"SELECT * FROM tb_cliente WHERE numero_dni LIKE '$dni' AND estad = 'Y'");

        mysqli_close($conexion);
        $result = mysqli_num_rows($query);

        $data = '';

        if($result > 0){
           
            $data = mysqli_fetch_assoc($query);

        }else{

            $data = 0 ;

        }
        echo json_encode($data,);
        

    }

    exit;
    // print_r($_POST);
    // echo "Buscar cliente";
    // exit;
 }
