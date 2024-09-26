let limiteInferior, limiteSuperior, numero;
let sumaDentro = 0;
let numerosFuera = 0;
let numIgualLimite = false;
do {
    limiteInferior = parseFloat(prompt("Introduce el límite inferior del intervalo:"));
    limiteSuperior = parseFloat(prompt("Introduce el límite superior del intervalo:"));
    if (limiteInferior >= limiteSuperior) {
        alert("El límite inferior debe ser menor que el límite superior. Inténtalo de nuevo.");
    }
} while (limiteInferior >= limiteSuperior);

do {
    numero = parseFloat(prompt("Introduce un número (0 para terminar):"));

    if (numero === 0)break;

    if (numero > limiteInferior && numero < limiteSuperior) sumaDentro += numero;
    else numerosFuera++; // Contar los números fuera del intervalo

    if (numero === limiteInferior || numero === limiteSuperior)numIgualLimite = true;
    

} while (numero !== 0);

console.log("Suma de los números dentro del intervalo: " + sumaDentro);
console.log("Cantidad de números fuera del intervalo: " + numerosFuera);

if (numIgualLimite)console.log("Se ha introducido algún número igual a los límites del intervalo.");
else console.log("No se ha introducido ningún número igual a los límites del intervalo.");