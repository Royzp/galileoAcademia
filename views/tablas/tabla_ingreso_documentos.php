<div id="imp1">
     <div class="scrollmenu">
     

     


   <table id="tablaDate" class=" table table-responsive" border="1" style="width: 100%; display:table">
   <!--<table id="tablaDate" class=" table table-responsive" border="1" style="max-width: 100%">-->
                 

                    <thead>
                        <tr style="font-size: 90%;">
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

                            <th>RESOLUCIÒN EJECUCIÒN </th>
                            <th>FECHA EMISION</th>
                            <th>FECHA NOTIFICACION</th>

                            
                             <!-- FIN DATOS ADICIONALES -->
                              <th>ARCHIVO PDF</th>
                            
                            <!-- ESTADO -->
                           
                            <th>ESTADOS</th>


                            <!-- FIN DE ESTADO -->
                            
                            
                            <th style="max-width: 100px;width: 50px;"></th>
                            
                        </tr>
                    </thead>
                    <tbody >

                         
                           <?php if(!empty($resultado3)) { ?>
                        <?php foreach($resultado3 as $item) { ?>


                        <tr style="font-size: 80%;">

                        

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

                             <!-- PDF -->
                             
                            <td align="center"> 

                           <button onclick="openModelPDF('<?php echo $item['nombre_archivo'] ?>')" class="btn btn-danger" type="button">
                             
                             <img src="../views/dist/img/pdf1.png" width="45px" height="45px">
                              
                           </button>

                            <a class="btn btn-light" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/EjecucionCoactiva/views/' . $item['nombre_archivo']; ?>" > <img src="../views/dist/img/pdfd.png" width="40px" height="40px"></a>
                             </td>

                            <!-- FIN PDF <button type="button"><img src="../views/dist/img/pdf4.png" width="40px" height="40px"></button>  -->
                            <!-- ESTADOS -->


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

                            <!-- FIN ESTADOS -->
                           
                            
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
                                class="btn btn_table btn-info btnEditarDocument"
                                data-toggle="modal" 
                                data-target="#exampleModal2"

                                data-id="<?php echo $item['id_document']; ?>" 
                                data-responsable="<?php echo $item['responsable']; ?>"
                                data-resolucion="<?php echo $item['resolucion']; ?>" 
                                data-ruc="<?php echo $item['ruc']; ?>"
                                data-razon="<?php echo $item['razon_social']; ?>"
                                data-expediente="<?php echo $item['expediente']; ?>"
                                data-importe="<?php echo $item['monto_multa']; ?>"

                                data-datajunt="<?php echo $item['documento_adjunto']; ?>"
                                data-conexp  ="<?php echo $item['condicion_expediente']; ?>"
                                data-numfolio="<?php echo $item['numero_folios']; ?>"

        

                                data-typeuser="<?php echo $item['type_user']; ?>"
                                      
                                >
                                    <i class="material-icons">edit</i>
                                </button>
                                  

                                

                                <button class="btn btn_table btn-primary btnEliminar" id="btnEliminar" data-id="<?php echo $item['id_document']; ?>">
                                    <i class="material-icons">delete_forever</i>
                                </button>






                              <!--  <button type="button" 
                                        class="btn btn-primary btnEditarEstado" 
                                        data-toggle="modal" 
                                        data-target="#exampleModal10"
                                        data-id="<?php echo $item['id_document']; ?>"

                                        data-ulti-estado="<?php echo $item['ultimo_estado']; ?>">

                                        ESTADOS

                                </button> -->

                              

                                
                                <br>

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