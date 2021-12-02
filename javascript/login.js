function LogIn() {
  const parameters = {
    userName: $("#login").val(),
    pass: $("#password").val(),
  };

  const isEmpty = Object.values(parameters).some((x) => x === null || x === "");
  if (isEmpty) {
    $("#alert-zone").html(
      "<div class='alert alert-danger' role='alert'> Por favor llene todos los campos. </div>"
    );
    setTimeout(() => {
      $("#alert-zone").html("");
    }, 3000);
  } else {
    $.ajax({
      type: "POST",
      url: "./controllers/login.php",
      data: parameters,
      success: (d) => {
        const response = JSON.parse(d);

        if (response.statuscode !== 200) {
          $("#alert-zone").html(
            `<div class='alert alert-danger' role='alert'>${response.content}</div>`
          );
        } else {
          window.location = "./index.html";
        }
      },
      error: () => {
        $("#alert-zone").html(
          "<div class='alert alert-danger' role='alert'> Ocurrió un error, vuelve a intentarlo más tarde </div>"
        );
        setTimeout(() => {
          $("#alert-zone").html("");
        }, 3000);
      },
    });
  }
}
