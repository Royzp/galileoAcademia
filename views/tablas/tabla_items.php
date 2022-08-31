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
                      <th>Tipo</th>                      
                      <th>Concepto</th>  
                      <th>Precio</th>                      
                                               
                           
                      <th style="max-width: 100px;width: 50px;">ACCIÓN</th>

                  </tr>
              </thead>
              <tbody>
                  <?php if (!empty($resultado)) { ?>
                      <?php foreach ($resultado as $item) { ?>

                          <tr style="font-size: 13px;">
                              <td align="center"><?php echo $item['concepto_id']; ?></td>                              
                              <td align="center"><?php echo $item['tipo_concepto']; ?></td>
                              <td align="center"><?php echo $item['concepto']; ?></td>
                              <td align="center"><?php echo $item['precio']; ?></td>
                              
                              <!-- <td class="text-right" style="min-width: 100px;width: 80px;"> -->
                              <td class="text-center" style="min-width: 100px;width: 80px;">

                                <button 
                                     type="button" 
                                     class="btn btn_table btn-info btnEditarItems" 
                                     data-toggle="modal" 
                                     data-target="#exampleModalEditItems" 
                                     data-id="<?php echo $item['concepto_id']; ?>" 
                                     data-tipoconcepto="<?php echo $item['tipo_concepto']; ?>" 
                                     data-concepto="<?php echo $item['concepto']; ?>"
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