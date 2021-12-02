<?php
    $dbhost = "localhost"; // host donde esta la base de datos
    $dbname = "proyecto_gps"; // nombre de BD
    $dbuser = "root"; // user name
    $dbpass = "admin"; // password de usuario

    $conexion = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname");
    
    if (mysqli_connect_errno())
    {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>
