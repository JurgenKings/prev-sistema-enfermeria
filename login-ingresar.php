<?php
//Decimos que es necesario incluir una vez todo el codigo de clases.php
require_once("clases-php/Usuario.php");
include_once("importar-sweetalert2.php");

//Comprobamos si existe una sesion activa, y si existe redirigir a la pagina principal
session_start();
if (isset($_SESSION['nombreUsuario'])) {
  header("Location: principal.php");
  exit();
}

//Instanciar la clase Usuario
$nuevoUsuario = new Usuario();

//Validar otra vez que los campos no esten vacios, que las variables usuario y clave existen
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
  $loginUsuario = $_POST['usuario'];
  $loginPassword = $_POST['clave'];

  //Llamar al metodo ingresar de la clase usuario, devuelve true o false
  if ($nuevoUsuario->ingresar($loginUsuario, $loginPassword)) {
    //El usuario y la contraseña son correctos
    $_SESSION['nombreUsuario'] = $loginUsuario;
    header("Location: principal.php");
    exit();
  } else {
    //El usuario y/o la contraseña son incorrectos
    $script = "<script>
                     Swal.fire({
                        title: 'Usuario y/o contraseña incorrectos!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                        allowOutsideClick: false
                     }).then((result) => {
                        if (result.isConfirmed) {
                          window.location.href = 'index.html';
                        }
                      });
                  </script>
                  ";

    echo $script;
    exit();
  }
} else {
  //Esto es poco probable que se ejecute, algun campo no fue definido, esta vacio
  echo "Por favor complete los campos requeridos";
}
