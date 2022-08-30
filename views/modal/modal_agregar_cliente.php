<form method="Post" name="frm_registro_cliente" id="frm_registro_cliente" enctype="multipart/form-data">


    <div class="row">


        <div class="form-group col-md-4">
            <label>Nombre </label>
            <br>
            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Ingrese Nombre Cliente " autocomplete="off" required="">


        </div>



        <div class="form-group col-md-4">
            <label>Apellido Paterno</label>

            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Ingrese Apellido Paterno" autocomplete="off" required="">

        </div>



        <div class="form-group col-md-4">
            <label>Apellido Materno</label>

            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Ingrese Apellido Materno " autocomplete="off" required="">

        </div>

    </div>


    <div class="row">


        <div class="form-group col-md-4">
            <label>Dni</label>
            <br>
            <input type="text" class="form-control" id="numero_dni" name="numero_dni" placeholder="Ingrese Numero Dni " autocomplete="off" required="">


        </div>



        <div class="form-group col-md-4">
            <label>Ruc</label>

            <input type="text" class="form-control" id="numero_ruc" name="numero_ruc" placeholder="Ingrese Numero Ruc" autocomplete="off" required="">

        </div>



        <div class="form-group col-md-4">
            <label>Razon Social</label>

            <input type="text" class="form-control" id="razon_social_clie" name="razon_social_clie" placeholder="Ingrese Razon Social " autocomplete="off" required="">

        </div>

    </div>

    <div class="row">


        <div class="form-group col-md-4">
            <label>Direccion</label>
            <br>
            <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" placeholder="Ingrese Stock minimo " autocomplete="off" required="">


        </div>



        <div class="form-group col-md-4">
            <label>Celular</label>

            <input type="text" class="form-control" id="celular_cliente" name="celular_cliente" placeholder="Ingrese Marca " autocomplete="off" required="">

        </div>


        <div class="form-group col-md-4">
        <label>Genero</label>

        <!-- <input type="text" class="form-control" id="categoria_producto" name="categoria_producto" placeholder="Ingrese Categoria " autocomplete="off" required=""> -->
        <select name="genero_cliente" id="genero_cliente" style="height:36px!important; width: 244px!important;">
            <option>Seleccione:</option>
            <option>Masculino</option>
            <option>Femenino</option>

        </select>


    </div>

    </div>


   

            <input type="hidden" class="form-control" id="creado_por" name="creado_por" value="<?php echo $_SESSION['nombre']; ?>" placeholder="Ingrese Marca " autocomplete="off" required="">

       




    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        <button type="button" class="btn btn-primary" onclick="onSubmitCliente()">Registrar</button>
        <!--  <input id="btngrabar" type="submit" class="button" name="REGISTRAR" value="REGISTRAR" style="background:#6672CB; 
                                                                                     border: none;
                                                                                     padding: 5px;
                                                                                     color: #fff;
                                                                                     font-weight: 600;  "> -->
    </div>


</form>