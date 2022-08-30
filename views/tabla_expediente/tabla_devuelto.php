
<?php
  include_once 'conexion_bd/conexion.php';

  $sql ="SELECT  d.*, a.nombre_user ,td.nombre_docum , ta.nombre_document , te.nombre_estado FROM  tb_documento as d 
  
  INNER JOIN tb_usuario as a  ON a.id_user = d.responsable
  
  INNER JOIN tb_tipo_documento as td  on td.id_tip_docum = d.resolucion

   LEFT JOIN tb_tipo_documento_adjunto AS ta  ON ta.id_tip_docum_adj = d.documento_adjunto
   
   INNER JOIN tb_tipo_estados AS te ON   te.id_tip_estado = d.ultimo_estado  
   
   WHERE d.ultimo_estado = '5' ";
  
   $sentencia = $pdo->prepare($sql);
   $sentencia -> execute();
   $resultado = $sentencia-> fetchAll();  

?>

<style>
   #tablaDate5 {
        border: none;
        box-shadow: 0px 0px 5px 3px rgba(107, 104, 104, 0.1411764705882353);
        text-transform: uppercase;
    }

    #tablaDate5 thead tr {
        background-color:#393939  !important;
        color: #fff;
        border: none;
    }

    #tablaDate5 tbody tr {
        border: none;
    }

    #tablaDate5 tbody tr td {
        border: none;
        border-bottom: 1px solid #6B6B6C  ;
    }

     #tablaDate5 tr:hover{

    background-color: #D4D5D8 ; 
   }

    .btn_table {
        border: none;
        line-height: 6px;
        padding: 2px;
        background: transparent !important;
        border-radius: 2px;
    }

    .btn_table i {
        font-size: 18px;
        color: #040404;
    }

    #tablaDate_wrapper input {
        border: none;
        box-shadow: 0px 0px 5px 3px rgba(107, 104, 104, 0.1411764705882353);
        height: 32px;
        padding: 5px;
        margin-left: 15px;
    }

    #tablaDate_wrapper select {
        height: 30px;
        text-align: center;
        padding-left: 10px;
        margin: 2px 10px;
        border: none;
        box-shadow: 0px 0px 5px 3px rgba(107, 104, 104, 0.1411764705882353);
    }

    #tablaDate_filter {
        margin: 5px;
    }

    #tablaDate_wrapper {
        margin-top: 10px;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 10px 18px;
        border-bottom: 1px solid transparent !important;
    }
    
    .style_status1{

     background: #18C413  ;
     color: #fff;
     font-weight: bold;


}

.style_status2{
   
 background: #621292  ;
 color: #fff;
font-weight: bold;
}

.style_status3{

 background: #828080  ;
 color: #fff;
font-weight: bold;

}



 </style>

 TOTAL EXP. DEVUELTO : <?php echo count($resultado)?>
<div class="container_print">
     <div class="scrollmenu">
   <table id="tablaDate5" class=" table table-responsive" border="1" style="width: 100%; display:table">
   <!--<table id="tablaDate" class=" table table-responsive" border="1" style="max-width: 100%">-->
                 
                    <thead>
                        <tr style="font-size: 10px;">
                           <!-- <th>N</th>-->

                             
                      
                            <th>ID </th>
                            <th>FECHA INGRESO</th>
                            <th>RESPONSABLE</th>
                            <th>RESOLUCIÓN</th>
                            <th>RUC</th>


                            <th>RAZÓN SOCIAL</th>
                            <th>EXPEDIENTE</th>
                            <th>MONTO MULTA</th>

                            <th>DOCUMENTO ADJUNTO</th>
                            <th>CONDICION EXPEDIENTE</th>
                            <th>N° FOLIOS</th>
                            <!-- DATOS ADICIONALES -->

                            <th>RESOLUCIÒN EJECUCIÒN </th>
                            <th>FECHA EMISION</th>
                            <th>FECHA NOTIFICACION</th>

                            <th>INF. DEVUELTO</th>

                            
                             <!-- FIN DATOS ADICIONALES -->
                             <th>ARCHIVO PDF</th>
                             <th>PDF ACTUALIZADO</th>
                            <!-- ESTADO -->
                           
                            <th>ESTADOS</th>


                            <!-- FIN DE ESTADO -->
                             <th>HISTORIAL</th>
                            
                           <!-- <th style="max-width: 100px;width: 50px;"></th> -->
                            
                        </tr>
                    </thead>
                    <tbody >

                         
                           <?php if(!empty($resultado)) { ?>
                        <?php foreach($resultado as $item) { ?>


                        <tr style="font-size: 11px;">

                        

                            <td align="center"><?php echo $item['id_document']; ?></td>
                            <td align="center"><?php echo $item['fecha_ingreso']; ?></td>
                            <td align="center"><?php echo $item['nombre_user']; ?></td>
                            <td align="center"><?php echo $item['nombre_docum']; ?></td>
                            <td align="center"><?php echo $item['ruc']; ?></td>


                            <td align="center"><?php echo $item['razon_social']; ?></td>
                            <td align="center"><?php echo $item['expediente']; ?></td>
                            <td align="center"><?php echo $item['monto_multa']; ?></td>

                            <td align="center"><?php echo $item['nombre_document']; ?></td>
                            <td align="center"><?php echo $item['condicion_expediente']; ?></td>
                            <td align="center"><?php echo $item['numero_folios']; ?></td>
                            
                            <!-- DATOS ADICIONALES -->
                            

                            <td style="background-color: #D4D5D8"><?php echo $item['resolucion_ejecucion']; ?></td>
                            <td align="center"><?php echo $item['fecha_emision']; ?></td>
                            <td align="center"><?php echo $item['fecha_notificacion']; ?></td>

                            <td align="center"><?php echo $item['informe_devuelto']; ?></td>
                            

                            <!-- FIN DATOS ADICIONALES -->

                             <!-- PDF -->
                             
                             <td align="center"> 

                           <button onclick="openModelPDF('<?php echo $item['nombre_archivo'] ?>','1')" class="btn btn-danger" type="button">
                             
                             <img src="../views/dist/img/pdf1.png" width="20px" height="20px">
                              
                           </button>
                                
                             </td>


                             <td align="center"> 

                           <button onclick="openModelPDF('<?php echo $item['nuevo_pdf'] ?>','2')" class="btn btn-light" type="button">
                             
                           <img src="../views/dist/img/pdfd.png" width="30px" height="30px">
                              
                           </button>

      
                             </td>

                            <!-- FIN PDF <button type="button"><img src="../views/dist/img/pdf4.png" width="40px" height="40px"></button>  -->
                            <!-- ESTADOS -->


                            <td  align="center" style="background: #3E3E3E;font-size: 12px; font-style: bold;color:#FFFFFF ">
                                 

                              <?php  echo $item['nombre_estado'];  ?>


                             </td>

                            <!-- FIN ESTADOS -->
                             <td>
                              
                            <button type="button" 
                                        class="btn btn-primary btnEditar" 
                                        data-toggle="modal" 
                                        data-target="#ModalHistorial_pdf"
                                        data-id="<?php echo $item['id_document']; ?>"

                                        data-resoejecu="<?php echo $item['resolucion_ejecucion']; ?>"
                                        data-fechaEmi ="<?php echo $item['fecha_emision']; ?>"  
                                        data-fechaNoti="<?php echo $item['fecha_notificacion']; ?>"
                                        
                                        onclick="viewHistorial('<?php echo $item['id_document'] ?>')">

                                       PDF

                                </button>

                            </td>
                         



                        </tr>

                         <?php } ?>
                        <?php } ?>

                    </tbody>
   
                      
                </table>


                </div>

            </div>

  
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
    
<script>

$(document).ready(function () {


$('#tablaDate5').DataTable({

    "bJQueryUI": true,
    "order": [[0, 'ASC']]
    ,
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