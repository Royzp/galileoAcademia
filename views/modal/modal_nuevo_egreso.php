<form method="Post" name="frm_registro_egresos" id="frm_registro_egresos" enctype="multipart/form-data">

    <div class="row">

        <div class="form-group col-md-4">
            <label>Tipo Egreso </label>
            <br>
            <select name="tipo_egreso_id" id="tipo_egreso_id" style="height:36px!important; width: 244px!important;" onchange="showDiv2(this)">
                <option>Seleccione:</option>
                <?php
                $query2 = $mysqli->query("SELECT   id_tipo_egreso,nombre_tipo_egreso FROM  tb_tipo_egreso");
                while ($valor = mysqli_fetch_array($query2)) {
                    echo '<option value="' . $valor['id_tipo_egreso'] . '" >' . $valor['nombre_tipo_egreso'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label> Tipo de comprobante </label>
            <br>
            <select name="tipo_comprobante_id" id="tipo_comprobante_id" style="height:36px!important; width: 244px!important;" onchange="showDiv2(this)">
                <option>Seleccione:</option>
                <option value="3" selected>SIN COMPROBANTE</option>
                <option value="1">BOLETA</option>
                <option value="2">FACTURA</option>              
            </select>
        </div>
       
        <div class="form-group col-md-4">
            <label>N° Comprobante</label>
            <input type="text" class="form-control" id="numero_comprobante" name="numero_comprobante" placeholder="Numero de comprobante" autocomplete="off" required="">
        </div>

        <div class="form-group col-md-4">
            <label>Monto Pago</label>
            <input type="text" class="form-control" id="monto_egreso" name="monto_egreso" placeholder="Monto de pago" autocomplete="off" required="">
        </div>

        <div class="form-group col-md-4">
            <label>Fecha de Pago</label>
            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" placeholder="Ingrese Apellido Materno " autocomplete="off" required="">
        </div>
       
    </div>

    <div class="row">
        <div class="form-group col-md-12" id="hidden_div1" style="display: none ;">
            <label>Descripción de egreso </label>
            <input type="text" class="form-control w-100" id="descripcion_egreso" name="descripcion_egreso" placeholder="Ingrese Apellido Paterno" autocomplete="off"  style="width: 246px;">
        </div>
    </div>

    <input type="hidden" class="form-control" id="creado_por" name="creado_por" value="<?php echo $_SESSION['nombre']; ?>" placeholder="Ingrese Marca " autocomplete="off" required="">


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" onclick="onSubmitEgresos()">Registrar</button>
     
    </div>


</form>

        