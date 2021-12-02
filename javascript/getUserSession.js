function GetUserSession() {
  $.ajax({
    type: "GET",
    url: "./controllers/hasSession.php",
    data: {},
    success: (d) => {
      if (d == "false") {
        alert(d);
        return false;
      } else {
        alert(d);
        return d;
      }
    },
  });
}
