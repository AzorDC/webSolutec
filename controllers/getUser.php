<?php
    require "./conexion.php";

    $username = $_GET["login"];

    $query = "SELECT * FROM usuario WHERE userName = '$username'";
    $resultado = $conexion -> query($query);

    if ($resultado -> num_rows > 0)
    {
        echo 'true';
    }
    else 
    {
        echo 'false';
    }

    $conexion -> close();
?>