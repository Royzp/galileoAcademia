<form method="Post" name="frm_registro_egresos" id="frm_registro_egresos" enctype="multipart/form-data">


    <div class="row">


        <div class="form-group col-md-4">
            <label>Tipo Egreso </label>
            <br>
            <!-- <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Ingrese Nombre Cliente " autocomplete="off" required=""> -->
            <select name="tipo_egreso_id" id="tipo_egreso_id" style="height:36px!important; width: 244px!important;" onchange="showDiv2(this)">
                <!-- <select class='mi-selector' name="categoria_producto" id="categoria_producto" style="height:36px!important; width: 244px!important;"> -->
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
            <label>Monto Pago</label>

            <input type="text" class="form-control" id="monto_egreso" name="monto_egreso" placeholder="Ingrese Apellido Paterno" autocomplete="off" required="">

        </div>



        <div class="form-group col-md-4">
            <label>Fecha de Pago</label>

            <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" placeholder="Ingrese Apellido Materno " autocomplete="off" required="">

        </div>

    </div>



    <div class="row">

        <div id="hidden_div1" style="display: none ;">




            <div class="form-group col-md-12">
                <label>Nombre Egreso </label>

                <input type="text" class="form-control" id="monto_egreso_otro" name="monto_egreso_otro" placeholder="Ingrese Apellido Paterno" autocomplete="off"  style="width: 246px;">

            </div>



        </div>

    </div>








    <input type="hidden" class="form-control" id="creado_por" name="creado_por" value="<?php echo $_SESSION['nombre']; ?>" placeholder="Ingrese Marca " autocomplete="off" required="">






    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        <button type="button" class="btn btn-warning" onclick="onSubmitEgresos()">Registrar</button>
        <!--  <input id="btngrabar" type="submit" class="button" name="REGISTRAR" value="REGISTRAR" style="background:#6672CB; 
                                                                                     border: none;
                                                                                     padding: 5px;
                                                                                     color: #fff;
                                                                                     font-weight: 600;  "> -->
    </div>


</form>