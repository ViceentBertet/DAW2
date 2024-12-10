function circulo(obj){
  obj.classList.toggle("circulo");
}
function sombra(obj) {
    obj.classList.toggle("sombra");
}
function eliminar(boton) {
    boton.parentNode.remove();
}
function interior(obj) {
    obj.classList.add("fijo"); //Cuando le ponemos interior, la exterior desaparece
}