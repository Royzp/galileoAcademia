<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#29358E">
                <center>
                    <h3 class="modal-title" id="exampleModalLabel">
                        <font style="color: #FFFFFF ">
                            <img src="../views/dist/img/editarr.png" style="width: 60px;
                                                             height: 60px;
                                                       margin-right: 17px;">
                            EDITAR PRODUCTO
                        </font>
                    </h3>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background:#6672CB;color: #fff; ">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="#" method="post" id="actualizar_producto" name="actualizar_producto">

                    <div class="row">


                        <div class="col-lg-12">
                            <div class="for-group">
                                <span id="error2"></span>
                                <center> <label for="Fecha">N° Registro</label> </center>

                                <input type="text" value="" autocomplete="off" class="form-control" id="idDocumento" name="idDocumento" style="text-align:center" disabled>

                            </div>

                        </div>




                        <div class="row  col-md-12 ">

                            <div class="form-group col-md-6">


                                <label>PRODUCTO</label>
                                <input type="text" class="form-control" id="txt_nombre_producto" name="txt_nombre_producto" placeholder="Ingrese N° Ruc" autocomplete="off">
                            </div>




                            <div class="form-group col-md-6">
                                <label>CATEGORIA</label>

                                <select style="width: 100% ; height: 37px;" id="txt_categoria_edit" name="txt_categoria_edit" required="">


                                    <?php

                                    $query = $mysqli->query("SELECT id_categoria ,nombre_categoria FROM tb_categoria  ");
                                    while ($valores = mysqli_fetch_array($query)) {

                                        echo '<option value="' . $valores['id_categoria'] . '" >' . $valores['nombre_categoria'] . '</option>';
                                    }

                                    ?>




                                </select>
                            </div>








                        </div>






                        <div class="row  col-md-12">




                            <div class="form-group col-md-4">
                                <label>LOTE</label>
                                <input type="text" class="form-control" id="txt_lote_edit" name="txt_lote_edit" placeholder="Ingrese N° Ruc" autocomplete="off">
                            </div>


                            <div class="form-group col-md-4">
                                <label>STOCK</label>
                                <input type="text" class="form-control" id="txt_stock_edit" name="txt_stock_edit" placeholder="Ingrese Razon Social ">
                            </div>




                            <div class="form-group col-md-4">
                                <label>PRECIO</label>
                                <input type="text" class="form-control" id="txt_precio_edit" name="txt_precio_edit" placeholder="Ingrese Expediente">
                            </div>







                        </div>


                        <div class="row col-md-12">

                            <div class="form-group col-md-4">
                                <label>PROVEEDOR</label>
                               
                                <select style="width: 100% ; height: 37px;" id="txt_proveedor_edit" name="txt_proveedor_edit" required="">


                                    <?php

                                    $query = $mysqli->query("SELECT id_proveedor ,razon_social FROM tb_proveedor  ");
                                    while ($valores = mysqli_fetch_array($query)) {

                                        echo '<option value="' . $valores['id_proveedor'] . '" >' . $valores['razon_social'] . '</option>';
                                    }

                                    ?>




                                </select>

                            </div>

                            

                            <div class="form-group col-md-4">
                                <label>MARCA</label>
                                <input type="text" class="form-control" id="txt_marca_edit" name="txt_marca_edit" placeholder="Ingrese Marca ">
                            </div>

                            <div class="form-group col-md-4">
                                <label>MODELO</label>
                                <input type="text" class="form-control" id="txt_modelo_edit" name="txt_modelo_edit" placeholder="Ingrese Modelo ">
                            </div>



                        </div>

                        <div class="row col-md-12">

                            <div class="form-group col-md-4">
                                <label>UNIDAD MEDIDA</label>
                                <input type="text" class="form-control" id="txt_unidad_edit" name="txt_unidad_edit" placeholder="Ingrese Importe/Monto ">
                            </div>

                            <div class="form-group col-md-8">
                                <label>FOTO PRODUCTO</label>
                                <input type="file" class="form-control" id="txt_foto_edit" name="txt_foto_edit" placeholder="Ingrese Importe/Monto ">
                            </div>

        

                        </div>




                    </div>

                    <div class="modal-footer" style="padding-right:188px;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 183px;height: 50px;"><i class="fa fa-window-close" aria-hidden="true">  Cancelar</i></button>
                        <button type="button" class="btn btn-primary" onclick="updateProducto()"style="width: 183px;height: 50px;"><i class="fas fa-save">  Actualizar </i></button>
                        <!-- <input id="btn_grabar" type="submit" class="button" value="ACTUALIZAR" style="background:#6672CB; 
                                                                                     border: none;
                                                                                     padding: 5px;
                                                                                     color: #fff;
                                                                                     font-weight: 600;  "> -->
                    </div>

                </form>


            </div>

        </div>

    </div>

</div>