<?php
//funcion que conecta a una base de datos
function conectar(){
//funcion mysql_connect() con parametros del nombre de la base
// y la contraseña del usuario
$enlace =  mysql_connect('localhost', 'luis', 'luis');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}

mysql_select_db("luis", $enlace);
//echo 'Conectado satisfactoriamente';
}

function desconectar(){
    mysql_close($enlace);
}

function stabla($tabla)
{
	conectar();
	$resultado=mysql_query("select * from $tabla");	
	return $resultado;
}

function registrarCargo($cant,$fecha,$monto,$nombCuenta)
{
	conectar();
	mysql_query("INSERT INTO registrocargo (idTransaccion, montoCargo, nombreCuenta) VALUES ('$cant[0]', $monto,'$nombCuenta')");
}

function registrarAbono($cant,$fecha,$monto,$nombCuenta)
{
	conectar();
	mysql_query("INSERT INTO registroabono (idTransaccion, montoAbono, nombreCuenta) VALUES ('$cant[0]', $monto,'$nombCuenta')");
}
?>