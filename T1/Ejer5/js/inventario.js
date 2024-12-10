const CABECERA = ["NOMBRE", "PRECIO", "STOCK"]
let producto1 = ["Manzana", 5, 12];
let producto2 = ["Pera", 4, 18]
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
            indice = i;
            break;
        }
    }
    productos.splice(indice, 1);
    alert("El producto ha sido eliminado");
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
            indice = i;
            break;
        }
    }
    opcion = prompt("¿Qué quieres modificar, precio o stock?(1/2)");
    switch(opcion) {
        case 1:
            newPrecio = prompt(`El precio actual es de ${productos[indice][1]}, introduce el nuevo precio:`);
            productos[indice][1] = newPrecio;
            alert("Se ha cambiado el precio correctamente");
            break;
        case 2:
            newStock = prompt(`El stock actual es de ${productos[indice][2]}, introduce el nuevo stock:`);
            productos[indice][2] = newStock;
            alert("Se ha cambiado el stock correctamente");
            break;
        default:alert("ERROR: Dato no comprendido, no se ha actualizado el producto");
    }
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