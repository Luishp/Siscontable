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
        <title>Inicio</title>
		<link  rel="stylesheet" href="estilos.css">
    </head>
    <body>
	<div id="contenedor">
	<?php
        echo "<p>bienvenido a la matrix ".$_SESSION['nombre']."</p></br>";
	?>
       <a href="bienvenido.php">
			<img src="general.jpg"/>
		</a>
		<a href="bienvenido.php">
			<img src="costos.jpg"/>
		</a>
	</div>
    </body>
</html>