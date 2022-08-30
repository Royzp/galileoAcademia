 <?php

  try{

    $pdo = new PDO('mysql:host=localhost;dbname=bdapp12','apiuser','DBApi...program');
    $pdo->exec("set names utf8");

    $d=$_POST['id_documento'];
    //$d=26; 

    //echo "$d";

    
    $sql7=" SELECT * FROM tb_historial_pdf 
       
             WHERE  id_documento = ".$d;




    $sentencia7 = $pdo->prepare($sql7);
    $sentencia7-> execute();   

    $resultado7 = $sentencia7->fetchAll();

    if(!empty($resultado7)){                     
      foreach($resultado7 as $item) {
              echo "<tr>";                
                 echo "<td align='center'>".$item['id_pdf']."</td>";
                  echo "<td align='center'>".$item['fecha_actualizacion']."</td>";
                 echo "<td >".substr($item['nombre_pdf'],12,strlen($item['nombre_pdf']))."</td>";
                 echo "<td align='center'>"; 
                      echo "<button onclick=\"openModelPDF('".$item['nombre_pdf']."','2')\" class=\"btn btn-danger\" type=\"button\">";                             
                              echo "<img src='../views/dist/img/pdf1.png' width='20px' height='20px'>";
                      echo "</button>";
                  echo "</td>";

              echo "</tr>";}
    }

    //print_r($resultado7) ;  

  }catch (PDOException $e){
    print "¡Error! :" . $e->getMessage(). "<br/>" ;
    die();
  }

?>


