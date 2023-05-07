<style>
    body {
        background-color: #5a6268;
    }
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

<a href="desconectar.php" style='border: 1px solid #ddd; padding: 8px; background:#808080 '>Desconectar</a>
<h2>Panel de control</h2>

<h3>Listado de productos</h3>

<form action="cPanel.php" method="POST">
        Producto: <input type="text" id = "nombrecompleto" name="nombrecompleto"/> <br/>
        Categoria: <input type="text" id ="categoria" name="categoria"/> <br/>
        <input type ="submit" value ="Buscar"/>
</form>

<?php

    include("libs/libs.php");
    $conn = conectar();
    if(!$conn){
        die("Fallo!!!!!! ".mysqli_connect_error());
    }

    $sqlProducto = "SELECT *
                FROM productos";
    
    if(isset($_REQUEST['nombrecompleto']) || isset($_REQUEST['categoria'])){
        $nombrecompleto = $_REQUEST['nombrecompleto'];
        $categoria = $_REQUEST['categoria'];
        $sqlProducto.= " WHERE productos like '%$nombrecompleto%' AND categoria LIKE '%$categoria%'";
    }

    echo "<a href='addProducto.php'>Añadir producto</a><br/>";

    $result = mysqli_query($conn, $sqlProducto);
echo "<table style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #000080; color: white;'>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>idProducto</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Producto</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Categoria</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Nombre</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Cantidades</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Precio (€)</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Imagen</th>";
echo "</tr>";

while ($Producto = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>".$Producto['idproducto']."</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>".$Producto['nombrecompleto']."</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'><a href='detalleProducto.php?id=".$Producto['id']."'>".$Producto['categoria']."</a></td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>".$Producto['descripcion']."</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>".$Producto['cantidad']."</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>".$Producto['precio']."</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>".$Producto['imagenuno']."</td>";
    echo "<td ><a href='actualizarProducto.php?id=".$Producto['idproducto']."'>Modificar</a></td>";
    echo "<td ><a href='eliminarProduto.php?id=".$Producto['idproducto']."'>Eliminar</a></td>";
    echo "</tr>";
}
echo "</table>";

    

?>
