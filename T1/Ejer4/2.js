let numero = Math.trunc(Math.random() * 1000) + 1;
let adivinar;
console.log(numero);
for (let i = 1; adivinar != numero; i++) {
    adivinar = prompt("Intenta adivinar el numero:");
    if (adivinar > numero)alert("Tu numero es mayor"); 
    else if (adivinar < numero) alert("Tu numero es menor");
    else alert("Enhorabuena! Has hecho " + i + " intentos");
}