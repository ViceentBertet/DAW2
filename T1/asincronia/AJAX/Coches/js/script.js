let xhr;
window.onload = function (){
    crearEventos();
}
function crearEventos() {
    sel.addEventListener("change", ajax);
}
function ajax() {
    xhr = new XMLHttpRequest();
    xhr.open('GET', "https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMake/" + sel.value);
    xhr.send();
    xhr.addEventListener("readystatechange", mostrar);
}
function mostrar() {
    if(xhr.status == 200 && xhr.readyState == 4) {    
        let results = xhr.responseXML.querySelectorAll('ModelsForMake');
        crearTabla(results);
    }
}
function crearTabla(results) {
    if (document.querySelector('table')) document.querySelector('table').remove();
    let cabecera = ["ID MARCA", "NOMBRE MARCA", "ID MODELO", "NOMBRE MODELO"];
    let tabla = document.createElement('table');
    tabla.appendChild(crearFila(cabecera, true));
    for (modelo of results) {
        let datos = [modelo.querySelector('Make_ID').textContent, 
            modelo.querySelector('Make_Name').textContent, 
            modelo.querySelector('Model_ID').textContent, 
            modelo.querySelector('Model_Name').textContent
        ];
        
        tabla.appendChild(crearFila(datos, false));
    }
    document.body.appendChild(tabla);
}
function crearFila(row, header) {
    let tipoReg;
    if (header) {
        tipoReg = "th";
    } else {
        tipoReg = "td";
    }
    let fila = document.createElement('tr');
    for (dato of row) {
        let reg = document.createElement(tipoReg);
        reg.innerText = dato;
        fila.appendChild(reg);
    }
    return fila;
}