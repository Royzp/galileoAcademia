 <?php

    include_once 'conexion_bd/config_conexion.php';


    ?>


 <style>
     table {
         border-collapse: collapse;
         font-size: 12pt;
         font-family: 'arial';
         width: 100%;

     }

     table th {
         text-align: left;
         padding: 10px;
         background: #1B1B1B;
         color: #fff;
         font-weight: 400;
     }

     table tr:nth-child(odd) {
         background: #FFF;
     }


     table td {
         padding: 10px;


     }

     .td_container_img img {
          max-height: 60px;
          max-width: 170px;
      }

     .form_search{
      display: -webkit-flex;
      display: -moz-flex;
      display: -ms-flexbox;
      display: -o-flex;
      display: flex;
      float: right;
      background: initial;
      padding: 10px;
      border-radius: 10px;

     }

     .form_search .btn_search{
        background: #1faac8;
        color: #fff;
        padding: 0 10px;
        border: 0;
        cursor: pointer;
        margin-left: 10px;

     }


 </style>

  <form action="lista_productos_ferreterias.php" method="get" class="form_search">
     
   <input type="text" name="busqueda" id="busqueda" placeholder="Buscar"/>
   <input type="submit" value="Buscar" class="btn_search" />
  </form>

 <table  class="table" >
 
     <tr style="font-size: small;" >
         <th>ID</th>
         <th>FECHA REGISTRO</th>
         <th>USUARIO</th>
         <th>PRODUCTO</th>
         <th>CATEGORIA</th>
         
         <th>STOCK</th>
         <th>PRECIO COMPRA</th>
         <th>PRECIO VENTA</th>
        
         <th>MARCA</th>
         
         <th>UNID.MEDIDA</th>
         <th>IMAGEN</th>
         <th>ACCION</th>

     </tr>

     <?php

         // Paginador 

        $sql_registe = mysqli_query($conexion,"SELECT COUNT(*) AS total_registro FROM  tb_producto WHERE estate = 'Y' ");
        $result_register = mysqli_fetch_array($sql_registe);
        $total_registro = $result_register['total_registro'];

        $por_pagina = 4;

        if(empty($_GET['pagina']))
        {
            $pagina = 1 ;

        }else{

           $pagina = $_GET['pagina']; 
        }

        

        $desde = ($pagina-1) * $por_pagina;

    
        
        //$total_paginas = ceil(10 / 4);

         $total_paginas = ceil($total_registro / $por_pagina);
        
        
       // echo $total_paginas;

         // Datos de Producto

        $query = mysqli_query($conexion, "SELECT pr.*,p.razon_social,ca.nombre_categoria FROM tb_producto AS pr  
        LEFT  JOIN  tb_proveedor AS  p  ON p.id_proveedor = pr.proveedor 
        LEFT  JOIN  tb_categoria AS  ca ON ca.id_categoria = pr.categoria 
        WHERE  estate = 'Y' 
        ORDER BY pr.id_producto DESC
        LIMIT $desde,$por_pagina ");

        $result = mysqli_num_rows($query);

        if ($result > 0) {

            while ($data = mysqli_fetch_array($query)) {


        ?>


             <tr>
                 <td><?php echo $data["id_producto"]  ?></td>
                 <td><?php echo $data["fecha_producto"]  ?></td>
                 <td><?php echo $data["creado_por"]  ?></td>
                 <td><?php echo $data["nombre_producto"]  ?></td>
                 <td><?php echo $data["nombre_categoria"]  ?></td>
                
                 <td><?php echo $data["stock"]  ?></td>
                 <td>S/.<?php echo $data["precio_compra"]  ?></td>
                 <td>S/.<?php echo $data["precio_venta"]  ?></td>
                 
                 <td><?php echo $data["marca"]  ?></td>
                 
                 <td><?php echo $data["unidad_medida"]  ?></td>
                 <td align="center" class="td_container_img"><?php echo "<img src='" . $data['foto_producto'] . "'> " ?></td>
                 <td>
                   
                 <button 
                                     type="button" 
                                     class="btn btn_table btn-info btnEditarDocument" 
                                     data-toggle="modal" 
                                     data-target="#exampleModal2" 
                                     data-id="<?php echo $data['id_producto']; ?>" 
                                     data-producto="<?php echo $data['nombre_producto']; ?>" 
                                     data-categoria="<?php echo $data['categoria']; ?>"
                                     data-lote="<?php echo $data['lote']; ?>" 
                                     data-stock="<?php echo $data['stock']; ?>" 
                                     data-precio="<?php echo $data['precio_venta']; ?>" 
                                     data-proveedor="<?php echo $data['proveedor']; ?>" 
                                     data-marca="<?php echo $data['marca']; ?>" 
                                     data-modelo="<?php echo $data['modelo']; ?>" 
                                     data-unidad="<?php echo $data['unidad_medida']; ?>" 
                                     data-foto="<?php echo $data['foto_producto']; ?>">
                                      <i class="material-icons">edit</i>
                                  </button>

                                  <button 
                                     type="button" 
                                     class="btn btn_table btn-primary btnEliminarProductos" 
                                     data-toggle="modal" 
                                     data-target="#exampleModal4" 
                                     data-id="<?php echo $data['id_producto']; ?>"
                                     data-producto="<?php echo $data['nombre_producto']; ?>"
                                     data-categoria="<?php echo $data['categoria']; ?>"
                                     data-lote="<?php echo $data['lote']; ?>" 
                                     data-stock="<?php echo $data['stock']; ?>" 
                                     data-precio="<?php echo $data['precio_venta']; ?>"
                                     data-estado="<?php echo $data['estado']; ?>"  >

                                      <i class="material-icons">delete_forever</i>
                                  </button>

                                  <br>




                 </td>

             </tr>

     <?php
            }
        }

        ?>


 </table>


  <div class="paginador">

      <ul>
         <?php

           if($pagina !=1){

           

         ?>
    
         <li><a href="?pagina= <?php echo 1; ?>"> |< </a></li>
         <li><a href="?pagina= <?php echo $pagina-1; ?>"> << </a></li>
         
         <?php

          }

          for($i=1; $i <= $total_paginas; $i++){

            if($i == $pagina){

                echo '<li class="pageSelected"> '.$i.' </li>';

            }else{
               
                echo '<li><a href="?pagina='.$i.'"> '.$i.' </a></li>';

            }

          

          }

          if($pagina != $total_paginas){
         ?>

         <li><a href="?pagina= <?php echo $pagina + 1 ; ?>"> >> </a></li>
         <li><a href="?pagina= <?php echo $total_paginas; ?>"> >| </a></li>


         <?php
         
           }


         ?>

      </ul>

  </div>