llamarAJAX("buscar", "");

var busqueda = document.querySelector(".search-container input");
busqueda.addEventListener("input", function () {
  console.log(document.querySelector(".search-container input").value);
  llamarAJAX("buscar", document.querySelector(".search-container input").value);
});

var filtro = document.querySelectorAll(".genero input");
var listaFiltro = [];
filtro.forEach((input) => {
  listaFiltro.push(input.value);
});
for (let i = 0; i < filtro.length; i++) {
  filtro[i].addEventListener("change", function () {
    let categorias = [];
    let contador = 0;
    for (let j = 0; j < filtro.length; j++) {
      if (filtro[j].checked) {
        contador++;
        categorias.push(filtro[j].value);
      }
    }
    if (contador == 0) {
      llamarAJAX("filtrar", listaFiltro);
    } else {
      llamarAJAX("filtrar", categorias);
    }
  });
}

function llamarAJAX(accion, input) {
  //Recogida de datos en un array
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      mostrarvideojuegos(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/muestraVideojuegos.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  if (accion == "buscar") xhttp.send("busqueda=" + input);
  else if (accion == "filtrar") xhttp.send("filtros=" + input);
}

function mostrarvideojuegos(videojuegos) {
  let body = document.querySelector(".body");
  videojuegos = JSON.parse(videojuegos);
  body.innerHTML = "";
  if (videojuegos == "No se encontraron registros en la base de datos.") {
    body.style.display = "flex";
    body.style.justifyContent = "center";
    body.style.alignItems = "center";
    body.style.paddingLeft = "0";
    let mensaje = document.createElement("h1");
    mensaje.className = "mensajeNF";
    mensaje.textContent = "No existen juegos con las categorias indicadas";
    body.appendChild(mensaje);
  } else {
    body.style.display = "block";
    body.style.paddingLeft = "7.5%";
    for (let i = 0; i < videojuegos.length; i++) {
      let tarjeta = document.createElement("div");
      tarjeta.className = "tarjeta";
      let enlace = document.createElement("a");
      console.log(videojuegos[i]["id_videojuego"]);
      enlace.addEventListener("click", function (event) {
        event.preventDefault();
        let parametros = new URLSearchParams();
        parametros.append("videojuegoID", videojuegos[i]["id_videojuego"]);
        let url = "./producto.php?" + parametros.toString();
        window.location.href = url;
      });
      let imagen = document.createElement("img");
      imagen.setAttribute(
        "src",
        "../../img/portadas/" + videojuegos[i]["imagen"]
      );
      enlace.appendChild(imagen);
      let info = document.createElement("div");
      info.className = "info";
      let titulo = document.createElement("h4");
      titulo.textContent = videojuegos[i]["titulo"];
      info.appendChild(titulo);
      let precio = document.createElement("h4");
      precio.textContent = videojuegos[i]["precio"] + "€";
      info.appendChild(precio);
      let categorias = document.createElement("p");
      categorias.textContent = truncarTexto(
        "Categorias: " + videojuegos[i]["categorias"],
        50
      );
      info.appendChild(categorias);
      enlace.appendChild(info);
      tarjeta.appendChild(enlace);
      body.appendChild(tarjeta);
    }
  }
}

function truncarTexto(texto, longitudMaxima) {
  if (texto.length > longitudMaxima) {
    return texto.substring(0, longitudMaxima) + "...";
  } else {
    return texto;
  }
}
