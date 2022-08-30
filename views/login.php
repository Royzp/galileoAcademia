<?php


$alert = '';

session_start();


/*  VALIDACION DE TIPO DE USUARIO PARA CADA TEMPLATE   */

//Sesion Validar
if (isset($_SESSION['tipoUser'])) {
  switch ($_SESSION['tipoUser']) {
    case  1:
      header('location: pantalla_principal.php');
      break;

    case 2:
      header('location: pantalla_principal_user.php');
      // header('location: registro_usuarios.php');
      break;

    default:
  }
}


/* FIN  VALIDACION DE TIPO DE USUARIO PARA CADA TEMPLATE   */







if (!empty($_SESION['active'])) {

  header('location:views/pantalla_principal.php');
} else {



  if (!empty($_POST)) {

    //Para probar si el boton Ingresar esta Dando Click 
    //echo  $alert ="Ha dado click en ingresar ";

    if (empty($_POST['usuario']) || empty($_POST['clave'])) {

      $alert = 'Ingrese su Usuario y Clave ';
    } else {

      require_once "conexion_bd/config_conexion.php";

  //     $conexion=mysqli_connect('localhost','root','','bd_academia');
  //  mysqli_query($conexion,"set names utf8");

    print_r($conexion);

      $user  = $_POST['usuario'];
      $clav  = $_POST['clave'];



      $query  = mysqli_query($conexion, " SELECT * FROM  tb_usuario WHERE numero_dni = '" . $user . "'  AND  clave_user  = '" . MD5($clav) . "' AND estado = 'Y'  ");
      mysqli_connect($conexion);
      $result = mysqli_num_rows($query);
      echo $result;



      // $query  = mysqli_query($conexion, " SELECT * FROM  tb_usuario WHERE correo_usuario= '" . $user . "'  AND  clave_usuario  = '" . MD5($clav) . "' AND estatuss = 'Y' ");
      // mysqli_connect($conexion);
      // $result = mysqli_num_rows($query);
      // echo $result;



      if ($result > 0) {

        $data = mysqli_fetch_array($query);



        print_r($data);

        print_r($data['nombre_user']);
        print_r($data['apellido_user']);
        //echo $result;

        //var_dump($data);


        $_SESSION['active']   = true;
        $_SESSION['idUser']   = $data['id_user'];
        $_SESSION['nombre']   = $data['nombre_user'];
        $_SESSION['apellido'] = $data['apellido_user'];
        $_SESSION['tipoUser'] = $data['tipo_user'];


        // header('location:views/template.php');



        if ($data == true) {

          $rol = $data["tipo_user"];
          $_SESSION['tipoUser'] = $rol;


          switch ($_SESSION['tipoUser']) {
            case  1:
              header('location: views/pantalla_principal.php');
              break;

            case 2:
              header('location: views/pantalla_principal_user.php');
              // header('location: registro_usuarios.php');
              break;

            default:
          }
        }
      } else {


        $alert = 'El Usuario o la clave son incorrectos ';
        session_destroy();
      }
    }
  }
}


?>






<!DOCTYPE html>
<html>

<head>
  <title>Academia Galileo</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" type="image" href="views/dist/img/gobierno.jpg" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
  <link rel="icon" type="image" href="views/dist/img/icono_galileo.png" />
  <!--<link rel="stylesheet" href="views/styles/styles_login.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>

<style>
  

  body {
    margin: 0;
    height: 100%;
    overflow: hidden;
    width: 100% !important;
    box-sizing: border-box;
    font-family: "Roboto", sans-serif;
  }

  .backRight {
    position: absolute;
    right: 0;
    width: 50%;
    height: 100%;
    /*background: #03a9f4;*/
    /* background-image: url('views/dist/img/ttt.png'); */
    background-size: auto 100%;

    background-repeat: no-repeat;
  }

  .backLeft {
    position: absolute;
    left: 0;
    width: 50%;
    height: 104%;
    /*background: #18610B;
   background-size: auto 100%; */
    background-image: url('views/dist/img/galileo3.png');
    background-size: auto 100%;

    background-repeat: no-repeat;
  }

  #back {
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: -999;
  }

  .canvas-back {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10;
  }

  #slideBox {
    width: 50%;
    max-height: 100%;
    height: 100%;
    overflow: hidden;
    margin-left: 50%;
    position: absolute;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  }

  .topLayer {
    width: 200%;
    height: 100%;
    position: relative;
    left: 0;
    left: -100%;
  }

  label {
    font-size: 0.8em;
    text-transform: uppercase;
  }

  input {
    background-color: transparent;
    border: 0;
    outline: 0;
    font-size: 1em;
    padding: 8px 1px;
    margin-top: 0.1em;
  }

  .left {
    width: 50%;
    height: 100%;
    overflow: scroll;
    background: #ECECEC;
    left: 0;
    position: absolute;
  }

  .left label {
    color: #2C2E2C;
  }

  .left input {
    border-bottom: 1px solid #151212;
    color: #2C2E2C;
  }

  .left input:focus,
  .left input:active {
    border-color: #03a9f4;
    color: #03a9f4;
  }

  .left input:-webkit-autofill {

    -webkit-text-fill-color: #e3e3e3;
  }

  .left a {
    color: #929491;
  }

  .right {
    width: 50%;
    height: 100%;
    overflow: scroll;
    background: #f9f9f9;
    right: 0;
    position: absolute;
  }

  .right label {
    color: #212121;
  }

  .right input {
    border-bottom: 1px solid #212121;
  }

  .right input:focus,
  .right input:active {
    border-color: #673ab7;
  }

  .right input:-webkit-autofill {

    -webkit-text-fill-color: #212121;
  }

  .content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 100%;
    width: 80%;
    margin: 0 auto;
    position: relative;
  }

  .content h2 {
    font-weight: 300;
    font-size: 2.6em;
    margin: 0.2em 0 0.1em;
  }

  .left .content h2 {
    color: #177832;
  }

  .right .content h2 {
    color: #ff5e10;
    font-family: sans-serif;
    font-size: 33px;
    margin: auto;
  }

  .form-element {
    margin: 1.6em 0;
  }

  .form-element.form-submit {
    margin: 1.6em 0 0;
  }

  .form-stack {
    display: flex;
    flex-direction: column;
  }

  .checkbox {
    -webkit-appearance: none;
    outline: none;
    background-color: #e3e3e3;
    border: 1px solid #e3e3e3;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
    padding: 12px;
    border-radius: 4px;
    display: inline-block;
    position: relative;
  }

  .checkbox:focus,
  .checkbox:checked:focus,
  .checkbox:active,
  .checkbox:checked:active {
    border-color: #03a9f4;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px 1px 3px rgba(0, 0, 0, 0.1);
  }

  .checkbox:checked {
    outline: none;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05), inset 15px 10px -12px rgba(255, 255, 255, 0.1);
  }

  .checkbox:checked:after {
    outline: none;
    content: "✓";
    color: #03a9f4;
    font-size: 1.4em;
    font-weight: 900;
    position: absolute;
    top: -4px;
    left: 4px;
  }

  .form-checkbox {
    display: flex;
    align-items: center;
  }

  .form-checkbox label {
    margin: 0 6px 0;
    font-size: 0.72em;
  }

  button {
    padding: 0.8em 1.2em;
    margin: 0 10px 0 0;
    width: auto;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 1em;
    color: #fff;
    line-height: 1em;
    letter-spacing: 0.6px;
    border-radius: 3px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1), 0 3px 6px rgba(0, 0, 0, 0.1);
    border: 0;
    outline: 0;
    transition: all 0.25s;
  }

  button.signup {
    background: #1C7A36;
  }

  button.login {
    background: #d7560a;
  }

  button.off {
    background: none;
    box-shadow: none;
    margin: 0;
  }

  button.off.signup {
    color: #1C7A36;
  }

  button.off.login {
    color: #1656B7;
  }

  button:focus,
  button:active,
  button:hover {
    box-shadow: 0 4px 7px rgba(0, 0, 0, 0.1), 0 3px 6px rgba(0, 0, 0, 0.1);
  }

  button:focus.signup,
  button:active.signup,
  button:hover.signup {
    background: #61A34F;
  }

  button:focus.login,
  button:active.login,
  button:hover.login {
    background: #13A9D8;
  }

  button:focus.off,
  button:active.off,
  button:hover.off {
    box-shadow: none;
  }

  button:focus.off.signup,
  button:active.off.signup,
  button:hover.off.signup {
    color: #03a9f4;
    background: #212121;
  }

  button:focus.off.login,
  button:active.off.login,
  button:hover.off.login {
    color: #512da8;
    background: #e3e3e3;
  }

  @media only screen and (max-width: 768px) {
    #slideBox {
      width: 80%;
      margin-left: 20%;
    }

    .signup-info,
    .login-info {
      display: none;
    }
  }
</style>

<body>






  <!-- NUEVO lOGIN -->

  <div id="back">
    <canvas id="canvas" class="canvas-back"></canvas>
    <div class="backRight">
    </div>
    <div class="backLeft">
    </div>
  </div>




  <div id="slideBox">
    <div class="topLayer">



      <div class="right">

        <div class="content-fluid">

          <!-- <h2 style="text-align: center;  margin-top: 39px;color: #0c0072;">     
          ACADEMIA GALILEO
        </h2> -->
        <div class="content-fluid">
          
          <center>
          <img src="views/dist/img/icono_galileo.png" style="height: 199px;">
          </center>
           
       
        </div>
        <div class="content" style="margin-top: 19px;">

          <h2>ACCESO PERSONAL</h2>
          <!-- <form id="form-login" method="post" >-->
            <br>
          <form id="form-login" method="post">
            <div class="form-element form-stack">
              <label for="username-login" class="form-label">Numero Dni</label>
              <input id="usuario" name="usuario" type="text" autocomplete="off">
            </div>
            <div class="form-element form-stack">
              <label for="password-login" class="form-label">Password</label>
              <input id="clave" name="clave" type="password">
            </div>
            <div class="form-element form-submit" style="    margin-left: 35%;">
              <button id="logIn" class="login" type="submit" name="register">Iniciar Sesion</button>
              <!-- <button id="goRight" class="login off" name="signup">Registrar</button>-->
            </div>
            <br>
            <div class="alert" style="background-color:#FFFFFF " align="center"><?php echo isset($alert) ? $alert : ''; ?> </div>
          </form>
        </div>
      </div>
    </div>
  </div>





  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>

  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


  <link rel="stylesheet" type="text/css" href="views/plugins/sweetalert2/sweetalert2.css">
  <script type="text/javascript" charset="utf8" src="views/plugins/sweetalert2/sweetalert2.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



  <!-- <script>

function login () {

console.log("Se Encontro");
          var user  = $("#username-login").val();
          var clave = $("#password-login").val();
          var ob = {
            usuario: user,
            clave: clave
          };
  $.ajax({
      type: "POST",
      url:"views/login_process.php",
      data:ob, 
    
      success: function(data){
          console.info(data);
                if(data == "01"){
                  window.location.pathname = ('GestionInformatica/views/pantalla_principal.php')
                }else{
                  alert("Usuario o contraseña incorrecto");
                }
              }
  });
}



   </script> -->

  <!-- 
<script>
      
function onSubmitUser() {

  console.log("Se Dio Click User ");

var frm = document.getElementById('frm_registro');
var df = new FormData(frm);

$.ajax({
  url: 'insert/insert_user.php',
  type: 'POST',
  data: df,
  success(data) {
    console.log(data);


    if (data == 'success') {

      // 1. RESET FORMULARIO   
      $('#frm_registro').trigger('reset');
      // 2. CERRAMOS EL MODAL
      $('.modal').modal('hide');
      location.reload();

      recargarData();

    } else {
      alert(data);
    }
  }
});
}

</script> -->



  <script>
    /* ====================== *
     *  Toggle Between        *
     *  Sign Up / Login       *
     * ====================== */
    $(document).ready(function() {
      $('#goRight').on('click', function() {
        $('#slideBox').animate({
          'marginLeft': '0'
        });
        $('.topLayer').animate({
          'marginLeft': '100%'
        });
      });
      // $('#btn_registro').on('click', function(){
      //    onSubmitUser();
      //  });
      $('#goLeft').on('click', function() {
        if (window.innerWidth > 769) {
          $('#slideBox').animate({
            'marginLeft': '50%'
          });
        } else {
          $('#slideBox').animate({
            'marginLeft': '20%'
          });
        }
        $('.topLayer').animate({
          'marginLeft': '0'
        });
      });
    });





    paper.install(window);
    paper.setup(document.getElementById("canvas"));

    // Paper JS Variables
    var canvasWidth,
      canvasHeight,
      canvasMiddleX,
      canvasMiddleY;

    var shapeGroup = new Group();

    var positionArray = [];

    function getCanvasBounds() {
      // Get current canvas size
      canvasWidth = view.size.width;
      canvasHeight = view.size.height;
      canvasMiddleX = canvasWidth / 2;
      canvasMiddleY = canvasHeight / 2;
      // Set path position
      var position1 = {
        x: (canvasMiddleX / 2) + 100,
        y: 100,
      };

      var position2 = {
        x: 200,
        y: canvasMiddleY,
      };

      var position3 = {
        x: (canvasMiddleX - 50) + (canvasMiddleX / 2),
        y: 150,
      };

      var position4 = {
        x: 0,
        y: canvasMiddleY + 100,
      };

      var position5 = {
        x: canvasWidth - 130,
        y: canvasHeight - 75,
      };

      var position6 = {
        x: canvasMiddleX + 80,
        y: canvasHeight - 50,
      };

      var position7 = {
        x: canvasWidth + 60,
        y: canvasMiddleY - 50,
      };

      var position8 = {
        x: canvasMiddleX + 100,
        y: canvasMiddleY + 100,
      };

      positionArray = [position3, position2, position5, position4, position1, position6, position7, position8];
    };


    /* ====================== *
     * Create Shapes          *
     * ====================== */
    function initializeShapes() {
      // Get Canvas Bounds
      getCanvasBounds();

      var shapePathData = [
        'M231,352l445-156L600,0L452,54L331,3L0,48L231,352',
        'M0,0l64,219L29,343l535,30L478,37l-133,4L0,0z',
        'M0,65l16,138l96,107l270-2L470,0L337,4L0,65z',
        'M333,0L0,94l64,219L29,437l570-151l-196-42L333,0',
        'M331.9,3.6l-331,45l231,304l445-156l-76-196l-148,54L331.9,3.6z',
        'M389,352l92-113l195-43l0,0l0,0L445,48l-80,1L122.7,0L0,275.2L162,297L389,352',
        'M 50 100 L 300 150 L 550 50 L 750 300 L 500 250 L 300 450 L 50 100',
        'M 700 350 L 500 350 L 700 500 L 400 400 L 200 450 L 250 350 L 100 300 L 150 50 L 350 100 L 250 150 L 450 150 L 400 50 L 550 150 L 350 250 L 650 150 L 650 50 L 700 150 L 600 250 L 750 250 L 650 300 L 700 350 '
      ];

      for (var i = 0; i <= shapePathData.length; i++) {
        // Create shape
        var headerShape = new Path({
          strokeColor: 'rgba(255, 255, 255, 0.5)',
          strokeWidth: 2,
          parent: shapeGroup,
        });
        // Set path data
        headerShape.pathData = shapePathData[i];
        headerShape.scale(2);
        // Set path position
        headerShape.position = positionArray[i];
      }
    };

    initializeShapes();

    /* ====================== *
     * Animation              *
     * ====================== */
    view.onFrame = function paperOnFrame(event) {
      if (event.count % 4 === 0) {
        // Slows down frame rate
        for (var i = 0; i < shapeGroup.children.length; i++) {
          if (i % 2 === 0) {
            shapeGroup.children[i].rotate(-0.1);
          } else {
            shapeGroup.children[i].rotate(0.1);
          }
        }
      }
    };

    view.onResize = function paperOnResize() {
      getCanvasBounds();

      for (var i = 0; i < shapeGroup.children.length; i++) {
        shapeGroup.children[i].position = positionArray[i];
      }

      if (canvasWidth < 700) {
        shapeGroup.children[3].opacity = 0;
        shapeGroup.children[2].opacity = 0;
        shapeGroup.children[5].opacity = 0;
      } else {
        shapeGroup.children[3].opacity = 1;
        shapeGroup.children[2].opacity = 1;
        shapeGroup.children[5].opacity = 1;
      }
    };
  </script>




</body>

</html>