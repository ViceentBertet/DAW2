export function act1() {
    let fecha = prompt("Introduce fecha: ")
    const meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    const [dia, mes, any] = fecha.split("/");
    const nomMes = meses[parseInt(mes) - 1];
    alert(`${dia} de ${nomMes} de ${any}`);
}

export function act2() {
    let numero = Math.trunc(Math.random() * 1000) + 1;
    let adivinar;
    console.log(numero);
    for (let i = 1; adivinar != numero; i++) {
        adivinar = prompt("Intenta adivinar el numero:");
        if (adivinar > numero)alert("Tu numero es mayor"); 
        else if (adivinar < numero) alert("Tu numero es menor");
        else alert("Enhorabuena! Has hecho " + i + " intentos");
    }
}
export function act3() {
    const VOCALES = ["a", "e", "i", "o", "u"];
    let respuesta;
    
    while (respuesta != " ") {
        respuesta = prompt("Introduce letra");
        if (VOCALES.includes(respuesta.charAt(0).toLowerCase())) alert("VOCAL");
        else if (respuesta.charAt(0) == " ") alert("SALIENDO...");
        else alert("NO VOCAL");
    }
}
export function act4() {
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
}
export function act5() {
    alert("INTRODUCE EL COLOR EN DECIMAL RGB:");
    let rojo;
    let verde;
    let azul;
    do {
        alert("LOS NUMEROS SE DEBEN COMPRENDER DE 0 A 255")
        rojo = prompt("ROJO:");
        verde = prompt("VERDE:");
        azul = prompt("AZUL:");
    } while (rojo > 255 || rojo < 0 || verde > 255 || verde < 0 || azul > 255 || azul < 0 );
    
    alert("#" + parseInt(rojo).toString(16) + parseInt(verde).toString(16) + parseInt(azul).toString(16));
}