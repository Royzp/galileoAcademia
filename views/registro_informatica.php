<?php
session_start();
if (empty($_SESSION['active'])) {
  header('location: http://localhost:8080/GestionInformatica/');
}
$mysqli = new mysqli('localhost', 'root', '', 'bdapp14');
include_once 'conexion_bd/conexion.php';
include_once 'conexion_bd/config_conexion.php';

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
  <title>Gestion | Informatica</title>

  <script src="../views/plugins/jquery/jquery.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <link rel="icon" type="image" href="../views/dist/img/gobierno.jpg" />

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">


  <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">


  <!--<link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/styles_tabla.css">-->


  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style type="text/css">
    .style_status1 {

      background: #18C413;
      color: #fff;
      font-weight: bold;


    }

    .style_status2 {

      background: #621292;
      color: #fff;
      font-weight: bold;
    }

    .style_status3 {

      background: #828080;
      color: #fff;
      font-weight: bold;

    }
  </style>

  <style type="text/css">
    .button {
      display: inline-block;
      padding: 15px 25px;
      font-size: 18px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: #255629;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
    }

    .button:hover {
      background-color: #3e8e41
    }

    .button:active {
      background-color: #3e8e41;
      box-shadow: 0 5px #666;
      transform: translateY(4px);
    }


    .paginador ul {

      padding: 15px;
      list-style: none;
      background: #FFF;
      margin-top: 15px;
      display: -webkit-flex;
      display: -moz-flex;
      display: -ms-flex;
      display: -o-flex;
      display: flex;
      justify-content: flex-start;

    }


    .paginador a,
    .pageSelected {

      color: #428bca;
      border: 1px solid #ddd;
      padding: 5px;
      display: inline-block;
      font-size: 14px;
      text-align: center;
      width: 35px;

    }

    .paginador a:hover {

      background: #ddd;
      cursor: pointer;

    }

    .pageSelected {

      color: #fff;
      background: #428bca;
      border: 1px solid #428bca;
    }

    /*==============================*/

    .title__page {
      font-family:  arial;
      font-weight: bold;
      border: none;
      padding: 5px;
      background: #FFFFFF ;
      color: black;
      font-size: 34px;
    }

    .title__page img {
      height: 55px;
      width: auto;
    }

    .btn__pdf {
      background: transparent;
      border: 1px solid red !important;
      border-radius: 6px !important;
      padding: 2px 5px;
    }

    .btn__pdf img {
      height: 40px;
      width: auto;
    }


    .table th {

      font-size: 13px !important;
      padding: 5px !important;
    }

    .table td {

      font-size: 16px !important;
      padding: 5px !important;
    }
  </style>


</head>

<!--<body class="hold-transition sidebar-mini" style="zoom: 80%;">-->

<!--<body class="hold-transition sidebar-mini" style="zoom: 90%;">-->
<body class="hold-transition sidebar-mini" >
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../views/pantalla_principal.php" class="nav-link"><i class="fa fa-home" aria-hidden="true">Inicio</i></a>
        </li>

        <!-- <li class="nav-item d-none d-sm-inline-block">
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


        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->


        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <!-- CERRRAR SESION -->
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fa fa-power-off"></i>
          </a>
        </li>
        <!-- CERRRAR SESION  END -->


      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../views/dist/img/grr.png" width="230" height="100">
        <!-- <span class="brand-text font-weight-light">AdminLTE 3</span>-->
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <div class="">
          <div class="image" align="center">
            <img src="../views/dist/img/profile.png" width="70" height="70">
          </div>
          <div class="info" align="center">
            <a href="#"> <?php echo $_SESSION['nombre']; ?> </a>
            <!--  <?php echo $_SESSION['nombre']; ?> -->
            <span class="hidden-xs"></span>
          </div>
        </div>
        <br>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


         

            <li class="nav-header">PANEL PRINCIPAL</li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Control Accesos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="registro_usuarios.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registro Usuarios</p>
                  </a>
                </li>

                <!--  <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li> -->


              </ul>
            </li>


            <li class="nav-header">DOCUMENTACIÓN</li>

            <li class="nav-item">
              <a href="registro_informatica.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Registro Documentos
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
           
            

            <!-- Nueva Variables -->
            <li class="nav-header">REPORTE</li>
            <li class="nav-item">
              <a href="estados_proceso.php" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Estado de proceso
                  <!-- <span class="badge badge-info right">2</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporte_almacen.php" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Reporte</p>
              </a>
            </li>
            <!-- Fin -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <h1 align="center" class="title__page">
      <img src="../views/dist/img/contrato.png"> DOCUMENTOS RECEPCIONADOS 
    </h1>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <!-- BUTTON  DE REGISTRO -->

      <div class="col-md-12">
        <button type="button" data-toggle="modal" data-target=".bd-example-modal-lg" style="height: 48px;
                 width: 121px;
         border-radius: 8px;
            background: #1C72B2;
                 color: white;
                  font: message-box;">
          AGREGAR
        </button>






      </div>
      <!-- <div class=" pull-right"> -->
      <div class=" pull-right">
        <div class="col-md-12">
          <form action="busqueda_logistica.php" method="get" class="form_search">
            <input id="text_search_logistica" placeholder="Ingrese Datos a Buscar" style="width: 442px;height: 42px;padding-left: 13px;" type="text" name="busqueda" id="busqueda">
            <button id="button_search_logistica" class="button" type="button" value="BUSCAR" style="height: 48px;
                   width: 121px;
                  border-radius: 8px;
                  background: #5A5C5E;
                  
                  color: white;
                  font: message-box;">
              Buscar
            </button>
            <br>

            <div class="form-group col-md-12">
              <label>Criterios de Búsqueda: </label>&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rb_search_logistica" id="rb01_search_logistica" value="1" checked>
                <label class="form-check-label" for="rb01_search_logistica">Nº Documento</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rb_search_logistica" id="rb02_search_logistica" value="2">
                <label class="form-check-label" for="rb02_search_logistica">Área Usuaria</label>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label>Criterios de Orden: </label>&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rb_order_logistica" id="rb01_order_logistica" value="1" checked>
                <label class="form-check-label" for="rb01_order_logistica">Recientes Primero</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rb_order_logistica" id="rb02_order_logistica" value="2">
                <label class="form-check-label" for="rb02_order_logistica">Antiguos Primero</label>
              </div>
            </div>
            <div class="form-group row col-md-12">
              <div class="col-md-3">
                <input style="border-color: #868785;" type="text" name="from_date" id="from_date" class="form-control" placeholder="Fecha Inicial" autocomplete="off">
              </div>
              <div class="col-md-3">
                <input style="border-color: #868785;" type="text" name="to_date" id="to_date" class="form-control" placeholder="Fecha Final" autocomplete="off">
              </div>
              <div class="col-md-6">
                <input type="hidden" id="pagina" name="pagina" value="1">
                <input type="hidden" id="tipo" name="tipo" value="0">
                <input type="hidden" id="status_filter" name="status_filter" value="0">
                <input style=" padding: 10px;
                                background:#4BB020;
                                      color: #fff;
                              border-radius: 8px;
                                    border: none;" type="button" name="button_filter_in" id="button_filter_in" value="Aplicar Filtro">
                <input style="padding: 10px;
                                background:#c20521;
                                      color: #fff;
                              border-radius: 8px;
                                    border: none;" type="button" name="button_filter_out" id="button_filter_out" value="Quitar Filtro">
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- BUTTON FIN -->

      <br>
      <br>
      <br>
      <br>





      <!-- TABLA DE INGRESO DOSUMENTOS -->


      <div style="clear:both;"></div>
      <br>

      
        <div class="col-md-12" id="order_table">



        </div>
      
      


      <!-- Expotar  a Excel-->
      <div class="row" aling="center">


        <div class="form-group col-md-12">


          <div class="form-group col-md-6">
            <a href="excel/excel_upload.php" class="btn btn-success" style="height: 36px;
                                                                             width: 167px;
                                                                            margin: 8px -37px;
                                                                          position: relative;
                                                                               top: 92%;
                                                                              left: 74%;">
              Exportar Excel

            </a>

            <a id="print"    class="btn btn-danger"                  style="height: 36px;
                                                                             width: 167px;
                                                                             margin: 9px 55px;
                                                                          position: relative;
                                                                               top: 92%;
                                                                              left: 74%;">Imprimir</a>



          </div>



        </div>



      </div>

      



     


      <!-- MODAL DE REGISTRO DE DOCUMENTO -->


      <!-- MODAL   -->
      <div class="modal fade bd-example-modal-lg" id="exampleModal9" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#1471B6; ">
              <b>
                <P class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;
                                                                      color: #FFFFFF; font-family:  arial;" ><i class="fa fa-cloud-upload" aria-hidden="true">
                    <img src="../views/dist/img/contrato.png" style="width: 70px;
                                                       margin-right: 17px;">
                    REGISTRO  DOCUMENTOS INFORMÁTICOS

                  </i></P>
              </b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php
              include_once("modal/modal_registro_informatica.php");
              ?>
            </div>
          </div>
        </div>
      </div>




      <!-- FIN MODAL DOCUMENTO -->








      <!-- Modal Editar Docuemneto -->



      <!-- Fin Modal Documento -->



      <!-- MODAL NUEVO CON PDF-->


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
    <!-- /.content-wrapper -->





    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark" style="height: 300px;">
      <!-- Control sidebar content goes here -->
      <div class="p-3" align="center">

        <h3 style="font-family:courier,arial,helvética; font-weight: bold;">Control Almacen</h3>
        <hr style="background: #2246B0;">
        <img src="../views/dist/img/user_acc.png" width="70" height="70">

        <h6><?php echo $_SESSION['nombre']; ?></h6>
        <hr style="background: #2246B0;">
        <div style="background: #2246B0;
                      height: 30px;
                       width: 160px; ">


          <a href="salir.php"> <img src="../views/dist/img/iu.png" width="20" height="20">CERRAR SESION</a>
        </div>


      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Desarrollado por : OFICINA DE INFORMATICA
      </div>
      <!-- Default to the left -->
      <strong>Sistema Informatico</strong> Control Almacen
    </footer>
  </div>
  <!-- ./wrapper -->

  <?php

  include_once("modal/modal_editar_documento.php");

  ?>



  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->

  <!-- Bootstrap 4 -->
  <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../views/dist/js/adminlte.min.js"></script>

  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

 <!-- <script src="Pdf/printThis.js"></script>-->



  <!--<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
            <script type="text/javascript" src="js/daterangepicker"></script>   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" />  -->

 <!-- <script type="text/javascript" src="../views/script/tablas_responsive.js"> </script>-->

  <link rel="stylesheet" type="text/css" href="../views/plugins/sweetalert2/sweetalert2.css">
  <script type="text/javascript" charset="utf8" src="../views/plugins/sweetalert2/sweetalert2.min.js"></script>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
  </script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  


  <script>
         $('#print').click(function() {
            $('.container_print').printThis({

               
            debug: false,               // show the iframe for debugging  
            importCSS: true,            // import parent page css
            importStyle: false,         // import style tags
            printContainer: true,       // print outer container/$.selector
            loadCSS: "",                // path to additional css file - use an array [] for multiple
            pageTitle: "LISTA DE DOCUMENTOS ",              // add title to print page
            removeInline: false,        // remove inline styles from print elements
            removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
            printDelay: 333,            // variable print delay
            header:"<center><h1>LISTA DE INGRESOS A LOGISTICA </h1></center>",               // prefix to html
            footer: null,               // postfix to html
            base: false,                // preserve the BASE tag or accept a string for the URL
            formValues: true,           // preserve input/form values
            canvas: false,              // copy canvas content
            doctypeString: '...',       // enter a different doctype for older markup
            removeScripts: false,       // remove script tags from print content
            copyTagClasses: false,      // copy classes from the html & body tag
            beforePrintEvent: null,     // function for printEvent in iframe
            beforePrint: null,          // function called before iframe is filled
            afterPrint: null            // function called before iframe is removed




            });
           

         });
      </script>

  <script type="text/javascript">
    function onSubmitInformatica() {

      var frm = document.getElementById('frm_informatica');
      var df = new FormData(frm);

      $.ajax({
        url: 'upload_informatica.php',
        type: 'POST',
        processData: false,
        contentType: false,
        data: df,
        success(data) {
          console.log(data);


          if (data == 'success') {

            // 1. RESET FORMULARIO   
            $('#frm_informatica').trigger('reset');
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
      var id_logistica = $(this).attr("data-id");
      var numero_orden_compra = $(this).attr("data-numero");
      var peru_compra = $(this).attr("data-fecha");
      var fecha_emision_compra = $(this).attr("data-fecha-emision");
      var dias_entrega = $(this).attr("data-dias");
      var expediente = $(this).attr("data-exp");
      var documento = $(this).attr("data-document");
      var siaf = $(this).attr("data-siaf");
      var meta = $(this).attr("data-meta");
      var area_usuaria = $(this).attr("data-area");
      var proveedor = $(this).attr("data-prove");
      var monto_compra = $(this).attr("data-monto");
      var descripcion_compra = $(this).attr("data-descrip");

      var archivo_compra = $(this).attr("data-archivo");

      //mostrar al modal
      $('#exampleModal2').modal('show');
      $('#id_Documento_logistica').attr('value', id_logistica);
      $('#numero_compra_edit').attr('value', numero_orden_compra);
      $('#peru_compra_edit').attr('value', peru_compra);
      $('#fecha_emision_edit').attr('value', fecha_emision_compra);
      $('#dia_entrega_edit').attr('value', dias_entrega);
      $('#expediente_edit').attr('value', expediente);
      $('#documento_edit').attr('value', documento);
      $('#siaf_edit').attr('value', siaf);
      $('#meta_edit').attr('value', meta);


      $('#area_edit').attr('value', area_usuaria);
      $('#area_edit').find("option").each(function() {
        if ($(this).val() == area_usuaria) {
          $(this).prop("selected", "selected");
        }

      });

      $('#proveedor_edit').attr('value', proveedor);
      $('#monto_edit').attr('value', monto_compra);
      $('#descripcion_edit').attr('value', descripcion_compra);
      $('#actualizar_nuevo_pdf').attr('value', archivo_compra);




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
    function updateNewPdf() {

      alert("Prueba");
      let frm = document.getElementById('Actualizar_documento_logistica');
      let df = new FormData(frm);
      // var id_document = $(this).attr("data-id");

      var id_logistica = $('#id_Documento_logistica').val();

      $.ajax({
        url: 'upload_pdf.php?id_doc=' + id_logistica,
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
            $('#Actualizar_documento_logistica').trigger('reset');
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
    $('#frm_hotel').submit(function(event) {
      event.preventDefault();
      var parametros = new FormData($('#frm_hotel')[0]);
      $.ajax({

        type: 'POST',
        datatype: 'json',
        data: parametros,
        url: 'insert/insert_hotel.php',
        contentType: false,
        processData: false,
        success: function(info) {
          if (info) {
            pacejs();
            great(info);

            limpiar();
            $('#exampleModal8').modal('hide');

          } else {
            bad();
            limpiar();
          }
        },

        error: function(info) {
          bad();
        }

      });

    });
  </script>

  <script>
    function great(info) {
      Push.create("Excelente!", {
        body: info,
        timeout: 4000,
        onClick: function() {
          window.focus();
          this.close();
        }

      });
    }


    function bad() {
      Push.create("Error!", {

        body: "Ingresar los datos Completos",
        timeout: 2000,
        onClick: function() {
          window.focus();
          this.close();
        }

      });
    }

    function limpiar() {
      $('#nombre_hotel').val('');
      $('#provincia_hotel').val('');
      $('#distrito_hotel').val('');
      $('#direccion_hotel').val('');
      $('#latitud').val('');
      $('#longitud').val('');
      $('#foto').filestyle('clear');

    }


    function pacejs() {
      Pace.start();
      Pace.bar.render();
      Pace.stop();
    }
  </script>






  <script>
    $(document).ready(function() {
      $('#tipo').val(0);
      fn_search_logistica();
      $('#provincia_hotel').change(function() {
        var id_provincia = $("#provincia_hotel").val();
        $.ajax({
          url: 'getDistrito.php',
          type: 'POST',
          data: {
            id_provincia: id_provincia
          },
          success(data) {
            $("#distrito_hotel").html("");
            $("#distrito_hotel").html(data);
          }
        });
      });
      $('#button_search_logistica').click(function() {
        $('#tipo').val(1);
        fn_search_logistica();
      });
      $('#rb01_order_logistica').click(function() {
        $('#tipo').val(1);
        fn_search_logistica();
      });
      $('#rb02_order_logistica').click(function() {
        $('#tipo').val(1);
        fn_search_logistica();
      });
      $('#button_filter_in').click(function() {
        $('#tipo').val(1);
        $('#status_filter').val(1);
        fn_search_logistica();
      });
      $('#button_filter_out').click(function() {
        //$('#tipo').val(0);
        $('#status_filter').val(0);
        $('#from_date').val('');
        $('#to_date').val('');
        fn_search_logistica();
      });
    });
  </script>

  <script>
    function fn_paginador(pagina) {
      $('#pagina').val(pagina);
      fn_search_logistica();
    }
  </script>

  <script>
    function fn_search_logistica() {
      var text_search = $("#text_search_logistica").val();
      var type_search = $('input[name="rb_search_logistica"]:checked').val();
      var order_search = $('input[name="rb_order_logistica"]:checked').val();
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      var tipo = $('#tipo').val();
      var status_filter = $('#status_filter').val();
      var pagina = $('#pagina').val();
      if ((from_date != '' && to_date != '' && status_filter == 1) || (status_filter == 0)) {
        $.ajax({
          url: 'filter_informatica.php',
          type: 'POST',
          data: {
            tipo: tipo,
            text_search: text_search,
            type_search: type_search,
            order_search: order_search,
            from_date: from_date,
            to_date: to_date,
            status_filter: status_filter,
            pagina: pagina
          },
          success(data) {
            $('#order_table').html(data);
          }
        });
      } else {
        alert("Seleccione una Fecha");
      }
    }
  </script>









  <script>
    function preview(e) {
      // console.log(e.target.files);

      const url = e.target.files[0];
      const urlTmp = URL.createObjectURL(url);

      document.getElementById("img-preview").src = urlTmp;
      document.getElementById("icon-image").classList.add("form-group");
      document.getElementById("icon-cerrar").innerHTML = '<button class="btn btn-danger" onclick="deleteImg(event)"><i class="fas fa-times"></i></button>';

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
      document.getElementById("icon-cerrar2").innerHTML = '<button class="btn btn-danger" onclick="deleteImg2(event)"><i class="fas fa-times"></i></button>';

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
      document.getElementById("icon-cerrar3").innerHTML = '<button class="btn btn-danger" onclick="deleteImg3(event)"><i class="fas fa-times"></i></button>';

    }

    function deleteImg3(e) {

      document.getElementById("icon-cerrar3").innerHTML = '';
      document.getElementById("icon-image3").classList.add("form-group");
      document.getElementById("img-preview3").src = '';

    }
  </script>







</body>

</html>