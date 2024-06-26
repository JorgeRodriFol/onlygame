var urlActual = window.location.href;
var urlObj = new URL(urlActual);
var params = urlObj.searchParams;
var videojuegoID = params.get("videojuegoID");
llamarAJAXDatos(videojuegoID);
llamarAJAXSaga(videojuegoID);
llamarAJAXRelacionados(videojuegoID);

let carrusel = document.querySelector(".similares");
let varx = 0;
let diferencia = carrusel.scrollWidth - carrusel.clientWidth;
let left = document.getElementById("left");
left.addEventListener("click", function () {
  console.log("Pulsado");
  scrollLeft();
});
let right = document.getElementById("right");
right.addEventListener("click", function () {
  console.log("Pulsado");
  scrollRight();
});
document.querySelector(".arrows").appendChild(left);
document.querySelector(".arrows").appendChild(right);

function scrollLeft() {
  varx = Math.max(0, varx - 540);
  carrusel.scrollLeft = varx;
}

function scrollRight() {
  varx = Math.max(diferencia, varx + 540);
  carrusel.scrollLeft = varx;
}

function llamarAJAXDatos(videojuegoID) {
  //Recogida de datos en un array
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(this.readyState + ":" + this.status);
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      mostrardatos(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/muestraDatos.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("videojuegoID=" + videojuegoID);
}

function mostrardatos(datos) {
  datos = JSON.parse(datos);
  console.log(datos);
  document.querySelector(".breadcrumb span").textContent = datos["titulo"];
  document
    .getElementById("portada")
    .setAttribute("src", "../../img/portadas/" + datos["imagen"]);
  document.getElementById("titulo").textContent = datos["titulo"];
  document.getElementById("precio").textContent = datos["precio"] + "€";
  document.getElementById("categorias").textContent =
    "Categorias: " + datos["categorias"];
  document.querySelector(".descripcion p").textContent = datos["descripcion"];
}

function llamarAJAXSaga(videojuegoID) {
  //Recogida de datos en un array
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(this.readyState + ":" + this.status);
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      mostrarsaga(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/muestraSaga.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("videojuegoID=" + videojuegoID);
}

function llamarAJAXRelacionados(videojuegoID) {
  //Recogida de datos en un array
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(this.readyState + ":" + this.status);
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      mostrarrelacion(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/muestraRelacionados.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("videojuegoID=" + videojuegoID);
}

function mostrarrelacion(relacionados) {
  let body = document.querySelector(".similares");
  relacionados = JSON.parse(relacionados);
  console.log(relacionados);
  body.innerHTML = "";
  for (let i = 0; i < relacionados.length; i++) {
    let tarjeta = document.createElement("div");
    tarjeta.className = "tarjeta";
    let enlace = document.createElement("a");
    console.log(relacionados[i]["id_videojuego"]);
    enlace.addEventListener("click", function (event) {
      event.preventDefault();
      let parametros = new URLSearchParams();
      parametros.append("videojuegoID", relacionados[i]["id_videojuego"]);
      let url = "./producto.php?" + parametros.toString();
      window.location.href = url;
    });
    let imagen = document.createElement("img");
    imagen.setAttribute(
      "src",
      "../../img/portadas/" + relacionados[i]["imagen"]
    );
    enlace.appendChild(imagen);
    let info = document.createElement("div");
    info.className = "info";
    let titulo = document.createElement("h4");
    titulo.textContent = relacionados[i]["titulo"];
    info.appendChild(titulo);
    enlace.appendChild(info);
    tarjeta.appendChild(enlace);
    body.appendChild(tarjeta);
  }
}

function mostrarsaga(relacionados) {
  let body = document.querySelector(".saga");
  relacionados = JSON.parse(relacionados);
  console.log(relacionados);
  body.innerHTML = "";
  for (let i = 0; i < relacionados.length; i++) {
    let tarjeta = document.createElement("div");
    tarjeta.className = "tarjeta";
    let enlace = document.createElement("a");
    console.log(relacionados[i]["id_videojuego"]);
    enlace.addEventListener("click", function (event) {
      event.preventDefault();
      let parametros = new URLSearchParams();
      parametros.append("videojuegoID", relacionados[i]["id_videojuego"]);
      let url = "./producto.php?" + parametros.toString();
      window.location.href = url;
    });
    let imagen = document.createElement("img");
    imagen.setAttribute(
      "src",
      "../../img/portadas/" + relacionados[i]["imagen"]
    );
    enlace.appendChild(imagen);
    let info = document.createElement("div");
    info.className = "info";
    let titulo = document.createElement("h4");
    titulo.textContent = relacionados[i]["titulo"];
    info.appendChild(titulo);
    enlace.appendChild(info);
    tarjeta.appendChild(enlace);
    body.appendChild(tarjeta);
  }
}

function truncarTexto(texto, longitudMaxima) {
  if (texto.length > longitudMaxima) {
    return texto.substring(0, longitudMaxima) + "...";
  } else {
    return texto;
  }
}

function addCarrito() {
  if (!document.cookie.includes("correoCliente")) {
    const modal = document.getElementById("myModal");
    document.querySelector("#myModal p").textContent =
      "Debes iniciar sesión para añadir productos";
    const closeModalBtn = document.getElementsByClassName("close")[0];
    modal.style.visibility = "visible";
    closeModalBtn.onclick = function () {
      modal.style.visibility = "hidden";
    };

    // Cerrar el modal al hacer clic fuera del contenido del modal
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.visibility = "hidden";
      }
    };
  } else {
    let cookie = document.cookie.split("; ");
    let usuario;
    for (let i = 0; i < 3; ++i) {
      if (cookie[i].split("=")[0] == "correoCliente") {
        usuario = cookie[i].split("=")[1];
      }
    }
    console.log(usuario);
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      console.log(this.readyState + ":" + this.status);
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "200") {
          const modal = document.getElementById("myModal");
          const closeModalBtn = document.getElementsByClassName("close")[0];
          modal.style.visibility = "visible";
          closeModalBtn.onclick = function () {
            modal.style.visibility = "hidden";
          };

          // Cerrar el modal al hacer clic fuera del contenido del modal
          window.onclick = function (event) {
            if (event.target == modal) {
              modal.style.visibility = "hidden";
            }
          };
        }
      }
    };
    xhttp.open("POST", "../gestion/gestionCarrito.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
      "funcion=insertar&videojuegoID=" + videojuegoID + "&usuario=" + usuario
    );
  }
}
