
  
  <?php

    $sql2="SELECT u.*,tu.nombre_tipo_usuario,se.nombre_sede From tb_usuario  AS u 
    INNER JOIN tb_tipo_usuario AS tu ON tu.id_tipo_usuario = u.tipo_user
    INNER JOIN  tb_sede AS se  ON se.sede_id = u.sede_user_id
     WHERE estado ='Y' ORDER BY  u.id_user DESC ";
    $sentencia2 = $pdo->prepare($sql2);
    $sentencia2-> execute();

    
    $resultado2 = $sentencia2->fetchAll();
    // if(!empty($resultado2)) {
    //   for ($i=0; $i < count($resultado2); $i++) { 
    //     switch ($resultado2[$i]['tipo_user']) {
    //       case '1':
    //         $resultado2[$i]['type_user_name'] = 'Administrador';
    //         break;
    //       case '2':
    //         $resultado2[$i]['type_user_name'] = 'Usuario';
    //         break;
         
    //     }
    //   }
    // }   



    ?>