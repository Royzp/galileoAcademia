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
    
    height: 35px!important;
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



                <form id="formVenta" name="formVenta" >

                    <div class="row">
                        <!--Inicio de row-->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12" style="padding: 16px 24px;">
                                    <select class='mi-selector' style="width: 100% ; height: 35px!important;"
                                        id="txt_producto_id" name="txt_producto_id" required="" onchange="select_producto();">
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
                                                        <input type="text" class="text-center form-control" value="0.00" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm"
                                                        id="cantidad_producto" name="cantidad_producto"
                                                        placeholder="cantidad" required="" style="height: 37px;">
                                                </td>                                                
                                                <td>
                                                    <a onclick="calcularNuevaVenta()"
                                                        class="btn btn-outline-dark btn-sm w-100" style="min-width: 70px;" id=""
                                                        style="background: #6E6761;"><i class="fas fa-plus"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-dark btn-sm w-100" style="min-width: 70px;background: #e3061a;" onclick="limpiarFormulario()"
                                                       ><i class="fas fa-ban"></i>
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
                                <button class="btn" style="color: #fff;background: blue;min-width: 300px;">Emitir recibo</button>
                            </div>

                        </div>
<!--                        
                        </div> -->
                    </div>


                </form>




                <br>






                <!-- MODAL DE REGISTRO DE DOCUMENTO -->


                <!-- MODAL   -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal9" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#1471B6; ">
                                <b>
                                    <P class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;
                                                      color: #FFFFFF; font-family:  arial;"><i
                                            class="fa fa-cloud-upload" aria-hidden="true">
                                            <!-- <img src="../views/dist/img/contrato.png" style="width: 70px;
                                       margin-right: 17px;"> -->
                                            Agregar Nuevo Cliente

                                        </i></P>
                                </b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                include_once("modal/modal_agregar_cliente.php");
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
                                <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%"
                                    height="100%"></iframe>
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

    <!-- jQuery -->
    <script src="../views/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../views/dist/js/adminlte.min.js"></script>

    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>



    <link rel="stylesheet" type="text/css" href="../views/plugins/sweetalert2/sweetalert2.css">
    <script type="text/javascript" charset="utf8" src="../views/plugins/sweetalert2/sweetalert2.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
    jQuery(document).ready(function($) {
        $(document).ready(function() {
            $('.mi-selector').select2();
        });
    });
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
            "iDisplayLength": 5,

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



    <script>
    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date + ' ' + time;
    document.getElementById("currentDateTime").value = dateTime;
    </script>





    <script>
    $('#print').click(function() {
        $('.container_print').printThis({


            debug: false, // show the iframe for debugging  
            importCSS: true, // import parent page css
            importStyle: false, // import style tags
            printContainer: true, // print outer container/$.selector
            loadCSS: "", // path to additional css file - use an array [] for multiple
            pageTitle: "LISTA DE DOCUMENTOS ", // add title to print page
            removeInline: false, // remove inline styles from print elements
            removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
            printDelay: 333, // variable print delay
            header: "<center><h1>LISTA DE INGRESOS A LOGISTICA </h1></center>", // prefix to html
            footer: null, // postfix to html
            base: false, // preserve the BASE tag or accept a string for the URL
            formValues: true, // preserve input/form values
            canvas: false, // copy canvas content
            doctypeString: '...', // enter a different doctype for older markup
            removeScripts: false, // remove script tags from print content
            copyTagClasses: false, // copy classes from the html & body tag
            beforePrintEvent: null, // function for printEvent in iframe
            beforePrint: null, // function called before iframe is filled
            afterPrint: null // function called before iframe is removed




        });


    });
    </script>

    <script type="text/javascript">
    function onSubmitCliente() {

        var frm = document.getElementById('frm_registro_cliente');
        var df = new FormData(frm);

        $.ajax({
            url: 'insert/insert_cliente.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: df,
            success(data) {
                console.log(data);


                if (data == 'success') {

                    // 1. RESET FORMULARIO   
                    $('#frm_registro_cliente').trigger('reset');
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


        $('#iframePDF').attr('src', '<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/GestionInformatica/views/'; ?>' +
            url);
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


    <!-- NOMBRE USUARIO -->

    <script type="text/javascript">
    $(document).ready(function() {
        localStorage.setItem("nombre_user", '<?php echo $_SESSION['nombre']; ?>');
        localStorage.setItem("id_user", '<?php echo $_SESSION['idUser']; ?>');
    });
    </script>









    <!--  FORMULARIO EDITAR FORMULARIO -->

    <script type="text/javascript">
    $(document).on("click", ".btnEditarDocument", function() {
        var id_producto = $(this).attr("data-id");
        var nombre_producto = $(this).attr("data-producto");
        var categoria = $(this).attr("data-categoria");
        var lote = $(this).attr("data-lote");
        var stock = $(this).attr("data-stock");
        var precio_venta = $(this).attr("data-precio");
        var proveedor = $(this).attr("data-proveedor");
        var marca = $(this).attr("data-marca");
        var modelo = $(this).attr("data-modelo");
        var unidad_medida = $(this).attr("data-unidad");
        var foto_producto = $(this).attr("data-foto");




        //mostrar al modal
        $('#exampleModal2').modal('show');
        $('#idDocumento').attr('value', id_producto);
        $('#txt_nombre_producto').attr('value', nombre_producto);

        $('#txt_categoria_edit').attr('value', categoria);
        $('#txt_categoria_edit').find("option").each(function() {
            if ($(this).val() == categoria) {
                $(this).prop("selected", "selected");
            }

        });

        $('#txt_lote_edit').attr('value', lote);
        $('#txt_stock_edit').attr('value', stock);
        $('#txt_precio_edit').attr('value', precio_venta);

        $('#txt_proveedor_edit').attr('value', proveedor);
        $('#txt_proveedor_edit').find("option").each(function() {
            if ($(this).val() == proveedor) {
                $(this).prop("selected", "selected");
            }

        });

        $('#txt_marca_edit').attr('value', marca);
        $('#txt_modelo_edit').attr('value', modelo);
        $('#txt_unidad_edit').attr('value', unidad_medida);
        $('#txt_foto_edit').attr('value', foto_producto);





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
    function updateProducto() {

        //alert("Prueba");
        let frm = document.getElementById('actualizar_producto');
        let df = new FormData(frm);
        // var id_document = $(this).attr("data-id");

        var id_producto = $('#idDocumento').val();

        $.ajax({
            url: 'update_producto.php?id_produc=' + id_producto,
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
                    $('#actualizar_producto').trigger('reset');
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
    function select_producto() {

        var concepto_id = $("#txt_producto_id").val();      

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
    </script>


    <!--  GENERAR NUEVA VENTA   -->

    <script>
    $(document).ready(function() {
        getData();


        calcularVuelto();



    });




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
                // document.getElementById("igv").innerHTML = (subTotal * igv).toFixed(2);
                // document.getElementById("total").innerHTML = ((subTotal * igv) + subTotal).toFixed(2);

                v_subtotal = subTotal.toFixed(2);
                v_igv = (subTotal * igv).toFixed(2);
                v_total = ((subTotal * igv) + subTotal).toFixed(2);
            }
        }
    }

    function removeItem(i) {

        array_productos.splice(i, 1); // elimina el item en la posicion i del array
        // insertar a la tabla

        if(array_productos.length != 0){
            printHtmlTable(array_productos);
        }else{
            document.getElementById("subTotal").innerHTML = '00.00';
            // v_subtotal = subTotal.toFixed(2);
        }
    }



    // Funcion de dar Vuelto



    function calcularVuelto() {

        var mp = document.getElementById('monto_pagar').value;
        //var tt = document.getElementById('total').value;


        var resta = mp - v_total;
        //var b=parseFloat(document.getElementById('vuelto').value);
        document.getElementById('vuelto').value = resta.toFixed(2);

    }


    function limpiarFormulario() {

        // document.getElementById("formVenta").reset();

        window.location.reload()

    }


    $('#guardarVenta').click(function(e) {
        e.preventDefault();

    });
    </script>



    <!-- GENERAR PDF  -->

    <script>
    function generarPDF(cliente, factura) {
        var ancho = 1000;
        var alto = 800;

        // Calcular posicin x,y para centrar la ventana

        var x = parseInt((window.screen.width / 2) - (ancho / 2));
        var y = parseInt((window.screen.width / 2) - (alto / 2));

        $url = 'factura/generarFactura.php?cl=' + cliente + '&f=' + factura;
        window.open($url, "left=" + x + ",top=" + y + ",height=" + alto + ",width=" + ancho +
            ",scrollbar=si,location=no,resizable=si,menubar=no");



    }
    </script>





</body>

</html>