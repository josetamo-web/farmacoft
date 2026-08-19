const body = document.querySelector("body");
const botonmodo = document.querySelector("#btn-tema");

const btnMenu = document.querySelector("#btn-menu");
const nav = document.querySelector("nav");

const formularioPedido = document.querySelector("#form-pedido");
const avisoPedido = document.querySelector("#error-pedido");

const temaGuardado = localStorage.getItem("tema") || "claro";
let esdedia = (temaGuardado === "claro");

function aplicarTema() {
    if (esdedia) {
        body.classList.remove("oscuro");
        body.classList.add("claro");
        if (botonmodo) botonmodo.textContent = "modo noche";
    } else {
        body.classList.remove("claro");
        body.classList.add("oscuro");
        if (botonmodo) botonmodo.textContent = "modo día";
    }
}

aplicarTema();

// Cambiar el tema manualmente al hacer clic y guardarlo en el navegador
function alternarmodo() {
    esdedia = !esdedia; // Cambia el estado (true <-> false)
    localStorage.setItem("tema", esdedia ? "claro" : "oscuro"); // Guarda la elección
    aplicarTema();
}

if (botonmodo) {
    botonmodo.addEventListener("click", alternarmodo);
}

// 2. Mostrar o ocultar el menú en movil
if (btnMenu && nav) {
    btnMenu.addEventListener("click", () => {
        nav.classList.toggle("activo");
    });
}

// 3. Boton Ir Arriba
const btnArriba = document.querySelector("#btn-arriba");

function mostrarBotonArriba() {
    if (btnArriba) {
        if (window.scrollY > 200) {
            btnArriba.style.display = "block";
        } else {
            btnArriba.style.display = "none";
        }
    }
}

function irArriba() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}

window.addEventListener("scroll", mostrarBotonArriba);
if (btnArriba) {
    btnArriba.addEventListener("click", irArriba);
}

// 4. Validación del Formulario
function RevisarPedido(event) {
    event.preventDefault();

    const nombre = document.querySelector("#nombre")?.value || "";
    const correo = document.querySelector("#correo")?.value || "";
    const mensaje = document.querySelector("#mensaje")?.value || "";

    if (nombre === "") {
        avisoPedido.textContent = "Falta tu nombre caserito";
        avisoPedido.classList.add("error");
        avisoPedido.classList.remove("exito");
    } else if (correo.includes("@") === false) {
        avisoPedido.textContent = "Ese correo no parece correo le falta el @";
        avisoPedido.classList.add("error");
        avisoPedido.classList.remove("exito");
    } else if (mensaje === "") {
        avisoPedido.textContent = "Escribe un mensaje para poder ayudarte";
        avisoPedido.classList.add("error");
        avisoPedido.classList.remove("exito");
    } else {
        formularioPedido.submit();
    }
}

if (formularioPedido) {
    formularioPedido.addEventListener("submit", RevisarPedido);
}