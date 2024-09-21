cadena = prompt("Cadena de numeros separados por asteriscos");
nuevaCadena = cadena.split("*");
nuevaCadena.sort().reverse();
alert(nuevaCadena);