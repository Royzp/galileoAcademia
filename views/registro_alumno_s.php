<?php
session_start();
// if($_SESSION['tipoUser'] !=2){
//     header('location:  http://localhost:8080/GalileoAcademia/');
   
// }

if (empty($_SESSION['active'])) {
    header('location: http://localhost:8080/GalileoAcademia/');
}



include_once 'conexion_bd/conexion.php';
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">
    <link rel="icon" type="image" href="../views/dist/img/icono_galileo.png" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="styles/menu_lateral.css">
    <link rel="stylesheet" href="styles/style_table.css">
    

</head>



<body class="hold-transition sidebar-mini">
    <div class="wrapper">

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
            <br>
            <center><b>

                    <h4 class="m-0" style="font-family:'Source Sans Pro';font-weight: bold;font-size: 19px;">
                        <img src="../views/dist/img/regist.jpg" style="height:35px;width: auto;"> REGISTRO ALUMNOS -
                        GALILEO
                    </h4>

                </b>
            </center>


            <!-- Main content -->
            <div class="content">


                <section id="container">

                    <form method="Post" name="frm_registro_alumno" id="frm_registro_alumno"
                        enctype="multipart/form-data">

                        <div class="datos_cliente">
                            <div class="action_cliente">
                                <h5 style="font-size: 1.15rem;color: #ff0c00;">Datos Generales de Estudiante</h5>
                            </div>

                            <div class="row datos">



                                <div class="col-md-4">
                                    <label style="font-size: 14px;">TIPO DOCUMENTO </label>
                                    <select id="tipo_documento" name="tipo_documento" class="w-100" required>
                                        <option>Seleccione:</option>
                                        <?php
                                        $query2 = $mysqli->query("SELECT   tipo_documento_id,tipo_documento FROM  tb_tipo_documento");
                                        while ($valor = mysqli_fetch_array($query2)) {
                                            echo '<option value="' . $valor['tipo_documento_id'] . '" >' . $valor['tipo_documento'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">NUMERO DOCUMENTO </label>
                                    <input class="w-100" type="text" name="numero_dni_alumno" id="numero_dni_alumno"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">NOMBRES</label>
                                    <br>
                                    <input class="w-100" type="text" name="nombre_alumno" id="nombre_alumno" required>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">APELLIDOS</label>
                                    <br>
                                    <input class="w-100" type="text" name="apellido_alumno" id="apellido_alumno"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">NUMERO CELULAR </label>
                                    <input class="w-100" type="text" name="numero_cel_alumno" id="numero_cel_alumno"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">COLEGIO DE PROCEDENCIA</label>
                                    <br>
                                    <input class="w-100" type="text" name="colegio_procedencia" id="colegio_procedencia"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">AÑO CULMINO SUS ESTUDIOS</label>
                                    <br>
                                    <input class="w-100" type="text" name="culmino_estudios" id="culmino_estudios"
                                        required>
                                </div>


                                <div class="col-md-8">
                                    <label style="font-size: 14px;">DIRECCION</label>
                                    <br>
                                    <input class="w-100" type="text" name="direcc_alumno" id="direcc_alumno" required>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">CARRERA</label>
                                    <br>
                                    <input class="w-100" type="text" name="carrera_alumno" id="carrera_alumno" required>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">TURNO</label>
                                    <br>
                                    <select id="turno_alumno" name="turno_alumno" class="w-100" required>
                                        <option>Seleccione:</option>
                                        <?php
                                        $query2 = $mysqli->query("SELECT   turno_id,turno FROM  tb_turno");
                                        while ($valor = mysqli_fetch_array($query2)) {
                                            echo '<option value="' . $valor['turno_id'] . '" >' . $valor['turno'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>



                                <div class="col-md-4">
                                    <label style="font-size: 14px;">SEDE</label>
                                    <br>
                                    <select id="sede_matricula" name="sede_matricula" class="w-100" required>
                                        <option>Seleccione:</option>
                                        <?php
                                        $query2 = $mysqli->query("SELECT   sede_id,nombre_sede FROM  tb_sede");
                                        while ($valor = mysqli_fetch_array($query2)) {
                                            echo '<option value="' . $valor['sede_id'] . '" >' . $valor['nombre_sede'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">MODALIDAD</label>
                                    <br>
                                    <select id="modalidad_academia" name="modalidad_academia" class="w-100" required>
                                        <option>Seleccione:</option>
                                        <?php
                                        $query2 = $mysqli->query("SELECT   modalidad_id,nombre_modalidad FROM  tb_modalidad");
                                        while ($valor = mysqli_fetch_array($query2)) {
                                            echo '<option value="' . $valor['modalidad_id'] . '" >' . $valor['nombre_modalidad'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">CICLO</label>
                                    <br>
                                    <select id="ciclo_id" name="ciclo_id" class="w-100" required>
                                        <option>Seleccione:</option>
                                        <?php
                                        $query2 = $mysqli->query("SELECT   ciclo_id,nombre_ciclo FROM  tb_ciclo");
                                        while ($valor = mysqli_fetch_array($query2)) {
                                            echo '<option value="' . $valor['ciclo_id'] . '" >' . $valor['nombre_ciclo'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label style="font-size: 14px;">PEDIODO</label>
                                    <br>
                                    <select id="periodo_id" name="periodo_id" class="w-100" required>
                                        <option>Seleccione:</option>
                                        <?php
                                        $query2 = $mysqli->query("SELECT   periodo_id,nombre_periodo FROM  tb_periodo");
                                        while ($valor = mysqli_fetch_array($query2)) {
                                            echo '<option value="' . $valor['periodo_id'] . '" >' . $valor['nombre_periodo'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <br>

                            </div>
                        </div>


                        <div class="datos_cliente">
                            <div class="action_cliente">
                                <h5 style="font-size: 1.15rem;color: #ff0c00;">Datos Remitir Boleta de Pago y Reportes
                                    Academico</h5>
                            </div>

                            <div class="row datos">


                                <div class="col-md-6">
                                    <label style="font-size: 14px;">NOMBRE DEL PADRE U APODERADO </label>
                                    <input class="w-100" type="text" name="nombre_apoderado" id="nombre_apoderado"
                                        required>
                                </div>

                                <div class="col-md-3">
                                    <label style="font-size: 14px;">DNI</label>
                                    <br>
                                    <input class="w-100" type="text" name="dni_apoderado" id="dni_apoderado" required>
                                </div>

                                <div class="col-md-3">
                                    <label style="font-size: 14px;">TELEFONO</label>
                                    <br>
                                    <input class="w-100" type="text" name="telefono_apoderado" id="telefono_apoderado"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <label style="font-size: 14px;">DIRECCION</label>
                                    <br>
                                    <input class="w-100" type="text" name="direccion_apoderado" id="direccion_apoderado"
                                        required>
                                </div>


                            </div>

                            <div class="datos_venta my-3">
                                <h5 style="font-size: 1.15rem;color: #ff0c00;">Información de Pago</h5>

                                <div class="row datos">

                                    <div class="col-md-3">
                                        <label style="font-size: 14px;">MONTO TOTAL</label>
                                        <input class="w-100" type="number" name="monto_total" id="monto_total" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label style="font-size: 14px;">TIPO DE PAGO</label>
                                        <br>
                                        <select id="tipo_pago_matricula" name="tipo_pago_matricula" class="w-100"
                                            onchange="showDiv2(this)" required>
                                            <option value="1" selected>PAGO UNICO</option>
                                            <option value="0">FRACCIONADO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="hidden_div1" style="font-size: 14px;">PAGO UNICO </label>
                                        <label class="hidden_div2" style="font-size: 14px;display: none ;">1ra. CUOTA
                                            (Pago Inicial)</label>
                                        <input class="w-100" type="number" name="primer_pago" id="primer_pago" required>
                                    </div>


                                    <div class="col-md-3 hidden_div2" style="display: none ;">
                                        <label style="font-size: 14px;">N° CUOTAS</label>
                                        <br>
                                        <select id="numero_cuotas" name="numero_cuotas" class="w-100"
                                            onchange="showDiv2(this)">
                                            <option>Seleccione:</option>
                                            <option value="2" selected>2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>


                                    <div class="col-12"></div>


                                    <div class="col-md-3 hidden_div2" style="display: none ;">
                                        <label style="font-size: 14px;">2da. CUOTA</label>
                                        <br>
                                        <input class="w-100" type="number" name="segunda_cuota" id="segunda_cuota">
                                    </div>

                                    <div class="col-md-3 hidden_div2" style="display: none ;">
                                        <label style="font-size: 14px;">FECHA (2da.cuota)</label>
                                        <br>
                                        <input class="w-100" type="date" name="fecha_segunda_cuota"
                                            id="fecha_segunda_cuota">
                                    </div>

                                    <div style="display: none ;" class="col-md-3 hidden_div3">
                                        <label style="font-size: 14px;">3era. CUOTA</label>
                                        <br>
                                        <input class="w-100" type="number" name="tercera_cuota" id="tercera_cuota">
                                    </div>

                                    <div style="display: none ;" class="col-md-3 hidden_div3">
                                        <label style="font-size: 14px;">FECHA(3ra.cuota)</label>
                                        <br>
                                        <input class="w-100" type="date" name="fecha_tercera_cuota"
                                            id="fecha_tercera_cuota">
                                    </div>


                                    <!-- </div> -->

                                </div>

                            </div>

                            <div class="datos_venta">
                                <h5 style="font-size: 1.15rem;color: #ff0c00;">Como se entero de la Academia</h5>
                                <div class="row datos">

                                    <div class="col-md-6">
                                        <br>
                                        <select class="w-100" id="promocion_academia" name="promocion_academia"
                                            required>
                                            <option>Seleccione:</option>
                                            <?php
                                            $query2 = $mysqli->query("SELECT   medio_informacion_id,medio_informacion FROM  tb_medio_informacion ");
                                            while ($valor = mysqli_fetch_array($query2)) {
                                                echo '<option value="' . $valor['medio_informacion_id'] . '" >' . $valor['medio_informacion'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class=" col-md-6">
                                        <label>Acciones</label>
                                        <div class="row" id="acciones_venta">
                                            <div class="col-6">

                                                <a href="#" class=" w-100 px-2 btn btn-danger btn_ok"
                                                    id="btn_anular_venta"><i class="fas fa-ban"></i> Anular</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class=" w-100 btn btn-success btn_new "
                                                    id="btn_facturar_venta" onclick="onSubmitRegistroAlumno()"><i
                                                        class="far fa-edit"></i> Procesar</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                    </form>

                </section>





            </div>
            <!-- /.content -->













        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Desarrollado:Jhampol Chumbes Patricio.
            </div>
            <!-- Default to the left -->
            <strong>Sistema Informatico &copy; Academia Galileo.</strong>
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



    <script type="text/javascript">
    function onSubmitRegistroAlumno() {

        var frm = document.getElementById('frm_registro_alumno');
        var df = new FormData(frm);

        $.ajax({
            url: 'insert/insert_alumno.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: df,
            success(data) {
                console.log("Respuesta insert_alumno.php: ", data);
                if (data > 0) {
                    window.location.replace(
                        "http://localhost/GalileoAcademia/views/matricula_detalle.php?id_matricula=" +
                        data);

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


    <script type="text/javascript">
    function showDiv2(select) {
        // document.getElementById('hi1').style.display = "block";
        if (select.value == 1) {

            $('.hidden_div1').css('display', 'block')
            $('.hidden_div2').css('display', 'none')
            // document.getElementById('hidden_div1').style.display = "block";
            // document.getElementById('hidden_div2').style.display = "none";
        } else {

            $('.hidden_div1').css('display', 'none')
            $('.hidden_div2').css('display', 'block')
            // document.getElementById('hidden_div1').style.display = "none";
            // document.getElementById('hidden_div2').style.display = "block";
        }
    }
    </script>



    <script>
    $('.btn_new_cliente').click(function(e) {

        e.preventDefault();
        $('#nomb_cliente_nw').removeAttr('disabled');
        $('#cel_cliente_new').removeAttr('disabled');
        $('#direcc_cliente_new').removeAttr('disabled');

        $('#div_registro_cliente').slideDown();

    })

    //CALCULAR PAGOS


    // CAMBIOS EN EL PRIMER PAGO
    $('#primer_pago').keyup(function(e) {

        e.preventDefault();

        var total = $('#monto_total').val();
        var monto_pagado = $('#primer_pago').val();
        var pendiente = parseFloat(total) - parseFloat(monto_pagado);

        $('#segunda_cuota').val('');
        $('#tercera_cuota').val('');

        if (pendiente > 0) {
            if ($('#numero_cuotas').val() == 2) {
                $('.hidden_div3').css('display', 'none');
                $('#segunda_cuota').val(pendiente);
            }
            if ($('#numero_cuotas').val() == 3) {
                $('.hidden_div3').css('display', 'block');

                let pend_2 = pendiente / 2;
                $('#segunda_cuota').val(pend_2);
                $('#tercera_cuota').val(pend_2);
            }
        }
    });


    // CAMBIOS EN EL MONTO TOTAL
    $('#monto_total').keyup(function(e) {

        e.preventDefault();

        var total = $('#monto_total').val();
        var monto_pagado = $('#primer_pago').val();
        var pendiente = parseFloat(total) - parseFloat(monto_pagado);

        $('#primer_pago').val('');
        $('#segunda_cuota').val('');
        $('#tercera_cuota').val('');

        var total = $('#monto_total').val();
        if ($('#tipo_pago_matricula').val() == 1) {
            $('#primer_pago').val(total);
        }

    });


    //  CAMBIOS EN EL TIPO DE MATRICULA
    $('#tipo_pago_matricula').change(function(e) {
        e.preventDefault();

        $('#primer_pago').val('');
        $('#segunda_cuota').val('');
        $('#tercera_cuota').val('');

        var total = $('#monto_total').val();
        if ($('#tipo_pago_matricula').val() == 1) {
            $('#primer_pago').val(total);
        }
    });

    // CAMBIO EN EL NUMERO DE CUOTAS
    $('#numero_cuotas').change(function(e) {
        e.preventDefault();
        $('#segunda_cuota').val('');
        $('#tercera_cuota').val('');

        var total = $('#monto_total').val();
        var monto_pagado = $('#primer_pago').val();
        var pendiente = parseFloat(total) - parseFloat(monto_pagado);

        if ($('#numero_cuotas').val() == 2) {
            $('.hidden_div3').css('display', 'none');
            $('#segunda_cuota').val(pendiente);
        }
        if ($('#numero_cuotas').val() == 3) {

            $('.hidden_div3').css('display', 'block');
            let pend_2 = pendiente / 2;
            $('#segunda_cuota').val(pend_2);
            $('#tercera_cuota').val(pend_2);
        }
    });
    </script>


</body>

</html>