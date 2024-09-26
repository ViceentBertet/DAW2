import {agregarProducto, eliminarProducto, actualizarProducto ,mostrarInventario, calcularValor} from "./inventario.js";
mostrar_Menu();
let opcion = parseInt(prompt("¿Que deseas hacer?"));

switch (opcion) {
    case 1:
        agregarProducto();
        break;
    case 2:
        eliminarProducto();
        break;
    case 3:
        actualizarProducto();
        break;
    case 4:
        mostrarInventario();
        break;
    case 5:
        calcularValor();
        break;
    default:
        alert("ERROR: Valor no comprendido");
}



function mostrar_Menu() {
    alert("Opciones: " +
        "\n\t1. Agregar productos" +
        "\n\t2. Eliminar productos" +
        "\n\t3. Actualizar productos" +
        "\n\t4. Mostrar inventario actual" +
        "\n\t5. Calcular valor total del inventario");
}
