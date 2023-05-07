<?php
    include("libs/libs.php");
    echo "Vamos a conectarnos...<br/>";
    $conn = conectar();

    if(!$conn) {
        die("Fallo!!!!!! ".mysqli_connect_error());
    }

    $userName = $_REQUEST["user"];
    $password = $_REQUEST["password"];
    echo "Conectado ".$userName;

    $sqlUser = "SELECT *
                FROM cliente
                where user like '".$userName."'
                and password like '".$password."'";

    echo $sqlUser;
    $result = mysqli_query($conn, $sqlUser);
    $userExists = mysqli_num_rows($result);
    
    //echo "<br/>Hay $userExists usuarios <br/>";

    if($userExists){
        $userName = mysqli_fetch_array($result)['user'];
        if( $userName == 'admin')
            //echo "<br/>Welcome, admin";
            header("Location: cPanel.php");            
        else
            //echo "Welcome, user ".$username;
            header("Location: uPanel.php");


        //header("Location: uPanel.php");
    }
    else
        header("Location: index.php?exists");

?>