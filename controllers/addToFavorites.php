<?php 
    require "./conexion.php";

    $idCurso = $_POST["idCurso"];
    $idUsuario = $_POST["idUsuario"];

    $sql = "INSERT INTO favoritos (idCurso, idUsuario) VALUES ('$idCurso', '$idUsuario')";

    if (mysqli_query($conexion, $sql))
    {
        echo json_encode(array('StatusCode' => 200));
    }
    else 
    {
        $error = mysqli_error($conexion);
        echo json_encode(array('StatusCode' => 400, 'Content' => $error));
    }

    $conexion -> close();
?>