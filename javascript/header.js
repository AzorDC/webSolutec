$(document).ready(() => {
  $.ajax({
    type: "GET",
    url: "./controllers/hasSession.php",
    data: {},
    success: (d) => {
      if (d == "false") {
        $("#nav-items").html(`
        <a href='./index.html' class='nav-link'>
            <h6 class='list-group-item'>Home</h6>
        </a>
        <a href='./blog-list.html' class='nav-link'>
            <h6 class='list-group-item'>Cursos</h6>
        </a>
        <a href='./about.html' class='nav-link'>
            <h6 class='list-group-item'>Sobre nosotros</h6>
        </a>
        <a href='./login.html' class='nav-link'>
            <h6 class='list-group-item'>Iniciar sesión</h6>
        </a>
      `);
      } else {
        $("#nav-items").html(`
        <a href='./index.html' class='nav-link'>
            <h6 class='list-group-item'>Home</h6>
        </a>
        <a href='./blog-list.html' class='nav-link'>
            <h6 class='list-group-item'>Cursos</h6>
        </a>
        <a href='./about.html' class='nav-link'>
            <h6 class='list-group-item'>Sobre nosotros</h6>
        </a>
        <a href='./favorites.php' class='nav-link'>
            <h6 class='list-group-item'>Mis Favoritos</h6>
        </a>
        <a href='./controllers/logout.php' class='nav-link''>
            <h6 class='list-group-item'>Cerrar sesión</h6>
        </a>
      `);
      }
    },
    error: (d) => {
      alert(d);
    },
  });
});
