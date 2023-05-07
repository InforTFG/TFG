<style>
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
        font-family: Arial, sans-serif;
    }

    input[type="text"] {
        padding: 8px;
        margin: 5px;
        width: 50%;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        padding: 8px 16px;
        margin-top: 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }

    a {
        margin-top: 20px;
        font-size: 18px;
        color: #4CAF50;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    #idproducto {
        background-color: #f2f2f2;
        color: #555;
        cursor: not-allowed;
    }
</style>

<a href="desconectar.php">Desconectar</a>
<?php
    include("libs/libs.php");
    $conn = conectar();
    if(!$conn){
        die("Fallo!!!!!! ".mysqli_connect_error());
    }

    if(!isset($_REQUEST['idproducto'])){
        $idproducto = $_GET["idproducto"];
        $sqlProducto = "SELECT *
                     FROM productos
                     WHERE idproducto = ".$idproducto;
                
        $result = mysqli_query($conn, $sqlProducto);
        $producto = mysqli_fetch_array($result);
?>

<form action="actualizarProducto.php" method="POST">
    ID: <input type="text" id = "idproducto" name="idproducto" value = "<?php echo $producto['idproducto'];?>" readonly/> <br/>
    Producto: <input type="text" id = "nombrecompleto" name="nombrecompleto" value = "<?php echo $producto['nombrecompleto'];?>"/> <br/>
    Categoría: <input type="text" id ="categoria" name="categoria" value = "<?php echo $producto['categoria'];?>"/> <br/>
    Descripcion: <input type="text" id ="descripcion" name="descripcion" value = "<?php echo $producto['descripcion'];?>"/> <br/>
    Imagen: <input type="text" id ="imagenuno" name="imagenuno" value = "<?php echo $producto['imagenuno'];?>"/> <br/>
    Cantidad: <input type="text" id ="cantidad" name="cantidad" value = "<?php echo $producto['cantidad'];?>"/> <br/>
    Precio: <input type="text" id ="precio" name="precio" value = "<?php echo $producto['precio'];?>"/> <br/>
    <input type ="submit" value ="Modificar"/>
</form>

<?php

    }else{
        $idproducto = $_REQUEST['idproducto'];
        $nombrecompleto = $_REQUEST['nombrecompleto'];
        $categoria = $_REQUEST['categoria'];
        $descripcion = $_REQUEST['descripcion'];
        $imagen = $_REQUEST['imagenuno'];
        $cantidad = $_REQUEST['cantidad'];
        $precio = $_REQUEST['precio'];
        $sqlUpdate = "UPDATE productos 
                      SET nombrecompleto = '$nombrecompleto', categoria = '$categoria', descripcion = '$descripcion', imagenuno = '$imagen', cantidad = '$cantidad', precio = '$precio'
                      WHERE idproducto = $idproducto";
        
        try{
            mysqli_query($conn, $sqlUpdate);
            echo "<br/>Producto modificada<br/>";
        }catch(Exception $e){
                echo("Error description: " . mysqli_error($conn));
        }
        echo "<a href = 'cPanel.php'>Panel de control</a>";
        mysqli_close($conn);     

    }

?>


