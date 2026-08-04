document.addEventListener("DOMContentLoaded", function () {
    const btnConfirmar = document.querySelector("#btn-confirmar");

    function confirmarTurno() {
        const mensaje = document.querySelector("#mensaje");
        
        mensaje.textContent = "Turno recibido - te atiende jose fernando tamo mejia";
        
        mensaje.classList.remove("oculto");
    }

    btnConfirmar.addEventListener("click", confirmarTurno);
});