var urlActual = window.location.href;
var urlObj = new URL(urlActual);
var params = urlObj.searchParams;
var videojuegoID = params.get("videojuegoID");
llamarAJAXDatos(videojuegoID);

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
  document.getElementById("plataformas").textContent =
    "Plataformas: " + datos["plataformas"];
  document.querySelector(".descripcion p").textContent = datos["descripcion"];
}

function llamarAJAXRelacionados(videojuegoID) {
  //Recogida de datos en un array
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    console.log(this.readyState + ":" + this.status);
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      mostrardatos(this.responseText);
    }
  };
  xhttp.open("POST", "../gestion/muestraRelacionados.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("videojuegoID=" + videojuegoID);
}
