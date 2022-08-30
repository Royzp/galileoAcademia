<?php


//include('conexion_nueva.php');

$con = new mysqli('localhost', 'root', '', 'bd_ferreteria');
if ($con->connect_errno) {
    die('fail');
}

function file_name($string) {

    // Tranformamos todo a minusculas

    $string = strtolower($string);

    //Rememplazamos caracteres especiales latinos

    $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

    $repl = array('a', 'e', 'i', 'o', 'u', 'n');

    $string = str_replace($find, $repl, $string);

    // Añadimos los guiones

    $find = array(' ', '&', '\r\n', '\n', '+');
    $string = str_replace($find, '-', $string);

    // Eliminamos y Reemplazamos otros carácteres especiales

    $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

    $repl = array('', '-', '');

    $string = preg_replace($find, $repl, $string);

    return $string;



}








if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $nombre      = $con->real_escape_string(htmlentities($_POST['nombre_producto']));
    $precioc    = $con->real_escape_string(htmlentities($_POST['precio_compra']));
    $preciov    = $con->real_escape_string(htmlentities($_POST['precio_venta']));

    $stockp        = $con->real_escape_string(htmlentities($_POST['stock_producto']));
    $lote      = $con->real_escape_string(htmlentities($_POST['lote_producto']));
    $unidad   = $con->real_escape_string(htmlentities($_POST['unidad_medida']));

    $stockm       = $con->real_escape_string(htmlentities($_POST['stock_minimo']));
    $categoria      = $con->real_escape_string(htmlentities($_POST['categoria_producto']));
    $observ      = $con->real_escape_string(htmlentities($_POST['observacion_producto']));
    $proveedor      = $con->real_escape_string(htmlentities($_POST['proveedor']));
    $marca       = $con->real_escape_string(htmlentities($_POST['marca_producto']));
    $modelo      = $con->real_escape_string(htmlentities($_POST['modelo_producto']));

    

    
    

    $file_name = $_FILES['foto_producto']['name'];

    $tipo = $_FILES['foto_producto']['type'];
    $tamano = $_FILES['foto_producto']['size'];
  

    $new_name_file = null;

    if ($file_name != '' || $file_name != null ) {

        $file_type = $_FILES['foto_producto']['type'];
        list($type, $extension) = explode('/', $file_type);
        if ($extension == 'pdf') {
            $dir = 'foto_productos/';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $file_tmp_name = $_FILES['foto_producto']['tmp_name'];
            //$new_name_file = 'files/' . date('Ymdhis') . '.' . $extension;
            $new_name_file = $dir . file_name($file_name) . '.' . $extension;
            if (copy($file_tmp_name, $new_name_file)) {
                
            }
        }
    }

    $con->query("INSERT INTO tb_producto ( nombre_producto,
                                                  precio_compra,
                                                  precio_venta,
                                                  stock,
                                                  lote,
                                                  unidad_medida,
                                                  stock_minimo,
                                                  categoria,
                                                  observacion,
                                                  proveedor,
                                                  marca,
                                                  modelo,
                                                  estado,
                                                  archivo_informatico)

                                                            VALUES (  '$nombre',
                                                                    '$precioc',
                                                                    '$preciov',
                                                                         '$stockp',
                                                                       '$lote',
                                                                    '$unidad',
                                                                       '$stockm',
                                                                       '$categoria',
                                                                       '$observ',
                                                                       '$proveedor',
                                                                       '$marca',
                                                                       '$modelo',
                                                                       'Y',  
                                                                '$new_name_file')");
   
  

        echo 'success';
   
} else {
    echo 'ERROR CONEXION';
}
