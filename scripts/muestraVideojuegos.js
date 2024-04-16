llamarAJAX("");

var busqueda = document.querySelector(".search-container input");
busqueda.addEventListener("input", function () {
  console.log(document.querySelector(".search-container input").value);
  llamarAJAX(document.querySelector(".search-container input").value);
});

function llamarAJAX(input) {
  //Recogida de datos en un array
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      mostrarvideojuegos(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/muestraVideojuegos.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("busqueda=" + input);
}

function mostrarvideojuegos(videojuegos) {
  let body = document.querySelector(".body");
  videojuegos = JSON.parse(videojuegos);
  console.log(videojuegos);
  body.innerHTML = "";
  for (let i = 0; i < videojuegos.length; i++) {
    let tarjeta = document.createElement("div");
    tarjeta.className = "tarjeta";
    let enlace = document.createElement("a");
    enlace.setAttribute("href", "./producto.php");
    let imagen = document.createElement("img");
    imagen.setAttribute("src", "../../img/" + videojuegos[i]["imagen"]);
    enlace.appendChild(imagen);
    let info = document.createElement("div");
    info.className = "info";
    let titulo = document.createElement("h4");
    titulo.textContent = videojuegos[i]["titulo"];
    info.appendChild(titulo);
    let precio = document.createElement("h4");
    precio.textContent = videojuegos[i]["precio"];
    info.appendChild(precio);
    enlace.appendChild(info);
    tarjeta.appendChild(enlace);
    body.appendChild(tarjeta);
  }
}
