<?php
session_start();
if (empty($_SESSION['active'])) {
    header('location: http://localhost:8080/GalileoAcademia/');
}
$mysqli = new mysqli('localhost', 'root', '', 'bd_academia');
include_once 'conexion_bd/conexion.php';
include_once 'conexion_bd/config_conexion.php';
include_once 'conexion_bd/datos_egresos.php';

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
                            <img src="../views/dist/img/venta.png" style="width: 40px;"> Lista de egresos
                        </h1>

                        <div class="form-group col-md-4">
                            <button type="button" data-toggle="modal" class="btn btn-secondary" data-target=".bd-example-modal-lg" style="height: 48px;  width: 136px; margin-left: 1%;">
                                Nuevo Egreso
                            </button>

                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <?php
                    include_once("tablas/tabla_egreso.php");
                    ?>
                </div>

                <!-- MODAL   -->
                <div class="modal fade bd-example-modal-lg" id="exampleModalEditEgresos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#CF4D10; ">
                                <b>
                                    <P class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;color: #FFFFFF; font-family: arial;">
                                        <i class="fa fa-cloud-upload" aria-hidden="true" style="font-family: system-ui;">
                                            Agregar Nuevo Egreso
                                        </i>
                                    </P>
                                </b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                include_once("modal/modal_nuevo_egreso.php");
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


        <?php include_once("navbar_cerrar_sesion.php") ?>

        <!-- /.main footer -->

    </div>
    <!-- ./wrapper -->

    <?php

    include_once("modal/modal_eliminar_matricula.php");

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
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.mi-selector').select2();
            });
        });
    </script>


<script type="text/javascript">
    function onSubmitEgresos() {

      var frm = document.getElementById('frm_registro_egresos');
      var df = new FormData(frm);

      $.ajax({
        url: 'insert/insert_egresos.php',
        type: 'POST',
        processData: false,
        contentType: false,
        data: df,
        success(data) {
          console.log(data);


          if (data == 'success') {

            // 1. RESET FORMULARIO   
            $('#frm_registro_egresos').trigger('reset');
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


      $('#iframePDF').attr('src', '<?php echo 'http://'. $_SERVER['HTTP_HOST'].'/GestionInformatica/views/'; ?>' + url);
    }


  </script>







    <!--  FORMULARIO EDITAR FORMULARIO -->

    <script type="text/javascript">
        $(document).on("click", ".btnEliminarMAtricula", function() {
            var matricula_id = $(this).attr("data-id");
            var nombre = $(this).attr("data-nombre");
            var nombre_ciclo = $(this).attr("data-ciclo");
            var nombre_periodo = $(this).attr("data-periodo");
            var estate = $(this).attr("data-estado");






            //mostrar al modal
            $('#exampleModalEliminarMatricula').modal('show');
            $('#id_elim_Matricula').attr('value', matricula_id);
            $('#nombre_matricula_elim').attr('value', nombre);
            $('#nombre_ciclo_elim').attr('value', nombre_ciclo);


            $('#nombre_periodo_elim').attr('value', nombre_periodo);
            $('#estado_elim').attr('value', estate);





        });
        $('#exampleModalEliminarMatricula').on('shown.bs.modal', function() {
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
            $("#frm_eliminar_matricula").submit(function(e) {
                e.preventDefault();
                //validar que coincidan
                //para copiar dentro de if



                Swal.fire({
                    title: 'Estas seguro de Eliminar esta Matricula?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, ingresar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: 'delete/delete_matricula.php',
                            type: 'POST',
                            data: {


                                status_eliminar: $('#estado_elim').val(),


                                id_matricula: $('#id_elim_Matricula').val()

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


    <script type="text/javascript">
    function showDiv2(select) {
    //   document.getElementById('hi1').style.display = "block";
      if (select.value == 6) {
        document.getElementById('hidden_div1').style.display = "block";
        document.getElementById('hidden_div2').style.display = "none";
      } else {
        document.getElementById('hidden_div1').style.display = "none";
        document.getElementById('hidden_div2').style.display = "block";
      }

    }
  </script>


<script type="text/javascript">
        $(document).on("click", ".btnEditarEgresos", function() {
            var concepto_id = $(this).attr("data-id");
            var tipo_concepto = $(this).attr("data-tipoconcepto");
            var concepto = $(this).attr("data-concepto");
            var precio = $(this).attr("data-precio");
            var estate = $(this).attr("data-estate");
            var tipo_concepto_id = $(this).attr("data-idtipo");
           
            




            //mostrar al modal
            $('#exampleModalEditEgresos').modal('show');
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
        $('#exampleModalEditEgresos').on('shown.bs.modal', function() {
            //alert("Registro Encontrado");
        });
    </script>






</body>

</html>