<?php
  
   include_once ("conexion_bd/config_conexion.php");
  
  if(ISSET($_POST['search'])){
    $date1 = date("Y-m-d", strtotime($_POST['date1']));
    $date2 = date("Y-m-d", strtotime($_POST['date2']));
    $query=mysqli_query($conexion, "SELECT r.* , p.nombre FROM tb_recibos  AS r 
       INNER JOIN tb_persona AS p ON p.persona_id = r.persona_id WHERE r.created_date BETWEEN'$date1' AND '$date2'");
    $row=mysqli_num_rows($query);
    if($row>0){
      while($fetch=mysqli_fetch_array($query)){
?>
  <tr>
  <td><?php echo $fetch['recibo_id']?></td>
    <td><?php echo $fetch['created_date']?></td>
    <td><?php echo $fetch['nombre']?></td>
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
    $query=mysqli_query($conexion, "SELECT r.* , p.nombre FROM tb_recibos  AS r 
     INNER JOIN tb_persona AS p ON p.persona_id = r.persona_id");
    while($fetch=mysqli_fetch_array($query)){
?>
  <tr>
    <td><?php echo $fetch['recibo_id']?></td>
    <td><?php echo $fetch['created_date']?></td>
    <td><?php echo $fetch['nombre']?></td>
    <td><?php echo $fetch['monto_total']?></td>
  </tr>
<?php
    }
  }
?>