export class CartaElement extends HTMLElement {
    
    imagen;
    nombre;
    experiencia;

    constructor(imagen, nombre, experiencia) {
        super();
        this.imagen = imagen;
        this.nombre = nombre;
        this.experiencia = experiencia;
        this.innerHTML = 
            `
                <img src="${this.imagen}"/>
                <div class="exp">${experiencia}</div>
                <div class="nombre">${nombre}</div>
            `;
    }
}
customElements.define("carta-element", CartaElement);