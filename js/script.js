
//Verificar si los input estan vacios y añadir clase si tiene contenido, para el login
const inputs = document.querySelectorAll("input");

inputs.forEach((input) => {
  input.addEventListener("blur", (event) => {
    if (event.target.value) input.classList.add("no-vacio");
    else input.classList.remove("no-vacio");
  });
});
//Desaparecer y aparecer el menu lateral
const btnToggle = document.querySelector(".btn-menu");

btnToggle.addEventListener("click", () => {
  const menu = document.querySelector(".menu-lateral");
  const contentPrincipal = document.querySelector(".contenido-principal");
  const cabecera = document.querySelector(".cabecera");
  menu.classList.toggle("desaparecer");
  contentPrincipal.classList.toggle("estirar");
  cabecera.classList.toggle("estirar");
});
 
//Hacer aparecer formulario de registro y desaparecer login
function mostrarFormulario() {
  const btnRegistroUsuario = document.querySelector(".btn-registro-usuario");
  const formularioRegistro = document.querySelector(".formulario-registro");
  const formularioLogin = document.querySelector(".formulario-login");
  formularioLogin.classList.add("ocultar");
  btnRegistroUsuario.classList.add("ocultar");
  formularioRegistro.classList.remove("ocultar");
}

//Alertas 
const btnCerrarSesion = document.querySelector(".btn-cerrar-sesion");

btnCerrarSesion.addEventListener("click", () => {
  Swal
  .fire({
      title: '¿Estás seguro que deseas cerrar la sesión?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, cerrar sesión',
      cancelButtonText: 'Cancelar'
  })
  .then(resultado => {
      if (resultado.value) {
        document.getElementById("form-cerrar-sesion").submit();
      }
  })
});
