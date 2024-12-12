let nMarca;
let xhr;
window.onload = function () {
    solicitarCoches();
}
function solicitarCoches() {
    let marcas = ["Ferrari", "Ford", "Hyundai", "Peugeot", "Mazda"];
    for (let i = 0; i < marcas.length; i++) {
        nMarca = 0;
        llamadaXml(marcas[i]);
    }
}
function llamadaXml(tipo){
    xhr = new XMLHttpRequest();
    let link = "https://vpic.nhtsa.dot.gov/api/vehicles/getmodelsformake/" + tipo;
    xhr.open('GET', link, true);
    xhr.send();
    xhr.addEventListener("readystatechange", mostrar);
}
function mostrar() {
    if(xhr.status == 200 && xhr.readyState == 4) {
        let marca = xhr.responseXML.querySelectorAll("Make_Name")[0];
        console.log(marca)
        let trs = document.querySelectorAll('tr');
        let marcaTd = document.createElement("td");
        marcaTd.innerText = marca.textContent;
        trs[nMarca].appendChild(marcaTd);/*
        for (let i; i < modelos.length; i++)  {
            let td = document.createElement("td");
            td.innerText = "ID: " +  modelos[i].Model_ID + ", Nombre Modelo: " + modelos[i].Model_Name;
            trs[nMarca].appendChild(td);
        }*/
    }
}