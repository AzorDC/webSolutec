<?php
    require("./conexion.php");

    $idCurso = $_GET["idCurso"];
    $idUsuario = $_GET["idUsuario"];

    $sql = "DELETE FROM favoritos WHERE idCurso = '$idCurso' AND idUsuario = '$idUsuario'";

    if (mysqli_query($conexion, $sql))
    {
        header('location: ../favorites.php');
    }
    else 
    {
        $error = mysqli_error($conexion);
        echo $error;
    }

    $conexion -> close();
?>