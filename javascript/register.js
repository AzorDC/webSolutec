$("#registrar").on("click", (event) => {
  event.preventDefault();

  const parameters = {
    userName: $("#login").val(),
    pass: $("#password").val(),
    nombres: $("#name").val(),
    apellidos: $("#apellido").val(),
  };

  // Verificamos que el usuario haya llenado todos los campos del registro
  const isEmpty = Object.values(parameters).some((x) => x === null || x === "");
  if (isEmpty) {
    $("#alert-zone").html(
      "<div class='alert alert-danger' role='alert'> Por favor llene todos los campos. </div>"
    );
    setTimeout(() => {
      $("#alert-zone").html("");
    }, 3000);
  } else {
    // Verificamos que no exista un usuario con ese nombre de usuario
    $.ajax({
      type: "GET",
      url: "./controllers/getUser.php",
      data: { login: parameters.userName },
      success: (res) => {
        console.log(res);
        if (res == "true") {
          // En caso de que ya exista un usuario con el mismo nombre de usuario
          $("#alert-zone").html(
            "<div class='alert alert-danger' role='alert'> <p>Por favor elige un nombre de usuario distinto.</p> </div>"
          );
        } else {
          /* Verificamos que la contraseña cumpla con los requisitos:
            Al menos una mayúscula, una minúscula, un dígito, un caracter especial
            y al menos 8 caracteres. */
          let regex = new RegExp(
            "^(?=[\x21-\x7E]*[0-9])(?=[\x21-\x7E]*[A-Z])(?=[\x21-\x7E]*[a-z])(?=[\x21-\x7E]*[\x21-\x2F|\x3A-\x40|\x5B-\x60|\x7B-\x7E])[\x21-\x7E]{8,}$"
          );

          if (regex.test(parameters.pass)) {
            $.ajax({
              type: "POST",
              url: "./controllers/registrarUsuario.php",
              data: parameters,
              success: () => {
                $("#alert-zone").html(
                  "<div class='alert alert-success' role='alert'> Usuario registrado con éxito! </div>"
                );
                setTimeout(() => {
                  $("#alert-zone").html("");
                }, 3000);
              },
              error: () => {
                $("#alert-zone").html(
                  "<div class='alert alert-danger' role='alert'> <p>Ocurrió un error, vuelve a intentarlo más tarde</p> </div>"
                );
                setTimeout(() => {
                  $("#alert-zone").html("");
                }, 3000);
              },
            });
          } else {
            // En caso de que la contraseña no cumpla os requisitos mandamos una alerta al usuario
            $("#alert-zone").html(
              "<div class='alert alert-danger' role='alert'> <p>La contraseña no cumple con los requisitos, debe tener al menos: <ul><li>Una longitud de 8 caracteres.</li> <li>Al menos una letra mayúscula.</li> <li>Al menos una letra minúscula.</li> <li>Al menos un caracter especial.</li></ul> </p> </div>"
            );
          }
        }
      },
      error: (err) => {
        alert(err);
      },
    });
  }
});
