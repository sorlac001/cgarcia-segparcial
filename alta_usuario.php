<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Registro de usuarios</title>
	</head>
		<?php
		session_start();

		if ($_SESSION['pag']==0){
			header("Location: login.php");
		}

		$_SESSION['pag']=0;

		$_SESSION['alta']=1;

		?>
		<body>
		<div class="header">
			<h1>Registro de usuarios</h1>
		</div>

		<div class="contenido">
			<div class="formulario">
				<form action="alta.php" method="post">
					<fieldset>
						<legend>Porporcione sus datos personales</legend>
						<label for="nombre">Nombre:</label><input type="text" name="nombre" required><br><br>
						<label for="apaterno">Apellido paterno:</label><input type="text" name="apaterno" required><br><br>
						<label for="amaterno">Apellido materno:</label><input type="text" name="amaterno"><br><br>
					</fieldset>
					<fieldset>
						<legend>Ingrese sus datos como usuario</legend>
						<label for="user">Nombre de usuario:</label><input type="text" name="user" required><br><br>
						<label for="pass">Contraseña:</label><input type="password" name="pass" required><br><br>
					</fieldset>
					<input class="boton" type="submit" value="Enviar">
				</form>
			</div>
		</div>

		<div class="footer">
			<a href="creditos.php" aria-label="ir a la pagina de creditos, se cerrará la sesion al redirigirse a la pagina">Creditos</a>
		</div>
	</body>
</html>
