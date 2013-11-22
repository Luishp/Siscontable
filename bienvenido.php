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
        <title>Pagina principal</title>
		<link  rel="stylesheet" href="estilos.css">
    </head>
    <body>
	<div id="contenedor">
	<?php
        echo "<p>bienvenido a la matrix ".$_SESSION['nombre']."</p></br>";
	?>
	<a href="compra.php">
		<img src="compra.jpg"/>
	</a>
	<a href="venta.php">
		<img src="venta.jpg"/>
	</a>
	<a href="transaccion.php">
		<img src="transaccion.jpg"/>
	</a>
	<a href="compra.php">
		<img src="estados.jpg"/>
	</a>
	<a href="salir.php">salir</a>
	</div>
    </body>
</html>
