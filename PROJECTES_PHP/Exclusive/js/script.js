const OPCIONES_TIPO = ["Belleza", "Piel", "Fragancia", "Cabello", "Herramientas"];
const VALORES_OPERADORES = ["=", "<", ">"];
const OPCIONES_OPERADORES = ["Igual que", "Menor que", "Mayor que "];
const TIPO_USUS = ['Cliente', 'Empleado', 'Admin'];
const URL_VALORACIONES = "JSON_VAL.php";
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
    form.appendChild(buttons[1]);

    ventana.appendChild(titulo);
    ventana.appendChild(form);
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
    form.appendChild(buttons[1]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    document.body.appendChild(ventana);
    cerrar.addEventListener("click", closeWindow);
}
function createWindow() {
    let div = document.createElement("div");
    div.id = "ventana";
    div.classList.add("ventana");
    document.body.style.overflow = "hidden";
    return div;
}
function closeWindow() {
    ventana.remove();
    document.body.style.overflow = "";
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
}
function formProd(accion) {
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = accion;

    let form = document.createElement("form");
    form.method = "post";
    form.action = "./adminProd.php";
    form.classList.add("formProd");
    form.id = "formulario";
    form.enctype="multipart/form-data";
    
    let id = document.createElement('input');
    id.name = "id";
    id.id = "id";
    id.placeholder = "ID";

    let nom = document.createElement('input');
    nom.name = "nom";
    nom.id = "nom";
    nom.placeholder = "Nom";

    let descrip = document.createElement('input');
    descrip.name = "descrip";
    descrip.id = "descrip";
    descrip.placeholder = "Descripción";

    let img = document.createElement('input');
    img.name = "img";
    img.id = "img";
    img.type = "file";

    let select = document.createElement('select');
    OPCIONES_TIPO.forEach(opcion => {
        const option = document.createElement("option");
        option.value = opcion;
        option.textContent = opcion;
        select.appendChild(option); 
    });
    select.name = "tipo";
    select.id = "tipo";

    let precio = document.createElement('input');
    precio.name = "precio";
    precio.id = "precio";
    precio.placeholder = "Precio";

    let stock = document.createElement('input');
    stock.name = "stock";
    stock.id = "stock";
    stock.placeholder = "Stock";

    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";

    let input = document.createElement("input");
    input.classList.add("ocultar");
    input.id = "accion";
    input.name = "accion";

    form.appendChild(input);
    form.appendChild(id);
    form.appendChild(nom);
    form.appendChild(descrip);
    form.appendChild(img);
    form.appendChild(select);
    form.appendChild(stock);
    form.appendChild(precio);
    
    form.appendChild(buttons[0]);
    form.appendChild(buttons[1]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    document.body.appendChild(ventana);
    but2.addEventListener("click", closeWindow);
}
function addProd() {
    formProd("Añadir producto");
    accion.value = 1;
}
function actProd() {
    formProd("Actualizar producto");
    accion.value = 2;
}
function formDelProd(accion) {
    protector.classList.remove("ocultar");
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = accion;

    let form = document.createElement("form");
    form.method = "post";
    form.action = "./adminProd.php";
    form.classList.add("formUsu");
    form.id = "formulario";

    let email = document.createElement('input');
    email.name = "id";
    email.id = "email";
    email.placeholder = "ID Producto";

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
function delProd() {
    formDelProd("Borrar producto");
    accion.value = 3;
}
async function mostrarProducto(producto, iniciado) {
    document.body.style.overflow = "hidden";
    protector.classList.remove("ocultar");
    let formVal = document.createElement("form");
    formVal.action = "#";
    formVal.id = "formVal";

    let chat = document.createElement('input');
    chat.placeholder = "Introduce una reseña...";
    chat.name = "valoracion";
    let imgEnviar = document.createElement('img');
    imgEnviar.src = "img/enviar.png";
    imgEnviar.alt = "Enviar";

    let button = document.createElement("button");
    button.appendChild(imgEnviar);

    let formCarrito = document.createElement("form");
    formCarrito.id = "formCarrito";
    formCarrito.action = "#";

    let input = document.createElement("input");
    input.classList.add("ocultar");
    input.name = "producto";
    input.value = producto.id;

    let titulo = producto.querySelector("h3").cloneNode(true);
    titulo.id = "tProd";
    let img = producto.querySelector("img").cloneNode(true);
    img.id = "img";
    
    let descrip = producto.querySelector("p").cloneNode(true);
    descrip.id = "descrip";

    let precio = producto.querySelectorAll("p")[1].cloneNode(true);
    precio.id = "precio";

    let val = document.createElement("div");
    val.id = "val";
    let valData = await fetchVal(producto.id);
    console.log(valData);
   

    let div = document.createElement("div");
    div.classList.add("mostrarProducto");
    let accion = "Añadir al carrito"; 
    if (iniciado == null) {
        formCarrito.action = "iniciaSesion.php";
        accion = "Inicia sesión";
    }
    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";
    protector.classList.remove("ocultar");

    formCarrito.appendChild(input);
    formCarrito.appendChild(titulo);
    formCarrito.appendChild(img);
    formCarrito.appendChild(descrip);
    formCarrito.appendChild(val);
    formCarrito.appendChild(precio);
    formCarrito.appendChild(buttons[0]);
    formCarrito.appendChild(buttons[1]);
    
    formVal.appendChild(chat);
    formVal.appendChild(button);

    div.appendChild(formCarrito);
    div.appendChild(formVal);
    document.body.appendChild(div);
    but2.addEventListener("click", closeWindow);
}
async function fetchVal(id) {
    try {
        let respuesta = await fetch(URL_VALORACIONES + "?prod=" + id);
    
        if (!respuesta.ok) {
            console.log("ERROR: SOLICITANDO VALORACIONES");
            return null;
        }

        return respuesta.text(); // Convierte la respuesta a JSON si es válida
    } catch (e) {
        console.log("ERROR: " + e);
        return null;
    } 
}