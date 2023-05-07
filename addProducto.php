<a href="desconectar.php">Desconectar</a>

<?php
    if(!isset($_REQUEST['idproducto'])){

?>

<form action="addPoducto.php" method="POST">
    idproducto: <input type="text" id = "idproducto" name="idproducto"/> <br/>
    nombrecompleto: <input type="text" id = "nombrecompleto" name="nombrecompleto"/> <br/>
    imagenuno: <input type="text" id ="imagenuno" name="imagenuno"/> <br/>
    descripcion: <input type="text" id ="descripcion" name="descripcion"/> <br/>
    categoria: <input type="text" id ="categoria" name="categoria"/> <br/>
    cantidad: <input type="text" id ="cantidad" name="cantidad"/> <br/>
    precio: <input type="text" id ="precio" name="precio"/> <br/>
    <input type ="submit" value ="insertar"/>
</form>

<?php
    }else{
        include("libs/libs.php");
        $conn = conectar();
        if(!$conn){
            die("Fallo!!!!!! ".mysqli_connect_error());
        }
        $idproducto = $_REQUEST["idproducto"];
        $nombrecompleto = $_REQUEST["nombrecompleto"];
        $imagenuno = $_REQUEST["imagenuno"];
        $descripcion = $_REQUEST["descripcion"];
        $categoria = $_REQUEST["categoria"];
        $cantidad = $_REQUEST["cantidad"];
        $precio = $_REQUEST["precio"];
        $sqlInsert = "INSERT INTO productos VALUES ('$idproducto', '$nombrecompleto', '$imagenuno', '$descripcion', '$categoria', '$cantidad', '$precio')";

        try{
            mysqli_query($conn, $sqlInsert);
            echo "<br/>Producto añadido<br/>";
        }catch(Exception $e){
                echo("Error description: " . mysqli_error($conn));
        }
        echo "<a href = 'cPanel.php'>Panel de control</a>";
        mysqli_close($conn);
    }
    
?>
