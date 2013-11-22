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
	<?php
        echo "<p>bienvenido a las transacciones ".$_SESSION['nombre']."</p></br>";
	?>
	<form action="Registrar.php" method='GET'>
        Fecha: <input type="text" name="fecha"></br>
		Monto: <input type="text" name="monto"></br>
		Cargar a: 
		<?php
		include 'conexionBD.php';
		$arreglo=stabla("cuenta");
		echo "<select name='cargo'>";
		while($fila=mysql_fetch_array($arreglo)) {
			echo "<option value='".$fila['nombreCuenta']."'>".$fila['nombreCuenta']."</option>";
		}
		echo "</select>";
		?>
		</br>
		Abonar a: 
		<?php
		$arreglo=stabla("cuenta");
		echo "<select name='abono'>";
		while($fila=mysql_fetch_array($arreglo)) {
			echo "<option value='".$fila['nombreCuenta']."'>".$fila['nombreCuenta']."</option>";
		}
		echo "</select>";
		?>
		</br>
		<input id="boton1" type='submit' value='Registrar' ></br>
        </form>
	<hr />
		<a href="muestraCuenta.php">Mostrar Cuenta con su debe y haber</a>
	<hr />
	<a href="bienvenido.php">retornar</a></br>
	<a href="salir.php">salir</a>
	</div>
    </body>
</html>