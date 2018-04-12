<!DOCTYPE HTML>
<html>
	<head>
	<title>Autenticar</title>
	</head>
	<body>
		<?php
		include 'conexion.php';
		
		if ($_SESSION['pag']==0){
			header("Location: login.php");
		}
		
		//conectarse a la base de datos mediante una variable
		$conn = conectar();

		//quitar caracteres especiales no pertenecientes al tipo de campo en los formularios
		$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
		$pass = md5($_POST['contrasenia']);

		//Imprimir datos ingresados
		echo "<h1>Datos del usuario</h1>";
		echo "<div class='contenido'><p>Usuario: ".$usuario;
		echo "</p><p>Contraseña: ".$pass;
		echo "</p>";

		$query = ("SELECT contraseña FROM usuarios WHERE usuario = '$usuario'");

		$process = pg_query($conn, $query);
		if  (!$process) {//si no se ejecuta la consulta, se redirigirá a la pagina de inicio de sesion
			$_SESSION['error']=2;
			header("Location: login.php");
		}
		else {
			//Si se ejecuta la consulta, se comparara la contraseña ingresada con la de la base de datos
			$result = pg_fetch_result($process, 0, 0);
			if ($result == $pass){
				//Si coinciden se dará acceso a menu.php
				session_start();
				$_SESSION['pag']=1;
				header("Location: menu.php");
			}
			else { //las contraseñas no coinciden y se redirigirá a la pagina de inicio de sesion
				session_start();
				$_SESSION['error']=1;
				header("Location: login.php");
			}
		}
		pg_close($conn); //cierre de conexion a la base de datos
		?>
	</body>
</html>