<?php 
    // Importamos la cadena de conexión a la BD
    require './conexion.php';

    // Obtenemos el id del usuario
    $idUsuario = $_GET["idUsuario"];

    // Realizamos la consulta a la base de datos
    $sql = "SELECT idCurso FROM favoritos WHERE idUsuario = '$idUsuario'";
    $resultado = $conexion -> query($sql);

    // Verificamos que el usuario ya cuente con cursos en su lista de deseados
    if ($resultado -> num_rows > 0)
    {
        $favorites = [];
        while ($row = $resultado -> fetch_assoc()) 
        {
            array_push($favorites, $row);
        }

        // Devolvemos la respuesta
        echo json_encode($favorites);
    }
    else 
    {
        // En caso de que no tenga cursos en su lista
        echo "No tienes cursos en tus favoritos";
    }
?>
