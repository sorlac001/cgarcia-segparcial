<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title>Registro de libros</title>
	</head>
		<?php
		session_start();
		$_SESSION['alta']=3;

		if ($_SESSION['pag']==0){
			header("Location: login.php");
		}

		$_SESSION['pag']=0;

		include 'conexion.php';
		$conn = conectar();


		$query = ("SELECT id_autor,nombre,apaterno FROM autores");

		$process = pg_query($conn, $query);
		?>
	<body>
		<div class="header">
		<h1>Registro de libros</h1>
		</div>

		<div class="contenido">
			<div class="formulario">
				<form action="alta.php" method="post">
					<fieldset>
						<legend>Introduzca los datos del libro</legend>
						<label for="titulo">Titulo:</label><input type="text" name="titulo" required><br><br>
						<label for="autor">Autor:</label><select name="autor" required>
						<?php
							while ($row = pg_fetch_row($process)) {
							  echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>';
							}
						?>
						</select><br><br>
						<label for="anio">Año de publicación:</label><input type="number" min="0000" max="2018" step="1" value="2018" name="anio" required><br><br>
						<input class="boton" type="submit" value="Enviar">
					</fieldset>
				</form>
			</div>
		</div>

		<div class="footer">
			<a href="creditos.php" aria-label="ir a la pagina de creditos, se cerrará la sesion al redirigirse a la pagina">Creditos</a>
		</div>
	</body>
</html>
