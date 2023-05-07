<a href="desconectar.php">Desconectar</a>
<?php
include("libs/libs.php");
$conn = conectar();
if(!$conn){
    die("Fallo!!!!!! ".mysqli_connect_error());
}

if(!isset($_REQUEST['ID'])){
    $id = $_GET["id"];
    $sqlProducto = "SELECT *
                 FROM productos
                 WHERE ID = ".$idproducto;
            
    $result = mysqli_query($conn, $sqlProducto);
    $Producto = mysqli_fetch_array($result);

echo '<br/>El producto es la '.$_GET['id']; 

?>

<br><br>

<?php

    echo 'ID: ' .$idproducto['id'];
?>
</br>
<?php
    echo 'Titulo: ' .$Producto['titulo'];
?>
</br>
<?php
    echo 'Director: ' .$Producto['director'];
?>
</br>
<?php
    echo 'Año: ' .$Producto['año'];
}
echo "<br/><br/><a href = 'cPanel.php'>Panel de control</a></br>";

?>
