<?php
	$conn = new mysqli("localhost","root","","bd_coactiva");
	$count=0;
	if(!empty($_POST['add'])) {
		$autor = mysqli_real_escape_string($conn,$_POST["user_notifica"]);
		$mensaje = mysqli_real_escape_string($conn,$_POST["descripcion_notifica"]);
		$sql = "INSERT INTO tb_notificaciones (user_notifica,descripcion_notifica) VALUES('" . $autor . "','" . $mensaje . "')";
		mysqli_query($conn, $sql);
	}
	$sql2="SELECT * FROM tb_notificaciones WHERE estado_notifica = 0";
	$result=mysqli_query($conn, $sql2);
	$count=mysqli_num_rows($result);

	header( 'Location: ../' ) ;
?>
