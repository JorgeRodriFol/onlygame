function registrar() {
  if (
    document.getElementById("password").value ==
    document.getElementById("passwordRepeat").value
  ) {
    var texto =
      document.getElementById("correo").value +
      "-" +
      document.getElementById("nombre").value +
      "-" +
      document.getElementById("password").value;
    console.log(texto);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.response == "Correcto") {
          document.cookie =
            "correoCliente=" + document.getElementById("correo").value;
          window.location.href = "../paginas/index.php";
        } else {
          let h3 = document.createElement("h3");
          h3.style.color = "red";
          h3.textContent = "El usuario o la contraseña es erronea";
          document.querySelector(".body").appendChild(h3);
        }
      }
    };

    xhttp.open("POST", "../gestion/gestionUsuarios.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("registro=" + texto);
  }
}

function login() {}
