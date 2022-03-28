// trae elmodall
var modall = document.getElementById("mymodall");
// asigna el boton del modan
var btn = document.getElementById("myBtn");
// cierra el modall con el span
var span = document.getElementsByClassName("close")[0];
// abre el modall
btn.onclick = function() {
  modall.style.display = "block";
}
// cerrar modall con <span> (x)
span.onclick = function() {
  modall.style.display = "none";
}
// cierra el modall al clicar fuera
window.onclick = function(event) {
  if (event.target == modall) {
    modall.style.display = "none";
  }
}