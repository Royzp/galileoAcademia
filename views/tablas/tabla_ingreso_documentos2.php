<div class="container_print" id="imp1">
     <div class="scrollmenu">
   <table id="tablaDate" class=" table table-responsive" border="1" style="width: 100%; display:table">
   <!--<table id="tablaDate" class=" table table-responsive" border="1" style="max-width: 100%">-->
                 
                    <thead>
                        <tr style="font-size: 90% ;">
                           <!-- <th>N</th>-->

                             
                      
                            <th>ID </th>
                            <th>FECHA REGISTRO</th>
                            <th>RESPONSABLE</th>
                            <th>FECHA INGRESO</th>
                            <th>RESOLUCIÓN</th>
                            <th>RUC</th>


                            <th>RAZÓN SOCIAL</th>
                            <th>EXPEDIENTE</th>
                            <th>MONTO MULTA</th>

                            <th>DOCUMENTO ADJUNTO</th>
                            <th>CONDICION EXPEDIENTE</th>
                            <th>N° FOLIOS</th>
                            <!-- DATOS ADICIONALES -->

                            <th>RESOLUCIÒN COACTIVA </th>
                            <th>FECHA EMISION</th>
                            <th>FECHA NOTIFICACION</th>

                             <th>ARCHIVO PDF</th>

                             <th>PDF ACTUALIZADO</th>

                            <th>ESTADOS</th>
                             <!-- FIN DATOS ADICIONALES -->
                            
                            
                            
                            
                            <th style="max-width: 100px;width: 50px;"></th>
                            
                        </tr>
                    </thead>
                    <tbody >

                         
                           <?php if(!empty($resultado2)) { ?>
                        <?php foreach($resultado2 as $item) { ?>


                        <tr style="font-size: 80% ;">

                        

                            <td align="center"><?php echo $item['id_document']; ?></td>
                            <td align="center"><?php echo $item['fecha_ingreso']; ?></td>
                            <td align="center"><?php echo $item['nombre_user']; ?></td>
                            <td align="center"><?php echo $item['fecha_registro']; ?></td>
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

                              <!-- FIN DATOS ADICIONALES -->
                            <td align="center"> 

                           <button onclick="openModelPDF('<?php echo $item['nombre_archivo'] ?>')" class="btn btn-danger" type="button">
                             
                             <img src="../views/dist/img/pdf1.png" width="45px" height="45px">
                              
                           </button>

                            
                             </td>

                             <td align="center">
                               

                              <a class="btn btn-light" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/EjecucionCoactiva/views/' . $item['nuevo_pdf']; ?>" > <img src="../views/dist/img/pdfd.png" width="40px" height="40px"></a>

                             </td>

                             <!-- Estados de Expedientes --> 

                            <td border="3" align="center"  style="background:#FFFFFF; 
                                                       border-block-color: #09090A;
                                                       padding: 5px;
                                                       color:#09090A;
                                                       font-weight: 600;  ">
                                
                            
                             <button  style="width: 136px;
                                               height: 69px;"  
                                         type="button" 
                                        class="btn btn-info"><?php echo $item['nombre_estado'];  ?></button>
                             
                             

                            </td>
                            

                            <!-- Fin Estados de Expedientes --> 
                           
                            
                            <td class="text-right" style="min-width: 100px;width: 80px;">
                            
                        
                                <button type="button" 
                                        class="btn btn-primary btnEditar" 
                                        data-toggle="modal" 
                                        data-target="#exampleModal"
                                        data-id="<?php echo $item['id_document']; ?>"

                                        data-resoejecu="<?php echo $item['resolucion_ejecucion']; ?>"
                                        data-fechaEmi ="<?php echo $item['fecha_emision']; ?>"  
                                        data-fechaNoti="<?php echo $item['fecha_notificacion']; ?>">

                                        PROCESO

                                </button>

                               <button type="button" 
                                        class="btn btn-warning btnEstados" 
                                        data-toggle="modal" 
                                        data-target="#estadoUltimo"
                                        data-id="<?php echo $item['id_document']; ?>"

                                        data-monto="<?php echo $item['monto_cobrado'];  ?>"
                                        data-fech-arch="<?php echo $item['fecha_archivado']; ?>"
                                        data-resol-arch="<?php echo $item['resolucion_archivado']; ?>"
                                        data-informe="<?php echo $item['informe_devuelto']; ?>"
                                        data-expediente="<?php echo $item['expediente_judicial']; ?>"
                                        data-proceso="<?php  echo $item['proceso_contencioso']; ?>"
                                        data-revision="<?php echo $item['revision_judicial']; ?>"


                                        data-fecha="<?php echo $item['fecha_ultima_actualizacion']; ?>"
                                        data-estado="<?php echo $item['ultimo_estado']; ?>">

                                        ESTADOS D.

                                </button>  


                              
                                <button 
                                        onclick="viewDetail(<?php echo $item['id_document']; ?>)"
                                        type="button" 
                                        class="btn btn-dark btnHistorial"
                                        data-target="#historial"
                                        data-toggle="modal"
                                        data-id="<?php echo $item['id_document']; ?>" >
                                     HISTORIAL 
                                </button>

                                 <button 
                                   type="button" 
                                   class="btn btn-danger btnActualizarPdf"
                                   data-toggle="modal" 
                                   data-target="#Actualizar_nuevo_pdf"
                                   data-id="<?php echo $item['id_document']; ?>"
                                   data-pdf="<?php echo $item['nuevo_pdf']; ?>">
                                   ACTUALIZAR PDF 
                                </button> 

                            </td>
                        </tr>

                         <?php } ?>
                        <?php } ?>

                    </tbody>
   
                      
                </table>


                </div>

            </div>


<script type="text/javascript">


   function viewDetail(id){
          $.ajax({
                             url: 'conexion_bd/consulta_historial.php',
                             type: 'POST',
                             data: { 

                                'id_documento': id

                                   },



                                   success:function(response){
                                     
                                     $('#tbody_historial').html(response);

                                   }

                      

                      });   

                   }; 


  
                         
</script>