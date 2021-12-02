<?php 
    include_once './user_session.php';
    $userSession = new UserSession();

    if(isset($_SESSION['idUsuario']))
    {
        echo $_SESSION['idUsuario'];
    }
    else
    {
        echo 'false';
    }
?>