<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Registro de autor</title>
	</head>
	<body>
		<?php
		session_start();

		if ($_SESSION['pag']==0){
			header("Location: login.php");
		}

		$_SESSION['pag']=0;

		$_SESSION['alta']=2;
		?>
		<div class="header">
		<h1>Registro de autor</h1>
		</div>

		<div class="contenido">
			<div class="formulario">
				<form action="alta.php" method="post">
					<fieldset>
					<legend>Introduzca los datos del autor</legend>
						<br />
						<label for="nombre">Nombre: </label><input type="text" name="nombre" required><br><br>
						<label for="apaterno">Apellido paterno: </label><input type="text" name="apaterno" required><br><br>
						<label for="amaterno">Apellido materno: </label><input type="text" name="amaterno"><br><br>
						<label for="nacionalidad">Nacionalidad: </label><input type="text" name="nacionalidad" required><br><br>
						<input type="submit" value="Enviar">
					</fieldset>
				</form>
			</div>
		</div>

		<div class="footer">
			<a href="creditos.php" aria-label="ir a la pagina de creditos, se cerrará la sesion al redirigirse a la pagina">Creditos</a>
		</div>
	</body>
</html>
