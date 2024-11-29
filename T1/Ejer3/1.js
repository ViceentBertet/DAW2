let regex = new RegExp("^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$");
let cadenaMala = "256.1.1.1";
let cadenaBuena = "127.0.0.1";

console.log(regex.test(cadenaMala));     //False
console.log(regex.test(cadenaBuena));    //True
