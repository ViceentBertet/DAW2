const CABECERAS = ["Nombre", "Apellidos", "Email", "DNI", "Password", "Repetir passwd", "IP Equipo"];
var errores = [];

function verificarTexto(input, texto) {
    const REGEX = new RegExp(texto);
    let nombre = input.value;
    let resultado = REGEX.test(nombre);
    console.log(resultado);
    errores[errores.length] = resultado;
}
function isCorrect(pwd, rPwd) {
    let resultado = false;
    if (pwd.value === rPwd.value) resultado = true;
    errores[errores.length] = resultado;
}
function mostrarMensaje() {
    let mensaje = " ";
    for (let i = 0; i < errores.length; i++) {
        if (!errores[i]) mensaje += CABECERAS[i] + " ";
    }
    if (mensaje === " ") alert("Se ha registrado correctamente")
    else alert("Hay errores en los siguientes campos:" + mensaje);
}
