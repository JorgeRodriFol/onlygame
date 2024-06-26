llamarAJAX();
var precioTotal = 0;
var numTotal = 0;

document.getElementById("comprar").addEventListener("click", function () {
  comprar();
});

function llamarAJAX() {
  let cookie = document.cookie.split("; ");
  let usuario;
  for (let i = 0; i < 3; ++i) {
    if (cookie[i].split("=")[0] == "correoCliente") {
      usuario = cookie[i].split("=")[1];
    }
  }
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(this.readyState + ":" + this.status);
    if (this.readyState == 4 && this.status == 200) {
      precioTotal = 0;
      numTotal = 0;
      mostrarCarro(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/gestionCarrito.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("funcion=mostrar&usuario=" + usuario);
}

function mostrarCarro(respuesta) {
  let productos = document.querySelector(".productos");
  let carro = JSON.parse(respuesta);
  if (carro == "No se encontro el videojuego") {
    productos.innerHTML = "";
    let mensaje = document.createElement("h1");
    mensaje.className = "mensajeNF";
    mensaje.textContent = "No existen juegos con las categorias indicadas";
    productos.appendChild(mensaje);
    document.querySelector(".numproductos").textContent = "PRODUCTOS: 0";
    document.querySelector(".preciaTotal").textContent = "TOTAL: 0.00€";
  } else {
    productos.innerHTML = "";
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
      let borrar = document.createElement("button");
      borrar.className = "borrar";
      borrar.textContent = "borrar";
      borrar.addEventListener("click", function () {
        let cookie = document.cookie.split("; ");
        let usuario;
        for (let i = 0; i < 3; ++i) {
          if (cookie[i].split("=")[0] == "correoCliente") {
            usuario = cookie[i].split("=")[1];
          }
        }
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          console.log(this.readyState + ":" + this.status);
          if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "Producto eliminado") {
              llamarAJAX();
            }
          }
        };
        xhttp.open("POST", "../gestion/gestionCarrito.php", true);
        xhttp.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        xhttp.send(
          "funcion=borrar&videojuego=" +
            carro[i]["id_videojuego"] +
            "&usuario=" +
            usuario
        );
      });
      producto.appendChild(borrar);
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
  let cookie = document.cookie.split("; ");
  let usuario;
  for (let i = 0; i < 3; ++i) {
    if (cookie[i].split("=")[0] == "correoCliente") {
      usuario = cookie[i].split("=")[1];
    }
  }
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(this.readyState + ":" + this.status);
    if (this.readyState == 4 && this.status == 200) {
      console.log("Mensaje" + this.responseText);
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
        llamarAJAX();
      }
    }
  };
  xhttp.open("POST", "../gestion/gestionCarrito.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("funcion=comprar&usuario=" + usuario);
}
