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
        <title>Compras</title>
    </head>
    <body>
	<?php
        echo "<p>bienvenido a las compras ".$_SESSION['nombre']."</p></br>";
	?>
	<form action="transcompra.php" method='GET'>
        Fecha: <input type="text" name="fecha"><br>
		Monto: <input type="text" name="monto">
		Calcularle IVA <input type="checkbox" name="iva" checked value="true"><br>
		Tipo de materia prima:
		<?php
		$arreglo=stabla("cuenta");
		echo "<select name='MP'>";
		while($fila=mysql_fetch_array($arreglo)) {
			echo "<option value='".$fila['nombreCuenta']."'>".$fila['nombreCuenta']."</option>";
		}
		echo "</select>";
		?>
		<br>
		Cuenta de donde saldra dinero:
		<?php
		$arreglo=stabla("cuenta");
		echo "<select name='dinero'>";
		while($fila=mysql_fetch_array($arreglo)) {
			if($fila['cuentaMayor']=="Caja"){
				echo "<option value='".$fila['nombreCuenta']."'>".$fila['nombreCuenta']."</option>";
			}
		}
		echo "</select>";
		?>
		<br>
        <input id="boton1" type='submit' value='Registrar compra' ><br>
        </form>
	<a href="bienvenido.php">retornar</a></br>
	<a href="salir.php">salir</a>
    </body>
</html>