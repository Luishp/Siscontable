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
    </head>
    <body>
		<h2>Registros de la cuenta elegida:</h2>
		<?php
		
		$cuenta=$_GET['nombcuenta'];
		conectar();
		echo $cuenta;
		$resultado=mysql_query('select * from registrocargo where nombreCuenta="'.$cuenta.'"');
		echo '<table border=1>';
		echo '<tr><th>Cargo</th></tr>';
		while($fila=mysql_fetch_array($resultado)) {
				echo "<tr><th>".$fila['montoCargo']."</th></tr>";
		}
		echo '</table>';
		$resultado2=mysql_query('select * from registroabono where nombreCuenta="'.$cuenta.'"');
		echo '<table border=1>';
		echo '<tr><th>Abono</th></tr>';
		while($fila2=mysql_fetch_array($resultado2)) {
				echo "<tr><th>".$fila2['montoAbono']."</th></tr>";
		}
		echo '</table>';
		
		?>
		<a href="bienvenido.php">Retornar</a>
    </body>
</html>