if (
  window.location.pathname != "/onlygame/php/paginas/login.php" &&
  window.location.pathname != "/onlygame/php/paginas/usuario.php"
) {
  if (document.cookie.includes("nombreCliente")) {
    let cookie = document.cookie.split("; ");
    let imagen = cookie[2].split("=");
    let usuario = document.querySelector(".log_in");
    usuario.innerHTML = "";
    let img = document.createElement("img");
    img.setAttribute("src", "../../img/usuarios/" + imagen[1]);
    usuario.appendChild(img);
    let desplegable = document.createElement("div");
    desplegable.className = "desplegable";
    let user = document.createElement("a");
    user.setAttribute("href", "./usuario.php");
    user.text = "Mi Cuenta";
    desplegable.appendChild(user);
    let logOut = document.createElement("a");
    logOut.addEventListener("click", function () {
      logout();
    });
    logOut.text = "Log Out";
    desplegable.appendChild(logOut);
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
} else if (window.location.pathname == "/onlygame/php/paginas/usuario.php") {
  let cookie = document.cookie.split("; ");
  let nombre = cookie[0].split("=")[1];
  let correo = cookie[1].split("=")[1];
  document.getElementById("nombre").value = nombre;
  document.getElementById("correo").value = correo;
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
  const cookies = document.cookie.split("; ");

  for (let i = 0; i < cookies.length; i++) {
    const datos = cookies[i].split("=");
    document.cookie =
      datos[0] + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }
  window.location.href = "./index.php";
}
