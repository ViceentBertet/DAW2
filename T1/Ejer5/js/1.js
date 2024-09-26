import {act1,act2,act3,act4,act5} from "./ejercicios.js";
let error;
do {
    error = false;
    let eleccion = parseInt(prompt("¿Qué ejercicio quieres ejecutar?\n(1, 2, 3, 4 o 5):"));
    switch (eleccion) {
        case 1:
            act1();
            break;
        case 2:
            act2();
            break;
        case 3:
            act3();
            break;
        case 4:
            act4();
            break;
        case 5:
            act5();
            break;
        default:
            alert("ERROR: Ejercicio no existente. Vuelvelo a intentar");
            error = true;
    }
} while (error);
alert("Cerrando el programa...");