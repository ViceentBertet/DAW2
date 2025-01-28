const OPCIONES_TIPO = ["Belleza", "Piel", "Fragancia", "Cabello", "Herramientas"];
const VALORES_OPERADORES = ["=", "<", ">"];
const OPCIONES_OPERADORES = ["Igual que", "Menor que", "Mayor que "]

window.onload = function(){
    tipo.addEventListener("click", addTipo);
    precio.addEventListener("click", addPrecio)
}
function addTipo() {
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = "Selecciona el tipo";
    let form = document.createElement("form");
    form.method = "get";
    form.action = "./porTipo.php";
    let select = document.createElement('select');
    OPCIONES_TIPO.forEach(opcion => {
        const option = document.createElement("option");
        option.value = opcion;
        option.textContent = opcion;
        select.appendChild(option); 
    });
    select.name = "type";
    select.id = "type";
    let buttons = createButtons();    

    form.appendChild(select);
    form.appendChild(buttons[0]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    ventana.appendChild(buttons[1]);
    document.body.appendChild(ventana);
    cerrar.addEventListener("click", closeWindow);
}
function addPrecio(){
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = "Selecciona el precio y el operador";
    let form = document.createElement("form");
    form.method = "get";
    form.action = "./porPrecio.php";
    
    let select = document.createElement('select');
    for (let i = 0; i < OPCIONES_OPERADORES.length; i++) {
        let option = document.createElement("option");
        option.value = VALORES_OPERADORES[i];
        option.textContent = OPCIONES_OPERADORES[i];
        select.appendChild(option); 
    };
    select.name = "operator";
    let input = document.createElement("input");
    input.type = "number";
    input.name = "price";
    input.autocomplete = "off";
    let buttons = createButtons();

    form.appendChild(select);
    form.appendChild(input);
    form.appendChild(buttons[0]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    ventana.appendChild(buttons[1]);
    document.body.appendChild(ventana);
    cerrar.addEventListener("click", closeWindow);

}
function createWindow() {
    let div = document.createElement("div");
    div.id = "ventana";
    div.classList.add("ventana");
    return div;
}
function closeWindow() {
    ventana.remove();
}
function crearSelect(opciones) {
    
}
function createButtons() {
    let button = document.createElement("button");
    button.innerText = "Mostrar productos";
    let button2 = document.createElement("button");
    button2.id = "cerrar";
    button2.innerText = "Cerrar ventana";
    return [button, button2];
}