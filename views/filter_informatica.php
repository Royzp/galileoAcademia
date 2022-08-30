<?php

     



     include_once 'conexion_bd/config_conexion.php';
     $output = '';
     $text_search = '';
     if(isset($_POST["text_search"])){
          $text_search = $_POST["text_search"];
     }
     if($_POST["type_search"] == 1){
          $type_search = " di.numero_documento ";
     }else{
          $type_search = " nombre_area ";
     }
     if($_POST["order_search"] == 1){
          $order_search = " desc ";
     }else{
          $order_search = " asc ";
     }
      
     switch($_POST["tipo"]){
          case 0:   $query = "FROM tb_documentos_informaticos  AS di 
                             LEFT JOIN tb_area AS a  ON di.area = a.id_area
                             LEFT JOIN tb_tipo_documento AS td  ON  di.tipo_documento = td.id_tip_documento
                             LEFT JOIN tb_usuario  AS us ON di.user_id_informatico = us.id_usuario  
                              
                              ORDER by di.fecha_registro" . $order_search;
               break;
          case 1:   if($_POST["status_filter"] == 0){
                         if(empty($text_search)){
                              $query = "FROM tb_documentos_informaticos  AS di 
                              LEFT  JOIN tb_area AS a  ON di.area = a.id_area
                              LEFT JOIN tb_tipo_documento AS td  ON  di.tipo_documento = td.id_tip_documento
                              LEFT JOIN tb_usuario  AS us ON di.user_id_informatico = us.id_usuario  
                                        
                                        ORDER by di.fecha_registro" . $order_search;
                         }else{
                              $query = "FROM tb_documentos_informaticos  AS di 
                              LEFT  JOIN tb_area AS a  ON di.area = a.id_area
                              LEFT  JOIN tb_tipo_documento AS td  ON  di.tipo_documento = td.id_tip_documento
                              LEFT JOIN tb_usuario  AS us ON di.user_id_informatico = us.id_usuario  
                                        
                                        WHERE " . $type_search . " like '%" . $text_search . "%' ORDER by di.fecha_registro" . $order_search;
                         }                         
                    }else{
                         if (isset($_POST["from_date"], $_POST["to_date"])) {
                              if(empty($text_search)){
                                   $query = "FROM tb_documentos_informaticos  AS di 
  
                                   LEFT  JOIN tb_area AS a  ON di.area = a.id_area
                                   LEFT  JOIN tb_tipo_documento AS td  ON  di.tipo_documento = td.id_tip_documento 
                                   LEFT JOIN tb_usuario  AS us ON di.user_id_informatico = us.id_usuario
                                   WHERE SUBSTRING(di.fecha_registro,1,10)  BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "' 
                                   ORDER by di.fecha_registro" . $order_search;
                              }else{
                                   $query = "FROM tb_documentos_informaticos  AS di 
  
                                   LEFT  JOIN tb_area AS a  ON di.area = a.id_area
                                   LEFT  JOIN tb_tipo_documento AS td  ON  di.tipo_documento = td.id_tip_documento
                                   LEFT JOIN tb_usuario  AS us ON di.user_id_informatico = us.id_usuario
                                   WHERE SUBSTRING(di.fecha_registro_sistema,1,10)  BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "' 
                                   and " . $type_search . " like '%" . $text_search . "%' ORDER by di.fecha_registro" . $order_search;
                              }
                                                       
                         }else{
                              if(empty($text_search)){
                                   $query = "FROM tb_documentos_informaticos  AS di 
  
                                   LEFT  JOIN tb_area AS a  ON di.area = a.id_area
                                   LEFT  JOIN tb_tipo_documento AS td  ON  di.tipo_documento = td.id_tip_documento
                                   LEFT JOIN tb_usuario  AS us ON di.user_id_informatico = us.id_usuario
                                   
                                   ORDER by di.fecha_registro" . $order_search;
                              }else{
                                   $query = "FROM tb_documentos_informaticos  AS di 
  
                                   LEFT  JOIN tb_area AS a  ON di.area = a.id_area
                                   LEFT  JOIN tb_tipo_documento AS td  ON  di.tipo_documento = td.id_tip_documento
                                   LEFT JOIN tb_usuario  AS us ON di.user_id_informatico = us.id_usuario
                                   
                                   WHERE " . $type_search . " like '%" . $text_search . "%' 
                                   ORDER by di.fecha_registro" . $order_search;
                              }
                         }
                    }                                        
     }
     $cadena1 = 'SELECT di.*,a.nombre_area,td.nombre_documento,us.nombre_usuario ';
     $cadena2 = 'SELECT di.*, COUNT(*) AS total_registro ';

     
/*  ====== PAGINADOR ===== */
     $sql_registe    = mysqli_query($conexion, $cadena2 . $query);
     $result_registe = mysqli_fetch_array($sql_registe);
     $total_registro = $result_registe['total_registro'];
     $por_pagina = 4;
     $pagina = $_POST["pagina"];
     /*if (empty($_GET['pagina'])) {
          $pagina = 1;
     } else {
          $pagina = $_GET['pagina'];
     }*/

     $desde = ($pagina - 1) * $por_pagina;
     $total_paginas = ceil($total_registro / $por_pagina);
/*  ====== PAGINADOR ===== */

          $query = $cadena1 . $query . '  LIMIT ' . $desde . ', ' . $por_pagina;
          $result = mysqli_query($conexion, $query);

          $output .= '  
               <div class="container_print">
               <div class="scrollmenu">      
               <table class=" table table-responsive" border="1" style="width: 100%; display:table">  
                    <thead>
                         <tr style="font-size: 90%; background: #3A3A3B; color:cornsilk;">
                         <th>ID </th>
                         <th>FECHA REGISTRO</th>
                         <th>USUARIO INFORMATICO</th>
                         <th>N° DOCUMENTO</th>
                         <th>N° EXPEDIENTE</th>
                         <th>TIPO DOCUMENTO</th>
                         <th>SOLICITANTE</th>
                         <th>AREA</th>
                         <th>ASUNTO</th>
                         <th>ARCHIVO</th>
                              <th style="max-width: 100px;width: 50px;"></th>
                         </tr>
                    </thead>
                    <tbody>
          ';
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_array($result)) {
                    $output .= '  
                         <tr>  
                         <td align="center">' . $row["id_doc_info"] . '</td>  
                         <td align="center">' . $row["fecha_registro"] . '</td>  
                         <td align="center">' . $row["nombre_usuario"] . '</td> 
                         <td align="center">' . $row["numero_documento"] . '</td> 
                         <td align="center">' . $row["numero_expediente"] . '</td>  
                         <td align="center">' . $row["nombre_documento"] . '</td>
                         <td align="center">' . $row["solicitante"] . '</td>  
                         <td align="center">' . $row["nombre_area"] . '</td>  
                         <td align="center">' . $row["asunto"] . '</td>  
                             
                              <td align="center">
                                   <button onclick="openModelPDF(' . "'".  $row["archivo_informatico"] . "'".')" class="btn btn-danger btn__pdf" type="button">
                                   <img src="../views/dist/img/pdf1.png">
                              </td>
                              <td class="text-right" style="min-width: 120px;width: 80px;">
                                   <button type="button" 
                                        class="btn btn_table btn-info btnEditarProveedor" 
                                        data-toggle="modal" 
                                        data-target="#exampleModalProveedor" 
                                            data-id=' . $row["id_doc_info"] . '
                                       



                                        <i class="material-icons">edit</i>
                                   </button>
                                   <button class="btn btn_table btn-primary btnEliminar" id="btnEliminar" data-id=' . $row["id_doc_info"] . '>
                                        <i class="material-icons">delete_forever</i>
                                   </button>
                              </td>                          
                         </tr>  
                    ';
               }
          } else {
               $output .= '  
                    <tr>  
                         <td colspan="5">No Order Found</td>  
                    </tr>  
               ';
          }


          $pag = '<div class="paginador"> <ul>';

          if ($pagina != 1) {
               /*$pag .= '<li><a onclick="fn_paginador(1)"> |< </a></li>
                        <li><a onclick="fn_paginador(' . ($pagina - 1) . ')"> << </a></li>';*/
               $pag .= '<li><a onclick="fn_paginador(' . ($pagina - 1) . ')"> << </a></li>';
          }
          for ($i = 1; $i <= $total_paginas; $i++) {
               if ($i == $pagina) {
                    $pag .= '<li class="pageSelected">' . $i . '</li>';
               } else {
                    if( ($i <= $pagina-2) || ($i >= $pagina+2) ){
                         if($i == 1 || $i == $total_paginas){
                              $pag .= '<li><a onclick="fn_paginador(' . $i . ')">' . $i . '</a></li>';
                         }else{
                              if($i == 2 || $i == ($total_paginas - 1)){
                                   $pag .= '<li><a> ... </a></li>';
                              }                              
                         }
                    }else{
                         $pag .= '<li><a onclick="fn_paginador(' . $i . ')">' . $i . '</a></li>';
                    }                    
               }
          }
          if ($pagina != $total_paginas) {
               /*$pag .= '<li><a  onclick="fn_paginador(' . ($pagina + 1) . ')"> >> </a></li>
                        <li><a onclick="fn_paginador(' . $total_paginas . ')"> >| </a></li>';*/
               $pag .= '<li><a  onclick="fn_paginador(' . ($pagina + 1) . ')"> >> </a></li>';
          }

          $pag .= '</ul> </div>';

          $output .= '</tbody> </table> ' . $pag . ' </div> </div> </div>';
          echo $output;

?>

