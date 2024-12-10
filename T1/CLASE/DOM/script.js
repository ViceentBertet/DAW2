let timeOut = 0;
let colorRojo = 0;
let colorAzul = 0;
let colorVerde = 0;
for (let i = 0; i < 50; i++) {
    for (let j = 0; j < 4;j++) {
        colorAzul = Math.trunc(Math.random() * 255);
        colorRojo = Math.trunc(Math.random() * 255);
        colorVerde = Math.trunc(Math.random() * 255);
        setTimeout(() =>  uno.style.backgroundColor=`rgb(${colorRojo}, ${colorVerde}, ${colorAzul})`, timeOut);
        timeOut += 500;
    }
    
}
