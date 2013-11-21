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
    </head>
    <body>
	<?php
        echo "<p>bienvenido a la matrix ".$_SESSION['nombre']."</p></br>";
	?>
       <a href="bienvenido.php">
			<img src="general.jpg"/>
		</a>
		<a href="bienvenido.php">
			<img src="costos.jpg"/>
		</a>
    </body>
</html>