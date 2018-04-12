<!DOCTYPE HTML>
<html>
	<head>
	<title>Altas</title>
	</head>
	<body>
		<?php
		//conexiòn
		include 'conexion.php';

		//funcion par conectarse mediante una variable a la bd
		$conn = conectar();

		//Variable para errores en los formularios
		$err = 0;

		session_start();

		if ($_SESSION['pag']==0){
			header("Location: login.php");
		}

		//Dar de alta a un usuario
		if ($_SESSION['alta']==1){
			$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
			$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
			$usuario = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
			if ($_POST['pass']){
				$pass = md5($_POST['pass']);	
			}
			else {
				$pass = "";
				$err = 1;
			}

			if ($nombre) {
				if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
					$err = 1;
				}
			} else{
				$err = 1;
			}

			if ($apaterno) {
				if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
					$err = 1;
				}
			} else{
				$err = 1;
			}
			if ($amaterno) {
				if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
					$err = 1;
				}
			}
			if (!$usuario) {
					$err = 1;
			}
			if (!$pass) {
					$err = 1;
			}

			//Insertar datos de los usuarios a la base de datos
			if ($err == 0) {
				$query = ("INSERT INTO usuarios (nombre,apaterno,amaterno,usuario,passwd) VALUES ('$nombre','$apaterno','$amaterno','$usuario','$pass')");
				$process = pg_query($conn, $query);
				if  (!$process) {
				   $_SESSION['bd']=1;
				}
				else {
				   $_SESSION['bd']=2;
				}
			} else{
				$_SESSION['bd']=1;

			}
			//Cerrar la conexion a la bd
			pg_close($conn);
			$_SESSION['pag']=1;
			$_SESSION['alta']=0;
			header("Location: menu.php");

		}
		//Dar de alta a un autor
		else if ($_SESSION['alta']==2){
			$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
			$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
			$nacionalidad = filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING);

			if ($nombre) {
				if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
					$err = 1;
				}
			} else{
				$err = 1;
			}

			if ($apaterno) {
				if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
					$err = 1;
				}
			} else{
				$err = 1;
			}
			if ($amaterno) {
				if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
					$err = 1;
				}
			}
			if ($nacionalidad) {
				if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
					$err = 1;
				}
			} else{
				$err = 1;
			}

			//Insertar datos de los autores a la base de datos
			if ($err == 0) {
				$query = ("INSERT INTO autores (nombre,apaterno,amaterno,nacionalidad) VALUES ('$nombre','$apaterno','$amaterno','$nacionalidad')");
				$process = pg_query($conn, $query);
				if  (!$process) {
				   $_SESSION['bd']=1;
				}
				else {
				   $_SESSION['bd']=2;
				}
			} else{
				$_SESSION['bd']=1;

			}
			//Cerrar la conexion a la base de datos
			pg_close($conn);
			$_SESSION['pag']=1;
			$_SESSION['alta']=0;
			header("Location: menu.php");
		} 
		//Dar de alta un libro
		else if ($_SESSION['alta']==3){
			$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
			$autor = $_POST['autor'];
			$anio = $_POST['anio'];

			if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$titulo)){
					echo "Error: Titulo invalido<br>";
					$err = 1;
			}

			if ($err == 0) {
				$query = ("INSERT INTO libros (titulo,id_autor,anio) VALUES ('$titulo','$autor','$anio')");
				$process = pg_query($conn, $query);
				if  (!$process) {
				   $_SESSION['bd']=1;
				}
				else {
				   $_SESSION['bd']=2;
				}
			} else{
				$_SESSION['bd']=1;

			}
			pg_close($conn);
			$_SESSION['pag']=1;
			$_SESSION['alta']=0;
			header("Location: menu.php");
		}
		//Ente no identificado
		else if ($_SESSION['alta']==0){
			$_SESSION['pag']=0;
			header("Location: login.php");
		}
		?>
	</body>
</html>
