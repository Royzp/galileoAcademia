
  
  <?php

  try{

    $pdo = new PDO('mysql:host=localhost;dbname=bdapp12','apiuser','DBApi...program');
    $pdo->exec("set names utf8");

    //$documento=$_POST['id_document'];
    //$documento= 2;
   // $id=2;

    $d=$_POST['id_documento'];
    //echo "$documento";
    
    $sql7=" SELECT  es.*, d.responsable,d.expediente,d.ruc,u.nombre_user,td.nombre_docum,te.nombre_estado  FROM   tb_documento  as d 
            INNER JOIN tb_estados as es  ON  es.id_document = d.id_document
            INNER JOIN tb_usuario as u   ON  u.id_user= d.responsable
            INNER JOIN tb_tipo_documento as td  on td.id_tip_docum = d.resolucion
            INNER JOIN tb_tipo_estados AS te ON   te.id_tip_estado = d.ultimo_estado  
       
             WHERE  d.id_document =".$d;

    $sentencia7 = $pdo->prepare($sql7);
    $sentencia7-> execute();   

    $resultado7 = $sentencia7->fetchAll();
    //print_r($resultado7) ;   

                
           if (!empty($resultado7)) {
                foreach ($resultado7 as $item) {
                      
                      echo "<tr>";

                          echo "<td>".$item['fecha']."</td>";
                          echo "<td>".$item['nombre_user']."</td>";
                          echo "<td>".$item['ruc']."</td>";
                          echo "<td>".$item['nombre_docum']."</td>";
                          echo "<td>".$item['expediente']."</td>";

                          /*switch ($item['estado']) {
                            case '1':
                                $status ='Activo';
                                break;

                            case '2':
                                $status  ='Susp.Temporal';
                                break;

                            case '3':
                                $status  ='Bajo de Oficio';
                                break;

                            case '4';
                                $status  ='Preescritos';
                                break;
                              

                          }*/


                         /* echo "<td>".$status."</td>"; */
                        echo "<td>".$item['nombre_estado']."</td>";
                          echo "</tr>";
                }
           }


  }catch (PDOException $e){
    print "¡Error! :" . $e->getMessage(). "<br/>" ;
    die();
  }

?>