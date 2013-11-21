<?php

include 'conexionBD.php';

session_start();
$usuario=$_GET['nombre'];
$clave=$_GET['contraseña'];

if(($usuario!='') and ($clave!='')){
	conectar();
	$result=mysql_query("select * from usuarios where nombre='".$usuario."' and clave='".$clave."'")or die(mysql_error());
	$fila=mysql_fetch_array($result);
	if($fila['nombre']!=""){
		$_SESSION['nombre']=$usuario;
		$_SESSION['clave']=$clave;
		header("Location: menuprin.php");
	}
	else{
		header("Location: inicio.php?lfail=1");
	}
}
else{
	header("Location: inicio.php?lfail=1");
}
?>