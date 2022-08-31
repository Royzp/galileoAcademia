
            <!-- MODAL DE PROCESOS -->
            <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#29358E">
                            <center>
                                <h3 class="modal-title" id="exampleModalLabel">
                                    <font style="color: #FFFFFF ">
                                        <img src="../views/dist/img/user_admin.png" style="width: 75px;">
                                        EDITAR DATOS DE USUARIOS
                                    </font>
                                </h3>
                            </center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background:#6672CB;color: #fff; ">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="#" method="post" id="actualizar_usuario" name="actualizar_usuario">


                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <span id="error2"></span>
                                            <center> <label for="Fecha">N° Registro</label> </center>

                                            <input type="text" value="" autocomplete="off" class="form-control" id="idUser" name="idUser" style="text-align:center; width: 707px;" disabled>

                                        </div>

                                    </div>

                                </div>






                                <div class="row col-md-12" align="center">


                                    <div class="form-group col-md-4">
                                        <label>N° DNI</label>
                                        <input type="text" class="form-control" id="txt_dni_edit" maxlength="8" name="txt_dni_edit" placeholder="Ingrese N° Ruc" autocomplete="off">
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label>NOMBRES</label>
                                        <input type="text" class="form-control" id="txt_nombre_edit" name="txt_nombre_edit" placeholder="Ingrese Razon Social " autocomplete="off">
                                    </div>




                                    <div class="form-group col-md-4">
                                        <label>APELLIDOS</label>
                                        <input type="text" class="form-control" id="txt_apellido_edit" name="txt_apellido_edit" placeholder="Ingrese Expediente" autocomplete="off">
                                    </div>


                                </div>



                                <div class="row col-lg-12" align="center">


                                    <div class="form-group col-md-6">

                                        <label>CONTRASEÑA</label>
                                        <input type="text" class="form-control" id="txt_contra_edit" name="txt_contra_edit" autocomplete="off" style="    width: 340px;">

                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>TIPO USUARIO </label>

                                        <select class="form-control" id="txt_tipouser_edit" name="txt_tipouser_edit" style=" width: 340px;">
                                        <?php
                                            $query2 = $mysqli->query("SELECT   id_tipo_usuario,nombre_tipo_usuario FROM  tb_tipo_usuario ");
                                            while ($valor = mysqli_fetch_array($query2)) {
                                                echo '<option value="' . $valor['id_tipo_usuario'] . '" >' . $valor['nombre_tipo_usuario'] . '</option>';
                                            }
                                            ?>

                                        </select>
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
