/**
 * Este método añade un curso a la lista de favoritos de un usuario.
 * @param {int} idCurso id del curso el cual queremos añadir a la lista de favoritos.
 */
function AddToFavorites(idCurso) {
  // Verificamos que exista una sesión activa.
  $.ajax({
    type: "GET",
    url: "./controllers/hasSession.php",
    data: {},
    success: (d) => {
      if (d == "false") {
        // En caso de no haber iniciado sesión se le pedirá al usuario que lo haga.
        alert("Favor de iniciar sesión.");
      } else {
        const data = {
          idCurso: idCurso,
          idUsuario: d,
        };

        // Obtenemos la lista actual de favoritos del usuario
        $.ajax({
          type: "GET",
          url: "./controllers/getFavorites.php",
          data: { idUsuario: data.idUsuario },
          success: (d) => {
            const response = JSON.parse(d);

            // Buscamos si en su lista ya se encuentra el curso que desea añadir
            const found = response.find(
              (curso) => curso.idCurso == data.idCurso
            );

            if (found !== undefined) {
              // En caso de ya existir en su lista, se le notifica al usuario.
              alert("Este curso ya se encuentra en tu lista de favoritos.");
            } else {
              // Si aún no lo tiene en su lista lo añadimos
              $.ajax({
                type: "POST",
                url: "./controllers/addToFavorites.php",
                data: data,
                success: () => {
                  alert("Curso agregado a favoritos!");
                },
                error: (d) => {
                  alert(d);
                },
              });
            }
          },
          error: (err) => {
            alert(err);
          },
        });
      }
    },
    error: (d) => {
      alert(d);
    },
  });
}
