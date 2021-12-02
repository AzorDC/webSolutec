<?php
    require "./conexion.php";

    $userName = $_POST["userName"];
    $pass = $_POST["pass"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];

    $sql = "INSERT INTO usuario (userName, password, nombres, apellidos) VALUES ('$userName', '$pass', '$nombres', '$apellidos')";

    if (mysqli_query($conexion, $sql))
    {
        echo json_encode(array('status' => 'ok'));
    }
    else 
    {
        $error = mysqli_error($conexion);
        echo json_encode(array('status' => 'badrequest'));
    }

    $conexion -> close();
?>
