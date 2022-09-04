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


<!-- <style type="text/css">
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
  
    border-collapse: collapse;
    font-size: 14px;
}

th,
td {
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
</style> -->

<style>
.select2-container .select2-selection--single {

    height: 35px !important;
}
</style>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

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
            <!-- Main content -->
            <div class="container">

                <!-- <form id="formVentas" name="formVenta"> -->

                <div class="row">
                    <div style="padding: 16px 14px;" class="col-md-12">
                        <center>
                            <b>
                                <h4 class="m-0 text-left"
                                    style="font-family:'Source Sans Pro';font-weight: bold;font-size: 19px;">
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
                                                    <input type="text" class="text-center form-control"
                                                        placeholder="0.00" readonly>
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

                <!-- /.content -->
            </div>

            <button class="btn" onclick="openModalReciboEmitido()">Modal</button>

            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <?php          
            include_once("modal/modal_vista_recibo.php");
        ?>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
    <!-- importo todos los idiomas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment-with-locales.min.js"></script>


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
        console.info("prueba");
        //  declaracion de VALORES  BASE            
        var CP = parseFloat(document.getElementById("cantidad_producto").value); //  Numero de Productos
        var PV_STRING = document.getElementById("precio_venta").value; //  Precio de Producto
        var PV = parseFloat(PV_STRING); //  Precio de Producto        
        // var PV = parseFloat(PV_STRING.substr(3)); //  Precio de Producto        
        var PDN = document.getElementById("nombre_producto").value;
        let TV = CP * PV;
        // $("#total_venta").val(TV.toFixed(0));
        array_productos.push({
            concepto_id: document.getElementById("txt_producto_id").value,
            nombre_producto: PDN.trim(),
            cantidad_producto: CP.toFixed(0),
            precio_producto: PV.toFixed(2),
            // precio_producto: document.getElementById("precio_venta").value,
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
                // alert(res);
                getDetalleRecibo(res);

            }
        });

    }



    function getDetalleRecibo(ID) {
        var body = {
            recibo_id: ID
        };
        $.ajax({
            type: "POST",
            url: "conexion_bd/consulta_reciboid.php",
            data: body,
            success: function(res) {
                console.info(res);
                let data = JSON.parse(res)
                console.info(data);
                let recibo = data.recibo;
                let arrayDetalle = data.detalle;
                var items = '';
                for (let i = 0; i < arrayDetalle.length; i++) {
                    const el = arrayDetalle[i];
                    items = items + `
                                        <tr>
                                            <td style="padding:3px 5px;text-transform: uppercase; ">${el.descripcion}</td>
                                            <td style="text-align:center;padding:3px 5px; max-width: 20px!important;">${parseInt(el.unidades)}</td>
                                            <td style="padding:3px 5px; max-width: 20px!important;">${el.precio_unitario}</td>
                                            <td style="padding:3px 5px; ">${el.total}</td>
                                        </tr>
                                            `;
                    if (arrayDetalle.length == i + 1) {
                        console.info(items);
                        document.getElementById('tableReciboDetalle').insertAdjacentHTML("beforebegin",
                            items);
                        // document.getElementById('tableReciboDetalle').insertAdjacentHTML("afterend",items);
                        // document.getElementById("subTotal").innerHTML = subTotal.toFixed(2);
                    }
                }

                var hoy = new Date(recibo[0].created_date);
                var fecha = hoy.getDate() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getFullYear();
                var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();


                moment.locale('es');
                //
                var dateTime = moment(recibo[0].created_date);
                // formato de fecha miercoles 1, junio 2016
                var full = dateTime.format('dddd D, MMMM YYYY');
                // mes
                var mes = dateTime.format(' MMMM');
                // dia (escrito)
                var dia = dateTime.format('dddd');
                // dia
                var diaN = dateTime.format('D');
                /////
                // Update
                var full2 = dateTime.format('LL');
                //
                var fullTime = dateTime.format('llll');

                console.log(full, mes, dia, diaN, full2, fullTime);

                document.getElementById("idResponsableRecibo").innerHTML = recibo[0].responsable;
                document.getElementById("idMontoTotalRecibo").innerHTML = recibo[0].monto_total;
                document.getElementById("idReciboRecibo").innerHTML = recibo[0].recibo_id;
                document.getElementById("idNombreSedeRecibo").innerHTML = recibo[0].nombre_sede;
                document.getElementById("idCreadoPor").innerHTML = recibo[0].created_by;
                document.getElementById("idDescripcionRecibo").innerHTML = recibo[0].descripcion;
                document.getElementById("idFechaRecibo").innerHTML = full;
                document.getElementById("idHoraRecibo").innerHTML = hora;
                // document.getElementById("idfullTime").innerHTML = fullTime;

                openModalReciboEmitido();
            }
        });
    }



    function openModalReciboEmitido() {
        $('#modalReciboEmitido').modal('show');
    }

    function printRoy() {
        var div = document.querySelector("#printId");
        var ventana = window.open('', 'PRINT', 'height=600,width=1000');
        ventana.document.write('<html>');

        ventana.document.write('<body>');
        ventana.document.write('<br> <br><div class="container-fluid">');

        ventana.document.write('<div class="row">');
        ventana.document.write('<div>');
        ventana.document.write(div.innerHTML);
        ventana.document.write('</div>');
        ventana.document.write('</div>');

        ventana.document.write('</div>');
        ventana.document.write('</body></html>');

        ventana.document.close();

        ventana.focus();
        ventana.print();
        ventana.close();
        return true;
    }
    </script>



</body>

</html>