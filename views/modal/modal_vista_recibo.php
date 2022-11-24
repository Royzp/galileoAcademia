
        <!-- MODAL   -->
        <div class="modal fade bd-example-modal-lg" id="modalReciboEmitido" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-color:#1471B6; background-color: #1471B6;padding: 0px 15px;">
                        <b>
                            <P class="modal-title" id="exampleModalLongTitle"
                                style="font-size: 30px;color: #FFFFFF; font-family: arial;">
                                <i class="fa fa-cloud-upload" aria-hidden="true" style="font-size: 18px;
                                    text-transform: uppercase;
                                    font-family: 'Source Sans Pro';">
                                    Recibo emitido
                                </i>
                            </P>
                        </b>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="position: relative;
                                top: 5px;
                                font-size: 36px;">
                                &times;
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-center">




                                    <!-- <div class="ticket" id="printId" style="width: 300px;"> -->
                                    <div id="printId" style="width: 300px;margin: 0 auto;">
                                        <div style="width: 100%;text-align:center">
                                            <img style="width: 200px;" src="../assets/img/logo_recibo.png"
                                                alt="Logotipo">
                                        </div>
                                        <p style="text-align:center;margin-bottom: 0px;">
                                            Parzibyte's blog
                                            <br> RECIBO N° <span id="idReciboRecibo"></span>
                                        </p>
                                        <p
                                            style="text-align: left;font-size: 16px;margin-bottom: 0px;text-transform: uppercase;font-weight: 600;">
                                            SEDE : <span id="idNombreSedeRecibo"> </span>
                                        </p>
                                        <p style="text-align:justify; font-size: 15px;margin-bottom: 0px;">

                                            F: <span id="idFechaRecibo"></span> - <span id="idHoraRecibo"></span>

                                        </p>
                                        <!-- <p style="text-align:justify; font-size: 15px;margin-bottom: 0px;">
                                            Fecha: <span id="idFechaRecibo"></span> - Hora: <span id="idHoraRecibo"></span>
                                        </p> -->

                                        <p style="text-align:center; font-size: 18px;margin-bottom: 0px;">
                                            <b id="idDescripcionRecibo">

                                                <b>
                                        </p>

                                        <p style="text-align:center; font-size: 18px;margin-bottom: 0px;">
                                            <b>
                                                <span id="idResponsableRecibo"></span>
                                                <b>
                                        </p>

                                        <table
                                            style="text-align:left;width: 100%;font-family: 'Source Sans Pro';font-weight:400;">
                                            <!-- <thead> -->
                                            <tr>
                                                <th
                                                    style="padding:3px 5px;font-size: 14px!important;font-weight:400;background: #fff;">
                                                    PRODUCTO</th>
                                                <th
                                                    style="padding:3px 5px;font-size: 14px!important;font-weight:400;background: #fff;">
                                                    CANT</th>
                                                <th
                                                    style="padding:3px 5px;font-size: 14px!important;font-weight:400;background: #fff;">
                                                    PU</th>
                                                <th
                                                    style="padding:3px 5px;font-size: 14px!important;font-weight:400;background: #fff;">
                                                    s/</th>
                                            </tr>

                                            <!-- </thead> -->
                                            <tbody id="tableReciboDetalle">

                                                
                                            </tbody>
                                        </table>
                                        <p style="margin-top: 20px;">
                                            ¡GRACIAS POR SU PREFERENCIA!
                                            <!-- <br>parzibyte.me -->
                                        </p>

                                        <p style="    margin-bottom: 0px;
                                                    font-weight: 400;
                                                    font-size: 13px;
                                                    text-align: left;
                                                    text-transform: uppercase;">
                                            Vendedor: <span id="idCreadoPor"></span>

                                        </p>


                                    </div>

                                </div>

                                <div class="col-12">
                                    <!-- <button class="btn" onclick="printDocument('printId')">IMPRIMIR</button> -->
                                    <a href="http://localhost:8080/GalileoAcademia/views/venta_items.php">
                                    <button class="btn" onclick="printRoy()" >IMPRIMIR</button>
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


