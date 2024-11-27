window.onload = function() {
    procesarDatos();
}
function procesarDatos() {
    let campos = location.search.split("&");
    let datos = [];
    for (let i = 0; i < campos.length; i++) {
        datos[i] = campos[i].split("=");
    }
    alert("El usuario " + datos[0][1] + " " + datos[1][1] + " tiene como dirección de correo \nelectrónico, " + datos[2][1].replace("%40", "@"));
}