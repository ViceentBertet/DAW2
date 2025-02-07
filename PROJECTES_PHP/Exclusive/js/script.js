const OPCIONES_TIPO = ["Belleza", "Piel", "Fragancia", "Cabello", "Herramientas"];
const VALORES_OPERADORES = ["=", "<", ">"];
const OPCIONES_OPERADORES = ["Igual que", "Menor que", "Mayor que "];
const TIPO_USUS = ['Cliente', 'Empleado', 'Admin'];
const URL_VALORACIONES = "JSON_VAL.php";
const OPCIONES_EVAL = ['Excelente', 'Notable', 'Bueno', 'Suficiente', 'Insuficiente'];

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
    form.classList.add("formDelVal");
    form.id = "formulario";

    let id = document.createElement('input');
    id.name = "id";
    id.id = "email";
    id.placeholder = "ID producto";

    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";

    let input = document.createElement("input");
    input.classList.add("ocultar");
    input.id = "accion";
    input.name = "accion";

    form.appendChild(input);
    form.appendChild(id);
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
async function mostrarProducto(producto, iniciado, pagina) {
    document.body.style.overflow = "hidden";
    protector.classList.remove("ocultar");

    let div = document.createElement("div");
    div.classList.add("mostrarProducto");
    div.id = "ventana";

    let formVal = document.createElement("form");
    formVal.action = pagina;
    formVal.method = "POST";
    formVal.id = "formVal";

    let divVal = document.createElement('div');
    divVal.style.display = "flex";
    divVal.style.gap = "10px";
    divVal.style.width = "100%";

    let chat = document.createElement('input');
    chat.placeholder = "Introduce una reseña...";
    chat.name = "valoracion";
    let select = crearSelectEval();
    let imgEnviar = document.createElement('img');
    imgEnviar.src = "img/enviar.png";
    imgEnviar.alt = "Enviar";

    let button = document.createElement("button");
    button.appendChild(imgEnviar);

    let formCarrito = document.createElement("form");
    formCarrito.id = "formCarrito";
    formCarrito.action = pagina;

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
    valData = JSON.parse(valData);
    valData.forEach(valoracion => {
        let msjValor = crearValoracion(valoracion);        
        val.appendChild(msjValor);
    });
    let accion = "Añadir al carrito"; 
    console.log(iniciado);
    if (!iniciado) {
        formVal.action = "iniciaSesion.php";
        formCarrito.action = "iniciaSesion.php";
        accion = "Inicia sesión";
    } else {
        let cantidad = document.createElement("input");
        cantidad.type = "number";
        cantidad.id = "cant";
        formCarrito.appendChild(cantidad);
    }

    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";

    formCarrito.appendChild(input);
    formCarrito.appendChild(titulo);
    formCarrito.appendChild(img);
    formCarrito.appendChild(descrip);
    formCarrito.appendChild(val);
    formCarrito.appendChild(precio);
    formCarrito.appendChild(buttons[0]);
    formCarrito.appendChild(buttons[1]);

    divVal.appendChild(chat);
    divVal.appendChild(select);

    formVal.appendChild(input);
    formVal.appendChild(divVal);
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

        return respuesta.text();
    } catch (e) {
        console.log("ERROR: " + e);
        return null;
    } 
}
function crearValoracion(valoracion) {
    let msjValor = document.createElement('div');
    msjValor.classList.add('valoracion');

    let nom = document.createElement('p');
    nom.id = "nomVal";
    nom.innerText = valoracion.nom;

    let divMensaje = document.createElement('div');
    let descrip = document.createElement('p');
    descrip.innerText = valoracion.descrip;

    let eval = document.createElement('p');
    eval.innerText = valoracion.eval;
    
    if (eval.innerText == "Excelente" || eval.innerText == "Notable") eval.classList.add('verde');
    else if (eval.innerText == "Bueno") eval.classList.add('naranja');
    else eval.classList.add('rojo');

    divMensaje.appendChild(descrip);
    divMensaje.appendChild(eval);

    msjValor.appendChild(nom);
    msjValor.appendChild(divMensaje);
    return msjValor;
}
function crearSelectEval() {
    let select = document.createElement('select');
    OPCIONES_EVAL.forEach(opcion => {
        const option = document.createElement("option");
        option.value = opcion;
        option.textContent = opcion;
        select.appendChild(option); 
    });
    select.name = "eval";
    select.id = "eval";
    return select;
}
function addVal() {
    let accion = "Añadir valoración";
    protector.classList.remove("ocultar");
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = accion;

    let form = document.createElement("form");
    form.method = "post";
    form.action = "./adminVal.php";
    form.classList.add("formAddVal");
    form.id = "formulario";

    let email = document.createElement('input');
    email.name = "email";
    email.id = "email";
    email.placeholder = "Email";

    let prod = document.createElement('input');
    prod.name = "prod";
    prod.id = "prod";
    prod.placeholder = "ID producto";

    let descrip = document.createElement('input');
    descrip.name = "descrip";
    descrip.id = "descrip";
    descrip.placeholder = "Descripción";

    let select = crearSelectEval();

    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";

    let input = document.createElement("input");
    input.classList.add("ocultar");
    input.id = "accion";
    input.name = "accion";
    input.value = 1;

    form.appendChild(input);
    form.appendChild(email);
    form.appendChild(descrip);
    form.appendChild(prod);
    form.appendChild(select);
    form.appendChild(buttons[0]);
    form.appendChild(buttons[1]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    document.body.appendChild(ventana);
    but2.addEventListener("click", closeWindow);
}

function actVal() {
    let accion = "Actualizar valoración";
    protector.classList.remove("ocultar");
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = accion;

    let form = document.createElement("form");
    form.method = "post";
    form.action = "./adminVal.php";
    form.classList.add("formUpdVal");
    form.id = "formulario";

    let id = document.createElement('input');
    id.name = "id";
    id.id = "id";
    id.placeholder = "ID valoración";

    let email = document.createElement('input');
    email.name = "email";
    email.id = "email";
    email.placeholder = "Email";

    let prod = document.createElement('input');
    prod.name = "prod";
    prod.id = "prod";
    prod.placeholder = "ID producto";

    let descrip = document.createElement('input');
    descrip.name = "descrip";
    descrip.id = "descrip";
    descrip.placeholder = "Descripción";

    let select = crearSelectEval();

    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";

    let input = document.createElement("input");
    input.classList.add("ocultar");
    input.id = "accion";
    input.name = "accion";
    input.value = 2;

    form.appendChild(input);
    form.appendChild(id);
    form.appendChild(email);
    form.appendChild(descrip);
    form.appendChild(prod);
    form.appendChild(select);
    form.appendChild(buttons[0]);
    form.appendChild(buttons[1]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    document.body.appendChild(ventana);
    but2.addEventListener("click", closeWindow);
}
function formDelVal(accion) {
    protector.classList.remove("ocultar");
    let ventana = createWindow();
    let titulo = document.createElement("h3");
    titulo.innerText = accion;

    let form = document.createElement("form");
    form.method = "post";
    form.action = "./adminVal.php";
    form.classList.add("formDelVal");
    form.id = "formulario";

    let id = document.createElement('input');
    id.name = "id";
    id.id = "id";
    id.placeholder = "ID valoración";

    let email = document.createElement('input');
    email.name = "email";
    email.id = "email";
    email.placeholder = "Email";

    let prod = document.createElement('input');
    prod.name = "prod";
    prod.id = "prod";
    prod.placeholder = "ID producto";

    let buttons = createButtons(accion);
    buttons[0].id = "but1";
    buttons[1].id = "but2";

    let input = document.createElement("input");
    input.classList.add("ocultar");
    input.id = "accion";
    input.name = "accion";

    form.appendChild(input);
    form.appendChild(id);
    form.appendChild(email);
    form.appendChild(prod);
    form.appendChild(buttons[0]);
    form.appendChild(buttons[1]);
    ventana.appendChild(titulo);
    ventana.appendChild(form);
    document.body.appendChild(ventana);
    but2.addEventListener("click", closeWindow);
}
function delVal() {
    formDelVal("Borrar valoración");
    accion.value = 3;
}
function visualizarCarrito() {
    let div = document.createElement("div");
    div.id = "ventana";
}