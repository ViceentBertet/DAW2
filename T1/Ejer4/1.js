let fecha = prompt("Introduce fecha: ")
const meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
const [dia, mes, any] = fecha.split("/");
const nomMes = meses[parseInt(mes) - 1];
alert(`${dia} de ${nomMes} de ${any}`);
