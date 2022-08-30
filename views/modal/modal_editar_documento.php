<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#29358E">
        <center>
          <h3 class="modal-title" id="exampleModalLabel">
            <font style="color: #FFFFFF ">
              <img src="../views/dist/img/editarr.png" style="width: 60px;
                                                             height: 60px;
                                                       margin-right: 17px;"> 
              EDITAR DATOS DE DOCUMENTOS
            </font>
            </h3>
          </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background:#6672CB;color: #fff; ">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="#" method="post" id="Actualizar_Doc" name="Actualizar_Doc">
         
         <div class="row" >


          <div class="col-lg-12">
                   <div class="for-group">
                      <span id="error2"></span>
                         <center> <label for="Fecha">N° Registro</label> </center> 
                
                            <input type="text" value=""  
                            autocomplete="off" class="form-control" 
                            id="idDocumento" name="idDocumento" style="text-align:center" disabled  >

                    </div>
                                
         </div>
     
   


    <div class="row  col-md-12 "  >

  
       <div class="form-group col-md-6">
         <label >RESPONSABLE</label>
  
            <select style="width: 100%" id="txt_respon_edit" name="txt_respon_edit" required="">
                  
                    
                    <?php

                      $query = $mysqli -> query ("SELECT nombre_user ,id_user FROM tb_usuario where tipo_user = 2 ");
                       while ($valores = mysqli_fetch_array($query)) {

                      echo '<option value="'.$valores['id_user'].'" >'.$valores['nombre_user'].'</option>';   

                     }
                     
                     ?>


                      
              
                 </select> 
       </div>
  





     <div class="form-group col-md-6">
       <label >TIPO DOCUMENTO</label>
          <br>
         <select style="width: 100%" id="txt_tipDocumento_edit" name="txt_tipDocumento_edit" required="">
          
           <option value="1">Prescritos</option>
           <option value="2">Escritos</option>

           
         </select>

     </div>


</div>
  


    


    <div class="row  col-md-12">




  <div class="form-group col-md-4">
    <label>N° RUC</label>
    <input type="text" class="form-control" id="txt_ruc_edit" name="txt_ruc_edit" placeholder="Ingrese N° Ruc" autocomplete="off" >
  </div>


  <div class="form-group col-md-4">
    <label >RAZÒN SOCIAL</label>
    <input type="text" class="form-control" id="txt_razonSocial_edit"   name="txt_razonSocial_edit" placeholder="Ingrese Razon Social " >
  </div>




<div class="form-group col-md-4">
    <label >N° EXPEDIENTE</label>
    <input type="text" class="form-control" id="txt_expediente_edit" name="txt_expediente_edit" placeholder="Ingrese Expediente"  >
  </div>







</div>


<div class="row col-md-12">
  
<div class="form-group col-md-4">
    <label >IMPORTE O MONTO  MULTA</label>
    <input type="text" class="form-control" id="txt_importeMonto_edit" name="txt_importeMonto_edit" placeholder="Ingrese Importe/Monto " required="" >
  </div>

  <div class="form-group col-md-4">
    <label >DOCUMENTO ADJUNTO</label>

    <select 
            class="form-control"
            id="txt_docAdjun_edit" name="txt_docAdjun_edit">

       <option value="0">Seleccione:</option>
       <option value="1">Debidamente Notificado</option>
       <option value="2">Constatación</option>
       <option value="3">Carta Retención</option>
       <option value="4">Carta Banco</option>
       <option value="5">Escrito</option>
       <option value="6">Notificación Judicial</option>
             
    </select>
   
  </div>

  <div class="form-group col-md-4">
    <label >CONDICION EXPEDIENTE</label>
    <input type="text" class="form-control" id="txt_condExpe_edit" name="txt_condExpe_edit" placeholder="Ingrese Importe/Monto "  >
  </div>
  

</div>

<div class="row col-md-12">
  
<div class="form-group col-md-4">
    <label >NÚMERO FOLIOS</label>
    <input type="text" class="form-control" id="txt_numFolio_edit" name="txt_numFolio_edit" placeholder="Ingrese Importe/Monto " >
  </div>


<!--  <div class="form-group col-md-4">
    <label >ESTADO ACTUAL </label>

    <select class="form-control" id="txt_edit_estado" name="txt_edit_estado"   >
     
      <option value="1">EN PROCESO</option>
      <option value="2">PENDIENTE</option>
  

    </select>
   
  </div> -->



</div>

     


     </div>

         <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
        <input id="btn_grabar" type="submit" class="button" value="ACTUALIZAR" style="background:#6672CB; 
                                                                                     border: none;
                                                                                     padding: 5px;
                                                                                     color: #fff;
                                                                                     font-weight: 600;  ">
      </div>

        </form>


      </div>
      
    </div>

  </div>

</div> 