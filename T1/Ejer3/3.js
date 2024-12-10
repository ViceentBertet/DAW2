const cadena = "Hola a todos";
const contador = (cadena.match(/a/gi) || []).length;

console.log(contador);