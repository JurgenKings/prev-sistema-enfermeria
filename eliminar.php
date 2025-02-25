<?php
require_once("clases-php/Pacientes.php");
include_once("importar-sweetalert2.php");

$eliminarCI = $_POST['cedula'];
$nuevoPacienteEliminar = new Paciente();
$nuevoPacienteEliminar->eliminarPaciente($eliminarCI);

$script = "<script>
               Swal.fire({
                  title: 'El registro del paciente se ha eliminado!',
                  icon: 'success',
                  confirmButtonText: 'Aceptar',
                  allowOutsideClick: false
               }).then((result) => {
                  if (result.isConfirmed) {
                     window.location.href='consultas.php';
                  }
               });
              </script>";

echo $script;

exit();
