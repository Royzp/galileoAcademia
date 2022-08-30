
  
  <?php

    $sql2=" Select * From tb_usuario WHERE estado ='Y'  ";
    $sentencia2 = $pdo->prepare($sql2);
    $sentencia2-> execute();

    
    $resultado2 = $sentencia2->fetchAll();
    if(!empty($resultado2)) {
      for ($i=0; $i < count($resultado2); $i++) { 
        switch ($resultado2[$i]['tipo_user']) {
          case '1':
            $resultado2[$i]['type_user_name'] = 'Administrador';
            break;
          case '2':
            $resultado2[$i]['type_user_name'] = 'Usuario';
            break;
         
        }
      }
    }   



    ?>