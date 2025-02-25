//Hacer aparecer el formulario para crear una nueva consulta (historia)
const btnHistoria = document.querySelector(".anim-bg-degradado-blue");

btnHistoria.addEventListener("click", () => {
  const formulario = document.querySelector(".form-oculto");
  formulario.classList.toggle("form-oculto");
  btnHistoria.classList.toggle("form-oculto");
});

//Ponerle la  de hoy a la fecha de la consulta
window.onload = () => {
  const inputDate = document.querySelector("#fecha-ingreso");

  let fecha = new Date(); //Fecha actual
  let mes = fecha.getMonth() + 1; //obteniendo mes
  let dia = fecha.getDate(); //obteniendo dia
  let ano = fecha.getFullYear(); //obteniendo año
  if (dia < 10) dia = "0" + dia; //agrega cero si el dia menor de 10
  if (mes < 10) mes = "0" + mes; //agrega cero si el mes menor de 10
  inputDate.classList.add("no-vacio");
  inputDate.value = ano + "-" + mes + "-" + dia;
};

//VALIDACIONES DE LAS HISTORIAS
const inputsHistoria = document.querySelectorAll('#formulario-historia input');

const expresionesHistoria = {
  motivoYDiagnostico: /^[a-zA-ZÀ-ÿ\s]{3,100}$/,
  tratamiento: /^[a-zA-ZÀ-ÿ0-9\s]{3,100}$/,
  atendidoPor: /^[a-zA-ZÀ-ÿ\s]{3,50}$/,
  reposo: /^([1-2]?[0-9]{1,3}|3000|0)$/,
  presion: /^(1?[0-9]{1,2}|2[0-9]{2}|300)\/(0?[0-9]{1,2}|1[0-9]{2}|2[0-9]{2}|3[0-9]{2})$/
}

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "motivoHis":
      validarCampo(expresionesHistoria.motivoYDiagnostico, e.target, 'motivoHis');
      break;
    case "diagnosticoHis":
      validarCampo(expresionesHistoria.motivoYDiagnostico, e.target, 'diagnosticoHis');
      break;
    case "tratamientoHis":
      validarCampo(expresionesHistoria.tratamiento, e.target, 'tratamientoHis');
      break;
    case "atendidoHis":
      validarCampo(expresionesHistoria.atendidoPor, e.target, 'atendidoHis');
      break;
    case "reposoHis":
      validarCampo(expresionesHistoria.reposo, e.target, 'reposoHis');
      break;
    case "presion":
      validarCampo(expresionesHistoria.presion, e.target, 'presion');
      break;
  }
}

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
    document.querySelector(`#grupo__${campo} #valid`).style.display = 'block';
    document.querySelector(`#grupo__${campo} #invalid`).style.display = 'none';
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
  } else {
    document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
    document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
    document.querySelector(`#grupo__${campo} #valid`).style.display = 'none';
    document.querySelector(`#grupo__${campo} #invalid`).style.display = 'block';
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
  }
}

inputsHistoria.forEach((input) => {
  input.addEventListener('keyup', validarFormulario);
  input.addEventListener('blur', validarFormulario);
});


//Alertas al eliminar medicinas
const btnEliminar = document.querySelector(".btn-eliminar-paciente");

btnEliminar.addEventListener('click', () => {
  const form = document.getElementById('form-eliminar');

  Swal
    .fire({
      title: '¿Estás seguro que deseas eliminar el registro del paciente?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
    })
    .then(resultado => {
      if (resultado.value) {
        form.submit();
      }
    })
});