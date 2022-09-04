<?php
session_start();
if (empty($_SESSION['active'])) {
    header('location: http://localhost:8080/GalileoAcademia/');
}
$mysqli = new mysqli('localhost', 'root', '', 'bd_academia');
include_once 'conexion_bd/conexion.php';
include_once 'conexion_bd/config_conexion.php';
include_once 'conexion_bd/datos_items.php';
include_once 'conexion_bd/consulta_user.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academia Galileo</title>
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image" href="../views/dist/img/icono_galileo.png" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- style -->
    <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="styles/menu_lateral.css">
    <link rel="stylesheet" href="styles/style_table.css">
    <link rel="stylesheet" href="styles/style_datatable.css">

    <style>
        .title__page {
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: left;
            margin-top: 10px;
        }
    </style>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
            if($_SESSION['tipoUser'] ==  1){
                // 1 = ADMINISTRADO
                include_once("navbar_sidebar.php");
            }
            if($_SESSION['tipoUser'] ==  2){
                // 2 = GERENTE
                include_once("navbar_sidebar_g.php");
            }
            if($_SESSION['tipoUser'] ==  3){
                // 3 = SECRETARIA
                include_once("navbar_sidebar_s.php");
            }
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container-fluid">


                <div class="container-fluid">
                    <?php
                    include_once("modal/mostrar_datos_usuario.php");
                    ?>
                </div>

                <!-- MODAL   -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal9" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#1471B6; ">
                                <b>
                                    <P class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;color: #FFFFFF; font-family: arial;">
                                        <i class="fa fa-cloud-upload" aria-hidden="true">
                                            Agregar Nuevo Producto
                                        </i>
                                    </P>
                                </b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                include_once("modal/modal_nuevo_producto.php");
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="max-width:100%!important;margin: 0px">
                        <div class="modal-content" style="    height: 125vh;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">VISUALIZACIÓN ARCHIVO PDF </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL NUEVO CON PDF-->

                <!-- /.content -->
            </div>

        </div>
        <!-- /.content-wrapper -->





        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <!-- /.main footer -->

    </div>
    <!-- ./wrapper -->

    <?php

    include_once("modal/modal_editar_usuario.php");

    ?>

    <?php

    include_once("modal/modal_eliminar_usuario.php");

    ?>




    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../views/dist/js/adminlte.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="../views/plugins/sweetalert2/sweetalert2.css">
    <script type="text/javascript" charset="utf8" src="../views/plugins/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaDate').DataTable({
                "bJQueryUI": true,
                "order": [
                    [0, 'desc']
                ],
                "sPaginationType": "full_numbers",
                "bDestroy": true,
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0, 1]

                }],
                "aLengthMenu": [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "Todo"]
                ],
                "iDisplayLength": 10,

                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });

        });


        function goDetalle(matricula_id) {
            window.location.replace("http://localhost/GalileoAcademia/views/matricula_detalle.php?id_matricula=" +
                matricula_id);
        }
    </script>

    <script>
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date + ' ' + time;
        document.getElementById("currentDateTime").value = dateTime;
    </script>

    <script>
        $('#print').click(function() {
            $('.container_print').printThis({
                debug: false, // show the iframe for debugging  
                importCSS: true, // import parent page css
                importStyle: false, // import style tags
                printContainer: true, // print outer container/$.selector
                loadCSS: "", // path to additional css file - use an array [] for multiple
                pageTitle: "LISTA DE DOCUMENTOS ", // add title to print page
                removeInline: false, // remove inline styles from print elements
                removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
                printDelay: 333, // variable print delay
                header: "<center><h1>LISTA DE INGRESOS A LOGISTICA </h1></center>", // prefix to html
                footer: null, // postfix to html
                base: false, // preserve the BASE tag or accept a string for the URL
                formValues: true, // preserve input/form values
                canvas: false, // copy canvas content
                doctypeString: '...', // enter a different doctype for older markup
                removeScripts: false, // remove script tags from print content
                copyTagClasses: false, // copy classes from the html & body tag
                beforePrintEvent: null, // function for printEvent in iframe
                beforePrint: null, // function called before iframe is filled
                afterPrint: null // function called before iframe is removed
            });
        });
    </script>



    <script type="text/javascript">
        $(document).on("click", ".btnEditar7", function() {



            var id_user = $(this).attr("data-id");
            var dni_user = $(this).attr("data-dni");
            var nombre_user = $(this).attr("data-nombre");
            var apellido_user = $(this).attr("data-apellido");
            var sede_user_id = $(this).attr("data-sede");
            var clave_user = $(this).attr("data-contra");
            var tipo_user = $(this).attr("data-typeuser");



            



            //mostrar al modal
            $('#exampleModal2').modal('show');
            $('#idUser').attr('value', id_user);
            $('#txt_dni_edit').attr('value', dni_user);
            $('#txt_nombre_edit').attr('value', nombre_user);
            $('#txt_apellido_edit').attr('value', apellido_user);
            $('#txt_sedes_edit').attr('value', sede_user_id);
            $('#txt_sedes_edit').find("option").each(function() {
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
                                sede_edit: $('#txt_sedes_edit').val(),
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
                               //alert(data);
                            }
                        });

                    }
                })







            });


        });
    </script>



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
                            url: 'delete/delete_usuario.php',
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
                               // alert(data);
                            }
                        });

                    }
                })







            });


        });
    </script>






</body>

</html>