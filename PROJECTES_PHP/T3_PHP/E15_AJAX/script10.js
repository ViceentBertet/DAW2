function leerDatos() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const datosJSON = JSON.parse(this.responseText);
            lista.innerHTML = "";
            datosJSON.forEach(userInfo => {
                const listaItem = document.createElement("li");
                listaItem.textContent = `${userInfo.id} ->`;
            });
        }
    }
}