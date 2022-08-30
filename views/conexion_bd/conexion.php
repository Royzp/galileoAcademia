<?php
  try{
  	$pdo = new PDO('mysql:host=localhost;dbname=bd_academia','root','');
    // $pdo = new PDO('mysql:host=localhost;dbname=bdapp12','apiuser','DBApi...program');
  	 $pdo->exec("set names utf8");  	
  	//mysqli_query($pdo,"set names utf8");
  	//echo 'conectado';
  }catch (PDOException $e){
  	print "¡Error! :" . $e->getMessage(). "<br/>" ;
  	die();
  }
?>