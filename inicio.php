<!DOCTYPE html>
<html lang="es">
    <head>
		<meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inicio de sesion</title>
    </head>
    <body>
        <form action="validalogueo.php" method='GET'>
        Nombre: <input type="text" name="nombre"><br>
        contraseña: <input type="password" name="contraseña"><br>
        <input id="boton1" type='submit' value='Iniciar' ><br>
        </form>
<?php
$lfail=$_GET['lfail'];
if($lfail==1)
{
	echo "</br></br><center><p id='caja1'>Error el usuario o contraseña fue mal Escrito</p></center>";
}
?>
    </body>
</html>
