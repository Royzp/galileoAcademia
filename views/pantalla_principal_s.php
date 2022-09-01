<?php
session_start();


if (empty($_SESSION['active'])) {
  header('location: http://localhost:8080/GalileoAcademia/');
}



include_once 'conexion_bd/conexion.php';



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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">

  <link rel="icon" type="image" href="../views/dist/img/icono_galileo.png" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../views/styles/menu_lateral.css">





</head>


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

          <h1 class="m-0" style="font-family:'Source Sans Pro';font-weight: bold;">GESTION DE ALUMNOS  </h1>

        </b>
      </center>

      <!-- 
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
     -->



      <br>
      <br>

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">

              <center><a href="../views/registro_alumno_s.php"><img src="../views/dist/img/alumno.jpg" style="height: 351px;">
                </a></center>


            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">


              <center><a href="../views/lista_recibo_s.php"><img src="../views/dist/img/reportess.jpg" style="height: 351px;"">
                </a></center>




         



          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->



     <!-- Main content -->
    <div class=" content">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-6">

                        <center>

                          <a href="../views/registro_alumno_s.php">
                            <button type="button" class="btn btn-warning" style="width: 420px;
                                                                       height: 50px;
                                                                       font-size: 20px;
                                                                       font-weight: 600;
                                                                       letter-spacing: 1px;">

                              Registro Matricula

                            </button>
                          </a>

                        </center>


                      </div>
                      <!-- /.col-md-6 -->
                      <div class="col-lg-6">


                        <center>

                          <a href="../views/lista_recibo_s.php">
                            <button type="button" class="btn btn-warning" style="width: 420px;
                                                                         height: 50px;
                                                                         font-size: 20px;
                                                                         font-weight: 600;
                                                                         letter-spacing: 1px;">

                              Recibo Emitidos
                            </button>
                          </a>

                        </center>

                      </div>
                      <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                  </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->















          </div>
          <!-- /.content-wrapper -->

          <!-- Control Sidebar -->
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
          <!-- /.control-sidebar -->

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
</body>

</html>