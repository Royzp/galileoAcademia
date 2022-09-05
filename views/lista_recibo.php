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
    <title>Academia Galileo</title>
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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




    </div>
    <!-- ./wrapper -->

    <?php

    include_once("modal/modal_eliminar_recibo.php");

    ?>







        <!-- MODAL   -->
        <div class="modal fade bd-example-modal-lg" id="modalReciboEmitido" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-color:#1471B6; background-color: #1471B6;padding: 0px 15px;">
                        <b>
                            <P class="modal-title" id="exampleModalLongTitle"
                                style="font-size: 30px;color: #FFFFFF; font-family: arial;">
                                <i class="fa fa-cloud-upload" aria-hidden="true" style="font-size: 18px;
                                    text-transform: uppercase;
                                    font-family: 'Source Sans Pro';">
                                    Recibo emitido
                                </i>
                            </P>
                        </b>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="position: relative;
                                top: 5px;
                                font-size: 36px;">
                                &times;
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-center">




                                    <!-- <div class="ticket" id="printId" style="width: 300px;"> -->
                                    <div id="printId" style="width: 300px;margin: 0 auto;">
                                        <div style="width: 100%;text-align:center">
                                            <img style="width: 200px;" src="../assets/img/logo_recibo.png"
                                                alt="Logotipo">
                                        </div>
                                        <p style="text-align:center;margin-bottom: 0px;">
                                            Parzibyte's blog
                                            <br> RECIBO N° <span id="idReciboRecibo"></span>
                                        </p>
                                        <p
                                            style="text-align: left;font-size: 16px;margin-bottom: 0px;text-transform: uppercase;font-weight: 600;">
                                            SEDE : <span id="idNombreSedeRecibo"> </span>
                                        </p>
                                        <p style="text-align:justify; font-size: 15px;margin-bottom: 0px;">

                                            F: <span id="idFechaRecibo"></span> - <span id="idHoraRecibo"></span>

                                        </p>
                                        <!-- <p style="text-align:justify; font-size: 15px;margin-bottom: 0px;">
                                            Fecha: <span id="idFechaRecibo"></span> - Hora: <span id="idHoraRecibo"></span>
                                        </p> -->

                                        <p style="text-align:center; font-size: 18px;margin-bottom: 0px;">
                                            <b id="idDescripcionRecibo">

                                                <b>
                                        </p>

                                        <p style="text-align:center; font-size: 18px;margin-bottom: 0px;">
                                            <b>
                                                <span id="idResponsableRecibo"></span>
                                                <b>
                                        </p>

                                        <table
                                            style="text-align:left;width: 100%;font-family: 'Source Sans Pro';font-weight:400;">
                                            <!-- <thead> -->
                                            <tr>
                                                <th
                                                    style="padding:3px 5px;font-size: 14px!important;font-weight:400;background: #fff;">
                                                    PRODUCTO</th>
                                                <th
                                                    style="padding:3px 5px;font-size: 14px!important;font-weight:400;background: #fff;">
                                                    CANT</th>
                                                <th
                                                    style="padding:3px 5px;font-size: 14px!important;font-weight:400;background: #fff;">
                                                    PU</th>
                                                <th
                                                    style="padding:3px 5px;font-size: 14px!important;font-weight:400;background: #fff;">
                                                    s/</th>
                                            </tr>

                                            <!-- </thead> -->
                                            <tbody id="tableReciboDetalle">

                                                <tr>
                                                    <td style="text-align:center;padding:3px 5px; max-width: 20px;">
                                                    </td>
                                                    <td style="padding:3px 5px; max-width: 20px;"></td>
                                                    <td style="    padding: 3px 5px;
                                                                    text-transform: uppercase;
                                                                    text-align: right;
                                                                    font-weight: bold;">TOTAL</td>
                                                    <td style="padding:3px 5px; " id="idMontoTotalRecibo"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p style="margin-top: 20px;">
                                            ¡GRACIAS POR SU PREFERENCIA!
                                            <!-- <br>parzibyte.me -->
                                        </p>

                                        <p style="    margin-bottom: 0px;
                                                    font-weight: 400;
                                                    font-size: 13px;
                                                    text-align: left;
                                                    text-transform: uppercase;">
                                            Vendedor: <span id="idCreadoPor"></span>

                                        </p>


                                    </div>

                                </div>

                                <div class="col-12">
                                    <!-- <button class="btn" onclick="printDocument('printId')">IMPRIMIR</button> -->
                                    <button class="btn" onclick="printRoy()">IMPRIMIR</button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
    <!-- importo todos los idiomas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment-with-locales.min.js"></script>

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
    $(document).on("click", ".btnEliminarRecibo", function() {
        var recibo_id   = $(this).attr("data-id");
        var recibo_id   = $(this).attr("data-numrecibo");
        var nombre_sede = $(this).attr("data-sede");
        var monto_total = $(this).attr("data-monto");
        var descripcion = $(this).attr("data-descripcion");
        var status = $(this).attr("data-status");

        
       

        

        //mostrar al modal
        $('#exampleModalEliminarRecibo').modal('show');
        $('#id_elim_recibo').attr('value', recibo_id);
        $('#numero_recibo_elim').attr('value', recibo_id);
        $('#sede_elim').attr('value', nombre_sede);
        $('#monto_elim').attr('value', monto_total);
        $('#descripcion_elimimar').attr('value', descripcion);
        $('#estado_elim').attr('value', status);

       
        
        



    });
    $('#exampleModalEliminarRecibo').on('shown.bs.modal', function() {
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
        $("#frm_eliminar_recibo").submit(function(e) {
            e.preventDefault();
            //validar que coincidan
            //para copiar dentro de if



            Swal.fire({
                title: 'Estas seguro de Eliminar el Recibo ?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, ingresar'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: 'delete/delete_recibo.php',
                        type: 'POST',
                        data: {

                            estado_eliminar: $('#estado_elim').val(),
                            descripcion: $('#descripcion_elimimar').val(),
                          
                          

                            id_recibo: $('#id_elim_recibo').val()

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



<script>
    
    function getDetalleRecibo(ID) {
        var body = {
            recibo_id: ID
        };
        $.ajax({
            type: "POST",
            url: "conexion_bd/consulta_reciboid.php",
            data: body,
            success: function(res) {
                console.info(res);
                let data = JSON.parse(res)
                console.info(data);
                let recibo = data.recibo;
                let arrayDetalle = data.detalle;
                var items = '';
                for (let i = 0; i < arrayDetalle.length; i++) {
                    const el = arrayDetalle[i];
                    items = items + `
                                        <tr>
                                            <td style="padding:3px 5px;text-transform: uppercase; ">${el.descripcion}</td>
                                            <td style="text-align:center;padding:3px 5px; max-width: 20px!important;">${parseInt(el.unidades)}</td>
                                            <td style="padding:3px 5px; max-width: 20px!important;">${el.precio_unitario}</td>
                                            <td style="padding:3px 5px; ">${el.total}</td>
                                        </tr>
                                            `;
                    if (arrayDetalle.length == i + 1) {
                        console.info(items);
                       

                        items = items + `
                        <tr>
                        <td style="text-align:center;padding:3px 5px; max-width: 20px;">
                        </td>
                        <td style="padding:3px 5px; max-width: 20px;"></td>
                        <td style="    padding: 3px 5px;
                        text-transform: uppercase;
                        text-align: right;
                        font-weight: bold;">TOTAL</td>
                        <td style="padding:3px 5px;">${recibo[0].monto_total}</td>
                        </tr>  `;

                        document.getElementById("tableReciboDetalle").innerHTML = items;
                    }
                }

                var hoy = new Date(recibo[0].created_date);
                var fecha = hoy.getDate() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getFullYear();
                var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();


                moment.locale('es');
                //
                var dateTime = moment(recibo[0].created_date);
                // formato de fecha miercoles 1, junio 2016
                var full = dateTime.format('dddd D, MMMM YYYY');
                // mes
                var mes = dateTime.format(' MMMM');
                // dia (escrito)
                var dia = dateTime.format('dddd');
                // dia
                var diaN = dateTime.format('D');
                /////
                // Update
                var full2 = dateTime.format('LL');
                //
                var fullTime = dateTime.format('llll');

                console.log(full, mes, dia, diaN, full2, fullTime);

                document.getElementById("idResponsableRecibo").innerHTML = recibo[0].responsable;
                // document.getElementById("idMontoTotalRecibo").innerHTML = recibo[0].monto_total;
                document.getElementById("idReciboRecibo").innerHTML = recibo[0].recibo_id;
                document.getElementById("idNombreSedeRecibo").innerHTML = recibo[0].nombre_sede;
                document.getElementById("idCreadoPor").innerHTML = recibo[0].created_by;
                document.getElementById("idDescripcionRecibo").innerHTML = recibo[0].descripcion;
                document.getElementById("idFechaRecibo").innerHTML = full;
                document.getElementById("idHoraRecibo").innerHTML = hora;
                // document.getElementById("idfullTime").innerHTML = fullTime;

                openModalReciboEmitido();
            }
        });
    }



    function openModalReciboEmitido() {
        $('#modalReciboEmitido').modal('show');
    }

    function printRoy() {
        var div = document.querySelector("#printId");
        var ventana = window.open('', 'PRINT', 'height=600,width=1000');
        ventana.document.write('<html>');

        ventana.document.write('<body>');
        ventana.document.write('<br> <br><div class="container-fluid">');

        ventana.document.write('<div class="row">');
        ventana.document.write('<div>');
        ventana.document.write(div.innerHTML);
        ventana.document.write('</div>');
        ventana.document.write('</div>');

        ventana.document.write('</div>');
        ventana.document.write('</body></html>');

        ventana.document.close();

        ventana.focus();
        ventana.print();
        ventana.close();
        return true;
    }
</script>





</body>

</html>