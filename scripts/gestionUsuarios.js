if (
  window.location.pathname != "/onlygame/php/paginas/login.php" &&
  window.location.pathname != "/onlygame/php/paginas/usuario.php"
) {
  if (document.cookie.includes("nombreCliente")) {
    let cookie = document.cookie.split("; ");
    let imagen;
    for (let i = 0; i < 3; ++i) {
      if (cookie[i].split("=")[0] == "imgCliente") {
        imagen = cookie[i].split("=")[1];
      }
    }
    let usuario = document.querySelector(".log_in");
    usuario.innerHTML = "";
    let img = document.createElement("img");
    img.setAttribute("src", "../../img/usuarios/" + imagen);
    usuario.appendChild(img);
    let desplegable = document.createElement("div");
    desplegable.className = "desplegable";
    let user = document.createElement("a");
    user.setAttribute("href", "./usuario.php");
    user.text = "Mi Cuenta";
    desplegable.appendChild(user);
    usuario.appendChild(desplegable);
  } else {
    let usuario = document.querySelector(".log_in");
    usuario.innerHTML = "";
    let enlace = document.createElement("a");
    enlace.setAttribute("href", "./login.php");
    let texto = document.createElement("h3");
    texto.textContent = "LOG IN";
    enlace.appendChild(texto);
    usuario.appendChild(enlace);
  }
}

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
      let resultado = JSON.parse(this.responseText);
      console.log(resultado);
      if (resultado != "404") {
        console.log(resultado);
        document.cookie = "nombreCliente=" + resultado["nombre"];
        document.cookie = "correoCliente=" + resultado["correo"];
        document.cookie = "imgCliente=" + resultado["imagen"];
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

function logout() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.location = "./index.php";
    }
  };

  xhttp.open("POST", "../gestion/logout.php", true);
  xhttp.send();
}

function cambiar() {
  let nombre = document.getElementById("nombre").value;
  let correo = document.getElementById("correo").value;
  let texto =
    nombre + "-" + correo + "-" + document.cookie.split("; ")[1].split("=")[1];
  console.log(texto);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.response);
      if (this.response == "200") {
        document.cookie = "nombreCliente=" + nombre;
        document.cookie = "correoCliente=" + correo;
        document.cookie = "imgCliente=sin_img.png";
      }
    }
  };

  xhttp.open("POST", "../gestion/gestionUsuarios.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("cambiar=" + texto);
}
