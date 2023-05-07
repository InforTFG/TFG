<!DOCTYPE html>
<html>
<head>
	<title>InforTFG - Registro</title>
	<meta charset="utf-8">
	<style type="text/css">
		body {
			background-image: url(imagen9.jpg);
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			color: #444;
			font-family: Arial, sans-serif;
		}

		main {
			background-color: rgba(255, 255, 255, 0.9);
			padding: 30px;
			border-radius: 10px;
			max-width: 400px;
			margin: 0 auto;
			text-align: center;
			margin-top: 50px;
		}

		h1, h2, h3, h4, h5, h6 {
			color: #444;
		}

		label {
			display: block;
			margin-bottom: 5px;
		}

		input[type="text"],
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
			width: 100%;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #333;
			color: #fff;
			cursor: pointer;
			transition: background-color 0.2s ease-in-out;
		}

		input[type="submit"]:hover {
			background-color: #444;
		}

		a {
			color: #444;
			text-decoration: none;
			transition: color 0.2s ease-in-out;
		}

		a:hover {
			color: #555;
		}

		.form-header {
			margin-bottom: 30px;
		}

		.form-header h2 {
			margin-top: 0;
		}

		.form-footer {
			margin-top: 30px;
			font-size: 14px;
		}

		.form-footer a {
			font-weight: bold;
		}
	</style>
</head>
</html>
<?php
    if(!isset($_REQUEST['user'])){

?>

<form action="register.php" method="POST">
    Usuario: <input type="text" id = "user" name="user"/> <br/>
    Contraseña: <input type="password" id ="password" name="password"/> <br/>
    <input type ="submit" value ="Registrar"/>
    </form>

<?php
    }else{
        include("libs/libs.php");
        $conn = conectar();
        if(!$conn){
            die("Fallo!!!!!! ".mysqli_connect_error());
        }

        $userName = $_REQUEST["user"];
        $password = $_REQUEST["password"];
        $sqlInsert = "INSERT INTO cliente VALUES ('', '$userName','$password')";

        try{
            mysqli_query($conn, $sqlInsert);
            echo "Usuario registrado<br/>";
            echo "<a href='index.php'>Login</a>";
        }catch(Exception $e){
                echo("Error description: " . mysqli_error($conn));
        }
        mysqli_close($conn);
    }
?>
