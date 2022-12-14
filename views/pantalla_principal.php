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

              <center><a href="../views/registro_alumno.php"><img src="../views/dist/img/alumno.jpg" style="height: 351px;">
                </a></center>


            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">


              <center><a href="../views/lista_ventas_cotizaciones.php"><img src="../views/dist/img/reportess.jpg" style="height: 351px;"">
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

                          <a href="../views/registro_alumno.php">
                            <button type="button" class="btn btn-warning" style="width: 420px;
                                                                       height: 50px;
                                                                       font-size: 20px;
                                                                       font-weight: 600;
                                                                       letter-spacing: 1px;">

                              Registro Alumnos

                            </button>
                          </a>

                        </center>


                      </div>
                      <!-- /.col-md-6 -->
                      <div class="col-lg-6">


                        <center>

                          <a href="../views/lista_ventas_cotizaciones.php">
                            <button type="button" class="btn btn-warning" style="width: 420px;
                                                                         height: 50px;
                                                                         font-size: 20px;
                                                                         font-weight: 600;
                                                                         letter-spacing: 1px;">

                              Reportes
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