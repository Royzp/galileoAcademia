<!-- MODAL DE PROCESOS -->

            <div class="modal-body">

                <form action="#" method="post" id="form_editar_items" name="form_editar_items">


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


                        <!-- <div class="form-group col-md-4">
                            <label>TIPO CONCEPTO</label>
                            <input type="text" class="form-control" id="tipo_concepto_edit" name="tipo_concepto_edit" placeholder="Ingrese N° Ruc" autocomplete="off">
                        </div> -->

                        <div class="form-group col-md-4">
                            <label>TIPO EGRESO</label>

                            <select style="width: 100% ; height: 37px;" id="tipo_concepto_edit" name="tipo_concepto_edit">


                                <?php

                                $query = $mysqli->query("SELECT tipo_concepto_id ,tipo_concepto FROM tb_tipo_concepto ");
                                while ($valores = mysqli_fetch_array($query)) {

                                    echo '<option value="' . $valores['tipo_concepto_id'] . '" >' . $valores['tipo_concepto'] . '</option>';
                                }

                                ?>




                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label>MONTO</label>
                            <input type="text" class="form-control" id="txt_monto_edit" name="txt_monto_edit" placeholder="Ingrese Razon Social " autocomplete="off">
                        </div>

                        <div class="form-group col-md-4">
                            <label>DESCRIPCION</label>
                            <input type="text" class="form-control" id="txt_descripcion_edit" name="txt_descripcion_edit" placeholder="Ingrese Razon Social " autocomplete="off">
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

        