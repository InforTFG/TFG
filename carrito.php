<a href="desconectar.php">Desconectar</a>
<h1>PAGINA DEL USUARIO</h1>

<h3>Listado de películas alquiladas:</h3>

<?php

    include("libs/libs.php");
    $conn = conectar();
    if(!$conn){
        die("Fallo!!!!!! ".mysqli_connect_error());
    }

?>

<br><br>

<?php
    echo "<a href = 'uPanel.php'>Alquilar películas</a>";
?>

<html>
    <head>
    <body>
        <link rel="stylesheet" type="text/css" href="proyecto1.css">
    </body>
    </head>    
</html>
