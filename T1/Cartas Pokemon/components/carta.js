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
                <div id="xp">${experiencia}</div>
                <img src="${imagen}"/>
                <div id="nom">${nombre}</div>
            `;
    }
    clone() {
        return new CartaElement(this.imagen, this.nombre, this.experiencia);
    }
}
customElements.define("carta-element", CartaElement);