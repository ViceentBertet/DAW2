let resultado;
do {
let num1 = parseInt(prompt("Introduce un número entero:"));
let num2 = parseInt(prompt("Introduce otro número entero:"));
let opcion = parseInt(prompt("¿Que operación deseas realizar?\n\t" +
    "1.Sumar\n\t" + 
    "2.Restar\n\t" + 
    "3.Multiplicar\n\t" +
    "4.Dividir"));   
resultado = calc(opcion, num1, num2);
if (resultado != "ERROR"){
    alert(`El resultado es: ${resultado}`);
}
} while (resultado === "ERROR");


function calc(opcion, num1, num2) {
    let resultado;
    switch (opcion) {
        case 1:
            resultado = num1 + num2;
            break;
        case 2:
            resultado = num1 - num2;
            break;
        case 3:
            resultado = num1 * num2;
            break;
        case 4:
            resultado = num1 / num2;
            break;
        default:
            alert("ERROR: OPCIÓN INCORRECTA");
            resultado = "ERROR";
    }
    return resultado;
}

function sumar(num1,num2) {
    
}