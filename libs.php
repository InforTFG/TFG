<?php

    function conectar() {
        $servername = "sql213.byethost8.com";
        $userName = "b8_33990547";
        $password = "AlumnoIFP";
        return mysqli_connect($servername, $userName, $password, "b8_33990547_Infortfg", "3306");
    }

?>