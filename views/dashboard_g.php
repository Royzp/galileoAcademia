<?php
session_start();

if (empty($_SESSION['active'])) {
    header('location: http://localhost:8080/GalileoAcademia/');
}

include_once 'conexion_bd/conexion.php';
$mysqli = new mysqli('localhost', 'root', '', 'bd_academia');
?>

<!DOCTYPE html>
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
    <link rel="stylesheet" href="styles/style_datatable.css">

</head>


<style type="text/css">
.indicadores_monto {
    height:60px;
    width: 100%;
    color: #fff;
    padding: 10px;
    border-radius: 4px;
    box-shadow: 0px 0px 13px 1px #0e0e0e54;
}

.indicadores_monto .text {
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
}

.indicadores_monto .monto h3 {
    font-weight: bold;
    font-size: 20px;
}
</style>


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
          <a href="../views/pantalla_principal_g.php" class="nav-link"> <i class="fa fa-home" aria-hidden="true">Inicio</i></a>
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
                    <a href="lista_matriculas_g.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lista de Matriculas
                        </p>
                    </a>
                </li>
                

           

            <li class="nav-header" style="color:black;font-weight: bold;">REPORTE</li>

            
            <li class="nav-item" >
                    <a href="dashboard_g.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Indicadores</p>
                    </a>
                </li>

            <li class="nav-item" >
                    <a href="lista_recibo_g.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Recibos emitidos</p>
                    </a>
                </li>

                <li class="nav-item" >
                    <a href="lista_recibo_extornado_g.php" class="nav-link" style="color: white;">
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

            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <br>
                        <center>
                            <b>
                                <h4 class="m-0"
                                    style="font-family:'Source Sans Pro';font-weight: bold;font-size: 19px;">
                                    <!-- <img src="../views/dist/img/regist.jpg" style="height:35px;width: auto;">  -->
                                    INDICADORES - GALILEO
                                </h4>
                            </b>
                        </center>
                        <br>
                    </div>

                    <div class="col-md-12">

                        <form class="form-inline  row" method="POST" action="">

                            <div class="col-md-3 text-left  offset-md-2">

                                <label>Fecha Desde:</label>
                                <input type="date" class="form-control w-100" placeholder="Start" name="date1" />
                            </div>
                            <div class="col-md-3 text-left">

                                <label>Hasta</label>
                                <input type="date" class="form-control w-100" placeholder="End" name="date2" />
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" name="search"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>

                                <a href="http://localhost:8080/galileoAcademia/views/dashboard.php" type="button"
                                    class="btn btn-success"><i class="fa fa-spinner" aria-hidden="true"></i></a>
                            </div>
                        </form>
                    </div>

                    <!--  Tabla de Filtro -->

                    <div class="col-md-7">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tablaDate">
                                <thead class="alert-info">
                                    <tr>
                                        <th>ID</th>
                                        <th>FECHA REGISTRO</th>
                                        <!-- <th>ALUMNOS</th> -->
                                        <th>SEDE</th>
                                        <th>MONTO TOTAL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include_once 'conexion_bd/rango_fechas.php' ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="row pt-4 mt-4">
                            <div class="col-md-6">
                                <div class="indicadores_monto" style="background: #098f00">
                                    <div class="row">
                                        <div class="col-12 text">Total de ingresos</div>
                                        <div class="col-12 monto">
                                            <h3> + S/ <?php echo $total_ingresos['total']?> </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="indicadores_monto" style="background: red">
                                    <div class="row">
                                        <div class="col-12 text">Total de egresos</div>
                                        <div class="col-12 monto">
                                            <h3>- S/7,000.00</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 pt-4">

                                <h4>Ingresos por sede</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sede</th>
                                            <th>Ingreso</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(!empty($total_ingresos_porsede)){ ?>
                                        <?php foreach($total_ingresos_porsede as $valor) { ?>
                                                <tr>
                                                <td><?php echo $valor['nombre_sede'];?></td>
                                                    <td><?php echo $valor['total'];?></td>
                                                </tr>
                                        <?php  }?>
                                        <?php  }?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </div> -->

            <!-- Fin Tabla -->

            <!-- Main content -->
            <!-- <div class="container">
                <div class="row pt-4">
                    <div class="col-6">
                        <div class="indicadores_monto" style="background: #098f00">
                            <div class="row">
                                <div class="col-6 text">Total de ingresos</div>
                                <div class="col-6 monto">
                                    <h3> + S/ <?php echo $total_ingresos['total']?> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="indicadores_monto" style="background: red">
                            <div class="row">
                                <div class="col-6 text">Total de egresos</div>
                                <div class="col-6 monto">
                                    <h3>- S/7,000.00</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 pt-4">

                        <h4>Ingresos por sede</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sede</th>
                                    <th>Ingreso</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>Barranca</td>
                                <td>S/ 32,000.00</td>
                            </tr>
                            <tr>
                                <td>Supe</td>
                                <td>S/ 32,000.00</td>
                            </tr>
                            <tr>
                                <td>Huacho</td>
                                <td>S/ 32,000.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div> -->
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <aside class="control-sidebar control-sidebar-dark" style="height: 280px;">
    <!-- Control sidebar content goes here -->
    <div class="p-3" align="center">
        <h3>ACAD.GALILEO</h3>
        <hr style="background: #FE0000;">
        <img src="../views/dist/img/docente.png" width="100" height="100">

        <h6><?php echo $_SESSION['nombre']; ?></h6>
        <hr style="background: #FE0000;">
        <div style="background: #FE0000;
              height: 30px;
               width: 160px; ">

            <a href="salir.php"> <img src="../views/dist/img/iu.png" width="20" height="20">CERRAR SESION</a>
        </div>

    </div>
</aside>

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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>


    <script type="text/javascript">

    </script>

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



</body>

</html>