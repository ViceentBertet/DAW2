function obtenerInfo() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            etiqueta.innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", "frutas.txt", true);
    xhttp.send();
}
lee.addEventListener("click", obtenerInfo, false);