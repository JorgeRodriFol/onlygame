function registrar() {
  if (
    document.querySelector(".registro #password").value ==
    document.querySelector(".registro #passwordRepeat").value
  ) {
    var texto =
      document.querySelector(".registro #correo").value +
      "-" +
      document.querySelector(".registro #nombre").value +
      "-" +
      document.querySelector(".registro #password").value;
    console.log(texto);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.response);
      }
    };

    xhttp.open("POST", "../gestion/gestionUsuarios.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("registro=" + texto);
  }
}

function login() {
  var texto =
    document.querySelector(".login #correo").value +
    "-" +
    document.querySelector(".login #password").value;
  console.log(texto);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let resultado = JSON.parse(this.readyState);
      console.log(resultado);
      if (resultado != "404") {
        document.cookie = "nombreCliente=" + resultado[0]["correo"];
        document.cookie = "imgCliente=" + resultado[0]["imagen"];
        window.location.href = "index.php";
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
  xhttp.send("login=" + texto);
}
