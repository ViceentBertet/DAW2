const OPCIONES_TIPO = ["Belleza", "Piel", "Fragancia", "Cabello", "Herramientas"];
const OPERADORES = ["=", "<", ">"];
window.onload = function(){
    tipo.addEventListener("click", addTipo);
    precio.addEventListener("click", addPrecio)
}
function addTipo() {
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = "Selecciona el tipo";
    let form = document.createElement("form");
    form.method = "post";
    form.action = "./porTipo.php";
    let select = document.createElement("select");
    select.name = "type";
    OPCIONES_TIPO.forEach(opcion => {
        const option = document.createElement("option");
        option.value = opcion;
        option.textContent = opcion;
        select.appendChild(option); 
    });
    let button = document.createElement("button");
    button.innerText = "Mostrar productos";
    form.appendChild(select);
    form.appendChild(button);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    document.body.appendChild(ventana);
}
function addPrecio(){
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = "Selecciona el precio y el operador";
    let form = document.createElement("form");
    form.method = "post";
    form.action = "./porPrecio.php";
    let select = document.createElement("select");
    select.name = "price";

}
function createWindow() {
    let div = document.createElement("div");
    div.classList.add("ventana");
    return div;
}