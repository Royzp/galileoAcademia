<div class="container_print">
     <div class="scrollmenu">
   <table  class=" table table-responsive" border="1" style="width: 100%; display:table">
   <!-- <table id="tablaDate" class=" table table-responsive" border="1" style="max-width: 100%">  -->
                 
                    <thead>
                        <tr style="background: #2A2A2A;
                                        color: #fbfbfb; ">
                        
                            <th>ID </th>
                            <th>FECHA REGISTRO</th>
                            <th>RESPONSABLE</th>
                            <th>FECHA INGRESO</th>
                            <th>RESOLUCIÓN</th>
                            <th>RUC</th>


                            <th>RAZÓN SOCIAL</th>
                            <th>EXPEDIENTE</th>
                            <th>MONTO MULTA</th>


                            <!-- DATOS ADICIONALES -->

                            <th>RESOLUCIÒN EJECUCIÒN </th>
                            <th>FECHA EMISION</th>
                            <th>FECHA NOTIFICACION</th>

                            
                             <!-- FIN DATOS ADICIONALES -->
                            
                            <th>ARCHIVO PDF</th>
                            <!-- ESTADO -->
                           
                            <th>ESTADOS</th>


                            <!-- FIN DE ESTADO 
                            
                            
                            <th style="max-width: 100px;width: 50px;"></th>-->
                            
                        </tr>
                    </thead>
                    <tbody >

                         
                        <?php if(!empty($resultado3)) { ?>
                        <?php foreach($resultado3 as $item) { ?> 

                           

                        <tr>

                        

                            <td align="center"><?php echo $item['id_document']; ?></td>
                            <td align="center"><?php echo $item['fecha_ingreso']; ?></td>
                            <td align="center"><?php echo $item['nombre_user']; ?></td>
                            <td align="center"><?php echo $item['fecha_registro']; ?></td>
                            <td align="center"><?php echo $item['nombre_docum']; ?></td>
                            <td align="center"><?php echo $item['ruc']; ?></td>


                            <td align="center"><?php echo $item['razon_social']; ?></td>
                            <td align="center">Exp:<?php echo $item['expediente']; ?></td>
                            <td align="center"><?php echo $item['monto_multa']; ?></td>

                            
                            
                            <!-- DATOS ADICIONALES -->
                            

                            <td style="background-color: #D4D5D8"><?php echo $item['resolucion_ejecucion']; ?></td>
                            <td align="center"><?php echo $item['fecha_emision']; ?></td>
                            <td align="center"><?php echo $item['fecha_notificacion']; ?></td>
                            

                            <!-- FIN DATOS ADICIONALES -->
                             
                            <!-- PDF -->
                             
                            <td align="center"> 

                           <!--<button onclick="openModelPDF('<?php echo $item['nombre_archivo'] ?>')" class="btn btn-danger" type="button">
                             
                             <img src="../views/dist/img/pdf1.png" width="45px" height="45px">
                              
                           </button> -->

                            <a class="btn btn-light" target="_black" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/EjecucionCoactiva/views/' . $item['nombre_archivo']; ?>" > <img src="../views/dist/img/pdfd.png" width="40px" height="40px"></a>
                             </td>

                            <!-- FIN PDF <button type="button"><img src="../views/dist/img/pdf4.png" width="40px" height="40px"></button>  -->

                            <!-- ESTADOS -->


                             <td align="center" class="style_status<?php echo $item['estado']; ?>">
                                 

                              <?php
                             
                             if ($item['estado']== 1) {
                                echo "ACTIVO" ;   
                             }
                             if ($item['estado']== 2) {

                                 echo "PENDIENTE";
                             }

                             if ($item['estado']== 3) {

                                echo "TERMINADO";
                             }

                              if ($item['estado']== 4) {

                                echo "TERMINADO";
                             }

                             
                             ?>


                             </td>

                        </tr>

                        <?php } ?>
                        <?php } ?> 


                       
                    </tbody>
   
                      
                </table>

                      <div class="paginador">

                        <ul> 

                         <?php 

                           if ($pagina !=1) {
                               



                         ?>




                          <li><a href="?pagina= <?php echo 1; ?>">|<</a></li>
                          <li><a href="?pagina= <?php echo $pagina-1 ?>"><<</a></li>

                          <?php  
                               
                              }


                              for ($i=1; $i <= $total_paginas ; $i++) { 


                                if ($i == $pagina)
                                 {
                                    echo '<li class="pageSelected">'.$i.'</li>';
                                
                                 }else{

                                     echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';

                                 }                        
                               } 


                               if ($pagina != $total_paginas) 

                               {
                                

                              ?>


                           
                          
                          <li><a href="?pagina= <?php echo $pagina + 1 ;   ?>">>></a></li>  
                          <li><a href="?pagina= <?php echo $total_paginas; ?>">>|</a></li>   

                             <?php   
                              
                               } 

                               ?>    

                        </ul>
                    

                     </div>


                </div>

            </div>