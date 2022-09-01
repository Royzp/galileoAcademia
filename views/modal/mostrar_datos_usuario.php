 <br>
 <center>

     <h2 style="color: #030303 ; font-weight: bold;font-size: 22px;">
         LISTA DE ADMINISTRADORES Y USUARIOS.
     </h2>

     <br>

 </center>


 <div class="container_print">

     <div class="scrollmenu">
         <table id="tablaDate" class=" table  w-100" border="1">
             <thead>
                 <tr bgcolor="#7C98D6 ">
                     <th>ID</th>
                     <th align="center">DNI</th>
                     <th>NOMBRE</th>
                     <th>APELLIDO</th>
                     <th>SEDE</th>
                     <th>CONTRASEÑA</th>
                     <th>TIPO USUARIO</th>

                     <th></th>
                 </tr>

             </thead>
             <tbody>

                 <?php if (!empty($resultado2)) { ?>
                     <?php foreach ($resultado2 as $item) { ?>

                         <tr>


                             <td><?php echo $item['id_user']; ?></td>
                             <td><?php echo $item['numero_dni']; ?></td>
                             <td><?php echo $item['nombre_user']; ?></td>
                             <td><?php echo $item['apellido_user']; ?></td> 
                             <td><?php echo $item['nombre_sede']; ?></td>
                             <td><?php echo $item['clave_user']; ?></td>
                             <td><?php echo $item['nombre_tipo_usuario']; ?></td>


                             <!--<td class="text-right" style="max-width: 100px;width: 50px;">-->
                             <td class="text-right">

                                 <button type="button" 
                                 class="btn btn_table btn-info btnEditar7"
                                  data-toggle="modal" 
                                  data-target="#exampleModal2" 
                                  data-id="<?php echo $item['id_user']; ?>" 
                                  data-dni="<?php echo $item['numero_dni']; ?>"
                                   data-nombre="<?php echo $item['nombre_user']; ?>"
                                    data-apellido="<?php echo $item['apellido_user']; ?>" 
                                    data-sede="<?php echo $item['sede_user_id']; ?>" 
                                    data-contra="<?php echo $item['clave_user']; ?>"
                                     data-typeuser="<?php echo $item['tipo_user']; ?>">
                                     <i class="material-icons">edit</i>
                                 </button>

                                 <button type="button" 
                                        class="btn btn_table btn-info btnEliminar7"
                                  data-toggle="modal" 
                                  data-target="#exampleModal77" 
                                      data-id="<?php echo $item['id_user']; ?>" 
                                     data-dni="<?php echo $item['numero_dni']; ?>" 
                                  data-nombre="<?php echo $item['nombre_user']; ?>" 
                                data-apellido="<?php echo $item['apellido_user']; ?>" 
                                  data-estado="<?php echo $item['estado']; ?>">
                                     <i class="material-icons">

                                         delete_forever
                                     </i>
                                 </button>
                             </td>


                         </tr>
                     <?php } ?>
                 <?php } ?>
             </tbody>
         </table>
     </div>

 </div>