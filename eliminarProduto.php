<?php
    echo 'El producto es la '.$_GET['idproducto']; 
    include("libs/libs.php");
    $conn = conectar();
    if(!$conn){
        die("Fallo!!!!!! ".mysqli_connect_error());
    }

    $sqlDelete = "DELETE FROM productos WHERE ID = ".$_GET['idproducto'];

    try{
        mysqli_query($conn, $sqlDelete);
        echo "<br/>Producto ELIMINADO<br/>";
    }catch(Exception $e){
            echo("Error description: " . mysqli_error($conn));
    }
    echo "<a href = 'cPanel.php'>Panel de control</a>";
?>
