<?php require_once('./estructuras/head.php'); ?>
<!-- Se llama toda la estructura del head, pero sin cerrarla para poder cambiar el title -->

<title>Registro de Pacientes</title>
<link rel="stylesheet" href="css/registro.css">

<?php require_once('./estructuras/cabecera-menu.php'); ?>
<!-- Se cierra el head y se llama toda la estructura del header y del nav-->


<section class="contenedor-contenido-principal">
  <h1>
    <a href="principal.php">
      <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
        width="1280.000000pt" height="1085.000000pt" viewBox="0 0 1280.000000 1085.000000"
        preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0.000000,1085.000000) scale(0.100000,-0.100000)" stroke="none">
          <path d="M3449 10837 c-20 -8 -49 -23 -65 -35 -59 -43 -3343 -3338 -3360
                     -3372 -23 -45 -24 -143 -2 -190 8 -19 431 -533 939 -1141 508 -608 1228 -1470
                     1599 -1915 371 -445 702 -840 734 -878 75 -87 142 -122 218 -113 68 8 126 43
                     163 97 l30 45 3 1166 2 1166 78 17 c328 69 819 116 1217 116 1668 -1 3233
                     -594 4555 -1725 1068 -914 1997 -2192 2736 -3768 117 -250 150 -289 256 -303
                     68 -9 126 12 179 65 74 73 77 95 45 346 -256 1983 -832 3673 -1689 4955 -571
                     853 -1262 1536 -2077 2052 -924 585 -2011 947 -3190 1063 -297 29 -484 37
                     -840 37 -443 -1 -800 -24 -1157 -76 l-83 -12 -2 1131 c-3 1030 -4 1133 -20
                     1160 -21 39 -65 83 -101 102 -41 21 -125 26 -168 10z" />
        </g>
      </svg>
    </a>
    Registro de Pacientes
  </h1>
  <form class="formulario-registro" id="formulario-registro" action="validarPacientes.php" method="POST" autocomplete="off">
    <div class="contenedor-input" id="grupo__nombrePaciente">
      <input type="text" name="nombrePaciente" id="nombre-paciente" title="El nombre tiene que ser de 3 a 50 letras y solo puede contener letras y espacios" required />
      <label for="nombre-paciente">Nombre</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">El nombre tiene que ser de 3 a 50 letras y solo puede contener letras y espacios.</p>
    </div>

    <div class="contenedor-input" id="grupo__apellidoPaciente">
      <input type="text" name="apellidoPaciente" id="apellido-paciente" pattern="^[a-zA-ZÀ-ÿ\s]{3,50}$" title="El apellido tiene que ser de 3 a 50 letras y solo puede contener letras y espacios" required />
      <label for="apellido-paciente">Apellido</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">El apellido tiene que ser de 3 a 50 letras y solo puede contener letras y espacios.</p>
    </div>

    <div class="contenedor-input" id="grupo__cedulaPaciente">
      <input type="number" name="cedulaPaciente" id="cedula-paciente" min="999999" max="99999999" title="El campo solo acepta numeros" required />
      <label for="cedula-paciente">Cédula</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">La cédula tiene que ser de 7 a 8 digitos y solo puede contener numeros.</p>
    </div>

    <div class="contenedor-input" id="grupo__edadPaciente">
      <input type="number" name="edadPaciente" id="edad-paciente" min="1" max="125" title="El campo solo acepta numeros" required />
      <label for="edad-paciente">Edad</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">La edad debe de estar entre 1 y 125 años, solo debe contener numeros.</p>
    </div>

    <div class="contenedor-input" id="grupo__alturaPaciente">
      <input type="number" min="0" max="3" step="0.01" name="alturaPaciente" id="altura-paciente" required />
      <label for="altura-paciente">Estatura(m)</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">La estatura debe ser un numero decimal (maximo 2 decimales) entre 0 y 3 y usar un punto y no coma (ej: 1.77).</p>
    </div>

    <div class="contenedor-input" id="grupo__pesoPaciente">
      <input type="number" min="1" max="999.9" step="0.1" name="pesoPaciente" id="peso-paciente" required />
      <label for="peso-paciente">Peso(kg)</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">El peso debe ser un numero decimal entre 0 y 999.9 y usar un punto y solo un decimal (ej: 80.7).</p>
    </div>

    <div class="contenedor-input" id="grupo__semestre">
      <input type="number" name="semestre" id="semestre" max="12" />
      <label for="semestre">Semestre</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">El semestre debe dejarse en blanco o ser un numero entero entre 0 y 12.</p>
    </div>

    <div class="contenedor-input">
      <select name="carrera" required>
        <option value="">Seleccione una Carrera</option>
        <option value="Ingenieria de Sistemas">Ingeniería de Sistemas</option>
        <option value="Ingenieria Civil">Ingenieria Civil</option>
        <option value="Licenciatura en Administracion">Licenciatura en Administración</option>
        <option value="Licenciatura en Turismo">Licenciatura en Turismo</option>
        <option value="TSU Enfermeria">TSU Enfermeria</option>
        <option value="TSU Analisis y Diseño de Sistemas">TSU Analisis y Diseño de Sistemas</option>
        <option value="No estudiante">No Estudiante</option>
      </select>
    </div>

    <div class="contenedor-input" id="grupo__telefonoPaciente">
      <input type="number" name="telefonoPaciente" min="04120000000" max="04269999999" id="telefono-paciente" required />
      <label for="telefono-paciente">Teléfono</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">El teléfono debe empezar por 0412, 0414, 0416, 0424, 0426 y continuar despues con 7 digitos.</p>
    </div>

    <div class="contenedor-input" id="grupo__direccionPaciente">
      <input type="text" name="direccionPaciente" id="direccion-paciente" pattern="^[a-zA-ZÀ-ÿ\s.,]{3,80}$" title="La direccion debe ser de 3 a 80 caracteres y solo debe contener letras, puntos, comas o espacios en blanco" required />
      <label for="direccion-paciente">Dirección</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">La direccion debe ser de 3 a 80 caracteres y solo debe contener letras, puntos, comas o espacios en blanco.</p>
    </div>

    <div class="contenedor-input" id="grupo__alergias">
      <input type="text" name="alergias" id="alergias-paciente" pattern="^[a-zA-ZÀ-ÿ\s]{0,80}$" title="Las alergias debe quedar en vacia o solo contener letras y espacios en blanco" />
      <label for="alergias-paciente">Alergias (Si no posee, dejelo en blanco)</label>
      <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
      <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
      <p class="formulario__input-error">Las alergias debe quedar en vacia o solo contener letras y espacios en blanco.</p>
    </div>

    <div class="contenedor-input">
      <select name="tipoSangre" required>
        <option value="" selected>Seleccione el Tipo de Sangre</option>
        <option value="O+">O+</option>
        <option value="A+">A+</option>
        <option value="B+">B+</option>
        <option value="AB+">AB+</option>
        <option value="O-">O-</option>
        <option value="A-">A-</option>
        <option value="B-">B-</option>
        <option value="AB-">AB-</option>
      </select>
    </div>

    <div class="contenedor-input">
      <select name="sexo" required>
        <option value="">Seleccione el Sexo del Paciente</option>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select>
    </div>

    <!-- <input class="btnRegistro" type="submit" name="registroPaciente" value="Registrar"> -->
    <button class="btn-registro" name="registroPaciente">Registrar</button>
  </form>
</section>
</main>
</div>
<script defer type="text/javascript" src="js/cambiarModo.js"></script>
<script defer type="text/javascript" src="js/script.js"></script>
<script defer type="text/javascript" src="js/validaciones.js"></script>
</body>

</html>