<?php
session_start();
if (empty($_SESSION['active'])) {
    header('location: http://localhost:8080/GalileoAcademia/');
}
$mysqli = new mysqli('localhost', 'root', '', 'bd_academia');
include_once 'conexion_bd/conexion.php';
include_once 'conexion_bd/config_conexion.php';
include_once 'conexion_bd/datos_recibos.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ferreteria</title>
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image" href="../views/dist/img/martillo.png" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- style -->
    <link rel="stylesheet" href="styles/menu_lateral.css">
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

        <!-- Navbar -->
       <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../views/pantalla_principal_s.php" class="nav-link"> <i class="fa fa-home" aria-hidden="true">Inicio</i></a>
        </li>



        <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->


      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>



        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fa fa-power-off"></i>
          </a>
        </li>
      </ul>
    </nav>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #ffff;">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../views/dist/img/gali.png" width="230" height="90">
        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span>-->
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="" align="center">
          <div class="image">
            <img src="../views/dist/img/docente.png" style="height:100px;width: 100px;">
          </div>
          <div class="info" align="center">
            <a href="#" style="color: black;font-weight: bold;"><?php echo $_SESSION['nombre']; ?></a>



            <!-- <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span> -->


          </div>
        </div>

        <br>

      
        <!-- Sidebar Menu -->
        <nav class="mt-2">


          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            

            <li class="nav-header" style="color:black;font-weight: bold;">PANEL PRINCIPAL</li>

            <li class="nav-item" >
                    <a href="registro_alumno_s.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Matricula</p>
                    </a>
                </li>

                <li class="nav-item" >
                    <a href="lista_matriculas_s.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lista de Matriculas
                        </p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="venta_items_s.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Venta de Items
                            <!-- <span class="badge badge-info right">2</span> -->
                        </p>
                    </a>
                </li>


           

            <li class="nav-header" style="color:black;font-weight: bold;">REPORTE</li>

            <li class="nav-item" >
                    <a href="lista_recibo_s.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Recibos emitidos</p>
                    </a>
                </li>

                <li class="nav-item" >
                    <a href="lista_recibo_extornado_s.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Recibos extornados</p>
                    </a>
                </li>


            <!-- Fin -->

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1 align="center" class="title__page">
                            <img src="../views/dist/img/venta.png" style="width: 40px;"> Lista de Recibos emitidos
                        </h1>
                    </div>
                </div>

                <div class="container-fluid">
                    <?php
                    include_once("tablas/tabla_recibos.php");
                    ?>
                </div>

                <!-- MODAL   -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal9" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#1471B6; ">
                                <b>
                                    <P class="modal-title" id="exampleModalLongTitle"
                                        style="font-size: 30px;color: #FFFFFF; font-family: arial;">
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
                                <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%"
                                    height="100%"></iframe>
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


        <?php  include_once("navbar_cerrar_sesion.php") ?>

    </div>
    <!-- ./wrapper -->

    <?php

    include_once("modal/modal_editar_producto.php");

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


    <script>
    $(document).ready(function() {
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function() {
            $("#from_date").datepicker();
            $("#to_date").datepicker();
        });
        /*$('#button_filter_in').click(function() {
          var from_date = $('#from_date').val();
          var to_date = $('#to_date').val();
          // alert(from_date + to_date);
          if (from_date != '' && to_date != '') {
            $.ajax({
              url: "filter_logistica.php",
              method: "POST",
              data: {
                from_date: from_date,
                to_date: to_date
              },
              success: function(data) {
                $('#order_table').html(data);
              }
            });
          } else {
            alert("Seleccione una Fecha");
          }
        });*/
    });
    </script>











    <!--  FORMULARIO EDITAR FORMULARIO -->

    <script type="text/javascript">
    $(document).on("click", ".btnEditarDocument", function() {
        var id_producto = $(this).attr("data-id");
        var nombre_producto = $(this).attr("data-producto");
        var categoria = $(this).attr("data-categoria");
        var lote = $(this).attr("data-lote");
        var stock = $(this).attr("data-stock");
        var precio_venta = $(this).attr("data-precio");
        var proveedor = $(this).attr("data-proveedor");
        var marca = $(this).attr("data-marca");
        var modelo = $(this).attr("data-modelo");
        var unidad_medida = $(this).attr("data-unidad");
        var foto_producto = $(this).attr("data-foto");




        //mostrar al modal
        $('#exampleModal2').modal('show');
        $('#idDocumento').attr('value', id_producto);
        $('#txt_nombre_producto').attr('value', nombre_producto);

        $('#txt_categoria_edit').attr('value', categoria);
        $('#txt_categoria_edit').find("option").each(function() {
            if ($(this).val() == categoria) {
                $(this).prop("selected", "selected");
            }

        });

        $('#txt_lote_edit').attr('value', lote);
        $('#txt_stock_edit').attr('value', stock);
        $('#txt_precio_edit').attr('value', precio_venta);

        $('#txt_proveedor_edit').attr('value', proveedor);
        $('#txt_proveedor_edit').find("option").each(function() {
            if ($(this).val() == proveedor) {
                $(this).prop("selected", "selected");
            }

        });

        $('#txt_marca_edit').attr('value', marca);
        $('#txt_modelo_edit').attr('value', modelo);
        $('#txt_unidad_edit').attr('value', unidad_medida);
        $('#txt_foto_edit').attr('value', foto_producto);





    });
    $('#exampleModal2').on('shown.bs.modal', function() {
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
        $("#Actualizar_Doc").submit(function(e) {
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
                        url: 'update/update_logistica.php',
                        type: 'POST',
                        data: {

                            numero_edit: $('#numero_compra_edit').val(),
                            peru_edit: $('#peru_compra_edit').val(),
                            fecha_edit: $('#fecha_emision_edit').val(),
                            dias_edit: $('#dia_entrega_edit').val(),
                            expediente_edit: $('#expediente_edit').val(),
                            document_edit: $('#documento_edit').val(),
                            siaf_edit: $('#siaf_edit').val(),
                            meta_edit: $('#meta_edit').val(),
                            area_usuaria_edit: $('#area_edit').val(),
                            provee_edit: $('#proveedor_edit').val(),
                            monto_edit: $('#monto_edit').val(),
                            descript_edit: $('#descripcion_edit').val(),

                            id_logistica: $('#id_Documento_logistica').val()

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
    $(document).on("click", "#btnEliminar", function() {
        var id_document = $(this).attr("data-id");
        Swal.fire({
            title: 'Estas seguro de Eliminar ?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, ingresar'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: 'delete/delete_logistica.php',
                    type: 'POST',
                    data: {
                        datito: id_document
                    },

                    success(data) {
                        if (data >= "1") {
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
    </script>

    <!-- FIN DELETE DOCUMENTO -->

    <!-- REGISTRO DE NUEVO MODAL -->

    <script>
    function select_producto() {



        var id_producto = $("#txt_producto_id").val();
        //alert("Hola select =" + id_caja);

        var ob = {
            id_producto: id_producto
        };

        $.ajax({
            type: "POST",
            url: "conexion_bd/mostrar_datos_productos.php",
            data: ob,
            beforeSend: function(objeto) {

            },
            success: function(data) {

                $("#preProducto").html(data);

            }


        });


    }
    </script>


















    <script>
    function preview(e) {
        // console.log(e.target.files);

        const url = e.target.files[0];
        const urlTmp = URL.createObjectURL(url);

        document.getElementById("img-preview").src = urlTmp;
        document.getElementById("icon-image").classList.add("form-group");
        document.getElementById("icon-cerrar").innerHTML =
            '<button class="btn btn-danger" onclick="deleteImg(event)"><i class="fas fa-times"></i></button>';

    }

    function deleteImg(e) {

        document.getElementById("icon-cerrar").innerHTML = '';
        document.getElementById("icon-image").classList.add("form-group");
        document.getElementById("img-preview").src = '';

    }
    </script>

    <script>
    function preview2(e) {
        // console.log(e.target.files);

        const url = e.target.files[0];
        const urlTmp = URL.createObjectURL(url);

        document.getElementById("img-preview2").src = urlTmp;
        document.getElementById("icon-image2").classList.add("form-group");
        document.getElementById("icon-cerrar2").innerHTML =
            '<button class="btn btn-danger" onclick="deleteImg2(event)"><i class="fas fa-times"></i></button>';

    }

    function deleteImg2(e) {

        document.getElementById("icon-cerrar2").innerHTML = '';
        document.getElementById("icon-image2").classList.add("form-group");
        document.getElementById("img-preview2").src = '';

    }
    </script>


    <script>
    function preview3(e) {
        // console.log(e.target.files);

        const url = e.target.files[0];
        const urlTmp = URL.createObjectURL(url);

        document.getElementById("img-preview3").src = urlTmp;
        document.getElementById("icon-image3").classList.add("form-group");
        document.getElementById("icon-cerrar3").innerHTML =
            '<button class="btn btn-danger" onclick="deleteImg3(event)"><i class="fas fa-times"></i></button>';

    }

    function deleteImg3(e) {

        document.getElementById("icon-cerrar3").innerHTML = '';
        document.getElementById("icon-image3").classList.add("form-group");
        document.getElementById("img-preview3").src = '';

    }
    </script>







</body>

</html>