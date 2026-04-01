document.addEventListener("DOMContentLoaded", function () {

    const buscador = document.getElementById("buscador");
    const filtro = document.getElementById("filtroCategoria");
    const cards = document.querySelectorAll(".card");

    function filtrar() {

        let texto = buscador.value.toLowerCase();
        let categoria = filtro.value;

        cards.forEach(card => {

            let nombre = card.querySelector(".titulo").innerText.toLowerCase();
            let cat = card.getAttribute("data-categoria");

            let coincideTexto = nombre.includes(texto);
            let coincideCategoria = categoria === "" || cat === categoria;

            if (coincideTexto && coincideCategoria) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }

        });
    }

    buscador.addEventListener("keyup", filtrar);
    filtro.addEventListener("change", filtrar);

});


// 🔥 MODAL
const modal = document.getElementById("modal");
const cerrar = document.querySelector(".cerrar");

const modalImg = document.getElementById("modalImg");
const modalTitulo = document.getElementById("modalTitulo");
const modalDescripcion = document.getElementById("modalDescripcion");
const modalPrecio = document.getElementById("modalPrecio");
const modalBtn = document.getElementById("modalBtn");

document.querySelectorAll(".card").forEach(card => {

    card.addEventListener("click", function () {

        modal.style.display = "flex";

        modalImg.src = this.getAttribute("data-img");
        modalTitulo.innerText = this.getAttribute("data-nombre");
        modalDescripcion.innerText = this.getAttribute("data-descripcion");
        modalPrecio.innerText = "$" + this.getAttribute("data-precio");

        let codigo = this.getAttribute("data-codigo");

        modalBtn.href = "https://wa.me/5213511234567?text=Hola,%20me%20interesa%20el%20producto%20" + codigo;

    });

});

// cerrar modal
cerrar.addEventListener("click", () => {
    modal.style.display = "none";
});

// cerrar dando click fuera
window.addEventListener("click", function(e){
    if(e.target == modal){
        modal.style.display = "none";
    }
});