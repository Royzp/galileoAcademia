  <div class="container_print">
      <div class="scrollmenu">
          <table id="tablaDate" class=" table " border="1">

              <thead>
                  <tr>
                      <th>N</th>
                      <th>FECHA INGRESO</th>
                      <th>RAZON SOCIAL</th>
                      <th>RUC</th>
                      <th>TELEFONO</th>

                      <th style="max-width: 100px;width: 50px;">ACCIÓN</th>



                  </tr>
              </thead>
              <tbody>
                  <?php if (!empty($resultado)) { ?>
                      <?php foreach ($resultado as $item) { ?>
                          <tr>
                              <td align="center"><?php echo $item['id_proveedor']; ?></td>
                              <td align="center"><?php echo $item['fecha_proveedor']; ?></td>
                              <td align="center"><?php echo $item['razon_social']; ?></td>
                              <td align="center"><?php echo $item['ruc']; ?></td>
                              <td align="center"><?php echo $item['telefono']; ?></td>

                              <td class="text-center" style="min-width: 100px;width: 80px;">

                              <button 
                                type="button" 
                                class="btn btn_table btn-info btnEditarProveedor"
                                data-toggle="modal" 
                                data-target="#exampleModalProveedor"

                                data-id="<?php echo $item['id_proveedor']; ?>" 
                                data-razon="<?php echo $item['razon_social']; ?>"
                                data-ruc="<?php echo $item['ruc']; ?>" 
                                data-telefono="<?php echo $item['telefono']; ?>">
                                    <i class="material-icons">edit</i>
                                </button>

                                  <button 
                                  type="button" 
                                  data-target="#exampleModal6"
                                  data-toggle="modal" 
                                  class="btn btn_table btn-primary btnEliminarProveedor"  
                                  data-id="<?php echo $item['id_proveedor']; ?>"
                                  data-razon="<?php echo $item['razon_social']; ?>"
                                  data-ruc="<?php echo $item['ruc']; ?>" 
                                  data-telefono="<?php echo $item['telefono']; ?>">

                                 <i class="material-icons">delete_forever</i>

                                  </button>

                                  <br>

                              </td>

                          </tr>
                      <?php } ?>
                  <?php } ?>
              </tbody>


          </table>


      </div>

  </div>