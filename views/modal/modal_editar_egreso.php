<!-- MODAL DE PROCESOS -->

<div class="modal-body">

    <form action="#" method="post" id="form_editar_egresos" name="form_editar_egresos">


        <div class="row">

            <div class="col-lg-12">
                <div class="form-group">
                    <span id="error2"></span>
                    <center> <label for="Fecha">N° Registro</label> </center>

                    <input type="text" value="" autocomplete="off" class="form-control" id="id_editarrr_egreso" name="id_editarrr_egreso" style="text-align:center; width: 707px;" disabled>

                </div>

            </div>

        </div>






        <div class="row col-md-12" align="center">


            <div class="form-group col-md-4">
                <label>Tipo Egreso </label>
                <br>
                <select name="tipo_egreso_edit" class="form-control" id="tipo_egreso_edit" onchange="showDiv2(this)">
                    <!-- <select name="tipo_egreso_edit" id="tipo_egreso_edit" style="height:36px!important; width: 244px!important;" onchange="showDiv2(this)"> -->

                    <?php
                    $query2 = $mysqli->query("SELECT   id_tipo_egreso,nombre_tipo_egreso FROM  tb_tipo_egreso");
                    while ($valor = mysqli_fetch_array($query2)) {
                        echo '<option value="' . $valor['id_tipo_egreso'] . '" >' . $valor['nombre_tipo_egreso'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>Tipo Egreso </label>
                <br>
                <select name="tipo_comprobante_edit" id="tipo_comprobante_edit" class="form-control"  onchange="showDiv2(this)">
                    <!-- <select name="tipo_egreso_edit" id="tipo_egreso_edit" style="height:36px!important; width: 244px!important;" onchange="showDiv2(this)"> -->

                    
                    <option value="3" selected>SIN COMPROBANTE</option>
                    <option value="1">BOLETA</option>
                    <option value="2">FACTURA</option>
                </select>

            </div>

            <div class="form-group col-md-4">
                <label>NUMERO COMPROBANTES</label>
                <input type="text" class="form-control" id="txt_numcomprobante_edit" name="txt_numcomprobante_edit" placeholder="Ingrese Razon Social " autocomplete="off">
            </div>



        </div>


        <div class="row col-md-12" align="center">

            <div class="form-group col-md-4">
                <label>DESCRIPCION</label>
                <input type="text" class="form-control" id="txt_descripcion_edit" name="txt_descripcion_edit" placeholder="Ingrese Razon Social " autocomplete="off">
            </div>

            <div class="form-group col-md-4">
                <label>MONTO</label>
                <input type="text" class="form-control" id="txt_monto_edit" name="txt_monto_edit" placeholder="Ingrese Razon Social " autocomplete="off">
            </div>

            <div class="form-group col-md-4">
                <label>FECHA PAGO</label>
                <input type="text" class="form-control" id="txt_fecha_edit" name="txt_fecha_edit" placeholder="Ingrese Razon Social " autocomplete="off">
            </div>

        </div>



        <div class="row col-lg-12" align="center">


            <div class="form-group col-md-6">


                <input type="hidden" class="form-control" id="txt_estatus_editt" name="txt_estatus_editt" autocomplete="off" style="    width: 340px;">

            </div>




        </div>




        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            <input id="btngrabar" type="submit" class="button" value="ACTUALIZAR" style="background:#6672CB; 
                                                                                     border: none;
                                                                                     padding: 5px;
                                                                                     color: #fff;
                                                                                     font-weight: 600;  ">
        </div>

    </form>


</div>