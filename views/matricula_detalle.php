<?php
session_start();


if (empty($_SESSION['active'])) {
    header('location: http://localhost:8080/GalileoAcademia/');
}

// print_r($_GET['id_matricula']);
if (isset($_GET['id_matricula'])) {
    $v_matricula_id = $_GET['id_matricula'];
    // print_r($_GET['id_matricula']);
}

include_once 'conexion_bd/conexion.php';
$mysqli = new mysqli('localhost', 'root', '', 'bd_academia');

/////////////
$pdo = new PDO('mysql:host=localhost;dbname=bd_academia', 'root', '');

$sql_cuotas = "SELECT * FROM tb_cuotas_pendientes AS cp WHERE cp.matricula_id = '$v_matricula_id' ";
$sentencia = $pdo->prepare($sql_cuotas);
$sentencia->execute();
$resultado_cuotas = $sentencia->fetchAll();

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
    <link rel="stylesheet" href="styles/style_table.css">
    <style>
        #page_pdf{
            font-size: 13px;
            text-transform:uppercase;
        }      
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
            include_once("navbar_sidebar.php");
        ?>
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <section>

                <!-- <img class="anulada" src="img/anulado.png" alt="Anulada"> -->
                <div id="page_pdf">
                    <table id="factura_head">
                        <tr>
                            <td class="logo_factura">
                                <div>
                                    <img src="../views/dist/img/galileo_iconoo.png " style="width: 150px;">
                                </div>
                            </td>
                            <td class="info_empresa">
                                <div>
                                    <span class="h2">DETALLE DE MATRICULA</span>
                                    <p class="mb-0">V9VQ+74M, Jr. Jose Olaya, Huacho 15136</p>
                                    <p class="mb-0">Teléfono: +(502) 2222-3333</p>
                                    <p class="mb-0">Email:<span>GALILEO@GMAIL.COM</span></p>
                                </div>
                            </td>
                            <td class="info_factura">
                                <div class="round">
                                    <span class="h3">Matricula</span>
                                    <p class="mb-0">No.Matricula: <strong id="numero_matricula"></strong></p>
                                    <p class="mb-0">Fecha:<strong id="fecha_matricula"></strong></p>
                                    <p class="mb-0">Responsable: <strong ><?php echo $_SESSION['nombre']; ?></strong></p>
                                </div>
                            </td>
                        </tr>


                    </table>

                    <!-- DATOS DE ALUMNO -->
                    <table id="factura_cliente">
                        <tr>
                            <td class="info_cliente">
                                <div class="round">
                                    <span class="h3">DATOS GENERALES DEL ESTUDIANTE</span>
                                    <table class="datos_cliente">
                                        <tr>
                                            <td><label>Numero Documento:</label>
                                                <p class="mb-0" id="documento_alumno"></p>
                                            </td>
                                            <td><label>Año Culmino Estudios:</label>
                                                <p class="mb-0" id="culmino_estudio"></p>
                                            </td>



                                        </tr>
                                        <tr>
                                            <td><label>Nombres:</label>
                                                <p class="mb-0" id="nombre_alumno"></p>
                                            </td>
                                            <td><label>Colegio Procedencia:</label>
                                                <p class="mb-0" id="colegio_procedencia"></p>
                                            </td>


                                        </tr>

                                        <tr>
                                            <td><label>Apellidos:</label>
                                                <p class="mb-0" id="apellido_alumno"></p>
                                            </td>
                                            <td><label>Carrera:</label>
                                                <p class="mb-0" id="carrera_alumno"></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label>Telefono:</label>
                                                <p class="mb-0" id="telefono_alumno"></p>
                                            </td>
                                            <td><label>Turno:</label>
                                                <p class="mb-0" id="turno"></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label>Direccion:</label>
                                                <p class="mb-0" id="direccion_alumno"></p>
                                            </td>
                                            <td><label>Condicion:</label>
                                                <p class="mb-0" id="condicion"></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>

                        </tr>
                    </table>


                    <!-- DATOS DE APODERADO -->
                    <table id="factura_cliente">
                        <tr>
                            <td class="info_cliente">
                                <div class="round">
                                    <span class="h3">Cliente</span>
                                    <table class="datos_cliente">
                                        <tr>
                                            <td>
                                                <label>N° DOcumento:</label>
                                                <p class="mb-0">54895468</p>
                                            </td>
                                           
                                            <td>
                                                <label>Nombre:</label>
                                                <p class="mb-0">Angel Arana Cabrera</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Teléfono:</label>
                                                <p class="mb-0">7854526</p>
                                            </td>
                                            <td><label>Dirección:</label>
                                                <p class="mb-0">Calzada Buena Vista</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>

                        </tr>
                    </table>

                    <h6><b>LISTA DE CUOTAS<b></h6>

                    <table id="factura_detalle">
                        <thead>
                            <tr>
                                <!-- <th >AS</th> -->
                                <th >N° Cuota</th>
                                <th >Monto</th>
                                <th >Estado Cota</th>
                                <th >N° Recibo</th>
                                <th class="text-right">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="detalle_productos">
    

                            <?php if (!empty($resultado_cuotas)) { ?>
                                <?php foreach ($resultado_cuotas as $item) { ?>

                                    <tr>
                                        <!-- <td class=""><?php echo $item['cuota_id']  ?></td> -->
                                        <td class=""><?php echo $item['numero_cuota']  ?></td>
                                        <td class=""><?php echo $item['monto_cuota']  ?></td>
                                        <td class=""><?php echo $item['estado_cuota']  ?></td>
                                        <td class=""><?php echo $item['comprobante_pago_id']  ?></td>
                                        <td class="text-right">
                                            <button class="btn" style="background: blue;color: #fff;margin: 3px;height: 25px;    line-height: 5px;font-weight: bold;">Detalle</button>
                                            <button class="btn" style="background: blue;color: #fff;margin: 3px;height: 25px;    line-height: 5px;font-weight: bold;">Print</button>
                                        </td>
                                    </tr>

                                <?php } ?>
                            <?php } ?>

                        </tbody>
                        <!-- <tfoot id="detalle_totales">
                            <tr>
                                <td colspan="3" class="textright"><span>SUBTOTAL Q.</span></td>
                                <td class="textright"><span>516.67</span></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="textright"><span>IVA (12%)</span></td>
                                <td class="textright"><span>516.67</span></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="textright"><span>TOTAL Q.</span></td>
                                <td class="textright"><span>516.67</span></td>
                            </tr>
                        </tfoot> -->
                    </table>
                    <div>
                        <!-- <p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p> -->
                        <!-- <h4 class="label_gracias">¡Gracias por su compra!</h4> -->
                    </div>

                </div>












            </section>












        </div>
        <!-- /.content-wrapper -->

        

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- <div class="float-right d-none d-sm-inline">
                Desarrollado:Jhampol Chumbes Patricio.
            </div> -->
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

    <script>
        function getMatriculaById() {
            $.ajax({
                url: 'conexion_bd/consulta_matricula.php',
                type: 'POST',
                data: {
                    matricula_id: <?php echo $v_matricula_id ?>
                },
                success(data) {
                    console.info(data);
                    let res = $.parseJSON(data);
                    document.getElementById("numero_matricula").innerHTML = `${res.matricula_id}`;
                    // document.getElementById("condicion").innerHTML = `${res.periodo_id}`;
                    // document.getElementById("responsable").innerHTML = `${res.created_by}`;
                    document.getElementById("fecha_matricula").innerHTML = `${res.created_date}`;
                    document.getElementById("documento_alumno").innerHTML = `${res.numero_documento}`;
                    document.getElementById("nombre_alumno").innerHTML = `${res.nombre}`;
                    document.getElementById("apellido_alumno").innerHTML = `${res.apellidos}`;
                    document.getElementById("telefono_alumno").innerHTML = `${res.celular_1}`;
                    document.getElementById("direccion_alumno").innerHTML = `${res.direccion}`;
                    document.getElementById("culmino_estudio").innerHTML = `${res.ano_egreso}`;
                    document.getElementById("carrera_alumno").innerHTML = `${res.carrera}`;
                    document.getElementById("colegio_procedencia").innerHTML = `${res.colegio_porcedencia}`;
                    document.getElementById("turno").innerHTML = `${res.nombre_turno}`;
                    document.getElementById("condicion").innerHTML = `${res.condicion}`;







                }
            });
        }
        // EJECUTA CUANDO EL DOM ESTA LISTO
        $(document).ready(function() {
            getMatriculaById();
        });
    </script>
</body>

</html>