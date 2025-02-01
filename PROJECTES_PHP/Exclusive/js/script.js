const OPCIONES_TIPO = ["Belleza", "Piel", "Fragancia", "Cabello", "Herramientas"];
const VALORES_OPERADORES = ["=", "<", ">"];
const OPCIONES_OPERADORES = ["Igual que", "Menor que", "Mayor que "]
const TIPO_USUS = ['Cliente', 'Empleado', 'Admin']
function addTipo() {
    protector.classList.remove("ocultar");
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
    let buttons = createButtons("Mostrar productos");    

    form.appendChild(select);
    form.appendChild(buttons[0]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    ventana.appendChild(buttons[1]);
    document.body.appendChild(ventana);
    cerrar.addEventListener("click", closeWindow);
}
function addPrecio(){
    protector.classList.remove("ocultar");
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
    let buttons = createButtons("Mostrar productos");

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
    protector.classList.add("ocultar");
}
function createButtons(msj) {
    let button = document.createElement("button");
    button.innerText = msj;
    let button2 = document.createElement("button");
    button2.id = "cerrar";
    button2.innerText = "Cerrar ventana";
    return [button, button2];
}
function formUsu(accion) {
    protector.classList.remove("ocultar");
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = accion;
    let form = document.createElement("form");
    form.method = "post";
    form.action = "./adminUsu.php";
    form.classList.add("formUsu");
    form.id = "formulario";
    let email = document.createElement('input');
    email.name = "email";
    email.id = "email";
    email.type = "email";
    email.placeholder = "Email";

    let nom = document.createElement('input');
    nom.name = "nom";
    nom.id = "nom";
    nom.placeholder = "Nombre";

    let pwd = document.createElement('input');
    pwd.name = "pwd";
    pwd.id = "pwd";
    pwd.type = "password";
    pwd.placeholder = "Contraseña";

    let tipo = document.createElement('select');
    tipo.name = "tpo_usu";
    tipo.id = "tipo_usu";

    TIPO_USUS.forEach(opcion => {
        const option = document.createElement("option");
        option.value = opcion;
        option.textContent = opcion;
        tipo.appendChild(option); 
    });
    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";
    let input = document.createElement("input");
    input.classList.add("ocultar");
    input.id = "accion";
    input.name = "accion";

    form.appendChild(input);
    form.appendChild(tipo);
    form.appendChild(email);
    form.appendChild(nom);
    form.appendChild(pwd);
    form.appendChild(buttons[0]);
    form.appendChild(buttons[1]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    document.body.appendChild(ventana);
    but2.addEventListener("click", closeWindow);
}
function addUsu() {
    formUsu("Añadir usuario");
    let inputAdd = document.createElement("input");
    inputAdd.value = 1;
    inputAdd.classList.add("ocultar");
    inputAdd.name = "accion";

    formulario.appendChild(inputAdd);
}

function actUsu() {
    formUsu("Actualizar usuario");
    let inputAct = document.createElement("input");
    inputAct.value = 2;
    inputAct.classList.add("ocultar");
    inputAct.name = "accion";
    
    formulario.appendChild(inputAct);
}
function formDelUsu(accion) {
    protector.classList.remove("ocultar");
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = accion;

    let form = document.createElement("form");
    form.method = "post";
    form.action = "./adminUsu.php";
    form.classList.add("formUsu");
    form.id = "formulario";

    let email = document.createElement('input');
    email.name = "email";
    email.id = "email";
    email.type = "email";
    email.placeholder = "Email";

    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";

    let input = document.createElement("input");
    input.classList.add("ocultar");
    input.id = "accion";
    input.name = "accion";

    form.appendChild(input);
    form.appendChild(email);
    form.appendChild(buttons[0]);
    form.appendChild(buttons[1]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    document.body.appendChild(ventana);
    but2.addEventListener("click", closeWindow);
}
function delUsu() {
    formDelUsu("Eliminar usuario");
    accion.value = 3;
    formulario.appendChild(inputDel);
}