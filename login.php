<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Inicio sesi&oacute;n</title>
	</head>
	<body>
		<div class="header">
			<h1>Iniciar sesi&oacute;n</h1>
		</div>

		<div class="contenido">
			<?php
			session_start();
			$_SESSION['pag']=0;

			if ($_SESSION['error']==1){?>
				<p class="error">Usuario o contraseña invalidos</p>
			<?php
				$_SESSION['error']=0;
			}
			else if ($_SESSION['error']==2){
				?>
				<p class="error">Hubo un error al acceder a la base de datos</p>
				<?php
			}
			?>
			<div class="formulario">
				<form action="autenticar.php" method="post">
					<fieldset>
						<legend>Introduzca su información de registro</legend>
						
						<label for="usuario">Usuario: </label>
						<input type="text" name="usuario" autocomplete="off">
						<br />
						<br />
						<label for="contra">Contrase&ntilde;a: <input type="password" name="contra" autocomplete="off">
						<br />
						<br />
						<input type="submit" value="Ingresar">
					</fieldset>
				</form>
			</div>
		</div>

		<div class="footer">
			<a href="creditos.php">Creditos</a>
		</div>
	</body>
</html>