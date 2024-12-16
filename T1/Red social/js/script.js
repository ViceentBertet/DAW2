const API_USERS = "https://jsonplaceholder.typicode.com";
const API_GENERO = "https://api.genderize.io?name=";
const API_EDAD = "https://api.agify.io/?name=";
const API_GEO = "https://geocode.xyz/";
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
    let datosTarjeta = recopilarDatos(this.value);
    let info = document.createElement('div');
    info.id = "info";

    console.log(datosTarjeta.json())
}
async function recopilarDatos(id) {
    let linkUsu = API_USERS + "/users?id=" + id;

    let promesa1 = await fetch(linkUsu);
    let response1 = await promesa1.json();

    let nom =  response1[0].name.innerText;
    let email =  response1[0].email.innerText;
    let ciudad =  response1[0].address.city.innerText;
    let web =  response1[0].web;

    let linkGen = API_GENERO + nom;
    let linkEdad = API_EDAD + nom;

    let promesa2 = await fetch(linkEdad);
    let response2 = await promesa2.json();
    let edad =  response2[0].age;

    let promesa3 = await fetch(linkGen);
    let response3 = await promesa3.json();
    let genero =  response3[0].gender.innerText;

    return [genero, nom, edad, email, ciudad, web];
}