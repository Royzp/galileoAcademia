<?php
  
   include_once ("conexion_bd/config_conexion.php");
   include_once ("conexion_bd/conexion.php");
  
  if(ISSET($_POST['search'])){
    $date1 = date("Y-m-d", strtotime($_POST['date1']));
    $date2 = date("Y-m-d", strtotime($_POST['date2']));
    ////
    $query=mysqli_query($conexion, "SELECT r.* , s.nombre_sede FROM tb_recibos  AS r 
       INNER JOIN tb_sede as s ON s.sede_id = r.sede_recibo_id
       WHERE r.status = 'Y' AND r.created_date BETWEEN'$date1' AND '$date2'");
    $row=mysqli_num_rows($query);
    ////
    $query_total_ingresos=mysqli_query($conexion, "SELECT SUM(monto_total) as total FROM tb_recibos  AS r 
      WHERE r.status = 'Y' AND (r.created_date BETWEEN'$date1' AND '$date2')");
    $total_ingresos = mysqli_fetch_array($query_total_ingresos);
    ////        
    $sql2 = "SELECT r.sede_recibo_id , SUM(r.monto_total) as total, s.nombre_sede FROM tb_recibos  AS r    
    INNER JOIN tb_sede as s ON s.sede_id = r.sede_recibo_id
    WHERE r.status = 'Y' AND (r.created_date BETWEEN'$date1' AND '$date2')
    GROUP BY r.sede_recibo_id";
    ////
    $sentencia2 = $pdo->prepare($sql2);
    $sentencia2-> execute();
    $total_ingresos_porsede = $sentencia2-> fetchAll(); 
    ////
    if($row>0){
      while($fetch=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $fetch['recibo_id']?></td>
    <td><?php echo $fetch['created_date']?></td>
    <!-- <td><?php echo $fetch['nombre']?></td> -->
    <td><?php echo $fetch['nombre_sede']?></td>
    <td><?php echo $fetch['monto_total']?></td>
</tr>
<?php
      }
    }else{
      echo'
      <tr>
        <td colspan = "4"><center>Registros no Existen</center></td>
      </tr>';
    }
  }else{
    $query=mysqli_query($conexion, "SELECT r.* , s.nombre_sede FROM tb_recibos  AS r 
    INNER JOIN tb_sede as s ON s.sede_id = r.sede_recibo_id WHERE r.status = 'Y'");

    ////
    $query_total_ingresos=mysqli_query($conexion, "SELECT SUM(monto_total) as total FROM tb_recibos  AS r 
      WHERE r.status = 'Y'");
    $total_ingresos = mysqli_fetch_array($query_total_ingresos);
    ////        
    $sql2 = "SELECT r.sede_recibo_id , SUM(r.monto_total) as total, s.nombre_sede FROM tb_recibos  AS r 
       
    INNER JOIN tb_sede as s ON s.sede_id = r.sede_recibo_id
    WHERE r.status = 'Y'     
    GROUP BY r.sede_recibo_id";
    ////
    $sentencia2 = $pdo->prepare($sql2);
    $sentencia2-> execute();
    $total_ingresos_porsede = $sentencia2-> fetchAll(); 
    ////

    while($fetch=mysqli_fetch_array($query)){
?>
<tr>
    <td><?php echo $fetch['recibo_id']?></td>
    <td><?php echo $fetch['created_date']?></td>
    <!-- <td><?php echo $fetch['nombre']?></td> -->
    <td><?php echo $fetch['nombre_sede']?></td>
    <td><?php echo $fetch['monto_total']?></td>
</tr>
<?php
    }
  }
?>