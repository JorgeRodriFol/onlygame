llamarAJAX();
var precioTotal = 0;
var numTotal = 0;

document.getElementById("comprar").addEventListener("click", function () {
  comprar();
});

function llamarAJAX() {
  let cookie = document.cookie.split(";");
  let usuario = cookie[1].split("=");
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(this.readyState + ":" + this.status);
    if (this.readyState == 4 && this.status == 200) {
      mostrarCarro(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/gestionCarrito.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("funcion=mostrar&usuario=" + usuario[1]);
}

function mostrarCarro(respuesta) {
  let productos = document.querySelector(".productos");
  let carro = JSON.parse(respuesta);
  if (respuesta == "No se encontro el videojuego") {
    let mensaje = document.createElement("h1");
    mensaje.className = "mensajeNF";
    mensaje.textContent = "No existen juegos con las categorias indicadas";
    productos.appendChild(mensaje);
  } else {
    for (let i = 0; i < carro.length; i++) {
      let producto = document.createElement("div");
      producto.className = "producto";
      let portada = document.createElement("img");
      portada.className = "portada";
      portada.setAttribute("src", "../../img/portadas/" + carro[i]["imagen"]);
      producto.appendChild(portada);
      let informacion = document.createElement("div");
      informacion.className = "informacion";
      let titulo = document.createElement("h1");
      titulo.textContent = carro[i]["titulo"];
      informacion.appendChild(titulo);
      let categorias = document.createElement("h2");
      categorias.textContent = "Categorias: " + carro[i]["categorias"];
      informacion.appendChild(categorias);
      producto.appendChild(informacion);
      let precio = document.createElement("h2");
      precio.className = "precio";
      precio.textContent = carro[i]["precio"] + "€";
      producto.appendChild(precio);
      precioTotal += parseFloat(carro[i]["precio"]);
      productos.appendChild(producto);
    }
    numTotal = carro.length;
    document.querySelector(".numproductos").textContent =
      "PRODUCTOS: " + numTotal;
    document.querySelector(".preciaTotal").textContent =
      "TOTAL: " + precioTotal.toFixed(2) + "€";
  }
}

function comprar() {
  console.log("Comprando");
  let cookie = document.cookie.split(";");
  let usuario = cookie[1].split("=");
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(this.readyState + ":" + this.status);
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/gestionCarrito.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("funcion=comprar&usuario=" + usuario[1]);
}
