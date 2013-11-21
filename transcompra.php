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
        <title>Compras</title>
    </head>
    <body>
	<?php
	include 'conexionBD.php';
        echo "<p>bienvenido a las compras ".$_SESSION['nombre']."</p></br>";
		$usuario=$_SESSION['nombre'];
		$fecha=$_GET['fecha'];
		$monto=$_GET['monto'];
		$mp=$_GET['MP'];
		$dinero=$_GET['dinero'];
		conectar();
		if(isset($_GET['iva'])){
			$total=$monto+($monto*0.13);
			$ivaAcreditable=$monto*0.13;
			//actualizar la cantidad de transacciones que se han realizado
			mysql_query("UPDATE usuarios SET cantTransacciones=cantTransacciones+1 WHERE nombre='$usuario'");
			//suma es la variable que muestra el total de transacciones que se han hecho hasta el momento.
			$suma=mysql_query("select sum(cantTransacciones) from usuarios");
			$cant=mysql_fetch_array($suma,MYSQL_NUM);
			echo $cant[0];
			registrarAbono($cant,$fecha,$total,$dinero);
			registrarCargo($cant,$fecha,$monto,$mp);
			registrarCargo($cant,$fecha,$ivaAcreditable,"IVA Acreditable");
		}
		else{
			//actualizar la cantidad de transacciones que se han realizado
			mysql_query("UPDATE usuarios SET cantTransacciones=cantTransacciones+1 WHERE nombre='$usuario'");
			//suma es la variable que muestra el total de transacciones que se han hecho hasta el momento.
			$suma=mysql_query("select sum(cantTransacciones) from usuarios");
			$cant=mysql_fetch_array($suma,MYSQL_NUM);
			echo $cant[0];
			registrarAbono($cant,$fecha,$monto,$dinero);
			registrarCargo($cant,$fecha,$monto,$mp);
		}
	?>
	</br>
	<p>Transaccion registrada</p>
	<a href="bienvenido.php">retornar</a></br>
	<a href="salir.php">salir</a>
    </body>
</html>