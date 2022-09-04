<?php
session_start();
if (empty($_SESSION['active'])) {
    header('location: http://localhost:8080/GalileoAcademia/');
}
$mysqli = new mysqli('localhost', 'root', '', 'bd_academia');
include_once 'conexion_bd/conexion.php';
include_once 'conexion_bd/config_conexion.php';
include_once 'conexion_bd/datos_items.php';

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
                <div class="row">
                    <div class="col-12">
                        <h1 align="center" class="title__page">
                            <img src="../views/dist/img/venta.png" style="width: 40px;"> Lista de Items
                        </h1>
                    </div>
                </div>

                <div class="container-fluid">
                    <?php
                    include_once("tablas/tabla_items.php");
                    ?>
                </div>

                <!-- MODAL   -->




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

    include_once("modal/modal_eliminar_item.php");

    ?>

    <?php

    include_once("modal/modal_editar_item.php");

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


        
    </script>


    <script type="text/javascript">
        function onSubmitProducto() {

            var frm = document.getElementById('frm_producto_ferreteria');
            var df = new FormData(frm);

            $.ajax({
                url: 'insert_ferreteria_producto.php',
                type: 'POST',
                processData: false,
                contentType: false,
                data: df,
                success(data) {
                    console.log(data);


                    if (data == 'success') {

                        // 1. RESET FORMULARIO   
                        $('#frm_producto_ferreteria').trigger('reset');
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

        function openModelPDF(url) {
            $('#modalPdf').modal('show');


            $('#iframePDF').attr('src', '<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/GestionInformatica/views/'; ?>' +
                url);
        }
    </script>

    <!-- FIN DE REGISTRO MODAL -->




    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.mi-selector').select2();
            });
        });
    </script>


    


    <!--  FORMULARIO EDITAR FORMULARIO -->

    <script type="text/javascript">
        $(document).on("click", ".btnEditarItems", function() {
            var concepto_id = $(this).attr("data-id");
            var tipo_concepto = $(this).attr("data-tipoconcepto");
            var concepto = $(this).attr("data-concepto");
            var precio = $(this).attr("data-precio");
            var estate = $(this).attr("data-estate");
            var tipo_concepto_id = $(this).attr("data-idtipo");
           
            




            //mostrar al modal
            $('#exampleModalEditItems').modal('show');
            $('#id_editarrr_item').attr('value', concepto_id);
            $('#tipo_concepto_edit').attr('value', tipo_concepto_id);
            $('#tipo_concepto_edit').find("option").each(function() {
                if ($(this).val() == tipo_concepto_id) {
                    $(this).prop("selected", "selected");
                }

            });


            $('#txt_concepto_edit').attr('value', concepto);
            $('#txt_precio_edit').attr('value', precio);
            $('#txt_estatus_editt').attr('value', estate);
            // $('#txt_idtipo_editt').attr('value', tipo_concepto_id);
          




        });
        $('#exampleModalEditItems').on('shown.bs.modal', function() {
            //alert("Registro Encontrado");
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
            $("#form_editar_items").submit(function(e) {
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
                            url: 'update/update_items.php',
                            type: 'POST',
                            data: {

                                   concepto: $('#txt_concepto_edit').val(), 
                                precio_edit: $('#txt_precio_edit').val(),
                                idtipo_edit: $('#tipo_concepto_edit').val(),
                                concepto_id: $('#id_editarrr_item').val()

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

    <script>
        function updateProducto() {

            //alert("Prueba");
            let frm = document.getElementById('actualizar_producto');
            let df = new FormData(frm);
            // var id_document = $(this).attr("data-id");

            var id_producto = $('#idDocumento').val();

            $.ajax({
                url: 'update_producto.php?id_produc=' + id_producto,
                type: 'POST',
                processData: false,
                contentType: false,
                data: df,
                /*
                data: {
                  id_doc: id_document
                },*/

                success(data) {
                    console.info(data);
                    if (data == 'success') {
                        // 1. RESET FORMULARIO   
                        $('#actualizar_producto').trigger('reset');
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






    <!--  FIN FORMULARIO EDITAR DOCUMENTO -->


    <!-- DELETE DOCUMENTO -->

    <script type="text/javascript">
        $(document).on("click", ".btnEliminarItems", function() {
            var concepto_id = $(this).attr("data-id");
            var concepto = $(this).attr("data-concepto");
            var precio = $(this).attr("data-precio");
            var estate = $(this).attr("data-estate");
           
           
            




            //mostrar al modal
            $('#exampleModalElimItems').modal('show');
            $('#id_elim_Item').attr('value', concepto_id);
           

            $('#concepto_elim').attr('value', concepto);
            $('#precio_elim').attr('value', precio);
            $('#estado_elim').attr('value', estate);
            // $('#txt_idtipo_editt').attr('value', tipo_concepto_id);
          




        });
        $('#exampleModalElimItems').on('shown.bs.modal', function() {
            //alert("Registro Encontrado");
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
            $("#frm_eliminar_item").submit(function(e) {
                e.preventDefault();
                //validar que coincidan
                //para copiar dentro de if



                Swal.fire({
                    title: 'Estas seguro de Eliminar Item?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, ingresar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: 'delete/delete_items.php',
                            type: 'POST',
                            data: {

                                   
                                estado_elim: $('#estado_elim').val(),
                                concept_id: $('#id_elim_Item').val()

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


    <!-- FIN DELETE DOCUMENTO -->






</body>

</html>