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

.indicadores_monto .text {
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
}

.indicadores_monto .monto h3 {
    font-weight: bold;
    font-size: 30px;
}

table {
    width: 100%;
    /* margin-top: 80px; */
    /* border: 1px solid #343a40; */
    border-collapse: collapse;
    font-size: 14px;
}

th,
td {
    /* border: 1px solid #343a40; */
    padding: 16px 10px;
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

<style>
.select2-container .select2-selection--single {

    height: 35px !important;
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

                        <li class="nav-item">
                            <a href="registro_alumno_s.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Matricula</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="lista_matriculas_s.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Lista de Matriculas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="venta_items_s.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Venta de Items
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>




                        <li class="nav-header" style="color:black;font-weight: bold;">REPORTE</li>

                        <li class="nav-item">
                            <a href="lista_recibo_s.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fa fa-calendar"></i>
                                <p>Recibos emitidos</p>
                            </a>
                        </li>

                        <li class="nav-item">
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


            <!-- Main content -->

            <div class="container">

                <!-- <form id="formVentas" name="formVenta"> -->

                <div class="row">
                    <div style="padding: 16px 14px;" class="col-md-12">
                        <center>
                            <b>
                                <h4 class="m-0 text-left"
                                    style="font-family:'Source Sans Pro';font-weight: bold;font-size: 19px;">
                                    <!-- <img src="../views/dist/img/regist.jpg" style="height:35px;width: auto;">  -->
                                    VENTA DE ITEMS
                                </h4>
                            </b>
                        </center>
                    </div>

                    <div class="col-md-4">

                        <form action="" class="row">
                            <div class="col-md-12">
                                <label for="">Nombres y apellidos</label>
                                <input id="idResponsable" class="form-control" class="w-100" type="text"
                                    placeholder="Nombres">
                            </div>
                            <div class="col-md-12">
                                <label for="">N° Documento</label>
                                <input class="form-control" class="w-100" type="text" placeholder="Numero de documento">
                            </div>
                            <div class="col-md-12">
                                <label for="">Aula</label>
                                <input class="form-control" class="w-100" type="text" placeholder="Aula">
                            </div>

                        </form>
                    </div>
                    <!--Inicio de row-->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Servicio o producto</label>

                                <select class='mi-selector' style="width: 100% ; height: 35px!important;"
                                    id="txt_producto_id" name="txt_producto_id" onchange="select_producto();">
                                    <option value="undefined">Seleccione Producto:</option>
                                    <?php
                                            $query = $mysqli->query("SELECT * FROM tb_concepto  where concepto_id > 2");
                                            while ($valores = mysqli_fetch_array($query)) {
                                                echo '<option value="' . $valores['concepto_id'] . '" >' . $valores['concepto'] . '</option>';
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div id="preProducto">
                                                    <input type="text" class="text-center form-control" value="0.00"
                                                        readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-control-sm"
                                                    id="cantidad_producto" name="cantidad_producto"
                                                    placeholder="cantidad" required="" style="height: 37px;">
                                            </td>
                                            <td>
                                                <a onclick="calcularNuevaVenta()"
                                                    class="btn btn-outline-dark btn-sm w-100" style="min-width: 120px;"
                                                    id="" style="background: #6E6761;"><i class="fas fa-plus"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- </form> -->
                        <br>
                        <div class="col-sm-12">
                            <a style="color: blue;">
                                Limpiar Tabla <i class="fas fa-ban"></i>
                            </a>
                            <br>
                            <div class="table-responsive">


                                <table class="table table-sm table-bordered table-hover text-center">
                                    <thead style="background: #DC823B; color:floralwhite">
                                        <tr style=" background: #007bff;">

                                            <th>N°</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Precio</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <input type="hidden" id="can" value="0">
                                    <tbody id="customers_datos">
                                        <tr>
                                            <td colspan="3">
                                            </td>
                                            <td style="background:#007bff; color:floralwhite"><b>Total</b>
                                            </td>
                                            <td id="subTotal">0.00 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-5">
                            <button class="btn" style="color: #fff;background: blue;min-width: 300px;"
                                onclick="validarInsertRecibo()">Emitir recibo</button>
                        </div>

                    </div>
                </div>

                <!-- </form> -->








                <!-- /.content -->
            </div>


            <button class="btn" onclick="openModalReciboEmitido()">Modal</button>

            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->





        <!-- MODAL   -->
        <div class="modal fade bd-example-modal-lg" id="modalReciboEmitido" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#1471B6; ">
                        <b>
                            <P class="modal-title" id="exampleModalLongTitle"
                                style="font-size: 30px;color: #FFFFFF; font-family: arial;">
                                <i class="fa fa-cloud-upload" aria-hidden="true">
                                    Recibo emitido
                                </i>
                            </P>
                        </b>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">

                                    <!DOCTYPE html >
                                    <html  id="printId">

                                    <head>
                                        <link rel="stylesheet" href="style.css">
                                        <script src="script.js"></script>

                                        <style>
                                        .ticket{
                                            font-size: 12px;
                                            font-family: 'Times New Roman';
                                        }
                                        
                                        .ticket td,
                                        .ticket th,
                                        .ticket tr,
                                        .ticket table {
                                            border-top: 1px solid black;
                                            border-collapse: collapse;
                                            padding: 3px 5px;
                                            
                                        }
                                        
                                        .ticket td{
                                            font-size: 12px;

                                        }

                                        td.producto,
                                        th.producto {
                                            width: 75px;
                                            max-width: 75px;
                                        }

                                        td.cantidad,
                                        th.cantidad {
                                            width: 40px;
                                            max-width: 40px;
                                            word-break: break-all;
                                        }

                                        td.precio,
                                        th.precio {
                                            width: 40px;
                                            max-width: 40px;
                                            word-break: break-all;
                                        }

                                        .centrado {
                                            text-align: center;
                                            align-content: center;
                                        }

                                        .ticket {
                                            width: 155px;
                                            max-width: 155px;
                                        }

                                        img {
                                            max-width: inherit;
                                            width: inherit;
                                        }
                                        </style>
                                    </head>


                                    <body>
                                        <div class="ticket">
                                            <img src="https://yt3.ggpht.com/-3BKTe8YFlbA/AAAAAAAAAAI/AAAAAAAAAAA/ad0jqQ4IkGE/s900-c-k-no-mo-rj-c0xffffff/photo.jpg"
                                                alt="Logotipo">
                                            <p class="centrado">Parzibyte's blog
                                                <br>New New York
                                                <br>23/08/2017 08:22 a.m.
                                            </p>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="cantidad">CANT</th>
                                                        <th class="producto">PRODUCTO</th>
                                                        <th class="precio">$$</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="cantidad">1.00</td>
                                                        <td class="producto">CHEETOS VERDES 80 G</td>
                                                        <td class="precio">$8.50</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cantidad">2.00</td>
                                                        <td class="producto">KINDER DELICE</td>
                                                        <td class="precio">$10.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cantidad">1.00</td>
                                                        <td class="producto">COCA COLA 600 ML</td>
                                                        <td class="precio">$10.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cantidad"></td>
                                                        <td class="producto">TOTAL</td>
                                                        <td class="precio">$28.50</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="centrado">¡GRACIAS POR SU COMPRA!
                                                <br>parzibyte.me
                                            </p>
                                        </div>
                                    </body>

                                    </html>

                                </div>

                                <div class="col-12">
                                <button class="btn" onclick="print()">Modal</button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>





    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->

    <!-- jQuery -->
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../views/dist/js/adminlte.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../views/plugins/sweetalert2/sweetalert2.css">
    <script type="text/javascript" charset="utf8" src="../views/plugins/sweetalert2/sweetalert2.min.js"></script>


    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).ready(function() {
            $('.mi-selector').select2();
        });
    });
    </script>

    <!-- NOMBRE USUARIO -->
    <script type="text/javascript">
    $(document).ready(function() {
        localStorage.setItem("nombre_user", '<?php echo $_SESSION['nombre']; ?>');
        localStorage.setItem("id_user", '<?php echo $_SESSION['idUser']; ?>');
    });

    function select_producto() {
        var concepto_id = $("#txt_producto_id").val();
        $("#cantidad_producto").val('1');

        var ob = {
            concepto_id: concepto_id
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


    //  CALCULAR CUOTAS DE PAGO
    var array_productos = [];

    function calcularNuevaVenta() {

        //  declaracion de VALORES  BASE            
        var CP = parseFloat(document.getElementById("cantidad_producto").value); //  Numero de Productos
        var PV_STRING = document.getElementById("precio_venta").value; //  Precio de Producto
        var PV = parseFloat(PV_STRING.substr(3)); //  Precio de Producto        
        var PDN = document.getElementById("nombre_producto").value;

        let TV = CP * PV;
        // $("#total_venta").val(TV.toFixed(0));
        array_productos.push({
            concepto_id: document.getElementById("txt_producto_id").value,
            nombre_producto: PDN.trim(),
            cantidad_producto: CP.toFixed(0),
            precio_producto: PV.toFixed(2),
            total_venta: TV.toFixed(2)
        })
        // insertar a la tabla
        printHtmlTable(array_productos);
        //

    }

    var v_igv;
    var v_subtotal;
    var v_total;

    function printHtmlTable(array) {
        $(".tr_list_items").remove();
        var cadena = "";
        var subTotal = 0;
        var igv = 0.18;
        for (let i = 0; i < array.length; i++) {
            const el = array[i];
            subTotal = subTotal + parseFloat(el.total_venta);
            cadena = cadena + `
                                    <tr class="tr_list_items" style="text-align:center;">                                  
                                        <td><b>${i+1}</b></td>
                                        <td><b>${el.nombre_producto}</b></td>
                                        <td><b>${el.cantidad_producto}</b></td>
                                        <td><b>${el.precio_producto}</b></td>
                                        <td><b>${el.total_venta}</b></td>
                                        <td>
                                        <button onclick="removeItem(${i})" style="border-color: aliceblue;"><i class="material-icons">delete_forever</i></button>
                                        </td>
                                    </tr>
                                    `;
            if (array.length == i + 1) {
                document.getElementById('customers_datos').insertAdjacentHTML("beforebegin", cadena);
                document.getElementById("subTotal").innerHTML = subTotal.toFixed(2);

                v_subtotal = subTotal.toFixed(2);
                v_igv = (subTotal * igv).toFixed(2);
                v_total = ((subTotal * igv) + subTotal).toFixed(2);
            }
        }
    }

    function removeItem(i) {

        array_productos.splice(i, 1); // elimina el item en la posicion i del array
        // insertar a la tabla

        if (array_productos.length != 0) {
            printHtmlTable(array_productos);
        } else {
            document.getElementById("subTotal").innerHTML = '0.00';
            // v_subtotal = subTotal.toFixed(2);
        }
    }
    </script>


    <script>
    function validarInsertRecibo() {
        Swal.fire({
            title: 'Estas emitir este recibo',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, emitir'
        }).then((result) => {
            if (result.isConfirmed) {

                // alert("prueba");
                insertRecibo();
            }
        })
    }


    function insertRecibo() {
        var body = {
            sede_recibo_id: 1,
            monto_total: v_subtotal,
            responsable: document.getElementById('idResponsable').value,
            created_by: "Administrador developer",
            items: array_productos
        }

        console.info(body);

        $.ajax({
            type: "POST",
            url: "insert/insert_recibo.php",
            data: body,
            success: function(res) {
                alert(res);
            }
        });

    }



    function openModalReciboEmitido() {
        $('#modalReciboEmitido').modal('show');
    }

    function print() 
    {

        let elem = document.getElementById(printId)
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write(elem);
        // mywindow.document.write('<html><head><title>my div</title>');
        // mywindow.document.write('</head><body >');
        // mywindow.document.write('<img src="'+data+'" />');
        // mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
    </script>



</body>

</html>