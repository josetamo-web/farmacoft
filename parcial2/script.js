const formCita = document.querySelector("#form-cita");
const avisoCita = document.querySelector("#aviso-cita");
const nombreInput = document.querySelector("#nombre");
const correoInput = document.querySelector("#correo");

function validarFormulario(event) {
  const nombreVal = nombreInput.value.trim();
  const correoVal = correoInput.value.trim();

  if (nombreVal === "" || correoVal === "") {
    event.preventDefault();
    avisoCita.textContent = "completa tu nombre y tu correo para reservar la cita";
    avisoCita.classList.add("error");
    avisoCita.classList.remove("exito");
    } else if (!correoVal.includes('@')) {
    event.preventDefault();
    avisoCita.textContent = "le falta el @";
    avisoCita.classList.add("error");
    avisoCita.classList.remove("exito");
    } else {
        avisoCita.textContent = "cita reservada te atiende jose fernando tamo mejia";
        avisoCita.classList.add("exito");
        avisoCita.classList.remove("error");
        }
}

formCita.addEventListener("submit", validarFormulario);