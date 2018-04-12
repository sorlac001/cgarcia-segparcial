<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Men&uacute;</title>
	</head>
	<body>
		<div class="header">
		<h1>Men&uacute;</h1>
		</div>

		<div class="contenido">
		<p>Seleccione una opci&oacute;n para dar de alta usuarios, autores o libros</p>
			<ul>
				<li>
					<a href="alta_usuario.php">Alta de usuarios</a>
				</li>
				<li>
					<a href="alta_autor.php">Alta de autores</a>
				</li>
				<li>
					<a href="alta_libro.php">Alta de libros</a>
				</li>
			</ul>
		<?php
		session_start();
		if ($_SESSION['pag']==1) {
			if ($_SESSION['bd']==1){
				?><p class="error">Registro no realizado</p><?php
				$_SESSION['bd']=0;
			}
			else if ($_SESSION['bd']==2){
				?><p class="exito">El registro se ha realizado exitosamente</p><?php
				$_SESSION['bd']=0;
			}
			?>
		</div>
		<div class="footer">
				<a href="creditos.php" aria-label="ir a la pagina de creditos, se cerrará la sesion al redirigirse a la pagina">Creditos</a>
		</div>
			<?php
		}
		else{
			header("Location: login.php");
		}
		?>
	</body>
</html>