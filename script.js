const body = document.querySelector("body");
const botonmodo = document.querySelector("#btn-tema");

const btnMenu = document.querySelector("#btn-menu");
const nav = document.querySelector("nav");

let esdedia = true;

const hora = new Date().getHours();

if (hora >= 6 && hora < 18) {
    body.classList.add("claro");
    esdedia = true;
    botonmodo.textContent = "modo noche";
} else {
    body.classList.add("oscuro");
    esdedia = false;
    botonmodo.textContent = "modo día";
}

function alternarmodo() {
    body.classList.toggle("claro");
    esdedia = !esdedia;

    if (esdedia) {
        body.classList.remove("oscuro");
        body.classList.add("claro");
        botonmodo.textContent = "modo noche";
    } else {
        body.classList.remove("claro");
        body.classList.add("oscuro");
        botonmodo.textContent = "modo día";
    }
}
botonmodo.addEventListener("click", alternarmodo);

btnMenu.addEventListener("click", () => {
    nav.classList.toggle("activo")
})