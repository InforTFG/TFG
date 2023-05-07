<!DOCTYPE html>
<html>
<head>
	<title>InforTFG</title>
	<style>
		body {
			background-color: #343a40;
			color: #adb5bd;
			font-family: Arial, sans-serif;
			text-align: center;
		}
		h1, h2 {
			color: #ff000;
		}
		form {
			margin-top: 20px;
		}
		label {
			display: block;
			margin-bottom: 5px;
			color: #fff;
		}
		input[type="password"],
		input[type="submit"],
		textarea {
			border: none;
			background-color: rgba(255, 255, 255, 0.8);
			padding: 10px;
			border-radius: 5px;
			margin-bottom: 10px;
			color: #444;
			font-size: 16px;
			font-family: Arial, sans-serif;
			color: #000000;
		}
        input[type="text"],
        textarea {
			border: none;
			background-color: rgba(255, 255, 255, 0.8);
			padding: 7px;
			border-radius: 5px;
			margin-bottom: 7px;
			color: #444;
			font-size: 24px;
			font-family: Arial, sans-serif;
			color: #000000;
		}
		input[type="submit"] {
			background-color: #fff;
			color: #444;
			cursor: pointer;
		}
		a {
			color: #adb5bd;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<h1>InforTFG</h1>
	<h2>Tu tienda de informática más cercana</h2>

	<form action="login.php" method="POST">
		<label for="user">Usuario:</label>
		<input type="text" id="user" name="user" /></br>
		<label for="password">Contraseña:</label>
		<input type="password" id="password" name="password" />
		<input type="submit" value="Conectar" />
	</form>

	<?php
	if (isset($_REQUEST['exists'])) {
		echo "<p>Usuario y/o contraseña incorrectos, <br />por favor, vuelva a introducir</p>";
	}
	?>

	<p>¿No tienes cuenta? <a href="register.php">Crea una cuenta</a></p>
</body>
</html>

