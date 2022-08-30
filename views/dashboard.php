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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">
    <link rel="icon" type="image" href="../views/dist/img/icono_galileo.png" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="styles/menu_lateral.css">

</head>


<style type="text/css">
    .indicadores_monto {
        height: 75px;
        width: 100%;
        color: #fff;
        padding: 15px;
        border-radius: 4px;
        box-shadow: 0px 0px 13px 1px #0e0e0e54;
    }
    .indicadores_monto .text{
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .indicadores_monto .monto h3{
        font-weight: bold;
        font-size: 30px;
    }    
    table {
    width: 100%;
    /* margin-top: 80px; */
    /* border: 1px solid #343a40; */
    border-collapse: collapse;
    font-size: 18px;
    }
    th,
    td {
    /* border: 1px solid #343a40; */
    padding: 16px 24px;
    text-align: left;
    }
    thead th {
    background-color: #087f5b;
    color: #fff;
    width: 25%;
    }
    tbody tr:nth-child(even) {
    background-color: #f8f9fa;
    }
    tbody tr:nth-child(odd) {
    background-color: #e9ecef;
    }

</style>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
            include_once("navbar_sidebar.php");
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            <center>
                <b>
                    <h4 class="m-0" style="font-family:'Source Sans Pro';font-weight: bold;font-size: 19px;">
                        <!-- <img src="../views/dist/img/regist.jpg" style="height:35px;width: auto;">  -->
                        INDICADORES - GALILEO
                    </h4>
                </b>
            </center>

            <!-- Main content -->
            <div class="container">
                <div class="row pt-4">
                    <div class="col-6">
                        <div class="indicadores_monto" style="background: #098f00">
                            <div class="row">
                                <div class="col-6 text">Total de ingresos</div>
                                <div class="col-6 monto">
                                    <h3> + S/10,000.00</h3>
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
                                    <th>egresos</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>Barranca</td>
                                <td>S/ 32,000.00</td>
                                <td>S/ 8,000.00</td>
                            </tr>
                            <tr>
                                <td>Supe</td>
                                <td>S/ 32,000.00</td>
                                <td>S/ 8,000.00</td>
                            </tr>
                            <tr>
                                <td>Huacho</td>
                                <td>S/ 32,000.00</td>
                                <td>S/ 8,000.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
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
       
    </script>

</body>

</html>