<div class="modal fade bd-example-modal-lg" id="exampleModalEliminarRecibo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#B81C1C">
                <center>
                    <h3 class="modal-title" id="exampleModalLabel">
                        <font style="color: #FFFFFF ">
                            <img src="../views/dist/img/elim_matricula.png" style="width: 75px;">
                            ELIMINAR RECIBO
                        </font>
                    </h3>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background:#6672CB;color: #fff; ">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="#" method="post" id="frm_eliminar_recibo" name="frm_eliminar_recibo">


                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <span id="error2"></span>
                                <center> <label for="Fecha">N° Registro</label> </center>

                                <input type="text" value="" autocomplete="off" class="form-control" id="id_elim_recibo" name="id_elim_recibo" style="text-align:center; width: 707px;" disabled>

                            </div>

                        </div>

                    </div>

                    <div class="row col-md-12" align="center">


                                
                                <div class="form-group col-md-4">
                                        <label>NUMERO RECIBO</label>
                                        <input type="text" class="form-control" id="numero_recibo_elim" name="numero_recibo_elim" style=" text-align: center;" autocomplete="off" disabled>
                                    </div>



                                    <div class="form-group col-md-4">
                                        <label>SEDE</label>
                                        <input type="text" class="form-control" id="sede_elim"  name="sede_elim" style=" text-align: center;"  autocomplete="off" disabled>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label>MONTO</label>
                                        <input type="text" class="form-control" id="monto_elim"  name="monto_elim" style=" text-align: center;" autocomplete="off" disabled>
                                    </div>



                                </div>

                                <hr>


                    <div class="row col-md-12" align="center" style="margin-left: 16%;">

                        <label style="font-size: 19px;font-family: cursive;"> Ingrese descripcion por que esta borrando el Recibo !!</label>

                    </div>

                    <br>

                    <div class="row">



                        <div class="col-lg-12">

                            <input type="text" class="form-control" id="nombre_egreso_elim" name="nombre_egreso_elim" placeholder="Ingrese Descripcion" required autocomplete="off">
                        </div>


                    </div>




                    <input type="hidden" class="form-control" id="estado_elim" name="estado_elim" placeholder="Ingrese Expediente" autocomplete="off">









                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                        <input id="btngrabar" type="submit" class="button" value="ELIMINAR" style="background:#dc3545; 
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