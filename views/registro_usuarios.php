<?php

session_start();

if (empty($_SESSION['active'])) {
    header('location: localhost:8080/GalileoAcademia');
}

include_once 'conexion_bd/conexion.php';

include_once 'conexion_bd/consulta_user.php';

$mysqli = new mysqli('localhost', 'root', '', 'bd_academia');





?>



<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academia Galileo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">

    <link rel="icon" type="image" href="../views/dist/img/icono_galileo.png" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/menu_lateral.css">
    <link rel="stylesheet" href="styles/styles_tabla.css">
    <!-- <link rel="stylesheet" href="styles/styles_formulario.css"> -->



</head>

<style>
/*  CSS  DE FORMULARIO  */


::-webkit-input-placeholder {
    color: #bbb;
}

:-moz-placeholder {
    color: #bbb;
}

.placeholder {
    color: #bbb;
    /* polyfill */
}

#frm_admi input {
    margin: 5px 0;
    padding: 15px;
    width: 100%;
    *width: 518px;
    /* IE7 and below */
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 3px;
}

#frm_admi input:focus {
    outline: 0;
    border-color: #aaa;
    box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
}

#frm_admi select {

    width: 80px !important;
    height: 48px !important;

}


#frm_admi button {
    margin: 20px 0 0 0;
    padding: 15px 8px;
    width: 100%;
    cursor: pointer;
    border: 1px solid #2493FF;
    overflow: visible;
    display: inline-block;
    color: #fff;
    font: bold 1.4em arial, helvetica;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, .4);
    background-color: #ff8524;
    background-image: linear-gradient(top, rgba(255, 255, 255, .5), rgba(255, 255, 255, 0));
    transition: background-color .2s ease-out;
    border-radius: 3px;
    box-shadow: 0 2px 1px rgba(0, 0, 0, .3),
        0 1px 0 rgba(255, 255, 255, .5) inset;
}

#frm_admi button:hover {
    background-color: #7cbfff;
    border-color: #7cbfff;
}

#frm_admi button:active {
    position: relative;
    top: 3px;
    text-shadow: none;
    box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
}
</style>


<body class="hold-transition sidebar-mini" style="zoom: 95%;">
    <div class="wrapper">

        <?php
            include_once("navbar_sidebar.php");
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <div class="form-group col-md-12" style="overflow: hidden;overflow-y: auto;">

                <div class="row">

                    <div class="form-group col-md-6">
                        <img src="../views/dist/img/galileo5.jpg" style="width: 100%;">
                    </div>

                    <div class="form-group col-md-6"
                        style="padding: 15px 35px; float: left; width: 50%; text-align: justify;">

                        <form method="Post" name="frm_admi" id="frm_admi">
                            <h1 style="    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;">Registro de Personal Galileo</h1>
                            <br>

                            <label>Numero DNI</label>
                            <input type="text" name="tx_dni" id="tx_dni" placeholder="Ingrese numero de DNI"
                                autocomplete="off" required>
                            <br>
                            <label>Nombres</label>
                            <input type="text" name="tx_nombre" id="tx_nombre" placeholder="Ingrese Nombres"
                                autocomplete="off" required>
                            <br>
                            <label>Apellidos</label>
                            <input type="text" name="tx_apellido" id="tx_apellido" placeholder="Ingrese Apellidos"
                                autocomplete="off" required>
                            <br>
                            <label>Contraseña</label>
                            <input type="text" name="tx_contra" id="tx_contra" placeholder="Ingrese Contraseña"
                                autocomplete="off" required>

                            <label>Sede</label>
                            <br>
                            <select id="select_sede" name="select_sede" style="width: 488px!important;">

                                <option>Seleccione:</option>

                                <?php
    
                            $query2 = $mysqli->query("SELECT   sede_id,nombre_sede FROM  tb_sede ");
                            while ($valor = mysqli_fetch_array($query2)) {
    
                                echo '<option value="' . $valor['sede_id'] . '" >' . $valor['nombre_sede'] . '</option>';
                            }
    
                            ?>



                            </select>

                            <label>Tipo Usuario</label>
                            <br>
                            <select id="select_user" name="select_user" style="width: 488px!important;">

                                <option>Seleccione:</option>

                                <?php
    
                            $query2 = $mysqli->query("SELECT   id_tipo_usuario,nombre_tipo_usuario FROM  tb_tipo_usuario ");
                            while ($valor = mysqli_fetch_array($query2)) {
    
                                echo '<option value="' . $valor['id_tipo_usuario'] . '" >' . $valor['nombre_tipo_usuario'] . '</option>';
                            }
    
                            ?>



                            </select>


                            <br>
                            <br>

                            <input type="hidden" name="creado_por" id="creado_por"
                                value="<?php echo $_SESSION['nombre']; ?>" placeholder="Ingrese Contraseña" required=""
                                autocomplete="off">




                            <button id="btngrabar" type="button" class="button" value="REGISTRAR"
                                onclick="onSubmituser()">¡Registrate!</button>
                        </form>


                    </div>
                </div>



            </div>


            <center>

                <button data-toggle="collapse" data-target="#demo" id="btn_table5" class="btn btn-success">

                    <p>LISTA USUARIOS</p>

                </button>
            </center>




            <div id="demo" class="collapse">

                <div class="container">

                    <?php

                    include_once('modal/mostrar_datos_usuario.php');

                    ?>

                </div>

            </div>




            <!-- MODAL DE PROCESOS -->
            <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="background:#6672CB;color: #fff; ">
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

                                            <input type="text" value="" autocomplete="off" class="form-control"
                                                id="idUser" name="idUser" style="text-align:center; width: 707px;"
                                                disabled>

                                        </div>

                                    </div>

                                </div>






                                <div class="row col-md-12" align="center">


                                    <div class="form-group col-md-4">
                                        <label>N° DNI</label>
                                        <input type="text" class="form-control" id="txt_dni_edit" maxlength="8"
                                            name="txt_dni_edit" placeholder="Ingrese N° Ruc" autocomplete="off">
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label>NOMBRES</label>
                                        <input type="text" class="form-control" id="txt_nombre_edit"
                                            name="txt_nombre_edit" placeholder="Ingrese Razon Social "
                                            autocomplete="off">
                                    </div>




                                    <div class="form-group col-md-4">
                                        <label>APELLIDOS</label>
                                        <input type="text" class="form-control" id="txt_apellido_edit"
                                            name="txt_apellido_edit" placeholder="Ingrese Expediente"
                                            autocomplete="off">
                                    </div>


                                </div>



                                <div class="row col-lg-12" align="center">


                                    <div class="form-group col-md-6">

                                        <label>CONTRASEÑA</label>
                                        <input type="text" class="form-control" id="txt_contra_edit"
                                            name="txt_contra_edit" autocomplete="off" style="    width: 340px;">

                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>TIPO USUARIO </label>

                                        <select class="form-control" id="txt_tipouser_edit" name="txt_tipouser_edit"
                                            style=" width: 340px;">
                                            <option value="1">ADMINISTRADOR</option>
                                            <option value="2">USUARIO</option>


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

            <!-- FIN DE MODAL -->


            <div class="modal fade bd-example-modal-lg" id="exampleModal77" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#B81C1C">
                            <center>
                                <h3 class="modal-title" id="exampleModalLabel">
                                    <font style="color: #FFFFFF ">
                                        <img src="../views/dist/img/borrar_usuario.png" style="width: 75px;">
                                        ELIMINAR USUARIO
                                    </font>
                                </h3>
                            </center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="background:#6672CB;color: #fff; ">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="#" method="post" id="elimi_usuario" name="elimi_usuario">


                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <span id="error2"></span>
                                            <center> <label for="Fecha">N° Registro</label> </center>

                                            <input type="text" value="" autocomplete="off" class="form-control"
                                                id="id_elim_User" name="id_elim_User"
                                                style="text-align:center; width: 707px;" disabled>

                                        </div>

                                    </div>

                                </div>






                                <div class="row col-md-12" align="center">


                                    <div class="form-group col-md-4">
                                        <label>N° DNI</label>
                                        <input type="text" class="form-control" id="txt_dni_elim" maxlength="8"
                                            name="txt_dni_elim" placeholder="Ingrese N° Ruc" autocomplete="off">
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label>NOMBRES</label>
                                        <input type="text" class="form-control" id="txt_nombre_elim"
                                            name="txt_nombre_elim" placeholder="Ingrese Razon Social "
                                            autocomplete="off">
                                    </div>




                                    <div class="form-group col-md-4">
                                        <label>APELLIDOS</label>
                                        <input type="text" class="form-control" id="txt_apellido_elim"
                                            name="txt_apellido_elim" placeholder="Ingrese Expediente"
                                            autocomplete="off">
                                    </div>


                                </div>




                                <input type="hidden" class="form-control" id="txt_estado" name="txt_estado"
                                    placeholder="Ingrese Expediente" autocomplete="off">









                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                                    <input id="btngrabar" type="submit" class="button" value="ELIMINAR" style="background:#dc3545; 
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

            <!-- Main content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Desarrollado:.
            </div>
            <!-- Default to the left -->
            <strong>Sistema Informatico &copy; Academia Galileo</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../views/dist/js/adminlte.min.js"></script>

    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>


    <link rel="stylesheet" type="text/css" href="../views/plugins/sweetalert2/sweetalert2.css">
    <script type="text/javascript" charset="utf8" src="../views/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->



    <script type="text/javascript" src="../views/script/tablas_responsive.js"> </script>

    <script type="text/javascript">
    function onSubmituser() {

        var frm = document.getElementById('frm_admi');
        var df = new FormData(frm);

        $.ajax({
            url: 'insert/insert_user.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: df,
            success(data) {
                console.log(data);


                if (data == 'success') {

                    // 1. RESET FORMULARIO   
                    $('#frm_admi').trigger('reset');
                    // 2. CERRAMOS EL MODAL
                    $('.modal').modal('hide');
                    location.reload();

                    recargarData();

                } else {
                    alert(data);
                }
            }
        });
    }
    </script>



    <script type="text/javascript">
    $(document).ready(function() {
        localStorage.setItem("nombre_user", '<?php echo $_SESSION['nombre']; ?>');
        localStorage.setItem("id_user", '<?php echo $_SESSION['idUser']; ?>');
    });
    </script>




    <!--  FORMULARIO EDITAR FORMULARIO USUARIO -->

    <script type="text/javascript">
    $(document).on("click", ".btnEditar7", function() {



        var id_user = $(this).attr("data-id");
        var dni_user = $(this).attr("data-dni");
        var nombre_user = $(this).attr("data-nombre");
        var apellido_user = $(this).attr("data-apellido");
        var clave_user = $(this).attr("data-contra");
        var sede_user_id = $(this).attr("data-sede");
        var tipo_user = $(this).attr("data-typeuser");







        //mostrar al modal
        $('#exampleModal2').modal('show');
        $('#idUser').attr('value', id_user);
        $('#txt_dni_edit').attr('value', dni_user);
        $('#txt_nombre_edit').attr('value', nombre_user);
        $('#txt_apellido_edit').attr('value', apellido_user);

        $('#txt_tipouser_edit').attr('value', sede_user_id);
        $('#txt_tipouser_edit').find("option").each(function() {
            if ($(this).val() == sede_user_id) {
                $(this).prop("selected", "selected");
            }

        });


        $('#txt_contra_edit').attr('value', clave_user);

        $('#txt_tipouser_edit').attr('value', tipo_user);
        $('#txt_tipouser_edit').find("option").each(function() {
            if ($(this).val() == tipo_user) {
                $(this).prop("selected", "selected");
            }

        });








    });
    $('#exampleModal2').on('shown.bs.modal', function() {
        // alert("Registro Encontrado");
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#printButton").click(function() {
            // var mode = 'iframe'; //popup
            // var close = mode == "popup";
            // var options = {
            //     mode: mode,
            //     popClose: close
            // };
            // $("div.printableArea").printArea(options);
            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;
            // document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });


        //Envio de formulario  de actualizar
        $("#actualizar_usuario").submit(function(e) {
            e.preventDefault();
            //validar que coincidan
            //para copiar dentro de if



            Swal.fire({
                title: 'Estas seguro de Editar ?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, ingresar'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: 'update/update_usuario.php',
                        type: 'POST',
                        data: {

                            dni_edit: $('#txt_dni_edit').val(),
                            nombre_edit: $('#txt_nombre_edit').val(),
                            apellido_edit: $('#txt_apellido_edit').val(),
                            contra_edit: $('#txt_contra_edit').val(),
                            tipousuario_edit: $('#txt_tipouser_edit').val(),


                            id_usuario: $('#idUser').val()

                        },

                        success(data) {
                            if (data == "1") {
                                location.reload();

                                $('.modal').modal('hide');
                                Swal.fire(
                                    'Modificado!',
                                    'Fue Ingresado Correctamente',
                                    'success'
                                )

                            }
                            alert(data);
                        }
                    });

                }
            })







        });


    });
    </script>

    <!--  FIN FORMULARIO EDITAR USUARIO -->

    <!--  ELIMINAR DATOS -->

    <script type="text/javascript">
    $(document).on("click", ".btnEliminar7", function() {



        var id_user = $(this).attr("data-id");
        var dni_user = $(this).attr("data-dni");
        var nombre_user = $(this).attr("data-nombre");
        var apellido_user = $(this).attr("data-apellido");
        var estado = $(this).attr("data-estado");








        //mostrar al modal
        $('#exampleModal77').modal('show');
        $('#id_elim_User').attr('value', id_user);
        $('#txt_dni_elim').attr('value', dni_user);
        $('#txt_nombre_elim').attr('value', nombre_user);
        $('#txt_apellido_elim').attr('value', apellido_user);
        $('#txt_estado').attr('value', estado);









    });
    $('#exampleModal77').on('shown.bs.modal', function() {
        // alert("Registro Encontrado");
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#printButton").click(function() {
            // var mode = 'iframe'; //popup
            // var close = mode == "popup";
            // var options = {
            //     mode: mode,
            //     popClose: close
            // };
            // $("div.printableArea").printArea(options);
            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;
            // document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });


        //Envio de formulario  de actualizar
        $("#elimi_usuario").submit(function(e) {
            e.preventDefault();
            //validar que coincidan
            //para copiar dentro de if



            Swal.fire({
                title: 'Estas seguro de Eliminar este Usuario !',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: 'eliminar_usuario.php',
                        type: 'POST',
                        data: {

                            estado_edit: $('#txt_estado').val(),



                            id_usuario: $('#id_elim_User').val()

                        },

                        success(data) {
                            if (data == "1") {
                                location.reload();

                                $('.modal').modal('hide');
                                Swal.fire(
                                    'Modificado!',
                                    'Fue Ingresado Correctamente',
                                    'success'
                                )

                            }
                            //alert(data);
                        }
                    });

                }
            })







        });


    });
    </script>





    <!-- FIN DELETE DOCUMENTO -->



</body>

</html>