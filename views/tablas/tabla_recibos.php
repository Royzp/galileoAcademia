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
                     
                      <th>CODE</th>
                      <!-- <th>Nombres</th>                      
                      <th>N° Doc</th>                       -->
                      <th>Monto</th>                      
                      <!-- <th>Tipo</th>                       -->
                      <th>Sede</th>                      
                      <th>Creado Por</th>                      
                      <th>Fecha</th>                      
                      <th style="max-width: 100px;width: 50px;">ACCIÓN</th>

                  </tr>
              </thead>
              <tbody>
                  <?php if (!empty($resultado)) { ?>
                      <?php foreach ($resultado as $item) { ?>

                          <tr style="font-size: 13px;">
                              <td align="center"><?php echo $item['recibo_id']; ?></td>
                              <!-- <td align="center"><?php echo $item['nombre']; ?> <?php echo $item['apellidos']; ?></td>
                              <td align="center"><?php echo $item['numero_documento']; ?></td> -->
                              <td align="center"><?php echo $item['monto_total']; ?></td>
                              <!-- <td align="center"><?php echo $item['tipo_concepto']; ?></td> -->
                              <td align="center"><?php echo $item['nombre_sede']; ?></td>
                              <td align="center"><?php echo $item['created_by']; ?></td>
                              <td align="center"><?php echo $item['created_date']; ?></td>
                             
                              
                              <!-- <td class="text-right" style="min-width: 100px;width: 80px;"> -->
                              <td class="text-center" style="min-width: 100px;width: 80px;">

                                <button 
                                     type="button" 
                                     class="btn btn_table btn-info btnEliminarRecibo" 
                                     data-toggle="modal" 
                                     data-target="#exampleModalEliminarRecibo" 
                                     data-id="<?php echo $item['recibo_id']; ?>" 
                                     data-numrecibo="<?php echo $item['recibo_id']; ?>" 
                                     data-monto="<?php echo $item['monto_total']; ?>" 
                                     data-status="<?php echo $item['status']; ?>" 
                                     data-sede="<?php echo $item['nombre_sede']; ?>" >
                                      <i class="material-icons">delete</i>
                                  </button>
                                <button type="button" class="btn btn_table btn-info" onclick="getDetalleRecibo(<?php echo $item['recibo_id']; ?>)">
                                    <i class="material-icons">more</i>
                                </button>

                              </td>



                          </tr>
                      <?php } ?>
                  <?php } ?>
              </tbody>


          </table>


      </div>

  </div>