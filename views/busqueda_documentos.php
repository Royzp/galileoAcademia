

<?php

include_once 'conexion_bd/conexion.php';
include_once 'conexion_bd/config_conexion.php';


/*  ====== PAGINADOR ===== */

 $sql_registe    = mysqli_query($conexion,'SELECT COUNT(*) as total_registro FROM tb_documento');
 $result_registe = mysqli_fetch_array($sql_registe );
 $total_registro = $result_registe['total_registro'];

 

 $por_pagina= 4; 

 if (empty($_GET['pagina'])) 
 {
  
   $pagina = 1 ;
   
 }else{

   $pagina = $_GET['pagina'];

 }


   $desde = ($pagina-1)* $por_pagina;
   $total_paginas = ceil($total_registro/$por_pagina);

   
   //print_r($total_paginas);


   /*$query = mysqli_query($conexion,'SELECT  d.*, a.nombre_user ,td.nombre_docum FROM  tb_documento as d 
   INNER JOIN tb_usuario as a  ON a.id_user = d.responsable
   INNER JOIN tb_tipo_documento as td  on td.id_tip_docum = d.resolucion  ORDER by  d.id_document ASC  LIMIT $desde,$por_pagina '); */
  
    

 $sql3 = 'SELECT  d.*, a.nombre_user ,td.nombre_docum FROM  tb_documento as d 
 INNER JOIN tb_usuario as a  ON a.id_user = d.responsable
INNER JOIN tb_tipo_documento as td  on td.id_tip_docum = d.resolucion  ORDER by  d.id_document ASC  LIMIT '.$desde.', '.$por_pagina .' ' ;
 $sentencia3= $pdo->prepare($sql3);
 $sentencia3-> execute();
 $resultado3 = $sentencia3-> fetchAll();   



?>

<!DOCTYPE html>
<html>
<head>

    <title>Ejecucion| Coactiva</title>





    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

   <link rel="icon" type="image" href="../views/dist/img/gobierno.jpg"/>
   <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

   

   <link rel="stylesheet" href="styles/styles_tabla.css">

 <style type="text/css">
    
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 18px;
  cursor: pointer;
  text-align: center;   
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #255629;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}


 .paginador ul{

            padding: 15px;
            list-style: none;
            background: #FFF;
            margin-top: 15px;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            justify-content: flex-start;

   }


  .paginador a, .pageSelected{
   
    color: #428bca;
    border: 1px solid #ddd;
    padding: 5px;
    display: inline-block;
    font-size: 14px;
    text-align: center;
    width: 35px;

  }    

  .paginador a:hover{
    
    background: #ddd;

  } 

  .pageSelected{

    color: #fff;
    background: #428bca;
    border: 1px solid #428bca;
  }




 </style>




</head>
<body>

<nav style="background-color: #2B6C2C; position:relative;height: 80px; " >

<img src="../views/dist/img/grr.png" style="width: 198px;
                                            position: absolute;
                                            left: 2%;
                                            top: 3%;
                                            ">
 <h2 align="center" style="    color: #ffffff;
    padding-top: 25px;">BÚSQUEDA DE EXPEDIENTES</h2>

                                          
<!--<img align="right" src="../views/dist/img/foj.jpg" style=" width:  232px;">-->


</nav>


   <nav style="background-color: #d6e0d7;
               height: 440px;" >

     <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../views/template.php" class="nav-link"><i  class="fa fa-home" aria-hidden="true">Inicio</i></a>
      </li>  -->
 
      <hr>
      <h4 align="center">Código del expediente:</h4>
         

        <form action="busqueda_expediente.php" method="get" class="form_search">

        <div class="form-group col-md-12" align="center">

                  <input type="text" name="busqueda" id="busqueda" autocomplete="off" placeholder="Ingresar Expediente " size="10" 
                        width="200px" height="200px" style="width: 330px;
                                                           height: 33px;
                                                       text-align: center;
                                                   text-transform: uppercase;">
           

        <!-- <a href="ficha_expediente.php">-->
            
                  <button  class="button" type="submit" value="BUSCAR" style="height: 40px;
                                                                           width: 258px;
                                                                          margin: -20px -50px;
                                                                        position: relative;
                                                                             top: 50%;
                                                                            left: 3%;">

                                  BUSCAR 

                  </button>
             


              </div>

         </form>

   <!-- <div class="form-group col-md-12" align="center">
      <br>
      <input type="text" name="" minlength="5" maxlength="5" size="10" style="width: 87px; height: 24px;  text-align: center;">
      <input type="text" name="" minlength="5" maxlength="5" size="10" style="width: 87px; height: 24px; text-align: center;">
      <input type="text" name="" minlength="5" maxlength="5" size="10" style="width: 87px; height: 24px; text-align: center;">
      <input type="text" name="" minlength="5" maxlength="5" size="10" style="width: 87px; height: 24px; text-align: center;">
      <input type="text" name="" minlength="5" maxlength="5" size="10" style="width: 87px; height: 24px; text-align: center;">
      <input type="text" name="" minlength="5" maxlength="5" size="10" style="width: 87px; height: 24px; text-align: center;">
    
    </div> -->
      
      <br>
    <center>
         
    <nav style="background-color: #2B6C2C;
                  position: relative;
                  margin-top: 90px;
                height: 32px;
                width: 577px;"> 

             
    <h2 style="color: #FFFFFF ">Expediente N°: 00001 - 2005 - 0 - 1817 - JR - CO - 06</h2>

            

        <div style="    
        top: 37px;
    left: 199px;
    position: absolute;
    width: 0;
    height: 0;
    border-width: 0 7px 10px;
    border-style: solid;
    border-color: transparent transparent red;"> </div>


    <div style="
    left: 205px;
    top: 47px;
    height: 50px;
    position: absolute;
    background: red;
    width: 3px;"></div>



        <p style="
    left: 170px;
    top: 87px;
    height: 50px;
    position: absolute;
    /* background: red; */
    width: 75px;">Secuencia 5 digito</p>



        <div style="    
        top: 37px;
    left: 274px;
    position: absolute;
    width: 0;
    height: 0;
    border-width: 0 7px 10px;
    border-style: solid;
    border-color: transparent transparent red;"> </div>

    <div style="  
    left: 280px;
    top: 46px;
    height: 104px;
    position: absolute;
    background: red;
    width: 3px;"></div>


        <p style="
    left: 243px;
    top: 142px;
    height: 50px;
    position: absolute;
    width: 75px;">Número 4 digitos</p>


        <div style="    
        top: -19px;
    left: 328px;
    position: absolute;
    width: 0;
    height: 0;
    border-width: 0 7px 10px;
    border-style: solid;
    border-color: transparent transparent red;
    transform: rotate(
    180deg
    );"> </div>



    <div style="    
    left: 334px;
    top: -38px;
    height: 20px;
    position: absolute;
    background: red;
    width: 3px;
    }"></div>


    <p style="          
    left: 301px;
    top: -102px;
    height: 50px;
    position: absolute;
    width: 75px;
    ">Número  1-4 digitos</p>


        <div style="    
        top: 37px;
    left: 374px;
    position: absolute;
    width: 0;
    height: 0;
    border-width: 0 7px 10px;
    border-style: solid;
    border-color: transparent transparent red;"> </div>


    <div style="   
    left: 380px;
    top: 46px;
    height: 32px;
    position: absolute;
    background: red;
    width: 3px;"></div>


        <p style="
    left: 343px;
    top: 60px;
    height: 50px;
    position: absolute;
    width: 75px;">Número 4 digitos</p>


    <div style="    
        top: -16px;
    left: 438px;
    position: absolute;
    width: 0;
    height: 0;
    border-width: 0 7px 10px;
    border-style: solid;
    border-color: transparent transparent red;
    transform: rotate(180deg);
    "></div>




    <div style=" left: 444px;
    height: 19px;
    top: -51px;
    position: absolute;
    width: 48px;
    border-left: 3px solid red;
    border-top: 3px solid red;
    border-right: 3px solid red;
    top: -37px;
    "></div>


        <p style="
    left: 443px;
    top: -100px;
    height: 50px;
    position: absolute;
    width: 75px;">Numero 4 digitos</p>


      <div style="    
        top: -16px;
    left: 438px;
    position: absolute;
    left: 490px;
    width: 0;
    height: 0;
    border-width: 0 7px 10px;
    border-style: solid;
    border-color: transparent transparent red;
    transform: rotate(180deg);">  </div>






        <div style="    
        top: 37px;
    left: 535px;
    position: absolute;
    width: 0;
    height: 0;
    border-width: 0 7px 10px;
    border-style: solid;
    border-color: transparent transparent red;"> </div>


    <div style="
    left: 540px;
    top: 47px;
    height: 50px;
    position: absolute;
    background: red;
    width: 3px;"></div>


        <p style="
    left: 504px;
    top: 87px;
    height: 50px;
    position: absolute;
    /* background: red; */
    width: 75px;">Secuencia 5 digisto</p>





          </nav>

        
   </center>





</nav>

<br>
    
  
        

   <?php 


      include_once ("tablas/tabla_busqueda.php");




    ?>



       <!--  <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width:100%!important;margin: 0px">
                <div class="modal-content" style="    height: 100vh;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">VISUALIZACIÓN ARCHIVO PDF </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>  -->
  

<script src="../views/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../views/dist/js/adminlte.min.js"></script>

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
</script>

<script type="text/javascript" src="../views/script/tablas_responsive.js"> </script>


          <script>
                      

                            function openModelPDF(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/EjecucionCoactiva/views/'; ?>'+url);
                            }


        </script>

</body>
</html>