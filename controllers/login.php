<?php
    require "./conexion.php";

    $usuario = $_POST["userName"];
    $pass = $_POST["pass"];

    $query = "SELECT * FROM usuario WHERE userName = '$usuario' AND password = '$pass'";
    $resultado = $conexion -> query($query);

    if ($resultado -> num_rows > 0)
    {
        $row = $resultado -> fetch_assoc();
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['idUsuario'] = $row['idUsuario'];
        
        echo json_encode(array('statuscode' => 200));
    }
    else 
    {
        echo json_encode(array('statuscode' => 400, 'content' => 'Usuario o contraseña incorrectos.'));
    }

    $conexion -> close();
?>