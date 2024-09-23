const VOCALES = ["a", "e", "i", "o", "u"];
let respuesta;

while (respuesta != " ") {
    respuesta = prompt("Introduce letra");
    if (VOCALES.includes(respuesta.charAt(0).toLowerCase())) alert("VOCAL");
    else if (respuesta.charAt(0) == " ") alert("SALIENDO...");
    else alert("NO VOCAL");
}