<style>
      .td_container_img img {
          max-height: 60px;
          max-width: 170px;
      }
  </style>
  <div class="container_print">
      <div class="scrollmenu">
          <table id="tablaDate" class=" table " border="1">

              <thead>
                  <tr style="font-size: 14px;text-align: center;">
                     
                      <th>ID</th>
                      <th>TIPO EGRESO</th>                      
                      <th>TIPO COMPROBANTE</th>                      
                      <th>NUMERO COMRPOBANTE</th>                      
                      <th>DESCRIPCION</th>  
                      <th>MONTO</th>  
                      <th>FECHA PAGO</th>                      
                                                                          
                      <th style="max-width: 100px;width: 50px;">ACCIÓN</th>

                  </tr>
              </thead>
              <tbody>
                  <?php if (!empty($resultado)) { ?>
                      <?php foreach ($resultado as $item) { ?>

                          <tr style="font-size: 13px;">
                              <td align="center"><?php echo $item['id_egreso']; ?></td>                              
                              <td align="center"><?php echo $item['nombre_tipo_egreso']; ?></td>
                              
                              <td align="center"><?php

                              if( $item['tipo_comprobante_id'] == 1){
                                echo 'BOLETA'; 
                              }
                              if( $item['tipo_comprobante_id'] == 2){
                                echo 'FACTURA'; 
                              }
                              if( $item['tipo_comprobante_id'] == 3){
                                echo 'SIN COMPROBANTE'; 
                              }
                              if( $item['tipo_comprobante_id'] == '' ||  $item['tipo_comprobante_id'] == null){
                                echo 'SIN COMPROBANTE'; 
                              }
                              
                              ?></td>
                              <td align="center"><?php echo $item['numero_comprobante']; ?></td>
                              <td align="center"><?php echo $item['descripcion']; ?></td>
                              <td align="center"><?php echo $item['monto_egreso']; ?></td>
                              <td align="center"><?php echo $item['fecha_pago']; ?></td>
                              
                              <!-- <td class="text-right" style="min-width: 100px;width: 80px;"> -->
                              <td class="text-center" style="min-width: 100px;width: 80px;">

                                <button 
                                     type="button" 
                                     class="btn btn_table btn-info btnEditarEgresos" 
                                     data-toggle="modal" 
                                     data-target="#exampleModalEditEgresos" 
                                     data-id="<?php echo $item['id_egreso']; ?>" 
                                     data-monto="<?php echo $item['monto_egreso']; ?>" 
                                     data-descripcion="<?php echo $item['descripcion']; ?>"
                                     data-precio="<?php echo $item['precio']; ?>"
                                     data-idtipo="<?php echo $item['tipo_concepto_id']; ?>"
                                     data-estate="<?php echo $item['estate']; ?>">
                                     <i class="material-icons">edit</i>
                                  </button>

                                  <button 
                                     type="button" 
                                     class="btn btn_table btn-info btnEliminarItems" 
                                     data-toggle="modal" 
                                     data-target="#exampleModalElimItems" 
                                     data-id="<?php echo $item['concepto_id']; ?>" 
                                     data-concepto="<?php echo $item['concepto']; ?>"
                                     data-precio="<?php echo $item['precio']; ?>"
                                     data-estate="<?php echo $item['estate']; ?>">
                                     <i class="material-icons">delete_forever</i>
                                  </button>

                                <!-- <button type="button" class="btn btn_table btn-info" onclick="goDetalle(<?php echo $item['matricula_id']; ?>)">
                                <i class="material-icons">delete_forever</i>
                                </button> -->

                              </td>


                          </tr>
                      <?php } ?>
                  <?php } ?>
              </tbody>


          </table>


      </div>

  </div>