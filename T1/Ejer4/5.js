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