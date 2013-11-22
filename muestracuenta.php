<?php
include 'conexionBD.php';
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
        <title>Mis cuentas</title>
		<link  rel="stylesheet" href="estilos.css">
    </head>
    <body>
	<div id="contenedor">
		<h2>Elija cuenta a revisar</h2>
		<form action="muestracuenta1.php" method='GET'>
		<?php
		$arreglo=stabla("cuenta");
		echo "<select name='nombcuenta'>";
		while($fila=mysql_fetch_array($arreglo)) {
			echo "<option value='".$fila['nombreCuenta']."'>".$fila['nombreCuenta']."</option>";
		}
		echo "</select>";
		?>
		<input type="submit" value="Mostrar Cuenta" />
		</form>
	</div>
    </body>
</html>