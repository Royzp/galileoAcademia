<?php
$concepto_id = $_POST['concepto_id'];
$conexion = mysqli_connect('localhost', 'root', '', 'bd_academia');
$sql = mysqli_query($conexion, "SELECT * FROM  tb_concepto where concepto_id ='$concepto_id' ");
$row = mysqli_fetch_array($sql);
$precio = $row['precio'];
$concepto = $row['concepto'];

    ?>   
        <div>
            <input type="text" class="form-control" value="S/.<?php echo $precio; ?>" id="precio_venta" name="precio_venta" autocomplete="off" style="text-align: center;" readonly="readonly">
            <input type="hidden" class="form-control" value="<?php echo $concepto; ?>" id="nombre_producto" name="nombre_producto" autocomplete="off" style="text-align: center;" readonly="readonly">
        </div>
        
    <?php

?>