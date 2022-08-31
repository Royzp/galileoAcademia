<div class="modal fade bd-example-modal-lg" id="exampleModalEliminarMatricula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#B81C1C">
                            <center>
                                <h3 class="modal-title" id="exampleModalLabel">
                                    <font style="color: #FFFFFF ">
                                        <img src="../views/dist/img/elim_matricula.png" style="width: 75px;">
                                        ELIMINAR MATRICULA
                                    </font>
                                </h3>
                            </center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background:#6672CB;color: #fff; ">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="#" method="post" id="frm_eliminar_matricula" name="frm_eliminar_matricula">


                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <span id="error2"></span>
                                            <center> <label for="Fecha">N° Registro</label> </center>

                                            <input type="text" value="" autocomplete="off" class="form-control" id="id_elim_Matricula" name="id_elim_Matricula" style="text-align:center; width: 707px;" disabled>

                                        </div>

                                    </div>

                                </div>






                                <div class="row col-md-12" align="center">


                                
                                <div class="form-group col-md-4">
                                        <label>NOMBRES</label>
                                        <input type="text" class="form-control" id="nombre_matricula_elim" name="nombre_matricula_elim" placeholder="Ingrese Razon Social " autocomplete="off">
                                    </div>



                                    <div class="form-group col-md-4">
                                        <label>CICLO</label>
                                        <input type="text" class="form-control" id="nombre_ciclo_elim" maxlength="8" name="nombre_ciclo_elim" placeholder="Ingrese N° Ruc" autocomplete="off">
                                    </div>





                                    <div class="form-group col-md-4">
                                        <label>PERIODO</label>
                                        <input type="text" class="form-control" id="nombre_periodo_elim" name="nombre_periodo_elim" placeholder="Ingrese Expediente" autocomplete="off">
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