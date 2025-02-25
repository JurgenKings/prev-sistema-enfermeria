<?php
require_once('./estructuras/head.php');
require_once("clases-php/Pacientes.php");
require_once("clases-php/Inventario.php");
require_once("clases-php/Historia.php");
?>
<!-- Se llama toda la estructura del head, pero sin cerrarla para poder cambiar el title -->

<title>Consultas</title>
<link rel="stylesheet" href="css/consulta.css">

<?php require('./estructuras/cabecera-menu.php'); ?>
<!-- Se cierra el head y se llama toda la estructura del header y del nav-->

<?php

$cedulaPaciente = $_GET['cedula'];

$nuevaConsultaEspecifica = new Paciente();
$pacienteByCi = $nuevaConsultaEspecifica->consultarPacienteEspecifico($cedulaPaciente);

$nombre = $pacienteByCi['nombre'];
$id = $pacienteByCi['id_paciente'];
$apellido = $pacienteByCi['apellido'];
$edad = $pacienteByCi['edad'];
$altura = $pacienteByCi['altura'];
$peso = $pacienteByCi['peso'];
$semestre = $pacienteByCi['semestre'];
$carrera = $pacienteByCi['carrera'];
$telefono = $pacienteByCi['telefono'];
$direccion = $pacienteByCi['direccion'];
$alergias = $pacienteByCi['tipo_de_alergias'];
$tipo_de_sangre = $pacienteByCi['tipo_de_sangre'];
$sexo = $pacienteByCi['sexo'];

?>

<section class="contenedor-contenido-principal">
  <h1>
    <a href="consultas.php">
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
    Datos del Paciente: <?php echo "$nombre $apellido"; ?>
  </h1>

  <a class="btn btn-descargar-pac" href="pdf.php?cedula=<?php echo $cedulaPaciente ?>&descargar=1" download="reporte medico.pdf">
    <span> Descargar pdf </span>
    <img src="img/pdf.svg" alt="">
  </a>

  <div class="contenedor-mostrar-paciente d-grid width-100">
    <p class="datos-mostrar-paciente"> Nombre: <strong class="campo-mostrar"><?php echo $nombre; ?></strong></p>
    <p class="datos-mostrar-paciente"> Apellido: <strong class="campo-mostrar"><?php echo $apellido; ?></strong></p>
    <p class="datos-mostrar-paciente"> Cédula: <strong class="campo-mostrar"><?php echo $cedulaPaciente; ?></strong></p>
    <p class="datos-mostrar-paciente"> Edad: <strong class="campo-mostrar"><?php echo $edad; ?></strong></p>
    <p class="datos-mostrar-paciente"> Estatura: <strong class="campo-mostrar"><?php echo $altura; ?>m</strong></p>
    <p class="datos-mostrar-paciente"> Peso: <strong class="campo-mostrar"><?php echo $peso; ?>kg</strong></p>
    <p class="datos-mostrar-paciente"> Semestre: <strong class="campo-mostrar"><?php echo $semestre; ?></strong></p>
    <p class="datos-mostrar-paciente">
      Carrera: <strong class="campo-mostrar">
        <?php
        if ($carrera == "TSU Analisis y Diseño de Sistemas") $carrera = "TSU ADS";
        else if ($carrera == "Licenciatura en Administracion") $carrera = "Administración";
        echo $carrera;
        ?>
      </strong>
    </p>
    <p class="datos-mostrar-paciente"> Teléfono: <strong class="campo-mostrar">0<?php echo $telefono; ?></strong></p>
    <p class="datos-mostrar-paciente"> Dirección: <strong class="campo-mostrar"><?php echo $direccion; ?></strong></p>
    <p class="datos-mostrar-paciente"> Alergias: <strong class="campo-mostrar"><?php echo $alergias; ?></strong></p>
    <p class="datos-mostrar-paciente">
      Tipo de Sangre:
      <strong class="campo-mostrar"><?php echo $tipo_de_sangre; ?></strong>
    </p>
    <p class="datos-mostrar-paciente"> Sexo: <strong class="campo-mostrar"><?php echo $sexo; ?></strong></p>
    <a class="btn btn-eliminar anim-bg-degradado-green" href="actualizar.php?cedula=<?php echo $cedulaPaciente ?>">Actualizar</a>
    <!-- <a class="btn btn-eliminar anim-bg-degradado-red" href="eliminar.php?cedula=<?php echo $cedulaPaciente ?>">Eliminar</a> -->

    <form id="form-eliminar" action="eliminar.php" method="post" style="display: none;">
      <input type="hidden" name="cedula" value="<?php echo $cedulaPaciente; ?>">
    </form>
    <button id="btn-eliminar" class="btn anim-bg-degradado-red btn-eli-med btn-eliminar-paciente" type="button">Eliminar</button>

    <!-- PARTE DE LAS HISTORIAS -->
    <button class="btn btn-eliminar anim-bg-degradado-blue">Nueva consulta</button>
  </div>

  <div class="contenedor-historia form-oculto">
    <h2>Datos de la nueva consulta</h2>
    <form class="formulario-historia" id="formulario-historia" action="validarHistoria.php" method="POST" autocomplete="off">
      <div class="contenedor-input" id="grupo__motivoHis">
        <input type="text" name="motivoHis" id="motivo-his" pattern="^[a-zA-ZÀ-ÿ\s]{3,100}$" title="El motivo tiene que ser de 3 a 100 letras y solo puede contener letras y espacios" required />
        <label for="motivo-his">Motivo de la Consulta</label>
        <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
        <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
        <p class="formulario__input-error">El motivo de tiene que ser de 3 a 100 letras y solo puede contener letras y espacios.</p>
      </div>

      <div class="contenedor-input" id="grupo__diagnosticoHis">
        <input type="text" name="diagnosticoHis" id="diagnostico-his" pattern="^[a-zA-ZÀ-ÿ\s]{3,100}$" title="El diagnostico tiene que ser de 3 a 100 letras y solo puede contener letras y espacios" required />
        <label for="diagnostico-his">Diagnóstico</label>
        <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
        <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
        <p class="formulario__input-error">El diagnostico tiene que ser de 3 a 100 letras y solo puede contener letras y espacios.</p>
      </div>

      <div class="contenedor-input" id="grupo__tratamientoHis">
        <input type="text" name="tratamientoHis" id="tratamiento-his" pattern="^[a-zA-ZÀ-ÿ0-9\s]{3,100}$" title="El tratamiento tiene que ser de 3 a 100 letras y puede contener numeros, letras y espacios" required />
        <label for="tratamiento-his">Tratamiento</label>
        <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
        <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
        <p class="formulario__input-error">El tratamiento tiene que ser de 3 a 100 letras y puede contener numeros, letras y espacios.</p>
      </div>

      <div class="contenedor-input">
        <input type="date" name="fechaIngreso" id="fecha-ingreso" value="" required />
        <label for="fecha-ingreso">Fecha de la consulta</label>
      </div>

      <div class="contenedor-input" id="grupo__atendidoHis">
        <input type="text" name="atendidoHis" id="atendido-por" pattern="^[a-zA-ZÀ-ÿ\s]{3,50}$" title="El nombre de la persona que lo atendió tiene que ser de 3 a 50 letras y solo puede contener letras y espacios" required />
        <label for="atendido-por">Atendido por</label>
        <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
        <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
        <p class="formulario__input-error">El nombre de la persona que lo atendió tiene que ser de 3 a 50 letras y solo puede contener letras y espacios.</p>
      </div>

      <div class="contenedor-input">
        <select name="varMed">
          <option value="">Seleccione medicamento disponible</option>
          <option value="Ninguno">Ninguno</option>
          <?php
          $consultaMedicina = new Inventario();
          $arrayMedicinas = $consultaMedicina->consultarMedicinas();

          foreach ($arrayMedicinas as $elemento) {
            $nombreMedicamento = $elemento['nombre_medicina'];
            $idMedicamento = $elemento['cod_medicina'];
            $cantidadMedicamento = $elemento['cantidad_med'];
          ?>

            <option value="<?php echo $idMedicamento; ?>"><?php echo $nombreMedicamento . " (" . $cantidadMedicamento . ")" ?></option>
          <?php
            // $cantidadMedicamentos--;
            // $arrayMedicinas = $consultaMedicina->actualizarMedicinaEspecifico($idMedicamento, $cantidadMedicamento);
          }
          ?>

        </select>
      </div>

      <!--dependiendo de lo que se seleccione,se desplegara un input donde te pide el reposo(se pide en cantidad de dias)  -->
      <div class="contenedor-input">
        <select name="reposo" required>
          <option value="">Reposo</option>
          <option value="">No</option>
          <option value="si">Si</option>
        </select>
      </div>

      <div class="contenedor-input" id="grupo__reposoHis">
        <input type="number" name="reposoHis" id="dias_reposo" max="3000" placeholder="Cantidad de días de reposo" style="display: none;" title="El campo solo acepta numeros" />
        <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
        <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
        <p class="formulario__input-error">El campo solo puede contener numeros y maximo 3000 dias.</p>
      </div>

      <div class="contenedor-input" id="grupo__presion">
        <input type="text" name="presion" id="presion" pattern="^(1?[0-9]{1,2}|2[0-9]{2}|300)\/(0?[0-9]{1,2}|1[0-9]{2}|2[0-9]{2}|3[0-9]{2})$" title="La presion arterial deben ser 2 numeros separados por una diagonal invertida, ej: 120/80" required />
        <label for="presion">Presion arterial(mm Hg) ej: 120/80</label>
        <img class="formulario__validacion-estado" id="valid" src="img/check-circle.svg" alt="">
        <img class="formulario__validacion-estado" id="invalid" src="img/error-filled.svg" alt="">
        <p class="formulario__input-error">La presion arterial deben ser 2 numeros separados por una diagonal invertida, ej: 120/80.</p>
      </div>

      <!-- <div class="contenedor-input"> -->
      <input type="hidden" name="idPacienteHis" value="<?php echo $id; ?>" id="id-paciente-his" />
      <input type="hidden" name="ciPacienteHis" value="<?php echo $cedulaPaciente; ?>" id="ci-paciente-his" />

      <button class="btn-registro" name="insertarHistoria">Registrar Historia</button>
    </form>
  </div>

  <h2>Historial del Paciente</h2>
  <?php
  $nuevaConsultaHistorias = new Historia();
  $arrayHistorias = $nuevaConsultaHistorias->consultarHistorias($id);

  foreach ($arrayHistorias as $elemento) {
    $motivo = $elemento['motivo'];
    $diagnostico = $elemento['diagnostico'];
    $tratamiento = $elemento['tratamiento'];
    $fecha_consulta = $elemento['fecha_consulta'];
    $atendido = $elemento['atendido'];
    $reposo = $elemento['reposo'];
    $presion = $elemento['presion'];
  ?>
    <div class="contenedor-datos-historia">
      <p class="datos-mostrar-historia"> Fecha de la Consulta: </strong> <strong class="campo-mostrar"><?php echo $fecha_consulta ?></strong></p>
      <p class="datos-mostrar-historia"> Motivo: <strong class="campo-mostrar"><?php echo $motivo; ?></strong></p>
      <p class="datos-mostrar-historia"> Diagnóstico: </strong> <strong class="campo-mostrar"><?php echo $diagnostico; ?></strong></p>
      <p class="datos-mostrar-historia"> Tratamiento: </strong> <strong class="campo-mostrar"><?php echo $tratamiento; ?></strong></p>
      <p class="datos-mostrar-historia"> Atendido por: </strong> <strong class="campo-mostrar"><?php echo $atendido; ?></strong></p>
      <p class="datos-mostrar-historia"> Reposo: </strong> <strong class="campo-mostrar">
          <?php
          if ($reposo == '') echo 'No hay reposo';
          else echo $reposo . ' días';
          ?>
        </strong>
      </p>
      <p class="datos-mostrar-historia"> Presion Arterial: <strong class="campo-mostrar"><?php echo $presion; ?> mm Hg</strong></p>
    </div>

  <?php
  }
  ?>
</section>
</main>
</div>
<script defer type="text/javascript" src="js/cambiarModo.js"></script>
<script defer type="text/javascript" src="js/script.js"></script>
<script defer type="text/javascript" src="js/historia.js"></script>
<script defer type="text/javascript" src="reposo.js"></script>
</body>

</html>