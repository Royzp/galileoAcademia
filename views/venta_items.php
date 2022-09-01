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
    <link rel="stylesheet" href="styles/style_ticket_print.css">

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
        <?php
            include_once("navbar_sidebar.php");
        ?>
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

                                   
                                        <div class="ticket" id="printId">
                                            <img style="width: 90px;" src="https://yt3.ggpht.com/-3BKTe8YFlbA/AAAAAAAAAAI/AAAAAAAAAAA/ad0jqQ4IkGE/s900-c-k-no-mo-rj-c0xffffff/photo.jpg"
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

                                </div>

                                <div class="col-12">
                                <button class="btn" onclick="printDocument('printId')">IMPRIMIR</button>
                                <!-- <button class="btn" onclick="print()">IMPRIMIR</button> -->

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

        var divToPrint = document.getElementById('printId');  
    //Firefox was just opening a new window with same content as opener and not performing the printing dialog, so needed to make it open a new instance of the window opener    
        // newWin= window.open(self.location.href);
    //We want to format the document appropriately
       newWin.document.write("\<!DOCTYPE html\>\<html lang='es'\>\<head\>\<meta charset='utf-8'\/\>\<meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no'><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'\>\<meta name='HandheldFriendly' content='true'\/\>");
    //HTML ELEMENTS THAT WE WANT TO HIDE FROM THE PRINTING AREA
        newWin.document.write("<style type='text/css'>@media print{.dataTables_info,.dataTables_filter{height:0!important;width:0!important;margin:0!important;padding:0!important;min-height:0!important;line-height:0!important;overflow:visible!important;visibility:hidden}");
        newWin.document.write("<style  rel='stylesheet' media='print'  href='styles/style_ticket_print.css'>");
    //General Styling for Printing
        newWin.document.write("body {z-index:100!important;visibility:visible!important;position:relative!important;display:block!important;background-color:lightgray!important;height:297mm!important;width:211mm!important;position:relative!important;padding:0;top:0!important;left:0!important;margin:0!important;orphans:0!important;widows:0!important;overflow:visible!important;page-break-after:always}");
    //Some forced styling in css rules includying page break for a div
        newWin.document.write("body h1{font-size:1em; font-family:Verdana;} a.marked{color:black; text-decoration:none} .pagebreak { page-break-before: always; } ");
        newWin.document.write("@page{size:A4; margin:2em; orphans:0!important;widows:0!important}}</style>\<\/head>\<body>");
        newWin.document.write(divToPrint.innerHTML);
        newWin.document.write("</body></html>");

        // newWin.document.close();
        newWin.focus();
        newWin.print();
        // newWin.close();
        // newWin.focus();
        // newWin.print();
    }




    function printDocument(elemid) {

//Check if element is empty
if (elemid == "") {
    window.print();
}
else {
    //array to store ids separated with comma if available
    var arrelemid = elemid.split(',');
    var htmlContent = "";
    for (var i = 0; i < arrelemid.length; i++) {
        htmlContent += document.getElementById(arrelemid[i]).innerHTML;
    }

    //Window Width (ww) and Window Height (wh) of the user's screen, in pixels
    var ww = screen.availWidth;
    var wh = screen.availHeight - 90;

    //Print Window (pw)
    var pw = window.open("", "newWin", "width=" + ww + ",height=" + wh);
    pw.document.write('<html><title>Printed Page</title><body>');
    pw.document.write('</head><body>');
    pw.document.write(htmlContent);
    pw.document.write('</body></html>');
    pw.document.close();
    pw.print();
    pw.close();

    // Created by Sartaj Husain for www.codebrary.com
}
}


    </script>



</body>

</html>