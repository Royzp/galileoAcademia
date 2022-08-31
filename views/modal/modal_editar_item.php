<!-- MODAL DE PROCESOS -->
<div class="modal fade bd-example-modal-lg" id="exampleModalEditItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#29358E">
                <center>
                    <h3 class="modal-title" id="exampleModalLabel">
                        <font style="color: #FFFFFF ">
                            <img src="../views/dist/img/user_admin.png" style="width: 75px;">
                            EDITAR DATOS DE ITEM
                        </font>
                    </h3>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background:#6672CB;color: #fff; ">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="#" method="post" id="form_editar_items" name="form_editar_items">


                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <span id="error2"></span>
                                <center> <label for="Fecha">N° Registro</label> </center>

                                <input type="text" value="" autocomplete="off" class="form-control" id="id_editarrr_item" name="id_editarrr_item" style="text-align:center; width: 707px;" disabled>

                            </div>

                        </div>

                    </div>






                    <div class="row col-md-12" align="center">


                        <!-- <div class="form-group col-md-4">
                            <label>TIPO CONCEPTO</label>
                            <input type="text" class="form-control" id="tipo_concepto_edit" name="tipo_concepto_edit" placeholder="Ingrese N° Ruc" autocomplete="off">
                        </div> -->

                        <div class="form-group col-md-4">
                            <label>TIPO CONCEPTO</label>

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
                            <label>CONCEPTO</label>
                            <input type="text" class="form-control" id="txt_concepto_edit" name="txt_concepto_edit" placeholder="Ingrese Razon Social " autocomplete="off">
                        </div>

                        <div class="form-group col-md-4">
                            <label>PRECIO</label>
                            <input type="text" class="form-control" id="txt_precio_edit" name="txt_precio_edit" placeholder="Ingrese Razon Social " autocomplete="off">
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

        </div>

    </div>

</div>