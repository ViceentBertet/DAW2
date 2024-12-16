const API_USERS = "https://jsonplaceholder.typicode.com";
const API_GENERO = "https://api.genderize.io?name=";
const API_EDAD = "https://api.agify.io/?name=";
const API_GEO = "https://geocode.xyz/";
let isCreated = false;
window.onload = function () {
    crearOpciones();
}
function crearOpciones() {
    let link = API_USERS + "/users";
    fetch(link).then(e => e.json()).then(e=> { 
        for (user of e) {
            let opt = document.createElement('option');
            opt.innerText = user.name;
            opt.value = user.id;
            usuarios.appendChild(opt);
        }
        usuarios.addEventListener("change", cargarTarjeta);
    });    
}
/**
 * Crea la tarjeta de información con el usuario seleccionado en el select
 */
function cargarTarjeta() {
    recopilarDatos(this.value).then(datosTarjeta =>{
        if (isCreated) {
            info.remove();
        } else isCreated = true;
        const CABECERA = ['nom', 'edad', 'email','ciudad','web'];
        let info = document.createElement('div');
        info.id = "info";
        let img = document.createElement('img');
        if (datosTarjeta[0] == "male") img.src = "img/male.jpg";
        else img.src = "img/female.jpg";
        info.appendChild(img);
        for (let i = 1; i < datosTarjeta.length; i++) {
            let div = document.createElement('div');
            div.id = CABECERA[i - 1];
            div.innerText = datosTarjeta[i];
            info.appendChild(div);
        }
        document.body.appendChild(info);
    });
}
/**
 * Recopila toda la información necesaria para una tarjeta de informativa
 * @param {*} id del usuario
 * @returns
 */
async function recopilarDatos(id) {
    let linkUsu = API_USERS + "/users?id=" + id;

    let promesa1 = await fetch(linkUsu);
    let response1 = await promesa1.json();

    let nom =  response1[0].name;
    let email =  response1[0].email;
    let ciudad =  response1[0].address.city;
    let web =  response1[0].website;

    let linkEdad = API_EDAD + nom.split(' ')[0];
    let linkGen = API_GENERO + nom.split(' ')[0];

    let promesa2 = await fetch(linkEdad);
    let response2 = await promesa2.json();
    let edad =  response2.age;

    let promesa3 = await fetch(linkGen);
    let response3 = await promesa3.json();
    let genero =  response3.gender;

    return [genero, nom, edad, email, ciudad, web];
}