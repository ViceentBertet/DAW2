const CABECERA = ["NOMBRE", "PRECIO", "STOCK"]
let producto1 = ["Manzana", 5, 12];
let producto2 = ["Peras", 4, 18]
var productos = [producto1, producto2];

export function mostrarInventario() {
    let mensaje = `${CABECERA}\n`;
    for (let i = 0; i < productos.length; i++) {
        mensaje += `${productos[i]}\n`;
    }
    alert(mensaje);
}
export function agregarProducto(){
    let verificar;
    let nom;
    let preu;
    let stock;
    do {
        nom = prompt("Introduce el nombre del producto:");
        preu = prompt("Introduce el precio del producto:");
        stock = prompt("Introduce el stock del producto:");
        verificar = comprobarNombre(nom);
        if (verificar) alert("ERROR: El producto ya existe. Intentalo otra vez");
    } while (verificar);
    productos[productos.length] = [nom,preu,stock];
    alert("El producto se ha añadido correctamente");
}
export function eliminarProducto(){
    let verificar;
    let nom;
    let indice;
    do {
        nom = prompt("Introduce el nombre del producto que quieres borrar:");
        verificar = comprobarNombre(nom);
        if (!verificar) alert("ERROR: El producto no existe. Intentalo otra vez");
    } while (!verificar);
    for(let i = 0; i < productos.length; i++) {
        if (productos[i][0].toLowerCase() == nom.toLowerCase()){
            let indice = i;
            break;
        }
    }
    //TODO como especificar que producto queremos borrar
}
export function actualizarProducto(){
    let verificar;
    let nom;
    let indice;
    do {
        nom = prompt("Introduce el nombre del producto que quieres borrar:");
        verificar = comprobarNombre(nom);
        if (!verificar) alert("ERROR: El producto no existe. Intentalo otra vez");
    } while (!verificar);
    for(let i = 0; i < productos.length; i++) {
        if (productos[i][0].toLowerCase() == nom.toLowerCase()){
            let indice = i;
            break;
        }
    }
    //TODO como especificar que producto queremos actualizar
}
export function calcularValor(){
    let valorTotal = 0;
    for (let i = 0; i < productos.length; i++) {
        let valorLinea = parseInt(productos[i][2]) * parseInt(productos[i][1]);
        valorTotal += valorLinea;
    }
    alert(`El valor total del inventario es de ${valorTotal}€`);
}
function comprobarNombre(nom) {
    for (let i = 0; i < productos.length; i++) {
        if (productos[i][0].toLowerCase() == nom.toLowerCase())return true;     
    }
    return false;
}