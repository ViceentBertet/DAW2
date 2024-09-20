obj = ["a", "b", "c", "d"];
let resultado = "";
for (let i in obj){
    resultado += obj + "." + i + "=" + obj[i] + "\n";
    console.log(resultado);
}