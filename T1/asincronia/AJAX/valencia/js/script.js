let distritoAnterior = "NO";
let limite = 100000;
let idealista = true;
let links = ["https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/precio-de-compra-en-idealista/records?order_by=distrito&limit=88",
    "https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/precio-de-compra-en-fotocasa/records?order_by=distrito&limit=88"
];
let tabla = document.createElement('table');
let web;

window.onload = function (){
    llamarAjax();
}
function llamarAjax() {
    let cont = 0;
    
    let xhr = [new XMLHttpRequest(), new XMLHttpRequest()];
    for (link of links) {
        ajax(link, xhr[cont]);
        cont++;
    }
}
function ajax(link, xhr) {
    xhr = new XMLHttpRequest();
    xhr.open('GET', link);
    xhr.send();
    xhr.addEventListener("readystatechange", () => {
        if(xhr.status == 200 && xhr.readyState == 4) {    
            let json = JSON.parse(xhr.responseText);
            crearTabla(json.results);
        }
    });
}
function crearTabla(results) {
    let contSummary = -1;
    if (idealista) {
        web = "Idealista";
        idealista = false;
    } else web = "FotoCasa";
    for (zona of results) {
        if (zona.distrito != distritoAnterior) {
            contSummary++;
            /*probar a buscar summary con mismo nombre*/
            if (contSummary < limite) crearSummary(zona.distrito);
            agregar();
            document.querySelectorAll('details')[contSummary].append(tabla);
            distritoAnterior = zona.distrito;
        }
        let tendencia = calcularTendencia();
        
        let datos = [zona.barrio, zona.precio_2022_euros_m2,zona.precio_2010_euros_m2,zona.max_historico_euros_m2, zona.ano_max_hist,tendencia];
        if (!datos.includes(null))tabla.appendChild(crearFila(datos, false));
    }
    limite = contSummary + 1;
    document.querySelectorAll('details')[contSummary].append(tabla);
}
function agregar() {
    let cabecera = ["NOMBRE BARRIO", "M2 2022", "M2 2010", "PRECIO MAX", "AÑO", "TENDENCIA"];
    tabla = document.createElement('table');
    let th = document.createElement("th");
    th.innerText = web;
    th.colSpan = "6";
    let tr = document.createElement('tr').appendChild(th);
    tabla.appendChild(tr);
    tabla.appendChild(crearFila(cabecera, true));
}
function calcularTendencia() {
    let tendencia;
    if (zona.precio_2022_euros_m2 > zona.precio_2010_euros_m2) tendencia = "subir";
    else if (zona.precio_2022_euros_m2 < zona.precio_2010_euros_m2) tendencia = "bajar";
    else tendencia = "igual";
    return tendencia;
}
function crearSummary(distrito) {
    let det = document.createElement('details');
    let sum = document.createElement('summary');
    sum.innerText = distrito;
    det.appendChild(sum);
    document.body.appendChild(det);
}
function crearFila(row, header) {
    let tipoReg;
    if (header) tipoReg = "th";
    else tipoReg = "td";

    let fila = document.createElement('tr');
    for (dato of row) {
        let reg = document.createElement(tipoReg);
        reg.innerText = dato;
        fila.appendChild(reg);
    }
    return fila;
}