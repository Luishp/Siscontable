<?php
session_start();
if(!isset($_SESSION['nombre']))
{
header("Location: index.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
		<meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Transacciones</title>
		<link  rel="stylesheet" href="estilos.css">
    </head>
    <body>
	<div id="contenedor">
		</br></br><center><p id='caja1'>Transaccion Registrada</p></center></br>
		<a href="bienvenido.php">Realizar otra transaccion</a></br>
	</div>
	</body>
</html>

<?php
include 'conexionBD.php';
conectar();
$usuario=$_SESSION['nombre'];
$fecha=$_GET['fecha'];
$monto=$_GET['monto'];
$cargo=$_GET['cargo'];
$abono=$_GET['abono'];

	//actualizar la cantidad de transacciones que se han realizado
	mysql_query("UPDATE usuarios SET cantTransacciones=cantTransacciones+1 WHERE nombre='$usuario'");
	//suma es la variable que muestra el total de transacciones que se han hecho hasta el momento.
	$suma=mysql_query("select sum(cantTransacciones) from usuarios");
	$cant=mysql_fetch_array($suma,MYSQL_NUM);
	echo $cant[0];
	registrarCargo($cant,$fecha,$monto,$cargo);
	registrarAbono($cant,$fecha,$monto,$abono);

?>