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
                     
                     <th>VENDEDOR</th>
                      <th>FECHA VENTA</th> 
                      <th>PRODUCTO</th>
                      <th>CANTIDAD</th>
                      <th>PRECIO</th>
                      <th>TOTAL</th>
                      <th>CLIENTE</th>
                      

                      <th style="max-width: 100px;width: 50px;">ACCIÓN</th>


                  </tr>
              </thead>
              <tbody>
                  <?php if (!empty($resultado)) { ?>
                      <?php foreach ($resultado as $item) { ?>

                          <tr style="font-size: 13px;">
                              <td align="center"><?php echo $item['id_producto']; ?></td>
                              <td align="center"><?php echo $item['fecha_producto']; ?></td>
                              <td align="center"><?php echo $item['nombre_producto']; ?></td>
                              <td align="center"><?php echo $item['nombre_producto']; ?></td>
                              <td align="center"><?php echo $item['nombre_categoria']; ?></td>
                              <td align="center"><?php echo $item['lote']; ?></td>
                              <td align="center"><?php echo $item['lote']; ?></td>
                              



                              <!-- <td class="text-right" style="min-width: 100px;width: 80px;"> -->
                              <td class="text-center" style="min-width: 100px;width: 80px;">

                                  <button 
                                     type="button" 
                                     class="btn btn_table btn-info btnEditarDocument" 
                                     data-toggle="modal" 
                                     data-target="#exampleModal2" 
                                     data-id="<?php echo $item['id_producto']; ?>" 
                                     data-producto="<?php echo $item['nombre_producto']; ?>" 
                                     data-categoria="<?php echo $item['categoria']; ?>"
                                     data-lote="<?php echo $item['lote']; ?>" 
                                     data-stock="<?php echo $item['stock']; ?>" 
                                     data-precio="<?php echo $item['precio_venta']; ?>" 
                                     data-proveedor="<?php echo $item['proveedor']; ?>" 
                                     data-marca="<?php echo $item['marca']; ?>" 
                                     data-modelo="<?php echo $item['modelo']; ?>" 
                                     data-unidad="<?php echo $item['unidad_medida']; ?>" 
                                     data-foto="<?php echo $item['foto_producto']; ?>">
                                      <i class="material-icons">edit</i>
                                  </button>

                                  <button 
                                     type="button" 
                                     class="btn btn_table btn-primary btnEliminarProductos" 
                                     data-toggle="modal" 
                                     data-target="#exampleModal4" 
                                     data-id="<?php echo $item['id_producto']; ?>"
                                     data-producto="<?php echo $item['nombre_producto']; ?>"
                                     data-categoria="<?php echo $item['categoria']; ?>"
                                     data-lote="<?php echo $item['lote']; ?>" 
                                     data-stock="<?php echo $item['stock']; ?>" 
                                     data-precio="<?php echo $item['precio_venta']; ?>"
                                     data-estado="<?php echo $item['estado']; ?>"  >

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