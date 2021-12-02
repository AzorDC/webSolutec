<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 4 Blog Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="./solutec.ico">

    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/theme-7.css">

    <!-- JQUERY -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-dark">
            <a href="./index.html"> <img src="./assets/images/solutec.png" alt="SoluTec" class="logo-navbar"> </a>
            <div class="navbar-item" id="nav-items">                
                <script src='./javascript/header.js'></script>
            </div>
        </nav>
    </header>

    <div class="main-wrapper">

        <section class="blog-list px-3 py-5 p-md-5">
            <div class="container" id="favorites-container">
                <?php
                    require './controllers/conexion.php';
                    include_once './controllers/user_session.php';
                    $userSession = new UserSession();

                    $idUsuario = $_SESSION["idUsuario"];
                
                    $sql = "SELECT idCurso FROM favoritos WHERE idUsuario = '$idUsuario'";
                    $resultado = $conexion -> query($sql);
                
                    if ($resultado -> num_rows > 0)
                    {
                        while ($row = $resultado -> fetch_assoc()) 
                        {
                            $idCurso = $row["idCurso"];                            
                            $sql2 = "SELECT * FROM curso WHERE idCurso = '$idCurso'";

                            $resultado2 = $conexion -> query($sql2);

                            if ($resultado2 -> num_rows > 0)
                            {
                                while ($row2 = $resultado2 -> fetch_assoc())
                                {
                                    $id = $row2["idCurso"];
                                    $img = $row2["imagen"];
                                    $titulo = $row2["nombreCurso"];
                                    $descripcion = $row2["descripcion"];
                                    $url = $row2["url"];

                                    echo "
                                    <div class='item mb-5'>
                                    <div class='media'>
                                        <img class='mr-3 img-fluid post-thumb d-none d-md-flex' src='$img' alt='image'>
                                        <div class='media-body'>
                                            <h3 class='title mb-1'><a href='$url'>$titulo</a></h3>
                                            <div class='intro'>$descripcion</div>                                          
                                        </div>
                                        <div>
                                            <a class='btn btn-danger text-white' href='./controllers/deleteFromFavorites.php?idCurso=$id&idUsuario=$idUsuario'>
                                                <i class='fas fa-trash'></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                    ";
                                }
                            }
                        }
                    }
                    else 
                    {
                        echo "No tienes cursos en tus favoritos";
                    }
                ?>
            </div>
        </section>

        <footer class="footer text-center py-2 theme-bg-dark">

            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

        </footer>

    </div>


    <!-- Javascript -->
    <script src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="./javascript/addToFavorites.js"></script>
</body>

</html>