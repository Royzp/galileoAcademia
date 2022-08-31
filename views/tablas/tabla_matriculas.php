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
                      <th>Alumno</th>
                      <th>Apoderado</th>
                      <th>ciclo</th>
                      <th>turno</th>
                      <th>periodo</th>
                      <th>condicion</th>
                      <th style="max-width: 100px;width: 50px;">ACCIÓN</th>

                  </tr>
              </thead>
              <tbody>
                  <?php if (!empty($resultado)) { ?>
                      <?php foreach ($resultado as $item) { ?>

                          <tr style="font-size: 13px;">
                              <td align="center"><?php echo $item['matricula_id']; ?></td>
                              <td align="center"><?php echo $item['nombre']; ?> <?php echo $item['apellidos']; ?></td>
                              <td align="center"><?php echo $item['nombres_apoderado']; ?></td>
                              <td align="center"><?php echo $item['nombre_ciclo']; ?></td>
                              <td align="center"><?php echo $item['nombre_turno']; ?></td>
                              <td align="center"><?php echo $item['nombre_periodo']; ?></td>
                              <td align="center"><?php echo $item['condicion']; ?></td>
                              
                              
                              <!-- <td class="text-right" style="min-width: 100px;width: 80px;"> -->
                              <td class="text-center" style="min-width: 100px;width: 80px;">

                                <button 
                                     type="button" 
                                     class="btn btn_table btn-info btnEliminarMAtricula" 
                                     data-toggle="modal" 
                                     data-target="#exampleModal2" 
                                     data-id="<?php echo $item['matricula_id']; ?>"
                                     data-nombre="<?php echo $item['nombre']; ?>" 
                                     data-ciclo="<?php echo $item['nombre_ciclo']; ?>" 
                                     data-periodo="<?php echo $item['nombre_periodo']; ?>"
                                     data-estado="<?php echo $item['estate']; ?>">
                                     <i class="material-icons">
                                         delete_forever
                                     </i>
                                  </button>
                                <!-- <button type="button" class="btn btn_table btn-info" onclick="goDetalle(<?php echo $item['matricula_id']; ?>)">
                                    <i class="material-icons">more</i>
                                </button> -->

                              </td>


                          </tr>
                      <?php } ?>
                  <?php } ?>
              </tbody>


          </table>


      </div>

  </div>