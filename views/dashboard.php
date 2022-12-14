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
    height: 60px;
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






<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>


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

                                <a href="http://localhost/galileoAcademia/views/dashboard.php" type="button"
                                    class="btn btn-success"><i class="fa fa-spinner" aria-hidden="true"></i></a>
                            </div>
                        </form>
                    </div>

                    <!--  Tabla de Filtro -->

                    <div class="col-md-12">
                            <button type="button" onclick="exportTableToExcel('tableExportExcel', 'Academia-data')" style="border: 4px solid #B5E13F ;
                        border-radius: 6px;
                        background: #28a745;
                        color: white;
                        width: 147px;
                        height: 59px;">
                        <img src="../views/dist/img/ecx.png" width="40" height="40">

                        EXCEL.xls

                    </button>
                    </div>

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
                                            <h3> + S/ <?php 

                                            if($total_ingresos != 0){
                                                echo $total_ingresos['total'];
                                            }else{
                                                echo '0.00';
                                            }
                                            
                                            ?> </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="indicadores_monto" style="background: red">
                                    <div class="row">
                                        <div class="col-12 text">Total de egresos</div>
                                        <div class="col-12 monto">
                                            <h3>- S/ <?php 

                                                if( $total_egresos != 0){
                                                    echo $total_egresos['total'];
                                                }else{
                                                    echo '0.00';
                                                }
                                            ?></h3>
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


            <div class="container" id="tableExportExcel" style="display: none;">
                <div class="row">

                <div class="col-12">
                    <h4>
                        REPORTE DE INGRESOS ACADEMIA GALILEO
                    </h4>
                </div>
                    <div class="col-12">
                        <table id="customers">
                            <tr>
                                <th>ID</th>
                                <th>A nnombre de</th>
                                <th>Monto Recibo</th>
                                <th>Sede de emision</th>
                                <th>Responsbale emision</th>
                                <th>Fecha de emision</th>
                            </tr>
                            <?php
                                    foreach ($excelDashboard as $valor) {
                                    ?>
                                    <tr>
                                            <td><?php echo $valor['recibo_id']?></td>
                                            <td><?php echo $valor['responsable']?></td>
                                            <td><?php echo $valor['monto_total']?></td>
                                            <td><?php echo $valor['nombre_sede']?></td>
                                            <td><?php echo $valor['created_by']?></td>
                                            <td><?php echo $valor['created_date']?></td>
                                            </tr>
                                    <?php
                                        }
                                    ?>                           
                         
                        </table>

                    </div>
                </div>
            </div>


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
                "sEmptyTable": "Ning??n dato disponible en esta tabla",
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
                    "sLast": "??ltimo",
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





<script>

function exportTableToExcel(name_id, filename) {
      var uri = 'data:application/vnd.ms-excel;base64,',
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function(s) {
          return window.btoa(unescape(encodeURIComponent(s)))
        },
        format = function(s, c) {
          return s.replace(/{(\w+)}/g, function(m, p) {
            return c[p];
          })
        }
      var table = document.getElementById(name_id);
      var name = 'reporte';
      var html = table.innerHTML;
      var ctx = {
        worksheet: name || 'Worksheet',
        table: html
      }
      var link = document.createElement("a");
      link.download = filename + ".xls";
      link.href = uri + base64(format(template, ctx))
      link.click();

    }


 </script>



</body>

</html>