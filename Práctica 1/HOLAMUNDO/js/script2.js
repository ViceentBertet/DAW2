/*var nombre = prompt("Dime tu nombre");
if (confirm("Quieres decirme tus apellidos¿")) {
    nombre += prompt("Dimelos entonces:")
} else {
    alert("Hijo de puta")
}
alert(nombre + " eres un capullo")*/

let numeros = [1,10,20,2,5,8, "Hola"];
numeros.sort();
console.log(numeros);
numeros.sort(function(a,b){return (a-b)});
console.log(numeros);