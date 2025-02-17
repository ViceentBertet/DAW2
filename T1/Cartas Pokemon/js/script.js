const NUM_POKEMONS = 5;
let pokemons = "";
let maquina = "";
let jugador = "";
window.onload = function() {
    fetchPokemon();
}
async function fetchPokemon() {
    let num = await fetch ("https://pokeapi.co/api/v2/pokemon")
            .then(response => response.json())
            .then(data => data.count)
            .catch(error => error)
    pokemons = await fetch(`https://pokeapi.co/api/v2/pokemon/?limit=${num}`)
            .then(response => response.json())
            .then(data => data.results)
            .catch(error => error)
    maquina = await elegirCinco();
    jugador = await elegirCinco();
    mostrarCartasJugador();
}
async function elegirCinco() {
    let array = [];
    for (let i = 0; i < NUM_POKEMONS; i++) {
        let n = nAleatorio(pokemons.length);
        let pokemon = await fetch(pokemons[n].url)
                .then(response => response.json())
                .then(data => [data.name, data.sprites.front_default	, data.base_experience])
                .catch(error => error);
        pokemons.splice(n, 1);
        array.push(pokemon);
    }
    return array;
}
function nAleatorio (max) {
    return Math.floor(Math.random() * max) + 1;
}
function mostrarCartasJugador() {
    for (let i = 0; i < jugador.length; i++) {
        let div = document.createElement("div");
        div.classList.add("carta");

        let nom = document.createElement("p");
        nom.id = "nom";
        nom.innerText = jugador[i][0];

        let img = document.createElement("img");
        img.src = jugador[i][1];
        img.alt = nom.innerText;
        img.id = "img";

        let xp = document.createElement("p");
        xp.id = "xp";
        xp.innerText = jugador[i][2];
        div.appendChild(xp);
        div.appendChild(img);
        div.appendChild(nom);
        cartasJugador.appendChild(div);
    }
}