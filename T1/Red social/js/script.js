const API_USERS = "https://jsonplaceholder.typicode.com";
const API_GENERO = "https://api.genderize.io?name=";
const API_EDAD = "https://api.agify.io/?name=";
const API_GEO = "https://geocode.xyz/";
let isCreated = false;
let isContained = false;
window.onload = function () {
    crearOpciones();
}
/**
 * Carga los usuarios y les asigna su id como valor
 */
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
        let infor = document.createElement('div');
        infor.id = "info";
        let img = document.createElement('img');
        if (datosTarjeta[0] == "male") img.src = "img/male.jpg";
        else img.src = "img/female.jpg";
        infor.appendChild(img);
        for (let i = 1; i < datosTarjeta.length; i++) {
            let div = document.createElement('div');
            div.id = CABECERA[i - 1];
            div.innerText = datosTarjeta[i];
            infor.appendChild(div);
        }
        let botones = document.createElement('div');
        botones.id = "botones";
        let but1 = document.createElement('div');
        let but2 = document.createElement('div');
        but1.id = "butt1";
        but2.id = "butt2";
        but1.classList.add("boton");
        but2.classList.add("boton");
        botones.appendChild(but1);
        botones.appendChild(but2);
        infor.appendChild(botones);
        document.body.appendChild(infor);
        butt1.addEventListener("click", mostrarPosts);
        butt2.addEventListener("click", mostrarFotos);

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
    let pos = 0;
    if (nom.split(' ')[0] == "Mrs.") pos = 1;
    let linkEdad = API_EDAD + nom.split(' ')[pos];
    let linkGen = API_GENERO + nom.split(' ')[0];
    let promesa2 = await fetch(linkEdad);
    let response2 = await promesa2.json();
    let edad =  response2.age;

    let promesa3 = await fetch(linkGen);
    let response3 = await promesa3.json();
    let genero =  response3.gender;

    return [genero, nom, edad, email, ciudad, web];
}
/**
 * Crea content, contendrá los posts del usuario 
 */
function mostrarPosts() {
    if (isContained) content.remove();
    else isContained = true;
    this.classList.add("sombra");
    butt2.classList.remove("sombra");
    let id = document.querySelector('select').value;
    let link = API_USERS + "/users/" + id + "/posts";
    fetch(link).then(e => e.json()).then(posts => {
        let cont = document.createElement('div');
        cont.id = "content";
        cont.classList.add("cont-posts");
        for(post of posts)  {
            let div = document.createElement('div');
            div.classList.add("posts");
            let h3 = document.createElement('h3');
            let p = document.createElement('p');
            h3.innerText = post.title;
            p.innerText = post.body;
            div.appendChild(h3);
            div.appendChild(p);
            cont.appendChild(div);
        }
        document.body.appendChild(cont);
    });
    
}
/**
 * Crea content, contendra las fotos del usuario
 */
function mostrarFotos() {
    if (isContained) content.remove();
    else isContained = true;
    this.classList.add("sombra");
    butt1.classList.remove("sombra");
    let id = document.querySelector('select').value;
    let link = API_USERS + "/users/" + id + "/albums";
    fetch(link).then(e => e.json()).then(albums => {
        let cont = document.createElement('div');
        cont.id = "content";
        cont.classList.add("cont-fotos");
        document.body.appendChild(cont);
        for (album of albums) {
            let linkAlbum = API_USERS + "/albums/" + album.id + "/photos"
            fetch(linkAlbum).then(e => e.json()).then(fotos => {
                for (foto of fotos) {
                    let img = document.createElement('img');
                    img.src = foto.thumbnailUrl;
                    img.id = foto.albumId + "-" + foto.id;
                    cont.appendChild(img);
                }
                cargarEventosFotos();
            });
        }
    });
}
/**
 * Una vez ya mostradas, se cargan los eventos
 */
function cargarEventosFotos() {
    let imgs = content.querySelectorAll('img');
    for (img of imgs) {
        img.addEventListener("click", abrirPublicacion);
    }
}
/**
 * Visualiza la publicacion desde cerca
 */
function abrirPublicacion(){
    protector.classList.remove('ocultar');
    document.body.style.overflowY = "hidden";
    let id = this.id.slice("-");
    let idUsu = document.querySelector('select').value;
    let link = API_USERS + "/users/" + idUsu + "/albums";
    fetch(link).then(e => e.json()).then(albums => {
        let publi = document.createElement('div');
        publi.id = "publicacion";
        publi.classList.add("publi");
        document.body.appendChild(publi);
        let linkAlbum = API_USERS + "/albums/" + id[0]+ "/photos"
        fetch(linkAlbum).then(e => e.json()).then(fotos => {
            for (foto of fotos) {
                if (foto.id == id[1]) {
                    let img = document.createElement('img');
                    img.src = foto.url;
                    publi.appendChild(img);
                    break;
                } 
            }
        });
        
    });
}
function cerrarPublicacion(){
    protector.classList.add('ocultar');
    document.body.style.overflowY = "auto";
}
/**
 * Nos devuelve un int de x a y incluyendolos
 */
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min) + min);
  }